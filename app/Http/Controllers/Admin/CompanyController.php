<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyEditRequest;
use App\Company;
use App\ListCategory;
use App\Job;
use Auth;
class CompanyController extends Controller
{
    public function index()
    {
    	$title = "Quản lý công ty";
    	$arItems = Company::join('users','user_id','id')->select('id','id_company','fullname','picture','address','email','size','reader')->orderBy('id_company','DESC')->paginate(getenv('ADMIN_ROWS'));
    	foreach ($arItems as $value) {
    		$value->size = Job::where('user_id',$value->id)->count();
    	}
    	return view('admin.company.index',['title'=>$title, 'arItems'=>$arItems]);
    }

    public function getEdit($id)
    {
    	$title = "Quản lý công ty";
    	$oItem =  Company::join('users','user_id','id')->where('id_company',$id)->select('detail_companies.*','fullname')->get();
        //dd($oItem);
    	$listCats = ListCategory::join('job_categories','jobcat_id','id_jobcat')->where('user_id', $oItem[0]->user_id)->get();
    	return view('admin.company.edit',['title'=>$title, 'oItem'=>$oItem[0], 'listCats' => $listCats]);
    }

    public function postEdit($id, CompanyEditRequest $request)
    {
    	$title = "Quản lý công ty";
    	$oItem =  Company::findOrFail($id);
        $oItem->size = $request->size;
        $oItem->benifit = $request->benifit;
        $oItem->preview = $request->preview;
    	$oItem->detail = $request->detail;
        if(Auth::user()->level_id){
           $oItem->reader = $request->reader;
            if(isset($request->feature)){
                $oItem->feature = 1;
            }else{
                $oItem->feature = 0;
            }
        }
       $result = $oItem->save();
        if($result){
            $request->session()->flash('msgS','Cập nhật thành công');
        }else{
            $request->session()->flash('msgW','Có lỗi khi cập nhật');
        } 
    	return redirect()->back();
    }

    

   
}
