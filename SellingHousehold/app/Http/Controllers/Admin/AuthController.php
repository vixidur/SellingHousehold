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
                return response()->json(['status' => 'not_admin']); 
            }
            return response()->json(['status' => 'success', 'role' => 'admin', 'redirectUrl' => route('admin.dashboard')]);
        } else {
            return response()->json(['status' => 'error']);
        }
    }

    public function myprofile(){
        return view('admin.layouts.myprofile'); 
    }
    
    //Category
    public function category(){
        return view('admin.category'); 
    }

    //payment
    public function payment(){
        return view('auth.payment'); 
    }

    // Xử lý đăng xuất admin
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Đã đăng xuất.');
    }
}
