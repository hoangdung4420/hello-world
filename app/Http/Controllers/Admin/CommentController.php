<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
class CommentController extends Controller
{
    public function index()
    {
    	$title = "Quản lý bình luận"; 

    	$arItems = Comment::orderBy('id_comment','DESC')->paginate(getenv('ADMIN_ROWS'));

    	return view('admin.comment.index', ['title'=>$title, 'arItems'=>$arItems]);
    }
}
