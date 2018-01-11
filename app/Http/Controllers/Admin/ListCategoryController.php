<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ListCategory;
class ListCategoryController extends Controller
{
    public function addCat(Request $request){
        $data = $request->all();
        $dem=ListCategory::where('user_id',$data['userId'])->get();
        if(count( $dem ) <5){
            $check = 1;
            foreach ($dem as $val) {
                if($val->jobcat_id == $data['idCat']){
                    $check = 0;
                }
            }
             if($check){
                $newItem = [
                'user_id' => $data['userId'],
                'jobcat_id' => $data['idCat'],
                ];
                
                $result = ListCategory::insert($newItem);
            }else{
                 echo '<script>alert("Bạn đã chọn công việc này")</script>';
            }
        }else{
            echo '<script>alert("Bạn chỉ được chọn 5 công việc")</script>';
        }
       
        $arItem = ListCategory::where('user_id',$data['userId'])->join('job_categories','jobcat_id','id_jobcat')->get();
        foreach($arItem as $listCat){
          echo '<li><span class="cat_candidate">'.$listCat->name.'<a href="javascript:void(0)" title="xóa" onclick="delCat('.$listCat->id_listcat.')">X</a></span></li>';
        }
    }

   public function DelCat(Request $request){
        $data = $request->all();
        
        $oItem = ListCategory::findOrFail($data['idListCat']);
        $result = $oItem->delete();
       
        $arItem = ListCategory::where('user_id',$data['userId'])->join('job_categories','jobcat_id','id_jobcat')->get();
        foreach($arItem as $listCat){
          echo '<li><span class="cat_candidate">'.$listCat->name.'<a href="javascript:void(0)" title="xóa" onclick="delCat('.$listCat->id_listcat.')">X</a></span></li>';
        }
    }
}
