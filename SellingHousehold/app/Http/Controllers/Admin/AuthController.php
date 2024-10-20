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
        // Lấy thông tin người dùng đã đăng nhập
        $user = Auth::guard('admin')->user();

        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (!$user) {
        return redirect()->route('admin.login')->with('error', 'Xin vui lòng đăng nhập để truy cập trang này.');
        }

        return view('admin.layouts.myprofile', compact('user'));
    }
    public function updateProfile(Request $request)
    {
        // Validate the request data
        $request->validate([
            'fullname' => 'required|string|max:255',
            'emailaddress' => 'required|email|max:255',
            'phonenumber' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'picture_url' => 'nullable|url', // Optional: if you want to validate the picture URL
            'pass' => 'required|string', // Validate current password
            'newpass' => 'nullable|string|min:6', // Optional: new password
        ]);

        $user = Auth::guard('admin')->user();

        // Check the current password
        if (!Hash::check($request->pass, $user->password)) {
            return redirect()->back()->withErrors(['pass' => 'Mật khẩu cũ không chính xác.']);
        }

        // Update user details
        $user->full_name = $request->fullname;
        $user->email = $request->emailaddress;
        $user->phone_number = $request->phonenumber;
        $user->address = $request->address;

        // Update picture URL if provided
        if ($request->filled('picture_url')) {
            $user->picture_url = $request->picture_url;
        }

        // Update the new password if provided
        if ($request->filled('newpass')) {
            $user->password = Hash::make($request->newpass);
        }

        $user->save(); // Save changes to the database

        return redirect()->route('myprofile')->with('success', 'Cập nhật hồ sơ thành công.');
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
