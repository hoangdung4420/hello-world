<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyEditRequest;
use App\Company; 
use App\ListCategory;
use App\Category;
use App\Job;
use App\Like;
use App\Follow;
use Auth;
class CompanyController extends Controller
{
    public  function __construct(Like $mLike)
    {
        $this->mLike = $mLike;
    }
    public function index()
    {
    	$title = "Quản lý công ty";
        if(Auth::user()->level_id == 3){
            //người dùng là company thì hien thi thong tin company đó
            $oItem = Company::where('user_id',Auth::user()->id)->get();
            return redirect()->route('admin.company.edit',$oItem[0]->id_company);

        }elseif(Auth::user()->level_id == 4){

            //chỉ hiển thị những công ty đã theo dõi
            $arItems = Follow::join('users','company_id','id')->where('user_id',Auth::user()->id)->select('id_follow','id','company_id','fullname','picture','address','follows.created_at as created_at')->orderBy('id_follow','DESC')->paginate(getenv('ADMIN_ROWS'));
            return view('admin.company.follow',['title'=>$title, 'arItems'=>$arItems]);

        }else{
            //admin và mod hiển thị all
            $arItems = Company::join('users','user_id','id')->select('id','id_company','fullname','picture','address','email','size','reader')->orderBy('id_company','DESC')->paginate(getenv('ADMIN_ROWS'));
        
            foreach ($arItems as $value) {
                $value->size = Job::where('user_id',$value->id)->count();
                $value->follow = Follow::where('company_id',$value->id)->count();
            }
        }
    	return view('admin.company.index',['title'=>$title, 'arItems'=>$arItems]);
    }

    public function getEdit($id=0)
    {
    	$title = "Quản lý công ty";
    	$oItem =  Company::join('users','user_id','id')->where('id_company',$id)->select('detail_companies.*','fullname')->get();
        if(count($oItem) == 0){
            return redirect()->route('admin.company.index');
        }
        if(Auth::user()->level_id >2 && $oItem[0]->user_id != Auth::user()->id){
            return redirect()->route('admin.company.index');
           }
        $oItem[0]->follow = Follow::where('company_id',$oItem[0]->user_id)->count();
    	$listCats = ListCategory::join('job_categories','jobcat_id','id_jobcat')->where('user_id', $oItem[0]->user_id)->get();
    	return view('admin.company.edit',['title'=>$title, 'oItem'=>$oItem[0], 'listCats' => $listCats]);
    }

    public function postEdit($id=0, CompanyEditRequest $request)
    {
    	$title = "Quản lý công ty";
    	$oItem =  Company::findOrFail($id);
        $oItem->size = $request->size;
        $oItem->benifit = $request->benifit;
        $oItem->preview = $request->preview;
    	$oItem->detail = $request->detail;
        if(Auth::user()->level_id == 1){
           $oItem->reader = $request->reader;
            if(isset($request->feature)){
                $oItem->feature = 1;
            }else{
                $oItem->feature = 0;
            }
        }else{
             $oItem->reader = $oItem->reader;
             $oItem->feature = $oItem->feature;
        }
       $result = $oItem->save();
        if($result){
            $request->session()->flash('msgS','Cập nhật thành công');
        }else{
            $request->session()->flash('msgW','Có lỗi khi cập nhật');
        } 
    	return redirect()->back();
    }

   public function delFollow($id, Request $request)
   {
        $oItem = Follow::findOrFail($id);
        $result = $oItem->delete();
        if($result){
            $request->session()->flash('msgS','Xóa thành công');
        }else{
            $request->session()->flash('msgW','Có lỗi khi xóa');
        } 
        return redirect()->back();
   }

   public function searchcompany(Request $request)
   {
    $title = "Công ty";
        $arItems = Company::join('users','user_id','id');
        
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
        $sum = $arItems->count();
        $arItems = $arItems->paginate(12);
       
        foreach ($arItems as $value) {
                $value->size = Job::where('user_id',$value->id)->count();
                $value->follow = Follow::where('company_id',$value->id)->count();
            }
         return view ('admin.company.index',['title'=>$title, 'arItems' => $arItems, 'sum' =>$sum ,'key'=>$key]);
   }
}
