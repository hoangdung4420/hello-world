<?php

namespace App\Http\Controllers\Job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactAddRequest;
use App\User;
use App\Company;
use App\Job;
use App\Position;
use App\Category;
use App\Contact;
use App\Comment;

class PagesController extends Controller
{
    public function index()
    {
    	$title = "Trang chủ";
    	$arCompanies = Company::join('users','user_id','id')->where('feature',1)->where('level_id',3)->select('id','fullname','picture')->limit(14)->get();
    	$arJobs = Job::join('users','user_id','id')->where('feature',1)->select('id_job','title','fullname','picture')->get();
    	//dd($arJobs);
    	return view ('jobs.index',['title'=>$title, 'arCompanies'=>$arCompanies, 'arJobs' => $arJobs]);
    }
    public function getJobCat($name, $id)
    {
    	$oItem = Category::findOrFail($id);
    	$title = $oItem->name;
    	//ưu tiên: công việc kết thúc hôm nay, công việc đã hết hạn thì xếp sau
	 	$today = date('Y-m-d');
    	$arItems = Job::join('users','user_id','id')->where('job_categories',$id)->select('jobs.*','fullname','picture')->orderBy('expired','DESC');

    	$sum = $arItems->count();
    	$arItems = $arItems->paginate(getenv('ADMIN_ROWS'));
    	return view ('jobs.search',['title'=>$title, 'arItems' => $arItems, 'sum' =>$sum ]);
    }

    public function getJob()
    {
    	$title = "Tìm kiếm";
    	$today = date('Y-m-d');
    	$arItems = Job::join('users','user_id','id');
    	$sum = $arItems->count();
    	$arItems = $arItems->paginate(getenv('ADMIN_ROWS'));

    	return view ('jobs.search',['title'=>$title, 'arItems' => $arItems, 'sum' =>$sum ]);
    }

    public function getCompany()
    {
    	$title = "Công ty tham gia";
    	$arItems = Company::join('users','user_id','id');
    	$sum = $arItems->count();
    	$arItems = $arItems->paginate(getenv('ADMIN_ROWS'));
    	return view ('jobs.company',['title'=>$title, 'arItems' => $arItems, 'sum' =>$sum ]);
    }

    public function getContact()
    {
    	$title = "Gửi liên hệ";
    	return view ('jobs.contact');
    }

    public function postContact(ContactAddRequest $request)
    {
    	$oItem = new Contact;
        $oItem->fullname = $request->fullname;
        $oItem->email = $request->email;
        $oItem->subject = $request->subject;
        $oItem->content = $request->content;
        $oItem->rep_id = 1;
        $oItem->status = 0;
        $oItem->parent_id = 0;
        $result = $oItem->save();
        if($result){
            $request->session()->flash('msgS','Gửi thành công');
        }else{
            $request->session()->flash('msgW','Có lỗi khi gửi');
        }    
        return redirect()->back();
    }

    public function getDetailJob($name, $id)
    {
    	$oItem = Job::join('users','user_id','id')->select('jobs.*','picture','fullname')->where('id_job',$id)->get();
    	$title = $oItem[0]->fullname;
    	$job_level = Position::all();
		foreach ($job_level as $val) {
			if($oItem[0]->job_level == $val->id_joblevel){
				$oItem[0]->job_level = $val->name;
			}
		} 
		$job_categories = Category::all();
		foreach ($job_categories as $val) {
			if($oItem[0]->job_categories == $val->id_jobcat){
				$oItem[0]->job_categories = $val->name;
			}
		}
		//lấy việc làm khác cùng công ty
		//lấy bình luận cho công việc này
         $arCmtParent = Comment::where('parent_id',0)->where('job_id',$id)->orderBy('id_comment','DESC')->get();
        $arCmtChild = Comment::where('parent_id','!=',0)->where('job_id',$id)->get();
		//lấy công việc tương tự
    	return view ('jobs.detail_job',['title'=>$title, 'oItem'=>$oItem[0], 'arCmtParent'=>$arCmtParent,'arCmtChild'=>$arCmtChild]);
    }

    public function getDetailCompany($name, $id)
    {
    	$oItem = Company::join('users','user_id','id')->where('id',$id)->get();
    	$title = $oItem[0]->fullname;
    	$listJob = Job::join('users','user_id','id')->select('jobs.*')->where('id',$id)->get();
    	$job_level = Position::all();
    	foreach ($listJob as $value) {
    		foreach ($job_level as $val) {
    			if($value->job_level == $val->id_joblevel){
    				$value->job_level = $val->name;
    			}
    		} 
    	}
    	return view ('jobs.detail_company',['title'=>$title, 'oItem'=>$oItem[0], 'listJob'=>$listJob]);
    }

    public function sendCmt(Request $request){

        $arData =$request->all();
        $cmt = new Comment;

        $cmt->fullname = $arData['ahoten'];
        $cmt->email = $arData['aemail'];
        $cmt->job_id = $arData['aid_job'];
        $cmt->parent_id = 0;
        $cmt->content = $arData['acontent'];
        $cmt->status = 0;
        $result = $cmt->save();
        if($result){
            $request->session()->flash('msg','Thêm thành công');
        }else{
            $request->session()->flash('msg','Có lỗi khi thêm');
        }
        
        return view('jobs.sendcmt',['cmt'=>$cmt]);
    }

    public function repCmt(Request $request){
        $arData =$request->all();
        $cmt = new Comment();
  
        $cmt->fullname = $arData['ahoten'];
        $cmt->email = $arData['aemail'];
        $cmt->job_id = $arData['aid_job'];
        $cmt->parent_id = $arData['aidReCmt'];
        $cmt->content = $arData['acontent'];
        $cmt->status = 0;

        $result = $cmt->save();

        $oItem=Comment::findOrFail($cmt->id_comment);
        if($result){
            $request->session()->flash('msg','Thêm thành công');
        }else{
            $request->session()->flash('msg','Có lỗi khi thêm');
        }
        return view('jobs.repcmt',['child'=>$oItem]);
    }
}
