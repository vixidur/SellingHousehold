<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegisterModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('register.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:accounts',
            'username' => 'required|string|max:255|unique:accounts', 
            'password' => 'required|string|min:8',
            'agreed_to_terms' => 'required|accepted', 
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        RegisterModel::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'agreed_to_terms' => $request->has('agreed_to_terms') ? 1 : 0, // Fix here
        ]);

        session()->flash('success', 'Đăng ký thành công!');
        return redirect()->route('login');
    }
}