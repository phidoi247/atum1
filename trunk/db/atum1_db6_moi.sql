-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2015 at 03:30 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `atum1_db_6`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblchitietdonhang`
--

CREATE TABLE IF NOT EXISTS `tblchitietdonhang` (
`id` int(11) NOT NULL,
  `ten_hoadon` varchar(256) NOT NULL,
  `loaigiaodich_id` int(11) NOT NULL,
  `sanpham_id` varchar(7) NOT NULL,
  `soluong` int(10) unsigned NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblchitietdonhang`
--

INSERT INTO `tblchitietdonhang` (`id`, `ten_hoadon`, `loaigiaodich_id`, `sanpham_id`, `soluong`) VALUES
(1, 'TTBH0000001', 2, 'SA00001', 20),
(2, 'TTBH0000002', 2, 'SA00002', 20),
(3, 'TTBH0000003', 2, 'SA00003', 20),
(4, 'TTBH0000004', 2, 'SA00004', 20),
(5, 'TTBH0000005', 2, 'SA00005', 20),
(6, 'TTBH0000006', 1, 'SA00001', 5),
(7, 'TTBH0000007', 1, 'SA00002', 4),
(8, 'TTBH0000008', 1, 'SA00003', 2),
(9, 'TTBH0000009', 1, 'SA00004', 4),
(10, 'TTBH0000010', 1, 'SA00005', 7),
(11, 'TTBH0000011', 1, 'SA00001', 2),
(12, 'TTBH0000012', 1, 'SA00002', 2),
(13, 'TTBH0000013', 1, 'SA00003', 4),
(14, 'TTBH0000014', 1, 'SA00003', 1),
(15, 'TTBH0000015', 1, 'SA00005', 2),
(16, 'TTBH0000016', 1, 'SA00004', 1),
(17, 'TTBH0000017', 1, 'SA00003', 5),
(18, 'TTBH0000018', 2, 'SA00001', 10),
(19, 'TTBH0000018', 2, 'SA00002', 15),
(20, 'TTBH0000019', 2, 'SA00003', 20),
(21, 'TTBH0000020', 2, 'SA00003', 10),
(22, 'TTBH0000020', 2, 'SA00005', 10),
(23, 'TTBH0000020', 2, 'SA00004', 15),
(24, 'TTBH0000020', 2, 'SA00003', 20),
(25, 'TTBH0000021', 1, 'SA00001', 1),
(26, 'TTBH0000022', 1, 'SA00001', 3),
(27, 'TTBH0000023', 1, 'SA00004', 1),
(28, 'TTBH0000024', 1, 'SA00005', 1),
(29, 'TTBH0000025', 1, 'SA00001', 2),
(30, 'TTBH0000026', 1, 'SA00001', 1),
(31, 'TTBH0000027', 1, 'SA00001', 1),
(32, 'TTBH0000028', 1, 'SA00001', 2),
(33, 'TTBH0000029', 1, 'SA00001', 1),
(34, 'TTBH0000030', 1, 'SA00002', 1),
(35, 'TTBH0000031', 1, 'SA00005', 1),
(36, 'TTBH0000032', 1, 'SA00001', 2),
(37, 'TTBH0000033', 1, 'SA00002', 2),
(38, 'TTBH0000034', 1, 'SA00001', 2),
(39, 'TTBH0000035', 1, 'SA00003', 2),
(40, 'TTBH0000036', 1, 'SA00001', 2),
(41, 'TTBH0000037', 1, 'SA00004', 4),
(42, 'TTBH0000038', 1, 'SA00005', 2),
(43, 'TTBH0000039', 1, 'SA00002', 2),
(44, 'TTBH0000040', 1, 'SA00001', 4),
(45, 'TTBH0000041', 2, 'SA00001', 10),
(46, 'TTBH0000041', 2, 'SA00002', 10),
(47, 'TTBH0000041', 2, 'SA00003', 10),
(48, 'TTBH0000041', 2, 'SA00004', 10),
(49, 'TTBH0000041', 2, 'SA00005', 10),
(50, 'TTBH0000042', 1, 'SA00004', 3),
(51, 'TTBH0000043', 1, 'SA00001', 8),
(52, 'TTBH0000044', 1, 'SA00005', 9),
(53, 'TTBH0000045', 1, 'SA00004', 6),
(54, 'TTBH0000046', 1, 'SA00005', 5),
(55, 'TTBH0000047', 1, 'SA00004', 7),
(56, 'TTBH0000048', 1, 'SA00005', 2),
(57, 'TTBH0000048', 1, 'SA00004', 4),
(58, 'TTBH0000049', 1, 'SA00001', 2),
(59, 'TTBH0000050', 1, 'SA00003', 2),
(60, 'TTBH0000050', 1, 'SA00005', 2),
(61, 'HĐBH0000001', 1, '', 0),
(62, 'HĐBH0000001', 1, '', 0),
(63, 'HĐBH0000001', 1, '', 0),
(64, 'HĐBH0000001', 1, '', 0),
(65, 'HĐBH0000001', 1, 'SA00001', 1),
(66, 'HĐNH0000001', 2, 'SA00001', 2),
(67, 'HĐNH0000001', 2, '', 0),
(68, 'HĐNH0000001', 2, '', 0);

--
-- Triggers `tblchitietdonhang`
--
DELIMITER //
CREATE TRIGGER `updatesoluong` AFTER INSERT ON `tblchitietdonhang`
 FOR EACH ROW BEGIN
	DECLARE soluong1 INT;
    DECLARE masanpham varchar(7);
	DECLARE loaigiaodich INT;
    SELECT soluong INTO soluong1 FROM tblchitietdonhang WHERE id = (SELECT MAX(id) FROM tblchitietdonhang);
    SELECT sanpham_id INTO masanpham FROM tblchitietdonhang WHERE id = (SELECT MAX(id) FROM tblchitietdonhang);
	SELECT loaigiaodich_id INTO loaigiaodich FROM tblchitietdonhang WHERE id = (SELECT MAX(id) FROM tblchitietdonhang);
    IF loaigiaodich = 2
THEN
	UPDATE
    	tblsanpham
    SET
    	soluong = soluong + soluong1
    WHERE
    	sanpham_id = masanpham;

	ELSEIF loaigiaodich = 1
THEN
	 UPDATE
    	tblsanpham
    SET
    	soluong = soluong - soluong1
    WHERE
    	sanpham_id = masanpham;
END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbldanhmuc`
--

CREATE TABLE IF NOT EXISTS `tbldanhmuc` (
`danhmuc_id` int(10) unsigned NOT NULL,
  `ten_danhmuc` varchar(128) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbldanhmuc`
--

INSERT INTO `tbldanhmuc` (`danhmuc_id`, `ten_danhmuc`) VALUES
(1, 'Sách'),
(2, 'Văn phòng phẩm'),
(3, 'Đồ chơi');

-- --------------------------------------------------------

--
-- Table structure for table `tbldonvi`
--

CREATE TABLE IF NOT EXISTS `tbldonvi` (
`donvi_id` int(11) NOT NULL,
  `ten_donvi` varchar(128) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbldonvi`
--

INSERT INTO `tbldonvi` (`donvi_id`, `ten_donvi`) VALUES
(1, 'Quyển'),
(2, 'Cái');

-- --------------------------------------------------------

--
-- Table structure for table `tblhoadon`
--

CREATE TABLE IF NOT EXISTS `tblhoadon` (
`id` int(11) NOT NULL,
  `ten_hoadon` varchar(256) NOT NULL,
  `thoigian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nhanvien_id` varchar(5) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblhoadon`
--

INSERT INTO `tblhoadon` (`id`, `ten_hoadon`, `thoigian`, `nhanvien_id`) VALUES
(1, 'TTBH0000001', '2014-12-08 15:16:50', 'TK001'),
(2, 'TTBH0000002', '2014-12-08 15:16:50', 'TK001'),
(3, 'TTBH0000003', '2014-12-08 15:16:50', 'TK001'),
(4, 'TTBH0000004', '2014-12-08 15:16:50', 'TK001'),
(5, 'TTBH0000005', '2014-12-08 15:16:50', 'TK001'),
(6, 'TTBH0000006', '2014-12-08 15:16:50', 'BH001'),
(7, 'TTBH0000007', '2014-12-08 15:16:50', 'BH001'),
(8, 'TTBH0000008', '2014-12-08 15:16:50', 'BH001'),
(9, 'TTBH0000009', '2014-12-08 15:16:50', 'BH001'),
(10, 'TTBH0000010', '2014-12-08 15:16:50', 'BH001'),
(11, 'TTBH0000011', '2014-12-09 14:56:50', 'BH001'),
(12, 'TTBH0000012', '2014-12-09 14:57:40', 'BH001'),
(13, 'TTBH0000013', '2014-12-09 14:57:40', 'BH001'),
(14, 'TTBH0000014', '2014-12-09 14:57:40', 'BH001'),
(15, 'TTBH0000015', '2014-12-09 14:57:40', 'BH001'),
(16, 'TTBH0000016', '2014-12-09 14:56:50', 'BH001'),
(17, 'TTBH0000017', '2014-12-09 14:57:40', 'BH001'),
(18, 'TTBH0000018', '2014-12-09 14:57:40', 'TK001'),
(19, 'TTBH0000019', '2014-12-09 14:57:40', 'TK001'),
(20, 'TTBH0000020', '2014-12-09 14:57:40', 'TK001'),
(21, 'TTBH0000021', '2014-12-10 14:58:50', 'TK001'),
(22, 'TTBH0000022', '2014-12-10 15:01:11', 'TK001'),
(23, 'TTBH0000023', '2014-12-10 15:01:11', 'TK001'),
(24, 'TTBH0000024', '2014-12-10 15:01:11', 'TK001'),
(25, 'TTBH0000025', '2014-12-10 15:01:11', 'BH001'),
(26, 'TTBH0000026', '2014-12-11 15:02:05', 'BH001'),
(27, 'TTBH0000027', '2014-12-11 15:02:05', 'BH001'),
(28, 'TTBH0000028', '2014-12-11 15:02:05', 'BH001'),
(29, 'TTBH0000029', '2014-12-11 15:02:05', 'BH001'),
(30, 'TTBH0000030', '2014-12-11 15:02:05', 'BH001'),
(31, 'TTBH0000031', '2014-12-12 15:18:19', 'BH001'),
(32, 'TTBH0000032', '2014-12-12 15:18:19', 'BH001'),
(33, 'TTBH0000033', '2014-12-12 15:18:19', 'BH001'),
(34, 'TTBH0000034', '2014-12-12 15:18:19', 'BH001'),
(35, 'TTBH0000035', '2014-12-12 15:18:19', 'BH001'),
(36, 'TTBH0000036', '2014-12-13 15:03:54', 'BH001'),
(37, 'TTBH0000037', '2014-12-13 15:03:54', 'BH001'),
(38, 'TTBH0000038', '2014-12-13 15:03:54', 'BH001'),
(39, 'TTBH0000039', '2014-12-13 15:03:54', 'BH001'),
(40, 'TTBH0000040', '2014-12-13 15:03:54', 'BH001'),
(41, 'TTBH0000041', '2014-12-14 15:05:09', 'TK001'),
(42, 'TTBH0000042', '2014-12-14 15:05:09', 'BH001'),
(43, 'TTBH0000043', '2014-12-14 15:05:09', 'BH001'),
(44, 'TTBH0000044', '2014-12-14 15:05:09', 'BH001'),
(45, 'TTBH0000045', '2014-12-14 15:05:09', 'BH001'),
(46, 'TTBH0000046', '2014-12-14 15:05:09', 'BH001'),
(47, 'TTBH0000047', '2014-12-14 15:05:09', 'BH001'),
(48, 'TTBH0000048', '2014-12-14 15:05:09', 'BH001'),
(49, 'TTBH0000049', '2014-12-14 15:05:09', 'BH001'),
(50, 'TTBH0000050', '2014-12-14 15:05:09', 'BH001'),
(51, 'HĐBH0000001', '2015-01-17 09:26:47', 'BH001'),
(52, 'HĐNH0000001', '2015-01-17 09:27:24', 'TK001');

-- --------------------------------------------------------

--
-- Table structure for table `tbllevel`
--

CREATE TABLE IF NOT EXISTS `tbllevel` (
`level_id` int(11) NOT NULL,
  `ten_level` varchar(64) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbllevel`
--

INSERT INTO `tbllevel` (`level_id`, `ten_level`) VALUES
(1, 'Nhân viên bán hàng'),
(2, 'Nhân viên kho hàng'),
(3, 'Quản lý');

-- --------------------------------------------------------

--
-- Table structure for table `tblloaigiaodich`
--

CREATE TABLE IF NOT EXISTS `tblloaigiaodich` (
`loaigiaodich_id` int(10) unsigned NOT NULL,
  `ten_loaigiaodich` varchar(64) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblloaigiaodich`
--

INSERT INTO `tblloaigiaodich` (`loaigiaodich_id`, `ten_loaigiaodich`) VALUES
(1, 'Bán'),
(2, 'Nhập');

-- --------------------------------------------------------

--
-- Table structure for table `tblnhacungcap`
--

CREATE TABLE IF NOT EXISTS `tblnhacungcap` (
`nhacungcap_id` int(10) unsigned NOT NULL,
  `ten_nhacungcap` varchar(128) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblnhacungcap`
--

INSERT INTO `tblnhacungcap` (`nhacungcap_id`, `ten_nhacungcap`) VALUES
(1, 'NXB Trí Tuệ'),
(2, 'Trung Quốc'),
(3, 'Nhật Bản'),
(4, 'Mỹ'),
(5, 'Cộng hoà Séc');

-- --------------------------------------------------------

--
-- Table structure for table `tblnhanvien`
--

CREATE TABLE IF NOT EXISTS `tblnhanvien` (
`id` int(11) NOT NULL,
  `nhanvien_id` varchar(5) NOT NULL,
  `ten_nhanvien` varchar(64) NOT NULL,
  `level_id` int(11) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `dia_chi` varchar(256) NOT NULL,
  `ngay_vao_lam` date NOT NULL,
  `avatar` varchar(128) NOT NULL,
  `password` varchar(50) NOT NULL,
  `SDT` varchar(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblnhanvien`
--

INSERT INTO `tblnhanvien` (`id`, `nhanvien_id`, `ten_nhanvien`, `level_id`, `ngay_sinh`, `dia_chi`, `ngay_vao_lam`, `avatar`, `password`, `SDT`) VALUES
(1, 'QL001', 'Trương Bá Nam', 3, '1996-02-08', 'Hà Nội', '2014-07-07', 'upload/20141225104255', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '0962723029'),
(2, 'BH001', 'Hà', 1, '1996-10-05', 'Hà Nội', '2014-12-25', 'upload/20150123032805', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '01654667209'),
(4, 'BH002', 'Hùng', 1, '1996-10-05', 'Hà Nội', '2014-12-25', 'upload/20150123032816', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '01654667209'),
(5, 'TK001', 'Hà', 2, '1996-10-05', 'Hà Nội', '2014-12-26', 'upload/20150123032831', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '01654667209'),
(19, 'BH016', 'Trương Bá Nam', 1, '1996-02-08', '1234', '2015-01-17', 'upload/20150123032841', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '124');

-- --------------------------------------------------------

--
-- Table structure for table `tblsanpham`
--

CREATE TABLE IF NOT EXISTS `tblsanpham` (
`id` int(11) NOT NULL,
  `sanpham_id` varchar(7) NOT NULL,
  `ten_sanpham` varchar(128) NOT NULL,
  `danhmuc_id` int(11) NOT NULL,
  `nhacungcap_id` int(11) NOT NULL,
  `donvi_id` int(11) NOT NULL,
  `gia_nhap` float unsigned NOT NULL,
  `gia_ban` float unsigned NOT NULL,
  `soluong` int(10) unsigned NOT NULL,
  `giam_gia` int(10) unsigned NOT NULL,
  `image_link` varchar(128) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblsanpham`
--

INSERT INTO `tblsanpham` (`id`, `sanpham_id`, `ten_sanpham`, `danhmuc_id`, `nhacungcap_id`, `donvi_id`, `gia_nhap`, `gia_ban`, `soluong`, `giam_gia`, `image_link`) VALUES
(1, 'SA00001', 'Văn Hóa Nhật Bản', 1, 3, 1, 10000, 100000, 16, 0, 'upload/20150120040341'),
(2, 'SA00002', 'Việt Nam Phong Tục', 1, 1, 1, 20000, 200000, 23, 0, 'upload/20150120040409'),
(3, 'SA00003', 'Doremon', 1, 1, 1, 30000, 300000, 16, 0, 'upload/20150120040426'),
(4, 'SA00004', 'Ô long viện', 1, 1, 1, 40000, 400000, 17, 0, 'upload/20150120040442'),
(5, 'SA00005', 'Sunrise - Bình Minh', 1, 1, 1, 50000, 500000, 20, 0, 'upload/20150120040453'),
(6, 'SA00006', 'Tiểu Sử Steve Jobs', 1, 4, 1, 25000, 30000, 0, 0, 'upload/20150120040504'),
(7, 'SA00007', 'Học Từ Thất Bại', 1, 3, 1, 12000, 40000, 0, 0, 'upload/20150120040518'),
(8, 'SA00008', 'Bài Học Cuộc Sống', 1, 2, 1, 74000, 80000, 0, 0, 'upload/20150120040530'),
(9, 'SA00009', 'Cốt Cách Mỹ Nhân', 1, 1, 1, 36000, 40000, 0, 0, 'upload/20150120040637'),
(10, 'SA00010', 'Đánh Cược Với Tình Yêu', 1, 1, 1, 22000, 25000, 0, 0, 'upload/20150120040647'),
(11, 'VP00001', 'Bìa Lá Plus', 2, 1, 2, 12000, 24000, 0, 0, 'upload/20150120040702'),
(12, 'DC00001', 'Thú Bông Pororo', 3, 2, 2, 100000, 120000, 0, 0, 'upload/20150120040715'),
(13, 'DC00002', 'Thông Tuyết', 3, 2, 2, 12000, 25000, 0, 0, 'upload/20150120040726');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblchitietdonhang`
--
ALTER TABLE `tblchitietdonhang`
 ADD PRIMARY KEY (`id`), ADD KEY `ten_hoadon` (`ten_hoadon`), ADD KEY `sanpham_id` (`sanpham_id`), ADD KEY `loaigiaodich_id` (`loaigiaodich_id`);

--
-- Indexes for table `tbldanhmuc`
--
ALTER TABLE `tbldanhmuc`
 ADD PRIMARY KEY (`danhmuc_id`);

--
-- Indexes for table `tbldonvi`
--
ALTER TABLE `tbldonvi`
 ADD PRIMARY KEY (`donvi_id`);

--
-- Indexes for table `tblhoadon`
--
ALTER TABLE `tblhoadon`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `ten_hoadon` (`ten_hoadon`), ADD KEY `nhanvien_id` (`nhanvien_id`);

--
-- Indexes for table `tbllevel`
--
ALTER TABLE `tbllevel`
 ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `tblloaigiaodich`
--
ALTER TABLE `tblloaigiaodich`
 ADD PRIMARY KEY (`loaigiaodich_id`);

--
-- Indexes for table `tblnhacungcap`
--
ALTER TABLE `tblnhacungcap`
 ADD PRIMARY KEY (`nhacungcap_id`);

--
-- Indexes for table `tblnhanvien`
--
ALTER TABLE `tblnhanvien`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `nhanvien_id` (`nhanvien_id`), ADD KEY `level_id` (`level_id`);

--
-- Indexes for table `tblsanpham`
--
ALTER TABLE `tblsanpham`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `sanpham_id` (`sanpham_id`), ADD KEY `danhmuc_id` (`danhmuc_id`), ADD KEY `nhacungcap_id` (`nhacungcap_id`), ADD KEY `donvi_id` (`donvi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblchitietdonhang`
--
ALTER TABLE `tblchitietdonhang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `tbldanhmuc`
--
ALTER TABLE `tbldanhmuc`
MODIFY `danhmuc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbldonvi`
--
ALTER TABLE `tbldonvi`
MODIFY `donvi_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblhoadon`
--
ALTER TABLE `tblhoadon`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `tbllevel`
--
ALTER TABLE `tbllevel`
MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblloaigiaodich`
--
ALTER TABLE `tblloaigiaodich`
MODIFY `loaigiaodich_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblnhacungcap`
--
ALTER TABLE `tblnhacungcap`
MODIFY `nhacungcap_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblnhanvien`
--
ALTER TABLE `tblnhanvien`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tblsanpham`
--
ALTER TABLE `tblsanpham`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
