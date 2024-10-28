<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\ShoppingCart;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function checkoutForm(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;

// Retrieve cart items
        $cartItems = ShoppingCart::where('user_id', $userId)
            ->join('products', 'shopping_carts.product_id', '=', 'products.id')
            ->select('shopping_carts.*', 'products.name', 'products.price', 'products.image_url', 'products.discount')
            ->get();

// Check for empty cart
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.show')->with('error', 'Giỏ hàng của bạn hiện đang trống!');
        }

// Calculate total price
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->price * (1 - ($item->discount ?? 0) / 100) * $item->quantity;
        });

// Get total quantity
        $totalQuantity = $cartItems->sum('quantity');

        return view('checkout.checkout', compact('cartItems', 'totalPrice', 'user', 'totalQuantity'));
    }

    public function processCheckout(Request $request)
    {
        try {
// Ensure the user is authenticated
            $user = Auth::user();
            if (!$user) {
                Log::error('User not authenticated.');
                return redirect()->route('checkout.form')->with('error', 'Bạn chưa đăng nhập.');
            }

            $userId = $user->id;
            Log::info('Bắt đầu processCheckout', ['user_id' => $userId, 'full_name' => $user->full_name]);

// Ensure user full_name is available
            if (!$user->full_name) {
                Log::error('User full_name is missing.');
                return redirect()->route('checkout.form')->with('error', 'Tên đầy đủ của bạn không được tìm thấy.');
            }

// Validate input data
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'address' => 'required|string',
                'payment_method' => 'required|in:vnpay,cod',
            ]);

            if ($validator->fails()) {
                Log::error('Validation failed', ['errors' => $validator->errors()->toArray()]);
                return redirect()->route('checkout.form')->withErrors($validator)->withInput();
            }

// Retrieve cart items with product details
            $cartItems = ShoppingCart::where('user_id', $userId)
                ->join('products', 'shopping_carts.product_id', '=', 'products.id')
                ->select('shopping_carts.*', 'products.name as product_name', 'products.price', 'products.image_url',
                    'products.discount')
                ->get();

            if ($cartItems->isEmpty()) {
                Log::error('Cart is empty', ['user_id' => $userId]);
                return redirect()->route('checkout.form')->with('error', 'Giỏ hàng của bạn đang trống.');
            }

// Calculate total amount
            $totalAmount = $cartItems->sum(function ($item) {
                return $item->price * (1 - ($item->discount ?? 0) / 100) * $item->quantity;
            });
            Log::info('Calculated total amount', ['user_id' => $userId, 'total_amount' => $totalAmount]);

// Create order
            $order = Order::create([
                'user_id' => $userId,
                'total_amount' => $totalAmount,
                'status' => 'pending',
            ]);

// Create order items
            foreach ($cartItems as $item) {
                Log::info('Thêm sản phẩm vào đơn hàng', [
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price * (1 - ($item->discount ?? 0) / 100),
                ]);

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price * (1 - ($item->discount ?? 0) / 100),
                ]);
            }

// Create payment record
            Payment::create([
                'order_id' => $order->id,
                'amount' => $totalAmount,
                'payment_method' => $request->input('payment_method'),
                'status' => 'pending',
            ]);

// Handle payment based on selected method
            if ($request->input('payment_method') === 'vnpay') {
                return $this->createPayment($request, $order->id, $totalAmount);
            }

            Log::info('Đơn hàng đã được tạo', [
                'order_id' => $order->id,
                'total_amount' => $totalAmount,
            ]);

// Prepare order data for email
            $orderData = [
                'full_name' => $user->full_name,
                'address' => $request->input('address'),
                'payment_method' => $request->input('payment_method'),
                'order_id' => $order->id,
                'total_price' => $totalAmount,
                'cart' => $cartItems->map(function ($item) {
                    return [
                        'product_id' => $item->product_id,
                        'quantity' => $item->quantity,
                        'price' => $item->price * (1 - ($item->discount ?? 0) / 100),
                        'name' => $item->product_name,
                        'image_url' => $item->image_url,
                    ];
                })->toArray(),
            ];

// Log the order data before sending the email
            Log::info('Order Data:', $orderData);

// Send confirmation email
            Mail::to($request->input('email'))->send(new \App\Mail\OrderPlaced($orderData));

// Clear shopping cart
            ShoppingCart::where('user_id', $userId)->delete();

            if ($request->input('payment_method') === 'cod') {
                Log::info('Processing COD payment', ['user_id' => $userId, 'order_id' => $order->id]);
                return redirect()->route('order.success')->with('success', 'Đơn hàng của bạn đã được xử lý thành công và email đã được gửi!');
            }

// Redirect to success page
            return redirect()->route('order.success')->with('success', 'Đơn hàng của bạn đã được xử lý thành công và email đã được gửi!');

        } catch (Exception $e) {
            Log::error('Error in processCheckout', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->route('checkout.form')->with('error', 'Xảy ra lỗi trong quá trình thanh toán!');
        }
    }

    public function createPayment(Request $request, $orderId, $totalAmount)
    {
// Kiểm tra đầu vào
        Log::info('Creating payment', ['orderId' => $orderId, 'totalAmount' => $totalAmount]);

// Tạo URL thanh toán
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('vnpay.callback');
        $vnp_TmnCode = env('VNP_TMNCODE'); // Mã website tại VNPAY
        $vnp_HashSecret = env('VNP_HASHSECRET'); // Chuỗi bí mật

// Thông tin đơn hàng
        $vnp_TxnRef = $orderId; // ID của đơn hàng
        $vnp_OrderInfo = "Thanh toán hoá đơn";
        $vnp_Amount = $totalAmount * 100; // Chuyển đổi sang đơn vị đồng
        $vnp_Locale = "VN";
        $vnp_IpAddr = request()->ip();

// Tạo dữ liệu đầu vào
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
            "vnp_OrderType" => "billpayment",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

// Tạo chuỗi hash
        ksort($inputData);
        $hashdata = http_build_query($inputData);
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
        $vnp_Url .= '?' . $hashdata . '&vnp_SecureHash=' . $vnpSecureHash;

        Log::info('Payment URL created: ' . $vnp_Url);

// Chuyển hướng đến URL thanh toán
        return redirect()->away($vnp_Url);
    }


}
