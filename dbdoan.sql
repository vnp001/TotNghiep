-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 25, 2022 lúc 01:38 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dbdoan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bac`
--

CREATE TABLE `bac` (
  `Id` int(11) NOT NULL,
  `Id_Ngach` int(11) NOT NULL,
  `Id_ChucVu` int(11) NOT NULL,
  `TenBac` text NOT NULL,
  `HeSoLuong` float NOT NULL,
  `LuongCoBan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bac`
--

INSERT INTO `bac` (`Id`, `Id_Ngach`, `Id_ChucVu`, `TenBac`, `HeSoLuong`, `LuongCoBan`) VALUES
(1, 1, 3, 'Bậc 1', 1.3, 900000),
(2, 1, 3, 'Bậc 2', 1.23, 900000),
(3, 1, 3, 'Bậc 3', 1.32, 8000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bomon`
--

CREATE TABLE `bomon` (
  `Id_BoMon` int(20) NOT NULL,
  `TenBoMon` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bomon`
--

INSERT INTO `bomon` (`Id_BoMon`, `TenBoMon`) VALUES
(1, 'Điện tử viễn thông\r\n'),
(2, 'Giải tích\r\n'),
(3, 'Những Nguyên lý cơ bản của Chủ nghĩa Mác - Lênin\r\n'),
(4, 'Kế toán\r\n'),
(5, 'Hệ thống thông tin\r\n'),
(6, 'Tin học Đại cương\r\n'),
(7, 'Khoa học máy tính\r\n'),
(8, 'Mạng, hệ thống máy tính và phương pháp dạy học Tin học\r\n'),
(9, 'Tiếng Anh\r\n'),
(10, 'Khoa học máy tính\r\n'),
(11, 'Tin học Đại cương\r\n'),
(12, 'Mạng, hệ thống máy tính và phương pháp dạy học Tin học\r\n'),
(13, 'Hệ thống thông tin\r\n'),
(14, 'Địa lý kinh tế xã hội và phương pháp dạy học\r\n'),
(15, 'Địa lý bản đồ\r\n'),
(16, 'Không');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chamcong`
--

CREATE TABLE `chamcong` (
  `Id_ChamCong` int(20) NOT NULL,
  `Id_NhanVien` int(11) NOT NULL,
  `Ngay` date NOT NULL,
  `GioVao` time NOT NULL,
  `GioRa` time NOT NULL,
  `GioTangCa` time NOT NULL,
  `GioBS` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chamcong`
--

INSERT INTO `chamcong` (`Id_ChamCong`, `Id_NhanVien`, `Ngay`, `GioVao`, `GioRa`, `GioTangCa`, `GioBS`) VALUES
(1, 14, '2022-04-01', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(4, 16, '2022-04-07', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(5, 14, '2022-04-20', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(6, 1, '2022-04-26', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(7, 14, '2022-05-02', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(8, 16, '2022-05-02', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(9, 14, '2022-05-03', '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(10, 14, '2022-05-05', '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(11, 14, '2022-05-04', '07:00:00', '12:00:00', '00:00:00', '00:00:00'),
(13, 14, '2022-05-07', '07:00:00', '17:00:00', '08:48:14', '08:48:14'),
(14, 16, '2022-05-07', '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(15, 14, '2022-05-06', '07:00:00', '17:00:00', '17:11:49', '17:11:49'),
(19, 16, '2022-05-03', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(21, 16, '2022-05-04', '07:27:00', '15:27:00', '00:00:00', '00:00:00'),
(22, 16, '2022-05-05', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(23, 16, '2022-05-06', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(24, 16, '2022-05-09', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(25, 16, '2022-05-10', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(27, 14, '2022-05-11', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(51, 14, '2022-05-12', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(52, 14, '2022-05-13', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(53, 14, '2022-05-09', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(54, 14, '2022-05-10', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(55, 16, '2022-05-11', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(56, 33, '2022-05-09', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(68, 14, '2022-06-03', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(69, 16, '2022-06-02', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(70, 33, '2022-06-02', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(71, 16, '2022-06-03', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(72, 16, '2022-06-04', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(73, 14, '2022-06-04', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(75, 14, '2022-06-02', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(76, 33, '2022-06-03', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(77, 33, '2022-06-04', '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(78, 14, '2022-06-06', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(86, 33, '2022-06-06', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(87, 16, '2022-06-06', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(89, 34, '2022-06-02', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(90, 35, '2022-06-02', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(91, 34, '2022-06-06', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(92, 35, '2022-06-06', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(93, 34, '2022-06-03', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(94, 34, '2022-06-04', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(95, 34, '2022-06-07', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(96, 35, '2022-06-03', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(97, 35, '2022-06-04', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(98, 14, '2022-06-07', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(99, 16, '2022-06-07', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(101, 33, '2022-06-07', '07:00:00', '16:00:00', '00:00:00', '00:00:00'),
(102, 35, '2022-06-07', '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(103, 14, '2022-04-12', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(105, 16, '2022-04-12', '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(107, 14, '2022-07-04', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(108, 16, '2022-07-04', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(110, 33, '2022-07-04', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(112, 34, '2022-07-04', '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(113, 35, '2022-07-04', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(114, 14, '2022-07-05', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(115, 16, '2022-07-05', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(116, 33, '2022-07-05', '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(118, 34, '2022-07-05', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(119, 35, '2022-07-05', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(120, 14, '2022-07-06', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(121, 16, '2022-07-06', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(122, 14, '2022-02-08', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(123, 14, '2022-08-01', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(124, 16, '2022-08-01', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(125, 33, '2022-08-01', '07:00:00', '17:09:00', '00:00:00', '00:00:00'),
(126, 34, '2022-08-01', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(127, 35, '2022-08-01', '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(128, 35, '2022-08-02', '07:00:00', '17:00:00', '00:00:00', '00:00:00'),
(129, 16, '2022-10-02', '07:00:00', '19:00:00', '00:00:00', '00:00:00'),
(130, 14, '2022-10-02', '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(131, 33, '2022-10-02', '07:00:00', '17:00:00', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chatbox`
--

CREATE TABLE `chatbox` (
  `Id_ChatBox` int(11) NOT NULL,
  `NguoiTao` int(11) DEFAULT NULL,
  `Id_PhongBan` int(11) DEFAULT NULL,
  `ToUser` int(11) DEFAULT NULL,
  `TenChatBox` text NOT NULL,
  `HinhAnh` text NOT NULL,
  `ThoiGian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chatbox`
--

INSERT INTO `chatbox` (`Id_ChatBox`, `NguoiTao`, `Id_PhongBan`, `ToUser`, `TenChatBox`, `HinhAnh`, `ThoiGian`) VALUES
(1, NULL, 3, NULL, 'Phòng Đào Tạo', 'cntt_ico_n.png', '2022-05-10 00:56:13'),
(2, NULL, 9, NULL, 'Phòng trao đổi thông tin', 'putin.jpg', '2022-05-10 00:58:00'),
(4, NULL, 3, NULL, 'phòng tấu hài', '51725861048_edeeaaef42_q.jpg', '2022-05-11 07:18:13'),
(8, 14, NULL, NULL, 'Phòng trao đổi thông tin', '51725861048_edeeaaef42_q.jpg', '2022-05-13 15:12:19'),
(10, 1, NULL, NULL, 'nhóm chat', '51725861048_edeeaaef42_q.jpg', '2022-05-13 15:39:00'),
(13, 1, 3, NULL, 'phòng đào tạo  1', '51725861048_edeeaaef42_q.jpg', '2022-05-16 02:19:33'),
(15, 1, NULL, 14, 'test', 'images.png', '2022-06-04 14:41:35'),
(17, 14, NULL, 16, 'hỏi đáp', 'hinhvanban2.png', '2022-06-04 15:05:06'),
(18, 33, NULL, 1, 'hỏi đáp', 'images.png', '2022-06-04 16:30:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `Id_ChucVu` int(20) NOT NULL,
  `TenChucVu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `HeSoPhuCap` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`Id_ChucVu`, `TenChucVu`, `HeSoPhuCap`) VALUES
(1, 'HT', 1.2),
(2, 'PHT', 1.2),
(3, 'PBTĐT', 1.2),
(4, 'BTĐU', 1.2),
(5, 'UVTV', 1.2),
(6, 'BTLC', 1.2),
(7, 'UVCĐBP', 1.2),
(8, 'TBM', 1.2),
(9, 'BTCB', 1.2),
(10, 'PBTCB', 1.2),
(11, 'CTCĐBP', 1.2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuyenmon`
--

CREATE TABLE `chuyenmon` (
  `Id_ChuyenMon` int(20) NOT NULL,
  `TenChuyenMon` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chuyenmon`
--

INSERT INTO `chuyenmon` (`Id_ChuyenMon`, `TenChuyenMon`) VALUES
(1, 'Điện - Điện tử\r\n'),
(2, 'Toán\r\n'),
(3, 'Kinh tế chính trị\r\n'),
(4, 'Tài chính - Ngân hàng\r\n'),
(5, 'Công nghệ thông tin\r\n'),
(6, 'Khoa học máy tính\r\n'),
(7, '\"Đảm bảo toán học \r\ncho máy tính và các \r\nhệ thống tính toán\"\r\n'),
(8, 'Mạng máy tính\r\n'),
(9, 'Đại số\r\n'),
(10, 'Công nghệ phần mềm\r\n'),
(11, 'Địa lý học (Địa lý kinh tế)\r\n'),
(12, 'Địa chính\r\n'),
(13, 'Địa lý tự nhiên\r\n'),
(14, 'Giáo dục thể chất\r\n'),
(15, 'Giáo dục quốc phòng\r\n'),
(16, 'Không');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congviec`
--

CREATE TABLE `congviec` (
  `Id_CongViec` int(11) NOT NULL,
  `Id_NhanVien` int(11) DEFAULT NULL,
  `Id_PhongBan` int(11) DEFAULT NULL,
  `NguoiGiao` int(11) NOT NULL,
  `Ngay` date NOT NULL,
  `ThoiGianBD` datetime NOT NULL,
  `ThoiGianKT` datetime NOT NULL,
  `NoiDung` text NOT NULL,
  `File` text NOT NULL,
  `MoTa` text DEFAULT NULL,
  `TienDo` int(11) NOT NULL,
  `TinhTrang` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `congviec`
--

INSERT INTO `congviec` (`Id_CongViec`, `Id_NhanVien`, `Id_PhongBan`, `NguoiGiao`, `Ngay`, `ThoiGianBD`, `ThoiGianKT`, `NoiDung`, `File`, `MoTa`, `TienDo`, `TinhTrang`) VALUES
(1, NULL, 3, 1, '2022-05-05', '2022-05-05 10:05:36', '2022-05-31 10:05:36', 'Công việc ngày mai...', '', 'Đã hoàn thành công việc giao', 90, 0),
(8, NULL, 3, 1, '2022-05-05', '2022-05-06 01:30:00', '2022-05-31 00:36:00', 'cong viec', '', '', 0, 3),
(12, NULL, 3, 1, '2022-05-26', '2022-05-26 18:51:00', '2022-05-31 10:05:36', '<p>test</p>', '', '', 0, 3),
(13, 16, NULL, 1, '2022-05-31', '2022-05-27 08:05:00', '2022-05-31 08:05:00', '<p>cong viec 2</p>', '', '<p>Đã hoàn thành công việc</p>', 95, 0),
(14, NULL, 3, 1, '2022-05-26', '2022-05-27 00:23:00', '2022-05-31 00:23:00', '<p>Công việc cho phòng đào tạo</p>', '', '<p>Đã hoàn thành các model đã giao</p>', 90, 0),
(15, 16, NULL, 14, '2022-05-28', '2022-05-28 19:20:00', '2022-05-31 17:20:00', '<p>Công việc 3</p>', '', NULL, 0, 3),
(16, 16, NULL, 14, '2022-05-28', '2022-05-28 19:20:00', '2022-05-31 17:20:00', '<p>Công việc 3</p>', '', NULL, 0, 3),
(17, 16, NULL, 14, '2022-05-28', '2022-05-28 19:20:00', '2022-05-31 17:20:00', '<p>Công việc 3</p>', '', NULL, 0, 3),
(18, 14, NULL, 1, '2022-05-28', '2022-05-28 17:31:00', '2022-05-29 18:31:00', '<p>công việc</p>', '', NULL, 0, 3),
(19, 16, NULL, 14, '2022-06-03', '2022-06-10 07:00:00', '2022-06-18 07:00:00', 'Xử lý giấy tờ&nbsp;', '', NULL, 0, 3),
(20, 16, NULL, 14, '2022-06-11', '2022-06-11 13:18:00', '2022-06-14 13:18:00', '<p>Xứ lý công việc</p>', '', NULL, 0, 3),
(21, NULL, 3, 1, '2022-07-12', '2022-07-12 18:56:00', '2022-07-31 18:56:00', '<p>Công việc</p>', '', NULL, 0, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `Id_DanhGia` int(11) NOT NULL,
  `NhanVien` int(11) NOT NULL,
  `Ngay` date NOT NULL,
  `NguoiDanhGia` text NOT NULL,
  `NoiDung` text NOT NULL,
  `HinhThuc` text NOT NULL,
  `File` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`Id_DanhGia`, `NhanVien`, `Ngay`, `NguoiDanhGia`, `NoiDung`, `HinhThuc`, `File`) VALUES
(9, 14, '2022-05-06', 'Lê Trọng Nghĩa', '<p>Thường xuyên làm việc chăm chỉ</p>', 'Theo dỗi làm việc', 'route.txt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `daotao`
--

CREATE TABLE `daotao` (
  `Id_DaoTao` int(20) NOT NULL,
  `Id_LoaiDaoTao` int(11) NOT NULL,
  `TenDaoTao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgayBatDau` date NOT NULL,
  `NgayKetThuc` date NOT NULL,
  `ChiPhi` double(8,2) NOT NULL,
  `NoiDung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoiDaoTao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `TinhTrang` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `daotao`
--

INSERT INTO `daotao` (`Id_DaoTao`, `Id_LoaiDaoTao`, `TenDaoTao`, `NgayBatDau`, `NgayKetThuc`, `ChiPhi`, `NoiDung`, `NoiDaoTao`, `TinhTrang`) VALUES
(1, 1, 'Tiếng anh', '2022-03-23', '2022-03-31', 0.00, '', 'quy nhơn', 0),
(4, 2, 'Đào tạo tin học', '2022-05-18', '2022-05-30', 20000.00, '', 'ĐH quy nhơn', 0),
(5, 1, 'chứng chỉ tiếng anh B2', '2022-06-13', '2022-07-13', 0.00, 'Đào tạo tiếng anh&nbsp;', 'Trường đại học quy nhơn', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvi`
--

CREATE TABLE `donvi` (
  `Id_DonVi` int(11) NOT NULL,
  `TenDonVi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donvi`
--

INSERT INTO `donvi` (`Id_DonVi`, `TenDonVi`) VALUES
(1, 'Ban Giám hiệu\r\n'),
(2, 'K. Công nghệ thông tin\r\n'),
(3, 'K. Địa lý - Địa chính\r\n'),
(4, 'K. GDTC - QP\r\n'),
(5, 'K. GDTH & MN\r\n	'),
(6, 'K. Hóa học\r\n'),
(7, 'K. Kinh tế & Kế toán\r\n'),
(8, 'K. Kỹ thuật & Công nghệ\r\n'),
(9, 'K. Lịch sử\r\n'),
(10, 'K. LLCT - HC\r\n'),
(11, 'K. Lý - KTCN\r\n'),
(12, 'K. Ngoại ngữ\r\n'),
(13, 'K. Ngữ văn\r\n'),
(14, 'K. TCNH & QTKD\r\n\r\n'),
(15, 'K. Sinh - KTNN\r\n\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hop`
--

CREATE TABLE `hop` (
  `Id` int(11) NOT NULL,
  `Id_PhongBan` int(11) DEFAULT NULL,
  `ThanhPhan` text NOT NULL,
  `DiaDiem` text NOT NULL,
  `NguoiChuTri` int(11) NOT NULL,
  `Ngay` date NOT NULL,
  `ThoiGian` time NOT NULL,
  `NoiDung` text NOT NULL,
  `File` text DEFAULT NULL,
  `TinhTrang` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hop`
--

INSERT INTO `hop` (`Id`, `Id_PhongBan`, `ThanhPhan`, `DiaDiem`, `NguoiChuTri`, `Ngay`, `ThoiGian`, `NoiDung`, `File`, `TinhTrang`) VALUES
(2, 3, 'Lãnh đạo TT. Tin học và các học viên', 'Phòng 122', 14, '2022-04-17', '22:34:00', '<p>&nbsp; <span style=\"background-color: rgb(255, 255, 255);\">&nbsp;&nbsp;<span style=\"color: rgb(115, 115, 115); font-family: Arial, tahoma, verdana; font-size: 11px; font-weight: 700;\">Ban Thường vụ Đoàn trường</span></span></p>', '', b'1'),
(3, 3, 'Lãnh đạo', 'Phòng 201', 16, '2022-04-18', '13:55:00', '<p>&nbsp; &nbsp; Test content<br></p>', '', b'1'),
(4, 3, 'Lãnh đạo cấp trường', 'Phong 202', 14, '2022-04-18', '19:56:00', '<p>&nbsp; &nbsp; Nội dung<br></p>', '', b'1'),
(5, 3, 'Lãnh đạo cấp trường', 'Phòng 122', 16, '2022-04-19', '07:40:00', '<p>&nbsp; &nbsp; content công việc 2<br></p>', '', b'1'),
(6, 3, 'Lãnh đạo TT. Tin học và các học viên', 'Phòng 202', 14, '2022-04-21', '01:01:00', '<p>&nbsp; &nbsp;&nbsp;<span style=\"color: rgb(115, 115, 115); font-family: Arial, tahoma, verdana; font-size: 11px; font-weight: 700;\">Làm việc với Sở Khoa học và Công nghệ Bình Định về thanh tra việc quản lý và tổ chức thực hiện đề tài \"Đánh giá thực trạng dạy và học môn võ cổ truyền Bình Định trong trường học phổ thông trên địa bàn tỉnh và đề xuất nội dung, phương pháp giảng dạy trong giờ học chính khóa cho học sinh phổ thông\"</span><font color=\"#737373\" face=\"Arial, tahoma, verdana\"><span style=\"font-size: 11px;\"><b>Công việc</b></span></font></p>Q', '', b'1'),
(7, NULL, 'Đại diện BGH, Trưởng Phòng: KHCN-HTQT, KH-TC, Kế toán thanh toán, Thư ký hành chính, Chủ nhiệm đề tài và Đoàn Thanh tra', 'Phong 202', 1, '2022-05-12', '10:00:00', '<p>&nbsp; &nbsp;&nbsp;<span style=\"color: rgb(115, 115, 115); font-family: Arial, tahoma, verdana; font-size: 11px; font-weight: 700;\">Làm việc với Sở Khoa học và Công nghệ Bình Định về thanh tra việc quản lý và tổ chức thực hiện đề tài \"Đánh giá thực trạng dạy và học môn võ cổ truyền Bình Định trong trường học phổ thông trên địa bàn tỉnh và đề xuất nội dung, phương pháp giảng dạy trong giờ học chính khóa cho học sinh phổ thông\"</span><font color=\"#737373\" face=\"Arial, tahoma, verdana\"><span style=\"font-size: 11px;\"><b>họp về Công việc</b></span></font></p>', 'BÀI THỰC HÀNH SỐ 4.docx', b'0'),
(8, NULL, 'Ban lãnh đạo', 'Phòng 121', 1, '2022-05-16', '17:00:00', '<p>Họp về tình hình chống dịch bệnh covic</p>', NULL, b'0'),
(9, 3, 'Lãnh đạo TT. Tin học và các học viên', 'Phòng 201', 1, '2022-05-16', '13:00:00', '<p>Họp về tình hình học tập sinh viên</p>', NULL, b'0'),
(11, 3, 'Trưởng phòng', 'Phòng 121', 14, '2022-06-02', '07:00:00', '<p>Họp báo cáo tiến độ công việc</p>', 'nghia.csv', b'0'),
(12, 3, 'phòng ban', 'Phòng 121', 14, '2022-06-03', '17:00:00', '<p>Họp</p>', 'BÀI THỰC HÀNH SỐ 4.docx', b'0'),
(14, 3, 'Lãnh đạo cấp trường', 'Phòng 122', 14, '2022-06-03', '18:00:00', '<p>Họp với lãnh đâọ cấp trường</p>', NULL, b'0'),
(15, 3, 'Thầy cô công nghệ thông tin', 'tầng 10', 1, '2022-06-06', '09:47:00', '<p>Họp đồ án</p>', NULL, b'0'),
(16, 3, 'Các nhân viên trong phòng ban', 'Phong 202', 14, '2022-06-11', '15:00:00', '<p>Họp báo cáo công việc</p>', NULL, b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ketquadaotao`
--

CREATE TABLE `ketquadaotao` (
  `Id_KetQuaDT` int(11) NOT NULL,
  `Id_NhanVien` int(11) NOT NULL,
  `Id_DaoTao` int(11) NOT NULL,
  `KetQua` text NOT NULL,
  `GhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ketquadaotao`
--

INSERT INTO `ketquadaotao` (`Id_KetQuaDT`, `Id_NhanVien`, `Id_DaoTao`, `KetQua`, `GhiChu`) VALUES
(1, 16, 1, 'Đậu', 'hoàn&nbsp; thành tốt khóa đào tạo'),
(6, 33, 1, 'Đậu', NULL),
(10, 14, 4, 'Đậu', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khenthuong`
--

CREATE TABLE `khenthuong` (
  `Id_Khenthuong` int(11) NOT NULL,
  `Id_NhanVien` int(11) NOT NULL,
  `MoTa` text NOT NULL,
  `Ngay` date NOT NULL,
  `Thuong` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khenthuong`
--

INSERT INTO `khenthuong` (`Id_Khenthuong`, `Id_NhanVien`, `MoTa`, `Ngay`, `Thuong`) VALUES
(1, 16, 'Đi làm xuất sắc', '2022-03-31', 0),
(2, 14, '<p>Làm việc chăm chỉ</p>', '2022-04-09', 222),
(3, 16, '<p>&nbsp; &nbsp; Đã hoành thành tốt công việc<br></p>', '2022-04-19', 200000),
(4, 14, 'Lãnh đạo phòng ban xuất sắc', '2022-06-02', 0),
(5, 16, '<p>Làm việc xuyên năng</p>', '2022-06-12', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kyluat`
--

CREATE TABLE `kyluat` (
  `Id_KyLuat` int(11) NOT NULL,
  `Id_NhanVien` int(11) NOT NULL,
  `MoTa` text NOT NULL,
  `Ngay` date NOT NULL,
  `Phat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `kyluat`
--

INSERT INTO `kyluat` (`Id_KyLuat`, `Id_NhanVien`, `MoTa`, `Ngay`, `Phat`) VALUES
(1, 16, ' Đi làm trễ ', '2022-03-31', 0),
(3, 14, '<p>Phạt đi trễ</p>', '2022-04-09', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaidaotao`
--

CREATE TABLE `loaidaotao` (
  `Id_LoaiDaoTao` int(11) NOT NULL,
  `TenLoaiDaoTao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaidaotao`
--

INSERT INTO `loaidaotao` (`Id_LoaiDaoTao`, `TenLoaiDaoTao`) VALUES
(1, 'Tín chỉ ngoại ngữ'),
(2, 'Tín chỉ tin học ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaivanban`
--

CREATE TABLE `loaivanban` (
  `Id_LoaiVanBan` int(11) NOT NULL,
  `TenLoaiVanBan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaivanban`
--

INSERT INTO `loaivanban` (`Id_LoaiVanBan`, `TenLoaiVanBan`) VALUES
(1, 'Khen thưởng'),
(3, 'Kỹ luật'),
(4, 'Tuyển dụng'),
(5, 'Thông báo'),
(6, 'Khác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaiyeucau`
--

CREATE TABLE `loaiyeucau` (
  `Id_LoaiYeuCau` int(11) NOT NULL,
  `TenLoaiYeuCau` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaiyeucau`
--

INSERT INTO `loaiyeucau` (`Id_LoaiYeuCau`, `TenLoaiYeuCau`) VALUES
(1, 'Nghỉ phép'),
(2, 'Tăng ca'),
(3, 'Xử lý thông tin'),
(4, 'Nghỉ việc'),
(5, 'Lương'),
(6, 'Khác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luong`
--

CREATE TABLE `luong` (
  `Id_Luong` int(11) NOT NULL,
  `Id_NhanVien` int(11) NOT NULL,
  `Id_Bac` int(11) DEFAULT NULL,
  `Ngay` date NOT NULL,
  `TongNgayLam` int(11) NOT NULL,
  `TongLuong` float NOT NULL,
  `TinhTrang` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `luong`
--

INSERT INTO `luong` (`Id_Luong`, `Id_NhanVien`, `Id_Bac`, `Ngay`, `TongNgayLam`, `TongLuong`, `TinhTrang`) VALUES
(5, 16, 1, '2022-05-01', 4, 200571, b'1'),
(8, 14, 2, '2022-04-01', 3, 142551, b'1'),
(9, 14, 2, '2022-05-01', 9, 416571, b'1'),
(10, 33, 2, '2022-05-01', 1, 46286, b'1'),
(12, 14, 2, '2022-06-01', 5, 237214, b'1'),
(14, 16, 3, '2022-06-01', 5, 250714, b'1'),
(15, 33, 2, '2022-06-01', 4, 189771, b'1'),
(24, 34, 3, '2022-06-01', 5, 2262860, b'1'),
(25, 35, 3, '2022-06-01', 4, 1810290, b'1'),
(26, 14, 2, '2022-07-01', 3, 142329, b'1'),
(30, 34, 3, '2022-07-01', 1, 452571, b'1'),
(32, 35, 3, '2022-07-01', 2, 905143, b'1'),
(34, 16, 3, '2022-07-01', 3, 1357710, b'1'),
(35, 33, 2, '2022-07-01', 1, 47443, b'1'),
(37, 14, 2, '2022-08-01', 1, 47443, b'1'),
(38, 16, 3, '2022-08-01', 1, 452571, b'1'),
(39, 33, 2, '2022-08-01', 1, 47443, b'1'),
(40, 34, 3, '2022-08-01', 1, 452571, b'1'),
(41, 35, 3, '2022-08-01', 1, 452571, b'1'),
(42, 14, 2, '2022-10-01', 0, 0, b'0'),
(43, 16, 3, '2022-10-01', 1, 452571, b'0'),
(44, 33, 2, '2022-10-01', 1, 47443, b'0'),
(45, 34, 3, '2022-10-01', 1, 1, b'0'),
(46, 35, 3, '2022-10-01', 1, 1, b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ngach`
--

CREATE TABLE `ngach` (
  `Id` int(11) NOT NULL,
  `MaNgach` int(11) NOT NULL,
  `Ngach` text NOT NULL,
  `MoTa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ngach`
--

INSERT INTO `ngach` (`Id`, `MaNgach`, `Ngach`, `MoTa`) VALUES
(1, 1, 'Giảng viên cao cấp hạng I', ''),
(2, 2, 'Giáo viên dự bị đại học hạng I', ''),
(3, 3, 'Giáo viên dự bị đại học hạng II', ''),
(4, 4, 'Giáo viên dự bị đại học hạng III', '<p>Giảng viên dự bị hạng 3</p>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `Id_NhanVien` int(20) NOT NULL,
  `Id_ChucVu` int(11) DEFAULT NULL,
  `Id_PhongBan` int(11) DEFAULT NULL,
  `Id_ChuyenMon` int(11) DEFAULT NULL,
  `Id_TDChuyenMon` int(11) DEFAULT NULL,
  `Id_NgoaiNgu` int(11) DEFAULT NULL,
  `Id_ChinhTri` int(11) DEFAULT NULL,
  `Id_TinHoc` int(11) DEFAULT NULL,
  `Id_BoMon` int(11) DEFAULT NULL,
  `Id_PhanQuyen` int(11) DEFAULT NULL,
  `Id_DonVi` int(11) DEFAULT NULL,
  `Ho` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `CMND` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `DanToc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `SDT` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoiSinh` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `QueQuan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `DaVaoDang` tinyint(1) NOT NULL,
  `BienChe` tinyint(1) NOT NULL,
  `BatDauCongTac` date NOT NULL,
  `NgayVaoTruong` date NOT NULL,
  `Email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `HinhAnh` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenTk` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `MatKhau` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `TrangThai` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`Id_NhanVien`, `Id_ChucVu`, `Id_PhongBan`, `Id_ChuyenMon`, `Id_TDChuyenMon`, `Id_NgoaiNgu`, `Id_ChinhTri`, `Id_TinHoc`, `Id_BoMon`, `Id_PhanQuyen`, `Id_DonVi`, `Ho`, `Ten`, `NgaySinh`, `GioiTinh`, `CMND`, `DanToc`, `SDT`, `DiaChi`, `NoiSinh`, `QueQuan`, `DaVaoDang`, `BienChe`, `BatDauCongTac`, `NgayVaoTruong`, `Email`, `HinhAnh`, `TenTk`, `MatKhau`, `TrangThai`) VALUES
(1, 1, 9, 1, 1, 1, 1, 1, 1, 1, 1, 'Lê Trọng', 'Nghĩa', '2022-03-11', 'Nam', '215492052', 'Kinh', '0353326143', 'Quy nhơn', 'Bình định', 'Bình định', 0, 0, '2022-03-01', '2022-03-09', 'lenghia09102000@gmail.com', 'anhthe2.jpg', 'trongnghia', '123', b'0'),
(14, 4, 3, 14, 1, 1, 1, 1, 14, 2, 14, 'Nguyễn Thị', 'Nhi', '2022-03-03', 'Nữ', '5313132', 'Kinh', '0353326138', 'Quy nhơn', 'Bình định', 'Bình định', 1, 1, '2022-04-16', '2022-04-15', 'letrongnghia123@gmail.com', 'anhthe3.jpg', 'nguyennhi', '123', b'1'),
(16, 1, 3, 1, 1, 1, 1, 1, 1, 2, 1, 'Lê Văn', 'Trung', '2022-04-14', 'Nam', '56132132', 'Kinh', '0353326182', 'Quy nhơn', 'binh dinh', 'binh dinh', 0, 0, '2022-04-06', '2022-04-08', 'letrongnghia123@gmail.com', 'anhthe4.jpg', 'vantrung', '123', b'0'),
(33, 3, 2, 6, 1, 1, 1, 1, 7, 2, 2, 'Lê thị ánh', 'tuyền', '2022-05-10', 'Nữ', '313216', 'Kinh', '035332614', 'Bình định', 'An nhơn', 'Bình định', 0, 1, '2022-05-10', '2022-05-10', 'anhtuyen@gmail.com', 'hinhthe5.png', 'anhtuyen', '123', b'0'),
(34, 2, 2, 2, 1, 1, 1, 1, 2, 2, 7, 'Lê Văn', 'Nhân', '2000-10-20', 'Nam', '252676237672', 'Kinh', '035261421', 'Quy nhơn', 'Bình định', 'Bình định', 0, 0, '2022-10-10', '2022-10-10', 'levannhan@gmail.com', 'anhthe7.jpg', 'vannhan', '123', b'0'),
(35, 2, 3, 2, 1, 1, 1, 1, 2, 2, 7, 'Lê Văn', 'Thiện', '2000-10-22', 'Nam', '21254231321', 'Kinh', '035261421', 'Quy nhơn', 'Gia lai', 'Gia lai', 1, 0, '2022-10-10', '2022-10-10', 'levanthien@gmail.com', 'anhthe9.jpg', 'vanthien', '123', b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `noidungchat`
--

CREATE TABLE `noidungchat` (
  `Id` int(11) NOT NULL,
  `Id_ChatBox` int(11) NOT NULL,
  `Id_NhanVien` int(11) NOT NULL,
  `NoiDung` text DEFAULT NULL,
  `ThoiGian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `noidungchat`
--

INSERT INTO `noidungchat` (`Id`, `Id_ChatBox`, `Id_NhanVien`, `NoiDung`, `ThoiGian`) VALUES
(1, 1, 14, 'chào các bạn', '2022-05-10 14:31:16'),
(2, 1, 16, 'chào bạn', '2022-05-10 14:33:33'),
(3, 2, 1, 'Chao ae', '2022-05-10 14:44:23'),
(5, 1, 1, 'nghĩa', '2022-05-10 09:48:15'),
(6, 1, 1, 'test', '2022-05-10 09:52:35'),
(7, 1, 1, 'Như vậy các em có thể thấy Ajax được sử dụng để vẽ lại giao diện cho phần mà ta muốn thay đổi chứ không reload lại toàn trang web. Như các em biết khi reload toàn trang web thì lúc này trình duyệt sẽ vẽ lại tất cả các phần tử trên web và sẽ mất rất nhiều thời gian để vẽ toàn bộ các phần tử. Dẫn đến việc là người dùng sẽ chờ đợi rất lâu mới thấy được trang web', '2022-05-10 10:44:42'),
(9, 1, 1, 'Như vậy các em có thể thấy Ajax được sử dụng để vẽ lại giao diện cho phần mà ta muốn thay đổi chứ không reload lại toàn trang web. Như các em biết khi reload toàn trang web thì lúc này trình duyệt sẽ vẽ lại tất cả các phần tử trên web và sẽ mất rất nhiều thời gian để vẽ toàn bộ các phần tử. Dẫn đến việc là người dùng sẽ chờ đợi rất lâu mới thấy được trang web', '2022-05-10 10:46:27'),
(10, 1, 1, 'chào bạn', '2022-05-10 10:49:07'),
(18, 1, 1, 'chaof', '2022-05-10 16:20:52'),
(19, 1, 1, 'text', '2022-05-10 16:37:16'),
(20, 2, 1, 'nghĩa', '2022-05-11 06:25:34'),
(21, 2, 1, 'ưef', '2022-05-11 06:29:04'),
(22, 2, 1, 'sdfdfs', '2022-05-11 06:29:14'),
(35, 4, 1, 'Chào các bạn', '2022-05-11 07:28:53'),
(36, 1, 1, 'cc', '2022-05-12 04:22:19'),
(37, 1, 1, 'bkjkjsa', '2022-05-12 04:22:27'),
(38, 1, 14, 'asd', '2022-05-13 11:37:48'),
(39, 1, 14, 'asd', '2022-05-13 11:38:47'),
(40, 1, 1, 'test 2', '2022-05-13 11:49:43'),
(41, 1, 14, 'chào', '2022-05-13 12:21:58'),
(55, 1, 14, 'chào', '2022-05-15 16:13:43'),
(56, 1, 14, 'hello', '2022-05-15 16:05:00'),
(57, 13, 1, 'hôm nay có cuộc họp gấp', '2022-05-16 02:20:15'),
(58, 13, 14, 'test', '2022-05-16 02:05:00'),
(59, 13, 1, 'asd', '2022-05-16 16:09:26'),
(60, 8, 14, 'alo', '2022-05-27 09:05:00'),
(61, 8, 14, 'hello every body', '2022-05-27 09:05:00'),
(62, 13, 1, 'aksjdh', '2022-06-04 00:23:24'),
(63, 10, 1, 'hello everybody', '2022-06-04 14:05:02'),
(65, 17, 14, 'trao đổi thông tin', '2022-06-04 15:06:00'),
(66, 17, 16, 'Trao đổi thông tin gì v ạ trưởng phòng', '2022-06-04 15:06:00'),
(67, 18, 33, 'cho e hỏi về công việc mà anh đã giao', '2022-06-04 16:06:00'),
(68, 18, 1, 'à cái vấn đề công việc anh giao à', '2022-06-04 16:33:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanquyen`
--

CREATE TABLE `phanquyen` (
  `Id_PhanQuyen` int(11) NOT NULL,
  `TenQuyen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phanquyen`
--

INSERT INTO `phanquyen` (`Id_PhanQuyen`, `TenQuyen`) VALUES
(1, 'Quản lý'),
(2, 'Nhân viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongban`
--

CREATE TABLE `phongban` (
  `Id_PhongBan` int(11) NOT NULL,
  `TenPhongBan` text NOT NULL,
  `NguoiQuanLy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phongban`
--

INSERT INTO `phongban` (`Id_PhongBan`, `TenPhongBan`, `NguoiQuanLy`) VALUES
(1, 'Phòng công tác chính trị & sinh viên', NULL),
(2, 'Phòng cơ sở vật chất', NULL),
(3, 'Phòng Đào tạo', 14),
(4, 'Phòng kế hoạch - tài chính', 33),
(5, 'Phòng Khảo thí & BĐCL', NULL),
(6, 'Phòng Hành chính- Tổng hợp', NULL),
(7, 'Phòng Thanh tra - Pháp chế', NULL),
(8, 'Phòng Tổ chức - Nhân sự', NULL),
(9, 'Phòng quản lý', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tailieu`
--

CREATE TABLE `tailieu` (
  `Id_TaiLieu` int(11) NOT NULL,
  `Id_NhanVien` int(11) NOT NULL,
  `TaiLieu` text NOT NULL,
  `MoTa` text NOT NULL,
  `ThoiGian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tailieu`
--

INSERT INTO `tailieu` (`Id_TaiLieu`, `Id_NhanVien`, `TaiLieu`, `MoTa`, `ThoiGian`) VALUES
(1, 16, 'trí tuệ nhân tạo B1.txt', 'Giấy tờ đăng kiểm', '2022-04-25 10:02:21'),
(2, 1, 'Đặt đồ.xlsx', '<p>&nbsp; &nbsp; test<br></p>', '2022-04-25 04:30:58'),
(10, 14, 'BÀI THỰC HÀNH SỐ 4.docx', '<p>Tài liệu này rất hay</p>', '2022-04-28 09:24:34'),
(11, 14, 'thẻ cổ phiếu.txt', 'Cổ phiếu', '2022-04-28 09:44:47'),
(12, 14, 'DSCB_DHQN tham khao.xls', '<p>Danh sách thông tin nhân viên</p>', '2022-04-28 09:45:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `Id` int(11) NOT NULL,
  `NguoiGui` int(11) NOT NULL,
  `NguoiNhan` int(11) DEFAULT NULL,
  `PhongBan` int(11) DEFAULT NULL,
  `NoiDung` text NOT NULL,
  `ThoiGian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thongbao`
--

INSERT INTO `thongbao` (`Id`, `NguoiGui`, `NguoiNhan`, `PhongBan`, `NoiDung`, `ThoiGian`) VALUES
(2, 14, 1, NULL, 'xử lý Yêu cầu về xử lý thông tin ', '2022-05-28 07:51:32'),
(3, 1, 14, NULL, 'đã duyệt yêu cầu', '2022-05-28 08:32:09'),
(4, 1, 14, NULL, 'đã duyệt yêu cầu', '2022-05-28 15:42:59'),
(5, 1, 14, NULL, 'đã giao việc cho bạn', '2022-05-28 17:32:05'),
(6, 14, NULL, 3, 'Thông báo cuộc họp', '2022-06-03 15:48:17'),
(7, 14, NULL, 3, 'Thông báo cuộc họp', '2022-06-03 16:03:50'),
(8, 14, 16, NULL, 'đã giao việc cho bạn', '2022-06-03 16:18:11'),
(9, 1, NULL, 3, 'Thông báo cuộc họp', '2022-06-06 09:48:00'),
(10, 14, 1, NULL, ' Yêu cầu xử lý về Lương', '2022-06-06 10:13:15'),
(11, 1, 14, NULL, 'đã duyệt yêu cầu', '2022-06-06 10:13:50'),
(12, 14, NULL, 3, 'Thông báo cuộc họp', '2022-06-11 13:16:57'),
(13, 14, 16, NULL, 'đã giao việc cho bạn', '2022-06-11 13:18:25'),
(14, 1, 35, NULL, 'đã duyệt yêu cầu', '2022-06-12 13:07:42'),
(15, 1, 35, NULL, 'đã duyệt yêu cầu', '2022-06-12 13:07:47'),
(16, 1, 35, NULL, 'đã duyệt yêu cầu', '2022-06-12 13:07:56'),
(17, 1, 35, NULL, 'đã duyệt yêu cầu', '2022-06-12 13:08:41'),
(18, 1, 35, NULL, 'đã duyệt yêu cầu', '2022-06-12 13:09:03'),
(19, 1, 35, NULL, 'đã duyệt yêu cầu', '2022-06-12 13:09:08'),
(20, 1, 35, NULL, 'Không duyệt yêu cầu', '2022-06-12 13:09:27'),
(21, 1, 35, NULL, 'đã duyệt yêu cầu', '2022-06-12 13:09:32'),
(22, 1, 35, NULL, 'Không duyệt yêu cầu', '2022-06-12 13:09:36'),
(23, 1, NULL, NULL, 'đã giao việc cho bạn', '2022-07-12 11:56:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trinhdochinhtri`
--

CREATE TABLE `trinhdochinhtri` (
  `Id_ChinhTri` int(11) NOT NULL,
  `TrinhDo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `trinhdochinhtri`
--

INSERT INTO `trinhdochinhtri` (`Id_ChinhTri`, `TrinhDo`) VALUES
(1, 'Tiến sĩ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trinhdochuyenmon`
--

CREATE TABLE `trinhdochuyenmon` (
  `Id_TDChuyenMon` int(11) NOT NULL,
  `TrinhDo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `trinhdochuyenmon`
--

INSERT INTO `trinhdochuyenmon` (`Id_TDChuyenMon`, `TrinhDo`) VALUES
(1, 'Tiến sĩ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trinhdongoaingu`
--

CREATE TABLE `trinhdongoaingu` (
  `Id_NgoaiNgu` int(11) NOT NULL,
  `TrinhDo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `trinhdongoaingu`
--

INSERT INTO `trinhdongoaingu` (`Id_NgoaiNgu`, `TrinhDo`) VALUES
(1, 'Tiến sĩ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trinhdotinhoc`
--

CREATE TABLE `trinhdotinhoc` (
  `Id_TinHoc` int(11) NOT NULL,
  `TrinhDo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `trinhdotinhoc`
--

INSERT INTO `trinhdotinhoc` (`Id_TinHoc`, `TrinhDo`) VALUES
(1, 'Tiến sĩ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vanban`
--

CREATE TABLE `vanban` (
  `Id_VanBan` int(11) NOT NULL,
  `Id_NhanVien` int(11) NOT NULL,
  `Id_LoaiVanBan` int(11) NOT NULL,
  `soVB` int(11) NOT NULL,
  `TenVanBan` text NOT NULL,
  `Ngay` date DEFAULT NULL,
  `NoiDung` text NOT NULL,
  `HinhAnh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `vanban`
--

INSERT INTO `vanban` (`Id_VanBan`, `Id_NhanVien`, `Id_LoaiVanBan`, `soVB`, `TenVanBan`, `Ngay`, `NoiDung`, `HinhAnh`) VALUES
(1, 14, 1, 1, 'Văn Bản Tuyển dụng', '2022-05-11', '<p style=\"margin-right: 0px; margin-bottom: 24px; margin-left: 0px; border: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: 1.44; vertical-align: baseline;\"><span style=\"text-align: justify;\">Nghị định 35/2022/NĐ-CP quy định nhà đầu tư thực hiện dự án đầu tư xây dựng và kinh doanh kết cấu hạ tầng khu công nghiệp phải đáp ứng các điều kiện sau đây:</span><br style=\"text-align: justify;\"><span style=\"text-align: justify;\">1- Điều kiện kinh doanh bất động sản theo quy định của pháp luật về kinh doanh bất động sản.</span><br style=\"text-align: justify;\"><span style=\"text-align: justify;\">2- Điều kiện để được Nhà nước giao đất, cho thuê đất, chuyển mục đích sử dụng đất để thực hiện dự án đầu tư xây dựng và kinh doanh kết cấu hạ tầng khu công nghiệp theo quy định của pháp luật về đất đai, pháp luật về lâm nghiệp và quy định khác của pháp luật có liên quan.</span><br style=\"text-align: justify;\"><span style=\"text-align: justify;\">Trường hợp nhà đầu tư thực hiện dự án đầu tư xây dựng và kinh doanh kết cấu hạ tầng khu công nghiệp là tổ chức kinh tế do nhà đầu tư nước ngoài dự kiến thành lập theo quy định của pháp luật về đầu tư và pháp luật về doanh nghiệp thì tổ chức kinh tế dự kiến thành lập phải có khả năng đáp ứng điều kiện để được Nhà nước giao đất, cho thuê đất, cho phép chuyển mục đích sử dụng đất theo quy định của pháp luật về đất đai, pháp luật về lâm nghiệp và quy định khác của pháp luật có liên quan.</span>﻿<br></p>', 'hinhvanban2.png'),
(3, 1, 4, 2, 'Tuyển dụng', '2022-05-20', '<p><span style=\"text-align: justify;\">Nghị định&nbsp;gồm 08 Chương, 76 Điều, quy định những vấn đề chung; đầu tư hạ tầng, thành lập khu công nghiệp, khu kinh tế; chính sách phát triển khu công nghiệp, khu kinh tế; một số loại hình khu công nghiệp và khu công nghiệp - dịch vụ - đô thị; hệ thống thông tin quốc gia về khu công nghiệp, khu kinh tế; quản lý nhà nước đối với khu công nghiệp, khu kinh tế; chức năng, nhiệm vụ, quyền hạn và cơ cấu tổ chức của Ban quản lý khu công nghiệp, khu chế xuất, khu kinh tế; và điều khoản thi hành.</span><br style=\"text-align: justify;\"><span style=\"text-align: justify;\">Trong đó, về việc đầu tư hạ tầng, xây dựng khu công nghiệp, Nghị định 35/2022/NĐ-CP bãi bỏ thủ tục thành lập khu công nghiệp nhằm giảm bớt thủ tục hành chính cho doanh nghiệp. Theo đó, khu công nghiệp được xác định là đã được thành lập kể từ ngày cấp có thẩm quyền:&nbsp;</span><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><br></p>', 'download.jfif'),
(4, 1, 5, 3, 'van ban 2', '2022-05-08', '<p><span style=\"color: rgb(51, 51, 51); font-family: NotoSerif; font-size: 17px; text-align: justify;\">Cụ thể, Khoản 1 Điều 11 Luật Ban hành văn bản QPPL năm 2015 quy định: “</span><em style=\"margin: 0px; color: rgb(51, 51, 51); font-family: NotoSerif; font-size: 17px; text-align: justify;\">1. Văn bản QPPL phải được quy định cụ thể để khi có hiệu lực thì thi hành được ngay. Trong trường hợp văn bản có điều, khoản, điểm mà nội dung liên quan đến quy trình, quy chuẩn kỹ thuật và có những nội dung khác cần quy định chi tiết thì ngay tại điều, khoản, điểm đó có thể giao cho cơ quan nhà nước có thẩm quyền quy định chi tiết. Văn bản quy định chi tiết chỉ được quy định nội dung được giao và không được quy định lặp lại nội dung của văn bản được quy định chi tiết”.</em><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><br></p>', 'vanban1.jfif'),
(5, 1, 5, 4, 'Thông báo', '2022-05-06', '<p><span style=\"color: rgb(51, 51, 51); font-family: NotoSerif; font-size: 17px; text-align: justify;\">Theo quy định này thì “văn bản chi tiết” là văn bản QPPL quy định cụ thể các nội dung được giao trong văn bản QPPL của cơ quan nhà nước cấp trên. Việc giao ban hành văn bản quy định chi tiết phải được quy định ngay tại điều, khoản, điểm của văn bản QPPL, trong đó nêu rõ cơ quan được ban hành văn bản quy định chi tiết và nội dung giao quy định chi tiết (nội dung liên quan đến quy trình, quy chuẩn kỹ thuật và những nội dung khác) phải cụ thể.</span><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><br></p>', 'vanban2.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `yeucau`
--

CREATE TABLE `yeucau` (
  `Id_YeuCau` int(11) NOT NULL,
  `Id_NhanVien` int(11) NOT NULL,
  `Id_LoaiYeuCau` int(11) NOT NULL,
  `Ngay` datetime NOT NULL,
  `MoTa` text NOT NULL,
  `TinhTrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `yeucau`
--

INSERT INTO `yeucau` (`Id_YeuCau`, `Id_NhanVien`, `Id_LoaiYeuCau`, `Ngay`, `MoTa`, `TinhTrang`) VALUES
(1, 35, 1, '2022-03-27 07:00:00', 'Ông Derek Chollet, Cố vấn Bộ Ngoại giao Mỹ, có buổi trao đổi với Zing khi giao tranh ở Ukraine vừa cán mốc một tháng. Ông khẳng định Mỹ đang làm tất cả để hỗ trợ quá trình hòa đàm.', 3),
(2, 14, 2, '2022-04-29 06:31:27', '<p>&nbsp; &nbsp;Xin phép thứ 6 tăng ca từ 7 giờ tới 10 giờ tối<br></p>', 1),
(5, 14, 3, '2022-05-28 07:51:32', '<p>tesst</p>', 1),
(6, 14, 5, '2022-06-06 10:13:15', 'xử lý coogn việc sai lương', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bac`
--
ALTER TABLE `bac`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `PK_Bac_Ngach` (`Id_Ngach`),
  ADD KEY `PK_Bac_ChucVu` (`Id_ChucVu`);

--
-- Chỉ mục cho bảng `bomon`
--
ALTER TABLE `bomon`
  ADD PRIMARY KEY (`Id_BoMon`);

--
-- Chỉ mục cho bảng `chamcong`
--
ALTER TABLE `chamcong`
  ADD PRIMARY KEY (`Id_ChamCong`),
  ADD KEY `PK_ChamCong_NhanVien` (`Id_NhanVien`);

--
-- Chỉ mục cho bảng `chatbox`
--
ALTER TABLE `chatbox`
  ADD PRIMARY KEY (`Id_ChatBox`),
  ADD KEY `PK_ChatBox_PhongBan` (`Id_PhongBan`),
  ADD KEY `PK_ChatBox_ToUser` (`ToUser`),
  ADD KEY `PK_ChatBox_NguoiTao` (`NguoiTao`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`Id_ChucVu`);

--
-- Chỉ mục cho bảng `chuyenmon`
--
ALTER TABLE `chuyenmon`
  ADD PRIMARY KEY (`Id_ChuyenMon`);

--
-- Chỉ mục cho bảng `congviec`
--
ALTER TABLE `congviec`
  ADD PRIMARY KEY (`Id_CongViec`),
  ADD KEY `PK_CongViec_NhanVien` (`Id_NhanVien`),
  ADD KEY `PK_CongViec_PhongBan` (`Id_PhongBan`),
  ADD KEY `PK_CongViec_NguoiGiao` (`NguoiGiao`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`Id_DanhGia`),
  ADD KEY `PK_DanhGia_NhanVien` (`NhanVien`);

--
-- Chỉ mục cho bảng `daotao`
--
ALTER TABLE `daotao`
  ADD PRIMARY KEY (`Id_DaoTao`),
  ADD KEY `PK_DaoTao_LoaiDaoTao` (`Id_LoaiDaoTao`);

--
-- Chỉ mục cho bảng `donvi`
--
ALTER TABLE `donvi`
  ADD PRIMARY KEY (`Id_DonVi`);

--
-- Chỉ mục cho bảng `hop`
--
ALTER TABLE `hop`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `PK_LichLamviec_PhongBan` (`Id_PhongBan`),
  ADD KEY `PK_LichLamviec_NhanVien` (`NguoiChuTri`);

--
-- Chỉ mục cho bảng `ketquadaotao`
--
ALTER TABLE `ketquadaotao`
  ADD PRIMARY KEY (`Id_KetQuaDT`),
  ADD KEY `PK_KetQua_NhanVien` (`Id_NhanVien`),
  ADD KEY `PK_KetQua_DaoTao` (`Id_DaoTao`);

--
-- Chỉ mục cho bảng `khenthuong`
--
ALTER TABLE `khenthuong`
  ADD PRIMARY KEY (`Id_Khenthuong`),
  ADD KEY `PK_KhenThuong_NhanVien` (`Id_NhanVien`);

--
-- Chỉ mục cho bảng `kyluat`
--
ALTER TABLE `kyluat`
  ADD PRIMARY KEY (`Id_KyLuat`),
  ADD KEY `PK_KyLuat_NhanVien` (`Id_NhanVien`);

--
-- Chỉ mục cho bảng `loaidaotao`
--
ALTER TABLE `loaidaotao`
  ADD PRIMARY KEY (`Id_LoaiDaoTao`);

--
-- Chỉ mục cho bảng `loaivanban`
--
ALTER TABLE `loaivanban`
  ADD PRIMARY KEY (`Id_LoaiVanBan`);

--
-- Chỉ mục cho bảng `loaiyeucau`
--
ALTER TABLE `loaiyeucau`
  ADD PRIMARY KEY (`Id_LoaiYeuCau`);

--
-- Chỉ mục cho bảng `luong`
--
ALTER TABLE `luong`
  ADD PRIMARY KEY (`Id_Luong`),
  ADD KEY `PK_Luong_NhanVien` (`Id_NhanVien`),
  ADD KEY `PK_Luong_Bac` (`Id_Bac`);

--
-- Chỉ mục cho bảng `ngach`
--
ALTER TABLE `ngach`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`Id_NhanVien`),
  ADD KEY `PK_NhanVien_ChucVu` (`Id_ChucVu`),
  ADD KEY `PK_NhanVien_ChuyenMon` (`Id_ChuyenMon`),
  ADD KEY `PK_NhanVien_BoMon` (`Id_BoMon`),
  ADD KEY `PK_NhanVien_PhanQuyen` (`Id_PhanQuyen`),
  ADD KEY `PK_NhanVien_DonVi` (`Id_DonVi`),
  ADD KEY `PK_NhanVien_TDChuyenMon` (`Id_TDChuyenMon`),
  ADD KEY `PK_NhanVien_ChinhTri` (`Id_ChinhTri`),
  ADD KEY `PK_NhanVien_TinHoc` (`Id_TinHoc`),
  ADD KEY `PK_NhanVien_PhongBan` (`Id_PhongBan`),
  ADD KEY `PK_NhanVien_NgoaiNgu` (`Id_NgoaiNgu`);

--
-- Chỉ mục cho bảng `noidungchat`
--
ALTER TABLE `noidungchat`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `PK_ChatBox_NoiDungChat` (`Id_ChatBox`),
  ADD KEY `PK_NoiDungChat_NhanVien` (`Id_NhanVien`);

--
-- Chỉ mục cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`Id_PhanQuyen`);

--
-- Chỉ mục cho bảng `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`Id_PhongBan`),
  ADD KEY `PK_PhongBan_NhanVien` (`NguoiQuanLy`);

--
-- Chỉ mục cho bảng `tailieu`
--
ALTER TABLE `tailieu`
  ADD PRIMARY KEY (`Id_TaiLieu`),
  ADD KEY `PK_TaiLieu_NhanVien` (`Id_NhanVien`);

--
-- Chỉ mục cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `PK_ThongBao_NguoiNhan` (`NguoiNhan`),
  ADD KEY `PK_ThongBao_NguoiGui` (`NguoiGui`),
  ADD KEY `PK_ThongBao_PhongBan` (`PhongBan`);

--
-- Chỉ mục cho bảng `trinhdochinhtri`
--
ALTER TABLE `trinhdochinhtri`
  ADD PRIMARY KEY (`Id_ChinhTri`);

--
-- Chỉ mục cho bảng `trinhdochuyenmon`
--
ALTER TABLE `trinhdochuyenmon`
  ADD PRIMARY KEY (`Id_TDChuyenMon`);

--
-- Chỉ mục cho bảng `trinhdongoaingu`
--
ALTER TABLE `trinhdongoaingu`
  ADD PRIMARY KEY (`Id_NgoaiNgu`);

--
-- Chỉ mục cho bảng `trinhdotinhoc`
--
ALTER TABLE `trinhdotinhoc`
  ADD PRIMARY KEY (`Id_TinHoc`);

--
-- Chỉ mục cho bảng `vanban`
--
ALTER TABLE `vanban`
  ADD PRIMARY KEY (`Id_VanBan`),
  ADD KEY `PK_VanBan_NhanVien` (`Id_NhanVien`),
  ADD KEY `PK_VanBan_LoaiVanBan` (`Id_LoaiVanBan`);

--
-- Chỉ mục cho bảng `yeucau`
--
ALTER TABLE `yeucau`
  ADD PRIMARY KEY (`Id_YeuCau`),
  ADD KEY `PK_YeuCau_NhanVien` (`Id_NhanVien`),
  ADD KEY `PK_YeuCau_LoaiYeuCau` (`Id_LoaiYeuCau`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bac`
--
ALTER TABLE `bac`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `bomon`
--
ALTER TABLE `bomon`
  MODIFY `Id_BoMon` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `chamcong`
--
ALTER TABLE `chamcong`
  MODIFY `Id_ChamCong` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT cho bảng `chatbox`
--
ALTER TABLE `chatbox`
  MODIFY `Id_ChatBox` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `Id_ChucVu` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `chuyenmon`
--
ALTER TABLE `chuyenmon`
  MODIFY `Id_ChuyenMon` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `congviec`
--
ALTER TABLE `congviec`
  MODIFY `Id_CongViec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `Id_DanhGia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `daotao`
--
ALTER TABLE `daotao`
  MODIFY `Id_DaoTao` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `donvi`
--
ALTER TABLE `donvi`
  MODIFY `Id_DonVi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `hop`
--
ALTER TABLE `hop`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `ketquadaotao`
--
ALTER TABLE `ketquadaotao`
  MODIFY `Id_KetQuaDT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `khenthuong`
--
ALTER TABLE `khenthuong`
  MODIFY `Id_Khenthuong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `kyluat`
--
ALTER TABLE `kyluat`
  MODIFY `Id_KyLuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `loaidaotao`
--
ALTER TABLE `loaidaotao`
  MODIFY `Id_LoaiDaoTao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `loaivanban`
--
ALTER TABLE `loaivanban`
  MODIFY `Id_LoaiVanBan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `loaiyeucau`
--
ALTER TABLE `loaiyeucau`
  MODIFY `Id_LoaiYeuCau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `luong`
--
ALTER TABLE `luong`
  MODIFY `Id_Luong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `ngach`
--
ALTER TABLE `ngach`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `Id_NhanVien` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `noidungchat`
--
ALTER TABLE `noidungchat`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  MODIFY `Id_PhanQuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `phongban`
--
ALTER TABLE `phongban`
  MODIFY `Id_PhongBan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tailieu`
--
ALTER TABLE `tailieu`
  MODIFY `Id_TaiLieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `trinhdochinhtri`
--
ALTER TABLE `trinhdochinhtri`
  MODIFY `Id_ChinhTri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `trinhdochuyenmon`
--
ALTER TABLE `trinhdochuyenmon`
  MODIFY `Id_TDChuyenMon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `trinhdongoaingu`
--
ALTER TABLE `trinhdongoaingu`
  MODIFY `Id_NgoaiNgu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `trinhdotinhoc`
--
ALTER TABLE `trinhdotinhoc`
  MODIFY `Id_TinHoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `vanban`
--
ALTER TABLE `vanban`
  MODIFY `Id_VanBan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `yeucau`
--
ALTER TABLE `yeucau`
  MODIFY `Id_YeuCau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bac`
--
ALTER TABLE `bac`
  ADD CONSTRAINT `PK_Bac_ChucVu` FOREIGN KEY (`Id_ChucVu`) REFERENCES `chucvu` (`Id_ChucVu`),
  ADD CONSTRAINT `PK_Bac_Ngach` FOREIGN KEY (`Id_Ngach`) REFERENCES `ngach` (`Id`);

--
-- Các ràng buộc cho bảng `chamcong`
--
ALTER TABLE `chamcong`
  ADD CONSTRAINT `PK_ChamCong_NhanVien` FOREIGN KEY (`Id_NhanVien`) REFERENCES `nhanvien` (`Id_NhanVien`);

--
-- Các ràng buộc cho bảng `chatbox`
--
ALTER TABLE `chatbox`
  ADD CONSTRAINT `PK_ChatBox_NguoiTao` FOREIGN KEY (`NguoiTao`) REFERENCES `nhanvien` (`Id_NhanVien`),
  ADD CONSTRAINT `PK_ChatBox_PhongBan` FOREIGN KEY (`Id_PhongBan`) REFERENCES `phongban` (`Id_PhongBan`),
  ADD CONSTRAINT `PK_ChatBox_ToUser` FOREIGN KEY (`ToUser`) REFERENCES `nhanvien` (`Id_NhanVien`);

--
-- Các ràng buộc cho bảng `congviec`
--
ALTER TABLE `congviec`
  ADD CONSTRAINT `PK_CongViec_NguoiGiao` FOREIGN KEY (`NguoiGiao`) REFERENCES `nhanvien` (`Id_NhanVien`),
  ADD CONSTRAINT `PK_CongViec_NhanVien` FOREIGN KEY (`Id_NhanVien`) REFERENCES `nhanvien` (`Id_NhanVien`),
  ADD CONSTRAINT `PK_CongViec_PhongBan` FOREIGN KEY (`Id_PhongBan`) REFERENCES `phongban` (`Id_PhongBan`);

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `PK_DanhGia_NhanVien` FOREIGN KEY (`NhanVien`) REFERENCES `nhanvien` (`Id_NhanVien`);

--
-- Các ràng buộc cho bảng `daotao`
--
ALTER TABLE `daotao`
  ADD CONSTRAINT `PK_DaoTao_LoaiDaoTao` FOREIGN KEY (`Id_LoaiDaoTao`) REFERENCES `loaidaotao` (`Id_LoaiDaoTao`);

--
-- Các ràng buộc cho bảng `hop`
--
ALTER TABLE `hop`
  ADD CONSTRAINT `PK_LichLamviec_NhanVien` FOREIGN KEY (`NguoiChuTri`) REFERENCES `nhanvien` (`Id_NhanVien`),
  ADD CONSTRAINT `PK_LichLamviec_PhongBan` FOREIGN KEY (`Id_PhongBan`) REFERENCES `phongban` (`Id_PhongBan`);

--
-- Các ràng buộc cho bảng `ketquadaotao`
--
ALTER TABLE `ketquadaotao`
  ADD CONSTRAINT `PK_KetQua_DaoTao` FOREIGN KEY (`Id_DaoTao`) REFERENCES `daotao` (`Id_DaoTao`),
  ADD CONSTRAINT `PK_KetQua_NhanVien` FOREIGN KEY (`Id_NhanVien`) REFERENCES `nhanvien` (`Id_NhanVien`);

--
-- Các ràng buộc cho bảng `khenthuong`
--
ALTER TABLE `khenthuong`
  ADD CONSTRAINT `PK_KhenThuong_NhanVien` FOREIGN KEY (`Id_NhanVien`) REFERENCES `nhanvien` (`Id_NhanVien`);

--
-- Các ràng buộc cho bảng `kyluat`
--
ALTER TABLE `kyluat`
  ADD CONSTRAINT `PK_KyLuat_NhanVien` FOREIGN KEY (`Id_NhanVien`) REFERENCES `nhanvien` (`Id_NhanVien`);

--
-- Các ràng buộc cho bảng `luong`
--
ALTER TABLE `luong`
  ADD CONSTRAINT `PK_Luong_Bac` FOREIGN KEY (`Id_Bac`) REFERENCES `bac` (`Id`),
  ADD CONSTRAINT `PK_Luong_NhanVien` FOREIGN KEY (`Id_NhanVien`) REFERENCES `nhanvien` (`Id_NhanVien`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `PK_NhanVien_BoMon` FOREIGN KEY (`Id_BoMon`) REFERENCES `bomon` (`Id_BoMon`),
  ADD CONSTRAINT `PK_NhanVien_ChinhTri` FOREIGN KEY (`Id_ChinhTri`) REFERENCES `trinhdochinhtri` (`Id_ChinhTri`),
  ADD CONSTRAINT `PK_NhanVien_ChucVu` FOREIGN KEY (`Id_ChucVu`) REFERENCES `chucvu` (`Id_ChucVu`),
  ADD CONSTRAINT `PK_NhanVien_ChuyenMon` FOREIGN KEY (`Id_ChuyenMon`) REFERENCES `chuyenmon` (`Id_ChuyenMon`),
  ADD CONSTRAINT `PK_NhanVien_DonVi` FOREIGN KEY (`Id_DonVi`) REFERENCES `donvi` (`Id_DonVi`),
  ADD CONSTRAINT `PK_NhanVien_NgoaiNgu` FOREIGN KEY (`Id_NgoaiNgu`) REFERENCES `trinhdongoaingu` (`Id_NgoaiNgu`),
  ADD CONSTRAINT `PK_NhanVien_PhanQuyen` FOREIGN KEY (`Id_PhanQuyen`) REFERENCES `phanquyen` (`Id_PhanQuyen`),
  ADD CONSTRAINT `PK_NhanVien_PhongBan` FOREIGN KEY (`Id_PhongBan`) REFERENCES `phongban` (`Id_PhongBan`),
  ADD CONSTRAINT `PK_NhanVien_TDChuyenMon` FOREIGN KEY (`Id_TDChuyenMon`) REFERENCES `trinhdochuyenmon` (`Id_TDChuyenMon`),
  ADD CONSTRAINT `PK_NhanVien_TinHoc` FOREIGN KEY (`Id_TinHoc`) REFERENCES `trinhdotinhoc` (`Id_TinHoc`);

--
-- Các ràng buộc cho bảng `noidungchat`
--
ALTER TABLE `noidungchat`
  ADD CONSTRAINT `PK_ChatBox_NoiDungChat` FOREIGN KEY (`Id_ChatBox`) REFERENCES `chatbox` (`Id_ChatBox`),
  ADD CONSTRAINT `PK_NoiDungChat_NhanVien` FOREIGN KEY (`Id_NhanVien`) REFERENCES `nhanvien` (`Id_NhanVien`);

--
-- Các ràng buộc cho bảng `phongban`
--
ALTER TABLE `phongban`
  ADD CONSTRAINT `PK_PhongBan_NhanVien` FOREIGN KEY (`NguoiQuanLy`) REFERENCES `nhanvien` (`Id_NhanVien`);

--
-- Các ràng buộc cho bảng `tailieu`
--
ALTER TABLE `tailieu`
  ADD CONSTRAINT `PK_TaiLieu_NhanVien` FOREIGN KEY (`Id_NhanVien`) REFERENCES `nhanvien` (`Id_NhanVien`);

--
-- Các ràng buộc cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD CONSTRAINT `PK_ThongBao_NguoiGui` FOREIGN KEY (`NguoiGui`) REFERENCES `nhanvien` (`Id_NhanVien`),
  ADD CONSTRAINT `PK_ThongBao_NguoiNhan` FOREIGN KEY (`NguoiNhan`) REFERENCES `nhanvien` (`Id_NhanVien`),
  ADD CONSTRAINT `PK_ThongBao_PhongBan` FOREIGN KEY (`PhongBan`) REFERENCES `phongban` (`Id_PhongBan`);

--
-- Các ràng buộc cho bảng `vanban`
--
ALTER TABLE `vanban`
  ADD CONSTRAINT `PK_VanBan_LoaiVanBan` FOREIGN KEY (`Id_LoaiVanBan`) REFERENCES `loaivanban` (`Id_LoaiVanBan`),
  ADD CONSTRAINT `PK_VanBan_NhanVien` FOREIGN KEY (`Id_NhanVien`) REFERENCES `nhanvien` (`Id_NhanVien`);

--
-- Các ràng buộc cho bảng `yeucau`
--
ALTER TABLE `yeucau`
  ADD CONSTRAINT `PK_YeuCau_LoaiYeuCau` FOREIGN KEY (`Id_LoaiYeuCau`) REFERENCES `loaiyeucau` (`Id_LoaiYeuCau`),
  ADD CONSTRAINT `PK_YeuCau_NhanVien` FOREIGN KEY (`Id_NhanVien`) REFERENCES `nhanvien` (`Id_NhanVien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
