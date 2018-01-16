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
            echo 'chỉ hiển thị những bình luận của công việc của công ty';
            die();
        }elseif(Auth::user()->level_id == 4){
            echo 'chỉ hiển thị những bình luận đã đăng và câu trả lời cho nó';
            die();
        }
    	$arItems = Comment::orderBy('id_comment','DESC')->paginate(getenv('ADMIN_ROWS'));
    	foreach ($arItems as $arItem) {
    		if($arItem->parent_id != 0){
    			$oItem = Comment::findOrFail($arItem->parent_id);
    			$arItem->commentparent = str_limit($oItem->content,30);
    		}
    		$job = Job::findOrFail($arItem->job_id);
    		$arItem->job_name = $job->title;
    	}

    	return view('admin.comment.index', ['title'=>$title, 'arItems'=>$arItems]);
    }
}
