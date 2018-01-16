-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 16, 2018 lúc 02:09 PM
-- Phiên bản máy phục vụ: 10.1.26-MariaDB
-- Phiên bản PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tuyendung`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `abouts`
--

CREATE TABLE `abouts` (
  `id_about` int(255) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `social` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `abouts`
--

INSERT INTO `abouts` (`id_about`, `title`, `detail`, `social`, `created_at`, `updated_at`) VALUES
(1, 'Liên hệ', '<p>-34/145 K82 Nguyễn Lương Bằng, Li&ecirc;n Chiểu, Đ&agrave; Nằng</p>\r\n\r\n<p>- VP Hồ Ch&iacute; Minh: Lầu 6 T&ograve;a nh&agrave; Thịnh Ph&aacute;t - 178/8 Đường D1, Phường 25, Quận B&igrave;nh Thạnh, TP Hồ Ch&iacute; Minh</p>\r\n\r\n<p>- VP H&agrave; Nội: Tầng 6, T&ograve;a Nh&agrave; Viện C&ocirc;ng Nghệ - 25 Vũ Ngọc Phan, Phường L&aacute;ng Hạ, Quận Đống Đa, TP H&agrave; Nội</p>\r\n\r\n<p>&nbsp;</p>', 0, '2017-12-27 05:14:41', '2018-01-13 11:53:54'),
(2, 'Giờ mở cửa', '7h Sáng- 17h Chiều từ thứ 2-thứ 6\n7h Sáng- 19h30\' Chiều vào chủ nhật', 0, '2017-12-27 05:14:41', '2017-12-27 05:14:41'),
(3, 'Số điện thoại', '0978262380', 0, '2017-12-27 05:14:41', '2017-12-27 05:14:41'),
(4, 'email', 'tramnhien4420@gmail.com', 1, '2017-12-27 05:14:41', '2018-01-07 10:49:49'),
(5, 'google', 'https://www.google.com.vn/5', 1, '2017-12-27 05:14:41', '2018-01-07 10:39:30'),
(6, 'facebook', 'https://vi-vn.facebook.com/', 1, '2017-12-27 05:14:41', '2017-12-27 05:14:41'),
(7, 'twitter', 'https://twitter.com/?lang=vi', 1, '2017-12-27 05:14:41', '2017-12-27 05:14:41'),
(8, 'youtube', '<p>https://www.youtube.com/?gl=VN</p>', 1, '2017-12-27 05:14:41', '2018-01-13 12:30:57'),
(9, 'Điều khoản cho ứng viên', '<p>1. Trung thực với th&ocirc;ng tin đăng k&yacute;.</p>\r\n\r\n<p>2. Kh&ocirc;ng c&oacute; c&aacute;c h&agrave;nh động cố &yacute; ph&aacute; hoại website</p>', 0, '2018-01-05 18:09:35', '2018-01-13 11:48:12'),
(10, 'Điều khoản cho công ty/doanh nghiệp', '<p>1. Trung thực với th&ocirc;ng tin đăng k&yacute;.</p>\r\n\r\n<p>2. Kh&ocirc;ng c&oacute; c&aacute;c h&agrave;nh động cố &yacute; ph&aacute; hoại website</p>\r\n\r\n<p>3.vv</p>', 0, '2018-01-05 18:09:35', '2018-01-13 12:31:29'),
(11, 'pinterest', '<p>https://www.youtube.com/?gl=VN</p>', 1, '2017-12-27 05:14:41', '2018-01-13 12:30:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `advs`
--

CREATE TABLE `advs` (
  `id_adv` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slice` int(1) NOT NULL,
  `active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `advs`
--

INSERT INTO `advs` (`id_adv`, `name`, `picture`, `link`, `slice`, `active`, `created_at`, `updated_at`) VALUES
(2, 'FPt', 'fXZObyii5ejdCJyWBwxR3YuL5yrDrVvffnGZgf9c.jpeg', 'http://tuyendung.dung:8081/admin/adv/add', 1, 1, '2018-01-07 11:38:01', '2018-01-07 18:53:35'),
(10, 'http://tuyendung.dung:8081/admin/adv/edit/10', '7IsF65nyT8hOrnHkucP9TOUnpKtDaH3vIHL7OAQS.jpeg', 'http://tuyendung.dung:8081/admin/adv/add', 0, 0, '2018-01-07 12:30:03', '2018-01-07 18:51:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(255) NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `job_id` int(255) NOT NULL,
  `parent_id` int(255) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id_comment`, `fullname`, `email`, `job_id`, `parent_id`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 0, 'd', 0, '2018-01-15 06:35:32', '2018-01-15 06:35:32'),
(2, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 0, 'bv', 0, '2018-01-15 06:36:42', '2018-01-15 06:36:42'),
(3, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 0, 'dung', 0, '2018-01-15 06:38:02', '2018-01-15 06:38:02'),
(4, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 0, 'hjj', 0, '2018-01-15 06:38:52', '2018-01-15 06:38:52'),
(5, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 0, 'bbb', 0, '2018-01-15 06:41:38', '2018-01-15 06:41:38'),
(6, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 0, 'nnnnnnnnnnnn', 0, '2018-01-15 06:42:28', '2018-01-15 06:42:28'),
(7, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 0, 'b', 0, '2018-01-15 06:43:46', '2018-01-15 06:43:46'),
(8, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 7, 'b', 0, '2018-01-15 06:43:51', '2018-01-15 06:43:51'),
(9, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 7, 'bm', 0, '2018-01-15 06:43:55', '2018-01-15 06:43:55'),
(10, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 7, 'b', 0, '2018-01-15 06:47:23', '2018-01-15 06:47:23'),
(11, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 7, 'b', 0, '2018-01-15 06:47:25', '2018-01-15 06:47:25'),
(12, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 0, 'bb', 0, '2018-01-15 06:50:26', '2018-01-15 06:50:26'),
(13, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 12, 'v', 0, '2018-01-15 06:50:29', '2018-01-15 06:50:29'),
(14, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 12, 'v', 0, '2018-01-15 06:51:53', '2018-01-15 06:51:53'),
(15, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 12, 'b', 0, '2018-01-15 06:53:19', '2018-01-15 06:53:19'),
(16, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 12, 'bb', 0, '2018-01-15 06:56:28', '2018-01-15 06:56:28'),
(17, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 0, 'nnnn', 0, '2018-01-15 06:57:38', '2018-01-15 06:57:38'),
(18, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 17, 'ghhhhh', 0, '2018-01-15 06:57:52', '2018-01-15 06:57:52'),
(19, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 12, 'bbbbbbbbbb', 0, '2018-01-15 06:58:02', '2018-01-15 06:58:02'),
(20, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 12, 'sg', 0, '2018-01-15 07:05:09', '2018-01-15 07:05:09'),
(21, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 12, 'gggggggg', 0, '2018-01-15 07:07:02', '2018-01-15 07:07:02'),
(22, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 17, 'nnnnnnnnnn', 0, '2018-01-15 07:08:29', '2018-01-15 07:08:29'),
(23, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 17, 'd', 0, '2018-01-15 07:10:48', '2018-01-15 07:10:48'),
(24, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 17, 'bbbbbbbbbbbbbbb', 0, '2018-01-15 07:11:28', '2018-01-15 07:11:28'),
(25, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 17, 'bbbbbbbbbbbbbbb', 0, '2018-01-15 07:12:28', '2018-01-15 07:12:28'),
(26, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 4, 'vvv', 0, '2018-01-15 07:13:14', '2018-01-15 07:13:14'),
(27, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 4, 'vvv', 0, '2018-01-15 07:14:26', '2018-01-15 07:14:26'),
(28, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 2, 'bbbbbbbbbbb', 0, '2018-01-15 07:14:34', '2018-01-15 07:14:34'),
(29, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 2, 'hkkl', 0, '2018-01-15 07:15:35', '2018-01-15 07:15:35'),
(30, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 5, 'ffffffffff', 0, '2018-01-15 07:16:13', '2018-01-15 07:16:13'),
(31, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 5, 'ffffffffffbbbbbb', 0, '2018-01-15 07:16:44', '2018-01-15 07:16:44'),
(32, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 0, 'vvvvvvvvvvv', 0, '2018-01-15 07:17:12', '2018-01-15 07:17:12'),
(33, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 32, 'vvvvvvvvvvvvvvvvvvv', 0, '2018-01-15 07:17:17', '2018-01-15 07:17:17'),
(34, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 0, 'vvvvvvvvvv', 0, '2018-01-15 07:18:10', '2018-01-15 07:18:10'),
(35, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 0, 'fffffffffffff', 0, '2018-01-15 07:19:04', '2018-01-15 07:19:04'),
(36, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 35, 'ggggggggggg', 0, '2018-01-15 07:19:08', '2018-01-15 07:19:08'),
(37, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 0, 'v', 0, '2018-01-15 07:22:02', '2018-01-15 07:22:02'),
(38, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 37, 'v', 0, '2018-01-15 07:22:05', '2018-01-15 07:22:05'),
(39, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 0, 'v', 0, '2018-01-15 07:23:07', '2018-01-15 07:23:07'),
(40, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 39, 'c', 0, '2018-01-15 07:23:14', '2018-01-15 07:23:14'),
(41, 'd', 'a@gmail.com', 3, 0, 'a', 0, '2018-01-15 07:24:50', '2018-01-15 07:24:50'),
(42, 'a', 'dieuhang091095@gmail.com', 3, 41, 's', 0, '2018-01-15 07:24:58', '2018-01-15 07:24:58'),
(43, 'saaaaaaaaa', 's@gmail', 3, 41, 's', 0, '2018-01-15 07:25:04', '2018-01-15 07:25:04'),
(44, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 0, 'vvvvvvvvv', 0, '2018-01-15 07:26:03', '2018-01-15 07:26:03'),
(45, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 44, 'v', 0, '2018-01-15 07:26:10', '2018-01-15 07:26:10'),
(46, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 44, 'v', 0, '2018-01-15 07:26:13', '2018-01-15 07:26:13'),
(47, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 44, 'vvv', 0, '2018-01-15 07:26:25', '2018-01-15 07:26:25'),
(48, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 0, 'd', 0, '2018-01-15 07:26:32', '2018-01-15 07:26:32'),
(49, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 48, 'd', 0, '2018-01-15 07:26:35', '2018-01-15 07:26:35'),
(50, 'FPT Software Đà Nẵng', 'fpt@gmail.com', 3, 48, 'd', 0, '2018-01-15 07:26:37', '2018-01-15 07:26:37'),
(51, 'Huỳnh Hồng Phúc', 'phuc@gmail.com', 5, 0, 'tôi thích công việc này', 0, '2018-01-15 17:03:48', '2018-01-15 17:03:48'),
(52, 'Huỳnh Hồng Phúc', 'phuc@gmail.com', 3, 0, 'khoan', 0, '2018-01-16 03:52:09', '2018-01-16 03:52:09'),
(53, 'Huỳnh Hồng Phúc', 'phuc@gmail.com', 3, 52, 'ssss', 0, '2018-01-16 03:52:14', '2018-01-16 03:52:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id_contact` int(255) NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rep_id` int(255) NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `parent_id` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id_contact`, `fullname`, `email`, `rep_id`, `subject`, `content`, `status`, `parent_id`, `created_at`, `updated_at`) VALUES
(2, 'dung', 'dung@gmail.com', 1, 'đề nghị', 'abc test', 0, 0, '2018-01-15 05:33:56', '2018-01-15 05:33:56'),
(3, 'abcd', 'abcd@gmail.com', 1, 'bcda', 'cbdx', 0, 0, '2018-01-15 05:34:44', '2018-01-15 05:34:44'),
(4, 'vc', 'customer@gmail.com', 1, 'c', 'c', 0, 0, '2018-01-15 05:35:09', '2018-01-15 05:35:09'),
(5, 'mai', 'mail@gmail.com', 1, '12345', '111111111111111', 0, 0, '2018-01-15 05:51:25', '2018-01-15 05:51:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_companies`
--

CREATE TABLE `detail_companies` (
  `id_company` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `size` int(255) DEFAULT NULL,
  `preview` text COLLATE utf8_unicode_ci,
  `detail` text COLLATE utf8_unicode_ci,
  `benifit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `feature` int(1) NOT NULL,
  `reader` int(255) NOT NULL,
  `liked` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detail_companies`
--

INSERT INTO `detail_companies` (`id_company`, `user_id`, `size`, `preview`, `detail`, `benifit`, `feature`, `reader`, `liked`, `created_at`, `updated_at`) VALUES
(1, 21, 220, '<p>Sau 10 năm hoạt động (Từ 13/08/2005), FPT Software Đ&agrave; Nẵng đ&atilde; kh&ocirc;ng ngừng lớn mạnh v&agrave; trở th&agrave;nh c&ocirc;ng ty c&ocirc;ng nghệ th&ocirc;ng tin c&oacute; quy m&ocirc; lớn nhất miền Trung. Ng&agrave;y 13/8/2016, đơn vị đ&atilde; tổ chức lễ kỷ niệm 10 năm th&agrave;nh lập với sự tham dự của 1500 nh&acirc;n vi&ecirc;n v&agrave; c&aacute;c l&atilde;nh đạo cấp cao, bạn b&egrave; đối t&aacute;c. Năm 2016, chi nh&aacute;nh tiếp tục kh&aacute;nh th&agrave;nh khu l&agrave;m việc mới FPT&nbsp;Complex, c&ocirc;ng tr&igrave;nh phức ti&ecirc;u chuẩn quốc tế&nbsp;tại Khu đ&ocirc; thị FPT City. Năm 2020, Đ&agrave; Nẵng sẽ hướng tới mục ti&ecirc;u đạt 10.000 người với doanh số ~ 170M USD.</p>\r\n\r\n<p>Trong mấy năm qua, FPT Software Đ&agrave; Nẵng l&agrave; đơn vị c&oacute; tốc độ tăng trưởng cao nhất, sự tăng trưởng l&agrave;m n&ecirc;n cơ hội lớn cho c&aacute;c c&aacute; nh&acirc;n. Xuất th&acirc;n từ những lập tr&igrave;nh vi&ecirc;n, Đ&agrave; Nẵng c&oacute; Gi&aacute;m đốc đơn vị phần mềm chiến lược số 17 L&ecirc; Vĩnh Th&agrave;nh thế hệ 8x &ndash; nằm trong những l&atilde;nh đạo trẻ nhất tập đo&agrave;n hay rất nhiều bạn trẻ đ&atilde; nắm giữ c&aacute;c vị tr&iacute; chủ chốt như Gi&aacute;m đốc đơn vị phần mềm chiến lược như L&ecirc; Xu&acirc;n Lộc, L&ecirc; Hồng Lĩnh,&hellip;</p>', '<p>Sau khi vượt qua những năm đầu kh&oacute; khăn của xuất khẩu phần mềm, FSO bắt đầu tự tin t&igrave;m c&aacute;ch mở th&ecirc;m chi nh&aacute;nh để khai th&aacute;c c&aacute;c nguồn lực CNTT nước nh&agrave;. &Yacute; tưởng mở chi nh&aacute;nh tại miền Trung đ&atilde; đến từ kh&aacute; sớm, tuy nhi&ecirc;n Đ&agrave; Nẵng đối với người FPT vẫn l&agrave; một ẩn số. So với chi nh&aacute;nh tại HCM tuy khai trương đầu năm 2004 nhưng thực tế th&igrave; FSO đ&atilde; c&oacute; mặt &amp; l&agrave;m việc tại HCM từ sớm hơn nhiều v&agrave; bản th&acirc;n FPT cũng đ&atilde; c&oacute; mặt tại HCM từ những năm 90 th&igrave; Đ&agrave; Nẵng vẫn l&agrave; v&ugrave;ng đất chưa được khai ph&aacute;. Th&aacute;ng 8/2004 anh CanhBT đ&atilde; tham gia khai trương chi nh&aacute;nh FPT tại Đ&agrave; Nẵng v&agrave; đặt quyết t&acirc;m sẽ x&acirc;y dựng cơ sở của FSO tại đ&acirc;y.</p>\r\n\r\n<p>Nh&igrave;n lại lịch sử 10 năm của FPT Software Đ&agrave; Nẵng, GĐ FPT Software Đ&agrave; Nẵng Nguyễn Tuấn Phương b&agrave;y tỏ:&nbsp;<em>&ldquo;10 năm trước đ&acirc;y, FPT Software Đ&agrave; Nẵng ch&iacute;nh thức được th&agrave;nh lập. Thời ban đầu, nơi đ&acirc;y cũng giống như một l&agrave;ng ch&agrave;i nhưng FPT Software Đ&agrave; Nẵng đ&atilde; thực sự th&agrave;nh c&ocirc;ng v&agrave; vươn ra biển lớn. Để đạt được kết quả như ng&agrave;y h&ocirc;m nay, đơn vị đ&atilde; phải vượt qua rất nhiều kh&oacute; khăn v&agrave; thử th&aacute;ch. Do đ&oacute;, t&ocirc;i c&oacute; một niềm tin ch&aacute;y bỏng rằng, FPT Software Đ&agrave; Nẵng sẽ th&agrave;nh c&ocirc;ng v&agrave; ng&agrave;y c&agrave;ng th&agrave;nh c&ocirc;ng hơn nữa. Trong lễ kỷ niệm 10 năm th&agrave;nh lập, t&ocirc;i xin gửi lời tri &acirc;n tới c&aacute;c bạn đồng nghiệp, 1.500 người đang ngồi tại đ&acirc;y hay đi c&ocirc;ng t&aacute;c tại c&aacute;c nước tr&ecirc;n thế giới, những người ng&agrave;y đ&ecirc;m lu&ocirc;n đ&oacute;ng g&oacute;p cho sự ph&aacute;t triển chung của đơn vị. T&ocirc;i cũng gửi lời cảm ơn tới c&aacute;c đơn vị anh em, đối t&aacute;c v&agrave; kh&aacute;ch h&agrave;ng&rdquo;.&nbsp;</em></p>', 'du lịch', 1, 15, 3, '2018-01-06 16:15:48', '2018-01-15 02:54:20'),
(4, 29, 555, '<p>lương th&aacute;ng 13, Du lịch h&agrave;ng năm</p>', '<p>lương th&aacute;ng 13, Du lịch h&agrave;ng năm</p>', 'lương tháng 13, Du lịch hàng năm', 1, 10, 16, '2018-01-09 13:40:50', '2018-01-09 14:53:33'),
(5, 37, NULL, NULL, NULL, NULL, 0, 0, 0, '2018-01-13 10:58:42', '2018-01-13 10:58:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `districts`
--

CREATE TABLE `districts` (
  `id_district` int(255) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `districts`
--

INSERT INTO `districts` (`id_district`, `name`, `type`, `province_id`) VALUES
(1, 'Ba Đình', 'Quận', 1),
(2, 'Hoàn Kiếm', 'Quận', 1),
(3, 'Tây Hồ', 'Quận', 1),
(4, 'Long Biên', 'Quận', 1),
(5, 'Cầu Giấy', 'Quận', 1),
(6, 'Đống Đa', 'Quận', 1),
(7, 'Hai Bà Trưng', 'Quận', 1),
(8, 'Hoàng Mai', 'Quận', 1),
(9, 'Thanh Xuân', 'Quận', 1),
(16, 'Sóc Sơn', 'Huyện', 1),
(17, 'Đông Anh', 'Huyện', 1),
(18, 'Gia Lâm', 'Huyện', 1),
(19, 'Từ Liêm', 'Huyện', 1),
(20, 'Thanh Trì', 'Huyện', 1),
(24, 'Hà Giang', 'Thị Xã', 2),
(26, 'Đồng Văn', 'Huyện', 2),
(27, 'Mèo Vạc', 'Huyện', 2),
(28, 'Yên Minh', 'Huyện', 2),
(29, 'Quản Bạ', 'Huyện', 2),
(30, 'Vị Xuyên', 'Huyện', 2),
(31, 'Bắc Mê', 'Huyện', 2),
(32, 'Hoàng Su Phì', 'Huyện', 2),
(33, 'Xín Mần', 'Huyện', 2),
(34, 'Bắc Quang', 'Huyện', 2),
(35, 'Quang Bình', 'Huyện', 2),
(40, 'Cao Bằng', 'Thị Xã', 4),
(42, 'Bảo Lâm', 'Huyện', 4),
(43, 'Bảo Lạc', 'Huyện', 4),
(44, 'Thông Nông', 'Huyện', 4),
(45, 'Hà Quảng', 'Huyện', 4),
(46, 'Trà Lĩnh', 'Huyện', 4),
(47, 'Trùng Khánh', 'Huyện', 4),
(48, 'Hạ Lang', 'Huyện', 4),
(49, 'Quảng Uyên', 'Huyện', 4),
(50, 'Phục Hoà', 'Huyện', 4),
(51, 'Hoà An', 'Huyện', 4),
(52, 'Nguyên Bình', 'Huyện', 4),
(53, 'Thạch An', 'Huyện', 4),
(58, 'Bắc Kạn', 'Thị Xã', 6),
(60, 'Pác Nặm', 'Huyện', 6),
(61, 'Ba Bể', 'Huyện', 6),
(62, 'Ngân Sơn', 'Huyện', 6),
(63, 'Bạch Thông', 'Huyện', 6),
(64, 'Chợ Đồn', 'Huyện', 6),
(65, 'Chợ Mới', 'Huyện', 6),
(66, 'Na Rì', 'Huyện', 6),
(70, 'Tuyên Quang', 'Thị Xã', 8),
(72, 'Nà Hang', 'Huyện', 8),
(73, 'Chiêm Hóa', 'Huyện', 8),
(74, 'Hàm Yên', 'Huyện', 8),
(75, 'Yên Sơn', 'Huyện', 8),
(76, 'Sơn Dương', 'Huyện', 8),
(80, 'Lào Cai', 'Thành Phố', 10),
(82, 'Bát Xát', 'Huyện', 10),
(83, 'Mường Khương', 'Huyện', 10),
(84, 'Si Ma Cai', 'Huyện', 10),
(85, 'Bắc Hà', 'Huyện', 10),
(86, 'Bảo Thắng', 'Huyện', 10),
(87, 'Bảo Yên', 'Huyện', 10),
(88, 'Sa Pa', 'Huyện', 10),
(89, 'Văn Bàn', 'Huyện', 10),
(94, 'Điện Biên Phủ', 'Thành Phố', 11),
(95, 'Mường Lay', 'Thị Xã', 11),
(96, 'Mường Nhé', 'Huyện', 11),
(97, 'Mường Chà', 'Huyện', 11),
(98, 'Tủa Chùa', 'Huyện', 11),
(99, 'Tuần Giáo', 'Huyện', 11),
(100, 'Điện Biên', 'Huyện', 11),
(101, 'Điện Biên Đông', 'Huyện', 11),
(102, 'Mường Ảng', 'Huyện', 11),
(104, 'Lai Châu', 'Thị Xã', 12),
(106, 'Tam Đường', 'Huyện', 12),
(107, 'Mường Tè', 'Huyện', 12),
(108, 'Sìn Hồ', 'Huyện', 12),
(109, 'Phong Thổ', 'Huyện', 12),
(110, 'Than Uyên', 'Huyện', 12),
(111, 'Tân Uyên', 'Huyện', 12),
(116, 'Sơn La', 'Thành Phố', 14),
(118, 'Quỳnh Nhai', 'Huyện', 14),
(119, 'Thuận Châu', 'Huyện', 14),
(120, 'Mường La', 'Huyện', 14),
(121, 'Bắc Yên', 'Huyện', 14),
(122, 'Phù Yên', 'Huyện', 14),
(123, 'Mộc Châu', 'Huyện', 14),
(124, 'Yên Châu', 'Huyện', 14),
(125, 'Mai Sơn', 'Huyện', 14),
(126, 'Sông Mã', 'Huyện', 14),
(127, 'Sốp Cộp', 'Huyện', 14),
(132, 'Yên Bái', 'Thành Phố', 15),
(133, 'Nghĩa Lộ', 'Thị Xã', 15),
(135, 'Lục Yên', 'Huyện', 15),
(136, 'Văn Yên', 'Huyện', 15),
(137, 'Mù Cang Chải', 'Huyện', 15),
(138, 'Trấn Yên', 'Huyện', 15),
(139, 'Trạm Tấu', 'Huyện', 15),
(140, 'Văn Chấn', 'Huyện', 15),
(141, 'Yên Bình', 'Huyện', 15),
(148, 'Hòa Bình', 'Thành Phố', 17),
(150, 'Đà Bắc', 'Huyện', 17),
(151, 'Kỳ Sơn', 'Huyện', 17),
(152, 'Lương Sơn', 'Huyện', 17),
(153, 'Kim Bôi', 'Huyện', 17),
(154, 'Cao Phong', 'Huyện', 17),
(155, 'Tân Lạc', 'Huyện', 17),
(156, 'Mai Châu', 'Huyện', 17),
(157, 'Lạc Sơn', 'Huyện', 17),
(158, 'Yên Thủy', 'Huyện', 17),
(159, 'Lạc Thủy', 'Huyện', 17),
(164, 'Thái Nguyên', 'Thành Phố', 19),
(165, 'Sông Công', 'Thị Xã', 19),
(167, 'Định Hóa', 'Huyện', 19),
(168, 'Phú Lương', 'Huyện', 19),
(169, 'Đồng Hỷ', 'Huyện', 19),
(170, 'Võ Nhai', 'Huyện', 19),
(171, 'Đại Từ', 'Huyện', 19),
(172, 'Phổ Yên', 'Huyện', 19),
(173, 'Phú Bình', 'Huyện', 19),
(178, 'Lạng Sơn', 'Thành Phố', 20),
(180, 'Tràng Định', 'Huyện', 20),
(181, 'Bình Gia', 'Huyện', 20),
(182, 'Văn Lãng', 'Huyện', 20),
(183, 'Cao Lộc', 'Huyện', 20),
(184, 'Văn Quan', 'Huyện', 20),
(185, 'Bắc Sơn', 'Huyện', 20),
(186, 'Hữu Lũng', 'Huyện', 20),
(187, 'Chi Lăng', 'Huyện', 20),
(188, 'Lộc Bình', 'Huyện', 20),
(189, 'Đình Lập', 'Huyện', 20),
(193, 'Hạ Long', 'Thành Phố', 22),
(194, 'Móng Cái', 'Thành Phố', 22),
(195, 'Cẩm Phả', 'Thị Xã', 22),
(196, 'Uông Bí', 'Thị Xã', 22),
(198, 'Bình Liêu', 'Huyện', 22),
(199, 'Tiên Yên', 'Huyện', 22),
(200, 'Đầm Hà', 'Huyện', 22),
(201, 'Hải Hà', 'Huyện', 22),
(202, 'Ba Chẽ', 'Huyện', 22),
(203, 'Vân Đồn', 'Huyện', 22),
(204, 'Hoành Bồ', 'Huyện', 22),
(205, 'Đông Triều', 'Huyện', 22),
(206, 'Yên Hưng', 'Huyện', 22),
(207, 'Cô Tô', 'Huyện', 22),
(213, 'Bắc Giang', 'Thành Phố', 24),
(215, 'Yên Thế', 'Huyện', 24),
(216, 'Tân Yên', 'Huyện', 24),
(217, 'Lạng Giang', 'Huyện', 24),
(218, 'Lục Nam', 'Huyện', 24),
(219, 'Lục Ngạn', 'Huyện', 24),
(220, 'Sơn Động', 'Huyện', 24),
(221, 'Yên Dũng', 'Huyện', 24),
(222, 'Việt Yên', 'Huyện', 24),
(223, 'Hiệp Hòa', 'Huyện', 24),
(227, 'Việt Trì', 'Thành Phố', 25),
(228, 'Phú Thọ', 'Thị Xã', 25),
(230, 'Đoan Hùng', 'Huyện', 25),
(231, 'Hạ Hoà', 'Huyện', 25),
(232, 'Thanh Ba', 'Huyện', 25),
(233, 'Phù Ninh', 'Huyện', 25),
(234, 'Yên Lập', 'Huyện', 25),
(235, 'Cẩm Khê', 'Huyện', 25),
(236, 'Tam Nông', 'Huyện', 25),
(237, 'Lâm Thao', 'Huyện', 25),
(238, 'Thanh Sơn', 'Huyện', 25),
(239, 'Thanh Thuỷ', 'Huyện', 25),
(240, 'Tân Sơn', 'Huyện', 25),
(243, 'Vĩnh Yên', 'Thành Phố', 26),
(244, 'Phúc Yên', 'Thị Xã', 26),
(246, 'Lập Thạch', 'Huyện', 26),
(247, 'Tam Dương', 'Huyện', 26),
(248, 'Tam Đảo', 'Huyện', 26),
(249, 'Bình Xuyên', 'Huyện', 26),
(250, 'Mê Linh', 'Huyện', 1),
(251, 'Yên Lạc', 'Huyện', 26),
(252, 'Vĩnh Tường', 'Huyện', 26),
(253, 'Sông Lô', 'Huyện', 26),
(256, 'Bắc Ninh', 'Thành Phố', 27),
(258, 'Yên Phong', 'Huyện', 27),
(259, 'Quế Võ', 'Huyện', 27),
(260, 'Tiên Du', 'Huyện', 27),
(261, 'Từ Sơn', 'Thị Xã', 27),
(262, 'Thuận Thành', 'Huyện', 27),
(263, 'Gia Bình', 'Huyện', 27),
(264, 'Lương Tài', 'Huyện', 27),
(268, 'Hà Đông', 'Quận', 1),
(269, 'Sơn Tây', 'Thị Xã', 1),
(271, 'Ba Vì', 'Huyện', 1),
(272, 'Phúc Thọ', 'Huyện', 1),
(273, 'Đan Phượng', 'Huyện', 1),
(274, 'Hoài Đức', 'Huyện', 1),
(275, 'Quốc Oai', 'Huyện', 1),
(276, 'Thạch Thất', 'Huyện', 1),
(277, 'Chương Mỹ', 'Huyện', 1),
(278, 'Thanh Oai', 'Huyện', 1),
(279, 'Thường Tín', 'Huyện', 1),
(280, 'Phú Xuyên', 'Huyện', 1),
(281, 'Ứng Hòa', 'Huyện', 1),
(282, 'Mỹ Đức', 'Huyện', 1),
(288, 'Hải Dương', 'Thành Phố', 30),
(290, 'Chí Linh', 'Huyện', 30),
(291, 'Nam Sách', 'Huyện', 30),
(292, 'Kinh Môn', 'Huyện', 30),
(293, 'Kim Thành', 'Huyện', 30),
(294, 'Thanh Hà', 'Huyện', 30),
(295, 'Cẩm Giàng', 'Huyện', 30),
(296, 'Bình Giang', 'Huyện', 30),
(297, 'Gia Lộc', 'Huyện', 30),
(298, 'Tứ Kỳ', 'Huyện', 30),
(299, 'Ninh Giang', 'Huyện', 30),
(300, 'Thanh Miện', 'Huyện', 30),
(303, 'Hồng Bàng', 'Quận', 31),
(304, 'Ngô Quyền', 'Quận', 31),
(305, 'Lê Chân', 'Quận', 31),
(306, 'Hải An', 'Quận', 31),
(307, 'Kiến An', 'Quận', 31),
(308, 'Đồ Sơn', 'Quận', 31),
(309, 'Kinh Dương', 'Quận', 31),
(311, 'Thuỷ Nguyên', 'Huyện', 31),
(312, 'An Dương', 'Huyện', 31),
(313, 'An Lão', 'Huyện', 31),
(314, 'Kiến Thụy', 'Huyện', 31),
(315, 'Tiên Lãng', 'Huyện', 31),
(316, 'Vĩnh Bảo', 'Huyện', 31),
(317, 'Cát Hải', 'Huyện', 31),
(318, 'Bạch Long Vĩ', 'Huyện', 31),
(323, 'Hưng Yên', 'Thành Phố', 33),
(325, 'Văn Lâm', 'Huyện', 33),
(326, 'Văn Giang', 'Huyện', 33),
(327, 'Yên Mỹ', 'Huyện', 33),
(328, 'Mỹ Hào', 'Huyện', 33),
(329, 'Ân Thi', 'Huyện', 33),
(330, 'Khoái Châu', 'Huyện', 33),
(331, 'Kim Động', 'Huyện', 33),
(332, 'Tiên Lữ', 'Huyện', 33),
(333, 'Phù Cừ', 'Huyện', 33),
(336, 'Thái Bình', 'Thành Phố', 34),
(338, 'Quỳnh Phụ', 'Huyện', 34),
(339, 'Hưng Hà', 'Huyện', 34),
(340, 'Đông Hưng', 'Huyện', 34),
(341, 'Thái Thụy', 'Huyện', 34),
(342, 'Tiền Hải', 'Huyện', 34),
(343, 'Kiến Xương', 'Huyện', 34),
(344, 'Vũ Thư', 'Huyện', 34),
(347, 'Phủ Lý', 'Thành Phố', 35),
(349, 'Duy Tiên', 'Huyện', 35),
(350, 'Kim Bảng', 'Huyện', 35),
(351, 'Thanh Liêm', 'Huyện', 35),
(352, 'Bình Lục', 'Huyện', 35),
(353, 'Lý Nhân', 'Huyện', 35),
(356, 'Nam Định', 'Thành Phố', 36),
(358, 'Mỹ Lộc', 'Huyện', 36),
(359, 'Vụ Bản', 'Huyện', 36),
(360, 'Ý Yên', 'Huyện', 36),
(361, 'Nghĩa Hưng', 'Huyện', 36),
(362, 'Nam Trực', 'Huyện', 36),
(363, 'Trực Ninh', 'Huyện', 36),
(364, 'Xuân Trường', 'Huyện', 36),
(365, 'Giao Thủy', 'Huyện', 36),
(366, 'Hải Hậu', 'Huyện', 36),
(369, 'Ninh Bình', 'Thành Phố', 37),
(370, 'Tam Điệp', 'Thị Xã', 37),
(372, 'Nho Quan', 'Huyện', 37),
(373, 'Gia Viễn', 'Huyện', 37),
(374, 'Hoa Lư', 'Huyện', 37),
(375, 'Yên Khánh', 'Huyện', 37),
(376, 'Kim Sơn', 'Huyện', 37),
(377, 'Yên Mô', 'Huyện', 37),
(380, 'Thanh Hóa', 'Thành Phố', 38),
(381, 'Bỉm Sơn', 'Thị Xã', 38),
(382, 'Sầm Sơn', 'Thị Xã', 38),
(384, 'Mường Lát', 'Huyện', 38),
(385, 'Quan Hóa', 'Huyện', 38),
(386, 'Bá Thước', 'Huyện', 38),
(387, 'Quan Sơn', 'Huyện', 38),
(388, 'Lang Chánh', 'Huyện', 38),
(389, 'Ngọc Lặc', 'Huyện', 38),
(390, 'Cẩm Thủy', 'Huyện', 38),
(391, 'Thạch Thành', 'Huyện', 38),
(392, 'Hà Trung', 'Huyện', 38),
(393, 'Vĩnh Lộc', 'Huyện', 38),
(394, 'Yên Định', 'Huyện', 38),
(395, 'Thọ Xuân', 'Huyện', 38),
(396, 'Thường Xuân', 'Huyện', 38),
(397, 'Triệu Sơn', 'Huyện', 38),
(398, 'Thiệu Hoá', 'Huyện', 38),
(399, 'Hoằng Hóa', 'Huyện', 38),
(400, 'Hậu Lộc', 'Huyện', 38),
(401, 'Nga Sơn', 'Huyện', 38),
(402, 'Như Xuân', 'Huyện', 38),
(403, 'Như Thanh', 'Huyện', 38),
(404, 'Nông Cống', 'Huyện', 38),
(405, 'Đông Sơn', 'Huyện', 38),
(406, 'Quảng Xương', 'Huyện', 38),
(407, 'Tĩnh Gia', 'Huyện', 38),
(412, 'Vinh', 'Thành Phố', 40),
(413, 'Cửa Lò', 'Thị Xã', 40),
(414, 'Thái Hoà', 'Thị Xã', 40),
(415, 'Quế Phong', 'Huyện', 40),
(416, 'Quỳ Châu', 'Huyện', 40),
(417, 'Kỳ Sơn', 'Huyện', 40),
(418, 'Tương Dương', 'Huyện', 40),
(419, 'Nghĩa Đàn', 'Huyện', 40),
(420, 'Quỳ Hợp', 'Huyện', 40),
(421, 'Quỳnh Lưu', 'Huyện', 40),
(422, 'Con Cuông', 'Huyện', 40),
(423, 'Tân Kỳ', 'Huyện', 40),
(424, 'Anh Sơn', 'Huyện', 40),
(425, 'Diễn Châu', 'Huyện', 40),
(426, 'Yên Thành', 'Huyện', 40),
(427, 'Đô Lương', 'Huyện', 40),
(428, 'Thanh Chương', 'Huyện', 40),
(429, 'Nghi Lộc', 'Huyện', 40),
(430, 'Nam Đàn', 'Huyện', 40),
(431, 'Hưng Nguyên', 'Huyện', 40),
(436, 'Hà Tĩnh', 'Thành Phố', 42),
(437, 'Hồng Lĩnh', 'Thị Xã', 42),
(439, 'Hương Sơn', 'Huyện', 42),
(440, 'Đức Thọ', 'Huyện', 42),
(441, 'Vũ Quang', 'Huyện', 42),
(442, 'Nghi Xuân', 'Huyện', 42),
(443, 'Can Lộc', 'Huyện', 42),
(444, 'Hương Khê', 'Huyện', 42),
(445, 'Thạch Hà', 'Huyện', 42),
(446, 'Cẩm Xuyên', 'Huyện', 42),
(447, 'Kỳ Anh', 'Huyện', 42),
(448, 'Lộc Hà', 'Huyện', 42),
(450, 'Đồng Hới', 'Thành Phố', 44),
(452, 'Minh Hóa', 'Huyện', 44),
(453, 'Tuyên Hóa', 'Huyện', 44),
(454, 'Quảng Trạch', 'Huyện', 44),
(455, 'Bố Trạch', 'Huyện', 44),
(456, 'Quảng Ninh', 'Huyện', 44),
(457, 'Lệ Thủy', 'Huyện', 44),
(461, 'Đông Hà', 'Thành Phố', 45),
(462, 'Quảng Trị', 'Thị Xã', 45),
(464, 'Vĩnh Linh', 'Huyện', 45),
(465, 'Hướng Hóa', 'Huyện', 45),
(466, 'Gio Linh', 'Huyện', 45),
(467, 'Đa Krông', 'Huyện', 45),
(468, 'Cam Lộ', 'Huyện', 45),
(469, 'Triệu Phong', 'Huyện', 45),
(470, 'Hải Lăng', 'Huyện', 45),
(471, 'Cồn Cỏ', 'Huyện', 45),
(474, 'Huế', 'Thành Phố', 46),
(476, 'Phong Điền', 'Huyện', 46),
(477, 'Quảng Điền', 'Huyện', 46),
(478, 'Phú Vang', 'Huyện', 46),
(479, 'Hương Thủy', 'Huyện', 46),
(480, 'Hương Trà', 'Huyện', 46),
(481, 'A Lưới', 'Huyện', 46),
(482, 'Phú Lộc', 'Huyện', 46),
(483, 'Nam Đông', 'Huyện', 46),
(490, 'Liên Chiểu', 'Quận', 48),
(491, 'Thanh Khê', 'Quận', 48),
(492, 'Hải Châu', 'Quận', 48),
(493, 'Sơn Trà', 'Quận', 48),
(494, 'Ngũ Hành Sơn', 'Quận', 48),
(495, 'Cẩm Lệ', 'Quận', 48),
(497, 'Hoà Vang', 'Huyện', 48),
(498, 'Hoàng Sa', 'Huyện', 48),
(502, 'Tam Kỳ', 'Thành Phố', 49),
(503, 'Hội An', 'Thành Phố', 49),
(504, 'Tây Giang', 'Huyện', 49),
(505, 'Đông Giang', 'Huyện', 49),
(506, 'Đại Lộc', 'Huyện', 49),
(507, 'Điện Bàn', 'Huyện', 49),
(508, 'Duy Xuyên', 'Huyện', 49),
(509, 'Quế Sơn', 'Huyện', 49),
(510, 'Nam Giang', 'Huyện', 49),
(511, 'Phước Sơn', 'Huyện', 49),
(512, 'Hiệp Đức', 'Huyện', 49),
(513, 'Thăng Bình', 'Huyện', 49),
(514, 'Tiên Phước', 'Huyện', 49),
(515, 'Bắc Trà My', 'Huyện', 49),
(516, 'Nam Trà My', 'Huyện', 49),
(517, 'Núi Thành', 'Huyện', 49),
(518, 'Phú Ninh', 'Huyện', 49),
(519, 'Nông Sơn', 'Huyện', 49),
(522, 'Quảng Ngãi', 'Thành Phố', 51),
(524, 'Bình Sơn', 'Huyện', 51),
(525, 'Trà Bồng', 'Huyện', 51),
(526, 'Tây Trà', 'Huyện', 51),
(527, 'Sơn Tịnh', 'Huyện', 51),
(528, 'Tư Nghĩa', 'Huyện', 51),
(529, 'Sơn Hà', 'Huyện', 51),
(530, 'Sơn Tây', 'Huyện', 51),
(531, 'Minh Long', 'Huyện', 51),
(532, 'Nghĩa Hành', 'Huyện', 51),
(533, 'Mộ Đức', 'Huyện', 51),
(534, 'Đức Phổ', 'Huyện', 51),
(535, 'Ba Tơ', 'Huyện', 51),
(536, 'Lý Sơn', 'Huyện', 51),
(540, 'Qui Nhơn', 'Thành Phố', 52),
(542, 'An Lão', 'Huyện', 52),
(543, 'Hoài Nhơn', 'Huyện', 52),
(544, 'Hoài Ân', 'Huyện', 52),
(545, 'Phù Mỹ', 'Huyện', 52),
(546, 'Vĩnh Thạnh', 'Huyện', 52),
(547, 'Tây Sơn', 'Huyện', 52),
(548, 'Phù Cát', 'Huyện', 52),
(549, 'An Nhơn', 'Huyện', 52),
(550, 'Tuy Phước', 'Huyện', 52),
(551, 'Vân Canh', 'Huyện', 52),
(555, 'Tuy Hòa', 'Thành Phố', 54),
(557, 'Sông Cầu', 'Thị Xã', 54),
(558, 'Đồng Xuân', 'Huyện', 54),
(559, 'Tuy An', 'Huyện', 54),
(560, 'Sơn Hòa', 'Huyện', 54),
(561, 'Sông Hinh', 'Huyện', 54),
(562, 'Tây Hoà', 'Huyện', 54),
(563, 'Phú Hoà', 'Huyện', 54),
(564, 'Đông Hoà', 'Huyện', 54),
(568, 'Nha Trang', 'Thành Phố', 56),
(569, 'Cam Ranh', 'Thị Xã', 56),
(570, 'Cam Lâm', 'Huyện', 56),
(571, 'Vạn Ninh', 'Huyện', 56),
(572, 'Ninh Hòa', 'Huyện', 56),
(573, 'Khánh Vĩnh', 'Huyện', 56),
(574, 'Diên Khánh', 'Huyện', 56),
(575, 'Khánh Sơn', 'Huyện', 56),
(576, 'Trường Sa', 'Huyện', 56),
(582, 'Phan Rang-Tháp Chàm', 'Thành Phố', 58),
(584, 'Bác Ái', 'Huyện', 58),
(585, 'Ninh Sơn', 'Huyện', 58),
(586, 'Ninh Hải', 'Huyện', 58),
(587, 'Ninh Phước', 'Huyện', 58),
(588, 'Thuận Bắc', 'Huyện', 58),
(589, 'Thuận Nam', 'Huyện', 58),
(593, 'Phan Thiết', 'Thành Phố', 60),
(594, 'La Gi', 'Thị Xã', 60),
(595, 'Tuy Phong', 'Huyện', 60),
(596, 'Bắc Bình', 'Huyện', 60),
(597, 'Hàm Thuận Bắc', 'Huyện', 60),
(598, 'Hàm Thuận Nam', 'Huyện', 60),
(599, 'Tánh Linh', 'Huyện', 60),
(600, 'Đức Linh', 'Huyện', 60),
(601, 'Hàm Tân', 'Huyện', 60),
(602, 'Phú Quí', 'Huyện', 60),
(608, 'Kon Tum', 'Thành Phố', 62),
(610, 'Đắk Glei', 'Huyện', 62),
(611, 'Ngọc Hồi', 'Huyện', 62),
(612, 'Đắk Tô', 'Huyện', 62),
(613, 'Kon Plông', 'Huyện', 62),
(614, 'Kon Rẫy', 'Huyện', 62),
(615, 'Đắk Hà', 'Huyện', 62),
(616, 'Sa Thầy', 'Huyện', 62),
(617, 'Tu Mơ Rông', 'Huyện', 62),
(622, 'Pleiku', 'Thành Phố', 64),
(623, 'An Khê', 'Thị Xã', 64),
(624, 'Ayun Pa', 'Thị Xã', 64),
(625, 'Kbang', 'Huyện', 64),
(626, 'Đăk Đoa', 'Huyện', 64),
(627, 'Chư Păh', 'Huyện', 64),
(628, 'Ia Grai', 'Huyện', 64),
(629, 'Mang Yang', 'Huyện', 64),
(630, 'Kông Chro', 'Huyện', 64),
(631, 'Đức Cơ', 'Huyện', 64),
(632, 'Chư Prông', 'Huyện', 64),
(633, 'Chư Sê', 'Huyện', 64),
(634, 'Đăk Pơ', 'Huyện', 64),
(635, 'Ia Pa', 'Huyện', 64),
(637, 'Krông Pa', 'Huyện', 64),
(638, 'Phú Thiện', 'Huyện', 64),
(639, 'Chư Pưh', 'Huyện', 64),
(643, 'Buôn Ma Thuột', 'Thành Phố', 66),
(644, 'Buôn Hồ', 'Thị Xã', 66),
(645, 'Ea H\'leo', 'Huyện', 66),
(646, 'Ea Súp', 'Huyện', 66),
(647, 'Buôn Đôn', 'Huyện', 66),
(648, 'Cư M\'gar', 'Huyện', 66),
(649, 'Krông Búk', 'Huyện', 66),
(650, 'Krông Năng', 'Huyện', 66),
(651, 'Ea Kar', 'Huyện', 66),
(652, 'M\'đrắk', 'Huyện', 66),
(653, 'Krông Bông', 'Huyện', 66),
(654, 'Krông Pắc', 'Huyện', 66),
(655, 'Krông A Na', 'Huyện', 66),
(656, 'Lắk', 'Huyện', 66),
(657, 'Cư Kuin', 'Huyện', 66),
(660, 'Gia Nghĩa', 'Thị Xã', 67),
(661, 'Đắk Glong', 'Huyện', 67),
(662, 'Cư Jút', 'Huyện', 67),
(663, 'Đắk Mil', 'Huyện', 67),
(664, 'Krông Nô', 'Huyện', 67),
(665, 'Đắk Song', 'Huyện', 67),
(666, 'Đắk R\'lấp', 'Huyện', 67),
(667, 'Tuy Đức', 'Huyện', 67),
(672, 'Đà Lạt', 'Thành Phố', 68),
(673, 'Bảo Lộc', 'Thị Xã', 68),
(674, 'Đam Rông', 'Huyện', 68),
(675, 'Lạc Dương', 'Huyện', 68),
(676, 'Lâm Hà', 'Huyện', 68),
(677, 'Đơn Dương', 'Huyện', 68),
(678, 'Đức Trọng', 'Huyện', 68),
(679, 'Di Linh', 'Huyện', 68),
(680, 'Bảo Lâm', 'Huyện', 68),
(681, 'Đạ Huoai', 'Huyện', 68),
(682, 'Đạ Tẻh', 'Huyện', 68),
(683, 'Cát Tiên', 'Huyện', 68),
(688, 'Phước Long', 'Thị Xã', 70),
(689, 'Đồng Xoài', 'Thị Xã', 70),
(690, 'Bình Long', 'Thị Xã', 70),
(691, 'Bù Gia Mập', 'Huyện', 70),
(692, 'Lộc Ninh', 'Huyện', 70),
(693, 'Bù Đốp', 'Huyện', 70),
(694, 'Hớn Quản', 'Huyện', 70),
(695, 'Đồng Phù', 'Huyện', 70),
(696, 'Bù Đăng', 'Huyện', 70),
(697, 'Chơn Thành', 'Huyện', 70),
(703, 'Tây Ninh', 'Thị Xã', 72),
(705, 'Tân Biên', 'Huyện', 72),
(706, 'Tân Châu', 'Huyện', 72),
(707, 'Dương Minh Châu', 'Huyện', 72),
(708, 'Châu Thành', 'Huyện', 72),
(709, 'Hòa Thành', 'Huyện', 72),
(710, 'Gò Dầu', 'Huyện', 72),
(711, 'Bến Cầu', 'Huyện', 72),
(712, 'Trảng Bàng', 'Huyện', 72),
(718, 'Thủ Dầu Một', 'Thị Xã', 74),
(720, 'Dầu Tiếng', 'Huyện', 74),
(721, 'Bến Cát', 'Huyện', 74),
(722, 'Phú Giáo', 'Huyện', 74),
(723, 'Tân Uyên', 'Huyện', 74),
(724, 'Dĩ An', 'Huyện', 74),
(725, 'Thuận An', 'Huyện', 74),
(731, 'Biên Hòa', 'Thành Phố', 75),
(732, 'Long Khánh', 'Thị Xã', 75),
(734, 'Tân Phú', 'Huyện', 75),
(735, 'Vĩnh Cửu', 'Huyện', 75),
(736, 'Định Quán', 'Huyện', 75),
(737, 'Trảng Bom', 'Huyện', 75),
(738, 'Thống Nhất', 'Huyện', 75),
(739, 'Cẩm Mỹ', 'Huyện', 75),
(740, 'Long Thành', 'Huyện', 75),
(741, 'Xuân Lộc', 'Huyện', 75),
(742, 'Nhơn Trạch', 'Huyện', 75),
(747, 'Vũng Tầu', 'Thành Phố', 77),
(748, 'Bà Rịa', 'Thị Xã', 77),
(750, 'Châu Đức', 'Huyện', 77),
(751, 'Xuyên Mộc', 'Huyện', 77),
(752, 'Long Điền', 'Huyện', 77),
(753, 'Đất Đỏ', 'Huyện', 77),
(754, 'Tân Thành', 'Huyện', 77),
(755, 'Côn Đảo', 'Huyện', 77),
(760, '1', 'Quận', 79),
(761, '12', 'Quận', 79),
(762, 'Thủ Đức', 'Quận', 79),
(763, '9', 'Quận', 79),
(764, 'Gò Vấp', 'Quận', 79),
(765, 'Bình Thạnh', 'Quận', 79),
(766, 'Tân Bình', 'Quận', 79),
(767, 'Tân Phú', 'Quận', 79),
(768, 'Phú Nhuận', 'Quận', 79),
(769, '2', 'Quận', 79),
(770, '3', 'Quận', 79),
(771, '10', 'Quận', 79),
(772, '11', 'Quận', 79),
(773, '4', 'Quận', 79),
(774, '5', 'Quận', 79),
(775, '6', 'Quận', 79),
(776, '8', 'Quận', 79),
(777, 'Bình Tân', 'Quận', 79),
(778, '7', 'Quận', 79),
(783, 'Củ Chi', 'Huyện', 79),
(784, 'Hóc Môn', 'Huyện', 79),
(785, 'Bình Chánh', 'Huyện', 79),
(786, 'Nhà Bè', 'Huyện', 79),
(787, 'Cần Giờ', 'Huyện', 79),
(794, 'Tân An', 'Thành Phố', 80),
(796, 'Tân Hưng', 'Huyện', 80),
(797, 'Vĩnh Hưng', 'Huyện', 80),
(798, 'Mộc Hóa', 'Huyện', 80),
(799, 'Tân Thạnh', 'Huyện', 80),
(800, 'Thạnh Hóa', 'Huyện', 80),
(801, 'Đức Huệ', 'Huyện', 80),
(802, 'Đức Hòa', 'Huyện', 80),
(803, 'Bến Lức', 'Huyện', 80),
(804, 'Thủ Thừa', 'Huyện', 80),
(805, 'Tân Trụ', 'Huyện', 80),
(806, 'Cần Đước', 'Huyện', 80),
(807, 'Cần Giuộc', 'Huyện', 80),
(808, 'Châu Thành', 'Huyện', 80),
(815, 'Mỹ Tho', 'Thành Phố', 82),
(816, 'Gò Công', 'Thị Xã', 82),
(818, 'Tân Phước', 'Huyện', 82),
(819, 'Cái Bè', 'Huyện', 82),
(820, 'Cai Lậy', 'Huyện', 82),
(821, 'Châu Thành', 'Huyện', 82),
(822, 'Chợ Gạo', 'Huyện', 82),
(823, 'Gò Công Tây', 'Huyện', 82),
(824, 'Gò Công Đông', 'Huyện', 82),
(825, 'Tân Phú Đông', 'Huyện', 82),
(829, 'Bến Tre', 'Thành Phố', 83),
(831, 'Châu Thành', 'Huyện', 83),
(832, 'Chợ Lách', 'Huyện', 83),
(833, 'Mỏ Cày Nam', 'Huyện', 83),
(834, 'Giồng Trôm', 'Huyện', 83),
(835, 'Bình Đại', 'Huyện', 83),
(836, 'Ba Tri', 'Huyện', 83),
(837, 'Thạnh Phú', 'Huyện', 83),
(838, 'Mỏ Cày Bắc', 'Huyện', 83),
(842, 'Trà Vinh', 'Thị Xã', 84),
(844, 'Càng Long', 'Huyện', 84),
(845, 'Cầu Kè', 'Huyện', 84),
(846, 'Tiểu Cần', 'Huyện', 84),
(847, 'Châu Thành', 'Huyện', 84),
(848, 'Cầu Ngang', 'Huyện', 84),
(849, 'Trà Cú', 'Huyện', 84),
(850, 'Duyên Hải', 'Huyện', 84),
(855, 'Vĩnh Long', 'Thành Phố', 86),
(857, 'Long Hồ', 'Huyện', 86),
(858, 'Mang Thít', 'Huyện', 86),
(859, 'Vũng Liêm', 'Huyện', 86),
(860, 'Tam Bình', 'Huyện', 86),
(861, 'Bình Minh', 'Huyện', 86),
(862, 'Trà Ôn', 'Huyện', 86),
(863, 'Bình Tân', 'Huyện', 86),
(866, 'Cao Lãnh', 'Thành Phố', 87),
(867, 'Sa Đéc', 'Thị Xã', 87),
(868, 'Hồng Ngự', 'Thị Xã', 87),
(869, 'Tân Hồng', 'Huyện', 87),
(870, 'Hồng Ngự', 'Huyện', 87),
(871, 'Tam Nông', 'Huyện', 87),
(872, 'Tháp Mười', 'Huyện', 87),
(873, 'Cao Lãnh', 'Huyện', 87),
(874, 'Thanh Bình', 'Huyện', 87),
(875, 'Lấp Vò', 'Huyện', 87),
(876, 'Lai Vung', 'Huyện', 87),
(877, 'Châu Thành', 'Huyện', 87),
(883, 'Long Xuyên', 'Thành Phố', 89),
(884, 'Châu Đốc', 'Thị Xã', 89),
(886, 'An Phú', 'Huyện', 89),
(887, 'Tân Châu', 'Thị Xã', 89),
(888, 'Phú Tân', 'Huyện', 89),
(889, 'Châu Phú', 'Huyện', 89),
(890, 'Tịnh Biên', 'Huyện', 89),
(891, 'Tri Tôn', 'Huyện', 89),
(892, 'Châu Thành', 'Huyện', 89),
(893, 'Chợ Mới', 'Huyện', 89),
(894, 'Thoại Sơn', 'Huyện', 89),
(899, 'Rạch Giá', 'Thành Phố', 91),
(900, 'Hà Tiên', 'Thị Xã', 91),
(902, 'Kiên Lương', 'Huyện', 91),
(903, 'Hòn Đất', 'Huyện', 91),
(904, 'Tân Hiệp', 'Huyện', 91),
(905, 'Châu Thành', 'Huyện', 91),
(906, 'Giồng Giềng', 'Huyện', 91),
(907, 'Gò Quao', 'Huyện', 91),
(908, 'An Biên', 'Huyện', 91),
(909, 'An Minh', 'Huyện', 91),
(910, 'Vĩnh Thuận', 'Huyện', 91),
(911, 'Phú Quốc', 'Huyện', 91),
(912, 'Kiên Hải', 'Huyện', 91),
(913, 'U Minh Thượng', 'Huyện', 91),
(914, 'Giang Thành', 'Huyện', 91),
(916, 'Ninh Kiều', 'Quận', 92),
(917, 'Ô Môn', 'Quận', 92),
(918, 'Bình Thuỷ', 'Quận', 92),
(919, 'Cái Răng', 'Quận', 92),
(923, 'Thốt Nốt', 'Quận', 92),
(924, 'Vĩnh Thạnh', 'Huyện', 92),
(925, 'Cờ Đỏ', 'Huyện', 92),
(926, 'Phong Điền', 'Huyện', 92),
(927, 'Thới Lai', 'Huyện', 92),
(930, 'Vị Thanh', 'Thị Xã', 93),
(931, 'Ngã Bảy', 'Thị Xã', 93),
(932, 'Châu Thành A', 'Huyện', 93),
(933, 'Châu Thành', 'Huyện', 93),
(934, 'Phụng Hiệp', 'Huyện', 93),
(935, 'Vị Thuỷ', 'Huyện', 93),
(936, 'Long Mỹ', 'Huyện', 93),
(941, 'Sóc Trăng', 'Thành Phố', 94),
(942, 'Châu Thành', 'Huyện', 94),
(943, 'Kế Sách', 'Huyện', 94),
(944, 'Mỹ Tú', 'Huyện', 94),
(945, 'Cù Lao Dung', 'Huyện', 94),
(946, 'Long Phú', 'Huyện', 94),
(947, 'Mỹ Xuyên', 'Huyện', 94),
(948, 'Ngã Năm', 'Huyện', 94),
(949, 'Thạnh Trị', 'Huyện', 94),
(950, 'Vĩnh Châu', 'Huyện', 94),
(951, 'Trần Đề', 'Huyện', 94),
(954, 'Bạc Liêu', 'Thị Xã', 95),
(956, 'Hồng Dân', 'Huyện', 95),
(957, 'Phước Long', 'Huyện', 95),
(958, 'Vĩnh Lợi', 'Huyện', 95),
(959, 'Giá Rai', 'Huyện', 95),
(960, 'Đông Hải', 'Huyện', 95),
(961, 'Hoà Bình', 'Huyện', 95),
(964, 'Cà Mau', 'Thành Phố', 96),
(966, 'U Minh', 'Huyện', 96),
(967, 'Thới Bình', 'Huyện', 96),
(968, 'Trần Văn Thời', 'Huyện', 96),
(969, 'Cái Nước', 'Huyện', 96),
(970, 'Đầm Dơi', 'Huyện', 96),
(971, 'Năm Căn', 'Huyện', 96),
(972, 'Phú Tân', 'Huyện', 96),
(973, 'Ngọc Hiển', 'Huyện', 96);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `files`
--

CREATE TABLE `files` (
  `id_file` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `preview` text COLLATE utf8_unicode_ci,
  `education` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skill` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salary` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `job_level` int(255) DEFAULT NULL,
  `times_id` int(255) DEFAULT NULL,
  `benifit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cv_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `files`
--

INSERT INTO `files` (`id_file`, `user_id`, `preview`, `education`, `skill`, `experience`, `reference`, `salary`, `job_level`, `times_id`, `benifit`, `cv_file`, `active`, `created_at`, `updated_at`) VALUES
(1, 22, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, NULL, NULL, 0, '2018-01-06 16:25:26', '2018-01-06 16:25:26'),
(3, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2018-01-06 16:25:26', '2018-01-06 16:25:26'),
(4, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2018-01-06 16:25:26', '2018-01-06 16:25:26'),
(5, 10, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, 0, '2018-01-06 16:25:26', '2018-01-15 18:18:58'),
(6, 14, 'Trở thành nhà thiết kế giỏi \r\nNăng động, tự tin trong công việc', 'Đại học', 'Tiếng Anh', '2 năm nhân viên', 'Côn ty ABC, Trưởng phòng nhân sự Mai Hạnh, SĐT:234567890', '10000000', 2, 2, 'du lịch', NULL, 1, '2018-01-06 16:25:26', '2018-01-09 07:19:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id_job` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_level` int(255) NOT NULL,
  `job_categories` int(255) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salary` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time_id` int(255) NOT NULL,
  `preview` text COLLATE utf8_unicode_ci NOT NULL,
  `required` text COLLATE utf8_unicode_ci NOT NULL,
  `agency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `expired` date NOT NULL,
  `active` int(1) NOT NULL,
  `reader` int(255) NOT NULL,
  `feature` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `jobs`
--

INSERT INTO `jobs` (`id_job`, `user_id`, `title`, `job_level`, `job_categories`, `address`, `salary`, `time_id`, `preview`, `required`, `agency`, `email`, `phone`, `expired`, `active`, `reader`, `feature`, `created_at`, `updated_at`) VALUES
(3, 21, 'Tester', 1, 71, 'Đà Nẵng', '10000000', 4, '<p>http://tuyendung.dung:8081/admin/job/add</p>', '<p>http://tuyendung.dung:8081/admin/job/add</p>', 'Nguyễn Anh', 'ha@gmail.com', '1234321234', '2018-02-22', 1, 8, 1, '2018-01-12 03:22:55', '2018-01-15 03:16:15'),
(4, 29, 'test', 1, 71, 'hòa khánh bắc, đà nẵng', '5000000', 2, '<p>http://tuyendung.dung:8081/admin/job/add</p>', '<p>http://tuyendung.dung:8081/admin/job/add</p>', 'Mai', 'mail@gmail.com', '1234321234', '2018-01-14', 1, 4, 1, '2018-01-12 03:36:40', '2018-01-12 13:19:55'),
(5, 21, 'Testerb', 1, 71, 'Đà Nẵng', '10000000', 4, '<p>http://tuyendung.dung:8081/admin/job/add</p>', '<p>http://tuyendung.dung:8081/admin/job/add</p>', 'Nguyễn Anh', 'ha@gmail.com', '1234321234', '2018-02-22', 1, 8, 1, '2018-01-12 03:22:55', '2018-01-15 03:16:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_categories`
--

CREATE TABLE `job_categories` (
  `id_jobcat` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `job_categories`
--

INSERT INTO `job_categories` (`id_jobcat`, `name`, `parent_id`) VALUES
(1, 'Xây dựng', 0),
(2, 'Xây dựng ', 1),
(3, 'Kiến trúc/Thiết kế nội thất ', 1),
(4, 'Bất động sản', 1),
(5, 'Giao Dịch Khách Hàng', 0),
(6, 'Marketing', 5),
(7, 'Bán hàng', 5),
(8, 'Dịch vụ khách hàng', 5),
(9, 'Bán hàng kỹ thuật', 5),
(10, 'Truyền thông', 0),
(11, 'Viễn Thông ', 10),
(12, 'Truyền hình/Truyền thông/Báo chí ', 10),
(13, 'Mỹ Thuật/Nghệ Thuật/Thiết Kế', 10),
(14, 'Quảng cáo/Khuyến mãi/Đối ngoại', 10),
(15, 'Internet/Online Media', 10),
(16, 'In ấn/ Xuất bản', 10),
(17, 'Dịch vụ tài chính', 0),
(18, 'Ngân hàng', 17),
(19, 'Kiểm toán', 17),
(20, 'Tài chính/Đầu tư', 17),
(21, 'Chứng khoán', 17),
(22, 'Bảo hiểm', 17),
(23, 'Hàng tiêu dùng & Bán lẻ', 0),
(24, 'Hàng tiêu dùng', 23),
(25, 'Hàng gia dụng', 23),
(26, 'Bán lẻ/Bán sỉ', 23),
(27, 'Thực phẩm & Đồ uống', 23),
(28, 'Thời trang', 23),
(29, 'Hàng cao cấp', 23),
(30, 'Khách sạn & Du lịch', 0),
(31, 'Hàng không/Du lịch', 30),
(32, 'Nhà hàng/Khách sạn', 30),
(33, 'Kỹ Thuật', 0),
(34, 'Điện/Điện tử', 33),
(35, 'Cơ khí', 33),
(36, 'Hóa học/Hóa sinh', 33),
(37, 'Môi trường/Xử lý chất thải', 33),
(38, 'Điện lạnh/Nhiệt lạnh', 33),
(39, 'Sản xuất', 0),
(40, 'Dầu khí', 39),
(41, 'Dệt may/Da giày', 39),
(42, 'Dược phẩm/Công nghệ sinh học', 39),
(43, 'Tự động hóa/Ô tô', 39),
(44, 'Nông nghiệp/Lâm nghiệp', 39),
(45, 'Sản phẩm công nghiệp', 39),
(46, 'Công nghệ cao', 39),
(47, 'Địa chất/Khoáng sản', 39),
(48, 'Y tế', 0),
(49, 'Y tế/Chăm sóc sức khỏe', 48),
(50, 'Bác sĩ', 48),
(51, 'Y sĩ/Hộ lý', 48),
(52, 'Dược sĩ', 48),
(53, 'Trình dược viên', 48),
(54, 'Dịch vụ', 0),
(55, 'Phi chính phủ/Phi lợi nhuận', 54),
(56, 'Giáo dục/Đào tạo', 54),
(57, 'Y tế/Chăm sóc sức khỏe', 54),
(58, 'Tư vấn', 54),
(59, 'Vận tải', 0),
(60, 'Vận chuyển/Giao nhận', 59),
(61, 'Kho vận', 59),
(62, 'Hàng hải', 59),
(63, 'Bộ Phận Hỗ trợ', 0),
(64, 'Hành chánh/Thư ký', 63),
(65, 'Kế toán', 63),
(66, 'Nhân sự', 63),
(67, 'Biên phiên dịch', 63),
(68, 'Pháp lý', 63),
(69, 'Kỹ thuật - Công nghệ', 0),
(70, 'IT-Phần cứng/Mạng', 69),
(71, 'IT - Phần mềm', 69),
(72, 'Hỗ trợ sản xuất', 0),
(73, 'Xuất nhập khẩu', 72),
(74, 'QA/QC', 72),
(75, 'Sản Xuất', 72),
(76, 'Thu Mua/Vật Tư/Cung Vận', 72),
(77, 'An toàn lao động ', 72),
(78, 'Bảo trì/Sửa chữa', 72),
(79, 'Hoạch định/Dự án', 72);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_levels`
--

CREATE TABLE `job_levels` (
  `id_joblevel` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `job_levels`
--

INSERT INTO `job_levels` (`id_joblevel`, `name`) VALUES
(1, 'Mới tốt nghiệp'),
(2, 'Nhân viên'),
(3, 'Trưởng phòng'),
(4, 'Giám đốc và cấp cao hơn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `levels`
--

CREATE TABLE `levels` (
  `id_level` int(255) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `levels`
--

INSERT INTO `levels` (`id_level`, `name`) VALUES
(1, 'admin'),
(2, 'mod'),
(3, 'công ty'),
(4, 'ứng viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `likes`
--

CREATE TABLE `likes` (
  `id_like` int(255) NOT NULL,
  `oitem_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `oitem` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `likes`
--

INSERT INTO `likes` (`id_like`, `oitem_id`, `user_id`, `oitem`, `status`, `created_at`, `updated_at`) VALUES
(35, 4, 10, 2, 1, '2018-01-16 05:48:58', '2018-01-16 05:48:58'),
(92, 3, 10, 2, 1, '2018-01-16 07:01:49', '2018-01-16 07:01:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_categories`
--

CREATE TABLE `list_categories` (
  `id_listcat` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `jobcat_id` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `list_categories`
--

INSERT INTO `list_categories` (`id_listcat`, `user_id`, `jobcat_id`, `created_at`, `updated_at`) VALUES
(3, 8, 6, '2018-01-07 13:33:24', '2018-01-07 13:33:24'),
(4, 8, 7, '2018-01-07 13:33:35', '2018-01-07 13:33:35'),
(23, 9, 64, '2018-01-08 11:19:09', '2018-01-08 11:19:09'),
(24, 9, 65, '2018-01-08 11:19:12', '2018-01-08 11:19:12'),
(27, 22, 71, '2018-01-08 11:19:57', '2018-01-08 11:19:57'),
(28, 22, 70, '2018-01-08 11:20:07', '2018-01-08 11:20:07'),
(29, 10, 56, '2018-01-08 11:20:48', '2018-01-08 11:20:48'),
(30, 8, 9, '2018-01-08 11:21:04', '2018-01-08 11:21:04'),
(40, 21, 64, '2018-01-09 12:55:06', '2018-01-09 12:55:06'),
(41, 21, 56, '2018-01-09 12:55:09', '2018-01-09 12:55:09'),
(47, 10, 68, '2018-01-09 12:56:28', '2018-01-09 12:56:28'),
(48, 9, 21, '2018-01-09 12:56:37', '2018-01-09 12:56:37'),
(53, 21, 6, '2018-01-09 13:12:51', '2018-01-09 13:12:51'),
(55, 29, 71, '2018-01-09 13:47:59', '2018-01-09 13:47:59'),
(56, 29, 70, '2018-01-09 13:48:02', '2018-01-09 13:48:02'),
(57, 29, 56, '2018-01-09 13:48:49', '2018-01-09 13:48:49'),
(81, 29, 18, '2018-01-09 23:24:28', '2018-01-09 23:24:28'),
(85, 14, 71, '2018-01-12 19:13:07', '2018-01-12 19:13:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_jobs`
--

CREATE TABLE `list_jobs` (
  `id_listjob` int(255) NOT NULL,
  `job_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `cv_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `list_jobs`
--

INSERT INTO `list_jobs` (`id_listjob`, `job_id`, `user_id`, `cv_file`, `status`, `note`, `created_at`, `updated_at`) VALUES
(1, 3, 14, '', 2, '', '2018-01-12 04:36:32', '2018-01-12 04:36:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `provinces`
--

CREATE TABLE `provinces` (
  `id_province` int(255) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `provinces`
--

INSERT INTO `provinces` (`id_province`, `name`, `type`) VALUES
(1, 'Hà Nội', 'Thành Phố'),
(2, 'Hà Giang', 'Tỉnh'),
(4, 'Cao Bằng', 'Tỉnh'),
(6, 'Bắc Kạn', 'Tỉnh'),
(8, 'Tuyên Quang', 'Tỉnh'),
(10, 'Lào Cai', 'Tỉnh'),
(11, 'Điện Biên', 'Tỉnh'),
(12, 'Lai Châu', 'Tỉnh'),
(14, 'Sơn La', 'Tỉnh'),
(15, 'Yên Bái', 'Tỉnh'),
(17, 'Hòa Bình', 'Tỉnh'),
(19, 'Thái Nguyên', 'Tỉnh'),
(20, 'Lạng Sơn', 'Tỉnh'),
(22, 'Quảng Ninh', 'Tỉnh'),
(24, 'Bắc Giang', 'Tỉnh'),
(25, 'Phú Thọ', 'Tỉnh'),
(26, 'Vĩnh Phúc', 'Tỉnh'),
(27, 'Bắc Ninh', 'Tỉnh'),
(30, 'Hải Dương', 'Tỉnh'),
(31, 'Hải Phòng', 'Thành Phố'),
(33, 'Hưng Yên', 'Tỉnh'),
(34, 'Thái Bình', 'Tỉnh'),
(35, 'Hà Nam', 'Tỉnh'),
(36, 'Nam Định', 'Tỉnh'),
(37, 'Ninh Bình', 'Tỉnh'),
(38, 'Thanh Hóa', 'Tỉnh'),
(40, 'Nghệ An', 'Tỉnh'),
(42, 'Hà Tĩnh', 'Tỉnh'),
(44, 'Quảng Bình', 'Tỉnh'),
(45, 'Quảng Trị', 'Tỉnh'),
(46, 'Thừa Thiên Huế', 'Tỉnh'),
(48, 'Đà Nẵng', 'Thành Phố'),
(49, 'Quảng Nam', 'Tỉnh'),
(51, 'Quảng Ngãi', 'Tỉnh'),
(52, 'Bình Định', 'Tỉnh'),
(54, 'Phú Yên', 'Tỉnh'),
(56, 'Khánh Hòa', 'Tỉnh'),
(58, 'Ninh Thuận', 'Tỉnh'),
(60, 'Bình Thuận', 'Tỉnh'),
(62, 'Kon Tum', 'Tỉnh'),
(64, 'Gia Lai', 'Tỉnh'),
(66, 'Đắk Lắk', 'Tỉnh'),
(67, 'Đắk Nông', 'Tỉnh'),
(68, 'Lâm Đồng', 'Tỉnh'),
(70, 'Bình Phước', 'Tỉnh'),
(72, 'Tây Ninh', 'Tỉnh'),
(74, 'Bình Dương', 'Tỉnh'),
(75, 'Đồng Nai', 'Tỉnh'),
(77, 'Bà Rịa - Vũng Tàu', 'Tỉnh'),
(79, 'Hồ Chí Minh', 'Thành Phố'),
(80, 'Long An', 'Tỉnh'),
(82, 'Tiền Giang', 'Tỉnh'),
(83, 'Bến Tre', 'Tỉnh'),
(84, 'Trà Vinh', 'Tỉnh'),
(86, 'Vĩnh Long', 'Tỉnh'),
(87, 'Đồng Tháp', 'Tỉnh'),
(89, 'An Giang', 'Tỉnh'),
(91, 'Kiên Giang', 'Tỉnh'),
(92, 'Cần Thơ', 'Thành Phố'),
(93, 'Hậu Giang', 'Tỉnh'),
(94, 'Sóc Trăng', 'Tỉnh'),
(95, 'Bạc Liêu', 'Tỉnh'),
(96, 'Cà Mau', 'Tỉnh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `times`
--

CREATE TABLE `times` (
  `id_time` int(255) NOT NULL,
  `detail` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `times`
--

INSERT INTO `times` (`id_time`, `detail`) VALUES
(1, 'Bán thời gian'),
(2, 'Hợp đồng'),
(3, 'Thực tập sinh'),
(4, 'Toàn thời gian');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `gender` int(1) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `level_id` int(255) NOT NULL,
  `active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `address`, `picture`, `phone`, `gender`, `birthday`, `level_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'tramnhien2210@gmail.com', '$2y$10$ymutbOA2hOOB6vnmeY4zuOM2atDmex7GHQdZsiDL70T7SkolaKidy', 'Thành phố Đà Nẵng, Quận Liên Chiểu', 'NVekqIklIZEmpX7veOjsJySgAeCqhtCPM8EYqaFF.jpeg', '123456789', 0, '1990-07-03', 1, 1, '2018-01-05 18:44:13', '2018-01-06 15:56:38'),
(8, 'Mai Thị Ngà', 'nga@gmail.com', '$2y$10$fQt9tctIUvrPfatg7VEZQ.VJAUB8ZHw1YBh/j19xlk0O4z8YfWV52', '123 Lê Duẫn', 'AEtuBXLfAoaaHnm9RTnJjzarBP8Ff3D9Wq0fllN3.jpeg', '1234567890', 1, NULL, 4, 1, '2018-01-06 07:46:27', '2018-01-06 07:46:27'),
(9, 'Ngô Văn Sở', 'so@gmail.com', '$2y$10$TdEw0CXTWzVLl6GAIj6WLehC0UNrujb7ydW7j/xz20fXVEmXYQ9/m', '123 Lê Duẫn', 'X1vit5ae6bACmzZnvSv2yxNoYT45F0z1VZAwwrP3.png', '1234567844', 0, '2000-01-12', 4, 1, '2018-01-06 07:55:42', '2018-01-07 15:27:25'),
(10, 'Huỳnh Hồng Phúc', 'phuc@gmail.com', '$2y$10$llVlQ4Z3PG/42RGpvlv7HexsVEqB96aHQluyD6xWc1LOyjKBzjIuS', NULL, 'hg3wCMowzxH4KE0jlDwKUkEgQ4tDPbpBd7m3dtGN.png', '1234567890', 1, NULL, 4, 1, '2018-01-06 08:04:04', '2018-01-06 09:28:02'),
(14, 'Nguyễn Hoàng Dung', 'hoangdung4420@gmail.com', '$2y$10$75TmTR/VRsTVQVIu8sda7.//jbQlrHn3uMmuaErb4NCvyjCdVCdSO', 'Thành phố Đà Nẵng, Quận Sơn Trà', '', '1231231234', 0, '2000-01-04', 4, 1, '2018-01-06 09:49:51', '2018-01-07 15:46:01'),
(18, 'Nguyễn Thị Mơ', 'mo@gmail.com', '$2y$10$9t9UypiTMIKKkMb38jusU.xfRZRX4gTicxKeUpPgVMExAOAKAq9CC', '123 Lê Duẫn', 'dAiw4oso6JWLIC0UxDuDAl68Rv9r4tUwhUaTTWpS.jpeg', '1231234567', 1, '2000-01-04', 2, 1, '2018-01-06 11:02:53', '2018-01-09 08:26:58'),
(21, 'FPT Software Đà Nẵng', 'fpt@gmail.com', '$2y$10$kjNo0yHmCBYVV.hIKkJYEuXew8iKTEL6zCu40iR18a47D3Gt2p/8u', 'Đà Nẵng, Sơn Trà', 'UBZlAwY4sxeNx2kZiBFrmA3jD73n1mAuLQLXALeX.jpeg', '1234567890', NULL, '2004-01-03', 3, 1, '2018-01-06 16:15:48', '2018-01-15 02:54:31'),
(22, 'Vân Quỳnh', 'quynh@gmail.com', '$2y$10$dqMgdp/IO3/tobK3P2GZv.ZjvWjZJoqHrVfEgtm5UYTKczSEzEEHi', 'Đà Nẵng', '', '1231231234', 1, '1998-01-10', 4, 1, '2018-01-06 16:25:26', '2018-01-06 16:25:26'),
(29, 'NEOLAB', 'neo@gmail.com', '$2y$10$yrUf6J5p5Swl7FL.clJfnuZCyRglyw2igX/egMopbXDpfUlPcVkDu', 'Đà Nẵng', 'rMrqoTor3loync2ZEqfAFyneNByUbhVAXkF4hCu1.jpeg', '2345678987', NULL, '2018-01-04', 3, 1, '2018-01-09 13:40:50', '2018-01-12 13:25:40');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id_about`);

--
-- Chỉ mục cho bảng `advs`
--
ALTER TABLE `advs`
  ADD PRIMARY KEY (`id_adv`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id_contact`);

--
-- Chỉ mục cho bảng `detail_companies`
--
ALTER TABLE `detail_companies`
  ADD PRIMARY KEY (`id_company`);

--
-- Chỉ mục cho bảng `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id_file`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id_job`);

--
-- Chỉ mục cho bảng `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id_jobcat`);

--
-- Chỉ mục cho bảng `job_levels`
--
ALTER TABLE `job_levels`
  ADD PRIMARY KEY (`id_joblevel`);

--
-- Chỉ mục cho bảng `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id_level`);

--
-- Chỉ mục cho bảng `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_like`);

--
-- Chỉ mục cho bảng `list_categories`
--
ALTER TABLE `list_categories`
  ADD PRIMARY KEY (`id_listcat`);

--
-- Chỉ mục cho bảng `list_jobs`
--
ALTER TABLE `list_jobs`
  ADD PRIMARY KEY (`id_listjob`);

--
-- Chỉ mục cho bảng `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id_province`);

--
-- Chỉ mục cho bảng `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id_time`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id_about` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `advs`
--
ALTER TABLE `advs`
  MODIFY `id_adv` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id_contact` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `detail_companies`
--
ALTER TABLE `detail_companies`
  MODIFY `id_company` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `files`
--
ALTER TABLE `files`
  MODIFY `id_file` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id_job` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id_jobcat` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT cho bảng `job_levels`
--
ALTER TABLE `job_levels`
  MODIFY `id_joblevel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `levels`
--
ALTER TABLE `levels`
  MODIFY `id_level` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `likes`
--
ALTER TABLE `likes`
  MODIFY `id_like` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT cho bảng `list_categories`
--
ALTER TABLE `list_categories`
  MODIFY `id_listcat` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT cho bảng `list_jobs`
--
ALTER TABLE `list_jobs`
  MODIFY `id_listjob` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id_province` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT cho bảng `times`
--
ALTER TABLE `times`
  MODIFY `id_time` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
