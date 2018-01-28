<?php

namespace App\Http\Controllers\Plus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Province;
use App\District;
use App\Like;
use App\Job;
use App\Follow;
use App\Category;
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
        $status = $arData['status'];
        //b1:kiểm tra đã like hoặc dislike chưa
        $checkExits = Like::where('oitem_id',$oitem_id)->where('user_id',Auth::user()->id)->get();
        
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
            $oItem->status = $status;
            $oItem->save(); 

        }
        //b2: lấy số lượng like, dislike của job
        $demLike = $this->mLike->countJobLikes($oitem_id);
        $demDisLike = $this->mLike->countJobDisLikes($oitem_id);
        //b3: lấy icon phù hợp
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
        //b4:hiển thị
        echo '<span>'.$demLike.'<i class="'.$iconLike.'" aria-hidden="true" onclick="changeLike('.$oitem_id.',1)"></i></span>';
        echo '<span>'.$demDisLike.'<i class="'.$iconDisLike.'" aria-hidden="true" onclick="changeLike('.$oitem_id.',0)"></i></span>';
    }

    public function changeFollow(Request $request)
    {
        $arData = $request->all();
        $company_id = $arData['id'];
        $check = Follow::where('company_id',$company_id)->where('user_id',Auth::user()->id)->get();
        if(count($check)==1){
            $result = $check[0]->delete();
            if($result){
                echo '<button  class="btn btn-default btn-block btn-lg" onclick="changeFollow('.$company_id.',1 )">Theo dõi</button>';
            }
        }else{
            $oItem = new Follow;
            $oItem->company_id = $company_id;
            $oItem->user_id = Auth::user()->id;
            $result = $oItem->save();
            if($result){
                echo '<button  class="btn btn-success btn-block btn-lg" onclick="changeFollow('.$company_id.',0 )">Đã Theo dõi</button>';
            }
        }
    }

    public function autocompleteProvince(Request $request)
    {
        $term=$request->term;
        $data = Province::where('name','LIKE','%'.$term.'%')->get();

        $result=array();

        foreach ($data as $key => $value){
            $result[]=['value' =>$value->name];
        }

        return response()->json($result);
    }
    public function autocompleteCategory(Request $request)
        {
            $term=$request->term;
            $data = Category::where('name','LIKE','%'.$term.'%')->where('parent_id','!=',0)->get();

            $result=array();

            foreach ($data as $key => $value){
                $result[]=['value' =>$value->name];
            }

            return response()->json($result);
        }
}
