<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAddRequest;
use Auth;
use Session;
use App\User;
use App\Company;
use App\File;
use App\About;
class AuthController extends Controller
{
    public function __construct( User $mUser)
    {
        $this->mUser = $mUser;
        
    }
    public function candidateLogin()
    {
        $title = "Đăng nhập";
        if(!Auth::check()){
            $_SESSION['level'] = 4;
        }
        $rule = About::where('title','Điều khoản cho ứng viên')->get();
        return view('auth.login',['title'=>$title,'rule'=>$rule[0]]);
    }
    public function companyLogin()
    {
        $title = "Đăng nhập";
        if(!Auth::check()){
            $_SESSION['level'] = 3;
        }
        $rule = About::where('title','Điều khoản cho công ty/doanh nghiệp')->get();
        return view('auth.login',['title'=>$title,'rule'=>$rule[0]]);
    }
    public function getLogin()
    {
    	$title = "Đăng nhập";
        if(!Auth::check()){
            $_SESSION['level'] = 1;
        }
    	return view('auth.login',['title'=>$title]);
    }

    public function postLogin(Request $request)
    {
    	$email = $request->email;
    	$password = $request->password;

        if($_SESSION['level'] == 1){
            $result = Auth::attempt([
                'email' => $email,
                'password' => $password,
                'active' => 1,
                'level_id' =>1
            ]);
            if(!$result){
                $result = Auth::attempt([
                    'email' => $email,
                    'password' => $password,
                    'active' => 1,
                    'level_id' =>2
                ]); 
            }
        }elseif($_SESSION['level'] == 3){
            $result = Auth::attempt([
                'email' => $email,
                'password' => $password,
                'active' => 1,
                'level_id' =>3
            ]);
        }elseif($_SESSION['level'] == 4){
             $result = Auth::attempt([
                'email' => $email,
                'password' => $password,
                'active' => 1,
                'level_id' =>4
            ]);
        }
    	if($result){
    		return redirect()->route('admin.index.index');
    	}else{
    		$request->session()->flash('msg', 'Sai tên đăng nhập hoặc mật khẩu');

    		return redirect()->back();
    	}
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('jobs.index');
    }

    public function postRegister(UserAddRequest $request)
    {
        $arItem = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt(trim($request->password)),
            'phone' => $request->phone,
            'level_id' => $_SESSION['level'],
            'picture' =>'',
            'active' => 1,
        ];
        
        $result = $this->mUser->insert($arItem);

        if($result){
        //tạo files với candidate
        //tạo detail_company với caompany
            $oItem = $this->mUser->where('email',$request->email)->get();
            if($_SESSION['level'] == 3){
                $ar = [
                    'user_id' =>  $oItem[0]->id,
                    'feature' =>  0,
                    'reader' => 0,
                    'liked' => 0,
                ];
                $kq1 = Company::insert($ar);
            }elseif($_SESSION['level'] == 4){
                 $ar = [
                    'user_id' =>  $oItem[0]->id,
                    'active' =>  0,
                ];
                $kq2 = File::insert($ar);
            }
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
