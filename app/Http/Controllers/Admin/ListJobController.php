<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobAddRequest;
use App\Job;
use App\ListJob;
use App\Category;
use Auth;
class ListJobController extends Controller
{
    public function getCV($id)
    {
        $title = "quản lý CV";
        $arItems = ListJob::join('users','user_id','id')->select('fullname','list_jobs.*')->where('job_id', $id)->get(); 
        //dd($arItems);
        return view('admin.job.cv', ['title'=>$title, 'arItems' => $arItems, 'id_job' =>$id ]);
    }

    public function selectCV($id,$status)
    {
        $title = "quản lý CV";
        $arItems = ListJob::join('users','user_id','id')->select('fullname','list_jobs.*')->where('job_id', $id);
        
        if($status == 0){
            $arItems =  $arItems->where('status',0)->get(); 

        }elseif($status == 1){
            $arItems =  $arItems->where('status',1)->get(); 
        }elseif($status == 2){
            $arItems =  $arItems->where('status',2)->get(); 
        }else{
            return redirect()->back();
        }
       
        return view('admin.job.cv', ['title'=>$title, 'arItems' => $arItems, 'id_job' =>$id ]);
    }

}
