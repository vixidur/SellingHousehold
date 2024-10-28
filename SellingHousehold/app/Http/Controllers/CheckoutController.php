<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Mail;
use App\Models\Order; 
use App\Models\OrderItem; 
use App\Models\Payment;
use Illuminate\Support\Facades\Log;
use Exception;
class CheckoutController extends Controller
{
    public function checkoutForm(Request $request)
    {
        $user = Auth::user();
        $userId = Auth::user()->id; 
        // $cart = Session::get('cart', []);
        $cartItems = ShoppingCart::where('user_id', $userId)
                                ->join('products', 'shopping_carts.product_id', '=', 'products.id')
                                ->select('shopping_carts.*', 'products.name', 'products.price', 'products.image_url', 'products.discount')
                                ->get();
        if($cartItems->isEmpty()){
            return redirect()->route('cart.show')->with('error', 'Gio hang cua ban hien dang trong!');
        }
        // Tính tổng tiền (bao gồm giảm giá)
        $totalPrice = $cartItems->sum(function($item){
            $priceAfterDiscount = $item->price * (1 - ($item->discount?? 0) / 100);
            return $priceAfterDiscount * $item->quantity;
        });

        $totalQuantity = ShoppingCart::where('user_id', $userId)->count();

        return view('checkout.checkout', compact('cartItems', 'totalPrice', 'user', 'totalQuantity'));
    }

    public function processCheckout(Request $request)
    {
        try {
            $user = Auth::user();
            $userId = $user->id;
    
            // Lấy thông tin giỏ hàng từ database
            $cartItems = ShoppingCart::where('user_id', $userId)
                ->join('products', 'shopping_carts.product_id', '=', 'products.id')
                ->select('shopping_carts.*', 'products.name', 'products.price', 'products.image_url', 'products.discount')
                ->get();
    
            if ($cartItems->isEmpty()) {
                return redirect()->route('cart.show')->with('error', 'Giỏ hàng của bạn hiện đang trống.');
            }
    
            // Validate các input từ form checkout
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'address' => 'required|string',
                'payment_method' => 'required|in:vnpay,onepay_visa,onepay_atm,cod',
            ]);
    
            // Tính tổng số tiền
            $totalAmount = $cartItems->sum(function ($item) {
                $priceAfterDiscount = $item->price * (1 - ($item->discount ?? 0) / 100);
                return $priceAfterDiscount * $item->quantity;
            });
    
            // Nếu chọn VNPAY, chuyển hướng đến trang thanh toán của VNPAY
            if ($request->input('payment_method') === 'vnpay') {
                return $this->createPayment($request, $totalAmount);
            }
    
            // Nếu không phải VNPAY, tiếp tục tạo đơn hàng
            $order = Order::create([
                'user_id' => $userId,
                'total_amount' => $totalAmount,
                'status' => 'pending',
            ]);
    
            // Tạo các bản ghi order_items
            foreach ($cartItems as $item) {
                $priceAfterDiscount = $item->price * (1 - ($item->discount ?? 0) / 100);
    
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $priceAfterDiscount * $item->quantity,
                ]);
            }
    
            // Tạo bản ghi thanh toán
            Payment::create([
                'order_id' => $order->id,
                'payment_method' => $request->input('payment_method'),
                'payment_status' => 'pending',
                'payment_date' => now(),
            ]);
    
            // Gửi email với thông tin đơn hàng
            $orderData = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'payment_method' => $request->input('payment_method'),
                'cart' => $cartItems->map(function ($item) {
                    return [
                        'name' => $item->name,
                        'price' => $item->price,
                        'discount' => $item->discount,
                        'quantity' => $item->quantity,
                        'image_url' => $item->image_url,
                    ];
                })->toArray(),
                'total_price' => $totalAmount,
            ];
    
            try {
                Mail::to($request->input('email'))->send(new \App\Mail\OrderPlaced($orderData));
            } catch (Exception $e) {
                Log::error('Email Sending Error: ' . $e->getMessage());
                // Bạn có thể muốn lưu thông báo lỗi hoặc thêm thông báo cho người dùng
            }
    
            // Xóa giỏ hàng sau khi xử lý đơn hàng thành công
            ShoppingCart::where('user_id', $userId)->delete();
    
            return redirect()->route('order.success')->with('success', 'Đơn hàng của bạn đã được xử lý thành công và email đã được gửi!');
        } catch (Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            return redirect()->route('checkout.form')->with('error', 'Xảy ra lỗi trong quá trình thanh toán!');
        }
    }
    
    
    public function createPayment(Request $request, $totalAmount)
    {

        $order = Order::create([
            'user_id' => Auth::user()->id,
            'total_amount' => $totalAmount,
            'status' => 'pending',
        ]);

        $orderId = $order->id;

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('order.success', ['order_id' => $orderId]); // URL sẽ được gọi lại sau khi thanh toán
        $vnp_TmnCode = "JWZCW2Y5"; // Mã website tại VNPAY 
        $vnp_HashSecret = "ARPLQUGJI86HW3P20I4QKAS3K1E176XU"; // Chuỗi bí mật
        $vnp_TxnRef = $orderId; // Tham chiếu giao dịch
        $vnp_OrderInfo = "Thanh toán đơn hàng #{$vnp_TxnRef}";
        $vnp_OrderType = "billpayment"; // Kiểu đơn hàng
        $vnp_Amount = $totalAmount * 100; // Số tiền (đơn vị là VND)
        $vnp_Locale = "vn"; // Ngôn ngữ
        $vnp_IpAddr = request()->ip(); // Địa chỉ IP của người dùng
    
        // Dữ liệu gửi đến VNPAY
        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];
    
        // Tạo mã bảo mật
        ksort($inputData);
        $hashdata = http_build_query($inputData);
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
        $vnp_Url .= "?" . $hashdata . '&vnp_SecureHash=' . $vnpSecureHash;
    
        // Chuyển hướng đến VNPAY
        return redirect($vnp_Url);
    }
    
}
