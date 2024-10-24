-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 23, 2024 lúc 08:40 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sellinghousehold`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Chảo', 'Chảo là một dụng cụ nấu ăn thường có hình dạng phẳng và đáy rộng, giúp tỏa nhiệt đều. Chảo có thể được làm từ nhiều vật liệu như inox, nhôm, gang hoặc chống dính. Quai cầm thường được thiết kế dài để dễ cầm nắm và tránh bị nóng khi nấu.\r\n\r\nChảo có nhiều loại, như chảo rán, chảo xào, hoặc chảo sâu lòng, mỗi loại phù hợp với các phương pháp nấu khác nhau. Bề mặt chảo thường trơn để dễ đảo và lật thực phẩm, trong khi đáy chảo được thiết kế để tối ưu hóa khả năng giữ nhiệt. Chảo là một trong những dụng cụ nấu ăn quan trọng, giúp chế biến các món như xào, rán, hoặc làm bánh.', NULL, '2024-10-21 10:32:41'),
(3, 'Cốc', 'Cốc là một vật dụng dùng để chứa đựng đồ uống, thường có hình dạng tròn và miệng rộng. Cốc có thể được làm từ nhiều chất liệu như thủy tinh, sứ, nhựa hoặc inox, và có nhiều kích cỡ khác nhau tùy thuộc vào mục đích sử dụng.\r\n\r\nCốc thường có tay cầm để dễ dàng cầm nắm, nhưng cũng có loại không tay cầm. Một số cốc còn có nắp hoặc ống hút đi kèm, đặc biệt là cho đồ uống lạnh. Thiết kế và trang trí của cốc rất đa dạng, từ đơn giản đến cầu kỳ, thường phản ánh phong cách hoặc sở thích của người sử dụng. Cốc là vật dụng phổ biến trong các bữa ăn, quán cà phê, hay đơn giản là ở nhà.', '2024-10-20 08:14:36', '2024-10-20 08:14:36'),
(12, 'Máy xay', 'Máy xay là một thiết bị điện gia dụng dùng để chế biến thực phẩm bằng cách xay, nghiền hoặc trộn các nguyên liệu. Máy xay thường có cấu tạo gồm một thân máy, một cối xay và lưỡi dao sắc bén bên trong.\r\n\r\nCối xay thường được làm bằng thủy tinh hoặc nhựa bền, có nắp đậy kín để ngăn nguyên liệu bay ra ngoài khi hoạt động. Thân máy có nút điều chỉnh tốc độ và chế độ xay, cho phép người dùng dễ dàng điều chỉnh theo từng loại thực phẩm.', '2024-10-20 08:55:07', '2024-10-20 09:40:36'),
(13, 'Máy ép', 'Công dụng chính của máy ép là tạo ra nước trái cây tươi ngon, nguyên chất, mà không có chất bảo quản. Một số máy ép còn đi kèm với các phụ kiện như cối xay, cho phép người dùng chế biến các món như sốt, sinh tố hay thức uống dinh dưỡng. Máy ép là một dụng cụ hữu ích trong việc tạo ra các đồ uống bổ dưỡng và lành mạnh tại nhà.', '2024-10-20 08:55:50', '2024-10-20 08:55:50'),
(14, 'Dụng cụ nhà bếp', 'Dụng cụ nhà bếp là những thiết bị và công cụ thiết yếu dùng để chế biến, nấu nướng và phục vụ thực phẩm. Chúng thường đa dạng về loại hình, chức năng và chất liệu.', '2024-10-20 08:56:19', '2024-10-20 08:56:19'),
(44, 'Bình giữ nhiệt', 'Nó chỉ là Bình giữ nhiệt :)))', '2024-10-21 10:00:47', '2024-10-21 10:00:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2024_10_17_115719_create_users_table', 2),
(6, '2014_10_12_200000_add_two_factor_columns_to_users_table', 3),
(21, '2014_10_12_000000_create_users_table', 4),
(22, '2014_10_12_100000_create_password_resets_table', 4),
(23, '2019_08_19_000000_create_failed_jobs_table', 4),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 4),
(25, '2024_10_17_120640_create_users_table', 4),
(26, '2024_10_19_171532_create_users_table', 5),
(27, '2024_10_19_171542_create_categories_table', 5),
(28, '2024_10_19_172204_create_products_table', 5),
(29, '2024_10_19_172229_create_orders_table', 5),
(30, '2024_10_19_172300_create_order_items_table', 5),
(31, '2024_10_19_172317_create_shopping_carts_table', 5),
(32, '2024_10_19_172340_create_reviews_table', 5),
(33, '2024_10_19_172354_create_payments_table', 5),
(34, '2024_10_19_173107_create_addresses_table', 5),
(35, '2024_10_19_180801_add_agreed_to_terms_to_users_table', 6),
(36, '2024_10_20_072202_add_picture_url_to_users_table', 7),
(37, '2024_10_21_065445_add_cascade_to_products', 8),
(38, '2024_10_21_160751_add_discount_to_products_table', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` enum('pending','shipped','delivered','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` enum('credit_card','paypal','cash_on_delivery') NOT NULL,
  `payment_status` enum('paid','pending','failed') NOT NULL DEFAULT 'pending',
  `payment_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `discount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantity`, `category_id`, `image_url`, `created_at`, `updated_at`, `discount`) VALUES
(5, 'Bình giữ nhiệt loại mới', 'Bình giữ nhiệt loại mới', 1600000.00, 1000, 44, 'https://quatangviva.com/wp-content/uploads/2021/03/binh-giu-nhiet-life-son-nham-q099-5-2.jpg', '2024-10-20 12:41:07', '2024-10-22 05:07:50', 12),
(8, 'Chảo từ 5 lớp ALTENBACH GERMANY', 'Chảo rán đáy từ 5 lớp Altenbach Germany:\r\n\r\n+ Size 22cm: 890.000 VNĐ/cái\r\n\r\n+ Size 26cm: 1.150.000 VNĐ/cái\r\n\r\n+ Size 28cm: 1.250.000 VNĐ/cái', 120000.00, 12, 2, 'https://hpkoala.com/wp-content/uploads/2024/01/ULTRACOMB-ALL-5-PLY-28F-1-scaled-e1704534832331.jpg', '2024-10-21 10:02:21', '2024-10-22 05:10:25', 46),
(9, 'Thớt tre thái tròn có tay cầm 25 cm Delites 19102503-1', 'Đặc điểm nổi bật\r\n\r\nThớt dạng tròn, đường kính 25 cm, dày 1.2 cm bề mặt nhẵn bóng, thích hợp thái, cắt thực phẩm tiện lợi.\r\nChất liệu tre tự nhiên, thân thiện với môi trường, an toàn cho sức khỏe, dễ vệ sinh.\r\nKhả năng chống thấm nước tốt, chịu lực cắt tốt, không lên mùn, chống mốc.\r\nThiết kế thớt tròn có rãnh xung quanh mặt cắt giúp nước từ thực phẩm không chảy ra sàn nhà, giữ vệ sinh nhà bếp.\r\nThớt Delites có tay cầm và lỗ treo tiện lợi giúp bảo quản thớt khô thoáng, sạch sẽ.\r\nThương hiệu Delites - độc quyền Điện máy XANH, sản xuất tại Trung Quốc, đảm bảo chất lượng. \r\nLưu ý: Thớt Delites 19102503-1 dùng để thái, không dùng để chặt.', 16000.00, 12, 14, 'https://cdn.tgdd.vn/Products/Images/6790/276342/tre-thai-tron-co-tay-cam-33-x-25-cm-delites-19102503-1-3-700x467.jpg', '2024-10-21 12:40:58', '2024-10-22 05:10:35', 7),
(10, 'Bộ Dụng Cụ Nhà Bếp Bằng Nylon 5P LocknLock - Màu Xanh Dương - CKT436S01', 'Bộ dụng cụ nhà bếp bằng Nylon Lock&Lock kitchen tool 5P set - màu xanh dương CKT436S01\r\n\r\nChất liệu: \r\n\r\nThân dụng cụ: Nylon, nhựa PP\r\n\r\nỐng cắp dụng cụ: Nhựa PP\r\n\r\nMàu sắc: Xanh dương\r\n\r\nXuất xứ: Trung Quốc\r\n\r\n\r\nĐẶC ĐIỂM NỔI BẬT\r\n\r\n1. An toàn với dụng cụ nấu ăn chông dính\r\n\r\nBộ sản phẩm đủ độ mềm và sẽ không làm trầy xước xoong nồi của bạn.\r\n \r\n\r\n2. Bộ đồ dùng thực tập\r\n\r\nNó bao gồm các dụng cụ nhà bếp thực tế thường được sử dụng trong nhà bếp như Muối / Muỗng / Muỗng xẻ rãnh / Muỗng đánh bột\r\n\r\n\r\n3. Khả năng chịu nhiệt độ cao\r\n\r\nBộ đồ dùng bằng nylon này có khả năng chịu nhiệt cao lên đến 210°C\r\n\r\n\r\n4. Thoải mái khi sử dụng\r\n\r\nBộ đồ dùng nhà bếp bằng nylon nhẹ và dễ sử dụng với độ bám tốt\r\n\r\n\r\nLƯU Ý:\r\n\r\n- An toàn khi dùng, sử dụng được nhiều mục đích náu ăn khác.\r\n\r\n- Công cụ hữu ích cho nhà bếp của bạn.\r\n\r\n- Không sử dụng cho mục đích khác ngoài mục đích sử dụng của sản phẩm.\r\n\r\n- Cẩn thận với lửa và các mối nguy hại khác.\r\n\r\n- Khi sử dụng lần đầu tiên, hãy rửa bằng vải mềm hoặc miếng bọt biển.\r\n\r\n- Không sử dụng cho lò vi sóng.\r\n\r\n- Nếu sản phẩm vẫn còn dính nước trong quá tình bảo quản, có thể tạo ra vết bẩn, vì vậy hãy giữ cho sản phẩm khô ráo.', 16000.00, 12, 14, 'https://www.locknlock.vn/on/demandware.static/-/Sites-locknlock-shared-master/default/dwb1ac3651/images/Product%20contents/4.Cookware,%20Utensils/Cooking%20Tools/CKT436S01-B80008495_1.jpg', '2024-10-21 12:42:11', '2024-10-21 12:42:11', 16),
(11, 'Chảo vân đá đáy từ Nagakawa NAG3006', 'Một chiếc chảo đá phù hợp sẽ là trợ thủ đắc lực giúp các chị em nội trợ chế biến món chiên, xào, áp chảo ngon hơn, giữ được hàm lượng dinh dưỡng', 1600.00, 12, 2, 'https://bizweb.dktcdn.net/thumb/1024x1024/100/448/192/products/653-nag2206-avatar-1.jpg?v=1654154863897', '2024-10-22 02:40:33', '2024-10-22 02:40:33', 20),
(12, 'Bình giữ nhiệt nóng lạnh inox BAOL 1280ml', '❣ Ưu điểm nổi bật: 🌱 Bình giữ nhiệt 1280ml BAOL khả năng bảo quản nhiệt tốt, giúp bạn luôn thưởng thức được các thức uống ngon miệng hơn.', 109000.00, 20, 44, 'https://bizweb.dktcdn.net/thumb/1024x1024/100/431/426/products/4adfced2a04217a668587afa060a7a7f.jpg?v=1692850693437', '2024-10-22 04:20:47', '2024-10-22 04:20:47', 9),
(13, 'Bình Giữ Nhiệt Classic | VinFast', 'Bình Giữ Nhiệt Classic | VinFast', 120000.00, 30, 44, 'https://shop.vinfastauto.com/on/demandware.static/-/Sites-vinfast_vn_master/default/dw5e32df33/images/Accessory/CLASSICBOTTLE750ML/19.png', '2024-10-22 04:46:22', '2024-10-22 04:46:22', 15),
(14, 'Bình Giữ Nhiệt Inox Bền, Giữ Nhiệt Tốt 24 Giờ, Giá Rẻ', 'Bình Giữ Nhiệt Inox Bền, Giữ Nhiệt Tốt 24 Giờ, Giá Rẻ', 100000.00, 20, 44, 'https://quatangmunus.com/wp-content/uploads/2022/06/binh-giu-nhiet-inox-500ml-khac-logo-khac-ten-3.jpg', '2024-10-22 04:47:02', '2024-10-22 04:47:02', 41),
(15, 'Bình ly giữ nhiệt giá ngon, bền tốt, an toàn, giao siêu tốc 2h - 10/2024', 'Bình ly giữ nhiệt giá ngon, bền tốt, an toàn, giao siêu tốc 2h - 10/2024', 160000.00, 20, 44, 'https://cdn.tgdd.vn/Products/Images/5205/262561/binh-giu-nhiet-inox-500ml-delites-z5a-xanh-la-1.-600x600.jpg', '2024-10-22 04:47:58', '2024-10-22 04:47:58', 18),
(16, 'Cốc Hokori 350ml - Việt Nhật Plastic', 'Cốc Hokori 350ml của Việt Nhật nổi bật với họa tiết in hình chú hươu ở bề mặt, mang đến vẻ đẹp trẻ trung và độc đáo. Cốc được trang bị quai cầm chống trượt, miệng cốc nhẵn mịn tạo cảm giác thoải mái khi uống nước. Sản phẩm thích hợp để làm cốc uống nước, đựng sữa hàng ngày trong gia đình hay văn phòng làm việc. Ngoài ra, bạn có thể sử dụng cốc đựng nước khi đánh răng, cắm bàn chải, kem đánh răng giúp nhà tắm luôn gọn gàng và ngăn nắp.', 70000.00, 10, 3, 'https://vietnhatplastic.com/Data/Sites/1/Product/133/coc-hokori-3-350mnl.png', '2024-10-22 04:51:20', '2024-10-22 05:10:48', 10),
(17, 'Nồi cơm điện tử Toshiba 1.8 lít RC-18DR1NV', 'Nồi cơm điện tử Toshiba 1.8 lít RC-18DR1NV', 400000.00, 12, 14, 'https://cdn.tgdd.vn/2021/06/content/BeFunky-collage(2)-800x500-1.jpg', '2024-10-22 08:03:00', '2024-10-22 08:03:00', 0),
(18, 'Bếp ga âm Kangaroo KG536B', 'Bếp ga âm Kangaroo KG536B', 545000.00, 12, 14, 'https://cdn.tgdd.vn/Products/Images/1983/236321/Slider/am-kangaroo-kg536b-190721-0122330-1020x570.jpg', '2024-10-22 08:04:11', '2024-10-22 08:04:11', 12),
(20, 'Máy ép trái cây Philips HR1811', 'Máy ép trái cây sẽ giúp bạn thực hiện những món nước ép dễ dàng ngay tại nhà. Máy ép trái cây với kiểu dáng đa dạng, nhỏ gọn và giá cả không quá đắt sẽ giúp bạn dễ dàng lựa chọn một chiếc máy cho gia đình mình đó!', 499000.00, 12, 14, 'https://cdn.tgdd.vn/2021/11/CookRecipe/CookTipsNote/8-dung-cu-can-chuan-bi-khi-bat-dau-hoc-lam-banh-tipsnote-800x450-15.jpg', '2024-10-22 08:08:49', '2024-10-22 08:08:49', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shopping_carts`
--

CREATE TABLE `shopping_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `agreed_to_terms` tinyint(1) NOT NULL DEFAULT 0,
  `picture_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `username`, `password`, `phone_number`, `address`, `role`, `email_verified_at`, `created_at`, `updated_at`, `agreed_to_terms`, `picture_url`) VALUES
(1, 'Tran Van Chien', 'chien27122402@gmail.com', 'chien27122402', '$2y$10$QKD4Waj2YxP5eyLjcCCqgutfIY5RCF7DlQnJgBp0shNLLlDcuGn4m', '0862587229', 'xóm Giữa, xã Quảng Thanh, huyện Thuỷ Nguyên, tp Hải Phòng', 'admin', NULL, '2024-10-19 11:08:39', '2024-10-20 08:04:37', 1, 'https://cdn.kona-blue.com/upload/kona-blue_com/post/images/2024/08/13/356/avatar-vo-tri-meo-3.jpg'),
(2, 'TRẦN VĂN CHIẾN', 'tranvanchien24022003@gmail.com', 'admin123', '$2y$10$SNz6l4E4lhRkm/R/fpK6iejvEmvEEOnJSS4pacXXT94PiNuUhqAni', '+84862587229', 'thôn 3, xã Quảng Thanh, huyện Thuỷ Nguyên, tp Hải Phòng', 'admin', '2024-10-20 02:08:12', '2024-10-20 02:07:47', '2024-10-20 12:51:31', 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQU5poNhLUWu2zGHGu471RAeatkD89TSjkJGQ&s'),
(3, 'Võ Quốc Việt', 'tovuhoang123@gmail.com', 'hoangvu123', '$2y$10$AkOQIh95KyKnQ0kKhAocyeKq20UfJSTlOBRc90EigqsUmpUTqS.Mm', NULL, NULL, 'user', NULL, '2024-10-21 08:47:45', '2024-10-21 08:47:45', 1, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shopping_carts_user_id_foreign` (`user_id`),
  ADD KEY `shopping_carts_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `shopping_carts`
--
ALTER TABLE `shopping_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD CONSTRAINT `shopping_carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `shopping_carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
