<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobAddRequest;
use App\Job;
use App\Category;
use Auth;
class JobController extends Controller
{
    public function index()
    {
    	$title = "quản lý công việc";
    	$arItems = Job::join('users','user_id','id')->select('jobs.*','fullname')->where('jobs.active',1)->paginate(getenv('ADMIN_ROWS'));
    	$today = date('Y-m-d');
    	foreach ($arItems as $value) {
    		$oItem = Category::findOrFail($value->job_categories);
    		$value->job_categories = $oItem->name;
    		if($today > $value->expired){
    			$value->expired = date("d-m-Y", strtotime($value->expired)). '(hết hạn)';
    		}
    	}
    	//dd($arItems);
    	return view('admin.job.index', ['title'=>$title, 'arItems'=>$arItems]);
    }

    public function getAdd()
    {
    	$title = "quản lý công việc";
    	return view('admin.job.add', ['title'=>$title]);
    }

    public function postAdd(Request $request)
    {
    	$oItem = new Job;
        $oItem->user_id = Auth::user()->id;
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
        $oItem->active = 0;
        if(Auth::user()->level_id){
           $oItem->reader = $request->reader;
            if(isset($request->feature)){
                $oItem->feature = 1;
            }else{
                $oItem->feature = 0;
            }
        }
    	$result = $oItem->save();
        if($result){
            $request->session()->flash('msgS','Thêm thành công');
        }else{
            $request->session()->flash('msgW','Có lỗi khi thêm');
        }
    	return redirect()->route('admin.job.index');
    }
}
