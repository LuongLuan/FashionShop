-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2018 at 07:52 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `Id` int(11) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Role` int(11) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Phone` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='\r\n';

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Id`, `Username`, `Password`, `Name`, `Role`, `Address`, `Phone`) VALUES
(1, 'phamhuy', '12345', 'Huy Pham', 0, 'Nguyễn Công Trứ - Đà Lạt', '0353247036'),
(2, 'admin', 'admin', 'Huy Real', 1, 'Cây Cốc', '0921121313'),
(3, 'luongluan001', 'luongluan', 'Lương Luân', 0, 'Đà Lạt - Lâm Đồng', '0321123223'),
(5, 'hangpham58', 'hangpham', 'Thúy Hằng', 0, 'An Nhơn - Bình Định', '0966540904');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Id` int(11) NOT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `SupplyId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Id`, `Name`, `SupplyId`) VALUES
(1, 'Áo', 1),
(2, 'Quần', 1),
(3, 'Giày', 2);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `Id` int(11) NOT NULL,
  `ProductId` int(11) DEFAULT NULL,
  `Content` longtext,
  `CreateDate` datetime DEFAULT NULL,
  `Author` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`Id`, `ProductId`, `Content`, `CreateDate`, `Author`, `Email`, `Status`) VALUES
(1, 57, 'ádsad\r\nsa', '2018-09-24 23:23:45', 'Thư Nguyễn Thị Anh', 'thunta@gmail.com', 0),
(2, 64, 'đẹp quá', '2018-09-25 00:02:04', 'Thư Nguyễn Thị Anh', 'thunta@gmail.com', 1),
(3, 41, 'hi hi hi', '2018-09-25 23:17:01', 'Thư Nguyễn Thị Anh', 'thunta@gmail.com', 1),
(4, 15, 'Alo Alo', '2018-09-27 14:57:17', 'Phạm Cảnh', 'canhp@g.com', 0),
(5, 53, 'abc', '2018-10-01 11:57:15', 'Thư Nguyễn Thị Anh', 'thunta@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_09_01_115125_create_admins_table', 2),
(4, '2018_09_17_012218_create_admin_users_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Id` int(11) NOT NULL,
  `CustomerId` int(11) DEFAULT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Note` varchar(500) DEFAULT NULL,
  `Payment` varchar(50) DEFAULT NULL,
  `Createtime` datetime NOT NULL,
  `Status` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Cart_total` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Id`, `CustomerId`, `Name`, `Address`, `Phone`, `Note`, `Payment`, `Createtime`, `Status`, `Email`, `Cart_total`, `created_at`, `updated_at`) VALUES
(24, 6, 'Thư Nguyễn Thị Anh', 'Số 01 - Phù Đổng Thiên Vương - TP Đà Lạt', '0382207595', NULL, 'cod', '2018-09-18 16:31:40', 2, 'thunta@gmail.com', '2890000', '2018-09-24 09:31:40', '2018-09-27 05:55:53'),
(25, 12, 'Hằng Phạm', '17 - Thị Xã An Nhơn - Bình Định', '0966540904', 'Chào chú', 'cod', '2017-09-26 12:15:27', 0, 'hang@g.com', '832500', '2018-09-25 05:15:27', '2018-09-27 05:13:18'),
(27, 6, 'Thư Nguyễn Thị Anh', 'Số 01 - Phù Đổng Thiên Vương - TP Đà Lạt', '0382207595', NULL, 'cod', '2018-09-24 13:24:22', 1, 'thunta@gmail.com', '650000', '2018-09-27 06:24:22', '2018-09-27 06:27:44'),
(28, 11, 'Phạm Cảnh', 'Đà Nẵng', '222222222', NULL, 'bank', '2018-09-27 13:48:34', 0, 'canhp@g.com', '1400000', '2018-09-27 06:48:34', '2018-09-27 06:48:34'),
(29, 11, 'Phạm Cảnh', 'Đà Nẵng', '222222222', NULL, 'bank', '2018-09-27 13:53:59', 2, 'canhp@g.com', '2461500', '2018-09-27 06:53:59', '2018-09-30 14:19:53'),
(30, 6, 'Thư Nguyễn Thị Anh', 'Số 01 - Phù Đổng Thiên Vương - TP Đà Lạt', '0382207595', NULL, 'cod', '2018-09-30 10:39:07', 1, 'thunta@gmail.com', '450000', '2018-09-30 03:39:07', '2018-09-30 14:19:36'),
(31, NULL, 'Hùng', 'Bến Tre', '0123232323', NULL, 'cod', '2018-09-30 21:18:47', 2, 'hung@g.com', '548000', '2018-09-30 14:18:47', '2018-09-30 14:19:17'),
(32, 6, 'Thư Nguyễn Thị Anh', 'Số 01 - Phù Đổng Thiên Vương - TP Đà Lạt', '0382207595', NULL, 'bank', '2018-10-01 12:50:49', 0, 'thunta@gmail.com', '730000', '2018-10-01 05:50:49', '2018-10-01 05:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `Id` int(11) NOT NULL,
  `OrderId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`Id`, `OrderId`, `ProductId`, `Quantity`, `Price`, `Description`, `created_at`, `updated_at`) VALUES
(84, 24, 72, 4, 2890000, NULL, '2018-09-24 09:31:40', '2018-09-24 09:31:40'),
(85, 25, 38, 2, 630000, NULL, '2018-09-25 05:15:27', '2018-09-25 05:15:27'),
(86, 25, 65, 3, 202500, NULL, '2018-09-25 05:15:27', '2018-09-25 05:15:27'),
(89, 27, 40, 1, 650000, NULL, '2018-09-27 06:24:22', '2018-09-27 06:24:22'),
(90, 28, 9, 1, 350000, NULL, '2018-09-27 06:48:34', '2018-09-27 06:48:34'),
(91, 28, 59, 3, 1050000, NULL, '2018-09-27 06:48:34', '2018-09-27 06:48:34'),
(92, 29, 20, 3, 1950000, NULL, '2018-09-27 06:53:59', '2018-09-27 06:53:59'),
(93, 29, 21, 2, 511500, NULL, '2018-09-27 06:53:59', '2018-09-27 06:53:59'),
(94, 30, 65, 2, 135000, NULL, '2018-09-30 03:39:07', '2018-09-30 03:39:07'),
(95, 30, 13, 1, 315000, NULL, '2018-09-30 03:39:07', '2018-09-30 03:39:07'),
(96, 31, 42, 1, 350000, NULL, '2018-09-30 14:18:47', '2018-09-30 14:18:47'),
(97, 31, 80, 4, 198000, NULL, '2018-09-30 14:18:47', '2018-09-30 14:18:47'),
(98, 32, 3, 2, 380000, NULL, '2018-10-01 05:50:49', '2018-10-01 05:50:49'),
(99, 32, 56, 1, 350000, NULL, '2018-10-01 05:50:49', '2018-10-01 05:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('thunta@gmail.com', '$2y$10$Bar3Lt7N9vhYpXbX1zRTdOpd1Lms4VpWJDE5UPgKutCiXDW4vJeqe', '2018-09-08 23:25:45'),
('abc@huy.com', '$2y$10$zBCQ.scS1ti7Lg72Oy8Y7Ofr4JlkdKcFnZs0s8tRPkEuadlCRK6we', '2018-09-08 23:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Id` int(11) NOT NULL,
  `Name` varchar(550) DEFAULT NULL,
  `TypeId` int(11) DEFAULT NULL,
  `CategoryId` int(11),
  `SubCategoryId` int(11),
  `SupplyId` int(11),
  `Description` varchar(500) DEFAULT NULL,
  `Price` int(11) NOT NULL,
  `Size` varchar(20) NOT NULL,
  `TotalView` int(11) DEFAULT '0',
  `Percent_off` int(11) DEFAULT '0',
  `Image1` varchar(250) DEFAULT NULL,
  `Image2` varchar(250) DEFAULT NULL,
  `Image3` varchar(260) DEFAULT NULL,
  `Image4` varchar(260) DEFAULT NULL,
  `Available` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Id`, `Name`, `TypeId`, `CategoryId`, `SubCategoryId`, `SupplyId`, `Description`, `Price`, `Size`, `TotalView`, `Percent_off`, `Image1`, `Image2`, `Image3`, `Image4`, `Available`) VALUES
(1, 'Hàng Chính Hãng Nike Air Force', 1, 2, 2, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .Áo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '38, 39, 40, 41', 93, 0, '1-ao-khoac.jpg', '1-ao-khoac2.jpg', '', '', 1),
(2, 'Áo khoác thể thao ', 1, 1, 3, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 290000, 'M, L, XL', 174, 0, '2-ao-khoac-choang-lot-long-ak36212.jpg', '2-ao-khoac-choang-lot-long-ak362122.jpg', 'product32-ao-khoac-choang-lot-long-ak36212.jpg', '', 1),
(3, 'Áo khoác thể thao', 2, 1, 3, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .Áo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 190000, 'M, L, XL', 32, 0, '3-ao-khoac-kaki-lot-long-ak31112.jpg', 'vàng', '', '', 0),
(4, 'Áo khoác thể thao ', 2, 1, 3, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'M, L, XL', 40, 0, '4-ao-khoac-kaki-lot-long-ak31112.jpg', 'product24-ao-khoac-kaki-lot-long-ak31112.jpg', '', '', 1),
(5, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 90000, 'M, L, XL', 23, 25, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', 1),
(6, 'Hàng Chính Hãng Nike Air Force ', 2, 3, 8, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 250000, '38, 39, 40, 41', 82, 15, 'giay-adidas-busenitz-pro-nam-xam-do-01-400x400_0.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', 1),
(7, 'Áo khoác thể thao ', 2, 2, 1, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'M, L, XL', 24, 0, '7-ao-khoac-ak112.jpg', 'Áo khoác AK-723', '', '', 1),
(8, 'Áo khoác thể thao ', 2, 2, 1, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 90000, 'M, L, XL', 37, 0, '8-ao-khoac-ak7234.jpg', 'product28-ao-khoac-ak7234.jpg', '', '', 1),
(9, 'Áo khoác thể thao ', 2, 2, 1, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'M, L, XL', 27, 0, '9-ao-khoac-xk71.jpg', 'Áo khoác AK-723', '', 'product49-ao-khoac-xk71.jpg', 1),
(10, 'Áo khoác thể thao ', 2, 2, 1, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 90000, 'M, L, XL', 19, 0, '10-ao-khoac-ak223.jpg', '10-ao-khoac-ak2232.jpg', '', '', 1),
(13, 'Áo khoác thể thao ', 3, 2, 2, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 0, 10, '13-dsd.jpg', NULL, '', '', 1),
(14, 'Áo phông mới 2015', 3, 2, 2, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 90000, 'M, L, XL', 8, 10, 'product114-ao-phong-moi-2015.jpg', NULL, '', '', 1),
(15, 'Áo phông có cổ trái tim', 3, 2, 2, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'M, L, XL', 41, 15, 'product115-ao-phong-polo.jpg', 'product215-ao-phong-polo.jpg', '', '', 1),
(16, 'Áo phông có cổ trái tim', 1, 2, 2, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 90000, '', 1, 0, 'product116-ao-phong-14.jpg', 'product216-ao-phong-14.jpg', 'product316-ao-phong-14.jpg', '', 1),
(17, 'Áo phông có cổ trái tim', 1, 2, 2, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 0, 0, 'product117-ao-phong-15.jpg', NULL, '', '', 1),
(18, 'Sơ mi dài tay', 2, 2, 1, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 90000, 'M, L, XL', 20, 30, 'product118-so-mi-dai-tay.jpg', 'product218-so-mi-dai-tay.jpg', '', '', 1),
(19, 'Áo khoác mùa hè catton', 3, 2, 1, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'M, L, XL', 4, 5, 'product119-margin.jpg', 'product219-margin.jpg', '', '', 1),
(20, 'Áo khoác mùa hè catton', 1, 2, 1, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 650000, 'M, L, XL', 144, 0, 'product120-margin-09.jpg', 'product220-margin-09.jpg', '', '', 1),
(21, 'Áo khoác mùa hè catton', 1, 2, 1, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 275000, 'M, L, XL', 94, 7, 'product121-margin-09-em.jpg', 'product221-margin-09-em.jpg', '', '', 1),
(22, 'Áo khoác mùa hè catton', 1, 2, 1, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 650000, 'M, L, XL', 37, 5, 'product122-margin-0-0.jpg', 'product222-margin-0-0.jpg', 'product322-margin-0-0.jpg', '', 1),
(23, 'Áo khoác mùa hè catton', 1, 2, 1, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'L, XL', 2, 7, 'product123-so-mi-bo.jpg', 'product223-so-mi-bo.jpg', 'product323-so-mi-bo.jpg', 'product423-so-mi-bo.jpg', 1),
(24, 'Áo khoác mùa hè catton', 1, 2, 1, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 650000, 'L, Xl, M', 2, 5, 'product124-so-mi-12.jpg', 'product224-so-mi-12.jpg', '', '', 0),
(25, 'Áo khoác mùa hè catton', 1, 2, 1, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'M, L, XL', 11, 0, 'product125-x1.jpg', 'product225-x1.jpg', '', '', 0),
(26, 'Áo phông có cổ trái tim', 1, 2, 1, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 650000, 'L, Xl, M', 5, 7, 'product126-so-mi-bo-aaa.jpg', 'product226-so-mi-bo-aaa.jpg', '', '', 0),
(27, 'Áo phông có cổ trái tim', 1, 2, 1, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 650000, 'L, Xl, M', 2, 0, 'product127-aaa-1.jpg', 'product227-aaa-1.jpg', '', '', 1),
(28, 'Áo phông có cổ trái tim', 2, 2, 2, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 650000, 'L, Xl, M', 1, 0, 'product128-ao-phong.jpg', 'product228-ao-phong.jpg', '', '', 1),
(29, 'Áo phông có cổ trái tim', 2, 2, 2, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'L, Xl, M', 4, 0, 'product129-ao-phong-03.jpg', 'product229-ao-phong-03.jpg', '', '', 1),
(30, 'Áo phông có cổ trái tim', 2, 2, 2, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'L, XL', 1, 20, 'product130-ao-phong-09.jpg', NULL, '', '', 1),
(31, 'Áo phông có cổ trái tim', 2, 2, 2, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'L, Xl, M', 4, 0, 'product131-ao-phong-1.jpg', NULL, '', '', 1),
(32, 'Áo phông có cổ trái tim', 3, 2, 1, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'L, XL', 2, 19, 'product132-ao-phong-03.jpg', NULL, '', '', 1),
(33, 'Áo phông có cổ trái tim', 3, 2, 1, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'L, Xl, M', 4, 12, 'product133-12-ao-phong.jpg', NULL, '', '', 1),
(34, 'Áo phông có cổ trái tim', 3, 2, 2, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'M, L, XL', 11, 6, 'product134-ao-phong-12.jpg', 'product234-ao-phong-12.jpg', '', '', 1),
(38, 'Hàng Chính Hãng Nike Air Force ', 2, 3, 8, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '38, 39, 40, 41', 82, 10, 'giay-adidas-Busenitz-Vulc-RX-nam-navy-01-400x400_0.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', 1),
(39, 'Hàng Chính Hãng Nike Air Force ', 2, 3, 8, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '38, 39, 40, 41', 80, 0, 'giay-adidas-Busenitz-Vulc-RX-nam-trang-do-01-400x400_0.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', 1),
(40, 'Hàng Chính Hãng Nike Air Force', 2, 3, 8, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .Áo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 650000, '38, 39, 40, 41', 82, 0, 'giay-adidas-duramo08-nam-xanh-navy-01-400x400_0.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', 1),
(41, 'Hàng Chính Hãng Nike Air Force ', 2, 3, 8, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 245000, '38, 39, 40, 41', 86, 0, 'giay-adidas-gazelle-nam-xanh-coban-01 copy-400x400_0.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', 1),
(42, 'Hàng Chính Hãng Nike Air Force ', 2, 3, 8, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '38, 39, 40, 41', 84, 0, 'giay-adidas-Stan-Smith-01-400x400_0.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', 1),
(43, 'Hàng Chính Hãng Nike Air Force ', 2, 3, 8, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 245000, '38, 39, 40, 41', 80, 0, 'giay-adidas-Stan-Smith-nam-Trang-Navy-01-400x400_0.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', 1),
(44, 'Hàng Chính Hãng Nike Air Force ', 2, 3, 8, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 245000, '38, 39, 40, 41', 80, 0, 'giay-adidas-superstar-nam-den-trang-01-400x400_0.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', 1),
(45, 'Hàng Chính Hãng Nike Air Force ', 2, 3, 8, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 245000, '38, 39, 40, 41', 79, 0, 'giay-free-rn-2018-nam-xam-xanh-01-400x400_0.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', 1),
(46, 'Hàng Chính Hãng Nike Air Force ', 2, 3, 8, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 245000, '38, 39, 40, 41', 85, 0, 'giay-lacoste-bayliss-118-nam-xanh-navy-01-400x400_0.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', 1),
(47, 'Hàng Chính Hãng Nike Air Force ', 2, 3, 8, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '38, 39, 40, 41', 82, 0, 'giay-lacoste-carnaby-evo-lcr-nam-den-01-400x400_0.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', 1),
(48, 'Hàng Chính Hãng Nike Air Force ', 2, 3, 8, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 650000, '38, 39, 40, 41', 80, 0, 'giay-lacoste-L.12.12-Unlined-nam-den-01 copy-400x400_0.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', 1),
(49, 'Hàng Chính Hãng Nike Air Force ', 2, 3, 9, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 245000, '38, 39, 40, 41', 147, 0, 'giay-lacoste-novas-nam-den-01-400x400_0.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', 1),
(50, 'Hàng Chính Hãng Nike Air Force ', 2, 3, 9, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '38, 39, 40, 41', 80, 0, 'giay-lacoste-Straightset-118-nam-nau-03 copy-400x400_0.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', 1),
(51, 'Hàng Chính Hãng Nike Air Force ', 2, 3, 9, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 245000, '38, 39, 40, 41', 79, 0, 'giay-Lacoste-Straightset-nam-xanh-navy-noi-01-400x400_0.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', 1),
(52, 'Hàng Chính Hãng Nike Air Force ', 2, 3, 9, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '38, 39, 40, 41', 98, 0, 'giay-nike-Air-Force-180-nam-den-01 copy-400x400_0.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', 1),
(53, 'Hàng Chính Hãng Nike Air Force ', 2, 3, 9, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '38, 39, 40, 41', 84, 0, 'giay-nike-Air-Force-180-nam-xanh-reu-01 copy-400x400_0.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', 1),
(54, 'Hàng Chính Hãng Nike Air Force ', 2, 3, 9, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '38, 39, 40, 41', 80, 0, 'giay-Nike-Air-Huarache-Run-Ultra-SE-nam-den-01 copy-400x400_0.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', 1),
(55, 'Hàng Chính Hãng Nike Air Force ', 2, 3, 9, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 90000, '38, 39, 40, 41', 82, 0, 'giay-Nike-Air-Huarache-Run-Ultra-SE-nam-xanh-01-400x400_0.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', 1),
(56, 'Hàng Chính Hãng Nike Air Force ', 2, 3, 9, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '38, 39, 40, 41', 80, 0, 'giay-nike-air-zoom-pegasus-35-nam-den-trang-01-400x400_0.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', 0),
(57, 'Hàng Chính Hãng Nike Air Force ', 2, 3, 9, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 650000, '38, 39, 40, 41', 82, 0, 'giay-nike-air-zoom-structure-21-nam-xanh-navy-01-400x400_0.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', 1),
(58, 'Hàng Chính Hãng Nike Air Force ', 2, 3, 9, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 90000, '38, 39, 40, 41', 79, 0, 'Giay-Nike-Air-Zoom-Winflo-5-nam-xam-01 copy-400x400_0.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', 1),
(59, 'Hàng Chính Hãng Nike Air Force ', 2, 3, 9, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '38, 39, 40, 41', 80, 0, 'giay-nike-Downshıfter-8-nam-den-01-400x400_0.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', 1),
(60, 'Hàng Chính Hãng Nike Air Force ', 2, 3, 9, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 90000, '38, 39, 40, 41', 90, 0, 'giay-nike-gts-txt-nam-den-trang-01-400x400_0.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', 1),
(61, 'Hàng Chính Hãng Nike Air Force ', 2, 3, 9, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '38, 39, 40, 41', 83, 0, 'giay-Nike-Jordan-88-Racer-nam-den-01 copy-400x400_0.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', 0),
(62, 'Hàng Chính Hãng Nike Air Force ', 2, 3, 10, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 90000, '38, 39, 40, 41', 131, 0, 'giay-Nike-pegasus-35-nam-xanh-01 copy-400x400_0.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', 1),
(63, 'Hàng Chính Hãng Nike Air Force ', 2, 3, 10, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .', 650000, '38, 39, 40, 41', 82, 0, 'Giay-Nike-Jordan-88-Racer-nam-trang-01 copy-400x400_0.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', 1),
(64, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'M, L, XL', 27, 25, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', 1),
(65, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 90000, 'M, L, XL', 26, 25, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', 1),
(66, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 850000, 'M, L, XL', 32, 25, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', 1),
(67, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'M, L, XL', 23, 25, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', 1),
(68, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 90000, 'M, L, XL', 23, 40, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', 0),
(69, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'M, L, XL', 23, 40, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', 0),
(70, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'M, L, XL', 23, 40, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', 1),
(71, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 90000, 'M, L, XL', 24, 40, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', 0),
(72, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 850000, 'M, L, XL', 23, 15, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', 1),
(73, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'M, L, XL', 23, 15, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', 1),
(74, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 90000, 'M, L, XL', 33, 15, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', 1),
(75, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 90000, 'M, L, XL', 23, 15, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', 1),
(76, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 90000, 'M, L, XL', 23, 30, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', 1),
(77, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'M, L, XL', 23, 30, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', 1),
(78, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 90000, 'M, L, XL', 23, 30, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', 1);
INSERT INTO `product` (`Id`, `Name`, `TypeId`, `CategoryId`, `SubCategoryId`, `SupplyId`, `Description`, `Price`, `Size`, `TotalView`, `Percent_off`, `Image1`, `Image2`, `Image3`, `Image4`, `Available`) VALUES
(79, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'M, L, XL', 23, 45, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', 1),
(80, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 90000, 'M, L, XL', 23, 45, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', 1),
(81, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 850000, 'M, L, XL', 23, 45, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', 1),
(82, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'M, L, XL', 23, 45, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', 1),
(83, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'M, L, XL', 23, 45, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', 1),
(84, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .Áo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'M, L, XL', 24, 45, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', 0),
(85, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 850000, 'M, L, XL', 23, 15, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', 1),
(86, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 850000, 'M, L, XL', 23, 15, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', 0),
(87, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'M, L, XL', 23, 15, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', 0),
(88, 'Nike Supper Fake', 2, 3, 10, 2, 'Sản phẩm chất lượng', 170000, '40', 0, 0, 'giay-nike-air-zoom-structure-21-nam-xanh-navy-01-400x400_0.jpg', NULL, NULL, NULL, 1),
(89, 'Giày Fake 1', 1, 3, 10, 2, 'Hàng USA', 690000, '43', 0, 5, 'Giay-Nike-Air-Zoom-Winflo-5-nam-xam-01 copy-400x400_0.jpg', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `Id` int(11) NOT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`Id`, `Name`, `Description`) VALUES
(1, 'admin', 'Toàn bộ quyền quản lý trên website'),
(2, 'user', 'Nhân viên của cửa hàng');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `Id` int(11) NOT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `SupplyId` int(11) DEFAULT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`Id`, `Name`, `SupplyId`, `CategoryId`, `Image`) VALUES
(1, 'Áo khoác da', 1, 1, 'img/subcategory/aokhoac.jpg'),
(2, 'Áo thể thao', 1, 1, 'img/subcategory/aothethao.jpg'),
(3, 'Áo thun', 1, 1, 'img/subcategory/aothun.jpg'),
(4, 'Áo sơ mi ', 1, 1, 'img/subcategory/somi.jpg'),
(5, 'Quần tây công sở', 2, 2, 'img/subcategory/quantay.jpg'),
(6, 'Quần jogger', 1, 2, 'img/subcategory/quanjogger.jpg'),
(7, 'Quần jean ', 1, 2, 'img/subcategory/quanjean.jpg'),
(8, 'Giày Converse', 2, 3, 'img/subcategory/converse.jpg'),
(9, 'Giày Adidas', 2, 3, 'img/subcategory/adidas.jpg'),
(10, 'Giày Nike', 2, 3, 'img/subcategory/nike.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `Id` int(11) NOT NULL,
  `Name` varchar(500) DEFAULT NULL,
  `Logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`Id`, `Name`, `Logo`) VALUES
(1, 'Việt Nam', NULL),
(2, 'USA', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `alias` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`Id`, `Name`, `Description`, `alias`) VALUES
(1, 'SẢN PHẨM NỔI BẬT', '', 'san-pham-order'),
(2, 'SẢN PHẨM MỚI', '', 'san-pham-moi'),
(3, 'SẢN PHẨM KHUYẾN MẠI', '', 'san-pham-khuyen-mai');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(4, 'Nguyễn Thị Anh Thư', 'thu@gmail.com', '$2y$10$EWK1hwnu/i.mko1Y36HDFeUOYxUY0p.ilofWOUp37Q/Ov9bKlSaAi', NULL, 'Nguyễn Công Trứ Đà Lạt', '01682207595', '2018-08-11 05:43:15', '2018-08-11 05:43:15'),
(6, 'Thư Nguyễn Thị Anh', 'thunta@gmail.com', '$2y$10$P04t0DmRLyilpv/BTak0c.qGQJ3HV11hm7gF0jGY.6pbouRESOcq.', 'LYAWYjtMJgYtPNTVfoCU0TwhA5Quu5EGG7Fm62qGGGMvo3FNySef5WkGUnqi', 'Số 01 - Phù Đổng Thiên Vương - TP Đà Lạt', '0382207595', '2018-08-19 10:53:05', '2018-09-19 09:07:54'),
(11, 'Phạm Cảnh', 'canhp@g.com', '$2y$10$yNUigkEhhfNPHqjA8KPAG.i25towGY.wXPtEY6mXZJjWtCiwB5YOK', 'YO60AXmBtT6lKDUxedBFah6LKH1iTZZyeSIagYWIxuZyAfWu31C1K77RM6jf', 'Đà Nẵng', '222222222', '2018-09-10 01:34:59', '2018-09-10 01:34:59'),
(12, 'Hằng Phạm', 'hang@g.com', '$2y$10$d9rFXqrItCmJOIL9r4WPs.kp5vgTUoGlvW5vkCyC8JEgdvTRK9R1S', NULL, '17 - Thị Xã An Nhơn - Bình Định', '0966540904', '2018-09-19 09:45:49', '2018-09-19 09:46:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_Categories_Supplies1` (`SupplyId`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_Comment_Product` (`ProductId`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_Product_Supplies` (`SupplyId`),
  ADD KEY `FK_Product_Categories` (`CategoryId`),
  ADD KEY `TypeId` (`TypeId`),
  ADD KEY `SubCategoryId` (`SubCategoryId`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_Id_Supplies1` (`SupplyId`),
  ADD KEY `FK_Id_Category1` (`CategoryId`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `FK_Categories_Supplies1` FOREIGN KEY (`SupplyId`) REFERENCES `supplies` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_Comment_Product` FOREIGN KEY (`ProductId`) REFERENCES `product` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_Product_Categories` FOREIGN KEY (`CategoryId`) REFERENCES `categories` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Product_Supplies` FOREIGN KEY (`SupplyId`) REFERENCES `supplies` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`TypeId`) REFERENCES `type` (`Id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`SubCategoryId`) REFERENCES `subcategory` (`Id`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `FK_Id_Category1` FOREIGN KEY (`CategoryId`) REFERENCES `categories` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Id_Supplies1` FOREIGN KEY (`SupplyId`) REFERENCES `supplies` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
