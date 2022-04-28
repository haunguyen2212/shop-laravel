<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin(){
        return view('backend.login');
    }

    public function postLogin(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required|max:20',
        ],[
            'username.required' => 'Bạn chưa nhập tài khoản',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.max' => 'Mật khẩu không quá 20 kí tự',
        ]);
        
        if(Auth::attempt(['username' => $request->username,'password' => $request->password, 'role' => '1'])){
            return redirect()->route('admin.home');
        }
        else{
            return redirect()->route('admin.login')->withInput()->with('status','Tài khoản hoặc mật khẩu không chính xác');
        }
    }

    public function logout(){
        Auth::logout();
        return back();
    }
}
