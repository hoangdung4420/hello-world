<?php

namespace App\Http\Controllers\Plus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Province;
use App\District;

class PlusController extends Controller
{
    public function ajaxDistrict(Request $request)
    {
    	$arData =$request->all();
    	$id = $arData['aid'];
    	if($id != 0){
    		$arItems = District::where('province_id',$id)->get();
    	}else{
    		$arItems = District::all();
    	}
    	
    	echo '<select name="district_id" class="form-control" >';
           foreach($arItems as $arItem){
           	echo '<option value="' .$arItem->id_district. '">'.$arItem->type.' '.$arItem->name .'</option>';
           }
         echo '</select>';
    }
}
