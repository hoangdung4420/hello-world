<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobAddRequest;
use App\Job;
use App\Category;
use App\Like;
use Auth;
class JobController extends Controller
{
    public  function __construct(Like $mLike)
    {
        $this->mLike = $mLike;
    }
    public function index()
    {
    	$title = "quản lý công việc";
        if(Auth::user()->level_id == 3){
            echo 'chỉ hiển thị những công việc mà công ty đăng lên';
            die();
        }elseif(Auth::user()->level_id == 4){
            echo 'chỉ hiển thị những công việc theo danh sách đã nộp đơn, và đã like hoặc dislike, ko xem đk số hồ sơ đăng kí cũng như tổng số like, dislike,lượt đọc, nhưng nhảy ra xem ở public đk';
            die();
        }
    	$arItems = Job::join('users','user_id','id')->select('jobs.*','fullname')->where('jobs.active',1)->paginate(getenv('ADMIN_ROWS'));
    	$today = date('Y-m-d');
    	foreach ($arItems as $value) {
    		$oItem = Category::findOrFail($value->job_categories);
    		$value->job_categories = $oItem->name;
    		if($today > $value->expired){
    			$value->expired = date("d-m-Y", strtotime($value->expired)). '(hết hạn)';
    		}
             $value->like = $this->mLike->countJobLikes($value->id_job);
            $value->dislike = $this->mLike->countJobDislikes($value->id_job);
    	}
    	//dd($arItems);
    	return view('admin.job.index', ['title'=>$title, 'arItems'=>$arItems]);
    }

    public function getCV($id)
    {
        $title = "quản lý CV";
        return view('admin.job.cv', ['title'=>$title]);
    }

    public function getAdd()
    {
    	$title = "quản lý công việc";
    	return view('admin.job.add', ['title'=>$title]);
    }

    public function postAdd(JobAddRequest $request)
    {
    	$oItem = new Job;
        if(Auth::user()->level_id == 3){
            $oItem->user_id = Auth::user()->id;
        }elseif(Auth::user()->level_id == 1){
            $oItem->user_id = $request->user_id;
            $oItem->reader = $request->reader;
            if(isset($request->feature)){
                $oItem->feature = 1;
            }else{
                $oItem->feature = 0;
            }
        }
        
        $oItem->title = $request->title;
        $oItem->job_level = $request->job_level;
        $oItem->job_categories = $request->job_categories;
        $oItem->address = $request->address;
        $oItem->salary = $request->salary;
        $oItem->time_id = $request->time_id;
        $oItem->preview = $request->preview;
        $oItem->required = $request->required;
        $oItem->agency = $request->agency;
        $oItem->email = $request->email;
        $oItem->phone = $request->phone;
        $oItem->expired = $request->expired;
        $oItem->active = 1;
       
    	$result = $oItem->save();
        if($result){
            $request->session()->flash('msgS','Thêm thành công');
        }else{
            $request->session()->flash('msgW','Có lỗi khi thêm');
        }
    	return redirect()->route('admin.job.index');
    }

    public function getEdit($id, Request $request)
    {
        $title = "quản lý công việc";
        $oItem = Job::findOrFail($id);
        return view('admin.job.edit', ['title' => $title, 'oItem' => $oItem]);
    }

    public function postEdit($id, JobAddRequest $request)
    {
        $oItem = Job::findOrFail($id);
        if(Auth::user()->level_id == 3){
            $oItem->user_id = Auth::user()->id;
        }elseif(Auth::user()->level_id == 1){
            $oItem->user_id = $request->user_id;
            $oItem->reader = $request->reader;
            if(isset($request->feature)){
                $oItem->feature = 1;
            }else{
                $oItem->feature = 0;
            }
        }
        
        $oItem->title = $request->title;
        $oItem->job_level = $request->job_level;
        $oItem->job_categories = $request->job_categories;
        $oItem->address = $request->address;
        $oItem->salary = $request->salary;
        $oItem->time_id = $request->time_id;
        $oItem->preview = $request->preview;
        $oItem->required = $request->required;
        $oItem->agency = $request->agency;
        $oItem->email = $request->email;
        $oItem->phone = $request->phone;
        $oItem->expired = $request->expired;

        $oItem->active = $oItem->active;
       
        $result = $oItem->save();
        if($result){
            $request->session()->flash('msgS','Cập nhật thành công');
        }else{
            $request->session()->flash('msgW','Có lỗi khi cập nhật');
        }
        return redirect()->back();
    }

    public function del($id, Request $request)
    {
        $oItem = Job::findOrFail($id);
        $result = $oItem->delete();
        if($result){
            $request->session()->flash('msgS','Xóa thành công');
        }else{
            $request->session()->flash('msgW','Có lỗi khi xóa');
        }
        return redirect()->back();
    }
}
