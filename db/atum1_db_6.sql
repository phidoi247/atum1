-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2014 at 02:06 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `atum1_db_6`
--
CREATE DATABASE IF NOT EXISTS `atum1_db_6` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `atum1_db_6`;

-- --------------------------------------------------------

--
-- Table structure for table `tblchitietdonhang`
--

DROP TABLE IF EXISTS `tblchitietdonhang`;
CREATE TABLE IF NOT EXISTS `tblchitietdonhang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_hoadon` varchar(256) NOT NULL,
  `loaigiaodich_id` int(11) NOT NULL,
  `sanpham_id` varchar(7) NOT NULL,
  `soluong` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`ten_hoadon`) REFERENCES tblhoadon(`ten_hoadon`),
  FOREIGN KEY (`sanpham_id`) REFERENCES tblsanpham(`sanpham_id`),
  FOREIGN KEY (`loaigiaodich_id`) REFERENCES tblloaigiaodich(`loaigiaodich_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `tblchitietdonhang`
--

INSERT INTO `tblchitietdonhang` (`id`, `ten_hoadon`, `loaigiaodich_id`, `sanpham_id`, `soluong`) VALUES
(1, 'HĐNH0000001', 2, 'SA00001', 20),
(2, 'HĐNH0000002', 2, 'SA00002', 20),
(3, 'HĐNH0000003', 2, 'SA00003', 20),
(4, 'HĐNH0000004', 2, 'SA00004', 20),
(5, 'HĐNH0000005', 2, 'SA00005', 20),
(6, 'HĐBH0000006', 1, 'SA00001', 5),
(7, 'HĐBH0000007', 1, 'SA00002', 4),
(8, 'HĐBH0000008', 1, 'SA00003', 2),
(9, 'HĐBH0000009', 1, 'SA00004', 4),
(10, 'HĐBH0000010', 1, 'SA00005', 7),
(11, 'HĐBH0000011', 1, 'SA00001', 2),
(12, 'HĐBH0000012', 1, 'SA00002', 2),
(13, 'HĐBH0000013', 1, 'SA00003', 4),
(14, 'HĐBH0000014', 1, 'SA00003', 1),
(15, 'HĐBH0000015', 1, 'SA00005', 2),
(16, 'HĐBH0000016', 1, 'SA00004', 1),
(17, 'HĐBH0000017', 1, 'SA00003', 5),
(18, 'HĐNH0000018', 2, 'SA00001', 10),
(19, 'HĐNH0000018', 2, 'SA00002', 15),
(20, 'HĐNH0000019', 2, 'SA00003', 20),
(21, 'HĐNH0000020', 2, 'SA00003', 10),
(22, 'HĐNH0000020', 2, 'SA00005', 10),
(23, 'HĐNH0000020', 2, 'SA00004', 15),
(24, 'HĐNH0000020', 2, 'SA00003', 20),
(25, 'HĐBH0000021', 1, 'SA00001', 1),
(26, 'HĐBH0000022', 1, 'SA00001', 3),
(27, 'HĐBH0000023', 1, 'SA00004', 1),
(28, 'HĐBH0000024', 1, 'SA00005', 1),
(29, 'HĐBH0000025', 1, 'SA00001', 2),
(30, 'HĐBH0000026', 1, 'SA00001', 1),
(31, 'HĐBH0000027', 1, 'SA00001', 1),
(32, 'HĐBH0000028', 1, 'SA00001', 2),
(33, 'HĐBH0000029', 1, 'SA00001', 1),
(34, 'HĐBH0000030', 1, 'SA00002', 1),
(35, 'HĐBH0000031', 1, 'SA00005', 1),
(36, 'HĐBH0000032', 1, 'SA00001', 2),
(37, 'HĐBH0000033', 1, 'SA00002', 2),
(38, 'HĐBH0000034', 1, 'SA00001', 2),
(39, 'HĐBH0000035', 1, 'SA00003', 2),
(40, 'HĐBH0000036', 1, 'SA00001', 2),
(41, 'HĐBH0000037', 1, 'SA00004', 4),
(42, 'HĐBH0000038', 1, 'SA00005', 2),
(43, 'HĐBH0000039', 1, 'SA00002', 2),
(44, 'HĐBH0000040', 1, 'SA00001', 4),
(45, 'HĐNH0000041', 2, 'SA00001', 10),
(46, 'HĐNH0000041', 2, 'SA00002', 10),
(47, 'HĐNH0000041', 2, 'SA00003', 10),
(48, 'HĐNH0000041', 2, 'SA00004', 10),
(49, 'HĐNH0000041', 2, 'SA00005', 10),
(50, 'HĐBH0000042', 1, 'SA00004', 3),
(51, 'HĐBH0000043', 1, 'SA00001', 8),
(52, 'HĐBH0000044', 1, 'SA00005', 9),
(53, 'HĐBH0000045', 1, 'SA00004', 6),
(54, 'HĐBH0000046', 1, 'SA00005', 5),
(55, 'HĐBH0000047', 1, 'SA00004', 7),
(56, 'HĐBH0000048', 1, 'SA00005', 2),
(57, 'HĐBH0000048', 1, 'SA00004', 4),
(58, 'HĐBH0000049', 1, 'SA00001', 2),
(59, 'HĐBH0000050', 1, 'SA00003', 2),
(60, 'HĐBH0000050', 1, 'SA00005', 2);

--
-- Triggers `tblchitietdonhang`
--
DROP TRIGGER IF EXISTS `updatesoluong`;
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

DROP TABLE IF EXISTS `tbldanhmuc`;
CREATE TABLE IF NOT EXISTS `tbldanhmuc` (
  `danhmuc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_danhmuc` varchar(128) NOT NULL,
  PRIMARY KEY (`danhmuc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbldanhmuc`
--

INSERT INTO `tbldanhmuc` (`danhmuc_id`, `ten_danhmuc`) VALUES
(1, 'Sách');

-- --------------------------------------------------------

--
-- Table structure for table `tbldonvi`
--

DROP TABLE IF EXISTS `tbldonvi`;
CREATE TABLE IF NOT EXISTS `tbldonvi` (
  `donvi_id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_donvi` varchar(128) NOT NULL,
  PRIMARY KEY (`donvi_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbldonvi`
--

INSERT INTO `tbldonvi` (`donvi_id`, `ten_donvi`) VALUES
(1, 'Quyển');

-- --------------------------------------------------------

--
-- Table structure for table `tblhoadon`
--

DROP TABLE IF EXISTS `tblhoadon`;
CREATE TABLE IF NOT EXISTS `tblhoadon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_hoadon` varchar(256) NOT NULL,
  `thoigian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,  
  `nhanvien_id` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ten_hoadon` (`ten_hoadon`),
  FOREIGN KEY (`nhanvien_id`) REFERENCES tblnhanvien(`nhanvien_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `tblhoadon`
--

INSERT INTO `tblhoadon` (`id`, `ten_hoadon`, `thoigian`, `nhanvien_id`) VALUES
(1, 'HĐNH0000001', '2014-12-08 15:16:50', 'TK001'),
(2, 'HĐNH0000002', '2014-12-08 15:16:50', 'TK001'),
(3, 'HĐNH0000003', '2014-12-08 15:16:50', 'TK001'),
(4, 'HĐNH0000004', '2014-12-08 15:16:50', 'TK001'),
(5, 'HĐNH0000005', '2014-12-08 15:16:50', 'TK001'),
(6, 'HĐBH0000006', '2014-12-08 15:16:50', 'BH001'),
(7, 'HĐBH0000007', '2014-12-08 15:16:50', 'BH001'),
(8, 'HĐBH0000008', '2014-12-08 15:16:50', 'BH001'),
(9, 'HĐBH0000009', '2014-12-08 15:16:50', 'BH001'),
(10, 'HĐBH0000010', '2014-12-08 15:16:50', 'BH001'),
(11, 'HĐBH0000011', '2014-12-09 14:56:50', 'BH001'),
(12, 'HĐBH0000012', '2014-12-09 14:57:40', 'BH001'),
(13, 'HĐBH0000013', '2014-12-09 14:57:40', 'BH001'),
(14, 'HĐBH0000014', '2014-12-09 14:57:40', 'BH001'),
(15, 'HĐBH0000015', '2014-12-09 14:57:40', 'BH001'),
(16, 'HĐBH0000016', '2014-12-09 14:56:50', 'BH001'),
(17, 'HĐBH0000017', '2014-12-09 14:57:40', 'BH001'),
(18, 'HĐNH0000018', '2014-12-09 14:57:40', 'TK001'),
(19, 'HĐNH0000019', '2014-12-09 14:57:40', 'TK001'),
(20, 'HĐNH0000020', '2014-12-09 14:57:40', 'TK001'),
(21, 'HĐBH0000021', '2014-12-10 14:58:50', 'TK001'),
(22, 'HĐBH0000022', '2014-12-10 15:01:11', 'TK001'),
(23, 'HĐBH0000023', '2014-12-10 15:01:11', 'TK001'),
(24, 'HĐBH0000024', '2014-12-10 15:01:11', 'TK001'),
(25, 'HĐBH0000025', '2014-12-10 15:01:11', 'BH001'),
(26, 'HĐBH0000026', '2014-12-11 15:02:05', 'BH001'),
(27, 'HĐBH0000027', '2014-12-11 15:02:05', 'BH001'),
(28, 'HĐBH0000028', '2014-12-11 15:02:05', 'BH001'),
(29, 'HĐBH0000029', '2014-12-11 15:02:05', 'BH001'),
(30, 'HĐBH0000030', '2014-12-11 15:02:05', 'BH001'),
(31, 'HĐBH0000031', '2014-12-12 15:18:19', 'BH001'),
(32, 'HĐBH0000032', '2014-12-12 15:18:19', 'BH001'),
(33, 'HĐBH0000033', '2014-12-12 15:18:19', 'BH001'),
(34, 'HĐBH0000034', '2014-12-12 15:18:19', 'BH001'),
(35, 'HĐBH0000035', '2014-12-12 15:18:19', 'BH001'),
(36, 'HĐBH0000036', '2014-12-13 15:03:54', 'BH001'),
(37, 'HĐBH0000037', '2014-12-13 15:03:54', 'BH001'),
(38, 'HĐBH0000038', '2014-12-13 15:03:54', 'BH001'),
(39, 'HĐBH0000039', '2014-12-13 15:03:54', 'BH001'),
(40, 'HĐBH0000040', '2014-12-13 15:03:54', 'BH001'),
(41, 'HĐNH0000041', '2014-12-14 15:05:09', 'TK001'),
(42, 'HĐBH0000042', '2014-12-14 15:05:09', 'BH001'),
(43, 'HĐBH0000043', '2014-12-14 15:05:09', 'BH001'),
(44, 'HĐBH0000044', '2014-12-14 15:05:09', 'BH001'),
(45, 'HĐBH0000045', '2014-12-14 15:05:09', 'BH001'),
(46, 'HĐBH0000046', '2014-12-14 15:05:09', 'BH001'),
(47, 'HĐBH0000047', '2014-12-14 15:05:09', 'BH001'),
(48, 'HĐBH0000048', '2014-12-14 15:05:09', 'BH001'),
(49, 'HĐBH0000049', '2014-12-14 15:05:09', 'BH001'),
(50, 'HĐBH0000050', '2014-12-14 15:05:09', 'BH001');
-- --------------------------------------------------------

--
-- Table structure for table `tbllevel`
--

DROP TABLE IF EXISTS `tbllevel`;
CREATE TABLE IF NOT EXISTS `tbllevel` (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_level` varchar(64) NOT NULL,
  PRIMARY KEY (`level_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

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

DROP TABLE IF EXISTS `tblloaigiaodich`;
CREATE TABLE IF NOT EXISTS `tblloaigiaodich` (
  `loaigiaodich_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_loaigiaodich` varchar(64) NOT NULL,
  PRIMARY KEY (`loaigiaodich_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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

DROP TABLE IF EXISTS `tblnhacungcap`;
CREATE TABLE IF NOT EXISTS `tblnhacungcap` (
  `nhacungcap_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_nhacungcap` varchar(128) NOT NULL,
  PRIMARY KEY (`nhacungcap_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblnhacungcap`
--

INSERT INTO `tblnhacungcap` (`nhacungcap_id`, `ten_nhacungcap`) VALUES
(1, 'NXB Trí Tuệ');

-- --------------------------------------------------------

--
-- Table structure for table `tblnhanvien`
--

DROP TABLE IF EXISTS `tblnhanvien`;
CREATE TABLE IF NOT EXISTS `tblnhanvien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nhanvien_id` varchar(5) NOT NULL,
  `ten_nhanvien` varchar(64) NOT NULL,
  `level_id` int(11) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `dia_chi` varchar(256) NOT NULL,
  `ngay_vao_lam` date NOT NULL,
  `avatar` varchar(128) NOT NULL,
  `password` varchar(50) NOT NULL,
  `SDT` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nhanvien_id` (`nhanvien_id`),
  FOREIGN KEY (`level_id`) REFERENCES tbllevel(`level_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblnhanvien`
--

INSERT INTO `tblnhanvien` (`id`, `nhanvien_id`, `ten_nhanvien`, `level_id`, `ngay_sinh`, `dia_chi`, `ngay_vao_lam`, `avatar`, `password`, `SDT`) VALUES
(1, 'QL001', 'Trương Bá Nam', 1, '1996-02-08', 'Hà Nội', '2014-07-07', 'upload/20141225104255', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '0962723029'),
(2, 'BH001', 'Hà', 2, '1996-10-05', 'Hà Nội', '2014-12-25', 'upload/20141225104323', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '01654667209'),
(4, 'BH002', 'Hùng', 2, '1996-10-05', 'Hà Nội', '2014-12-25', 'upload/20141225050419', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '01654667209'),
(5, 'TK001', 'Hà', 3, '1996-10-05', 'Hà Nội', '2014-12-26', 'upload/20141226081249', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '01654667209');

-- --------------------------------------------------------

--
-- Table structure for table `tblsanpham`
--

DROP TABLE IF EXISTS `tblsanpham`;
CREATE TABLE IF NOT EXISTS `tblsanpham` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sanpham_id` varchar(7) NOT NULL,
  `ten_sanpham` varchar(128) NOT NULL,
  `danhmuc_id` int(11) NOT NULL,
  `nhacungcap_id` int(11) NOT NULL,
  `donvi_id` int(11) NOT NULL,
  `gia_nhap` float unsigned NOT NULL,
  `gia_ban` float unsigned NOT NULL,
  `soluong` int(10) unsigned NOT NULL,
  `giam_gia` int(10) unsigned NOT NULL,
  `image_link` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sanpham_id` (`sanpham_id`),
  FOREIGN KEY (`danhmuc_id`) REFERENCES tbldanhmuc(`danhmuc_id`),
  FOREIGN KEY (`nhacungcap_id`) REFERENCES tblnhacungcap(`nhacungcap_id`),
  FOREIGN KEY (`donvi_id`) REFERENCES tbldonvi(`donvi_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblsanpham`
--

INSERT INTO `tblsanpham` (`id`, `sanpham_id`, `ten_sanpham`, `danhmuc_id`, `nhacungcap_id`, `donvi_id`, `gia_nhap`, `gia_ban`, `soluong`, `giam_gia`, `image_link`) VALUES
(1, 'SA00001', 'Siêu quậy Teppi', 1, 1, 1, 10000, 100000, 15, 0, ''),
(2, 'SA00002', 'Thiên Ngọc Minh Uy', 1, 1, 1, 20000, 200000, 23, 0, ''),
(3, 'SA00003', 'Doremon', 1, 1, 1, 30000, 300000, 16, 0, ''),
(4, 'SA00004', 'Ô long viện', 1, 1, 1, 40000, 400000, 17, 0, ''),
(5, 'SA00005', 'Yêu nhầm chị hai, được nhầm em gái', 1, 1, 1, 50000, 500000, 20, 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
