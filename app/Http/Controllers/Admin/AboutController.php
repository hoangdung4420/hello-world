<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\About;
class AboutController extends Controller
{
    public function index()
    {
        
    	$title = "Quản lý thông tin website";
    	$arItems = About::orderBy('social','DESC')->get();
    	return view('admin.about.index', ['title'=>$title, 'arItems' =>$arItems]);
    }

    public function getEdit($id)
    {
        $title = "Quản lý thông tin website";
        $oItem = About::findOrFail($id);
        return view('admin.about.edit', ['title'=>$title, 'oItem' =>$oItem]);
    }

    public function postEdit($id,Request $request)
    {
    	$data = $request->all();
    	$oItem = About::findOrFail($id);
        $oItem->detail = $request->detail;
       $result = $oItem->save();
        if($result){
            $request->session()->flash('msgS','Sửa thành công');
        }else{
            $request->session()->flash('msgW','Có lỗi khi sửa');
        }
        return redirect()->back();
    }
}
