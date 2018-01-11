<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobAddRequest;
use App\Job;
use App\Category;
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
    	
    	dd($oItem);
    	return redirect()->route('admin.job.index');
    }
}
