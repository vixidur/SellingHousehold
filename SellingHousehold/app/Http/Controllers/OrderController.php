<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function success(Request $request)
    {
        // Kiểm tra và xử lý kết quả từ VNPAY
        $orderId = $request->input('order_id'); // Lấy order_id từ request
        $order = Order::find($orderId);
    
        if ($order && $order->status == 'successful') { // Giả sử bạn đã cập nhật trạng thái
            $orderData = [
                'name' => $order->name,
                'email' => $order->email,
                'address' => $order->address,
                'payment_method' => $order->payment_method,
                'cart' => $order->items, // Lấy thông tin sản phẩm đã đặt
                'total_price' => $order->total_amount,
            ];
    
            // Gửi email
            Mail::to($order->email)->send(new \App\Mail\OrderPlaced($orderData));
    
            return view('order.success', compact('order'));
        }
    
        return redirect()->route('checkout.form')->with('error', 'Thanh toán không thành công!');
    }
    
}
