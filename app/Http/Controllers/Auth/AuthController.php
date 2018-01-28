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

    public function ajaxSignup()
    {
        return view('auth.signupa');
    }

    public function ajaxLogin()
    {
        return view('auth.logina');
    }

    public function postLoginCandidate(Request $request)
    {
       $email = $request->email;
       $password = $request->password;

        $result = Auth::attempt([
                'email' => $email,
                'password' => $password,
                'active' => 1,
            ]);

        if($result){
            if(Auth::user()->level_id == 4){
                $_SESSION['level'] = 4;
                $request->session()->flash('msgS', 'Đăng nhập thành công');
                 if($request->session()->has('ungtuyen')){
                        $request->session()->flash('ungtuyens',2);
                    }
                return redirect()->back();
            }else{
                $request->session()->flash('msgW', 'Email không phải của ứng viên');
                return redirect()->back();
            }
        }else{
             $request->session()->flash('msgW', 'Sai tên đăng nhập hoặc mật khẩu');
             return redirect()->back();
        }
    }

    public function postSignupCandidate(UserAddRequest $request)
    {
        $oItem = new User;
        $oItem->fullname = $request->fullname;
        $oItem->email = $request->email;
        $oItem->password = bcrypt(trim($request->password));
        $oItem->phone = $request->phone;
        $oItem->level_id = 4;
        $oItem->picture = '';
        $oItem->active = 1;
        $result = $oItem->save();
        
        if($result){
        //tạo files với candidate
            $id = $oItem->id;
            $file = new File;
            $file->user_id = $id;
            $file->active = 0;
            $file->save();
        Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'active' => 1
        ]);
            $_SESSION['level'] = 4;
         $request->session()->flash('msgS', 'Đăng ký thành công');
         if($request->session()->has('ungtuyen')){
                $request->session()->flash('ungtuyens',2);
            }
        }else{
        $request->session()->flash('msgW', 'Có lỗi xảy ra');
        }
        return redirect()->back();
    }

//cho company
    public function companyLogin()
    {
        $title = "Đăng nhập";
        if(!Auth::check()){
            $_SESSION['level'] = 3;
        }
        $rule = About::where('title','Điều khoản cho công ty/doanh nghiệp')->get();
        return view('auth.login',['title'=>$title,'rule'=>$rule[0]]);
    }

    public function signupCom(UserAddRequest $request)
    {
        $arItem = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt(trim($request->password)),
            'phone' => $request->phone,
            'level_id' => 3,
            'picture' =>'',
            'active' => 1,
        ];
        $result = $this->mUser->insert($arItem);

        if($result){
            $_SESSION['level'] = 3;
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

//cho admin và mod
    public function getLogin()
    {
        $title = "Đăng nhập";
        if(!Auth::check()){
            $_SESSION['level'] = 1;
        }
        return view('auth.login',['title'=>$title]);
    }
//cho admin và mod và company
    public function postLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

            $result = Auth::attempt([
                'email' => $email,
                'password' => $password,
                'active' => 1,
            ]);
        if($result){
            if(Auth::user()->level_id == 1 || Auth::user()->level_id == 2){
                $_SESSION['level'] = 1;
                return redirect()->route('admin.index.index');
            }else{
                if(Auth::user()->level_id == 3){
                    $_SESSION['level'] = 3;
                    return redirect()->route('admin.index.index');
                }else{
                    Auth::logout();
                    $request->session()->flash('msg', 'Email ứng viên không thể đăng nhập tại đây');
                }
            }
        }else{
            $request->session()->flash('msg', 'Sai tên đăng nhập hoặc mật khẩu');
        }
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        session_destroy();
        return redirect()->route('jobs.index');
    }
}
