<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login.showLoginForm');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('overview')->with('success', 'Đăng nhập thành công!');
        }

        return redirect()->back()->withErrors(['login' => 'Tài khoản hoặc mật khẩu không đúng.'])->withInput();
    }
    public function logout(Request $request)
    {
        Auth::logout(); 

        return redirect('/')->with('success', 'Bạn đã đăng xuất thành công!');
    }

}
