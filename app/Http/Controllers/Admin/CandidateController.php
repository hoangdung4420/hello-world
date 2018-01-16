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
            echo 'chỉ hiển thị form tìm kiếm, cho phép search và xem hồ sơ dạng view';
            die();
        }
    	$arItems = File::join('users','id','user_id')->select('id','id_file','fullname','email','picture','preview')->orderBy('id_file','DESC')->paginate(getenv('ADMIN_ROWS'));

    	$arJobs = ListCategory::join('files','list_categories.user_id','files.user_id')->join('job_categories','jobcat_id','id_jobcat')->select('list_categories.user_id as user_id','name')->get();
    	//lưu tạm danh sách công việc vào preview
    	foreach ($arItems as $arItem) {
    		$arItem->preview = '';
    		foreach ($arJobs as $arJob) {
    			if($arJob->user_id == $arItem->id){
    				$arItem->preview .= $arJob->name.',';
    			}
         
    		}
    	}
    	return view('admin.candidate.index',['title'=>$title, 'arItems' => $arItems]);
    }

    public function getEdit($id)
    {
    	$title = "Quản lý ứng viên";
    	$oItem = File::join('users','id','user_id')->select('files.*','fullname','email')->where('id_file',$id)->get();
        $listCats = ListCategory::join('job_categories','jobcat_id','id_jobcat')->where('user_id', $oItem[0]->user_id)->get();
       // dd($listCats);
    	return view('admin.candidate.edit',['title'=>$title, 'oItem' => $oItem[0], 'listCats'=>$listCats ]);
    }
 
    public function getView($id)
    {
      $title = "Quản lý ứng viên";
      $oItem = File::join('users','id','user_id')->select('files.*','fullname','email')->where('id_file',$id)->get();
        $listCats = ListCategory::join('job_categories','jobcat_id','id_jobcat')->where('user_id', $oItem[0]->user_id)->get();
       // dd($listCats);
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
      $result = $oItem->save();
      if($result){
            $request->session()->flash('msgS','Cập nhật thành công');
        }else{
            $request->session()->flash('msgW','Có lỗi khi cập nhật');
        } 
        return redirect()->back();
    }

}
