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

        // Thay đổi dòng dưới đây để trả về với thông báo thành công
        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }

    public function updateCart(Request $request)
    {
        $cart = Session::get('cart', []);

        foreach ($request->input('quantities') as $productId => $quantity) {
            if ($quantity <= 0) {
                unset($cart[$productId]); // Remove product from cart if quantity is 0 or less
            } elseif (isset($cart[$productId])) {
                $cart[$productId]['quantity'] = $quantity; // Update quantity
            }
        }

        Session::put('cart', $cart);
        return redirect()->route('cart.show')->with('success', 'Giỏ hàng đã được cập nhật!');
    }

    public function removeFromCart($productId)
    {
        $cart = session()->get('cart', []);

        // Xoá sản phẩm khỏi giỏ hàng
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.show')->with('success', 'Sản phẩm đã được xoá khỏi giỏ hàng.');
    }

    public function checkout()
    {
        return view('payment.payment');
    }
}
