<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\UserAddRequest;
use App\Http\Requests\UserEditRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Level;
use App\Company;
use App\File;
use Auth;
class UserController extends Controller
{
	public function __construct( User $mUser, Company $mCompany, File $mFile)
	{
        $this->mUser = $mUser;
        $this->mCompany = $mCompany;
		$this->mFile = $mFile;
		
	}

    public function index()
    {
    	$title = "Quản lý người dùng";
    	$arItems = $this->mUser->join('levels','level_id','id_level')->select('users.*','name')->orderBy('level_id', 'ASC')->orderBy('active','DESC')->paginate(getenv('ADMIN_ROWS'));
        //lưu tạm id_file vào phone
        $files = File::all();
        foreach ($arItems as $arItem) {
            foreach ($files as $file) {
                if($arItem->id == $file->user_id){
                    $arItem->phone = $file->id_file;
                }
            }
        }
        //luu tạm id_company vào phone
        $companies = Company::all();
        foreach ($arItems as $arItem) {
            foreach ($companies as $company) {
                if($arItem->id == $company->user_id){
                    $arItem->phone = $company->id_company;
                }
            }
        }
    	return view('admin.user.index', ['title' => $title, 'arItems' => $arItems ]);
    }

    public function getAdd() 
    {
    	$title = "Quản lý người dùng";
    	return view('admin.user.add', ['title' => $title]);
    }

    public function postAdd(UserAddRequest $request)
    {
        $arItem = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt(trim($request->password)),
            'phone' => $request->phone,
            'level_id' => $request->level_id,
            'birthday' => $request->birthday,
            'address' => $request->address,
            'picture' => '',
            'active' => 1,
        ];

        if($request->level_id != 3){
            $arItem['gender'] = $request->gender;
        }
        if(isset($request->active)){
            $arItem['active'] =0;
        }

        $picture = $request->picture;
        if($picture != ''){
            $tmp = $request->file('picture')->store('files');
            $arTmp = explode('/',$tmp);
            $picture = end($arTmp);
            $arItem['picture'] = $picture;
        }
        $result = $this->mUser->insert($arItem);
        if($result){
            $request->session()->flash('msgS','Thêm thành công');
            //tạo files với candidate
            //tạo detail_company với caompany
            $oItem = $this->mUser->where('email',$request->email)->get();
            if($request->level_id == 3){
                $ar = [
                    'user_id' =>  $oItem[0]->id,
                    'feature' =>  0,
                    'reader' => 0,
                    'liked' => 0,
                ];
                $kq1 = $this->mCompany->insert($ar);
            }elseif($request->level_id == 4){
                 $ar = [
                    'user_id' =>  $oItem[0]->id,
                    'active' =>  0,
                ];
                $kq2 = $this->mFile->insert($ar);
            }
        }else{
            $request->session()->flash('msgW','Có lỗi khi thêm');
        }    
        return redirect()->route('admin.user.index');
    }

    public function getEdit($id = 0)
    {
    	$title = "Quản lý người dùng";
        if(Auth::user()->level_id > 2 && Auth::user()->id != $id){
           return redirect()->route('admin.user.edit',Auth::user()->id);
        }
    	 $oItem = $this->mUser->findOrFail($id);
         if($oItem->level_id == 1){
            return redirect()->route('admin.user.edit',Auth::user()->id);
         }
          return view('admin.user.edit', ['title' => $title, 'oItem' => $oItem]);
    }

    public function postEdit($id, UserEditRequest $request)
    {   
        $oItem = $this->mUser->findOrFail($id);
        //checkmail
        if($oItem->email != $request->email){
        $checkEmail = $this->mUser->where('email',$request->email)->get();
        if(count($checkEmail)>0){
          $request ->session()->flash('msgW', 'Email đã sử dụng');
          return redirect()->route('admin.user.edit',$id);
        }
      }

        $arItem = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'picture' => $oItem->picture,
        ];
        
        if($request->level_id != 3){
            $oItem->gender = $request->gender;

        }
        $oItem->birthday = $request->birthday;
        $oItem->save();
        
        if(Auth::user()->level_id == 1){
        $arItem['level_id'] = $request->level_id;
        //xoa file tao company voi ung vien,
        //xoa company tao file voi cong ty
        }else{
            $arItem['level_id'] = $oItem->level_id;
        }

        if(isset($request->active) && $oItem->level_id !=1){
            $arItem['active'] = 0;
        }else{
            $arItem['active'] = 1;
        }
        

        $password = trim($request->oldpassword);
        if(strlen($password) < 6)
        {
            $password = '';
        }
        $mk='';
        if($password != ''){
          $password_old = trim($request->oldpassword);
          $password_new = trim($request->newpassword);
          $result = Hash::check($password_old, $oItem->password) ;
          if(!$result){
            $request->session()->flash('msgW', 'Sai mật khẩu cũ');
            return redirect()->route('admin.user.edit',$id);
          }
            $arItem['password'] = bcrypt($password_new);
             $mk="Có thay đổi mật khẩu";
        }

        $picture = $request->picture;
        //files có hình mới thì tải hình mới lên và xóa hình cũ
        if($picture != '')
        {
          $tmp = $request->file('picture')->store('files');
          $arTmp = explode('/', $tmp);
          $picture = end($arTmp);
          $arItem['picture'] = $picture;
          if($oItem->picture != '')
          {
            Storage::delete('files/'.$oItem->picture);
          }
        }else{
          //nút xóa hình đk tích thì xóa hình cũ nếu có
          if(($request->delete_picture != '') && ($oItem->picture != ''))
          {
            Storage::delete('files/'.$oItem->picture);
            $arItem['picture'] = '';
          }
        }

         $result = $oItem->update($arItem);
          if($result){
                $msg='Sửa thành công. '.$mk;
                $request ->session()->flash('msgS',$msg );
            }else{
                 $request ->session()->flash('msgW', 'Lỗi trong quá trình sửa');
            }
          return redirect()->route('admin.user.edit',$id);

        //dd($arItem);
    }

    public function del($id,Request $request){
        
        $oItem = $this->mUser->findOrFail($id);

        if($oItem->level_id==1){
            $request->session()->flash('msgW','Bạn không thể xóa admin');
        }else{
            //xóa detail_company và files
            if($oItem->level_id == 3){
                $company = $this->mCompany->where('user_id',$oItem->id)->get();
                $company[0]->delete();
            }elseif($oItem->level_id == 4){
                //bổ sung xóa file pdf, cv_file trong bảng files và bảng listjob
                $file = $this->mFile->where('user_id',$oItem->id)->get();
                Storage::delete('cv/'.$file[0]->cv_file);
                $file[0]->delete();
            }
               
            if($oItem->picture != '')
              {
                Storage::delete('files/'.$oItem->picture);
              }

            $result=$oItem->delete();
            
            if($result){
                $request->session()->flash('msgS','Xóa thành công');

            }else{
                $request->session()->flash('msgW','Có lỗi khi xóa');
            }
        }
        return redirect()->route('admin.user.index');
    }

}
