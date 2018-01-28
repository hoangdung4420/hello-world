<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobAddRequest;
use App\Job;
use App\Category;
use App\Like;
use App\ListJob;
use App\Province;
use App\District;
use Auth;
class JobController extends Controller
{
    public  function __construct(Like $mLike, ListJob $mListJob)
    {
        $this->mLike = $mLike;
        $this->mListJob = $mListJob;

    }
    public function index()
    {
    	$title = "quản lý công việc";
        if(Auth::user()->level_id == 3){
           $arItems = $this->indexCompany(Auth::user()->id);
        }elseif(Auth::user()->level_id == 4){
            //lấy danh sách công việc mà các công ty theo dõi đăng, chưa hết hạn, chưa nộp hồ sơ,ko dislike
            $today = date('Y-m-d');
            $arItems = Job::join('follows','company_id','jobs.user_id')->where('follows.user_id',Auth::user()->id)->where('expired','>=',$today)->orderBy('id_job','DESC')->paginate(getenv('ADMIN_ROWS'));
            foreach ($arItems as $key => $value) {
                $checksendCV = ListJob::where('job_id',$value->id_job)->count();
                $checkdislike = Like::where('oitem_id',$value->id_job)->where('status',0)->count();
                if($checksendCV != 0){
                    unset($arItems[$key]);
                }elseif($checkdislike != 0){
                    unset($arItems[$key]);
                }{
                    $oItem = Category::findOrFail($value->job_categories);
                    $value->job_categories = $oItem->name;
                }
            }
            if(count($arItems) == 0){
                $notice= "Chưa có cho công việc gợi ý nào cho bạn";
            }else{
                $notice= "Công việc gợi ý cho bạn";
            }
            return view('admin.job.jobofcandidate', ['title'=>$title, 'arItems'=>$arItems,'notice'=>$notice,'dotime'=>0]);
        }else{
            $arItems = $this->indexAdmin();
        }
    	return view('admin.job.index', ['title'=>$title, 'arItems'=>$arItems]);
    }
    public function indexAdmin()
    {
        $arItems = Job::join('users','user_id','id')->select('jobs.*','fullname')->where('jobs.active',1)->orderBy('id_job','DESC')->paginate(getenv('ADMIN_ROWS'));
        $today = date('Y-m-d');
        foreach ($arItems as $value) {
            $oItem = Category::findOrFail($value->job_categories);
            $value->job_categories = $oItem->name;
            if($today > $value->expired){
                $value->expired = date("d-m-Y", strtotime($value->expired)). '(hết hạn)';
            }else{
                $value->expired = date("d-m-Y", strtotime($value->expired));
            }
            $value->like = $this->mLike->countJobLikes($value->id_job);
            $value->dislike = $this->mLike->countJobDislikes($value->id_job);
            $value->totalcv = $this->mListJob->totalCvOfJob($value->id_job);
        }
       // dd($arItems);
        return $arItems;
    }
 
    public function indexCompany($user_id)
    {
        $arItems = Job::join('users','user_id','id')->select('jobs.*')->where('jobs.active',1)->where('jobs.user_id',$user_id)->orderBy('id_job','DESC')->paginate(getenv('ADMIN_ROWS'));
        $today = date('Y-m-d');
        foreach ($arItems as $value) {
            $oItem = Category::findOrFail($value->job_categories);
            $value->job_categories = $oItem->name;
            if($today > $value->expired){
                $value->expired = date("d-m-Y", strtotime($value->expired)). '(hết hạn)';
            }
             $value->like = $this->mLike->countJobLikes($value->id_job);
            $value->dislike = $this->mLike->countJobDislikes($value->id_job);
            $value->totalcv = $this->mListJob->totalCvOfJob($value->id_job);
        }
        return $arItems;
    }

    public function jobOfCompany($id){
        $title = "quản lý công việc";
         $arItems = $this->indexCompany($id);
        return view('admin.job.index', ['title'=>$title, 'arItems'=>$arItems]);
    }

    public function indexLike()
    {
        $title = "quản lý công việc";
        $arItems = Like::join('jobs','likes.oitem_id','jobs.id_job')->join('users','jobs.user_id','id')->select('jobs.*','fullname','likes.updated_at as dotime','likes.status as like')->where('likes.status',1)->where('jobs.active',1)->where('likes.user_id',Auth::user()->id)->paginate(getenv('ADMIN_ROWS'));
        $today = date('Y-m-d');
        foreach ($arItems as $value) {
            $oItem = Category::findOrFail($value->job_categories);
            $value->job_categories = $oItem->name;
            if($today > $value->expired){
                $value->expired = date("d-m-Y", strtotime($value->expired)). '(hết hạn)';
            }
        }
        if(count($arItems) == 0){
                $notice= "Bạn chưa like công việc nào";
            }else{
                $notice= "Công việc bạn đã like";
            }
        return view('admin.job.jobofcandidate', ['title'=>$title, 'arItems'=>$arItems,'notice'=>$notice]);
    }

    public function indexDisLike()
    {
        $title = "quản lý công việc";
        $arItems = Like::join('jobs','likes.oitem_id','jobs.id_job')->join('users','jobs.user_id','id')->select('jobs.*','fullname','likes.updated_at as dotime','likes.status as like')->where('likes.status',0)->where('jobs.active',1)->where('likes.user_id',Auth::user()->id)->paginate(getenv('ADMIN_ROWS'));
        $today = date('Y-m-d');
        foreach ($arItems as $value) {
            $oItem = Category::findOrFail($value->job_categories);
            $value->job_categories = $oItem->name;
            if($today > $value->expired){
                $value->expired = date("d-m-Y", strtotime($value->expired)). '(hết hạn)';
            }
        }
        if(count($arItems) == 0){
                $notice= "Bạn chưa dislike công việc nào";
            }else{
                $notice= "Công việc bạn đã dislike";
            }
        return view('admin.job.jobofcandidate', ['title'=>$title, 'arItems'=>$arItems,'notice'=>$notice]);
    }

    public function hadSendCv()
    {
        $title = "quản lý công việc";
        $arItems = ListJob::join('jobs','job_id','id_job')->join('users','list_jobs.user_id','id')->select('jobs.*','cv_file','list_jobs.created_at as dotime')->where('jobs.active',1)->where('id',Auth::user()->id)->where('candidate_del',0)->paginate(getenv('ADMIN_ROWS'));
        foreach ($arItems as $value) {
            $oItem = Category::findOrFail($value->job_categories);
            $value->job_categories = $oItem->name;
        }
       // dd($arItems);
        if(count($arItems) == 0){
                $notice= "Bạn chưa ứng tuyển công việc nào";
            }else{
                $notice= "Công việc bạn đã ứng tuyển";
            }
        return view('admin.job.jobofcandidate', ['title'=>$title, 'arItems'=>$arItems,'notice'=>$notice]);
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
            $oItem->reader = 0;
            $oItem->feature = 0;
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
        $oItem->salary = 0;
        $oItem->salary = $request->salary;
        if(isset($request->salaryagree)){
            $oItem->salary = 0;
        }
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
        if(Auth::user()->level_id >2 && $oItem->user_id != Auth::user()->id){
             $request->session()->flash('msgW','Bạn không được phép truy cập nội dung này');
            return redirect()->route('admin.job.index');
          }
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
        $oItem->salary = 0;
        $oItem->salary = $request->salary;
        if(isset($request->salaryagree)){
            $oItem->salary = 0;
        }
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
        //xóa follow, like,hồ sơ liên quan
        if($result){
            $request->session()->flash('msgS','Xóa thành công');
        }else{
            $request->session()->flash('msgW','Có lỗi khi xóa');
        }
        return redirect()->back();
    }

    public function searchJob(Request $request)
    {
        $title = "Tìm kiếm";
        $arItems = Job::join('users','user_id','id')->select('jobs.*','fullname','picture');

        //title
        $key['name'] = $request->name;
        if($key['name'] != ''){
           $arItems = $arItems->where('title','like','%'.$key['name'].'%');
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
           $arItems = $arItems->where('job_categories',$category);
        }
        //address
        $key['cities'] = $request->cities;
        if($key['cities'] != ''){
          $arItems = $arItems->where('jobs.address','like','%'.$key['cities'].'%');
        }

        //đếm số việc làm
        $sum = $arItems->count();
        
        $arItems = $arItems->orderBy('expired','DESC')->paginate(getenv('ADMIN_ROWS'));
        $today = date('Y-m-d');
        foreach ($arItems as $value) {
            $oItem = Category::findOrFail($value->job_categories);
            $value->job_categories = $oItem->name;
            if($today > $value->expired){
                $value->expired = date("d-m-Y", strtotime($value->expired)). '(hết hạn)';
            }else{
                $value->expired = date("d-m-Y", strtotime($value->expired));
            }
            $value->like = $this->mLike->countJobLikes($value->id_job);
            $value->dislike = $this->mLike->countJobDislikes($value->id_job);
            $value->totalcv = $this->mListJob->totalCvOfJob($value->id_job);
        }

        return view ('admin.job.index',['title'=>$title, 'arItems' => $arItems, 'sum' =>$sum ,'key'=>$key]);
    }
}
