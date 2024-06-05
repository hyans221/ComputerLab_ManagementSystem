-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th6 03, 2024 lúc 06:02 AM
-- Phiên bản máy phục vụ: 10.5.20-MariaDB
-- Phiên bản PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `id22020983_qlpmt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `ma` varchar(30) NOT NULL,
  `ten` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `sdt` varchar(10) NOT NULL,
  `diachi` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `tendangnhap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `matkhau` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`ma`, `ten`, `ngaysinh`, `gioitinh`, `sdt`, `diachi`, `tendangnhap`, `matkhau`) VALUES
('Admin', 'Huynh Huy Hung', '1974-05-23', 'Nam', '0353550754', '1/215', 'huyhung', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_hocphan`
--

CREATE TABLE `ct_hocphan` (
  `maLHP` varchar(30) NOT NULL,
  `maGV` varchar(30) NOT NULL,
  `maSV` varchar(30) NOT NULL,
  `tenLHP` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `hotenGV` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `hotenSV` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `ct_hocphan`
--

INSERT INTO `ct_hocphan` (`maLHP`, `maGV`, `maSV`, `tenLHP`, `hotenGV`, `hotenSV`) VALUES
('12DHTH13', 'GV001', '2001215801', 'Lớp 12DHTH13', 'Park Hi Hun', 'Hihun'),
('12DHTH13', 'GV001', '2001215802', 'Lớp 12DHTH13', 'Park Hi Hun', 'Hihunn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_thuchanh`
--

CREATE TABLE `ct_thuchanh` (
  `maLTH` varchar(30) NOT NULL,
  `maGV` varchar(30) NOT NULL,
  `ngayTH` date DEFAULT NULL,
  `hotenGV` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ca` varchar(30) DEFAULT NULL,
  `gioBD` time DEFAULT NULL,
  `gioKT` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `ct_thuchanh`
--

INSERT INTO `ct_thuchanh` (`maLTH`, `maGV`, `ngayTH`, `hotenGV`, `ca`, `gioBD`, `gioKT`) VALUES
('12DHTH02', 'GV001', '2024-05-16', 'Park Hi Hun', 'Ca Sáng', '12:18:00', '15:18:00'),
('12DHTH3', 'GV001', '2024-06-07', NULL, 'Ca Sáng', '17:51:00', '06:51:00'),
('12DHTH03', 'GV001', '2024-06-19', NULL, 'Ca Sáng', '20:00:00', '12:30:00'),
('12DHTH07', 'GV001', '2024-06-06', NULL, 'Ca Sáng', '20:42:00', '12:42:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaovien`
--

CREATE TABLE `giaovien` (
  `maGV` varchar(30) NOT NULL,
  `hotenGV` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `chuyennganh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinhGV` date DEFAULT NULL,
  `gioitinhGV` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `sdtGV` varchar(10) NOT NULL,
  `diachiGV` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `avatar` varchar(255) NOT NULL,
  `tendangnhap` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `matkhau` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `giaovien`
--

INSERT INTO `giaovien` (`maGV`, `hotenGV`, `chuyennganh`, `ngaysinhGV`, `gioitinhGV`, `sdtGV`, `diachiGV`, `avatar`, `tendangnhap`, `matkhau`) VALUES
('GV001', 'Park Hi Hun', 'Công nghệ thông tin', '2003-05-08', 'Nam', '0353550754', '1/215', 'peeps-avatar-alpha11.png', 'hihun', '123'),
('GV002', 'Hà Văn Thy', 'CNTT', '1999-01-02', 'Nam', '0353555012', '1/565', 'peeps-avatar.png', 'vanthy', '123'),
('GV003', 'Nguyễn Thị Thu Thảo', 'CNTT', '1998-07-02', 'Nữ', '0353555017', '1/126', '665c744965be0.jpg', 'thuthao', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichthuchanh`
--

CREATE TABLE `lichthuchanh` (
  `maLTH` varchar(30) NOT NULL,
  `ngayTH` date DEFAULT NULL,
  `noidungTH` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `maPM` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `lichthuchanh`
--

INSERT INTO `lichthuchanh` (`maLTH`, `ngayTH`, `noidungTH`, `maPM`) VALUES
('12DHTH02', '2024-05-16', 'web', 'A102'),
('12DHTH03', '2024-06-19', 'C#', 'A101'),
('12DHTH07', '2024-06-06', 'C++', 'A101');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophocphan`
--

CREATE TABLE `lophocphan` (
  `maLHP` varchar(30) NOT NULL,
  `tenLHP` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `tenHP` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `lophocphan`
--

INSERT INTO `lophocphan` (`maLHP`, `tenLHP`, `tenHP`) VALUES
('12DHTH13', 'Lớp 12DHTH13', 'php'),
('12DHTH15', 'Lớp 12DHTH15', 'Lập trình web'),
('12DHTH14', 'Lớp 12DHTH14', 'Mạng máy tính'),
('12DHTH16', 'Lớp 12DHTH16', 'C++');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `maytinh`
--

CREATE TABLE `maytinh` (
  `maMT` varchar(30) NOT NULL,
  `tenMT` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `tinhtrang` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `maPM` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `maytinh`
--

INSERT INTO `maytinh` (`maMT`, `tenMT`, `ngaynhap`, `tinhtrang`, `maPM`) VALUES
('M1PA102', 'Máy 1', '2024-05-29', 'Tốt', 'A102'),
('M1PA101', 'Máy 1', '2020-05-31', 'Tốt', 'A101'),
('M3PA101', 'Máy 3', '2020-05-31', 'Tốt', 'A101'),
('M4PA101', 'Máy 4', '2020-05-31', 'Tốt', 'A101'),
('M5PA101', 'Máy 5', '2020-05-31', 'Tốt', 'A101'),
('M6PA101', 'Máy 6', '2020-05-31', 'Tốt', 'A101'),
('M7PA101', 'Máy 7', '2020-05-31', 'Tốt', 'A101'),
('M8PA101', 'Máy 8', '2020-05-31', 'Tốt', 'A101'),
('M9PA101', 'Máy 9', '2020-05-31', 'Tốt', 'A101'),
('M10PA101', 'Máy 10', '2020-05-31', 'Tốt', 'A101'),
('M11PA101', 'Máy 11', '2020-05-31', 'Tốt', 'A101'),
('M12PA101', 'Máy 12', '2020-05-31', 'Tốt', 'A101'),
('M13PA101', 'Máy 13', '2020-05-31', 'Tốt', 'A101'),
('M14PA101', 'Máy 14', '2020-05-31', 'Tốt', 'A101'),
('M15PA101', 'Máy 15', '2020-05-31', 'Tốt', 'A101'),
('M16PA101', 'Máy 16', '2020-05-31', 'Tốt', 'A101'),
('M17PA101', 'Máy 17', '2020-05-31', 'Tốt', 'A101'),
('M18PA101', 'Máy 18', '2020-05-31', 'Tốt', 'A101'),
('M19PA101', 'Máy 19', '2020-05-31', 'Tốt', 'A101'),
('M20PA101', 'Máy 20', '2020-05-31', 'Tốt', 'A101'),
('M21PA101', 'Máy 21', '2020-05-31', 'Tốt', 'A101'),
('M22PA101', 'Máy 22', '2020-05-31', 'Tốt', 'A101'),
('M23PA101', 'Máy 23', '2020-05-31', 'Tốt', 'A101'),
('M24PA101', 'Máy 24', '2020-05-31', 'Tốt', 'A101'),
('M25PA101', 'Máy 25', '2020-05-31', 'Tốt', 'A101'),
('M26PA101', 'Máy 26', '2020-05-31', 'Tốt', 'A101'),
('M27PA101', 'Máy 27', '2020-05-31', 'Tốt', 'A101'),
('M28PA101', 'Máy 28', '2020-05-31', 'Tốt', 'A101'),
('M29PA101', 'Máy 29', '2020-05-31', 'Tốt', 'A101'),
('M30PA101', 'Máy 30', '2020-05-31', 'Tốt', 'A101'),
('M5PA102', 'Máy 5', '2024-05-28', 'Tốt', 'A102'),
('M2PA102', 'Máy 2', '2024-05-28', 'Tốt', 'A102'),
('M3PA102', 'Máy 3', '2024-05-28', 'Tốt', 'A102'),
('M4PA102', 'Máy 4', '2024-05-28', 'Tốt', 'A102'),
('M6PA102', 'Máy 6', '2024-05-28', 'Tốt', 'A102'),
('M7PA102', 'Máy 7', '2024-05-28', 'Tốt', 'A102'),
('M8PA102', 'Máy 8', '2024-05-28', 'Tốt', 'A102'),
('M9PA102', 'Máy 9', '2024-05-28', 'Tốt', 'A102'),
('M10PA102', 'Máy 10', '2024-05-28', 'Tốt', 'A102'),
('M11A102', 'Máy 11', '2024-05-28', 'Tốt', 'A102'),
('M12PA102', 'Máy 12', '2024-05-28', 'Tốt', 'A102'),
('M13PA102', 'Máy 13', '2024-05-28', 'Tốt', 'A102'),
('M14PA102', 'Máy 14', '2024-05-28', 'Tốt', 'A102'),
('M15PA102', 'Máy 15', '2024-05-28', 'Tốt', 'A102'),
('M16PA102', 'Máy 16', '2024-05-28', 'Tốt', 'A102'),
('M17A102', 'Máy 17', '2024-05-28', 'Tốt', 'A102'),
('M18A102', 'Máy 18', '2024-05-28', 'Tốt', 'A102'),
('M19A102', 'Máy 19', '2024-05-28', 'Tốt', 'A102'),
('M20A102', 'Máy 20', '2024-05-28', 'Tốt', 'A102'),
('M01PA103', 'Máy 1', '2024-06-03', 'Tốt', 'A103'),
('M02PA103', 'Máy 2', '2024-06-03', 'Tốt', 'A103'),
('M03PA103', 'Máy 3', '2024-06-03', 'Tốt', 'A103'),
('M04PA103', 'Máy 4', '2024-06-03', 'Tốt', 'A103'),
('M05PA103', 'Máy 5', '2024-06-03', 'Tốt', 'A103'),
('M06PA103', 'Máy 6', '2024-06-03', 'Tốt', 'A103'),
('M07PA103', 'Máy 7', '2024-06-03', 'Tốt', 'A103'),
('M08PA103', 'Máy 8', '2024-06-03', 'Tốt', 'A103'),
('M09PA103', 'Máy 9', '2024-06-03', 'Tốt', 'A103'),
('M10PA103', 'Máy 10', '2024-06-03', 'Tốt', 'A103'),
('M11PA103', 'Máy 11', '2024-06-03', 'Tốt', 'A103'),
('M12PA103', 'Máy 12', '2024-06-03', 'Tốt', 'A103'),
('M13PA103', 'Máy 13', '2024-06-03', 'Tốt', 'A103'),
('M14PA103', 'Máy 14', '2024-06-03', 'Tốt', 'A103'),
('M15PA103', 'Máy 15', '2024-06-03', 'Tốt', 'A103'),
('M16PA103', 'Máy 16', '2024-06-03', 'Tốt', 'A103'),
('M17PA103', 'Máy 17', '2024-06-03', 'Tốt', 'A103'),
('M18PA103', 'Máy 18', '2024-06-03', 'Tốt', 'A103'),
('M19PA103', 'Máy 19', '2024-06-03', 'Tốt', 'A103'),
('M20PA103', 'Máy 20', '2024-06-03', 'Tốt', 'A103'),
('M01PA104', 'Máy 1', '2024-06-03', 'Tốt', 'A104'),
('M02PA104', 'Máy 2', '2024-06-03', 'Tốt', 'A104'),
('M03PA104', 'Máy 3', '2024-06-03', 'Tốt', 'A104'),
('M04PA104', 'Máy 4', '2024-06-03', 'Tốt', 'A104'),
('M05PA104', 'Máy 5', '2024-06-03', 'Tốt', 'A104'),
('M06PA104', 'Máy 6', '2024-06-03', 'Tốt', 'A104'),
('M07PA104', 'Máy 7', '2024-06-03', 'Tốt', 'A104'),
('M08PA104', 'Máy 8', '2024-06-03', 'Tốt', 'A104'),
('M09PA104', 'Máy 9', '2024-06-03', 'Tốt', 'A104'),
('M10PA104', 'Máy 10', '2024-06-03', 'Tốt', 'A104'),
('M11PA104', 'Máy 11', '2024-06-03', 'Tốt', 'A104'),
('M12PA104', 'Máy 12', '2024-06-03', 'Tốt', 'A104'),
('M13PA104', 'Máy 13', '2024-06-03', 'Tốt', 'A104'),
('M14PA104', 'Máy 14', '2024-06-03', 'Tốt', 'A104'),
('M15PA104', 'Máy 15', '2024-06-03', 'Tốt', 'A104'),
('M16PA104', 'Máy 16', '2024-06-03', 'Tốt', 'A104'),
('M17PA104', 'Máy 17', '2024-06-03', 'Tốt', 'A104'),
('M18PA104', 'Máy 18', '2024-06-03', 'Tốt', 'A104'),
('M19PA104', 'Máy 19', '2024-06-03', 'Tốt', 'A104'),
('M20PA104', 'Máy 20', '2024-06-03', 'Tốt', 'A104'),
('M2PA101', 'Máy 2', '2024-05-28', 'Tốt', 'A102');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongmay`
--

CREATE TABLE `phongmay` (
  `maPM` varchar(30) NOT NULL,
  `tenPM` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `diadiemPM` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `phongmay`
--

INSERT INTO `phongmay` (`maPM`, `tenPM`, `diadiemPM`) VALUES
('A101', 'Phòng A101', 'Khu A cơ sở Lê Trọng Tấn'),
('A102', 'Phòng A102', 'Khu A Cơ sở Lê Trọng Tấn'),
('A103', 'Phòng A103', 'Khu A Cơ sở Lê Trọng Tấn'),
('A104', 'Phòng A104', 'Khu A Cơ sở Lê Trọng Tấn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `maSV` varchar(30) NOT NULL,
  `hotenSV` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ngaysinhSV` date DEFAULT NULL,
  `gioitinhSV` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `diachiSV` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`maSV`, `hotenSV`, `ngaysinhSV`, `gioitinhSV`, `diachiSV`) VALUES
('2001215801', 'Hihun', '2024-05-24', 'Nam', '1/215'),
('2001215802', 'Hihunn', '2024-05-24', 'Nam', '1/215');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ma`);

--
-- Chỉ mục cho bảng `ct_hocphan`
--
ALTER TABLE `ct_hocphan`
  ADD PRIMARY KEY (`maLHP`,`maGV`,`maSV`),
  ADD KEY `CTHP_GIAOVIEN_FK` (`maGV`),
  ADD KEY `CTHP_SINHVIEN_FK` (`maSV`);

--
-- Chỉ mục cho bảng `ct_thuchanh`
--
ALTER TABLE `ct_thuchanh`
  ADD PRIMARY KEY (`maLTH`,`maGV`),
  ADD KEY `CTLTH_GIAOVIEN_FK` (`maGV`);

--
-- Chỉ mục cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`maGV`);

--
-- Chỉ mục cho bảng `lichthuchanh`
--
ALTER TABLE `lichthuchanh`
  ADD PRIMARY KEY (`maLTH`),
  ADD KEY `FK_LICHTHUCHANH_PHONGMAY` (`maPM`);

--
-- Chỉ mục cho bảng `lophocphan`
--
ALTER TABLE `lophocphan`
  ADD PRIMARY KEY (`maLHP`);

--
-- Chỉ mục cho bảng `maytinh`
--
ALTER TABLE `maytinh`
  ADD PRIMARY KEY (`maMT`),
  ADD KEY `FK_MAYTINH_PHONGMAY` (`maPM`);

--
-- Chỉ mục cho bảng `phongmay`
--
ALTER TABLE `phongmay`
  ADD PRIMARY KEY (`maPM`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`maSV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
