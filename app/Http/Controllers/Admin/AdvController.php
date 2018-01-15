<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdvAddRequest;
use App\Http\Requests\AdvEditRequest;
use App\Adv;
use Auth;
class AdvController extends Controller
{
    public function index()
    {
    	$title = "Quản lý quảng cáo";
    	$arItems = Adv::orderBy('slice','DESC')->paginate(getenv('ADMIN_ROWS'));
    	return view('admin.adv.index', ['title'=>$title, 'arItems' => $arItems]);
    }

    public function getArrange($name)
    {
        $title = "Quản lý quảng cáo";
        if($name < 3){
            $arItems = Adv::where('slice',$name)->orderBy('active','DESC')->paginate(getenv('ADMIN_ROWS'));
        }elseif($name == 3){
            $arItems = Adv::where('active',0)->paginate(getenv('ADMIN_ROWS'));
        }elseif($name == 4){
            $arItems = Adv::where('active',1)->paginate(getenv('ADMIN_ROWS'));
        }
        
        return view('admin.adv.index', ['title'=>$title, 'arItems' => $arItems]);
    }

    public function getAdd()
    {
    	$title = "Quản lý quảng cáo";
    	return view('admin.adv.add', ['title'=>$title]);
    }

    public function postAdd(AdvAddRequest $request)
    {
    	$arItem = [
            'name' => $request->name,
            'link' => $request->link,
            'slice' => $request->slice,
            'picture' => '',
            'active' => 0,
        ];

        if(Auth::user()->level_id == 1 && isset($request->active)){
        	$arItem['active'] = 1;
        }
    	$picture = $request->picture;
        if($picture != ''){
            $tmp = $request->file('picture')->store('files');
            $arTmp = explode('/',$tmp);
            $picture = end($arTmp);
            $arItem['picture'] = $picture;
        }
        $result = Adv::insert($arItem);
        if($result){
        	$request->session()->flash('msgS','Thêm thành công');
        }else{
            $request->session()->flash('msgW','Có lỗi khi thêm');
        }    
    	return redirect()->route('admin.adv.index');
    }

   public function getEdit($id)
    {
    	$title = "Quản lý quảng cáo";
    	$oItem = Adv::findOrFail($id);
    	return view('admin.adv.edit', ['title'=>$title, 'oItem'=>$oItem]);
    }

    public function postEdit($id,AdvEditRequest $request)
    {
    	$oItem = Adv::findOrFail($id);
    	$arItem = [
            'name' => $request->name,
            'link' => $request->link,
            'slice' => $request->slice,
            'picture' => $oItem->picture,
            'active' => $oItem->active,
        ];

        if(Auth::user()->level_id == 1){
        	$arItem['active'] = isset($request->active)?1:0;
        }

        if($request->picture !=''){
        	$picture = $request->picture;
	        if($picture != ''){
	            $tmp = $request->file('picture')->store('files');
	            $arTmp = explode('/',$tmp);
	            $picture = end($arTmp);
	            $arItem['picture'] = $picture;
	        }
	        Storage::delete('files/'.$oItem->picture);
        }
	    	
        $result = $oItem->update($arItem);
        if($result){
        	$request->session()->flash('msgS','Sửa thành công');
        }else{
            $request->session()->flash('msgW','Có lỗi khi sửa');
        }    
    	return redirect()->back();
    }

    public function del($id,Request $request)
    {
    	$oItem = Adv::findOrFail($id);
		
		Storage::delete('files/'.$oItem->picture);

		$result = $oItem->delete();
		if($result){
        	$request->session()->flash('msgS','Xóa thành công');
        }else{
            $request->session()->flash('msgW','Có lỗi khi xóa');
        }
    	return redirect()->back();
    }
}
