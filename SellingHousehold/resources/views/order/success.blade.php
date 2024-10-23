<link rel="shortcut icon" href="{{ asset('images/logo-home.png') }}" type="image/x-icon">
<title>UNETIHOUSEHOLD | XỬ LÝ ĐẶT HÀNG</title>
<style>
    body {
        font-family: Arial, sans-serif;
        /* Font chữ */
        background-color: #f8f9fa;
        /* Màu nền nhẹ */
        color: #343a40;
        /* Màu chữ */
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        /* Chiều rộng tối đa */
        margin: 50px auto;
        /* Căn giữa */
        padding: 20px;
        /* Padding xung quanh */
        background-color: #ffffff;
        /* Nền trắng */
        border-radius: 8px;
        /* Bo góc */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        /* Đổ bóng */
        text-align: center;
        /* Căn giữa nội dung */
    }

    h2 {
        font-size: 24px;
        /* Kích thước chữ tiêu đề */
        margin-bottom: 20px;
        /* Khoảng cách dưới tiêu đề */
        color: #28a745;
        /* Màu xanh cho tiêu đề */
    }

    p {
        font-size: 16px;
        /* Kích thước chữ cho đoạn văn */
        margin-bottom: 30px;
        /* Khoảng cách dưới đoạn văn */
    }

    .back-to-store {
        display: inline-block;
        /* Hiển thị như khối inline */
        padding: 10px 20px;
        /* Padding cho nút */
        font-size: 16px;
        /* Kích thước chữ cho nút */
        color: #ffffff;
        /* Màu chữ */
        background-color: #007bff;
        /* Màu nền nút */
        border: none;
        /* Không viền */
        border-radius: 4px;
        /* Bo góc */
        text-decoration: none;
        /* Bỏ gạch chân */
        transition: background-color 0.3s;
        /* Hiệu ứng chuyển màu */
    }

    .back-to-store:hover {
        background-color: #0056b3;
        /* Màu nền khi hover */
    }

    a {
        display: inline-block;
        padding: 12px 20px;
        background-color: #007bff;
        text-decoration: none;
        color: white;
        border-radius: 25px;
        box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    a:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }

    a:active {
        transform: translateY(1px);
    }

    p {
        font-weight: bold;
    }
</style>
<div class="container">
    <h2>Cảm ơn bạn đã đặt hàng!</h2>
    <p>Đơn hàng của bạn đã được xử lý thành công. Vui lòng kiểm tra email để kiểm tra thông tin đặt hàng!</p>
    <a href="{{ route('products.show') }}">Quay lại cửa hàng</a>
</div>
