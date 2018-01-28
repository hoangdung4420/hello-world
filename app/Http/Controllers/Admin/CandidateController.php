<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\File;
use App\ListCategory;
use App\User;
use App\Category;
use Auth;
class CandidateController extends Controller
{
    public function index(){
    	$title = "Quản lý ứng viên";
      if(Auth::user()->level_id == 4){
            $oItem = File::where('user_id',Auth::user()->id)->get();
            return redirect()->route('admin.candidate.edit',$oItem[0]->id_file);
        }elseif(Auth::user()->level_id == 3){
             //chỉ hiển thị form tìm kiếm, cho phép search và xem hồ sơ dạng view
            $arItems = [];
        }else{
          $arItems = File::join('users','id','user_id')->select('id','id_file','fullname','email','picture','preview')->orderBy('id_file','DESC')->paginate(getenv('ADMIN_ROWS'));
 
          //lưu tạm danh sách công việc vào cate
          foreach ($arItems as $arItem) {
            $arItem->cate = '';
             $arJobs = ListCategory::join('job_categories','jobcat_id','id_jobcat')->select('name')->where('user_id', $arItem->id)->get();
            foreach ($arJobs as $arJob) {
                $arItem->cate .= $arJob->name.',';
            }
          }
        }
    	return view('admin.candidate.index',['title'=>$title, 'arItems' => $arItems]);
    }

    public function searchCandidate(Request $request)
    {
      $title = "Tìm kiếm";
        $arItems = File::join('users','user_id','id')->select('files.*','id','fullname','picture');

        //title
        $key['name'] = $request->name;
        if($key['name'] != ''){
           $arItems = $arItems->where('fullname','like','%'.$key['name'].'%');
        }
        //categories_job
        $key['category'] = $request->category;
       $catItem = Category::where('name',$key['category'])->where('parent_id','!=',0)->get();
        if(count($catItem) == 1){
            $category = $catItem[0]->id_jobcat;
        }else{
            $category = '';
        }
        if($category != ''){
           $arItems = $arItems->join('list_categories','id','list_categories.user_id')->where('jobcat_id',$category);
        }
        //address
        $key['cities'] = $request->cities;
        if($key['cities'] != ''){
          $arItems = $arItems->where('users.address','like','%'.$key['cities'].'%');
        }

        //đếm số ungs viên
        $sum = $arItems->count();
        
        $arItems = $arItems->orderBy('id','DESC')->paginate(getenv('ADMIN_ROWS'));

        //lưu tạm danh sách công việc vào cate
          foreach ($arItems as $arItem) {
            $arItem->cate = '';
            $arJobs = ListCategory::join('job_categories','jobcat_id','id_jobcat')->select('name')->where('user_id', $arItem->user_id)->get();
            foreach ($arJobs as $arJob) {
                $arItem->cate .= $arJob->name.',';
            }
          }
        return view ('admin.candidate.index',['title'=>$title, 'arItems' => $arItems, 'sum' =>$sum ,'key'=>$key]);
    }

    public function getEdit($id)
    {
    	$title = "Quản lý ứng viên";
    	$oItem = File::join('users','id','user_id')->select('files.*','fullname','email')->where('id_file',$id)->get();
      if(count($oItem)==0){
          return view('errors.404');
       } 
       if(Auth::user()->level_id >2 && $oItem[0]->user_id != Auth::user()->id){
        return redirect()->route('admin.candidate.index');
       }
        $listCats = ListCategory::join('job_categories','jobcat_id','id_jobcat')->where('user_id', $oItem[0]->user_id)->get();
    	return view('admin.candidate.edit',['title'=>$title, 'oItem' => $oItem[0], 'listCats'=>$listCats ]);
    }
 
    public function getView($id)
    {
      $title = "Quản lý ứng viên";
      $oItem = File::join('users','id','user_id')->select('files.*','fullname','email')->where('id_file',$id)->get();
        $listCats = ListCategory::join('job_categories','jobcat_id','id_jobcat')->where('user_id', $oItem[0]->user_id)->get();
        
      return view('admin.candidate.view',['title'=>$title, 'oItem' => $oItem[0], 'listCats'=>$listCats ]);
    }

    public function postEdit($id, Request $request)
    {
       $oItem = File::findOrFail($id);
       $oItem->preview = $request->preview;
       $oItem->education = $request->education;
       $oItem->education = $request->education;
       $oItem->skill = $request->skill;
       $oItem->experience = $request->experience;
       $oItem->reference = $request->reference;
       $oItem->salary= $request->salary;
       $oItem->job_level = $request->job_level;
       $oItem->times_id = $request->times_id;
       $oItem->benifit = $request->benifit;
       if(isset($request->active)){
        $oItem->active = 1;
       }else{
        $oItem->active = 0;
       }
       //tải cv file lên
       $cv_file = $request->cv_file;
       if($cv_file != ''){
        $duoiFile = $cv_file->getClientOriginalExtension();
        if($duoiFile != 'pdf'){
           $request->session()->flash('msgW','File tải lên phải có định dạng là pdf');
           return redirect()->back();
        }else{
          if($cv_file->getSize() > getenv('MAX_FILE')*1024){
                $request->session()->flash('msgW','Kích thước file phải bé hơn 250kb');
                 return redirect()->back();
            }
          $tmp = $request->file('cv_file')->store('cv');
          $arTmp = explode('/',$tmp);
          $cvName = end($arTmp);
          $oItem->cv_file = $cvName;
        }
       }
      $result = $oItem->save();
      if($result){
            $request->session()->flash('msgS','Cập nhật thành công');
        }else{
            $request->session()->flash('msgW','Có lỗi khi cập nhật');
        } 
        return redirect()->back();
    }

}
