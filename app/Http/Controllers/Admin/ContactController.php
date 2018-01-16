<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use Auth;
class ContactController extends Controller
{
    public function index()
    {
    	$title = "Quản lý liên hệ"; 
    	if(Auth::user()->level_id == 3){
            echo 'chỉ hiển thị những liên hệ của công ty';
            die();
        }elseif(Auth::user()->level_id == 4){
            echo 'chỉ hiển thị những liên hệ của ứng viên';
            die();
        }
    	$arItems = Contact::orderBy('id_contact','DESC')->paginate(getenv('ADMIN_ROWS'));

    	return view('admin.contact.index', ['title'=>$title, 'arItems'=>$arItems]);
    }
}
