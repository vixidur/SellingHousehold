<?php
namespace App\Http\Controllers;

use App\Mail\OrderPlaced;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function success(Request $request)
    {
// Ghi log toàn bộ dữ liệu yêu cầu
        Log::info('VNPAY callback received', ['request_data' => $request->all()]);

// Lấy thông tin từ yêu cầu
        $orderId = $request->input('order_id');
        $vnp_ResponseCode = $request->input('vnp_ResponseCode');

        if (is_null($orderId) || is_null($vnp_ResponseCode)) {
            Log::error('Received callback with missing order_id or response_code', [
                'request_data' => $request->all(), // Ghi lại tất cả dữ liệu yêu cầu để phân tích
            ]);
            return redirect()->route('cart.show')->with('error', 'Invalid response from payment gateway.');
        }

// Tìm đơn hàng
        $order = Order::find($orderId);
        if (!$order) {
            Log::error('Order not found', ['order_id' => $orderId]);
            return redirect()->route('cart.show')->with('error', 'Đơn hàng không tồn tại.');
        }

        if ($order->items->isEmpty()) {
            Log::error('Order has no items', ['order_id' => $order->id]);
            return redirect()->route('cart.show')->with('error', 'Đơn hàng không có sản phẩm.');
        }

        if ($order && $vnp_ResponseCode === '00') {
            Log::info('Order found and payment successful', ['order_id' => $order->id]);

// Cập nhật trạng thái đơn hàng
            $order->update(['status' => 'completed']);
            Log::info('Order status updated to completed.', ['order_id' => $order->id]);

// Gửi email xác nhận đơn hàng
            $user = Auth::user();
            $orderData = [
                'order_id' => $order->id,
                'full_name' => $user->full_name,
                'email' => $user->email,
                'address' => $user->address,
                'payment_method' => $request->input('payment_method'),
                'cart' => $order->items->map(function ($item) {
// Kiểm tra sản phẩm có tồn tại không
                    if (!$item->product) {
                        Log::error('Product not found for order item', ['item_id' => $item->id]);
                        return [
                            'name' => 'Không có tên', // Giá trị mặc định
                            'price' => $item->price,
                            'quantity' => $item->quantity,
                            'image_url' => '', // Hoặc một URL mặc định
                        ];
                    }

// Nếu sản phẩm tồn tại, trả về dữ liệu
                    return [
                        'name' => $item->product->name ?? 'Không có tên', // Sử dụng toán tử null coalescing
                        'price' => $item->price,
                        'quantity' => $item->quantity,
                        'image_url' => $item->product->image_url ?? '',
                    ];
                })->toArray(),
                'total_price' => $order->total_amount,
            ];

            try {
                Log::info('Order Data for email:', $orderData);
// Gửi email xác nhận đơn hàng
                Mail::to($user->email)->send(new OrderPlaced($orderData));
                Log::info('Order confirmation email sent to user.');
            } catch (Exception $e) {
                Log::error('Email Sending Error: ' . $e->getMessage());
            }

            return redirect()->route('order.success')->with('success', 'Thanh toán thành công và email xác nhận đã được gửi!');
        } else {
            Log::error('Order not found or payment unsuccessful', ['order_id' => $orderId]);
            return redirect()->route('cart.show')->with('error', 'Thanh toán không thành công hoặc đơn hàng không tồn tại.');
        }
    }

}
