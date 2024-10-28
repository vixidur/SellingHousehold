<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function vnpayCallback(Request $request)
    {
        Log::info('VNPAY callback received', ['request_data' => $request->all()]);

        $orderId = $request->input('vnp_TxnRef');
        $responseCode = $request->input('vnp_ResponseCode');

        if ($responseCode === '00' && $orderId) {
            $user = Auth::user();
            $userId = $user->id;
            // Find order and mark as completed
            $order = Order::find($orderId);
            $cartItems = ShoppingCart::where('user_id', $userId)
                ->join('products', 'shopping_carts.product_id', '=', 'products.id')
                ->select('shopping_carts.*', 'products.name as product_name', 'products.price',
                    'products.image_url',
                    'products.discount')
                ->get();

            if (!$user) {
                Log::error('User not authenticated.');
                return redirect()->route('checkout.form')->with('error', 'Bạn chưa đăng nhập.');
            }
            $totalAmount = $cartItems->sum(function ($item) {
                return $item->price * (1 - ($item->discount ?? 0) / 100) * $item->quantity;
            });
            Log::info('Calculated total amount', ['user_id' => $userId, 'total_amount' => $totalAmount]);
            $orderData = [
                'order_id' => $order->id,
                'full_name' => $user->full_name,
                'email' => $user->email,
                'address' => $user->address,
                'payment_method' => $request->input('payment_method'),
                'cart' => $order->items->map(function ($item) {
                    if (!$item->product) {
                        Log::error('Product not found for order item', ['item_id' => $item->id]);
                        return [
                            'name' => 'Không có tên',
                            'price' => $item->price,
                            'quantity' => $item->quantity,
                            'image_url' => '', // Hoặc một URL mặc định
                        ];
                    }
                    return [
                        'name' => $item->product->name,
                        'price' => $item->price,
                        'quantity' => $item->quantity,
                        'image_url' => $item->product->image_url ?? '',
                    ];
                })->toArray(),
                'total_price' => $order->total_amount,
            ];
            
            if ($order) {
                $order->update(['status' => 'completed']);
                Mail::to($order->user->email)->send(new \App\Mail\OrderPlaced($orderData));
                Log::info('Payment successful', ['order_id' => $orderId]);
                return redirect()->route('order.success')->with('success', 'Thanh toán thành công!');
            }
            ShoppingCart::where('user_id', $userId)->delete();
        }
        Log::error('Payment failed or order not found', ['order_id' => $orderId]);
        return redirect()->route('cart.show')->with('error', 'Payment failed or order not found.');
    }

}
