<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobAddRequest;
use App\Job;
use App\File;
use App\ListJob;
use App\Category;
use App\Contact;
use Auth;
class ListJobController extends Controller
{
    public function getCV($id)
    {
        $title = "quản lý CV";
        $arItems = ListJob::join('users','user_id','id')->select('fullname','list_jobs.*')->where('job_id', $id)->paginate(getenv('ADMIN_ROWS'));
        foreach ($arItems as $value) {
            $oItem = File::where('user_id',$value->user_id)->get();
            $value->file_id = $oItem[0]->id_file;
        }
        $job = Job::findOrFail($id);
        $nameJob = $job->title;
        return view('admin.job.cv', ['title'=>$title, 'arItems' => $arItems, 'id_job' =>$id, 'nameJob'=>$nameJob ]);
    }

    public function selectCV($id,$status)
    {
        $title = "quản lý CV";
        $arItems = ListJob::join('users','user_id','id')->select('fullname','list_jobs.*')->where('job_id', $id);
        
        if($status == 0){
            $arItems =  $arItems->where('status',0); 

        }elseif($status == 1){
            $arItems =  $arItems->where('status',1); 
        }elseif($status == 2){
            $arItems =  $arItems->where('status',2); 
        }else{
            return redirect()->back();
        }

        $arItems =  $arItems->paginate(getenv('ADMIN_ROWS')); 
        foreach ($arItems as $value) {
            $oItem = File::where('user_id',$value->user_id)->get();
            $value->file_id = $oItem[0]->id_file;
        }
        $job = Job::findOrFail($id);
        $nameJob = $job->title;

        return view('admin.job.cv', ['title'=>$title, 'arItems' => $arItems, 'id_job' =>$id, 'nameJob'=>$nameJob ]);
    }

    public function getAssess($id,Request $request)
    {
        $arItem=ListJob::findOrFail($id);
        return view('admin.job.assess', ['arItem'=>$arItem ]);
    }
    public function postAssess($id,Request $request)
    {
        $oItem = ListJob::findOrFail($id);
        $oItem->note = $request->note;
        if($request->status == ''){
            $oItem->status = '';
        }else{
            $oItem->status = $request->status;
        }
        
        $result = $oItem->save();
        if($result){
            $request->session()->flash('msgS','Đánh giá thành công');

        }else{
            $request->session()->flash('msgW','Có lỗi khi đánh giá');
        }
        return redirect()->back();
    }
    
    public function sendManyMail($id,Request $request)
    {
        $arId =$request->xoa;
        if(count($arId)==0){
            $request->session()->flash('msgW','Bạn chưa chọn người nhận thư');
            return redirect()->back();
        }
        $fullname = Auth::user()->fullname;
        $email = Auth::user()->email;
        
        foreach ($arId as $value) {
            $objContact = new Contact;
            $objContact->fullname = $fullname;
            $objContact->email = $email;
            $objContact->rep_id = $value;
            $objContact->subject = $request->subject;
            $objContact->content = $request->content;
            $objContact->status = 0;
            $objContact->parent_id = 0;
            $result = $objContact->save();
            if(!$result){
                $request->session()->flash('msgW','Có lỗi');
                return redirect()->back();
             }
            $oListJob = ListJob::where('job_id',$id)->where('user_id',$value)->get();
            $oListJob[0]->sendmail = 1;
            $oListJob[0]->save();
        }
        $request->session()->flash('msgS','Gửi thành công');
        return redirect()->back();
    }
}
