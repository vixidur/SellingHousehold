<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function success()
    {
        return view('order.success'); // Đảm bảo rằng 'order.success' tồn tại
    }
}
