-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 28, 2021 lúc 03:18 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_cakeshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_gmail` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `admin_name` text COLLATE utf8_unicode_ci NOT NULL,
  `admin_phone` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_gmail`, `admin_password`, `admin_name`, `admin_phone`, `role_id`) VALUES
(1, 'cakeshop@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Quản lý admin', '0909486545', 1),
(2, 'tuananhpham17102000@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Phạm Tuấn Anh', '0349390596', 1),
(4, 'vothanhphat2000@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Võ Thành Phát', '0966949821', 1),
(5, 'user1@cakeshop.com', 'e10adc3949ba59abbe56e057f20f883e', 'User Play 1', '0349390596', 3),
(6, 'shipper1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Shipper Play 1', '0349390596', 2),
(7, 'user2@cakeshop.com', 'e10adc3949ba59abbe56e057f20f883e', 'User Play 2', '0349390596', 3),
(8, 'shipper2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Shipper Play 2', '0349390596', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL,
  `bill_date` date NOT NULL DEFAULT current_timestamp(),
  `bill_totalprice` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bill_status` int(11) NOT NULL,
  `consumer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`bill_id`, `bill_date`, `bill_totalprice`, `bill_status`, `consumer_id`, `shipping_id`, `payment_id`) VALUES
(28, '2021-09-24', '440,000.00', 2, 1, 34, 1),
(29, '2021-09-24', '660,000.00', 2, 11, 35, 2),
(30, '2021-09-24', '594,000.00', 2, 13, 36, 1),
(31, '2021-09-24', '440,000.00', 2, 14, 37, 2),
(32, '2021-09-24', '352,000.00', 2, 20, 38, 1),
(33, '2021-09-24', '1,188,000.00', 2, 16, 39, 1),
(34, '2021-09-26', '1,265,000.00', 2, 21, 41, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `billdetail_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `billdetail_name` text COLLATE utf8_unicode_ci NOT NULL,
  `billdetail_amount` int(11) NOT NULL,
  `billdetail_price` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`billdetail_id`, `bill_id`, `product_id`, `billdetail_name`, `billdetail_amount`, `billdetail_price`) VALUES
(34, 28, 4, 'Macarons Cream Cake', 1, '200000'),
(35, 28, 9, 'Pizza Pastries', 4, '50000'),
(36, 29, 6, 'Chocolate Ice-cream', 1, '150000'),
(37, 29, 7, 'Raspberry Chocolate', 1, '200000'),
(38, 29, 5, 'Bánh Mochi Đậu Đỏ', 1, '250000'),
(39, 30, 1, 'Bánh Tiramisu Ý', 2, '80000'),
(40, 30, 11, 'Matcha Cake', 1, '30000'),
(41, 30, 2, 'Vanilla Ice-cream', 1, '150000'),
(42, 30, 4, 'Macarons Cream Cake', 1, '200000'),
(43, 31, 9, 'Pizza Pastries', 4, '50000'),
(44, 31, 7, 'Raspberry Chocolate', 1, '200000'),
(45, 32, 1, 'Bánh Tiramisu Ý', 4, '80000'),
(46, 33, 11, 'Matcha Cake', 1, '30000'),
(47, 33, 10, 'Salmon mille-feuille', 1, '150000'),
(48, 33, 9, 'Pizza Pastries', 1, '50000'),
(49, 33, 8, 'Za\'atar pastries', 1, '50000'),
(50, 33, 7, 'Raspberry Chocolate', 1, '200000'),
(51, 33, 6, 'Chocolate Ice-cream', 1, '150000'),
(52, 33, 5, 'Bánh Mochi Đậu Đỏ', 1, '250000'),
(53, 33, 4, 'Macarons Cream Cake', 1, '200000'),
(54, 34, 7, 'Raspberry Chocolate', 2, '200000'),
(55, 34, 10, 'Salmon mille-feuille', 5, '150000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_product`
--

CREATE TABLE `category_product` (
  `category_id` int(11) NOT NULL,
  `category_name` text COLLATE utf8_unicode_ci NOT NULL,
  `category_note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_product`
--

INSERT INTO `category_product` (`category_id`, `category_name`, `category_note`, `category_status`) VALUES
(11, 'Ice Cream', NULL, 1),
(12, 'Bánh Kem', NULL, 1),
(13, 'Bánh Ngọt', NULL, 1),
(14, 'Bánh Chocolate', NULL, 1),
(15, 'CupCake', NULL, 0),
(16, 'Tart- Pie', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `consumer`
--

CREATE TABLE `consumer` (
  `consumer_id` int(11) NOT NULL,
  `consumer_gmail` text COLLATE utf8_unicode_ci NOT NULL,
  `consumer_password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `consumer_name` text COLLATE utf8_unicode_ci NOT NULL,
  `consumer_phone` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `consumer_daybirth` date DEFAULT NULL,
  `consumer_address` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `consumer`
--

INSERT INTO `consumer` (`consumer_id`, `consumer_gmail`, `consumer_password`, `consumer_name`, `consumer_phone`, `consumer_daybirth`, `consumer_address`) VALUES
(1, 'tuananhpham17102000@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Phạm Tuấn Anh', '0349390596', '2000-10-17', '15/7, Phú Lợi, Tân Phú Trung, Củ Chi, TP.HCM, VN'),
(11, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Võ Thành Phát', '0966994821', '2021-09-30', '38A, Đường số 3, Phường Bình Hưng Hòa A, Quận Bình Tân, Hồ Chí Minh'),
(12, 'vothanhphat2000@gmail.com', '4297f44b13955235245b2497399d7a93', 'Võ Thành Phát', NULL, '2000-09-30', NULL),
(13, 'nguyenduyhung123@gmail.com', '4297f44b13955235245b2497399d7a93', 'Nguyễn Duy Hưng', NULL, NULL, NULL),
(14, 'quoctuanbui123@gmail.com', '4297f44b13955235245b2497399d7a93', 'Bùi Quốc Tuấn', NULL, NULL, NULL),
(15, 'tuongnghipham090@gmail.com', '4297f44b13955235245b2497399d7a93', 'Phạm Tường Nghi', NULL, NULL, NULL),
(16, 'nguyentuanngon092@gmail.com', '202cb962ac59075b964b07152d234b70', 'Nguyễn Tuấn Ngọc', NULL, NULL, NULL),
(19, 'kietphantrung@gmail.com', '202cb962ac59075b964b07152d234b70', 'Phan Trung Kiệt', NULL, NULL, NULL),
(20, 'trucly123@gmail.com', '4297f44b13955235245b2497399d7a93', 'Nguyễn Phan Trúc Ly', NULL, NULL, NULL),
(21, 'kaito@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'tuan anh', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_gmail` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_name` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_title` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_content` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_gmail`, `contact_name`, `contact_title`, `contact_content`, `contact_date`) VALUES
(1, 'vothanhphat2000@gmail.com', 'Võ Thành Phát', 'Bánh làm dở quá', 'Bánh giao tới phần kem bị chảy ra', '2021-09-21'),
(2, 'tuananhpham17102000@gmail.com', 'Phạm Tuấn Anh', 'Bánh ngon', 'Bánh có độ bồng bềnh, kem mịn, ngọt ngon', '2021-09-21'),
(3, 'quoctuanbui123@gmail.com', 'Bùi Quốc Tuấn', 'Chất lượng phục vụ tốt', 'Nhân viên tận tình, chu đáo', '2021-09-21'),
(4, 'nguyenduyhung123@gmail.com', 'Nguyễn Duy Hưng', 'Giao hàng nhanh', 'Shop giao bánh nhanh, đóng gói kĩ càng', '2021-09-21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment_bill`
--

CREATE TABLE `payment_bill` (
  `payment_id` int(11) NOT NULL,
  `payment_name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payment_bill`
--

INSERT INTO `payment_bill` (`payment_id`, `payment_name`) VALUES
(1, 'Thanh toán khi nhận hàng'),
(2, 'Thanh toán qua ví điện tử');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` text COLLATE utf8_unicode_ci NOT NULL,
  `product_img` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `product_amount` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_date` date NOT NULL DEFAULT current_timestamp(),
  `product_material` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_desc` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `product_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_img`, `product_amount`, `product_price`, `product_date`, `product_material`, `product_desc`, `category_id`, `provider_id`, `product_status`) VALUES
(1, 'Bánh Tiramisu Ý', 'banh-tiramisu_2021-09-03_22-42-9.jpg', 10, 80000, '2021-09-22', 'Trứng gà, rượu Rum, bột cà phê đen, phô mai, đường, bánh Sampa, bột ca cao', '- 3 quả trứng gà\r\n- 20ml rượu Rum.\r\n- 48g bột cà phê đen hoà tan.\r\n- 250g phô mai Mascarpone (hoặc cream chesse)\r\n- 70g đường.\r\n- 300ml Whipping cream (nếu muốn)\r\n- Bánh sampa.\r\n- Bột ca cao.', 13, 5, 1),
(2, 'Vanilla Ice-cream', 'Vanilla Ice-cream_2021-09-16_19-54-15.jpg', 10, 150000, '2021-09-22', 'Coffee tinh chất vani, kem tươi, sữa tươi, muối, đường, trứng gà', '- 1-2 thìa Coffee tinh chất vani\r\n- 250 ml kem tươi\r\n- 200 ml sữa tươi\r\n- 1 ít muối\r\n- 60 gr đường\r\n- 4 lòng đỏ trứng', 11, 5, 1),
(3, 'Homemade Chocolate', 'Homemade Chocolate_2021-09-16_19-55-48.jpg', 50, 100000, '2021-09-22', 'Bột cacao, trứng gà, bơ không muối, bột mì, bột nở, đường, Vani, dầu ăn', '- Bột cacao: 70 gram.\r\n- Trứng gà: 4 quả\r\n- Bơ không muối: 250 gram.\r\n- Bột mì: 300 gram.\r\n- Bột nở: 2 tsp.\r\n- Đường trắng 400 gram.\r\n- Vani: 1 tsp.\r\n- Dầu ăn: 50 ml.', 14, 5, 1),
(4, 'Macarons Cream Cake', 'Macarons Cream Cake_2021-09-16_19-57-7.jpg', 50, 200000, '2021-09-22', 'Phô mai, kem tươi, Vani, đường, bánh quy, bơ lạt,...', 'Phần kem\r\n- 135 g cream cheese\r\n- 120 g kem tươi (whipping cream, heavy cream, fresh cream) thành phần béo >30 %.\r\n- 2/3 muỗng cafe hương Vani\r\n- 20 g đường\r\nPhần đế bánh\r\n- 60 g bánh quy loại thường hay Oreo cũng ngon\r\n- 10 g đường\r\n- 40 g bơ lạt\r\nTrái cây trang trí\r\n- Trái cây tươi/ mứt/ sô cô la để trang trí tây/ Mứt việt quất/ Sốt sô cô la không nhất thiết, tùy sở thích', 12, 5, 1),
(5, 'Bánh Mochi Đậu Đỏ', 'banh-mochi-nhan-dau-do_2021-09-03_20-55-50.jpg', 10, 250000, '2021-09-21', 'Gạo Nếp, Đậu Đỏ', '1 hộp - 250g', 11, 6, 1),
(6, 'Chocolate Ice-cream', 'Chocolate Ice-cream_2021-09-16_19-52-43.jpg', 10, 150000, '2021-09-22', 'Bột cacao, trứng gà, bơ không muối, bột mì, bột nở, đường, Vani, dầu ăn', '- Bột cacao: 70 gram.\r\n- Trứng gà: 4 quả\r\n- Bơ không muối: 250 gram.\r\n- Bột mì: 300 gram.\r\n- Bột nở: 2 tsp.\r\n- Đường trắng 400 gram.\r\n- Vani: 1 tsp.\r\n- Dầu ăn: 50 ml.', 11, 5, 1),
(7, 'Raspberry Chocolate', 'Raspberry Chocolate_2021-09-16_19-58-46.jpg', 50, 200000, '2021-09-22', 'Bột mì, đường trắng, teaspoon muối, bơ, hạt nhân lát, raspberry, chocolate', '–  250gr bột mì thường\r\n–  1 tablespoon baking powder\r\n–  50gr đường trắng\r\n–  1/2 teaspoon muối\r\n–  90gr bơ lạnh, xắt hạt lựu\r\n–  250ml whipping cream\r\n–  30gr hạnh nhân lát\r\n–  100gr raspberry\r\nLớp kem phủ glaze: \r\n–  60gr đường bột\r\n–  30ml whipping\r\n–  Kem Chocolate phủ mặt ngoài\r\n–  Một chút hạnh nhân lát, rang vàng (để trang trí bánh)', 12, 5, 1),
(8, 'Za\'atar pastries', '2010114182435_2021-09-16_20-1-8.jpg', 50, 50000, '2021-09-22', 'Bột, Gia vị Za\'atar trộn, dầu ô liu', 'Bột\r\n- 1 gói men khô hoạt tính\r\n- 1 chén nước, cộng 1/4 chén, chia\r\n- 1 muỗng cà phê muối\r\n- 3 chén bột\r\n- 2 muỗng canh dầu ô liu hoặc bơ tan chảy\r\nGia vị\r\n- 1/4 chén sumac\r\n- 2 muỗng canh thyme\r\n- 1 muỗng canh hạt mè rang\r\n- 2 muỗng canh kinh giới\r\n- 2 muỗng canh oregano\r\n- 1 muỗng cà phê muối thô\r\nGia vị Za\'atar trộn, mua hoặc trộn ở nhà (xem công thức bên dưới)\r\nKhoảng 1/4 chén dầu ôliu chất lượng tốt, để đánh bóng bề mặt bánh mì', 13, 5, 1),
(9, 'Pizza Pastries', '2010114182221_2021-09-16_20-2-9.jpg', 50, 50000, '2021-09-22', 'Bột mì, men nở, nước, dầu ô liu, phô mai, nước cà chua,...', '- Bột mì – 200g\r\n- Men nở ( bột nở) – 5g\r\n- Nước – 150 ml\r\n- Dầu Ô Liu – 1 thìa\r\n- Phô mai ( Muốn cho bánh Pizza đúng vị nên chọn các loại phô mai có xuất xứ từ châu Âu bạn nhé! )\r\n- Nước sốt cà chua, nước sốt tương cà bạn có thể tự tay chế biến hoặc mua bên ngoài tùy theo sở thích khẩu vị ăn uống. \r\n- Nhân làm bánh pizza: Tùy vào sở thích và khẩu vị mà chúng ta lựa chọn. Có vô số lựa chọn nhân pizza phù hợp với khẩu vị của từng người khác nhau. Bạn có thể chọn nhân theo sở thích riêng của mình. Một số nhân pizza phổ biến như hải sản, thịt lợn muối, dăm bông, xúc xích nấm, ớt chuông…', 13, 5, 1),
(10, 'Salmon mille-feuille', 'Salmon Millefeuille_2021-09-16_20-3-40.jpg', 20, 150000, '2021-09-22', 'Trứng gà, đường, kem tươi, bột mì, quả Vanila, muối,...', '- 5 lòng đỏ trứng gà\r\n- 80gr đường.\r\n- 175ml kem tươi.\r\n- 200ml sữa tươi không đường.\r\n- 22gr bột mì đa dụng.\r\n- 1 quả vanilla.\r\n- 1 nhúm muối.', 13, 6, 1),
(11, 'Matcha Cake', 'Matcha Cake_2021-09-16_20-5-1.jpg', 20, 30000, '2021-09-22', 'Trứng gà, bột Matcha, nước lọc, đường, dầu, bột mì, bột ngô, bột baking power', '– 5 lòng trắng trứng gà\r\n– 4 lòng đỏ trứng gà\r\n– 3 muỗng café bột trà xanh\r\n– 80 ml nước lọc\r\n– 85g đường trắng\r\n– 5ml dầu ăn\r\n– 100g bột làm bánh (60 bột mì trộn với 40g bột ngô)\r\n– ½ muỗng café bột baking power', 13, 6, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `provider_product`
--

CREATE TABLE `provider_product` (
  `provider_id` int(11) NOT NULL,
  `provider_name` text CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `provider_phone` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `provider_gmail` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `provider_address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `provider_note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `provider_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `provider_product`
--

INSERT INTO `provider_product` (`provider_id`, `provider_name`, `provider_phone`, `provider_gmail`, `provider_address`, `provider_note`, `provider_status`) VALUES
(1, 'Trại Cá La Hán Diamond Lam', '0975880333', 'lamviptv92@gmail.com', 'Metro q12 tphcm', 'Trại Cá La Hán Diamond Lam - Diamond Lam Flower Horn Fish Farm chuyên cung cấp sỉ & lẻ cá la hán đẹp, giá rẻ, uy tín, chất lượng, với  quy mô 400 hồ lớn nhỏ và 2500 bình pom, 1 tháng có thể xuất 1500 con cá la hán chất lượng ra thị trường. Trại Cá La Hán Diamond Lam - Diamond Lam Flower Horn Fish Farm  chuyên dòng cá la hán thái đỏ châu đầu to và cá la hán magma , dòng cá la hán magma này được lai tạo giữa con king kamfa ra nên bộ đuôi kì cờ và dàn châu rất đẹp. Mời quý khách hàng đến tham quan Trại Cá La Hán Diamond Lam - Diamond Lam Flower Horn Fish Farm,Trại Cá La Hán Diamond Lam - Diamond Lam Flower Horn Fish Farm  hy vọng được sự ủng hộ của quý khách hàng và hợp tác với các anh em thương lái trên thị trường cá la hán, xin chân thành cảm ơn!', 0),
(4, 'Cửa hàng bánh Nhật Bản', '0906306797', 'mochi@japan.com', '94 Nam Kỳ Khởi Nghĩa, Bến Nghé, Quận 3, Thành phố Hồ Chí Minh', NULL, 0),
(5, 'ABC Bakery', '0914186582', 'contact@abc-bakery.com', '223-225, Phạm Ngũ Lão, P. Phạm Ngũ Lão, Q. 1, Tp. Hồ Chí Minh', NULL, 1),
(6, 'JP Bakery', '0349390596', 'contact@jp-bakery.com', '223-225, Phạm Ngũ Lão, P. Phạm Ngũ Lão, Q. 1, Tp. Hồ Chí Minh', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'shipper'),
(3, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping_bill`
--

CREATE TABLE `shipping_bill` (
  `shipping_id` int(11) NOT NULL,
  `shipping_name` text COLLATE utf8_unicode_ci NOT NULL,
  `shipping_phone` text COLLATE utf8_unicode_ci NOT NULL,
  `shipping_gmail` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_address` text COLLATE utf8_unicode_ci NOT NULL,
  `shipping_note` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shipping_bill`
--

INSERT INTO `shipping_bill` (`shipping_id`, `shipping_name`, `shipping_phone`, `shipping_gmail`, `shipping_address`, `shipping_note`) VALUES
(34, 'Phạm Tuấn Anh', '0349390596', 'tuananhpham17102000@gmail.com', '15/7, Phú Lợi, Tân Phú Trung, Củ Chi, TP.HCM, VN', 'Để ngoài cổng'),
(35, 'Võ Thành Phát', '0966949821', 'vothanhphat2000@gmail.com', '38A Đường số 3', 'Giao lên phòng'),
(36, 'Nguyễn Duy Hưng', '0921312432', 'nguyenduyhung123@gmail.com', '20 Gò Vấp', 'Để ngoài cổng'),
(37, 'Bùi Quốc Tuấn', '0845438312', 'nguyenduyhung123@gmail.com', '40 Hồ Tây', 'Để ngoài cổng'),
(38, 'Nguyễn Phan Trúc Ly', '0835342142', 'trucly@gmail.com', '40/2 Liên khu 4-6', 'Để ngoài cổng'),
(39, 'Nguyễn Tuấn Ngọc', '0349323596', 'nguyentuanngon092@gmail.com', '50/21/24/2 Liên khu 1-2', 'Để ngoài cổng'),
(40, 'Phạm Tuấn Anh', '03349390596', 'kaito@gmail.com', 'Củ Chi', NULL),
(41, 'Phạm Tuấn Anh', '03349390596', 'kaito@gmail.com', 'Củ Chi', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transport_bill`
--

CREATE TABLE `transport_bill` (
  `transport_id` int(11) NOT NULL,
  `transport_name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transport_bill`
--

INSERT INTO `transport_bill` (`transport_id`, `transport_name`) VALUES
(1, 'Huỷ đơn hàng'),
(2, 'Đặt đơn hàng'),
(3, 'Đang xử lý'),
(4, 'Đang vận chuyển'),
(5, 'Đã giao hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `consumer_id` (`consumer_id`),
  ADD KEY `shipping_id` (`shipping_id`),
  ADD KEY `bill_status` (`bill_status`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`billdetail_id`),
  ADD KEY `bill_id` (`bill_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `consumer`
--
ALTER TABLE `consumer`
  ADD PRIMARY KEY (`consumer_id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `payment_bill`
--
ALTER TABLE `payment_bill`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `provider_id` (`provider_id`);

--
-- Chỉ mục cho bảng `provider_product`
--
ALTER TABLE `provider_product`
  ADD PRIMARY KEY (`provider_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Chỉ mục cho bảng `shipping_bill`
--
ALTER TABLE `shipping_bill`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Chỉ mục cho bảng `transport_bill`
--
ALTER TABLE `transport_bill`
  ADD PRIMARY KEY (`transport_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `billdetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `category_product`
--
ALTER TABLE `category_product`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `consumer`
--
ALTER TABLE `consumer`
  MODIFY `consumer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `payment_bill`
--
ALTER TABLE `payment_bill`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `provider_product`
--
ALTER TABLE `provider_product`
  MODIFY `provider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `shipping_bill`
--
ALTER TABLE `shipping_bill`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `transport_bill`
--
ALTER TABLE `transport_bill`
  MODIFY `transport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`consumer_id`) REFERENCES `consumer` (`consumer_id`),
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`shipping_id`) REFERENCES `shipping_bill` (`shipping_id`),
  ADD CONSTRAINT `bill_ibfk_3` FOREIGN KEY (`bill_status`) REFERENCES `transport_bill` (`transport_id`),
  ADD CONSTRAINT `bill_ibfk_4` FOREIGN KEY (`payment_id`) REFERENCES `payment_bill` (`payment_id`);

--
-- Các ràng buộc cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `bill_detail_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`bill_id`),
  ADD CONSTRAINT `bill_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category_product` (`category_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`provider_id`) REFERENCES `provider_product` (`provider_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
