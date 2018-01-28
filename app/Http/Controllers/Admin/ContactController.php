<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact; 
use Auth;
class ContactController extends Controller
{
    public function index()
    {
    	$title = "Quản lý liên hệ"; 
    	if(Auth::user()->level_id == 3){
            //chỉ hiển thị những liên hệ của công ty đã nhận
            $arItems = Contact::orderBy('id_contact','DESC')->where('rep_id',Auth::user()->id)->paginate(getenv('ADMIN_ROWS'));
        }elseif(Auth::user()->level_id == 4){
            //chỉ hiển thị những liên hệ của ứng viên
            $arItems = Contact::orderBy('id_contact','DESC')->where('rep_id',Auth::user()->id)->paginate(getenv('ADMIN_ROWS'));
        }else{
            $arItems = Contact::orderBy('id_contact','DESC')->where('rep_id',Auth::user()->id)->paginate(getenv('ADMIN_ROWS'));
        }
    	return view('admin.contact.index', ['title'=>$title, 'arItems'=>$arItems]);
    }

    public function indexSend(){
        $title = "Quản lý liên hệ"; 
        if(Auth::user()->level_id == 3){
            //chỉ hiển thị những liên hệ của công ty đã gửi
            $arItems = Contact::orderBy('id_contact','DESC')->where('email',Auth::user()->email)->paginate(getenv('ADMIN_ROWS'));
        }elseif(Auth::user()->level_id == 4){
            //chỉ hiển thị những liên hệ của ứng viên đã gửi
            $arItems = Contact::orderBy('id_contact','DESC')->where('email',Auth::user()->email)->paginate(getenv('ADMIN_ROWS'));
        }else{
            $arItems = Contact::orderBy('id_contact','DESC')->where('email',Auth::user()->email)->paginate(getenv('ADMIN_ROWS'));
        }
        
        return view('admin.contact.index', ['title'=>$title, 'arItems'=>$arItems]);
    }

    public function indexOther(){
        $title = "Quản lý liên hệ"; 
        $arItems = Contact::orderBy('id_contact','DESC')->where('email','!=',Auth::user()->email)->where('rep_id','!=',Auth::user()->id)->paginate(getenv('ADMIN_ROWS'));
        return view('admin.contact.index', ['title'=>$title, 'arItems'=>$arItems]);
    }

    public function del($id, Request $request)
    {
        $oItem = Contact::findOrFail($id);
        $countCmtReps = Contact::where('parent_id',$oItem->id_contact)->where('created_at','<',$oItem->created_at)->count();
        if($countCmtReps > 0){
           $request->session()->flash('msgW','Hãy xóa các liên hệ con trước');
            return redirect()->back();
        }
        $result = $oItem->delete();
        if($result){
            $request->session()->flash('msgS','Xóa thành công');
        }else{
            $request->session()->flash('msgW','Có lỗi');
        }
        return redirect()->back();
    }

    public function repContact($id, Request $request)
    {
        $oItem = Contact::join('users','contacts.email','users.email')->where('id_contact',$id)->get();
        $objContact = new Contact;
        $objContact->fullname = Auth::user()->fullname;
        $objContact->email = Auth::user()->email;
        $objContact->rep_id = $oItem[0]->id;
        $objContact->subject = 'Re:'.$oItem[0]->subject;
        $objContact->content = $request->content;
        $objContact->status = 0;
        $objContact->parent_id = $id;
        $result = $objContact->save();
        if($result){
            $request->session()->flash('msgS','Gửi thành công');
        }else{
            $request->session()->flash('msgW','Có lỗi');
        }
        return redirect()->back();
    } 
}
