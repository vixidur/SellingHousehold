<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; // Correctly import the Session facade
use App\Models\Product; // Make sure to import your Product model
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    public function cartForm()
    {
        $cart = Session::get('cart', []);
        return view('cart.cart', compact('cart'));
    }

    public function addToCart(Request $request, $productId)
    {
        $cart = Session::get('cart', []);
        $product = Product::findOrFail($productId);

        if (isset($cart[$productId])) {
        // Nếu sản phẩm đã có trong giỏ, chỉ tăng số lượng
            $cart[$productId]['quantity'] += 1;
        } else {
        // Thêm sản phẩm mới vào giỏ hàng
        $cart[$productId] = [
            'name' => $product->name,
            'price' => $product->price, // Lưu giá đã giảm
            'discount' => $product->discount, // Lưu phần trăm giảm giá
            'image_url' => $product->image_url,
            'quantity' => 1,
        ];
        }

        // Lưu giỏ hàng vào session
        Session::put('cart', $cart);
        return redirect()->route('cart.show')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }





    public function updateCart(Request $request)
    {
        $cart = Session::get('cart', []);
        $quantities = $request->input('quantities', []);
        foreach($quantities as $productId => $quantity){
            if($quantity <= 0){
                unset($cart[$productId]); // xoá sp khi số lượng về 0 hoặc nhỏ hơn
            }else{
                $cart[$productId]['quantity'] = $quantity;
            }
        }
        Session::put('cart', $cart); // Cập nhật giỏ hàng trong session
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

    public function checkoutForm(Request $request)
    {
        $user = session('user');
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.show')->with('error', 'Giỏ hàng của bạn hiện đang trống.');
        }

        // Tính tổng tiền (bao gồm giảm giá)
        $totalPrice = 0;
        foreach ($cart as $productId => $item) {
            $priceAfterDiscount = $item['price'] * (1 - ($item['discount'] ?? 0) / 100);
            $totalPrice += $priceAfterDiscount * $item['quantity'];
        }

        return view('checkout.checkout', compact('cart', 'totalPrice', 'user'));
    }




    public function processCheckout(Request $request)
    {
        $cart = Session::get('cart', []);

        $name = $request->input('name');
        $email = $request->input('email');
        $address = $request->input('address');
        $paymentMethod = $request->input('payment_method');
        $quantities = $request->input('quantities', []);

        // Kiểm tra số lượng
        foreach ($quantities as $productId => $quantity) {
            if ($quantity <= 0) { 
                return redirect()->back()->with('error', 'Số lượng không hợp lệ cho sản phẩm: ' . $productId);
            }
        }

        // Kiểm tra email
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->with('error', 'Địa chỉ email không hợp lệ.');
        }

        // Chuẩn bị dữ liệu đơn hàng
        $orderData = [
            'name' => $name,
            'email' => $email,
            'address' => $address,
            'payment_method' => $paymentMethod,
            'cart' => $cart,
            'total_price' => array_sum(array_map(function($item) {
            $priceAfterDiscount = $item['price'] * (1 - $item['discount'] / 100);
                return $priceAfterDiscount * $item['quantity'];
            }, $cart)),
        ];

        // Gửi email đơn hàng
        Mail::to($email)->send(new \App\Mail\OrderPlaced($orderData));

        // Xóa giỏ hàng
        Session::forget('cart');

        return redirect()->route('order.success')->with('success', 'Đơn hàng của bạn đã được xử lý thành công và email đã được gửi!');
    }


}
