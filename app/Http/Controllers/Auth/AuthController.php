<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
class AuthController extends Controller
{
    public function __construct( User $mUser)
    {
        $this->mUser = $mUser;
        
    }
    public function getLogin()
    {
    	$title = "Đăng nhập";
    	return view('auth.login',['title'=>$title]);
    }

    public function postLogin(Request $request)
    {
    	$email = $request->email;
    	$password = $request->password;

    	$result = Auth::attempt([
    		'email' => $email,
    		'password' => $password,
    		'active' => 1
    	]);

    	if($result){
    		return redirect()->route('admin.index.index');
    	}else{
    		$request->session()->flash('msg', 'Sai tên đăng nhập hoặc mật khẩu');

    		return redirect()->route('auth.login');
    	}

    }

    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('jobs.index');
    }
    public function getRegister()
    {
    	$title = "Đăng ký";
    	return view('auth.login',['title'=>$title]);
    }

    public function postRegister(Request $request)
    {
        $arItem = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt(trim($request->password)),
            'phone' => $request->phone,
            'level_id' => $request->level_id,
            'picture' =>'',
            'active' => 1,
        ];
        $result = $this->mUser->insert($arItem);
        if($result){
           Auth::attempt([
            'email' => $arItem['email'],
            'password' => $request->password,
            'active' => 1
            ]);
        }else{
            $request->session()->flash('msgW','Có lỗi khi thêm');
        }    
        return redirect()->route('admin.index.index');
    }

}
