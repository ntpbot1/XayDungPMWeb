-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th4 05, 2023 lúc 07:06 AM
-- Phiên bản máy phục vụ: 5.7.36
-- Phiên bản PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `phonestore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdathangs`
--

DROP TABLE IF EXISTS `chitietdathangs`;
CREATE TABLE IF NOT EXISTS `chitietdathangs` (
  `id_ctdh` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_dat_hang` bigint(20) UNSIGNED NOT NULL,
  `id_san_pham` bigint(20) UNSIGNED NOT NULL,
  `gia` double NOT NULL,
  `so_luong` double NOT NULL,
  `tong_tien` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ctdh`),
  KEY `PK_CTDDH_DDH` (`id_dat_hang`),
  KEY `PK_CTDDH_SP` (`id_san_pham`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdathangs`
--

INSERT INTO `chitietdathangs` (`id_ctdh`, `id_dat_hang`, `id_san_pham`, `gia`, `so_luong`, `tong_tien`, `created_at`, `updated_at`) VALUES
(1, 3, 25, 11000000, 1, 11000000, '2023-03-15 19:24:32', NULL),
(2, 3, 24, 12000000, 2, 24000000, '2023-03-15 19:24:32', NULL),
(3, 4, 24, 12000000, 1, 12000000, '2023-03-15 20:37:36', NULL),
(4, 5, 23, 4000000, 1, 4000000, '2023-03-16 02:09:40', NULL),
(5, 5, 25, 11000000, 1, 11000000, '2023-03-16 02:09:40', NULL),
(6, 6, 24, 12000000, 1, 12000000, '2023-03-16 02:44:45', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dondathangs`
--

DROP TABLE IF EXISTS `dondathangs`;
CREATE TABLE IF NOT EXISTS `dondathangs` (
  `id_dat_hang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_khach_hang` bigint(20) UNSIGNED NOT NULL,
  `ten_khach_hang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_trang_thai` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_dat_hang`),
  KEY `PK_DDH_TT` (`id_trang_thai`),
  KEY `PK_DDH_KH` (`id_khach_hang`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dondathangs`
--

INSERT INTO `dondathangs` (`id_dat_hang`, `id_khach_hang`, `ten_khach_hang`, `sdt`, `dia_chi`, `id_trang_thai`, `created_at`, `updated_at`) VALUES
(3, 2, 'Hỷ Thắng', '12345678', 'TP.HCM', 1, '2023-03-15 19:24:32', NULL),
(4, 2, 'Phát Ngô', '1234', 'TP.HCM', 1, '2023-03-15 20:37:36', NULL),
(5, 2, 'Chí Duy', '123456789', 'TP.HCM', 1, '2023-03-16 02:09:40', NULL),
(6, 3, 'Minh Luân', '123456', 'TP.HCM', 1, '2023-03-16 02:44:45', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhangs`
--

DROP TABLE IF EXISTS `khachhangs`;
CREATE TABLE IF NOT EXISTS `khachhangs` (
  `id_khach_hang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ho_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdt` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_khach_hang`),
  UNIQUE KEY `khachhangs_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhangs`
--

INSERT INTO `khachhangs` (`id_khach_hang`, `username`, `password`, `ho_ten`, `email`, `sdt`, `dia_chi`, `created_at`, `updated_at`) VALUES
(2, 'ntpbot1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Chí Duy', NULL, '123456789', 'TP.HCM', NULL, NULL),
(3, 'minhluan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Minh Luân', NULL, '123456', 'TP.HCM', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2023_02_18_085632_create_taikhoan_table', 1),
(2, '2023_02_18_090341_create_nhasanxuat_table', 1),
(3, '2023_02_18_090355_create_sanpham_table', 1),
(4, '2023_03_15_203552_create_khachhangs_table', 2),
(5, '2023_03_15_230152_create_trangthais_table', 3),
(6, '2023_03_15_230616_create_dondathangs_table', 4),
(7, '2023_03_15_231206_create_chitietdathangs_table', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhasanxuats`
--

DROP TABLE IF EXISTS `nhasanxuats`;
CREATE TABLE IF NOT EXISTS `nhasanxuats` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ma_nsx` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_nsx` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tru_so` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhasanxuats`
--

INSERT INTO `nhasanxuats` (`id`, `ma_nsx`, `ten_nsx`, `tru_so`, `created_at`, `updated_at`) VALUES
(5, 'NSX01', 'Oppo', 'dsad123', '2023-02-21 15:41:38', '2023-03-01 16:51:02'),
(9, '', 'Nokia', 'sadsa', '2023-02-27 15:12:31', '2023-03-01 16:52:03'),
(12, '', 'Samsung', '', '2023-03-01 02:56:15', '2023-03-01 16:52:49'),
(13, '', 'Apple', '', '2023-03-01 16:48:36', '2023-03-01 16:48:36'),
(14, '', 'Vivo', '', '2023-03-01 16:59:25', '2023-03-01 16:59:25'),
(15, '', 'Xiaomi', '', '2023-03-01 16:59:35', '2023-03-01 16:59:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanphams`
--

DROP TABLE IF EXISTS `sanphams`;
CREATE TABLE IF NOT EXISTS `sanphams` (
  `id_sp` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ma_sp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_sp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia_sp` double NOT NULL,
  `ram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dung_luong` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ma_nsx` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_sp`),
  KEY `PK_SP_NSX` (`ma_nsx`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanphams`
--

INSERT INTO `sanphams` (`id_sp`, `ma_sp`, `ten_sp`, `gia_sp`, `ram`, `dung_luong`, `pin`, `hinh_anh`, `mo_ta`, `ma_nsx`, `created_at`, `updated_at`) VALUES
(16, NULL, 'Samsung Galaxy A23', 4000000, '4GB', '128GB', '5000Ah', 'samsung-galaxy-a2380.jpg', NULL, 12, NULL, NULL),
(17, NULL, 'Nokia G21', 1200000, '4GB', '128GB', '5050Ah', 'nokia-g2119.jpg', NULL, 9, NULL, NULL),
(18, NULL, 'Oppo A55', 2000000, '4GB', '64GB', '3240Ah', 'oppo-a55-4g76.jpg', NULL, 5, NULL, NULL),
(21, NULL, 'Iphone 13', 7000000, '4GB', '512GB', '3240Ah', 'iphone-13-pro-max75.jpg', NULL, 13, NULL, NULL),
(22, NULL, 'Xiaomi Redmi 10A', 6000000, '2GB', '32GB', '5000mAh', 'xiaomi-redmi-10a90.jpg', NULL, 15, NULL, NULL),
(23, NULL, 'Vivo Y15S', 4000000, '4GB', '128GB', '5000mAh', 'Vivo-y15s78.jpg', NULL, 14, NULL, NULL),
(24, NULL, 'Samsung Galaxy S22', 12000000, '4GB', '128GB', '5000mAh', 'Galaxy-S229.jpg', NULL, 12, NULL, NULL),
(25, NULL, 'Iphone 11', 11000000, '4GB', '64GB', '3110mAh', 'iphone-1129.jpg', NULL, 13, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoans`
--

DROP TABLE IF EXISTS `taikhoans`;
CREATE TABLE IF NOT EXISTS `taikhoans` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ho_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_cv` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `taikhoans_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoans`
--

INSERT INTO `taikhoans` (`id`, `username`, `password`, `ho_ten`, `email`, `sdt`, `dia_chi`, `ma_cv`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', ' nguyen van a', 'nguyenvana@gmail.com', '0123456789', 'abc', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthais`
--

DROP TABLE IF EXISTS `trangthais`;
CREATE TABLE IF NOT EXISTS `trangthais` (
  `id_trang_thai` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ten_trang_thai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_trang_thai`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trangthais`
--

INSERT INTO `trangthais` (`id_trang_thai`, `ten_trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'Đang xử lý', NULL, NULL),
(2, 'Đã hủy', NULL, NULL),
(3, 'Đang giao hàng', NULL, NULL),
(4, 'Hoàn thành', NULL, NULL);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdathangs`
--
ALTER TABLE `chitietdathangs`
  ADD CONSTRAINT `PK_CTDDH_DDH` FOREIGN KEY (`id_dat_hang`) REFERENCES `dondathangs` (`id_dat_hang`),
  ADD CONSTRAINT `PK_CTDDH_SP` FOREIGN KEY (`id_san_pham`) REFERENCES `sanphams` (`id_sp`);

--
-- Các ràng buộc cho bảng `dondathangs`
--
ALTER TABLE `dondathangs`
  ADD CONSTRAINT `PK_DDH_KH` FOREIGN KEY (`id_khach_hang`) REFERENCES `khachhangs` (`id_khach_hang`),
  ADD CONSTRAINT `PK_DDH_TT` FOREIGN KEY (`id_trang_thai`) REFERENCES `trangthais` (`id_trang_thai`);

--
-- Các ràng buộc cho bảng `sanphams`
--
ALTER TABLE `sanphams`
  ADD CONSTRAINT `PK_SP_NSX` FOREIGN KEY (`ma_nsx`) REFERENCES `nhasanxuats` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
