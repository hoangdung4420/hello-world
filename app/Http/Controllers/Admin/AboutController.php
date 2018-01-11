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

    public function postEdit(Request $request)
    {
    	$data = $request->all();
    	$oItem = About::findOrFail($data['aid']);
        $detail_old = $oItem->detail;
    	$oItem->detail = $data['adetail'];
    	$result = $oItem->update();
        if($result){
            echo '<script>alert("sửa thành công");</script>';
            echo $data['adetail'];
        }else{
            echo '<script>alert("có lỗi xảy ra");</script>';
            echo $detail_old;
        }
        
    }
}
