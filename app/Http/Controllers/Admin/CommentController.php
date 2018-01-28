<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\Job;
use Auth;
class CommentController extends Controller
{
    public function index()
    {
    	$title = "Quản lý bình luận"; 
        if(Auth::user()->level_id == 3){
            //chỉ hiển thị những bình luận của công việc của công ty'
            $arItems = Comment::join('jobs','job_id','id_job')->where('user_id',Auth::user()->id)->orderBy('id_comment','DESC')->select('comments.*')->paginate(getenv('ADMIN_ROWS'));

        }elseif(Auth::user()->level_id == 4){
            //chỉ hiển thị những bình luận đã đăng và câu trả lời cho nó
            $arItems = Comment::where('email',Auth::user()->email)->orderBy('id_comment','DESC')->paginate(getenv('ADMIN_ROWS'));
        }else{
            $arItems = Comment::orderBy('id_comment','DESC')->paginate(getenv('ADMIN_ROWS'));
        }
    	foreach ($arItems as $arItem) {
    		if($arItem->parent_id != 0){
                //lấy comment con gần nhất trước đó, nếu ko có thì lấy comment cha
                $countChildCmt = Comment::where('parent_id',$arItem->parent_id)->count();
                $oItem = Comment::where('parent_id',$arItem->parent_id)->where('created_at','<',$arItem->created_at)->orderBy('id_comment','DESC')->limit(1)->get();
                if(count($oItem) != 0){
                    $arItem->commentparent = $oItem[0]->fullname.':'.$oItem[0]->content;
                }else{
                     $oItem = Comment::findOrFail($arItem->parent_id);
                    $arItem->commentparent = $oItem->fullname.':'.$oItem->content;
                }
    		}
    		$job = Job::findOrFail($arItem->job_id);
    		$arItem->job_name = $job->title;
    	}
    	return view('admin.comment.index', ['title'=>$title, 'arItems'=>$arItems]);
    }

    public function getRep($id,Request $request)
    {
        $oItem = Comment::findOrFail($id);
        return view('admin.comment.repcmt',['id_comment'=>$oItem->id_comment]);
    }
    public function postRep($id,Request $request)
    {
        
        $oItem = new Comment;
        $oItem->content = $request->content;
        //lấy parent cha
        $obj = Comment::findOrFail($id);
        if($obj->parent_id == 0){
           $oItem->parent_id = $obj->id_comment; 
        }else{
            $oItem->parent_id = $obj->parent_id; 
        }
        //
        $oItem->fullname = Auth::user()->fullname;
        $oItem->email = Auth::user()->email;
        $oItem->job_id = $obj->job_id;
        $oItem->status = 0;
        $result = $oItem->save();
        if($result){
            $request->session()->flash('msgS','Đã gửi thành công');
        }else{
            $request->session()->flash('msgW','Có lỗi');
        }
        return redirect()->back();
    }

    public function delmany(Request $request)
    {
        $arId =$request->xoa;
        if(count($arId) == 0){
            $request->session()->flash('msgW','Bạn chưa chọn bình luận để xóa');
            return redirect()->back();
        }
        $arParents = null;
        $arNotDel = null;
        $str ='';
        foreach($arId as $id){
            $oItem = Comment::findOrFail($id);
            if($oItem->parent_id == 0){
                $countCmtReps = Comment::where('parent_id',$oItem->id_comment)->count();
                if($countCmtReps > 0){
                    $arParents[] = $oItem;
                    continue;
                }
            }
            $oItem->delete();
        }
        if(count($arParents) > 0){
            foreach ($arParents as $value) {
                $countCmtReps = Comment::where('parent_id',$oItem->id_comment)->count();
                if($countCmtReps != 0){
                    $arNotDel[] = $value->id_comment;
                    $str .='"'.$value->content.'" ';
                }
            }
        }

        if(count($arNotDel) > 0){
            $request->session()->flash('msgW','Bình luận '.$str.'không thể xóa nếu chưa xóa hết bình luận con');
        }else{
            $request->session()->flash('msgS','Đã xóa thành công');
        }
        return redirect()->back();
    }
}
