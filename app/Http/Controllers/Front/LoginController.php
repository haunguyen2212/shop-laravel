<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function getLogin(){
        return view('frontend.login');
    }

    public function postLogin(Request $request){

        $request->validate([
            'usrname' => 'required',
            'passwd' => 'required|max:20',
        ],[
            'usrname.required' => 'Bạn chưa nhập tài khoản',
            'passwd.required' => 'Vui lòng nhập mật khẩu',
            'passwd.max' => 'Mật khẩu không quá 20 kí tự'
        ]);

        if(Auth::attempt(['username' => $request->usrname,'password' => $request->passwd, 'role' => '0'])){
            return redirect()->route('home');
        }
        else{
            return redirect()->route('login')->withInput()->with('status','Tài khoản hoặc mật khẩu không chính xác');
        }
    }

    public function getRegister(){
        return view('frontend.register');
    }

    public function postRegister(Request $request){
        $request->validate([
            'username' => 'required|unique:users|min:3|max:30',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|max:20',
        ],[
            'username.required' => 'Tên không được bỏ trống',
            'username.unique' => 'Tên tài khoản đã tồn tại',
            'username.min' => 'Tài khoản phải có ít nhất 3 kí tự',
            'username.max' => 'Tài khoản không quá 30 kí tự',
            'name.required' => 'Tên không được bỏ trống',
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Email không hợp lệ',
            'password.required' => 'Mật khẩu không được bỏ trống',
            'password.min' => 'Mật khẩu phải có ít nhất 5 kí tự',
            'password.max' => 'Mật khẩu không quá 20 kí tự'
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $save = $user->save();

        if($save){
            return back()->with('status', 'Đăng kí tài khoản thành công');
        }
        else{
            return back()->withInput()->with('error', 'Đăng kí thất bại, thử lại sau');
        }

    }

    public function logout(){
        Auth::logout();
        return back();
    }
}
