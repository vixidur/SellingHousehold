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
        // Validate dữ liệu đầu vào
        $request->validate([
            'username' => 'required|string|min:3|max:50', // Username phải là chuỗi, từ 3-50 ký tự
            'password' => 'required|string|min:6', // Password ít nhất 6 ký tự
        ], [
        // Custom messages
            'username.required' => 'Vui lòng nhập tên người dùng.',
            'username.string' => 'Tên người dùng phải là một chuỗi ký tự.',
            'username.min' => 'Tên người dùng phải có ít nhất 3 ký tự.',
            'username.max' => 'Tên người dùng không được vượt quá 50 ký tự.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.string' => 'Mật khẩu phải là chuỗi ký tự.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ]);

        // Lấy thông tin xác thực
        $credentials = $request->only('username', 'password');

        // Kiểm tra xác thực
        if (Auth::attempt($credentials)) {
            // Lấy thông tin người dùng từ database
            $user = Auth::user();

            // Lưu thông tin vào session
            session([
            'user' => [
            'email' => $user->email,
                'full_name' => $user->name,
                'phone_number' => $user->phone,
                'address' => $user->address,
            ]
        ]);

            return redirect()->intended('overview')->with('success', 'Đăng nhập thành công!');
        }

        // Trả về nếu thông tin không đúng
        return redirect()->back()->withErrors(['login' => 'Tài khoản hoặc mật khẩu không đúng.'])->withInput();
    }



    public function logout(Request $request)
    {
        Auth::logout(); 

        return redirect('/')->with('success', 'Bạn đã đăng xuất thành công!');
    }

}
