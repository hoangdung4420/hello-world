<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CatAddRequest;
use App\Http\Requests\CatEditRequest;
use App\Category;
class CategoryController extends Controller
{
    public function index()
    {
    	$title = "Quản lý danh mục";
    	return view('admin.category.index', ['title' => $title]);
    }

    public function postAdd(CatAddRequest $request)
    {
    	$arItem = [
    		'name' => $request->name,
    		'parent_id' => $request->parent_id,
    	];
    	//dd($arItem);
    	$result = Category::insert($arItem);
    	if($result){
    		$request->session()->flash('msgS','Thêm thành công');
    	}else{
            $request->session()->flash('msgW','Có lỗi khi thêm');
        }    
        return redirect()->route('admin.category.index');
    }

    public function getEdit($id=0)
    {
    	$oItem = Category::findOrFail($id);
    	//dd($oItem);
    	return view('admin.category.edit', ['oItem' => $oItem]);

    }

    public function postEdit($id=0,CatEditRequest $request)
    {
    	$oItem = Category::findOrFail($id);
    	if($oItem->name != $request->name){
    		$dem = Category::where('name', $request->name)->count();
    		if($dem > 0){
    			$request->session()->flash('msgW','Tên danh mục đã tồn tại');
    		}else{
                //co the thay ten hoac ca hai
                $oItem->name = $request->name;
                $oItem->parent_id = $request->parent_id;
                $result = $oItem->save();
            }
    	}else{
            //thay doi danh muc cha
             $oItem->parent_id = $request->parent_id;
            $result = $oItem->save();
        }
    	if($result){
            $request->session()->flash('msgS','Sửa thành công');
        }else{
            $request->session()->flash('msgW','Có lỗi khi sửa');
        } 
        return redirect()->route('admin.category.index');
    }

    public function del($id=0, Request $request)
    {
    	$oItem =Category::findOrFail($id);
    	if($oItem->parent_id != 0){
    		$arItem = Category::where('parent_id', $oItem->id_jobcat)->get();
    		foreach ($arItem as $item) {
    			$id = $item->id_jobcat;
    			$item->delete($id);
    		}
    	}
    	$result = $oItem->delete($oItem->id_jobcat);
    	if($result){
    		$request->session()->flash('msgS','Xóa thành công');
    	}else{
            $request->session()->flash('msgW','Có lỗi khi xóa');
        }    
        return redirect()->route('admin.category.index');
    }
}
