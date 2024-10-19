<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function AdminLogin()
    {
        return view('admin.auth.login'); // Đường dẫn tới file view form đăng nhập
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $user = Auth::guard('admin')->user();
            if ($user->role !== 'admin') {
                Auth::guard('admin')->logout();
                return redirect()->back()->with('not_admin', true); // Thông báo không phải admin
            }

            return redirect()->intended(route('admin.dashboard'))->with('success', 'Đăng nhập thành công!');
        }        

        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }

    public function myprofile(){
        return view('admin.layouts.myprofile'); 
    }
    
    //Category
    public function category(){
        return view('admin.category'); 
    }
    // Xử lý đăng xuất admin
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Đã đăng xuất.');
    }
}
