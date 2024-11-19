<?php

namespace App\Http\Controllers;

use App\Models\LienHe;
use Illuminate\Http\Request;

class LienHeController extends Controller
{
    public function lienhe(){
        return view('lienhe.lienhe');
    }
    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'ten' => ['required','string','max:255',],
            'email' => ['required','email','max:255',],
            'noi_dung' => ['required','string','min:10',],
        ], [
            // Thông báo lỗi cho trường "ten"
            'ten.required' => 'Vui lòng nhập họ tên.',
            'ten.string' => 'Họ tên phải là một chuỗi ký tự hợp lệ.',
            'ten.max' => 'Họ tên không được vượt quá 255 ký tự.',

            // Thông báo lỗi cho trường "email"
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Định dạng email không hợp lệ.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',

            // Thông báo lỗi cho trường "noi_dung"
            'noi_dung.required' => 'Vui lòng nhập nội dung.',
            'noi_dung.string' => 'Nội dung phải là một chuỗi ký tự hợp lệ.',
            'noi_dung.min' => 'Nội dung phải có ít nhất 10 ký tự.',
        ]);

        LienHe::create([
            'ten' => $request->ten,
            'email' => $request->email,
            'noi_dung' => $request->noi_dung,
        ]);

        return redirect()->route('lienhe')->with('success', 'Liên hệ đã được lưu thành công!');
    }
}
