<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartForm()
    {
        return view('cart.cart');
    }

    public function overviewCart(){
        return view('overview.layouts.cart');
    }
}
