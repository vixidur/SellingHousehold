<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; // Correctly import the Session facade
use App\Models\Product; // Make sure to import your Product model

class CartController extends Controller
{
    public function cartForm()
    {
        $cart = Session::get('cart', []);
        return view('cart.cart', compact('cart'));
    }

    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image_url' => $product->image_url,
            ];
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }

    public function updateCart(Request $request)
    {
        $cart = Session::get('cart', []);
        foreach ($request->quantities as $productId => $quantity) {
            if ($quantity == 0) {
                unset($cart[$productId]);
            } else {
                $cart[$productId]['quantity'] = $quantity;
            }
        }

        Session::put('cart', $cart);
        return redirect()->back()->with('success', 'Giỏ hàng đã được cập nhật!');
    }
}
