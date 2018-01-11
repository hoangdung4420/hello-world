-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 29, 2017 lúc 09:26 PM
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `abouts`
--

INSERT INTO `abouts` (`id_about`, `title`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'Liên hệ', '-34/145 K82 Nguyễn Lương Bằng, Liên Chiểu, Đà Nằng\n- VP Hồ Chí Minh: Lầu 6 Tòa nhà Thịnh Phát - 178/8 Đường D1, Phường 25, Quận Bình Thạnh, TP Hồ Chí Minh\n- VP Hà Nội: Tầng 6, Tòa Nhà Viện Công Nghệ - 25 Vũ Ngọc Phan, Phường Láng Hạ, Quận Đống Đa, TP Hà N', '2017-12-27 05:14:41', '2017-12-27 05:14:41'),
(2, 'Giờ mở cửa', '7h Sáng- 17h Chiều từ thứ 2-thứ 6\n7h Sáng- 19h30\' Chiều vào chủ nhật', '2017-12-27 05:14:41', '2017-12-27 05:14:41'),
(3, 'Số điện thoại', '0978262380', '2017-12-27 05:14:41', '2017-12-27 05:14:41'),
(4, 'email', 'tramnhien4420@gmail.com', '2017-12-27 05:14:41', '2017-12-27 05:14:41'),
(5, 'google', 'https://www.google.com.vn/', '2017-12-27 05:14:41', '2017-12-27 05:14:41'),
(6, 'facebook', 'https://vi-vn.facebook.com/', '2017-12-27 05:14:41', '2017-12-27 05:14:41'),
(7, 'twitter', 'https://twitter.com/?lang=vi', '2017-12-27 05:14:41', '2017-12-27 05:14:41'),
(8, 'youtobe', 'https://www.youtube.com/?gl=VN', '2017-12-27 05:14:41', '2017-12-27 05:14:41');

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_candidates`
--

CREATE TABLE `detail_candidates` (
  `id_candidate` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_companies`
--

CREATE TABLE `detail_companies` (
  `id_company` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `job_categories` int(255) NOT NULL,
  `size` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `preview` text COLLATE utf8_unicode_ci,
  `detail` text COLLATE utf8_unicode_ci,
  `benifit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `feature` int(1) NOT NULL,
  `reader` int(255) NOT NULL,
  `liked` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `province_id` int(255) DEFAULT NULL,
  `job_categories` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salary` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `job_level` int(255) DEFAULT NULL,
  `times_id` int(255) NOT NULL,
  `benifit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cv_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `province_id` int(255) NOT NULL,
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
  `liked` int(255) NOT NULL,
  `feature` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_categories`
--

CREATE TABLE `job_categories` (
  `id_jobcat` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent _id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `job_categories`
--

INSERT INTO `job_categories` (`id_jobcat`, `name`, `parent _id`) VALUES
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
  `object_id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `object` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_jobs`
--

CREATE TABLE `list_jobs` (
  `id_likejob` int(255) NOT NULL,
  `job_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `cv_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id_message` int(255) NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `job_id` int(255) NOT NULL,
  `parent_id` int(255) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `province_id` int(255) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `level_id` int(255) NOT NULL,
  `active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Chỉ mục cho bảng `detail_candidates`
--
ALTER TABLE `detail_candidates`
  ADD PRIMARY KEY (`id_candidate`);

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
-- Chỉ mục cho bảng `list_jobs`
--
ALTER TABLE `list_jobs`
  ADD PRIMARY KEY (`id_likejob`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`);

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
  MODIFY `id_about` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `advs`
--
ALTER TABLE `advs`
  MODIFY `id_adv` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `detail_candidates`
--
ALTER TABLE `detail_candidates`
  MODIFY `id_candidate` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `detail_companies`
--
ALTER TABLE `detail_companies`
  MODIFY `id_company` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `files`
--
ALTER TABLE `files`
  MODIFY `id_file` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id_job` int(255) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_like` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `list_jobs`
--
ALTER TABLE `list_jobs`
  MODIFY `id_likejob` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int(255) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
