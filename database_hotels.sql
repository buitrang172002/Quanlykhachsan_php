-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 19, 2024 lúc 08:06 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `database_hotels`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `IDDM` varchar(10) NOT NULL,
  `LOAIDM` varchar(200) NOT NULL,
  `IDNCC` varchar(10) NOT NULL,
  `IDKS` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`IDDM`, `LOAIDM`, `IDNCC`, `IDKS`) VALUES
('1', 'Đô ăn-uống', '1', '1'),
('2', 'Giặt ủi', '2', '1'),
('3', 'Thuốc ', '3', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `datphong`
--

CREATE TABLE `datphong` (
  `IDDP` varchar(10) NOT NULL,
  `IDKH` varchar(10) NOT NULL,
  `IDPHONG` varchar(10) NOT NULL,
  `NGAYDAT` datetime(6) NOT NULL,
  `NGAYTRA` datetime(6) NOT NULL,
  `TIMEO` int(20) NOT NULL,
  `IDUSER` varchar(10) NOT NULL,
  `THANHTOAN` float NOT NULL,
  `TRANGTHAITT` int(10) NOT NULL,
  `sodvsd` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `datphong`
--

INSERT INTO `datphong` (`IDDP`, `IDKH`, `IDPHONG`, `NGAYDAT`, `NGAYTRA`, `TIMEO`, `IDUSER`, `THANHTOAN`, `TRANGTHAITT`, `sodvsd`) VALUES
('1', '2', '303', '2024-01-19 12:57:00.000000', '2024-01-21 12:57:00.000000', 48, '1', 4500000, 0, 0),
('3', '3', '402', '2024-01-19 12:59:00.000000', '2024-01-21 12:59:00.000000', 48, '1', 10000000, 0, 0),
('5', '1', '301', '2024-01-21 13:02:00.000000', '2024-01-24 13:02:00.000000', 72, '1', 13500000, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dichvu`
--

CREATE TABLE `dichvu` (
  `IDDV` varchar(10) NOT NULL,
  `TENDV` varchar(200) NOT NULL,
  `THUE` varchar(100) NOT NULL,
  `GIA` float NOT NULL,
  `IDDM` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dichvu`
--

INSERT INTO `dichvu` (`IDDV`, `TENDV`, `THUE`, `GIA`, `IDDM`) VALUES
('1', 'Bữa sáng', '0%', 500000, '1'),
('2', 'Bữa trưa', '0%', 1000000, '1'),
('3', 'Bữa tối', '0%', 1000000, '1'),
('4', 'Đồ tối màu', '0%', 100000, '2'),
('5', 'Thuốc tây', '0%', 300000, '3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachsan`
--

CREATE TABLE `khachsan` (
  `IDKS` varchar(10) NOT NULL,
  `TENKS` varchar(200) NOT NULL,
  `SDT` int(20) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `FAX` int(20) NOT NULL,
  `DIACHI` varchar(300) NOT NULL,
  `HINHANH` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachsan`
--

INSERT INTO `khachsan` (`IDKS`, `TENKS`, `SDT`, `EMAIL`, `FAX`, `DIACHI`, `HINHANH`) VALUES
('1', 'Golden Season Hotel', 1900000, 'goldenseason@gmail.com', 1900000, 'Hang Trong Street Hoan Kiem District, Hà Nội Việt Nam', '1705421625_g3.jpg'),
('2', 'The Reed Hotel', 19001111, 'thereaad@gmail.com', 19001111, 'Dinh Dien Street, Dong Thanh Ward, Ninh Bình, Việt Nam', '1705421672_g5.jpg'),
('3', 'MOMALI Hotel Ninh Binh', 19002222, 'momali@gmail.com', 19002222, '02 Lý Thường Kiệt, Nam Bình, Thành phố Ninh Bình', '1705422472_g7.jpg'),
('4', 'Trang An Lamia Bungalow', 19004444, 'trangan@gmail.com', 19004444, 'Thôn Đại Áng, xã Ninh Hòa, huyện Hoa Lư, Ninh Bình', '1705421700_g1.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaiphong`
--

CREATE TABLE `loaiphong` (
  `IDLOAIPHONG` varchar(10) NOT NULL,
  `TEN` varchar(100) NOT NULL,
  `DONGIA` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaiphong`
--

INSERT INTO `loaiphong` (`IDLOAIPHONG`, `TEN`, `DONGIA`) VALUES
('1', 'Phòng vip đơn', 4500000),
('2', 'Phòng vip đôi', 7500000),
('3', 'Phòng đơn thường', 2000000),
('4', 'Phòng đôi thường', 3500000),
('5', 'Phòng hộ gia đình', 5000000),
('6', 'Phòng đặc biệt', 20000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacc`
--

CREATE TABLE `nhacc` (
  `IDNCC` varchar(10) NOT NULL,
  `TENNCC` varchar(200) NOT NULL,
  `SDT` int(20) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `NGAYTAO` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacc`
--

INSERT INTO `nhacc` (`IDNCC`, `TENNCC`, `SDT`, `EMAIL`, `NGAYTAO`) VALUES
('1', 'Phương Đông', 912345678, 'phuongdong@gmail.com', '2024-01-09'),
('2', 'Phương Tây', 932454567, 'phuontay@gmail.com', '2024-01-09'),
('3', 'Phương Nam', 912546578, 'phuongnam@gmail.com', '2024-01-09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `IDPHONG` varchar(10) NOT NULL,
  `TENPHONG` varchar(60) NOT NULL,
  `TRANGTHAI` varchar(3) NOT NULL,
  `IDLOAIPHONG` varchar(10) NOT NULL,
  `IDKS` varchar(10) NOT NULL,
  `ANHPHONG` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`IDPHONG`, `TENPHONG`, `TRANGTHAI`, `IDLOAIPHONG`, `IDKS`, `ANHPHONG`) VALUES
('301', '301', '0', '1', '1', '1705423147_g6.jpg'),
('302', '302', '0', '2', '1', '1705423392_tải xuống.jpg'),
('303', '303', '1', '3', '1', '1705423195_g4.jpg'),
('401', '401', '0', '4', '3', '1705423206_g10.jpg'),
('402', '402', '1', '5', '4', '1705423228_services.jpg'),
('403', '403', '0', '6', '4', '1705423355_images (2).jpg'),
('501', '501', '0', '6', '2', '1705646618_7O1A2816.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `IDROLE` varchar(10) NOT NULL,
  `TYPE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`IDROLE`, `TYPE`) VALUES
('1', 'admin'),
('2', 'user_hotel');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ttkhachhang`
--

CREATE TABLE `ttkhachhang` (
  `IDKH` varchar(10) NOT NULL,
  `TENKH` varchar(200) NOT NULL,
  `CCCD` varchar(30) NOT NULL,
  `SDT` int(20) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `DIACHI` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ttkhachhang`
--

INSERT INTO `ttkhachhang` (`IDKH`, `TENKH`, `CCCD`, `SDT`, `EMAIL`, `DIACHI`) VALUES
('1', 'Thuận Vũ', '037202001111', 987564323, 'thuanvu@gmail.com', 'Yên Mô, Ninh Bình'),
('2', 'Bùi Trang', '037302002222', 93245476, 'buitrang@gmail.com', 'Nho Quan, Ninh Bình'),
('3', 'Đih Trang', '037982001730', 978543612, 'dinhtrang@gmail.com', 'Vĩnh Hưng, Hà Nội'),
('4', 'Đinh Thuận', '037304561894', 948128342, 'dinhthuan@gmail.com', 'Lĩnh Nam, Hà Nội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `IDUSER` varchar(10) NOT NULL,
  `FULLNAME` varchar(200) NOT NULL,
  `USERNAME` varchar(200) NOT NULL,
  `IDROLE` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`IDUSER`, `FULLNAME`, `USERNAME`, `IDROLE`, `password`) VALUES
('1', 'Admin', 'admin', '1', 'admin'),
('2', 'admin12', 'admin12', '1', '1232'),
('3', 'admin1', 'admin1', '1', '123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`IDDM`),
  ADD KEY `IDNCC` (`IDNCC`),
  ADD KEY `IDKS` (`IDKS`);

--
-- Chỉ mục cho bảng `datphong`
--
ALTER TABLE `datphong`
  ADD PRIMARY KEY (`IDDP`),
  ADD KEY `IDKH` (`IDKH`),
  ADD KEY `IDPHONG` (`IDPHONG`),
  ADD KEY `IDUSER` (`IDUSER`);

--
-- Chỉ mục cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`IDDV`),
  ADD KEY `IDDM` (`IDDM`);

--
-- Chỉ mục cho bảng `khachsan`
--
ALTER TABLE `khachsan`
  ADD PRIMARY KEY (`IDKS`);

--
-- Chỉ mục cho bảng `loaiphong`
--
ALTER TABLE `loaiphong`
  ADD PRIMARY KEY (`IDLOAIPHONG`);

--
-- Chỉ mục cho bảng `nhacc`
--
ALTER TABLE `nhacc`
  ADD PRIMARY KEY (`IDNCC`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`IDPHONG`),
  ADD KEY `IDLOAIPHONG` (`IDLOAIPHONG`),
  ADD KEY `IDKS` (`IDKS`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`IDROLE`);

--
-- Chỉ mục cho bảng `ttkhachhang`
--
ALTER TABLE `ttkhachhang`
  ADD PRIMARY KEY (`IDKH`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IDUSER`),
  ADD KEY `IDROLE` (`IDROLE`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD CONSTRAINT `danhmuc_ibfk_1` FOREIGN KEY (`IDNCC`) REFERENCES `nhacc` (`IDNCC`),
  ADD CONSTRAINT `danhmuc_ibfk_2` FOREIGN KEY (`IDKS`) REFERENCES `khachsan` (`IDKS`);

--
-- Các ràng buộc cho bảng `datphong`
--
ALTER TABLE `datphong`
  ADD CONSTRAINT `datphong_ibfk_1` FOREIGN KEY (`IDKH`) REFERENCES `ttkhachhang` (`IDKH`),
  ADD CONSTRAINT `datphong_ibfk_2` FOREIGN KEY (`IDPHONG`) REFERENCES `phong` (`IDPHONG`),
  ADD CONSTRAINT `datphong_ibfk_3` FOREIGN KEY (`IDUSER`) REFERENCES `user` (`IDUSER`);

--
-- Các ràng buộc cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  ADD CONSTRAINT `dichvu_ibfk_1` FOREIGN KEY (`IDDM`) REFERENCES `danhmuc` (`IDDM`);

--
-- Các ràng buộc cho bảng `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `phong_ibfk_1` FOREIGN KEY (`IDLOAIPHONG`) REFERENCES `loaiphong` (`IDLOAIPHONG`),
  ADD CONSTRAINT `phong_ibfk_2` FOREIGN KEY (`IDKS`) REFERENCES `khachsan` (`IDKS`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`IDROLE`) REFERENCES `role` (`IDROLE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
