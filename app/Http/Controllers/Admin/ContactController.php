<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
class ContactController extends Controller
{
    public function index()
    {
    	$title = "Quản lý liên hệ"; 

    	$arItems = Contact::orderBy('id_contact','DESC')->paginate(getenv('ADMIN_ROWS'));

    	return view('admin.contact.index', ['title'=>$title, 'arItems'=>$arItems]);
    }
}
