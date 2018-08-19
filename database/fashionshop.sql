-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.34-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for ecommerce
CREATE DATABASE IF NOT EXISTS `ecommerce` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ecommerce`;

-- Dumping structure for table ecommerce.banner
CREATE TABLE IF NOT EXISTS `banner` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(150) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `IsActive` tinyint(1) DEFAULT NULL,
  `Visible` int(11) DEFAULT NULL,
  `Description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table ecommerce.banner: ~4 rows (approximately)
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
INSERT INTO `banner` (`Id`, `Name`, `Image`, `IsActive`, `Visible`, `Description`) VALUES
	(1, 'banner trái', 'banner-1-banner-trai.jpg', 1, 1, 'banner bên trái'),
	(2, 'banner phải', 'banner-2-banner-phai.jpg', 1, 2, 'banner bên phải'),
	(3, 'Banner Quảng Cáo Ngang 1', 'banner-3-banner-quang-cao-ngang-1.jpg', 1, 3, 'Nằm dưới sản phẩm mới'),
	(5, '1 trung tam', 'banner-5-1-trung-tam1 trung tam.jpg', 0, 4, 'sdadadasd');
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;

-- Dumping structure for table ecommerce.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(250) DEFAULT NULL,
  `SupplyId` int(11) DEFAULT NULL,
  `Position` int(4) DEFAULT NULL,
  `alias` varchar(200) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_Categories_Supplies1` (`SupplyId`),
  CONSTRAINT `FK_Categories_Supplies1` FOREIGN KEY (`SupplyId`) REFERENCES `supplies` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table ecommerce.categories: ~4 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`Id`, `Name`, `SupplyId`, `Position`, `alias`) VALUES
	(1, 'Áo', 1, 1, 'ao'),
	(2, 'Quần', 1, 2, 'quan'),
	(3, 'Giày', 2, 4, 'giay-dep');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table ecommerce.comment
CREATE TABLE IF NOT EXISTS `comment` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ProductId` int(11) DEFAULT NULL,
  `Content` longtext,
  `CreateDate` datetime DEFAULT NULL,
  `Author` varchar(150) DEFAULT NULL,
  `ParentId` int(11) DEFAULT NULL,
  `Email` varchar(150) DEFAULT NULL,
  `Phone` varchar(15) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_Comment_Product` (`ProductId`),
  CONSTRAINT `FK_Comment_Product` FOREIGN KEY (`ProductId`) REFERENCES `product` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table ecommerce.comment: ~6 rows (approximately)
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` (`Id`, `ProductId`, `Content`, `CreateDate`, `Author`, `ParentId`, `Email`, `Phone`) VALUES
	(1, 1, 'comment 1', '2016-02-26 00:00:00', '1 as', 0, '1', '0912123456'),
	(2, 1, 'MIỄN PHÍ GIAO HÀNG TRONG PHẠM VI 10KM', '2016-02-26 00:00:00', '2', 0, '2', ''),
	(3, 1, '2', '2016-02-26 00:00:00', '2', 0, '2', ''),
	(4, 3, 'noioj dung comment 4dasdad', '2016-02-26 00:00:00', '4', 2, '4', '111111111111'),
	(5, 1, 'noi dung comment 5s dasd', '2090-02-27 00:00:00', '41', 0, '41 1', '1'),
	(6, 13, 's                        ', '2016-03-01 19:10:00', 's', 0, 's', '');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;

-- Dumping structure for table ecommerce.contactinfo
CREATE TABLE IF NOT EXISTS `contactinfo` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Address` varchar(100) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Facebook` varchar(200) NOT NULL,
  `Zalo` varchar(200) NOT NULL,
  `Skype` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table ecommerce.contactinfo: ~0 rows (approximately)
/*!40000 ALTER TABLE `contactinfo` DISABLE KEYS */;
INSERT INTO `contactinfo` (`Id`, `Address`, `Country`, `Mobile`, `Phone`, `Email`, `Facebook`, `Zalo`, `Skype`) VALUES
	(1, 'Thanh xuân', 'Hà Nội', '0945 802 194', '0945 802 194', 'dongvuhtvn@gmail.com', 'Facebook.com', 'dongvu2vn', 'dongvu2vn');
/*!40000 ALTER TABLE `contactinfo` ENABLE KEYS */;

-- Dumping structure for table ecommerce.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(550) DEFAULT NULL,
  `Image` varchar(350) DEFAULT NULL,
  `Links` longtext,
  `Detail` varchar(2500) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ecommerce.customer: ~0 rows (approximately)
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;

-- Dumping structure for table ecommerce.feedback
CREATE TABLE IF NOT EXISTS `feedback` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `Subject` varchar(300) NOT NULL,
  `Createtime` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table ecommerce.feedback: ~5 rows (approximately)
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` (`Id`, `Name`, `Email`, `Mobile`, `Subject`, `Createtime`) VALUES
	(1, 'aaaaaaaa', 'a', '1', ' a', '2016-03-04 00:00:00'),
	(2, 'vu dinh dong', 'dongvu2vn@gmail.com', '0987 192 209', 'Nếu tham số $length được sử dụng và là một số dương, chuỗi trả về sẽ bao gồm $length ký tự, tính từ vị trí thứ $start (tùy thuộc vào độ dài của chuỗi).\\r\\nNếu tham số $length được sử dụng và là một số âm, chuỗi trả về được tính từ vị trí $start đến vị trí $length (trong đó vị trí $length được tính t', '2016-03-10 00:00:00'),
	(4, 'dá', 'sadad', 'dsada', ' sadadad', '2016-03-03 13:20:59'),
	(5, 'dá', 'sadad', 'dsada', ' sadadad', '2016-03-03 13:26:00'),
	(6, 'h', 'j', 'k', 'm ', '2016-03-04 22:48:21');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;

-- Dumping structure for table ecommerce.imageslide
CREATE TABLE IF NOT EXISTS `imageslide` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Image` varchar(255) DEFAULT NULL,
  `SlideId` int(1) DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table ecommerce.imageslide: ~0 rows (approximately)
/*!40000 ALTER TABLE `imageslide` DISABLE KEYS */;
INSERT INTO `imageslide` (`Id`, `Image`, `SlideId`, `IsActive`) VALUES
	(1, '3-1.jpg', 3, 0);
/*!40000 ALTER TABLE `imageslide` ENABLE KEYS */;

-- Dumping structure for table ecommerce.intro
CREATE TABLE IF NOT EXISTS `intro` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` text,
  `Content` longtext,
  `Link` varchar(250) DEFAULT NULL,
  `IsActive` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table ecommerce.intro: ~2 rows (approximately)
/*!40000 ALTER TABLE `intro` DISABLE KEYS */;
INSERT INTO `intro` (`Id`, `Title`, `Content`, `Link`, `IsActive`) VALUES
	(1, '1', '<h2 style="text-align: center;"><strong>Giới thiệu shop</strong></h2>\r\n<br />\r\n<br />\r\n&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Hiện nay, xu hướng thương mại điện tử đang ph&aacute;t triển rất mạnh, trong tương lai sẽ l&agrave; m&ocirc; h&igrave;nh chủ đạo v&agrave; tất yếu, Quanaoredep.com đ&atilde; tạo n&ecirc;n sự kh&aacute;c biệt bởi ch&iacute;nh h&igrave;nh thức n&agrave;y: Một m&ocirc; h&igrave;nh cửa h&agrave;ng trực tuyến, cung cấp mọi g&oacute;c độ của sản phẩm nhằm gi&uacute;p kh&aacute;ch h&agrave;ng dễ d&agrave;ng chọn lựa sản phẩm y&ecirc;u th&iacute;ch, li&ecirc;n tục cập nhật mẫu m&atilde; đa dạng v&agrave; k&egrave;m theo đ&oacute; l&agrave; phong c&aacute;ch b&aacute;n h&agrave;ng chuy&ecirc;n nghiệp, chu đ&aacute;o gi&uacute;p cho bạn trẻ, những người bận rộn, những người l&agrave;m việc văn ph&ograve;ng kh&ocirc;ng c&oacute; thời gian đi shopping vẫn c&oacute; thể thỏa sức mua sắm. với m&ocirc; h&igrave;nh n&agrave;y ch&uacute;ng t&ocirc;i đ&atilde; v&agrave; đang l&agrave;m h&agrave;i l&ograve;ng tất cả c&aacute;c Kh&aacute;ch h&agrave;ng. Hệ thống b&aacute;n h&agrave;ng của ch&uacute;ng t&ocirc;i xuất hiện ở mọi nơi tr&ecirc;n Internet từ Facebook, Twitter, Goole Plus cho tới 123Mua, Zing Me. Bạn c&oacute; thể t&igrave;m hiểu kỹ hơn để y&ecirc;n t&acirc;m hơn về những sản phẩm cũng như dịch vụ b&aacute;n h&agrave;ng trực tuyến của ch&uacute;ng t&ocirc;i theo những đường dẫn sau đ&acirc;y:\r\n<p>+ Facebook: https://www.facebook.com/quanaoredepdotcom<br />\r\n+ Twitter: https://twitter.com/#!/quanaoredep<br />\r\n+ Google Plus: https://plus.google.com/u/0/b/101521943379319701589/<br />\r\n+ Th&agrave;nh vi&ecirc;n Vip tr&ecirc;n Zing Me : http://me.zing.vn/u/shopquanaoredep<br />\r\n+ Th&agrave;nh vi&ecirc;n Vip tr&ecirc;n 123mua.vn http://www.123mua.vn/shopquanaoredep<br />\r\n&nbsp;</p>\r\n\r\n<h2 style="text-align: center;"><strong>Hướng dẫn order sản phẩm</strong></h2>\r\n&nbsp;\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Hiện nay, xu hướng thương mại điện tử đang ph&aacute;t triển rất mạnh, trong tương lai sẽ l&agrave; m&ocirc; h&igrave;nh chủ đạo v&agrave; tất yếu, Quanaoredep.com đ&atilde; tạo n&ecirc;n sự kh&aacute;c biệt bởi ch&iacute;nh h&igrave;nh thức n&agrave;y: Một m&ocirc; h&igrave;nh cửa h&agrave;ng trực tuyến, cung cấp mọi g&oacute;c độ của sản phẩm nhằm gi&uacute;p kh&aacute;ch h&agrave;ng dễ d&agrave;ng chọn lựa sản phẩm y&ecirc;u th&iacute;ch, li&ecirc;n tục cập nhật mẫu m&atilde; đa dạng v&agrave; k&egrave;m theo đ&oacute; l&agrave; phong c&aacute;ch b&aacute;n h&agrave;ng chuy&ecirc;n nghiệp, chu đ&aacute;o gi&uacute;p cho bạn trẻ, những người bận rộn, những người l&agrave;m việc văn ph&ograve;ng kh&ocirc;ng c&oacute; thời gian đi shopping vẫn c&oacute; thể thỏa sức mua sắm. với m&ocirc; h&igrave;nh n&agrave;y ch&uacute;ng t&ocirc;i đ&atilde; v&agrave; đang l&agrave;m h&agrave;i l&ograve;ng tất cả c&aacute;c Kh&aacute;ch h&agrave;ng. Hệ thống b&aacute;n h&agrave;ng của ch&uacute;ng t&ocirc;i xuất hiện ở mọi nơi tr&ecirc;n Internet từ Facebook, Twitter, Goole Plus cho tới 123Mua, Zing Me. Bạn c&oacute; thể t&igrave;m hiểu kỹ hơn để y&ecirc;n t&acirc;m hơn về những sản phẩm cũng như dịch vụ b&aacute;n h&agrave;ng trực tuyến của ch&uacute;ng t&ocirc;i theo những đường dẫn sau đ&acirc;y:</p>\r\n\r\n<p>+ Facebook: https://www.facebook.com/quanaoredepdotcom<br />\r\n+ Twitter: https://twitter.com/#!/quanaoredep<br />\r\n+ Google Plus: https://plus.google.com/u/0/b/101521943379319701589/<br />\r\n+ Th&agrave;nh vi&ecirc;n Vip tr&ecirc;n Zing Me : http://me.zing.vn/u/shopquanaoredep<br />\r\n+ Th&agrave;nh vi&ecirc;n Vip tr&ecirc;n 123mua.vn http://www.123mua.vn/shopquanaoredep<br />\r\n&nbsp;</p>\r\n\r\n<h2 style="text-align: center;"><strong>Chi ph&iacute; vận chuyển, giao h&agrave;ng v&agrave; thanh to&aacute;n</strong></h2>\r\n\r\n<p><br />\r\nHiện nay, xu hướng thương mại điện tử đang ph&aacute;t triển rất mạnh, trong tương lai sẽ l&agrave; m&ocirc; h&igrave;nh chủ đạo v&agrave; tất yếu, Quanaoredep.com đ&atilde; tạo n&ecirc;n sự kh&aacute;c biệt bởi ch&iacute;nh h&igrave;nh thức n&agrave;y: Một m&ocirc; h&igrave;nh cửa h&agrave;ng trực tuyến, cung cấp mọi g&oacute;c độ của sản phẩm nhằm gi&uacute;p kh&aacute;ch h&agrave;ng dễ d&agrave;ng chọn lựa sản phẩm y&ecirc;u th&iacute;ch, li&ecirc;n tục cập nhật mẫu m&atilde; đa dạng v&agrave; k&egrave;m theo đ&oacute; l&agrave; phong c&aacute;ch b&aacute;n h&agrave;ng chuy&ecirc;n nghiệp, chu đ&aacute;o gi&uacute;p cho bạn trẻ, những người bận rộn, những người l&agrave;m việc văn ph&ograve;ng kh&ocirc;ng c&oacute; thời gian đi shopping vẫn c&oacute; thể thỏa sức mua sắm. với m&ocirc; h&igrave;nh n&agrave;y ch&uacute;ng t&ocirc;i đ&atilde; v&agrave; đang l&agrave;m h&agrave;i l&ograve;ng tất cả c&aacute;c Kh&aacute;ch h&agrave;ng. Hệ thống b&aacute;n h&agrave;ng của ch&uacute;ng t&ocirc;i xuất hiện ở mọi nơi tr&ecirc;n Internet từ Facebook, Twitter, Goole Plus cho tới 123Mua, Zing Me. Bạn c&oacute; thể t&igrave;m hiểu kỹ hơn để y&ecirc;n t&acirc;m hơn về những sản phẩm cũng như dịch vụ b&aacute;n h&agrave;ng trực tuyến của ch&uacute;ng t&ocirc;i theo những đường dẫn sau đ&acirc;y: + Facebook: https://www.facebook.com/quanaoredepdotcom<br />\r\n\\r\\n+ Twitter: https://twitter.com/#!/quanaoredep<br />\r\n\\r\\n+ Google Plus: https://plus.google.com/u/0/b/101521943379319701589/<br />\r\n\\r\\n+ Th&agrave;nh vi&ecirc;n Vip tr&ecirc;n Zing Me : http://me.zing.vn/u/shopquanaoredep<br />\r\n\\r\\n+ Th&agrave;nh vi&ecirc;n Vip tr&ecirc;n 123mua.vn http://www.123mua.vn/shopquanaoredep</p>\r\n\\r\\n', NULL, 1),
	(2, 'Nội dung giới thiệu shop', '<h2 style="text-align:center"><strong>Giới thiệu shop</strong></h2>\r\n\r\n<div style="text-align: justify;">&nbsp;</div>\r\n\r\n<div>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Hiện nay, xu hướng thương mại điện tử đang ph&aacute;t triển rất mạnh, trong tương lai sẽ l&agrave; m&ocirc; h&igrave;nh chủ đạo v&agrave; tất yếu, Quanaoredep.com đ&atilde; tạo n&ecirc;n sự kh&aacute;c biệt bởi ch&iacute;nh h&igrave;nh thức n&agrave;y: Một m&ocirc; h&igrave;nh cửa h&agrave;ng trực tuyến, cung cấp mọi g&oacute;c độ của sản phẩm nhằm gi&uacute;p kh&aacute;ch h&agrave;ng dễ d&agrave;ng chọn lựa sản phẩm y&ecirc;u th&iacute;ch, li&ecirc;n tục cập nhật mẫu m&atilde; đa dạng v&agrave; k&egrave;m theo đ&oacute; l&agrave; phong c&aacute;ch b&aacute;n h&agrave;ng chuy&ecirc;n nghiệp, chu đ&aacute;o gi&uacute;p cho bạn trẻ, những người bận rộn, những người l&agrave;m việc văn ph&ograve;ng kh&ocirc;ng c&oacute; thời gian đi shopping vẫn c&oacute; thể thỏa sức mua sắm. với m&ocirc; h&igrave;nh n&agrave;y ch&uacute;ng t&ocirc;i đ&atilde; v&agrave; đang l&agrave;m h&agrave;i l&ograve;ng tất cả c&aacute;c Kh&aacute;ch h&agrave;ng. Hệ thống b&aacute;n h&agrave;ng của ch&uacute;ng t&ocirc;i xuất hiện ở mọi nơi tr&ecirc;n Internet từ Facebook, Twitter, Goole Plus cho tới 123Mua, Zing Me. Bạn c&oacute; thể t&igrave;m hiểu kỹ hơn để y&ecirc;n t&acirc;m hơn về những sản phẩm cũng như dịch vụ b&aacute;n h&agrave;ng trực tuyến của ch&uacute;ng t&ocirc;i theo những đường dẫn sau đ&acirc;y:</div>\r\n\r\n<p style="margin-left: 40px;">+ Facebook: https://www.facebook.com/quanaoredepdotcom<br />\r\n+ Twitter: https://twitter.com/#!/quanaoredep<br />\r\n+ Google Plus: https://plus.google.com/u/0/b/101521943379319701589/<br />\r\n+ Th&agrave;nh vi&ecirc;n Vip tr&ecirc;n Zing Me : http://me.zing.vn/u/shopquanaoredep<br />\r\n+ Th&agrave;nh vi&ecirc;n Vip tr&ecirc;n 123mua.vn http://www.123mua.vn/shopquanaoredep<br />\r\n&nbsp;</p>\r\n\r\n<h2 style="text-align:center"><strong>Hướng dẫn order sản phẩm</strong></h2>\r\n&nbsp;\r\n\r\n<p style="text-align: justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Hiện nay, xu hướng thương mại điện tử đang ph&aacute;t triển rất mạnh, trong tương lai sẽ l&agrave; m&ocirc; h&igrave;nh chủ đạo v&agrave; tất yếu, Quanaoredep.com đ&atilde; tạo n&ecirc;n sự kh&aacute;c biệt bởi ch&iacute;nh h&igrave;nh thức n&agrave;y: Một m&ocirc; h&igrave;nh cửa h&agrave;ng trực tuyến, cung cấp mọi g&oacute;c độ của sản phẩm nhằm gi&uacute;p kh&aacute;ch h&agrave;ng dễ d&agrave;ng chọn lựa sản phẩm y&ecirc;u th&iacute;ch, li&ecirc;n tục cập nhật mẫu m&atilde; đa dạng v&agrave; k&egrave;m theo đ&oacute; l&agrave; phong c&aacute;ch b&aacute;n h&agrave;ng chuy&ecirc;n nghiệp, chu đ&aacute;o gi&uacute;p cho bạn trẻ, những người bận rộn, những người l&agrave;m việc văn ph&ograve;ng kh&ocirc;ng c&oacute; thời gian đi shopping vẫn c&oacute; thể thỏa sức mua sắm. với m&ocirc; h&igrave;nh n&agrave;y ch&uacute;ng t&ocirc;i đ&atilde; v&agrave; đang l&agrave;m h&agrave;i l&ograve;ng tất cả c&aacute;c Kh&aacute;ch h&agrave;ng. Hệ thống b&aacute;n h&agrave;ng của ch&uacute;ng t&ocirc;i xuất hiện ở mọi nơi tr&ecirc;n Internet từ Facebook, Twitter, Goole Plus cho tới 123Mua, Zing Me. Bạn c&oacute; thể t&igrave;m hiểu kỹ hơn để y&ecirc;n t&acirc;m hơn về những sản phẩm cũng như dịch vụ b&aacute;n h&agrave;ng trực tuyến của ch&uacute;ng t&ocirc;i theo những đường dẫn sau đ&acirc;y:</p>\r\n\r\n<p style="margin-left: 40px;">+ Facebook: https://www.facebook.com/quanaoredepdotcom<br />\r\n+ Twitter: https://twitter.com/#!/quanaoredep<br />\r\n+ Google Plus: https://plus.google.com/u/0/b/101521943379319701589/<br />\r\n+ Th&agrave;nh vi&ecirc;n Vip tr&ecirc;n Zing Me : http://me.zing.vn/u/shopquanaoredep<br />\r\n+ Th&agrave;nh vi&ecirc;n Vip tr&ecirc;n 123mua.vn http://www.123mua.vn/shopquanaoredep<br />\r\n&nbsp;</p>\r\n\r\n<h2 style="text-align:center"><strong>Chi ph&iacute; vận chuyển, giao h&agrave;ng v&agrave; thanh to&aacute;n</strong></h2>\r\n\r\n<p><br />\r\nHiện nay, xu hướng thương mại điện tử đang ph&aacute;t triển rất mạnh, trong tương lai sẽ l&agrave; m&ocirc; h&igrave;nh chủ đạo v&agrave; tất yếu, Quanaoredep.com đ&atilde; tạo n&ecirc;n sự kh&aacute;c biệt bởi ch&iacute;nh h&igrave;nh thức n&agrave;y: Một m&ocirc; h&igrave;nh cửa h&agrave;ng trực tuyến, cung cấp mọi g&oacute;c độ của sản phẩm nhằm gi&uacute;p kh&aacute;ch h&agrave;ng dễ d&agrave;ng chọn lựa sản phẩm y&ecirc;u th&iacute;ch, li&ecirc;n tục cập nhật mẫu m&atilde; đa dạng v&agrave; k&egrave;m theo đ&oacute; l&agrave; phong c&aacute;ch b&aacute;n h&agrave;ng chuy&ecirc;n nghiệp, chu đ&aacute;o gi&uacute;p cho bạn trẻ, những người bận rộn, những người l&agrave;m việc văn ph&ograve;ng kh&ocirc;ng c&oacute; thời gian đi shopping vẫn c&oacute; thể thỏa sức mua sắm. với m&ocirc; h&igrave;nh n&agrave;y ch&uacute;ng t&ocirc;i đ&atilde; v&agrave; đang l&agrave;m h&agrave;i l&ograve;ng tất cả c&aacute;c Kh&aacute;ch h&agrave;ng. Hệ thống b&aacute;n h&agrave;ng của ch&uacute;ng t&ocirc;i xuất hiện ở mọi nơi tr&ecirc;n Internet từ Facebook, Twitter, Goole Plus cho tới 123Mua, Zing Me. Bạn c&oacute; thể t&igrave;m hiểu kỹ hơn để y&ecirc;n t&acirc;m hơn về những sản phẩm cũng như dịch vụ b&aacute;n h&agrave;ng trực tuyến của ch&uacute;ng t&ocirc;i theo những đường dẫn sau đ&acirc;y: + Facebook: https://www.facebook.com/quanaoredepdotcom<br />\r\n\\r\\n+ Twitter: https://twitter.com/#!/quanaoredep<br />\r\n\\r\\n+ Google Plus: https://plus.google.com/u/0/b/101521943379319701589/<br />\r\n\\r\\n+ Th&agrave;nh vi&ecirc;n Vip tr&ecirc;n Zing Me : http://me.zing.vn/u/shopquanaoredep<br />\r\n\\r\\n+ Th&agrave;nh vi&ecirc;n Vip tr&ecirc;n 123mua.vn http://www.123mua.vn/shopquanaoredep</p>\r\n\\r\\n', NULL, 1);
/*!40000 ALTER TABLE `intro` ENABLE KEYS */;

-- Dumping structure for table ecommerce.logo
CREATE TABLE IF NOT EXISTS `logo` (
  `LogoId` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(150) DEFAULT NULL,
  `Images` varchar(255) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `IsActive` tinyint(1) DEFAULT NULL,
  `alias` varchar(200) NOT NULL,
  PRIMARY KEY (`LogoId`),
  UNIQUE KEY `logo` (`alias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ecommerce.logo: ~0 rows (approximately)
/*!40000 ALTER TABLE `logo` DISABLE KEYS */;
/*!40000 ALTER TABLE `logo` ENABLE KEYS */;

-- Dumping structure for table ecommerce.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `MenuId` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(150) DEFAULT NULL,
  `ParentId` int(11) DEFAULT NULL,
  `URL` varchar(250) DEFAULT NULL,
  `Order` int(11) DEFAULT NULL,
  `IsVisible` tinyint(1) DEFAULT NULL,
  `Desciption` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`MenuId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table ecommerce.menu: ~4 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`MenuId`, `Name`, `ParentId`, `URL`, `Order`, `IsVisible`, `Desciption`) VALUES
	(1, 'Trang chủ', NULL, '#', 1, 1, NULL),
	(2, 'Sản phẩm', NULL, 'san-pham', 2, 1, NULL),
	(3, 'Thời trang nam', 2, 'category.php', 2, 1, NULL),
	(4, 'Thời trang nữ', 2, '~/thoi-trang-nu.php', 2, 1, NULL);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Dumping structure for table ecommerce.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecommerce.migrations: ~2 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table ecommerce.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerId` int(11) DEFAULT NULL,
  `Address` varchar(200) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Createtime` datetime NOT NULL,
  `Status` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Cart_total` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table ecommerce.orders: ~2 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`Id`, `CustomerId`, `Address`, `Phone`, `Createtime`, `Status`, `Email`, `Cart_total`, `created_at`, `updated_at`) VALUES
	(1, 1, 'sa', '3223434343', '2018-08-15 11:47:43', 0, 'admin@gmail.com', '0.00', '2018-08-15 11:47:43', '2018-08-15 11:47:43'),
	(2, 1, 'sa', '3223434343', '2018-08-15 11:49:30', 0, 'admin@gmail.com', '350,000.00', '2018-08-15 11:49:30', '2018-08-15 11:49:30'),
	(3, 5, 'Đà Nẵng', '0153343434', '2018-08-16 10:30:36', 0, 'abc@huy.com', '2,100,000.00', '2018-08-16 10:30:36', '2018-08-16 10:30:36'),
	(4, 5, 'Đà Nẵng', '0153343434', '2018-08-18 10:18:30', 0, 'abc@huy.com', '245,000.00', '2018-08-18 10:18:30', '2018-08-18 10:18:30');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table ecommerce.order_detail
CREATE TABLE IF NOT EXISTS `order_detail` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `OrderId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table ecommerce.order_detail: ~2 rows (approximately)
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
INSERT INTO `order_detail` (`Id`, `OrderId`, `ProductId`, `Quantity`, `Price`, `Description`, `created_at`, `updated_at`) VALUES
	(1, 2, 3, 1, 350000, NULL, '2018-08-15 11:49:30', '2018-08-15 11:49:30'),
	(2, 3, 31, 5, 1750000, NULL, '2018-08-16 10:30:36', '2018-08-16 10:30:36'),
	(3, 3, 55, 1, 350000, NULL, '2018-08-16 10:30:36', '2018-08-16 10:30:36'),
	(4, 4, 18, 1, 245000, NULL, '2018-08-18 10:18:30', '2018-08-18 10:18:30');
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;

-- Dumping structure for table ecommerce.product
CREATE TABLE IF NOT EXISTS `product` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(550) DEFAULT NULL,
  `TypeId` int(11) NOT NULL,
  `CategoryId` int(11),
  `SubCategoryId` int(11),
  `SupplyId` int(11),
  `Description` varchar(500) DEFAULT NULL,
  `Price` int(11) NOT NULL,
  `Size` varchar(20) NOT NULL,
  `TotalView` int(11) DEFAULT NULL,
  `isSaleOff` tinyint(1) DEFAULT NULL,
  `Percent_off` int(11) DEFAULT NULL,
  `Image1` varchar(250) DEFAULT NULL,
  `Image2` varchar(250) DEFAULT NULL,
  `Image3` varchar(260) NOT NULL,
  `Image4` varchar(260) NOT NULL,
  `Available` bit(1) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_Product_Supplies` (`SupplyId`),
  KEY `FK_Product_Categories` (`CategoryId`),
  CONSTRAINT `FK_Product_Categories` FOREIGN KEY (`CategoryId`) REFERENCES `categories` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Product_Supplies` FOREIGN KEY (`SupplyId`) REFERENCES `supplies` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;

-- Dumping data for table ecommerce.product: ~82 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`Id`, `Name`, `TypeId`, `CategoryId`, `SubCategoryId`, `SupplyId`, `Description`, `Price`, `Size`, `TotalView`, `isSaleOff`, `Percent_off`, `Image1`, `Image2`, `Image3`, `Image4`, `Available`) VALUES
	(1, 'Áo khoác mùa hè hà nội', 1, 2, 2, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 89, 0, 0, '1-ao-khoac.jpg', '1-ao-khoac2.jpg', '', '', b'0'),
	(2, 'Áo khoác choàng lót lông AK-36212', 1, 1, 3, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 149, 1, 0, '2-ao-khoac-choang-lot-long-ak36212.jpg', '2-ao-khoac-choang-lot-long-ak362122.jpg', 'product32-ao-khoac-choang-lot-long-ak36212.jpg', '', b'1'),
	(3, 'Áo khoác kaki lót lông AK-31112', 2, 1, 3, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 25, 0, 0, '3-ao-khoac-kaki-lot-long-ak31112.jpg', 'vàng', '', '', b'0'),
	(4, 'Áo khoác kaki lót lông AK-31112', 2, 1, 3, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 20, 0, 0, '4-ao-khoac-kaki-lot-long-ak31112.jpg', 'product24-ao-khoac-kaki-lot-long-ak31112.jpg', '', '', b'0'),
	(5, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 23, 0, 0, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', b'0'),
	(6, 'Áo thun nam ngắn tay in hình Avenger', 2, 3, 3, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 79, 0, 15, '6-ao-khoac-ak723.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', b'0'),
	(7, 'Áo khoác AK-112', 2, 2, 1, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 12, 0, 0, '7-ao-khoac-ak112.jpg', 'Áo khoác AK-723', '', '', b'0'),
	(8, 'Áo khoác AK-7234', 2, 2, 1, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 12, 0, 0, '8-ao-khoac-ak7234.jpg', 'product28-ao-khoac-ak7234.jpg', '', '', b'0'),
	(9, 'Áo khoác XK-71', 2, 2, 1, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 20, 0, 0, '9-ao-khoac-xk71.jpg', 'Áo khoác AK-723', '', 'product49-ao-khoac-xk71.jpg', b'0'),
	(10, 'Áo khoác AK-223', 2, 2, 1, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 17, 0, 0, '10-ao-khoac-ak223.jpg', '10-ao-khoac-ak2232.jpg', '', '', b'0'),
	(13, 'Áo phong 19', 3, 2, 2, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 0, 1, 10, '13-dsd.jpg', NULL, '', '', b'0'),
	(14, 'Áo phông mới 2015', 3, 2, 2, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', NULL, NULL, 10, 'product114-ao-phong-moi-2015.jpg', NULL, '', '', b'0'),
	(15, 'Áo phông có cổ trái tim', 3, 2, 2, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'L, XL', 39, 1, 15, 'product115-ao-phong-polo.jpg', 'product215-ao-phong-polo.jpg', '', '', b'0'),
	(16, 'Áo phông có cổ trái tim', 1, 2, 2, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 1, 0, 0, 'product116-ao-phong-14.jpg', 'product216-ao-phong-14.jpg', 'product316-ao-phong-14.jpg', '', b'1'),
	(17, 'Áo phông có cổ trái tim', 1, 2, 2, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 0, 0, 0, 'product117-ao-phong-15.jpg', NULL, '', '', b'0'),
	(18, 'Sơ mi dài tay', 2, 2, 1, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'L, Xl, M', 17, 0, 30, 'product118-so-mi-dai-tay.jpg', 'product218-so-mi-dai-tay.jpg', '', '', b'0'),
	(19, 'Áo khoác mùa hè catton', 3, 2, 1, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'M, L, XL', 4, 0, 5, 'product119-margin.jpg', 'product219-margin.jpg', '', '', b'0'),
	(20, 'Áo khoác mùa hè catton', 1, 2, 1, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'XL,L', 139, 0, 0, 'product120-margin-09.jpg', 'product220-margin-09.jpg', '', '', b'0'),
	(21, 'Áo khoác mùa hè catton', 1, 2, 1, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'L, XL', 86, 0, 7, 'product121-margin-09-em.jpg', 'product221-margin-09-em.jpg', '', '', b'0'),
	(22, 'Áo khoác mùa hè catton', 1, 2, 1, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'L, Xl, M', 14, 0, 5, 'product122-margin-0-0.jpg', 'product222-margin-0-0.jpg', 'product322-margin-0-0.jpg', '', b'0'),
	(23, 'Áo khoác mùa hè catton', 1, 2, 1, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'L, XL', 2, 0, 7, 'product123-so-mi-bo.jpg', 'product223-so-mi-bo.jpg', 'product323-so-mi-bo.jpg', 'product423-so-mi-bo.jpg', b'0'),
	(24, 'Áo khoác mùa hè catton', 1, 2, 1, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'L, Xl, M', 2, 0, 5, 'product124-so-mi-12.jpg', 'product224-so-mi-12.jpg', '', '', b'0'),
	(25, 'Áo khoác mùa hè catton', 1, 2, 1, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'L, Xl, M', 11, 0, 0, 'product125-x1.jpg', 'product225-x1.jpg', '', '', b'0'),
	(26, 'Áo phông có cổ trái tim', 1, 2, 1, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'L, Xl, M', 4, 0, 7, 'product126-so-mi-bo-aaa.jpg', 'product226-so-mi-bo-aaa.jpg', '', '', b'0'),
	(27, 'Áo phông có cổ trái tim', 1, 2, 1, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'L, Xl, M', 2, 0, 0, 'product127-aaa-1.jpg', 'product227-aaa-1.jpg', '', '', b'0'),
	(28, 'Áo phông có cổ trái tim', 2, 2, 2, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'L, Xl, M', 0, 0, 0, 'product128-ao-phong.jpg', 'product228-ao-phong.jpg', '', '', b'0'),
	(29, 'Áo phông có cổ trái tim', 2, 2, 2, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'L, Xl, M', 1, 0, 0, 'product129-ao-phong-03.jpg', 'product229-ao-phong-03.jpg', '', '', b'0'),
	(30, 'Áo phông có cổ trái tim', 2, 2, 2, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'L, XL', 1, 0, 20, 'product130-ao-phong-09.jpg', NULL, '', '', b'0'),
	(31, 'Áo phông có cổ trái tim', 2, 2, 2, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'L, Xl, M', 4, 0, 0, 'product131-ao-phong-1.jpg', NULL, '', '', b'0'),
	(32, 'Áo phông có cổ trái tim', 3, 2, 1, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'L, XL', 2, 1, 19, 'product132-ao-phong-03.jpg', NULL, '', '', b'0'),
	(33, 'Áo phông có cổ trái tim', 3, 2, 1, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'L, Xl, M', 4, 1, 12, 'product133-12-ao-phong.jpg', NULL, '', '', b'0'),
	(34, 'Áo phông có cổ trái tim', 3, 2, 2, NULL, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, 'L, Xl, M', 11, 1, 6, 'product134-ao-phong-12.jpg', 'product234-ao-phong-12.jpg', '', '', b'0'),
	(38, 'Áo thun nam ngắn tay in hình Avenger', 2, 3, 3, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 79, 0, 10, '6-ao-khoac-ak723.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', b'0'),
	(39, 'Áo thun nam ngắn tay in hình Avenger', 2, 3, 3, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 79, 0, 0, '6-ao-khoac-ak723.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', b'0'),
	(40, 'Áo thun nam ngắn tay in hình Avenger', 2, 3, 3, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 79, 0, 0, '6-ao-khoac-ak723.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', b'0'),
	(41, 'Áo thun nam ngắn tay in hình Avenger', 2, 3, 3, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 79, 0, 0, '6-ao-khoac-ak723.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', b'0'),
	(42, 'Áo thun nam ngắn tay in hình Avenger', 2, 3, 3, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 79, 0, 0, '6-ao-khoac-ak723.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', b'0'),
	(43, 'Áo thun nam ngắn tay in hình Avenger', 2, 3, 3, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 79, 0, 0, '6-ao-khoac-ak723.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', b'0'),
	(44, 'Áo thun nam ngắn tay in hình Avenger', 2, 3, 3, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 79, 0, 0, '6-ao-khoac-ak723.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', b'0'),
	(45, 'Áo thun nam ngắn tay in hình Avenger', 2, 3, 3, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 79, 0, 0, '6-ao-khoac-ak723.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', b'0'),
	(46, 'Áo thun nam ngắn tay in hình Avenger', 2, 3, 3, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 79, 0, 0, '6-ao-khoac-ak723.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', b'0'),
	(47, 'Áo thun nam ngắn tay in hình Avenger', 2, 3, 3, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 79, 0, 0, '6-ao-khoac-ak723.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', b'0'),
	(48, 'Áo thun nam ngắn tay in hình Avenger', 2, 3, 3, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 79, 0, 0, '6-ao-khoac-ak723.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', b'0'),
	(49, 'Áo thun nam ngắn tay in hình Avenger', 2, 3, 3, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 79, 0, 0, '6-ao-khoac-ak723.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', b'0'),
	(50, 'Áo thun nam ngắn tay in hình Avenger', 2, 3, 3, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 79, 0, 0, '6-ao-khoac-ak723.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', b'0'),
	(51, 'Áo thun nam ngắn tay in hình Avenger', 2, 3, 3, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 79, 0, 0, '6-ao-khoac-ak723.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', b'0'),
	(52, 'Áo thun nam ngắn tay in hình Avenger', 2, 3, 3, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 79, 0, 0, '6-ao-khoac-ak723.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', b'0'),
	(53, 'Áo thun nam ngắn tay in hình Avenger', 2, 3, 3, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 79, 0, 0, '6-ao-khoac-ak723.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', b'0'),
	(54, 'Áo thun nam ngắn tay in hình Avenger', 2, 3, 3, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 79, 0, 0, '6-ao-khoac-ak723.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', b'0'),
	(55, 'Áo thun nam ngắn tay in hình Avenger', 2, 3, 3, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 79, 0, 0, '6-ao-khoac-ak723.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', b'0'),
	(56, 'Áo thun nam ngắn tay in hình Avenger', 2, 3, 3, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 79, 0, 0, '6-ao-khoac-ak723.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', b'0'),
	(57, 'Áo thun nam ngắn tay in hình Avenger', 2, 3, 3, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 79, 0, 0, '6-ao-khoac-ak723.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', b'0'),
	(58, 'Áo thun nam ngắn tay in hình Avenger', 2, 3, 3, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 79, 0, 0, '6-ao-khoac-ak723.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', b'0'),
	(59, 'Áo thun nam ngắn tay in hình Avenger', 2, 3, 3, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 79, 0, 0, '6-ao-khoac-ak723.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', b'0'),
	(60, 'Áo thun nam ngắn tay in hình Avenger', 2, 3, 3, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 79, 0, 0, '6-ao-khoac-ak723.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', b'0'),
	(61, 'Áo thun nam ngắn tay in hình Avenger', 2, 3, 3, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 79, 0, 0, '6-ao-khoac-ak723.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', b'0'),
	(62, 'Áo thun nam ngắn tay in hình Avenger', 2, 3, 3, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 79, 0, 0, '6-ao-khoac-ak723.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', b'0'),
	(63, 'Áo thun nam ngắn tay in hình Avenger', 2, 3, 3, 2, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .', 350000, '', 79, 0, 0, '6-ao-khoac-ak723.jpg', 'product26-ao-khoac-ak723.jpg', 'product36-ao-khoac-ak723.jpg', '', b'0'),
	(64, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 23, 0, 0, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', b'0'),
	(65, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 23, 0, 0, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', b'0'),
	(66, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 23, 0, 0, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', b'0'),
	(67, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 23, 0, 0, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', b'0'),
	(68, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 23, 0, 0, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', b'0'),
	(69, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 23, 0, 0, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', b'0'),
	(70, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 23, 0, 0, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', b'0'),
	(71, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 23, 0, 0, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', b'0'),
	(72, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 23, 0, 0, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', b'0'),
	(73, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 23, 0, 0, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', b'0'),
	(74, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 23, 0, 0, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', b'0'),
	(75, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 23, 0, 0, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', b'0'),
	(76, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 23, 0, 0, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', b'0'),
	(77, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 23, 0, 0, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', b'0'),
	(78, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 23, 0, 0, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', b'0'),
	(79, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 23, 0, 0, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', b'0'),
	(80, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 23, 0, 0, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', b'0'),
	(81, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 23, 0, 0, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', b'0'),
	(82, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 23, 0, 0, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', b'0'),
	(83, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 23, 0, 0, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', b'0'),
	(84, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 23, 0, 0, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', b'0'),
	(85, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 23, 0, 0, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', b'0'),
	(86, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 23, 0, 0, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', b'0'),
	(87, 'Áo khoác jeans 2 lớp', 3, 1, 4, 1, 'Áo thun trơn nam form rộng phong cách hàn quốc vải dày mịn Everest E3 (Đen) Thời Trang Everest : Chất liệu thun mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc. Thiết kế cổ tròn, tay ngắn mang lại cho phái mạnh phong cách nam tính và lịch lãm khi mặc hàng ngày .\r\n\r\nÁo thun nam là một loại trang phục có mặt trong tủ đồ của tất cả các chàng trai. Nếu chiếc áo sơ mi mang lại cho các quý ông vẻ thanh lịch, đứng đắn thì áo thun nam lại tạo cho họ phong cách trẻ trung, cá tính đầy cuốn hút.', 350000, '', 23, 0, 0, '5-ao-khoac-kaki-lot-bong-mt2026.jpg', '5-ao-khoac-kaki-lot-bong-mt20262.jpg', '', '', b'0');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping structure for table ecommerce.role
CREATE TABLE IF NOT EXISTS `role` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(250) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table ecommerce.role: ~2 rows (approximately)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`Id`, `Name`, `Description`) VALUES
	(1, 'admin', 'a'),
	(2, 'user', 'sadad');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table ecommerce.subcategory
CREATE TABLE IF NOT EXISTS `subcategory` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(250) DEFAULT NULL,
  `SupplyId` int(11) DEFAULT NULL,
  `Link` varchar(260) DEFAULT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `pId` int(11) NOT NULL,
  `alias` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_Id_Supplies1` (`SupplyId`),
  KEY `FK_Id_Category1` (`CategoryId`),
  CONSTRAINT `FK_Id_Category1` FOREIGN KEY (`CategoryId`) REFERENCES `categories` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Id_Supplies1` FOREIGN KEY (`SupplyId`) REFERENCES `supplies` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Dumping data for table ecommerce.subcategory: ~11 rows (approximately)
/*!40000 ALTER TABLE `subcategory` DISABLE KEYS */;
INSERT INTO `subcategory` (`Id`, `Name`, `SupplyId`, `Link`, `CategoryId`, `pId`, `alias`) VALUES
	(1, 'Quần jean ', 1, 'so-mi.php', 2, 0, 'aosomi'),
	(2, 'Quần jogger', 1, 'so-mi.php', 2, 0, 'ao-phong'),
	(3, 'Áo sơ mi ', 1, NULL, 1, 0, 'jean'),
	(4, 'Áo thun', 1, NULL, 1, 0, 'quan-kaki'),
	(5, 'Quần tây công sở', 2, 'so-mi-dai-tay', 2, 1, ''),
	(7, 'Áo thể thao', 1, NULL, 1, 0, 'quan-au'),
	(10, 'Giày Nike', 2, NULL, 3, 0, ''),
	(11, 'Giày Adidas', 2, NULL, 3, 0, ''),
	(12, 'Converse', 2, NULL, 3, 0, ''),
	(13, 'Áo khoác', 1, NULL, 1, 0, 'quan-au');
/*!40000 ALTER TABLE `subcategory` ENABLE KEYS */;

-- Dumping structure for table ecommerce.supplies
CREATE TABLE IF NOT EXISTS `supplies` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(500) DEFAULT NULL,
  `Logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table ecommerce.supplies: ~2 rows (approximately)
/*!40000 ALTER TABLE `supplies` DISABLE KEYS */;
INSERT INTO `supplies` (`Id`, `Name`, `Logo`) VALUES
	(1, 'Việt Nam', NULL),
	(2, 'USA', NULL);
/*!40000 ALTER TABLE `supplies` ENABLE KEYS */;

-- Dumping structure for table ecommerce.type
CREATE TABLE IF NOT EXISTS `type` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `alias` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table ecommerce.type: ~3 rows (approximately)
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` (`Id`, `Name`, `Description`, `alias`) VALUES
	(1, 'SẢN PHẨM NỔI BẬT', '', 'san-pham-order'),
	(2, 'SẢN PHẨM MỚI', '', 'san-pham-moi'),
	(3, 'SẢN PHẨM KHUYẾN MẠI', '', 'san-pham-khuyen-mai');
/*!40000 ALTER TABLE `type` ENABLE KEYS */;

-- Dumping structure for table ecommerce.user
CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Name` varchar(150) DEFAULT NULL,
  `CreateDate` date DEFAULT NULL,
  `RoleId` int(11) DEFAULT NULL,
  `Avatar` varchar(550) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_User_Role` (`RoleId`),
  CONSTRAINT `FK_User_Role` FOREIGN KEY (`RoleId`) REFERENCES `role` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- Dumping data for table ecommerce.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`Id`, `Username`, `Password`, `Name`, `CreateDate`, `RoleId`, `Avatar`, `Email`, `Phone`, `Address`) VALUES
	(25, 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'admin', '2016-03-18', 1, 'avatar_name25-.jpg', 'dongvuhtvn@gmail.com', '0945802194', 'hanoi'),
	(26, 'huy', 'huy', 'user', '2016-03-18', 2, 'avatar_name26-user.png', 'user@user.com', '0945802194', 'hanoi');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table ecommerce.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecommerce.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `address`, `phone`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@gmail.com', '$2y$10$3SDT4HO5WdOMMpyC4msbEOTz98aAE5UWosPvQGNiSgCKGBhb233qK', 'VtEBjfZVtvZM7RZyewfc9uM0ukpaE1TqRoN3bcle3mm7G14u4hLiCV1JqSly', 'sa', '3223434343', '2018-08-07 23:02:27', '2018-08-07 23:02:27'),
	(2, 'Phạm Huy', 'phamhuy@abc.com', '$2y$10$fZhLZKJ3Fk3O2BZjYsN29O4GkL6932TuTI.aD7g3JIvOf0.Ff34v.', 'VxXPOhkhxzLBRjDu4dUIsZY1L2WdrxfcokX9SSRuTFEHuD4FPBs7ZzkwjhYD', NULL, NULL, '2018-08-08 00:01:59', '2018-08-08 00:01:59'),
	(3, 'Quang Hưng', 'w@g.c', '$2y$10$64j6Li3Y0MCiUdswJ7xy8uHT6YHSQ5gbJD2si1PwjUhx96EgngJGO', 'Q9IdG0IxXJOzPnNVf4cNsyp0lMQyHaYg1AxdTdd7VCOKreRSFrLwggBMlCyi', 'Đà Lạt, Lâm Đồng', '01653247036', '2018-08-08 10:59:52', '2018-08-08 10:59:52'),
	(4, 'Nguyễn Thị Anh Thư', 'thu@gmail.com', '$2y$10$EWK1hwnu/i.mko1Y36HDFeUOYxUY0p.ilofWOUp37Q/Ov9bKlSaAi', NULL, 'Nguyễn Công Trứ Đà Lạt', '01682207595', '2018-08-11 12:43:15', '2018-08-11 12:43:15'),
	(5, 'abc', 'abc@huy.com', '$2y$10$BF8jZwIKIwNhJ9CVSmmnb.9X4Uq2//KdYfevYwGAlo476zk6xApa.', NULL, 'Đà Nẵng', '0153343434', '2018-08-15 20:32:55', '2018-08-15 20:32:55');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table ecommerce.visiter
CREATE TABLE IF NOT EXISTS `visiter` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `session` varchar(100) NOT NULL DEFAULT '''''',
  `time` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(24) NOT NULL,
  `browser` varchar(50) NOT NULL,
  `dateonline` date NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

-- Dumping data for table ecommerce.visiter: ~58 rows (approximately)
/*!40000 ALTER TABLE `visiter` DISABLE KEYS */;
INSERT INTO `visiter` (`Id`, `session`, `time`, `ip`, `browser`, `dateonline`) VALUES
	(2, '1456825980', 1270, 'Mozilla/5.0 (Windows NT ', '2016-03-01', '0000-00-00'),
	(3, 'u15sou3lb29c5mro2vgrahugu3', 1456826004, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-01'),
	(4, 'n6971v5af3kbrmve3g0hhnh6i2', 1456826021, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Trident/7.0; rv:11.0)', '2016-03-01'),
	(5, 'u15sou3lb29c5mro2vgrahugu3', 1456826038, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-01'),
	(6, 'u15sou3lb29c5mro2vgrahugu3', 1456826115, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-01'),
	(7, 'n6971v5af3kbrmve3g0hhnh6i2', 1456830148, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Trident/7.0; rv:11.0)', '2016-03-01'),
	(8, 'athrmehegvarha5g2h2igoorc2', 1456857824, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-01'),
	(9, 'nra8eeqgb9t2uatm42d4fr2mr4', 1456927765, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-02'),
	(10, '11ml11mraqjrk9boluapoqlau7', 1456977971, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-03'),
	(11, '6217tfbqb6dek1aef4u616uha5', 1456977972, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-03'),
	(12, 'oojpfp5bgmggtjknupef2094q3', 1457061719, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-04'),
	(13, 'ufe6ipna8isig4f1j8pa64n0q0', 1457061720, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-04'),
	(14, 'j0s6euuvb5cthjqrrj3sj6pi97', 1457087447, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-04'),
	(15, 'v9n5hb1fliivanpte9pgm80mp5', 1457160920, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-05'),
	(16, 'upjtit7vu5p0db6hrmr4mfp5m2', 1457189666, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-05'),
	(17, 'j3egjmm0shrdmgpomvoncoc3d7', 1457246392, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-06'),
	(18, 'h6me5m2lj64uga2thqd24cdh74', 1457502114, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-09'),
	(19, '63a6idp353am4dvjfknu3dksk0', 1457522637, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-09'),
	(20, '0s5so7pvogve8i5lp9nqtsgq97', 1457542143, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-09'),
	(21, '25r22h8hal3rbqj7lfggevs4m3', 1457542641, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-09'),
	(22, 'n8edt08aut5449eoehamf60l21', 1457543311, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-09'),
	(23, 'igv6kb9l52tqeofg1b21jt66r6', 1457579200, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-10'),
	(24, 'fj65aursh80vqe3f3aarrijcj4', 1457580682, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-10'),
	(25, 'r0vrorb37asvmaqapqfqs7hdd2', 1457581555, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-10'),
	(26, 'ir8k2j5s84kmevpqnk6nu0mr66', 1457581850, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-10'),
	(27, 'ghpgnejg26es9l3dijkp1dc5p5', 1457582605, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-10'),
	(28, 'sb08aqlu1vmav0vsg3tjqi9686', 1457582715, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-10'),
	(29, 'jr75cu5jfmsvgm2nels1nukr82', 1457604875, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-10'),
	(30, 'op7fgfpu8lutmmvjogdacrpg77', 1457624257, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-10'),
	(31, 'ftapl0k0q554r0gfl0ljqd1ci6', 1457928426, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-14'),
	(32, '4jpn482mdk9dc0utp5k3jjtoe0', 1457928427, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-14'),
	(33, 'qaqgnilb2vleja1gfclc96vii6', 1457936959, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-14'),
	(34, 'vdvvvvl538j5lkvotr60a2h9g2', 1457956744, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-14'),
	(35, 'ktnumkqu68mbbf0u8nonbn1ej3', 1457962239, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-14'),
	(36, 's2mqpmio4t9g7omj78t9khurb4', 1457962758, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-14'),
	(37, '60agnncgn5r5gj0eo26hiqikg0', 1457967981, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-14'),
	(38, '5fctj754v0p82qkhuvnese0ne0', 1457968254, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-14'),
	(39, '0c1dbegjtv7d061o2su2rpr2p2', 1457968820, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-14'),
	(40, 'poenm4ui9bu5hge9ei1rti7md5', 1457971110, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-14'),
	(41, '2auuh22bt0vrg3n4bm51n27lu0', 1457971184, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-14'),
	(42, '06l5aqmh0b54r14g0begde1p25', 1457972434, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-14'),
	(43, '569i5e4s5oq0aef69lf0b87eg3', 1457974717, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-14'),
	(44, 'f3trnllaf4ju07e1nepgpbean4', 1457975380, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-14'),
	(45, '7jmfq3k12vthq6anep0dh3av56', 1458024787, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-15'),
	(46, '4m83pors4kn4qon8sto4964fr4', 1458025610, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-15'),
	(47, '2lu71cr6tefh78a4qikitv3pm2', 1458026089, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-15'),
	(48, 'tccac13jsag6dhukea2n8jhdh1', 1458184443, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-17'),
	(49, 'jrtttilad1bbu0rfhjg6kamn54', 1458197484, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-17'),
	(50, 'ou0a403o6e3l4u4ogb7lfvrso2', 1458213584, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-17'),
	(51, 'i1fnihddupc3l10uc0ftllr612', 1458215656, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-17'),
	(52, 'r48ga6i92r1as5sb3o4pj0fqd6', 1458215656, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-17'),
	(53, '7c069ghvrkslu7vrjkk9nafnl1', 1458218271, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-17'),
	(54, '11tqef9oi2c32fjmr9vfq523m2', 1458219755, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-17'),
	(55, 'v4it7rsl72quq4bvlm68kmauj3', 1458236974, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-17'),
	(56, '68jeh3us3bjt5r2doju7q56uf4', 1458237218, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-17'),
	(57, 'v4it7rsl72quq4bvlm68kmauj3', 1458239202, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-17'),
	(58, '9taac909nttrhusdn9onngrng4', 1458267457, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-18'),
	(59, '2g4u834q03mdbq4kfnpnga5ge1', 1458300153, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '2016-03-18'),
	(60, 'rg0fkioe4jvnu0gk2o33g8h6b3', 1529466772, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', '2018-06-20'),
	(61, '65ch2o2a8og3745vc7ipbffd42', 1530086971, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', '2018-06-27'),
	(62, '0p530uucn3589u9r0gdmrtrvs0', 1530773684, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', '2018-07-05');
/*!40000 ALTER TABLE `visiter` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
