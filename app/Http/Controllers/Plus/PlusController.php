<?php

namespace App\Http\Controllers\Plus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Province;
use App\District;
use App\Like;
use Auth;

class PlusController extends Controller
{
    public  function __construct(Like $mLike)
    {
        $this->mLike = $mLike;
    }
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

    public function addLike(Request $request)
    {
        $arData = $request->all();
        $oitem_id = $arData['id'];
        $oitem = $arData['oitem'];
        $status = $arData['status'];
        //b1:kiểm tra đã like hoặc dislike chưa
        $checkExits = Like::where('oitem_id',$oitem_id)->where('oitem',$oitem)->where('user_id',Auth::user()->id)->get();
        
        if(count($checkExits)){
            //đã
            $oldStatus = $checkExits[0]->status;
            //kiểm tra trạng thái cũ trùng với trạng thái mới thì xóa, nếu khác thì update trạng thái mới
            if($oldStatus == $status){
                $checkExits[0]->delete();
            }else{
                $checkExits[0]->status = $status;
                $checkExits[0]->save();
            }
        }else{
            //chưa thì tạo mới 
           $oItem = new Like;
            $oItem->oitem_id = $oitem_id;
            $oItem->user_id = Auth::user()->id;
            $oItem->oitem = $oitem;
            $oItem->status = $status;
            $oItem->save(); 
        }
        //b2: lấy số lượng like, dislike của job
        if($oitem == 2){
            $demLike = $this->mLike->countJobLikes($oitem_id);
            $demDisLike = $this->mLike->countJobDisLikes($oitem_id);
        }elseif($oitem == 1){
            $demLike = $this->mLike->countCompanyLikes($oitem_id);
            $demDisLike = $this->mLike->countCompanyDisLikes($oitem_id);
        }
        if($status == 1){
            $iconLike = 'fa fa-thumbs-up';
            $iconDisLike = 'fa fa-thumbs-o-down';
        }elseif($status == 0){
            $iconLike = 'fa fa-thumbs-o-up';
            $iconDisLike = 'fa fa-thumbs-down';
        }
        if(isset($oldStatus)){
            if($oldStatus == 1){
                $iconLike = 'fa fa-thumbs-o-up';
            }elseif($oldStatus == 0){
                $iconDisLike = 'fa fa-thumbs-o-down';
            }
        }
        echo '<span>'.$demLike.'<i class="'.$iconLike.'" aria-hidden="true" onclick="changeLike('.$oitem_id.','.$oitem.',1)"></i></span>';
        echo '<span>'.$demDisLike.'<i class="'.$iconDisLike.'" aria-hidden="true" onclick="changeLike('.$oitem_id.','.$oitem.',0)"></i></span>';
    }

}
