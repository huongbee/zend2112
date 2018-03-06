-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 06, 2018 at 11:39 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `date_order` date NOT NULL,
  `total` double NOT NULL,
  `payment_method` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token_date` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0' COMMENT '0: chưa xac nhận; 1 đã xác nhận'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment_method`, `note`, `token`, `token_date`, `status`) VALUES
(1, 1, '2018-02-09', 14420000, 'thanhtoantructiep', 'hang cuoi nam', 'kv95YqjKomjSX7cv9obkHrcgtNGVVk', '2018-02-09 07:50:09', 0),
(2, 2, '2018-02-09', 3380000, 'thanhtoantructiep', '123', NULL, NULL, 1),
(3, 3, '2018-02-09', 4310000, 'thanhtoantructiep', '11111111111111', NULL, NULL, 1),
(4, 4, '2018-02-09', 20000, 'thanhtoanonline', 'dat hang online', 'jOdZDWyokPpBCaLiVQhUyHzFOSJowl', '2018-02-09 08:12:25', 1),
(5, 5, '2018-02-09', 20000, 'thanhtoanonline', 'dat hang online', 'kO4ablk7ZUskSPFkjzcuFZwYcXDLrF', '2018-02-09 08:13:51', 1),
(6, 6, '2018-02-09', 20000, 'thanhtoanonline', 'fff', 'WSBAaunHDOSGyGHKdbJm8dShxHQwfi', '2018-02-09 08:16:21', 1),
(7, 7, '2018-02-09', 20000, 'thanhtoanonline', 'mua thu', 'qcm4RiX9df826BKEe76mjnp6XGRevb', '2018-02-09 08:17:18', 0),
(8, 8, '2018-03-02', 22500000, 'thanhtoantructiep', '', 'zbqvDBHH0CeH6GQvIELh4BDDMEnwE6', '2018-03-02 02:21:08', 0),
(9, 9, '2018-03-02', 1490000, 'thanhtoanonline', '', 'sNDpaP4hPYOUkpPzUkYYvrVSPXgLhC', '2018-03-02 03:52:15', 1),
(10, 10, '2018-03-02', 1490000, 'thanhtoantructiep', '', 'jNa6no6dY6nT2Vt1JqqDgVcPgcZM2I', '2018-03-02 03:52:22', 0),
(11, 11, '2018-03-04', 4490000, 'thanhtoantructiep', '', '8IhaBhjHaqTrxvWUYHTJ7vw70Dc2Eq', '2018-03-04 12:38:05', 0),
(12, 12, '2018-03-04', 20000, 'thanhtoantructiep', '', '8IyVpcxbYJHQY682uiwe1KBWi05jBY', '2018-03-04 01:01:10', 0),
(13, 13, '2018-03-04', 20000000, 'thanhtoantructiep', '', 'HQ9T94RmPQ4x96ojedwU4ElsWVVwDS', '2018-03-04 01:02:49', 0),
(14, 14, '2018-03-04', 14400000, 'thanhtoantructiep', '', 'SEW3nu8LMsh5ymTUCsZOdhUjlVLJ29', '2018-03-04 01:05:04', 0),
(15, 15, '2018-03-04', 20000000, 'thanhtoantructiep', '', 'QgSYMrg2jR7eHag4aYqNBnPCzpRwuc', '2018-03-04 01:07:16', 0),
(16, 16, '2018-03-04', 19000, 'thanhtoantructiep', '', 'HhotsbOVmgikJfN9kU5KCF4CjbcmNS', '2018-03-04 01:08:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(11) NOT NULL,
  `id_bill` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='chi_tiet_hoa_don' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `price`) VALUES
(1, 1, 7, 1, 20000),
(2, 1, 8, 1, 14400000),
(3, 2, 10, 1, 1890000),
(4, 2, 29, 1, 1490000),
(5, 3, 7, 1, 20000),
(6, 3, 26, 1, 4290000),
(7, 4, 7, 1, 20000),
(8, 5, 7, 1, 20000),
(9, 6, 7, 1, 20000),
(10, 7, 7, 1, 20000),
(11, 8, 37, 1, 2500000),
(12, 8, 9, 1, 20000000),
(13, 9, 29, 1, 1490000),
(14, 10, 29, 1, 1490000),
(15, 11, 18, 1, 4490000),
(16, 12, 7, 1, 20000),
(17, 13, 9, 1, 20000000),
(18, 14, 8, 1, 14400000),
(19, 15, 9, 1, 20000000),
(20, 16, 24, 1, 19000);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `gender`, `email`, `address`, `phone`) VALUES
(1, 'van dang', 'nam', 'h39eiur24309fkfdo@gmail.com', '33 DUONG 15 PHU MY QUAN 7', '0948977055'),
(2, 'van dang', 'nam', 'HAI22VN@GMAIL.COM', '33 DUONG 15 PHU MY QUAN 7', '0948977055'),
(3, 'van dang', 'nam', 'HAI22VN@GMAIL.COM', '33 DUONG 15 PHU MY QUAN 7', '0948977055'),
(4, 'van dang', 'nam', 'HAI22VN@GMAIL.COM', '33 DUONG 15 PHU MY QUAN 7', '0948977055'),
(5, 'van dang', 'nam', 'HAI22VN@GMAIL.COM', '33 DUONG 15 PHU MY QUAN 7', '0948977055'),
(6, 'van dang', 'nam', 'HAI22VN@GMAIL.COM', '33 DUONG 15 PHU MY QUAN 7', '0948977055'),
(7, 'van dang', 'nam', 'HAI22VN@GMAIL.COM', '33 DUONG 15 PHU MY QUAN 7', '0948977055'),
(8, 'Huong Hương', 'nữ', 'huongnguyenak96@gmail.com', 'hhhhhhhhhhhhhhh', '01632967751'),
(9, 'Huong Hương', 'nữ', 'huongnguyenak96@gmail.com', 'hhhhhhhhhhhhhhh', '01632967751'),
(10, 'Huong Hương', 'nữ', 'huongnguyenak96@gmail.com', 'hhhhhhhhhhhhhhh', '01632967751'),
(11, 'Huong Hương', 'nữ', 'huongnguyenak96@gmail.com', 'hhhhhhhhhhhhhhh', '01632967751'),
(12, 'Huong Hương', 'nữ', 'huongnguyenak96@gmail.com', 'hhhhhhhhhhhhhhh', '01632967751'),
(13, 'Huong Hương', 'nữ', 'huongnguyenak96@gmail.com', 'hhhhhhhhhhhhhhh', '01632967751'),
(14, 'Huong Hương', 'nữ', 'huongnguyenak96@gmail.com', 'hhhhhhhhhhhhhhh', '01632967751'),
(15, 'Huong Hương', 'nữ', 'huongnguyenak96@gmail.com', 'hhhhhhhhhhhhhhh', '01632967751'),
(16, 'Huong Hương', 'nữ', 'huongnguyenak96@gmail.com', 'hhhhhhhhhhhhhhh', '01632967751');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `parent` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:show | 1:hide | 2:deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `name_en`, `url`, `parent`, `image`, `hide`) VALUES
(1, 'Phòng khách', 'Living room', 'phong-khach', 0, '18-01-11-09-09-55-san-pham-moi-nx-dep.jpg', 0),
(3, 'Phòng ngủ', 'Sleeping', 'phong-ngu', 0, '18-01-11-09-09-55-san-pham-moi-nx-dep.jpg', 2),
(4, 'Phòng ăn', 'Dining room', 'ngoai-that', 0, '18-01-18-01-19-23-dr_rm_savona_white1-Sofia-Vergara-Savona-Ivory-5-Pc-Rectangle-Dining-Room.jpeg', 0),
(5, 'Ghế ngồi', 'Seating', 'ban', 1, '', 0),
(6, 'Bàn', 'Tables', 'ban', 1, '', 0),
(7, 'Sofa', 'Sofa', 'sofa', 5, '', 0),
(8, 'Sofa góc', 'Conrner Sofa', 'sofa-goc', 5, '', 0),
(9, 'Sofa bed', 'Sofa bed', 'sofa-bed', 5, '', 0),
(10, 'Phòng ngủ', 'Bedroom', 'phong-ngu', 0, '18-01-18-01-22-41-phong-ngu.jpg', 0),
(11, 'Phòng làm việc', 'Work room', 'phong-lam-viec', 0, '18-01-18-01-25-12-phong-lam-viec.jpg', 0),
(12, 'Bếp', 'Kitchen', 'bep', 0, '18-01-18-01-26-32-Bep.jpg', 0),
(13, 'Hàng trang trí', 'Decoration', 'hang-trang-tri', 0, '18-01-18-01-32-21-trang-tri.jpg', 0),
(14, 'Ngoại thất', 'Exterior', 'ngoai-that', 0, '18-01-18-01-34-27-ngoai-that.jpg', 0),
(15, 'Tủ', 'Cabinets', 'tu', 1, '', 0),
(16, 'Hàng trang trí', 'Decoration', 'hang-trang-tri', 1, '', 0),
(17, 'Đồ nội thất', 'Furniture', 'do-noi-that', 4, '', 0),
(18, 'Hàng trang trí', 'Decoration', 'hang-trang-tri', 4, '', 0),
(19, 'Đồ nội thất', 'Furniture', 'do-noi-that', 10, '', 0),
(20, 'Hàng trang trí', 'Decoration', 'hang-trang-tri', 10, '', 0),
(21, 'Đồ nội thất', 'Furniture', 'do-noi-that', 11, '', 0),
(22, 'Hàng trang trí', 'Decoration', 'hang-trang-tri', 11, '', 0),
(23, 'Tủ', 'Cabinets', 'tu', 12, '', 0),
(24, 'Thiết bị bếp', 'Kitchen equipment', 'thiet-bi-bep', 12, '', 0),
(25, 'Phụ kiện bếp', 'Kitchen accessories', 'phu-kien-bep', 12, '', 0),
(26, 'Dụng cụ bếp', 'Kitchen tools', 'dung-cu-bep', 12, '', 0),
(27, 'Đồ ngoại thất', 'Outdoor furniture', 'do-ngoai-that', 14, '', 0),
(28, 'Hàng trang trí', 'Decoration', 'hang-trang-tri', 14, '', 0),
(29, 'Ghế thư giãn', 'Relaxing chair', 'ghe-thu-gian', 5, '', 0),
(30, 'Armchair', 'Armchair', 'armchair', 5, '', 0),
(31, 'Ghế dài & đôn', 'Benches & Pedestals', 'ghe-dai-&-don', 5, '', 0),
(32, 'Bàn nước', 'Water table', 'ban-nuoc', 6, '', 0),
(33, 'Bàn consone', 'Console table', 'ban-consone', 6, '', 0),
(34, 'Bàn bên', 'Side table', 'ban-ben', 6, '', 0),
(35, 'Tủ tivi', 'TV cabinet', 'tu-tivi', 15, '', 0),
(36, 'Tủ trưng bày', 'Display cabinet', 'tu-trung-bay', 15, '', 0),
(37, 'Tủ ly', 'Sideboards', 'tu-ly', 15, '', 0),
(38, 'Tủ giày', 'Shoes Cabinet', 'tu-giay', 15, '', 0),
(39, 'Kệ sách', 'Bookshelf', 'ke-sach', 15, '', 0),
(40, 'Đèn', 'Lights', 'den', 16, '', 0),
(41, 'Hoa trang trí', 'Flower decoration', 'hoa-trang-tri', 16, '', 0),
(42, 'Bình trang trí', 'Decorative bottle', 'binh-trang-tri', 16, '', 0),
(43, 'Thảm', 'Carpet', 'tham', 16, '', 0),
(44, 'Tranh', 'Painting', 'tranh', 16, '', 0),
(45, 'Tranh dán tường', 'Wall paintings', 'tranh-dan-tuong', 16, '', 0),
(46, 'Tượng trang trí', 'Decorative statues', 'tuong-trang-tri', 16, '', 0),
(47, 'Xem tất cả hàng trang trí', 'View all decorations', 'xem-tat-ca-hang-trang-tri', 16, '', 0),
(48, 'Bàn ăn', 'Dinner table', 'ban-an', 17, '', 0),
(49, 'Ghế', 'Chair', 'ghe', 17, '', 0),
(50, 'Bàn consone', 'Console table', 'ban-consone', 17, '', 0),
(51, 'Tủ ly', 'Sideboards', 'tu-ly', 17, '', 0),
(52, 'Tủ hộc kéo', 'Cabinet drawers', 'tu-hoc-keo', 17, '', 0),
(53, 'Đèn', 'Lights', 'den', 18, '', 0),
(54, 'Hoa trang trí', 'Flower decoration', 'hoa-trang-tri', 18, '', 0),
(55, 'Bình trang trí', 'Decorative bottle', 'binh-trang-tri', 18, '', 0),
(56, 'Tranh', 'Painting', 'tranh', 18, '', 0),
(57, 'Tranh dán tường', 'Wall paintings', 'tranh-dan-tuong', 18, '', 0),
(58, 'Xem tất cả hàng trang trí', 'View all decorations', 'xem-tat-ca-hang-trang-tri', 18, '', 0),
(59, 'Giường ngủ', 'Bed', 'giuong', 19, '', 0),
(60, 'Bàn đầu giường', 'Bedside table', 'ban-dau-giuong', 19, '', 0),
(61, 'Bàn trang điểm', 'Makeup table', 'ban-trang-diem', 19, '', 0),
(62, 'Ghế', 'Chair', 'ghe', 19, '', 0),
(63, 'Ghế thư giãn', 'Relaxing chair', 'ghe-thu-gian', 19, '', 0),
(64, 'Tủ áo', 'Wardrobe', 'tu-ao', 19, '', 0),
(65, 'Tủ âm tường', 'Wall cabinet', 'tu-am-tuong', 19, '', 0),
(66, 'Tủ hộc kéo', 'Cabinet drawers', 'tu-hoc-keo', 19, '', 0),
(67, 'Tủ tivi', 'TV cabinet', 'tu-tivi', 19, '', 0),
(68, 'Mền & gối', 'Blankets & pillows', 'men-goi', 20, '', 0),
(69, 'Thảm', 'Carpet', 'tham', 20, '', 0),
(70, 'Nệm', 'Mattress', 'nem', 20, '', 0),
(71, 'Khung gương', 'Mirror frames', 'khung-guong', 20, '', 0),
(72, 'Tranh', 'Painting', 'tranh', 20, '', 0),
(73, 'Tranh dán tường', 'Wall paintings', 'tranh-dan-tuong', 20, '', 0),
(74, 'Tượng trang trí', 'Decorative statues', 'tuong-trang-tri', 20, '', 0),
(75, 'Xem tất cả hàng trang trí', 'View all decorations', 'xem-tat-ca-hang-trang-tri', 20, '', 0),
(76, 'Bàn làm việc', 'Work table', 'ban-lam-viec', 21, '', 0),
(77, 'Ghế', 'Chair', 'ghe', 21, '', 0),
(78, 'Kệ sách', 'Bookshelf', 'ke-sach', 21, '', 0),
(79, 'Ghế thư giãn', 'Relaxing chair', 'ghe-thu-gian', 21, '', 0),
(80, 'Thảm', 'Carpet', 'tham', 22, '', 0),
(81, 'Đèn', 'Lights', 'den', 22, '', 0),
(82, 'Hoa trang trí', 'Flower decoration', 'hoa-trang-tri', 22, '', 0),
(83, 'Bình trang trí', 'Decorative bottle', 'binh-trang-tri', 22, '', 0),
(84, 'Tranh', 'Painting', 'tranh', 22, '', 0),
(85, 'Tranh dán tường', 'Wall paintings', 'tranh-dan-tuong', 22, '', 0),
(86, 'Tượng trang trí', 'Decorative statues', 'tuong-trang-tri', 22, '', 0),
(87, 'Xem tất cả hàng trang trí', 'View all decorations', 'xem-tat-ca-hang-trang-tri', 22, '', 0),
(88, 'Tủ bếp', 'Kitchen Cabinets', 'tu-bep', 23, '', 0),
(89, 'Tủ rượu', 'Liquor cabinet', 'tu-ruou', 23, '', 0),
(90, 'Đảo bếp', 'Kitchen Island', 'dao-bep', 23, '', 0),
(91, 'Quầy bar', 'Kitchen bar', 'quay-bar', 23, '', 0),
(92, 'Bếp', 'Hob', 'bep', 24, '', 0),
(93, 'Máy hút mùi', 'Odor absorber', 'may-hut-mui', 24, '', 0),
(94, 'Chậu rửa', 'Washbasin', 'chau-rua', 24, '', 0),
(95, 'Lò nướng', 'Oven', 'lo-nuong', 24, '', 0),
(96, 'Lò vi sóng', 'Microwave oven', 'lo-vi-song', 24, '', 0),
(97, 'Các thiết bị khác', 'Other devices', 'cac-thiet-bi-khac', 24, '', 0),
(98, 'Phụ kiện bếp', 'Kitchen accessories', 'phu-kien-bep', 25, '', 0),
(99, 'Dụng cụ bếp', 'Kitchen tools', 'dung-cu-bep', 26, '', 0),
(100, 'Thùng rác', 'Trash can', 'thung-rac', 26, '', 0),
(101, 'Đồ trang trí Noel', 'Christmas decoration', 'do-trang-tri-noel', 13, '', 2),
(102, 'Hoa & cây', 'Flowers & Plants', 'hoa-&-cay', 13, '', 2),
(103, 'Bình trang trí', 'Decorative bottle', 'binh-trang-tri', 13, '', 2),
(104, 'Nệm', 'Mattress', 'nem', 13, '', 2),
(105, 'Thảm trang trí', 'Decorative rugs', 'tham-trang-tri', 13, '', 2),
(106, 'Đèn trang trí', 'Decorative lights', 'den-trang-tri', 13, '', 2),
(107, 'Tranh', 'Painting', 'tranh', 13, '', 2),
(108, 'Tranh dán tường', 'Wall paintings', 'tranh-dan-tuong', 13, '', 2),
(109, 'Tượng trang trí', 'Decorative statues', 'tuong-trang-tri', 13, '', 2),
(110, 'Khung hình', 'Photo Frame', 'khung-hinh', 13, '', 2),
(111, 'Gối và thú bông', 'Pillow and stuffed animal', 'goi-va-thu-bong', 13, '', 2),
(112, 'Đồng hồ', 'Clock', 'dong-ho', 13, '', 2),
(113, 'Khung gương', 'Mirror frames', 'khung-guong', 13, '', 2),
(114, 'Nến và chân nến', 'Candles and candlesticks', 'nen-va-chan-nen', 13, '', 2),
(115, 'Hàng trang trí khác', 'Other decorations', 'hang-trang-tri-khac', 13, '', 2),
(116, 'Dụng cụ bếp', 'Kitchen tools', 'dung-cu-bep', 13, '', 2),
(117, 'Bàn ngoài trời', 'Outdoor table', 'ban-ngoai-troi', 27, '', 0),
(118, 'Ghế ngoài trời', 'Outdoor chair', 'ghe-ngoai-troi', 27, '', 0),
(119, 'Hoa & cây', 'Flowers & Plants', 'hoa-cay', 28, '', 0),
(120, 'Xem tất cả hàng trang trí', 'View all decorations', 'xem-tat-ca-hang-trang-tri', 28, '', 0),
(121, 'Nội thất', 'Furniture', '', 13, '', 0),
(122, 'Đồ trang trí Noel', 'Christmas decoration', 'do-trang-tri-noel', 121, '', 0),
(123, 'Hoa & cây', 'Flowers & Plants', 'hoa-cay', 121, '', 0),
(124, 'Bình trang trí', 'Decorative bottle', 'binh-trang-tri', 121, '', 0),
(125, 'Nệm', 'Mattress', 'nem', 121, '', 0),
(126, 'Thảm trang trí', 'Đèn trang trí', 'tham-trang-tri', 121, '', 0),
(127, 'Đèn trang trí', 'Decorative lights', 'tranh', 121, '', 0),
(128, 'Tranh', 'Painting', 'tranh-dan-tuong', 121, '', 0),
(129, 'Tranh dán tường', 'Wall paintings', 'tuong-trang-tri', 121, '', 0),
(130, 'Tượng trang trí', 'Decorative statues', 'khung-hinh', 121, '', 0),
(131, 'Khung hình', 'Photo Frame', 'khung-hinh', 121, '', 0),
(132, 'Gối và thú bông', 'Pillow and stuffed animal', 'goi-va-thu-bong', 121, '', 2),
(133, 'Đồng hồ', 'Clock', 'dong-ho', 121, '', 2),
(134, 'Khung gương', 'Mirror frames', 'khung-guong', 121, '', 2),
(135, 'Nến và chân nến', 'Candles and candlesticks', 'nen-va-chan-nen', 121, '', 2),
(136, 'Hàng trang trí khác', 'Other decorations', 'hang-trang-tri-khac', 121, '', 2),
(137, 'Dụng cụ bếp', 'Kitchen tools', 'dung-cu-bep', 121, '', 2),
(138, 'Trưng bày', 'Display', 'trung-bay', 13, '', 0),
(139, 'Khác', 'Other', 'khac', 13, '', 0),
(140, 'Gối và thú bông', 'Pillow and stuffed animal', 'goi-va-thu-bong', 138, '', 0),
(141, 'Đồng hồ', 'Clock', 'dong-ho', 138, '', 0),
(142, 'Khung gương', 'Mirror frames', 'khung-guong', 138, '', 0),
(143, 'Nến và chân nến', 'Candles and candlesticks', 'nen-va-chan-nen', 138, '', 0),
(144, 'Hàng trang trí khác', 'Other decorations', 'hang-trang-tri-khac', 139, '', 0),
(145, 'Dụng cụ bếp', 'Kitchen tools', 'dung-cu-bep', 139, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `page_url`
--

CREATE TABLE `page_url` (
  `id` int(11) NOT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page_url`
--

INSERT INTO `page_url` (`id`, `url`) VALUES
(1, 'sofajazz3chodacognac'),
(2, '3-luu-y-khi-dat-coc-mua-nha-dat-neu-ban-khong-muon-mat-tien-oan'),
(3, 'fdfd'),
(4, 'dfdf'),
(5, 'ghe002'),
(6, 'sofa-pillaton'),
(7, 'sofa-connemara'),
(8, 'sofa-co-ghe-nam-narbonne'),
(9, 'ban-an-ankor'),
(10, 'ghe-an-ankor'),
(11, 'tu-bat-dia-novak'),
(12, 'giuong-mozart'),
(13, 'giuong-albany'),
(14, 'giuong-ali'),
(15, 'ban-lam-viec-attila'),
(16, 'ghe-van-phong-jones'),
(17, 'ke-sach-avatar'),
(18, 'tu-bep-roxie'),
(19, 'bep-tu-philips-hd4932'),
(20, 'thot-hakata'),
(21, 'chau-cay-gia-mosquito'),
(22, 'dong-ho-treo-tuong-dora'),
(23, 'do-trang-tri-giang-sinh-kristos'),
(24, 'ban-gap-thong-minh--t9000'),
(25, 'sofa-normandy'),
(26, 'sofa-funky'),
(27, 'sofa-monaco'),
(28, 'ban-an-barcelona'),
(29, 'ban-an-it'),
(30, 'ban-lam-viec-suecia'),
(31, 'ban-lam-viec-albany'),
(32, 'hoa-gia-sister-sun'),
(33, 'hoa-gia-trong-chau-papillion'),
(34, 'ban-ngoai-troi-ristorante'),
(35, 'ban-ngoai-troi-cafe-royale'),
(36, 'tu-bep-inox-canh-go-tu-nhien-gtn'),
(37, 'tu-bep-nhat-ban-cec8575cw'),
(38, 's'),
(39, '1u'),
(40, 'f'),
(41, 'xcxc'),
(42, 'xu-huong-vat-lieu-va-mau-sac-trong-thiet-ke-noi-that-phong-khach-nam-2018'),
(43, 'xu-huong-vat-lieu-va-mau-sac-trong-thiet-ke-noi-that-phong-khach-nam-2018'),
(44, 'thiet-ke-noi-that-phong-khach-cho-nam-20182019'),
(45, 'nhung-mau-phong-an-mau-trang-thanh-lich-voi-tong-mau-trang-va-go-noi-that'),
(46, 'mau-can-ho-mang-phong-cach-bac-au-tre-trung-an-tuong'),
(47, 'mot-so-meo-trang-tri-noi-that-cho-can-ho-khong-gian-nho-hep'),
(48, '5-phong-cach-thiet-ke-noi-that-doc-dao-cho-ngoi-nha-cua-ban'),
(49, 'kinh-nghiem-chon-noi-that-cho-phong-khach'),
(50, 'can-nha-voi-khong-gian-sach-day-nghe-thuat'),
(51, 'nhung-mau-phong-khach-don-gian-nhung-van-hot-nam-2018');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title_en` varchar(266) DEFAULT NULL,
  `id_url` int(11) NOT NULL,
  `summary` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `detail` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `summary_en` text,
  `detail_en` text,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `id_type` int(10) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1:deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `title_en`, `id_url`, `summary`, `detail`, `summary_en`, `detail_en`, `image`, `views`, `id_type`, `created_at`, `deleted`) VALUES
(1, '3 lưu ý khi đặt cọc mua nhà đất nếu bạn không muốn mất tiền oan', '3 lưu ý khi đặt cọc mua nhà đất nếu bạn không muốn mất tiền oan', 2, 'Bỏ tiền đặt cọc khi chưa tìm hiểu kỹ ngôi nhà cũng như người bán đều có thể khiến bạn mất tiền mà không mua được nhà.\r\n', '<p>Dưới đ&acirc;y l&agrave; những khuyến c&aacute;o của chuy&ecirc;n gia bất động sản c&aacute; nh&acirc;n Phan C&ocirc;ng Ch&aacute;nh (TP HCM) về những điều bạn cần lưu &yacute; khi đặt cọc mua bất động sản:&nbsp;</p>\r\n\r\n<p><strong>Những việc cần l&agrave;m trước khi đặt cọc:</strong></p>\r\n\r\n<p>Sau khi xem xong bất động sản, nếu thoả thuận được gi&aacute; cả, đ&acirc;y l&agrave; danh s&aacute;ch những việc cần kiểm tra:</p>\r\n\r\n<p>1. Kiểm tra t&iacute;nh ch&iacute;nh danh của chủ nh&agrave;: chủ nh&agrave; c&oacute; phải l&agrave; ch&iacute;nh chủ kh&ocirc;ng?</p>\r\n\r\n<p>Đối chiếu th&ocirc;ng tin chủ nh&agrave;: t&ecirc;n, ảnh, số chứng minh nh&acirc;n d&acirc;n hoặc căn cước c&ocirc;ng d&acirc;n tr&ecirc;n sổ đỏ c&oacute; tr&ugrave;ng khớp với th&ocirc;ng tin tr&ecirc;n chứng minh nh&acirc;n d&acirc;n hoặc sổ đỏ kh&ocirc;ng.</p>\r\n\r\n<p>Xin một bản photo sổ hồng đem l&ecirc;n phường hoặc tổ d&acirc;n phố để hỏi. Thường th&igrave; tổ trưởng d&acirc;n phố hoặc Uỷ ban phường sẽ nắm rất r&otilde; chủ nh&agrave; đ&oacute; c&oacute; phải l&agrave; ch&iacute;nh chủ hay kh&ocirc;ng.</p>\r\n\r\n<p>2. Kiểm tra xem nh&agrave; c&oacute; bị quy hoạch kh&ocirc;ng?</p>\r\n', 'Bỏ tiền đặt cọc khi chưa tìm hiểu kỹ ngôi nhà cũng như người bán đều có thể khiến bạn mất tiền mà không mua được nhà.\r\n', '<p>Dưới đ&acirc;y l&agrave; những khuyến c&aacute;o của chuy&ecirc;n gia bất động sản c&aacute; nh&acirc;n Phan C&ocirc;ng Ch&aacute;nh (TP HCM) về những điều bạn cần lưu &yacute; khi đặt cọc mua bất động sản:&nbsp;</p>\r\n\r\n<p><strong>Những việc cần l&agrave;m trước khi đặt cọc:</strong></p>\r\n\r\n<p>Sau khi xem xong bất động sản, nếu thoả thuận được gi&aacute; cả, đ&acirc;y l&agrave; danh s&aacute;ch những việc cần kiểm tra:</p>\r\n\r\n<p>1. Kiểm tra t&iacute;nh ch&iacute;nh danh của chủ nh&agrave;: chủ nh&agrave; c&oacute; phải l&agrave; ch&iacute;nh chủ kh&ocirc;ng?</p>\r\n\r\n<p>Đối chiếu th&ocirc;ng tin chủ nh&agrave;: t&ecirc;n, ảnh, số chứng minh nh&acirc;n d&acirc;n hoặc căn cước c&ocirc;ng d&acirc;n tr&ecirc;n sổ đỏ c&oacute; tr&ugrave;ng khớp với th&ocirc;ng tin tr&ecirc;n chứng minh nh&acirc;n d&acirc;n hoặc sổ đỏ kh&ocirc;ng.</p>\r\n\r\n<p>Xin một bản photo sổ hồng đem l&ecirc;n phường hoặc tổ d&acirc;n phố để hỏi. Thường th&igrave; tổ trưởng d&acirc;n phố hoặc Uỷ ban phường sẽ nắm rất r&otilde; chủ nh&agrave; đ&oacute; c&oacute; phải l&agrave; ch&iacute;nh chủ hay kh&ocirc;ng.</p>\r\n\r\n<p>2. Kiểm tra xem nh&agrave; c&oacute; bị quy hoạch kh&ocirc;ng?</p>\r\n', '18-01-15-07-48-01-sale.jpeg', 26, 1, '2018-01-15 00:45:52', 1),
(4, 'Xu hướng vật liệu và màu sắc trong thiết kế nội thất phòng khách năm 2018', 'Material trends and colors in interior design living room 2018', 43, 'Theo những nghiên cứu của các chuyên gia, màu sắc có giá trị về thời gian nhất vẫn là màu sắc của ghế bành, ghế sofa, phụ kiện với tông màu mạnh mẽ và đặc trưng, trong các tác phẩm kinh điển hiện đại của Cassina, Ligne Rose hay Thonet. Vì vậy bạn hãy tận hưởng cuộc hành trình thú vị này nhé.', '<p><strong>Theo những nghi&ecirc;n cứu của c&aacute;c chuy&ecirc;n gia, m&agrave;u sắc c&oacute; gi&aacute; trị về thời gian nhất vẫn l&agrave; m&agrave;u sắc của ghế b&agrave;nh, ghế sofa, phụ kiện với t&ocirc;ng m&agrave;u mạnh mẽ v&agrave; đặc trưng, trong c&aacute;c t&aacute;c phẩm kinh điển hiện đại của Cassina, Ligne Rose hay Thonet. V&igrave; vậy bạn h&atilde;y tận hưởng cuộc h&agrave;nh tr&igrave;nh th&uacute; vị n&agrave;y nh&eacute;.</strong></p>\r\n\r\n<p><strong><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_1.jpg\" style=\"height:100%; width:100%\" /></strong></p>\r\n\r\n<p>V&igrave; vậy, xu hướng m&agrave;u nội thất đang đặt ra rất nhiều c&acirc;u hỏi v&agrave; cần kết hợp những g&igrave; với t&ocirc;ng m&agrave;u n&agrave;y v&agrave; trong phạm vi n&agrave;o. M&agrave;u sắc l&agrave; điểm nhấn của xu hướng thiết kế nội thất năm 2018 v&agrave; thẩm mỹ của to&agrave;n bộ kh&ocirc;ng gian trong nh&agrave;. Đ&aacute;ng ch&uacute; &yacute; l&agrave; gam m&agrave;u&nbsp;Pastel girlie nhanh ch&oacute;ng trở th&agrave;nh một chuẩn mực.</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_2.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>Ch&uacute;ng ta c&oacute; thể&nbsp;nhận thấy rằng, sự hiện diện lặp đi lặp lại của ton m&agrave;u s&aacute;ng hoặc v&agrave;ng chanh như một sự lựa chọn ch&iacute;nh x&aacute;c chỉ d&agrave;nh cho ch&uacute;ng. Nhưng đ&acirc;y kh&ocirc;ng phải l&agrave; sự lựa chọn t&aacute;o bạo được thể hiện của nh&agrave; thiết kế trong m&agrave;u sắc. Sự lựa chọn tối t&acirc;n trong xu hướng thiết kế nội thất 2018 l&agrave; m&agrave;u đỏ cam hoặc pad Ban trong m&agrave;u xanh l&aacute; c&acirc;y. V&agrave; m&agrave;u xanh l&aacute; c&acirc;y trong bản thiết kế v&agrave; m&agrave;u v&agrave;ng &ndash; xanh sẽ sự lựa chọn tốt nhất năm 2018/2019.</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_3.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>Một xu hướng thiết kế nội thất năm nay cũng được kh&aacute;m ph&aacute; ra với gam m&agrave;u th&ocirc;ng xanh, m&agrave;u m&ugrave; tạt, m&agrave;u đỏ Bordeax đ&acirc;y l&agrave; sự kết hợp tạo n&ecirc;n một phong c&aacute;ch nội thất ho&agrave;n to&agrave;n đột ph&aacute;. Phong c&aacute;ch nội thất n&agrave;y được lấy cảm hứng từ c&aacute;c tiệm Viena của thời điểm chuyển giao thế kỷ 20.</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_4.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>N&oacute;i về sự ảnh hưởng của phong c&aacute;ch thiết kế nội thất Baroque khiến ch&uacute;ng ta phải ch&uacute; &yacute; đến ch&iacute;nh l&agrave; c&aacute;c vật liệu đa dạng như: nhung, kim loại, gỗ m&agrave;u tối. Những điểm nổi bật trong m&agrave;u v&agrave;ng satin, được tạo bằng m&agrave;u đồng thau l&agrave; sự kế thừa của m&agrave;u đồng t&ocirc; điểm trong trang tr&iacute; ph&ograve;ng kh&aacute;ch năm nay. Điều n&agrave;y l&agrave;m nổi bật l&ecirc;n sự quyền qu&yacute; trong nội thất của gia chủ.</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_6.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>Xu hướng thiết kế nội thất 2018 mang phong c&aacute;ch Scandinavia thể hiện sự hiện đại quyến rũ cổ điển khi được trang bị m&ocirc;t chiếc ghế b&agrave;nh m&agrave;u v&agrave;ng mang lại sự sang trọng cảm gi&aacute;c qu&yacute; tộc kh&ocirc;ng thể nhầm lẫn. Sự c&acirc;n bằng đ&atilde; thể hiện trong nội thất ph&ograve;ng kh&aacute;ch l&agrave; sự phong ph&uacute; trong phong c&aacute;ch cổ diển kết hợp vật liệu sang trọng, m&agrave;u sắc đậm n&eacute;t v&agrave; c&aacute;c chi tiết rất hấp dẫn.</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_7.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>Một bộ ghế ph&ograve;ng kh&aacute;ch s&aacute;ng tạo chưa từng thấy, ch&uacute;ng sở hữu tất cả c&aacute;c t&iacute;nh chất nổi bật quyến rũ hợp thời đại, m&agrave;u sắc đậm đ&agrave; m&agrave; vẫn mềm mại với h&igrave;nh dạng kết cấu phong ph&uacute;, mang đến cho bạn một kh&ocirc;ng gian thư giản thoải m&aacute;i.</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_8.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>Xu hướng thiết kế nội thất 2018 cho ph&ograve;ng kh&aacute;ch tiện nghi cỡ lớn m&agrave;u sắc đậm đ&agrave; hoạt tiết trang tr&iacute; hấp dẫn được lấy cảm hứng từ một bản thiết kế c&aacute;ch đ&acirc;y 35 năm, mang theo những trải nghiệm cổ điển. Bộ sưu tập đặc trưng với trải nghiệm l&agrave; những chiếc ghế lớn l&oacute;t đầy l&ocirc;ng cừu tạo ta một trải nghiệm thư gi&atilde;n thoải m&aacute;i nhất.</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xxu_huong_phong_khach_9.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_10.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_11.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_12.jpg\" style=\"height:100%; width:100%\" /></p>\r\n', 'According to research by experts, the most valuable color of the time is still the color of the armchairs, sofas, accessories in strong and characteristic tones, in modern classics of Cassina, Ligne Rose or Thonet. So enjoy this exciting journey.', '<p><strong>According to research by experts, the most valuable color of the time is still the color of the armchairs, sofas, accessories in strong and characteristic tones, in modern classics of Cassina, Ligne Rose or Thonet. So enjoy this exciting journey.</strong></p>\r\n\r\n<p><strong><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_1.jpg\" style=\"height:100%; width:100%\" /></strong></p>\r\n\r\n<p>Therefore, the trend of interior color is posing a lot of questions and need to combine what with this color tone and in what range. Color is the highlight of the 2018 interior design trend and the aesthetics of the entire interior space. Notably, pastel girlie color quickly became a norm.</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_2.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>We may notice that the repetitive presence of bright colors or lemon yellow is the only correct choice for them. But this is not the audacious choice expressed by the designer in color. The ultra-modern interior design trend of 2018 is the red orange or green pad. And green in design and yellow - blue will be the best choice in 2018/2019.</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_3.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>An interior design trend this year has also been discovered with the color of green, mustard, red color Bordeax this is the combination of a complete interior style breakthrough. This interior style was inspired by the Viena stores of the turn of the 20th century.</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_4.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>Talking about the influence of Baroque interior design, we have to pay attention to materials such as velvet, metal, dark wood. The highlights in satin yellow, made of brass are the inheritance of co-adornment in living room decor of this year. This highlights the noble right in the interior of the home.</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_6.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>The Scandinavian style interior design 2018 represents a classic glamorous modernity when fitted with a yellow armchair for unmistakable aristocratic elegance. The balance shown in the living room interior is rich in antique style combined with luxurious materials, bold colors and attractive details.</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_7.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>An unmatched set of living room chairs, they possess all the striking features of a contemporary, sleek color that remains soft with rich textured shapes, giving you a space&nbsp;relaxed atmosphere.</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_8.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>Interior Design Trends 2018 for large, comfortable, richly decorated, colorful living rooms are inspired by a 35-year-old design that brings together classic experiences. The characteristic feature of the collection is the large lined fleece cushions that make for the most relaxing experience.</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xxu_huong_phong_khach_9.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_10.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_11.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_12.jpg\" style=\"height:100%; width:100%\" /></p>\r\n', '18-01-22-04-04-48-xu_huong_phong_khach_7.jpg', 4, 1, '2018-01-21 21:04:48', 0),
(5, 'Thiết kế nội thất phòng khách cho năm 2018/2019', 'Interior design living room for 2018/2019', 44, 'Nói về xu hướng thiết kế nội thât phòng khách năm 2018 có vài nguyên tắc chính mà bạn có thể đã nhận thấy: đó là ngoài sự bùng nổ của màu sắc và vật liệu sáng mà chúng tôi đã khám phá trước đây. Cảm hứng lấy từ các miếng đồ gỗ cổ điển được ghi nhận ở hầu hết mọi nơi. Và chúng tôi nói về cảm hứng sử dụng các vật liệu mới, công nghệ mới và thẩm mỹ để sáng tạo lại và tạo ra một cuộc sống mới cho một thiết kế vượt thời gian đã được chứng minh', '<p>N&oacute;i về xu hướng thiết kế nội th&acirc;t ph&ograve;ng kh&aacute;ch năm 2018 c&oacute; v&agrave;i nguy&ecirc;n tắc ch&iacute;nh m&agrave; bạn c&oacute; thể đ&atilde; nhận thấy: đ&oacute; l&agrave; ngo&agrave;i sự b&ugrave;ng nổ của m&agrave;u sắc v&agrave; vật liệu s&aacute;ng m&agrave; ch&uacute;ng t&ocirc;i đ&atilde; kh&aacute;m ph&aacute; trước đ&acirc;y. Cảm hứng lấy từ c&aacute;c miếng đồ gỗ cổ điển được ghi nhận ở hầu hết mọi nơi. V&agrave; ch&uacute;ng t&ocirc;i n&oacute;i về cảm hứng sử dụng c&aacute;c vật liệu mới, c&ocirc;ng nghệ mới v&agrave; thẩm mỹ để s&aacute;ng tạo lại v&agrave; tạo ra một cuộc sống mới cho một thiết kế vượt thời gian đ&atilde; được chứng minh. Đ&oacute; l&agrave; l&agrave;m cho từ thiết kế nội thất trở th&agrave;nh một nơi gi&agrave;u c&oacute; v&agrave; th&uacute; vị hơn &ndash; nhiều thiết kế mới n&agrave;y đ&atilde; tự tin đi v&agrave;o c&aacute;c thời đại kh&aacute;c nhau, lấy &yacute; tưởng &nbsp;v&agrave; c&aacute;c giải ph&aacute;p của những năm 1940 v&agrave; 1950 hoặc những năm 1970 v&agrave; mang lại nhiều sự phong ph&uacute; v&agrave; đa dạng h&igrave;nh th&aacute;i kh&aacute;c nhau.</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_13.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>Tuy nhi&ecirc;n, ch&uacute; &yacute;, suy nghĩ lại v&agrave; sự trang tr&iacute; lại của thiết kế nội thất, cho thấy hướng hiện đại độc đ&aacute;o của n&oacute;: ghế sofa mở rộng v&agrave; d&agrave;i, sắp xếp chỗ ngồi lớn v&agrave; &ecirc;m &aacute;i, ghế được gấp lại v&agrave; được. L&agrave; nơi nghỉ ngơi thoải m&aacute;i v&agrave; thư gi&atilde;n, xu hướng thiết kế nội thất 2018 mới của sắp xếp ngồi v&agrave; ghế ngồi cực tiện nghi l&agrave; một biểu hiện của cuộc sống ng&agrave;y nay &ndash; nơi mọi người trở về nh&agrave; sau một ng&agrave;y bận rộn v&agrave; muốn nằm nghỉ, thư gi&atilde;n v&agrave; cảm thấy thoải m&aacute;i. V&igrave; vậy, đ&oacute; l&agrave; một xu hướng kh&aacute;c trong thế giới trang tr&iacute; nội thất: đi bộ giữa c&aacute;c gian h&agrave;ng của triển l&atilde;m l&agrave; một trong những ng&acirc;y ngất của v&agrave;ng lấp l&aacute;nh, nhung nhung, v&agrave; c&aacute;c vật liệu độc quyền, quyến rũ lung linh &aacute;nh thủy tinh v&agrave; kim loại chải tinh xảo m&agrave; tạo &nbsp;th&agrave;nh c&aacute;c t&iacute;nh năng của ph&ograve;ng kh&aacute;ch trang tr&iacute; nội thất thiết kế. Sự tinh tế chắc chắn l&agrave; &quot;cơn thịnh nộ&quot;&nbsp;trong thế giới thiết kế nội thất hiện tại. Thật vậy, xu hướng sang trọng l&agrave; thể nhận thấy ở khắp mọi nơi..</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_14.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_15.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_16.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_17.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_18.jpg\" style=\"height:100%; width:100%\" /></p>\r\n', 'Talking about the 2018 living room interior design trend, there are some key principles that you may have noticed: it is beyond the explosion of colors and light materials that we have explored before. Inspired by classic pieces of furniture, they are found everywhere. And we talk about inspiration using new materials, new technology and aesthetics to re-invent and create a new life for a proven timeless design.', '<p>Talking about the 2018 living room interior design trend, there are some key principles that you may have noticed: it is beyond the explosion of colors and light materials that we have explored before. Inspired by classic pieces of furniture, they are found everywhere. And we talk about inspiration using new materials, new technology and aesthetics to re-invent and create a new life for a proven timeless design. That is to make the interior design a richer and more interesting place - many of these new designs are confident in going to different eras, get ideas and solutions from the 1940s and 1950s, or The 1970s brought a lot of diversity and morphology.</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_13.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>However, attention, rethinking and refurbishment of the interior design, show its unique modernity: an extended and long sofa, large seating arrangements and soft folding seats. and be. As a comfortable and relaxing getaway, the new 2018 interior design trend of ultra-comfortable seating and seating is a manifestation of today life - where people return home after a busy day and want to lie down, relax and feel comfortable. So that is another trend in the world of home decoration: walking among the exhibitors booth is one of the ecstasy of sparkling gold, velvet velvet, and exclusive materials, glittering glamor. crystal glass and metallic brushes that make up the features of the living room interior design. Sophistication is definitely the &quot;rage&quot; in the world of contemporary interior design. Indeed, the luxury trend is recognizable everywhere.</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_14.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_15.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_16.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_17.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/xu_huong_phong_khach_18.jpg\" style=\"height:100%; width:100%\" /></p>\r\n', '18-01-22-04-19-30-xu_huong_phong_khach_15.jpg', 6, 1, '2018-01-21 21:19:30', 0),
(6, 'Những mẫu phòng khách đơn giản nhưng vẫn hot năm 2018', 'The living room is simple but still hot in 2018', 51, 'Theo dự báo, xu hướng phòng khách được ưa chuộng trong năm 2018 là đơn giản, gần gũi với thiên nhiên và thể hiện rõ cá tính của gia chủ.', '<p><strong>Theo dự b&aacute;o, xu hướng ph&ograve;ng kh&aacute;ch được ưa chuộng trong năm 2018 l&agrave; đơn giản, gần gũi với thi&ecirc;n nhi&ecirc;n v&agrave; thể hiện r&otilde; c&aacute; t&iacute;nh của gia chủ.</strong></p>\r\n\r\n<p>Ph&ograve;ng kh&aacute;ch đơn giản nhưng sang trọng với tường sọc ngang dần l&ecirc;n ng&ocirc;i cuối năm 2017 v&agrave; dự b&aacute;o sẽ l&agrave;m mưa l&agrave;m gi&oacute; tr&ecirc;n thị trường nội thất 2018</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/phong-khach-2.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>Việc sử dụng gam m&agrave;u s&aacute;ng l&agrave; xu hướng được ưa chuộng nhất trong năm tới. C&aacute;c gam m&agrave;u nhẹ nh&agrave;ng kết hợp c&ugrave;ng cửa k&iacute;nh lớn tạo ra hiệu ứng kh&ocirc;ng gian ph&ograve;ng kh&aacute;ch hiện đại</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/phong-khach-3.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>Ph&ograve;ng kh&aacute;ch đa sắc m&agrave;u thể hiện r&otilde; n&eacute;t c&aacute; t&iacute;nh của gia chủ</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/phong-khach-4.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>2018 sẽ l&agrave; sự l&ecirc;n ng&ocirc;i của c&aacute;c phong c&aacute;ch tối giản trong thiết kế nội thất ph&ograve;ng kh&aacute;ch hiện đại</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/phong-khach-5.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>Năm 2018 v&agrave; nhiều năm kế tiếp sẽ đ&aacute;nh dấu sự trở lại của c&aacute;c mẫu tranh trang tr&iacute; gắn liền với thi&ecirc;n nhi&ecirc;n</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/phong-khach-6.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>Ngo&agrave;i sự đơn giản, sofa thấp c&ograve;n tiết kiệm diện t&iacute;ch kh&ocirc;ng gian v&agrave; mang đến sự tiện nghi</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/phong-khach-7.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>Ph&ograve;ng kh&aacute;ch hiện đại lu&ocirc;n ưu &aacute;i c&aacute;c m&oacute;n đồ nội thất đơn giản. N&oacute; gi&uacute;p gia chủ tự do s&aacute;ng tạo, b&agrave;i tr&iacute; theo sở th&iacute;ch c&aacute; nh&acirc;n.</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/phong-khach-8.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>Hai gam m&agrave;u chủ đạo l&agrave; trắng v&agrave; x&aacute;m mang đến cảm gi&aacute;c trẻ trung, sạch sẽ</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/phong-khach-9.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>Ph&ograve;ng kh&aacute;ch b&aacute;n cổ điển sang trọng với bộ sofa đơn giản, đ&egrave;n ch&ugrave;m trang tr&iacute;</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/phong-khach-10.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>Đ&egrave;n trang tr&iacute; bằng pha l&ecirc;, kim loại mạ&hellip; vừa cung cấp &aacute;nh s&aacute;ng vừa tạo hiệu ứng thẩm mỹ cho căn ph&ograve;ng</p>\r\n', '', '<p><strong>It is predicted that the trend of living room in 2018 is simple, close to nature and express the personality of the owner.</strong></p>\r\n\r\n<p>Simple but luxurious living room with horizontal stripes at the end of 2017 and predicted to rain on the furniture market 2018.</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/phong-khach-2.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>The use of bright colors is the most popular trend in the coming year. The light colors combined with large glass doors create a modern living room effect</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/phong-khach-3.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>Multicolored guest rooms express the personality of the owner</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/phong-khach-4.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>2018 will be the throne of the minimalist style in the design of modern living room furniture</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/phong-khach-5.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>2018 and the next several years will mark the return of decorative patterns associated with nature</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/phong-khach-6.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>In addition to the simplicity, the low sofa saves space and provides comfort</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/phong-khach-7.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>Modern living rooms feature simple furnishings. It helps homeowners freedom to create, customize according to personal preferences.</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/phong-khach-8.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>The two main colors are white and gray with a youthful, clean feel</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/phong-khach-9.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>Luxurious, classic-style guest rooms with simple sofas, chandeliers</p>\r\n\r\n<p><img alt=\"\" src=\"/f3/public/images/phong-khach-10.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>Decorative light with crystal, metal plating ... both provide light and create aesthetic effect for the room</p>\r\n', '18-01-22-10-51-46-phong-khach-1.jpg', 4, 1, '2018-01-22 03:51:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_url` int(11) DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `summary` varchar(500) NOT NULL,
  `summary_en` varchar(500) NOT NULL,
  `detail` text NOT NULL,
  `detail_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `promotion_price` double NOT NULL DEFAULT '0',
  `image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `material` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'chất liệu',
  `material_en` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `color_en` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `update_at` date NOT NULL,
  `unit` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'đĩa',
  `noibat` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `id_type`, `id_url`, `name`, `name_en`, `summary`, `summary_en`, `detail`, `detail_en`, `price`, `promotion_price`, `image`, `size`, `material`, `material_en`, `color`, `color_en`, `update_at`, `unit`, `noibat`, `deleted`) VALUES
(4, 50, 1, 'Sofa Jazz 3 chỗ da cognac', 'Jazz 3 seater sofa', 'Đang cập nhật', 'Updating', '<p>Updating...</p>\r\n', '<p><strong>Updating...</strong></p>\r\n', 52500000, 52000000, '[\"1514432493-phong-khach-jazz-go-soi.jpg\",\"1514432493-nha-xinh-sofa-jazz-moi-500.jpg\",\"1514432493-nha-xinh-sofa-jazz-nghieng-500.jpg\"]', 'D2300 - R800 - C750', 'Khung gỗ bọc da', 'Wood frame - Leather', 'Nâu đỏ', 'brown red', '2018-01-18', 'bộ', 1, 1),
(7, 7, 6, 'Sofa PILLATON', 'Sofa PILLATON', 'Sofa PILLATON với phong cách Bắc Âu cổ điển sẽ làm cho không gian phòng khách trong nhà của bạn đẹp và đẳng cấp hơn bao giờ hết.', 'Sofa ', '<p><strong><a href=\"http://saithanhhome.com/sofa-7\">Sofa</a> PILLATON với phong c&aacute;ch Bắc &Acirc;u cổ điển sẽ l&agrave;m cho kh&ocirc;ng gian ph&ograve;ng kh&aacute;ch&nbsp;trong nh&agrave; của bạn đẹp v&agrave; đẳng cấp hơn bao giờ hết.</strong></p>\r\n', '<p><strong>Sofa PILLATON with classic Nordic style will make the living room space in your home more beautiful and class than ever.</strong></p>\r\n', 20000, 0, '[\"1516265498-SOFA-PILLATON-01.jpg\",\"1516265498-SOFA-PILLATON-02.jpg\",\"1516265498-SOFA-PILLATON-03.jpg\",\"1516265498-SOFA-PILLATON-04.jpg\",\"1516265498-SOFA-PILLATON-05.jpg\"]', 'L148xD68xH90 cm', 'Polyester', 'Polyester', 'Màu nâu', 'Brown', '2018-02-01', 'đồng', 0, 0),
(8, 7, 7, 'Sofa CONNEMARA', 'Sofa CONNEMARA', 'Tinh tế, sang trọng và vô cùng êm ái là những đặc điểm có thể nhận ra ngay khi nhìn vào chiếc sofa đầu tiên do chính UMA thiết kế: CONNEMARA.', 'Sophi', '<p>Tinh tế, sang trọng v&agrave; v&ocirc; c&ugrave;ng &ecirc;m &aacute;i l&agrave; những đặc điểm c&oacute; thể nhận ra ngay khi nh&igrave;n v&agrave;o chiếc sofa đầu ti&ecirc;n do ch&iacute;nh UMA thiết kế: <strong>CONNEMARA</strong>. Chất liệu vải nhung mịn m&agrave;ng với m&agrave;u xanh mang đến vẻ đẹp sang trọng cho ph&ograve;ng kh&aacute;ch. Ch&acirc;n ghế bằng gỗ &oacute;c ch&oacute; với m&agrave;u sắc ấm &aacute;p. Khung ghế từ gỗ đặc chắc chắn, bền bỉ.</p>\r\n', '<p>Sophisticated, luxurious and extremely smooth, these features are immediately recognizable when looking at the first Uma design sofa: <strong>CONNEMARA</strong>. Velvet fabric with blue color brings luxury to the living room. Legs of walnut wood with warm colors. Rugged, durable solid wood frame.</p>\r\n', 14400000, 0, '[\"1516257582-SOFA-CONNEMARA-01.jpg\",\"1516257582-SOFA-CONNEMARA-02.jpg\",\"1516257582-SOFA-CONNEMARA-03.jpg\",\"1516257582-SOFA-CONNEMARA-04.jpg\",\"1516257582-SOFA-CONNEMARA-05.jpg\",\"1516257582-SOFA-CONNEMARA-06.jpg\"]', 'Sâu 82 cm, Ngang 220 cm, Cao 40/82 cm', 'Polyester', 'Polyester', 'Màu xanh', 'Blue', '2018-01-18', 'VNĐ', 1, 0),
(9, 7, 8, 'Sofa có ghế nằm NARBONNE', 'Sofa with chair NARBONNE', 'Sofa góc NARBONNE có phong cách thiết kế hiện đại, màu cam sáng cùng chất liệu cao cấp mang đến cho bạn một không gian tiếp khách sang trọng và lịch sự.', 'NARBO', '<p>Sofa g&oacute;c NARBONNE c&oacute; phong c&aacute;ch thiết kế hiện đại, m&agrave;u cam s&aacute;ng c&ugrave;ng chất liệu cao cấp mang đến cho bạn một kh&ocirc;ng gian tiếp kh&aacute;ch sang trọng v&agrave; lịch sự.</p>\r\n', '<p>NARBONNE corner sofa with modern design, bright orange color and high quality materials bring you a luxurious and polite reception space.</p>\r\n', 20400000, 20000000, '[\"1516266651-SOFA-GOC-NARBONNE-01.jpg\",\"1516266651-SOFA-GOC-NARBONNE-02.jpg\",\"1516266651-SOFA-GOC-NARBONNE-03.jpg\",\"1516266651-SOFA-GOC-NARBONNE-04.jpg\",\"1516266651-SOFA-GOC-NARBONNE-05.jpg\",\"1516266651-SOFA-GOC-NARBONNE-06.jpg\"]', 'Sâu 110/151 cm, Ngang 303 cm, Cao 93 cm', 'Polyester Cross Stitch', 'Polyester Cross Stitch', 'Màu cam', 'Orange', '2018-01-19', 'VNĐ', 1, 0),
(10, 48, 9, 'Bàn ăn ANKOR', 'Dining tables ANKOR', 'Update soon', 'Updat', '<p>Update soon</p>\r\n', '<p>Update soon</p>\r\n', 1890000, 0, '[\"1516267290-BAN-AN-ANKOR-01.jpg\",\"1516267290-BAN-AN-ANKOR-02.jpg\",\"1516267290-BAN-AN-ANKOR-03.jpg\"]', 'Sâu 75 cm, Ngang 115 cm, Cao 75 cm', 'Printed MDF', 'Printed MDF', 'Oak', 'Oak', '2018-01-18', 'VNĐ', 1, 0),
(11, 49, 10, 'Ghế ăn ANKOR', 'Eating chairs ANKOR', 'Một sản phẩm mang phong cách cá tính, ghế ăn ANKOR từ UMA với thân ghế gỗ sồi cao cấp, đệm ngồi và tựa lưng bọc nệm êm ái, đem lại cảm giác thoải mái tuyệt đối.', 'Một s', '<p>Một sản phẩm mang phong c&aacute;ch c&aacute; t&iacute;nh, ghế ăn ANKOR từ UMA với th&acirc;n ghế gỗ sồi cao cấp, đệm ngồi v&agrave; tựa lưng bọc nệm &ecirc;m &aacute;i, đem lại cảm gi&aacute;c thoải m&aacute;i tuyệt đối.</p>\r\n', '<p>Một sản phẩm mang phong c&aacute;ch c&aacute; t&iacute;nh, ghế ăn ANKOR từ UMA với th&acirc;n ghế gỗ sồi cao cấp, đệm ngồi v&agrave; tựa lưng bọc nệm &ecirc;m &aacute;i, đem lại cảm gi&aacute;c thoải m&aacute;i tuyệt đối.</p>\r\n', 999000, 0, '[\"1516267718-GHE-AN-ANKOR-01.jpg\",\"1516267718-GHE-AN-ANKOR-02.jpg\",\"1516267718-GHE-AN-ANKOR-03.jpg\",\"1516267718-GHE-AN-ANKOR-04.jpg\"]', 'Sâu 52 cm, Ngang 43 cm, Cao 45/ 82 cm', 'Printed MDF/ PVC', 'Printed MDF/ PVC', 'Oak/ White', 'Oak/ White', '2018-01-18', 'VNĐ', 1, 0),
(12, 52, 11, 'Tủ bát đĩa NOVAK', 'Sideboards NOVAK', '2 cửa mở ra, 2 ngăn kéo ở giữa', '2 doo', '<p>2 cửa mở ra, 2 ngăn k&eacute;o ở giữa</p>\r\n', '<p>2 doors, 2 drawers in centre</p>\r\n', 7990000, 7090000, '[\"1516268292-tu-bat-dia-NOVAK-01.jpg\",\"1516268292-tu-bat-dia-NOVAK-02.jpg\",\"1516268292-tu-bat-dia-NOVAK-03.jpg\",\"1516268292-tu-bat-dia-NOVAK-04.jpg\",\"1516268292-tu-bat-dia-NOVAK-05.jpg\",\"1516268292-tu-bat-dia-NOVAK-06.jpg\",\"1516268292-tu-bat-dia-NOVAK-07.jpg\"]', 'Dài 46 cm, Ngang 162 cm, Cao 73 cm', 'Veneer sồi/Sồi/ MDF', 'Beech Veneer / Oak / MDF', 'Oak ', 'Oak ', '2018-01-18', 'VNĐ', 1, 0),
(13, 59, 12, 'Giường MOZART', 'MOZART beds', 'Thiết kế tinh tế trên gam màu trắng trang nhã kết hợp màu gỗ tự nhiên sẽ đem lại vẻ đẹp sang trọng cho không gian thư giãn của bạn.', 'Sophi', '<p>Thiết kế tinh tế tr&ecirc;n gam m&agrave;u trắng trang nh&atilde; kết hợp m&agrave;u gỗ tự nhi&ecirc;n sẽ đem lại vẻ đẹp sang trọng cho kh&ocirc;ng gian thư gi&atilde;n của bạn</p>\r\n', '<p>Sophisticated in elegant white color combined with natural wood color will bring luxury beauty to your relaxing space.</p>\r\n', 5490000, 5090000, '[\"1516268706-GIUONG-MOZART-01.jpg\",\"1516268706-GIUONG-MOZART-02.jpg\",\"1516268706-GIUONG-MOZART-03.jpg\",\"1516268706-GIUONG-MOZART-04.jpg\"]', 'Dài 200 cm, Ngang 160 cm, Cao 80 cm', 'MDF/Gỗ cao su', 'MDF / Rubber wood', 'Màu trắng', 'White', '2018-01-18', 'VNĐ', 1, 0),
(14, 59, 13, 'Giường ALBANY', 'Bed ALBANY', 'Giường ngủ ALBANY có thiết kế vững chãi và màu sắc ấm áp, đem đến vẻ đẹp sang trọng cho căn phòng. Chiều cao của đầu giường khá lý tưởng để đọc sách hay làm việc ngay trên giường. ', 'ALBAN', '<p>Giường ngủ ALBANY c&oacute; thiết kế vững ch&atilde;i v&agrave; m&agrave;u sắc ấm &aacute;p, đem đến vẻ đẹp sang trọng cho căn ph&ograve;ng. Chiều cao của đầu giường kh&aacute; l&yacute; tưởng để đọc s&aacute;ch hay l&agrave;m việc ngay tr&ecirc;n giường. Sản phẩm c&oacute; 2 k&iacute;ch cỡ cho bạn lựa chọn. H&atilde;y kết hợp sử dụng c&ugrave;ng c&aacute;c m&oacute;n nội thất kh&aacute;c trong bộ sưu tập ALBANY để ho&agrave;n thiện tổ ấm của m&igrave;nh.</p>\r\n', '<p>ALBANY beds have a solid design and warm colors, bringing the luxury of the room. The height of the headboard is ideal for reading or working right in bed. There are two sizes for you to choose from. Combining the same interior items in the ALBANY collection to perfect your home.</p>\r\n', 6990000, 0, '[\"1516269453-GIUONG-ALBANY-01.jpg\",\"1516269453-GIUONG-ALBANY-02.jpg\",\"1516269453-GIUONG-ALBANY-03.jpg\"]', 'Dài 200 cm, Ngang 160 cm, Cao 90 cm', 'Veneer sồi/MDF', 'Veneer Oak / MDF', 'Màu nâu', 'Brown', '2018-01-18', 'VNĐ', 1, 0),
(15, 59, 14, 'Giường ALI', 'Bed ALI', 'Chất liệu gỗ thông tự nhiên cho độ bền cao và vẻ ngoài đẹp mắt, chắc chắn. Có 3 kích thước giường cho bạn chọn lựa. Hãy kết hợp với các món nội thất khác trong cùng bộ sưu tập ALI từ UMA.', 'Natur', '<p>Chất liệu gỗ th&ocirc;ng tự nhi&ecirc;n cho độ bền cao v&agrave; vẻ ngo&agrave;i đẹp mắt, chắc chắn. C&oacute; 3 k&iacute;ch thước giường cho bạn chọn lựa. H&atilde;y kết hợp với c&aacute;c m&oacute;n nội thất kh&aacute;c trong c&ugrave;ng bộ sưu tập ALI từ UMA.</p>\r\n', '<p>Natural pine wood for durability and good looks, sure. There are 3 sizes for your choice. Combine with other furniture in the same ALI collection from UMA.</p>\r\n', 3490000, 0, '[\"1516269751-GIUONG-ALI-01.jpg\",\"1516269751-GIUONG-ALI-02.jpg\",\"1516269751-GIUONG-ALI-03.jpg\",\"1516269751-GIUONG-ALI-04.jpg\"]', 'Dài 200 cm, Ngang 120 cm', 'Gỗ thông', 'Pine', 'Không', 'No', '2018-01-18', 'VNĐ', 1, 0),
(16, 76, 15, 'Bàn làm việc ATTILA', 'Desk ATTILA', '2 drawers', '2 dra', '<p>2 drawers</p>\r\n', '<p>2 drawers</p>\r\n', 5490000, 0, '[\"1516270290-Ban-lam-viec-ATTILA-01.jpg\",\"1516270290-Ban-lam-viec-ATTILA-02.jpg\",\"1516270290-Ban-lam-viec-ATTILA-03.jpg\",\"1516270290-Ban-lam-viec-ATTILA-04.jpg\"]', 'Dài 120 cm, Ngang 55 cm, Cao 75 cm', 'Oak Veneer/Oak/MDF/ Partical Board', 'Oak Veneer/Oak/MDF/ Partical Board', 'Oak', 'Oak', '2018-01-18', 'VNĐ', 1, 0),
(17, 77, 16, 'Ghế văn phòng JONES', 'Office chair JONES', 'Ghế văn phòng JONES từ UMA, một thiết kế êm ái từ nệm bọc vải lanh màu xám trang nhã, đem đến cho góc làm việc và học tập của bạn vẻ đẹp sang trọng và hiện đại.', 'Offic', '<p>Ghế văn ph&ograve;ng JONES từ UMA, một thiết kế &ecirc;m &aacute;i từ nệm bọc vải lanh m&agrave;u x&aacute;m trang nh&atilde;, đem đến cho g&oacute;c l&agrave;m việc v&agrave; học tập của bạn vẻ đẹp sang trọng v&agrave; hiện đại.</p>\r\n', '<p>Office chair JONES from UMA, a smooth design from elegant mattress linen gray, bring to your study and corner beauty of luxury and modern.</p>\r\n', 2790000, 0, '[\"1516270566-Ghe-van-phong-Jones-01.jpg\",\"1516270566-Ghe-van-phong-Jones-02.jpg\",\"1516270566-Ghe-van-phong-Jones-03.jpg\",\"1516270566-Ghe-van-phong-Jones-04.jpg\",\"1516270566-Ghe-van-phong-Jones-05.jpg\",\"1516270566-Ghe-van-phong-Jones-06.jpg\"]', 'Sâu 61 cm, Ngang 62 cm, Cao 97/107 cm', 'Vải lanh', 'Linen', 'Màu nâu', 'Brown', '2018-01-19', 'VNĐ', 0, 0),
(18, 78, 17, 'Kệ sách AVATAR', 'Bookshelf AVATAR', '16 ngăn', '16 co', '<p>16 ngăn</p>\r\n', '<p>16 compartments</p>\r\n', 4490000, 0, '[\"1516270799-Ke-sach-AVATAR-01.jpg\",\"1516270799-Ke-sach-AVATAR-02.jpg\",\"1516270799-Ke-sach-AVATAR-03.jpg\",\"1516270799-Ke-sach-AVATAR-04.jpg\"]', 'Sâu 29 cm, Ngang 146 cm, Cao 146 cm', 'Honey Comb Board/ Particle Board/ PVC', 'Honey Comb Board/ Particle Board/ PVC', 'Màu trắng', 'White', '2018-01-18', 'VNĐ', 1, 0),
(19, 88, 18, 'Tủ bếp ROXIE', 'Kitchen Cabinets ROXIE', 'Khung bằng kim loại màu xám đậm, với 1 ngăn kéo và 1 kệ, với 1 tay cầm', 'Metal', '<p>Khung bằng kim loại m&agrave;u x&aacute;m đậm<br />\r\nVới 1 ngăn k&eacute;o v&agrave; 1 kệ<br />\r\nVới 1 tay cầm</p>\r\n', '<p>Metal frame in Dark Grey powder coated<br />\r\nWith 1 drawer and 1 shelf<br />\r\nWith 1 handle</p>\r\n', 4450000, 0, '[\"1516271159-Tu-bep-ROXIE-01.jpg\",\"1516271159-Tu-bep-ROXIE-02.jpg\",\"1516271159-Tu-bep-ROXIE-03.jpg\",\"1516271159-Tu-bep-ROXIE-04.jpg\",\"1516271159-Tu-bep-ROXIE-05.jpg\",\"1516271159-Tu-bep-ROXIE-06.jpg\",\"1516271159-Tu-bep-ROXIE-07.jpg\"]', 'Sâu 60 cm, Ngang 100 cm, Cao 87 cm', 'Melamine Faced Chipboard/ Metal', 'Melamine Faced Chipboard/ Metal', 'Màu nâu', 'Brown', '2018-01-19', 'VNĐ', 1, 0),
(20, 92, 19, 'Bếp từ Philips HD4932', 'Cooker Philips HD4932', 'BẾP TỪ ĐƠN MẶT BẾP KÍNH CHỊU NHIỆTCÔNG SUẤT 2100 W', 'ELECT', '<p><strong>BẾP TỪ ĐƠN MẶT BẾP K&Iacute;NH CHỊU NHIỆTC&Ocirc;NG SUẤT 2100 W</strong></p>\r\n\r\n<p>- Mặt&nbsp;bếp điện&nbsp;bằng k&iacute;nh chịu nhiệt s&aacute;ng b&oacute;ng, dễ vệ sinh.<br />\r\n- Khả năng đun s&ocirc;i nhanh với c&ocirc;ng suất lớn 2100 W.<br />\r\n- Bảng điều khiển cảm ứng hiện đại,&nbsp;dễ d&agrave;ng hơn trong việc thao t&aacute;c.<br />\r\n- An to&agrave;n cho trẻ em với chức năng kh&oacute;a th&ocirc;ng minh.</p>\r\n', '<p><strong>ELECTRIC KITCHEN COOKING TYPE 2100 W</strong></p>\r\n\r\n<p>- Electric glass surface is heat-resistant glass, easy to clean.<br />\r\n- High capacity boiling capacity of 2100 W.<br />\r\n- The touch panel is modern, easier to manipulate.<br />\r\n- Safe for children with intelligent lock function.</p>\r\n', 1900000, 0, '[\"1516287465-Bep-tu-Philips-HD4932-01.jpg\",\"1516287465-Bep-tu-Philips-HD4932-02.jpg\",\"1516287465-Bep-tu-Philips-HD4932-03.jpg\",\"1516287465-Bep-tu-Philips-HD4932-04.jpg\",\"1516287465-Bep-tu-Philips-HD4932-05.jpg\"]', '39x28x6 cm', 'Kính chịu nhiệt', 'Heat resistant glass', 'Màu đen', 'Black', '2018-01-19', 'VNĐ', 0, 0),
(21, 99, 20, 'Thớt HAKATA', 'Chopping board HAKATA', 'Thớt HAKATA có chất liệu nhựa an toàn cho sức khỏe, màu trắng trang nhã. Thớt có kích cỡ 33 x 21cm, là dụng cụ không thể thiếu trong phòng bếp của gia đình bạn.', 'HAKAT', '<p>Thớt HAKATA c&oacute; chất liệu nhựa an to&agrave;n cho sức khỏe, m&agrave;u trắng trang nh&atilde;. Thớt c&oacute; k&iacute;ch cỡ 33 x 21cm, l&agrave; dụng cụ kh&ocirc;ng thể thiếu trong ph&ograve;ng bếp của gia đ&igrave;nh bạn.</p>\r\n', '<p>HAKATA cutting board with safety plastic for health, white and elegant. The board size is 33 x 21cm, is indispensable tool in your family kitchen.</p>\r\n', 49000, 0, '[\"1516293012-Thot-HAKATA.jpg\"]', 'Dài 33 cm, Ngang 21 cm', 'Nhựa Polypropylene', 'Polypropylene', 'Màu trắng', 'White', '2018-01-19', 'VNĐ', 0, 0),
(22, 123, 21, 'Chậu cây giả MOSQUITO', 'Potted plants MOSQUITO', 'Design as photo', 'Desig', '<p>Design as photo</p>\r\n', '<p>Design as photo</p>\r\n', 99000, 0, '[\"1516293330-chau-cay-gia-MOSQUITO.jpg\"]', 'LxWxH', 'Nhựa', 'Plastic', 'Trắng xanh', 'White & Green', '2018-01-19', 'VNĐ', 0, 0),
(23, 141, 22, 'Đồng hồ treo tường DORA', 'Clockwatcher DORA', 'Plastic frame, glass face', 'Plast', '<p>Plastic frame, glass face</p>\r\n', '<p>Plastic frame, glass face</p>\r\n', 129000, 0, '[\"1516293498-Dong-ho-DORA.jpg\"]', 'Đường kính 30 cm', 'Nhựa', 'Plastic', 'Màu đỏ', 'Red', '2018-01-19', 'VNĐ', 0, 0),
(24, 122, 23, 'Đồ trang trí Giáng sinh KRISTOS', 'Christmas decorations KRISTOS', 'Heart', 'Heart', '<p>Heart</p>\r\n', '<p>Heart</p>\r\n', 19000, 0, '[\"1516293976-Do-trang-tri-giang-sinh.jpg\"]', 'Ngang 10 cm, Cao 10 cm', 'Nỉ', 'Felt', 'Màu đỏ/Trắng', 'Red / White', '2018-01-18', 'VNĐ', 1, 0),
(25, 117, 24, 'Bàn gấp thông minh - T9000', 'Intelligent folding table - T9000', 'Bàn gấp thông minh Sản phẩm được làm từ Nhôm siêu bền, nhẹ và chắc chắn chịu được khí hậu thời tiết khắc nghiệt dù bạn đang ở đâu, ngoài trời hay trong nhà sản phẩm đều dễ dàng di chuyển và lắp ráp.', 'Intel', '<p>B&agrave;n gấp th&ocirc;ng minh Sản phẩm được l&agrave;m từ Nh&ocirc;m si&ecirc;u bền, nhẹ v&agrave; chắc chắn chịu được kh&iacute; hậu thời tiết khắc nghiệt d&ugrave; bạn đang ở đ&acirc;u, ngo&agrave;i trời hay trong nh&agrave; sản phẩm đều dễ d&agrave;ng di chuyển v&agrave; lắp r&aacute;p. Với chức năng gấp gọn v&agrave;o tr&uacute;i khiến bạn dễ d&agrave;ng di chuyển v&agrave; cất đi, dễ vệ sinh.</p>\r\n', '<p>Intelligent folding table Made from durable aluminum, lightweight and durable weather resistant tough whether you are anywhere, outdoors or in the house are easy to move and assemble. With the folding function on the trunk makes it easy to move and take away, easy to clean.</p>\r\n', 295000, 0, '[\"1516294646-ban-gap-thong-minh-1.jpg\",\"1516294646-ban-gap-thong-minh-2.jpg\",\"1516294646-ban-gap-thong-minh-3.jpg\"]', '40x35x32 cm', 'Nhôm siêu bền', 'Aluminum super durable', 'Trắng/bạc', 'White / Silver', '2018-01-19', 'VNĐ', 0, 0),
(26, 7, 25, 'Sofa NORMANDY', 'Sofa NORMANDY', 'Cover: Linen', 'Cover', '<p><strong>HƯỚNG DẪN BẢO QUẢN</strong></p>\r\n\r\n<ul>\r\n	<li>Kh&ocirc;ng đứng hay nhảy tr&ecirc;n sofa, điều n&agrave;y g&acirc;y t&aacute;c động xấu đến bộ khung cũng như hệ thống đệm, l&ograve; xo v&agrave; l&agrave;m giảm tuổi thọ của sofa.</li>\r\n	<li>Để l&agrave;m sạch sofa, c&aacute;ch tốt nhất l&agrave; nhờ đến sự hỗ trợ của đội vệ sinh sofa chuy&ecirc;n nghiệp.</li>\r\n	<li>Hoặc bạn c&oacute; thể tự l&agrave;m dựa tr&ecirc;n một v&agrave;i mẹo nhỏ dưới đ&acirc;y:</li>\r\n	<li>Lột bỏ c&aacute;c tấ</li>\r\n	<li>Kh&ocirc;ng đứng hay nhảy tr&ecirc;n sofa, điều n&agrave;y g&acirc;y t&aacute;c động xấu đến bộ khung cũng như hệ thống đệm, l&ograve; xo v&agrave; l&agrave;m giảm tuổi thọ của sofa.</li>\r\n	<li>Để l&agrave;m sạch sofa, c&aacute;ch tốt nhất l&agrave; nhờ đến sự hỗ trợ của đội vệ sinh sofa chuy&ecirc;n nghiệp.</li>\r\n	<li>Hoặc bạn c&oacute; thể tự l&agrave;m dựa tr&ecirc;n một v&agrave;i mẹo nhỏ dưới đ&acirc;y:</li>\r\n	<li>Lột bỏ c&aacute;c tấ</li>\r\n</ul>\r\n', '<p><strong>STORAGE INSTRUCTIONS</strong></p>\r\n\r\n<ul>\r\n	<li>Do not stand or jump on the sofa, which can adversely affect the frame as well as the cushions, springs and reduce the life of the sofa.</li>\r\n	<li>To clean the sofa, the best way is to use the support of professional sofa cleaning.</li>\r\n	<li>Or you can do it yourself based on a few tips below:</li>\r\n	<li>Remove the pads for laundry with soap. The rest you can clean by vacuum cleaner.</li>\r\n	<li>Use a damp cloth to rub the dirt. Or can dilute soap with warm water, use a soft cloth and gently rub onto the surface to be dirty.</li>\r\n	<li>Make sure that the method is suitable for your sofa. Should try in a hidden position of the sofa whether that method harms the sofa or not.</li>\r\n	<li>After the toilet should dry naturally. Do not use the dryer, especially with leather sofa / PU / PVC.</li>\r\n</ul>\r\n', 4290000, 0, '[\"1516326720-sofa-normandy-01.jpg\",\"1516326720-sofa-normandy-02.jpg\",\"1516326720-sofa-normandy-03.jpg\",\"1516326720-sofa-normandy-04.jpg\",\"1516326720-sofa-normandy-05.jpg\"]', 'Sâu 77 cm, Ngang 125 cm, Cao 74.5 cm', 'Plywood/ Linen', 'Plywood/ Linen', 'Màu xám', 'Grey', '2018-02-03', 'VNĐ', 1, 0),
(27, 7, 26, 'Sofa FUNKY', 'Sofa FUNKY', 'Material:\r\nFrame: Wood, mdf\r\nLegs: Metal, powder coated\r\nCover: Microfiber', 'Mater', '<p>Material:<br />\r\nFrame: Wood, mdf<br />\r\nLegs: Metal, powder coated<br />\r\nCover: Microfiber</p>\r\n', '<p>Material:<br />\r\nFrame: Wood, mdf<br />\r\nLegs: Metal, powder coated<br />\r\nCover: Microfiber</p>\r\n', 8490000, 0, '[\"1516327323-sofa-funky.jpg\",\"1516327323-sofa-funky-01.jpg\",\"1516327323-sofa-funky-02.jpg\",\"1516327323-sofa-funky-03.jpg\",\"1516327323-sofa-funky-04.jpg\"]', 'Sâu 76 cm, Ngang 180 cm, Cao 68 cm', 'Foam/ MDF/ Metal', 'Foam/ MDF/ Metal', 'Màu xám/Trắng', 'Grey/white', '2018-01-19', 'VNĐ', 1, 0),
(28, 7, 27, 'Sofa MONACO', 'Sofa MONACO', 'Sofa 3 chỗ MONACO có màu cam sang trọng, phầm đệm được may phủ bởi chất liệu vải cao cấp, bền chắc và đẹp mắt.', 'MONAC', '<p>Sofa 3 chỗ MONACO c&oacute; m&agrave;u cam sang trọng, phầm đệm được may phủ bởi chất liệu vải cao cấp, bền chắc v&agrave; đẹp mắt.</p>\r\n', '<p>MONACO three-seat sofa is luxuriously orange, mattress padding is covered by high quality fabric, durable and beautiful.</p>\r\n', 13990000, 10990000, '[\"1516327724-sofa-MONACO-01.jpg\",\"1516327724-sofa-MONACO-02.jpg\",\"1516327724-sofa-MONACO-03.jpg\",\"1516327724-sofa-MONACO-04.jpg\"]', 'Sâu 100 cm, Ngang 244 cm, Cao 81 cm', 'Polyester Cross Stitch', 'Polyester Cross Stitch', 'Màu cam', 'Orange', '2018-01-22', 'VNĐ', 1, 0),
(29, 48, 28, 'Bàn ăn BARCELONA', 'Dinner table BARCELONA', 'Mặt bàn vuông cho phép ngồi 4 người xung quanh nó. Bàn này có chân bằng kim loại.', 'The s', '<p>Mặt b&agrave;n vu&ocirc;ng cho ph&eacute;p ngồi 4 người xung quanh n&oacute;.<br />\r\nB&agrave;n n&agrave;y c&oacute; ch&acirc;n bằng kim loại.</p>\r\n', '<p>The square table top enable to seat 4 people around it.<br />\r\nThis table has metal legs.</p>\r\n', 1490000, 1490000, '[\"1516328111-ban-an-BARCELONA.jpg\",\"1516328111-ban-an-BARCELONA-01.jpg\",\"1516328111-ban-an-BARCELONA-02.jpg\"]', 'Dài 75 cm, Ngang 75 cm, Cao 69 cm', 'Veneer sồi/Sồi/ MDF', 'Beech Veneer / Oak / MDF', 'Màu hạt dẻ', 'Chestnut', '2018-01-19', 'VNĐ', 1, 0),
(30, 48, 29, 'Bàn ăn IT', 'Dinner table IT', 'Phần trên cùng của bàn này được làm bằng chất melamine chất lượng cao. Chân nó bằng thép tráng bột.', 'The t', '<p>Phần tr&ecirc;n c&ugrave;ng của b&agrave;n n&agrave;y được l&agrave;m bằng chất melamine chất lượng cao. Ch&acirc;n n&oacute; bằng th&eacute;p tr&aacute;ng bột.</p>\r\n', '<p>The top of this table is made of high quality melamine. Its legs are in powder coated steel.</p>\r\n', 2790000, 2790000, '[\"1516328385-ban-an-IT.jpg\",\"1516328385-ban-an-IT-01.jpg\",\"1516328385-ban-an-IT-02.jpg\"]', 'Dài 120 cm, Ngang 80 cm, Cao 75 cm', 'Melamine Faced Chipboard/ Metal', 'Melamine Faced Chipboard/ Metal', 'Màu đen/Trắng', 'Black/White', '2018-01-19', 'VNĐ', 1, 0),
(31, 76, 30, 'Bàn làm việc SUECIA', 'Desk working SUECIA', 'Một tác phẩm nội thất từ gỗ MDF và lớp sơn melamine nâu quyến rũ. Nhỏ gọn, thiết kế thông minh với ngăn kéo lưu trữ.', 'A pie', '<p>Một t&aacute;c phẩm nội thất từ gỗ MDF v&agrave; lớp sơn melamine n&acirc;u quyến rũ. Nhỏ gọn, thiết kế th&ocirc;ng minh với ngăn k&eacute;o lưu trữ.</p>\r\n', '<p>A piece of furniture from MDF and melamine brown paint. Compact, smart design with storage drawer.</p>\r\n', 2990000, 2990000, '[\"1516328697-ban-lam-viec-suecia-01.jpg\",\"1516328697-ban-lam-viec-suecia-02.jpg\",\"1516328697-ban-lam-viec-suecia-03.jpg\",\"1516328697-ban-lam-viec-suecia-04.jpg\"]', 'Dài 120 cm, Sâu 60 cm, Cao 75 cm', 'Melamine faced chipboard(MFC)', 'Melamine faced chipboard(MFC)', 'Màu hạt dẻ/Trắng', 'Chestnut/White', '2018-01-19', 'VNĐ', 0, 0),
(32, 76, 31, 'Bàn làm việc ALBANY', 'Work table ALBANY', 'Bàn làm việc kiểu dáng cứng cáp từ gỗ phủ veneer sồi, kết hợp giữa cổ điển và trẻ trung cá tính. Lưu trữ được vật dụng và giấy tờ quan trọng trong ngăn kéo nhỏ dưới bàn.', 'Styli', '<p>B&agrave;n l&agrave;m việc kiểu d&aacute;ng cứng c&aacute;p từ gỗ phủ veneer sồi, kết hợp giữa cổ điển v&agrave; trẻ trung c&aacute; t&iacute;nh. Lưu trữ được vật dụng v&agrave; giấy tờ quan trọng trong ngăn k&eacute;o nhỏ dưới b&agrave;n.</p>\r\n', '<p>Stylish hardwood workbench from oak veneer covered wood, combining classic and youthful personality. Store important items and papers in a small drawer under the table.</p>\r\n', 3900000, 3900000, '[\"1516328954-ban-lam-viec-ALBANY-01.jpg\",\"1516328954-ban-lam-viec-ALBANY-02.jpg\",\"1516328954-ban-lam-viec-ALBANY-03.jpg\"]', 'Dài 120 cm, Ngang 50 cm, Cao 75 cm', 'Veneer sồi/Sồi/ MDF', 'Beech Veneer / Oak / MDF', 'Màu nâu', 'Brown', '2018-01-19', 'VNĐ', 0, 0),
(33, 123, 32, 'Hoa giả SISTER SUN', 'Artificial flowers SISTER SUN', 'Hoa cẩm chướng giả SISTER SUN màu đỏ. Hoa có kiểu dáng mềm mại, sống động như thật. Phù hợp để trang trí phòng khách hoặc phòng ăn.', 'SISTE', '<p>Hoa cẩm chướng giả SISTER SUN m&agrave;u đỏ. Hoa c&oacute; kiểu d&aacute;ng mềm mại, sống động như thật. Ph&ugrave; hợp để trang tr&iacute; ph&ograve;ng kh&aacute;ch hoặc ph&ograve;ng ăn.</p>\r\n', '<p>SISTER SUN red carnations. Flowers are soft, real life. Suitable for decorating the living room or dining room.</p>\r\n', 69000, 69000, '[\"1516332005-hoa-gia-sister-sun-01.jpg\",\"1516332005-hoa-gia-sister-sun-02.jpg\"]', 'Cao 44 cm', 'Nhựa', 'Plastic', 'Màu đỏ', 'Red', '2018-01-19', 'VNĐ', 0, 0),
(34, 123, 33, 'Hoa giả trong chậu PAPILLION', 'Fake flowers in pots PAPILLION', 'Hoa hồng', 'Rose', '<p>Hoa hồng</p>\r\n', '<p>Rose</p>\r\n', 179000, 179000, '[\"1516332257-chau-cay-gia.jpg\"]', 'Cao 36 cm', 'Nhựa', 'Plastic', 'Màu vàng', 'Yellow', '2018-01-19', 'VNĐ', 0, 0),
(35, 117, 34, 'Bàn ngoài trời RISTORANTE', 'Outdoor table RISTORANTE', 'Hãy biến ban công lộng gió và góc sân nhỏ của nhà mình thành nơi thư giãn thật lý tưởng với Bàn Ngoài Trời RISTORANTE', 'Make ', '<p>H&atilde;y biến ban c&ocirc;ng lộng gi&oacute; v&agrave; g&oacute;c s&acirc;n nhỏ của nh&agrave; m&igrave;nh th&agrave;nh nơi thư gi&atilde;n thật l&yacute; tưởng với&nbsp;<strong>B&agrave;n Ngo&agrave;i Trời RISTORANTE</strong></p>\r\n\r\n<ul>\r\n	<li>K&iacute;ch thước b&agrave;n th&iacute;ch hợp cho tối đa 4-6 người ngồi xung quanh.</li>\r\n	<li>Khi kh&ocirc;ng cần sử dụng, bạn c&oacute; thể gấp gọn chiếc b&agrave;n n&agrave;y lại để tiết kiệm diện t&iacute;ch.</li>\r\n	<li>Sản phẩm được l&agrave;m t', '<p>Make the windswept balcony and the courtyard of your home into an ideal place to relax with the <strong>outdoor table RISTORANTE</strong></p>\r\n\r\n<ul>\r\n	<li>Table size is suitable for up to 4-6 people sitting around.</li>\r\n	<li>When you do not need it, you can fold this table to save space.</li>\r\n	<li>The product is made of powder coated steel with elegant color, high durability and beautiful appearance.</li>\r\n	<li>Combine this beautiful coffee table with RISTORANTE Outdoor Chair, warmer set, outdoor wood flooring, ... to perfect your lovely relaxing corner.</li>\r\n</ul>\r\n', 899000, 899000, '[\"1516332623-ban-ngoai-troi-ristorante-01.jpg\",\"1516332623-ban-ngoai-troi-ristorante-02.jpg\",\"1516332623-ban-ngoai-troi-ristorante-03.jpg\",\"1516332623-ban-ngoai-troi-ristorante-04.jpg\",\"1516332623-ban-ngoai-troi-ristorante-05.jpg\"]', 'Sâu 70 cm, Ngang 70 cm, Cao 72 cm', 'Powder Coated Steel', 'Powder Coated Steel', 'Màu trắng', 'White', '2018-01-19', 'VNĐ', 1, 0),
(36, 117, 35, 'Bàn ngoài trời CAFE ROYALE', 'Outdoor table CAFE ROYALE', 'Bàn ngoài trời CAFE ROYALE từ siêu thị nội thất UMA, màu trắng, thiết kế nhỏ gọn, trang nhã và hiện đại giúp tô điểm cho khu vườn của bạn.', 'Outdo', '<p>B&agrave;n ngo&agrave;i trời CAFE ROYALE từ si&ecirc;u thị nội thất UMA, m&agrave;u trắng, thiết kế nhỏ gọn, trang nh&atilde; v&agrave; hiện đại gi&uacute;p t&ocirc; điểm cho khu vườn của bạn.<br />\r\nChất liệu: th&eacute;p sơn tĩnh điện.</p>\r\n', '<p>Outdoor deck CAFE ROYALE from UMA furniture supermarket, white, compact design, elegant and modern to help decorate your garden.<br />\r\nMaterial: powder coated steel.</p>\r\n', 1390000, 1390000, '[\"1516332863-ban-ngoai-troi-cafe-royale-01.jpg\",\"1516332863-ban-ngoai-troi-cafe-royale-02.jpg\",\"1516332863-ban-ngoai-troi-cafe-royale-03.jpg\",\"1516332863-ban-ngoai-troi-cafe-royale-04.jpg\"]', 'Cao 73 cm, Đường kính 70 cm', 'Powder Coated Steel', 'Powder Coated Steel', 'Màu trắng', 'White', '2018-01-19', 'VNĐ', 1, 0),
(37, 88, 36, 'Tủ bếp Inox cánh gỗ tự nhiên GTN', 'Stainless steel natural wood kitchen cabinet GTN', 'Tủ bếp gỗ tự nhiên, xuất xứ tại Việt Nam', 'Natural wood kitchen cabinet, origin in Vietnam', '<p>Tủ bếp gỗ tự nhi&ecirc;n, xuất xứ tại Việt Nam</p>\r\n', '<p>Natural wood kitchen cabinet, origin in Vietnam</p>\r\n', 2500000, 2500000, '[\"1516374990-tu-bep.jpg\",\"1516374990-tu-bep-01.jpg\"]', '800x600 mm', 'Gỗ tự nhiên, gỗ công nghiệp, inox', 'Natural wood, industrial wood, stainless steel', 'Vàng/ trắng', 'Yellow/ white', '2018-01-19', 'VNĐ', 1, 1),
(38, 88, 37, 'Tủ bếp Nhật Bản CEC-8575CW', 'Japanese Kitchen CEC-8575CW', 'Hàng Nhật Bản sản xuất tại Việt Nam. Sản phẩm đạt chất lượng an toàn sức khoẻ theo tiêu chuẩn Nhật Bản', 'Japanese goods made in Vietnam. Our products are of high quality and safety according to Japanese standard', '<p>- H&agrave;ng Nhật Bản sản xuất tại Việt Nam<br />\r\n- Sản phẩm đạt chất lượng an to&agrave;n sức khoẻ theo ti&ecirc;u chuẩn Nhật Bản</p>\r\n', '<p>- Japanese goods made in Vietnam<br />\r\n- Our products are of high quality and safety according to Japanese standard</p>\r\n', 3595000, 3235500, '[\"1516375493-tu-bep.jpg\"]', 'Dài 73.9 cm x Rộng 41.5 cm x Cao 84.1 cm', 'Gỗ công nghiệp nhập khẩu MDF', 'Industrial wood imported MDF', 'Màu trắng', 'White', '2018-01-19', 'VNĐ', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1: admin',
  `token` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `fullname`, `birthdate`, `gender`, `address`, `phone`, `role`, `token`, `created_at`) VALUES
(2, 'admin123@gmail.com', 'e2ba7df167ed65ae17171d18a3d41e58', 'Admin', NULL, NULL, NULL, NULL, 1, 'cHoBTBpFLiF6bVIe0DS7VN6zHRPbdj', '2018-01-15 05:29:29'),
(8, 'huongnguyenak96@gmail.com', 'a4eda56899a1c3323e70ba45159f8013', 'Hương Hương', NULL, NULL, NULL, NULL, 1, 'qtmA383j3cg9dK9ZLzjD4dBT8N4SWD', '2018-03-01 07:04:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `1` (`id_customer`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `3` (`id_product`),
  ADD KEY `id_bill` (`id_bill`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_url`
--
ALTER TABLE `page_url`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type` (`id_type`),
  ADD KEY `id_url` (`id_url`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type` (`id_type`),
  ADD KEY `id_url` (`id_url`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `page_url`
--
ALTER TABLE `page_url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`);

--
-- Constraints for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `bill_detail_ibfk_1` FOREIGN KEY (`id_bill`) REFERENCES `bills` (`id`),
  ADD CONSTRAINT `bill_detail_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `menu` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`id_url`) REFERENCES `page_url` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
