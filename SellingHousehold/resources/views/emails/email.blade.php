<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận Đơn Hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            font-size: 24px;
            text-align: center;
        }

        h3 {
            color: #555;
            font-size: 18px;
            margin-top: 20px;
        }

        p {
            color: #666;
            line-height: 1.6;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f9f9f9;
        }

        img {
            max-width: 50px;
            /* Đặt kích thước tối đa cho ảnh */
            border-radius: 4px;
            /* Bo góc ảnh */
        }

        .total {
            font-weight: bold;
            font-size: 20px;
            color: #333;
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Cảm ơn bạn {{ $orderData['name'] }} đã đặt hàng!</h1>
        <p>Thông tin đơn hàng của bạn:</p>

        <h3>Địa chỉ giao hàng:</h3>
        <p>{{ $orderData['address'] }}</p>

        <h3>Phương thức thanh toán:</h3>
        <p>{{ $orderData['payment_method'] == 'cod' ? 'Thanh toán khi giao hàng (COD)' : 'Thanh toán online' }}</p>

        <h3>Thông tin sản phẩm:</h3>
        <table>
            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderData['cart'] as $item)
                    <tr>
                        <td><img src="{{ $item['image_url'] }}" alt="{{ $item['name'] }}"></td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ number_format($item['price'], 0) }}đ</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p class="total">Tổng cộng: {{ number_format($orderData['total_price'], 0) }}đ</p>

        <p class="footer">Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi!</p>
    </div>
</body>

</html>
