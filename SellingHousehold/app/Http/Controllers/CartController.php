<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // Make sure to import your Product model
use Illuminate\Support\Facades\Auth;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Log;
class CartController extends Controller
{
    public function cartForm()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xem giỏ hàng.');
        }else{
            $userId = Auth::user()->id;
            // Lấy các sản phẩm trong giỏ hàng của người dùng
            $cartItems = ShoppingCart::where('user_id', $userId)
                ->join('products', 'shopping_carts.product_id', '=', 'products.id')
                ->select('shopping_carts.*', 'products.name', 'products.price', 'products.image_url', 'products.discount')
                ->get();
        
            // Kiểm tra xem giỏ hàng có sản phẩm không
            if ($cartItems->isEmpty()) {
                return view('cart.cart', [
                    'cart' => [], // Trả về giỏ hàng rỗng
                    'totalPrice' => 0, // Tổng giá là 0 nếu không có sản phẩm
                    'totalQuantity' => 0 // Tổng số lượng là 0 nếu không có sản phẩm
                ]);
            }
        
            // Chuyển đổi dữ liệu thành mảng
            $cart = $cartItems->mapWithKeys(function ($item) {
                return [
                    $item->product_id => [
                        'name' => $item->name,
                        'price' => $item->price,
                        'image_url' => $item->image_url,
                        'discount' => $item->discount,
                        'quantity' => $item->quantity,
                    ]
                ];
            })->toArray();
        
            // Tính tổng giá
            $totalPrice = $cartItems->sum(function ($item) {
                $priceAfterDiscount = $item->price * (1 - ($item->discount ?? 0) / 100);
                return $priceAfterDiscount * $item->quantity;
            });
        
        
            // Trả về view với dữ liệu giỏ hàng
            return view('cart.cart', compact('cart', 'totalPrice'));
        }
    }
    
        

    public function addToCart(Request $request, $productId)
    {
        if(!Auth::check()){
            return redirect()->route('login')->with('error', 'Vui long dang nhap de them vao gio hang');
        }

        $userId = Auth::user()->id; // Lấy ID người dùng đang đăng nhập

        $cartItem = ShoppingCart::where('user_id', $userId)
                                ->where('product_id', $productId)
                                ->first();
        
        if ($cartItem) {
            // Nếu sản phẩm đã tồn tại trong giỏ, tăng số lượng lên
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            // Tạo sản phẩm mới trong giỏ hàng
            $product = Product::findOrFail($productId);
            ShoppingCart::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }
    
        return redirect()->route('cart.show')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }
    
    public function updateCart(Request $request)
    {
        $userId = Auth::user()->id; // Lấy ID người dùng
        $quantities = $request->input('quantities', []);
    
        foreach ($quantities as $productId => $quantity) {
            if ($quantity <= 0) {
                // Xóa mục nếu số lượng <= 0
                ShoppingCart::where('user_id', $userId)
                            ->where('product_id', $productId)
                            ->delete();
            } else {
                // Cập nhật số lượng
                ShoppingCart::where('user_id', $userId)
                            ->where('product_id', $productId)
                            ->update(['quantity' => $quantity]);
            }
        }
    
        return redirect()->route('cart.show')->with('success', 'Giỏ hàng đã được cập nhật!');
    }
    
    public function removeFromCart($productId)
    {
        $userId = Auth::user()->id;
        ShoppingCart::where('user_id', $userId)->where('product_id', $productId)->delete();

        return redirect()->route('cart.show')->with('success', 'San pham da duoc xoa khoi gio hang');
    }
        
}
