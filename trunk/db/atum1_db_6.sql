-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2014 at 02:56 PM
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
CREATE DATABASE IF NOT EXISTS `atum1_db_6` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `atum1_db_6`;

-- --------------------------------------------------------

--
-- Table structure for table `tblbanhang`
--

DROP TABLE IF EXISTS `tblbanhang`;
CREATE TABLE IF NOT EXISTS `tblbanhang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_hoadon` varchar(256) CHARACTER SET utf8 NOT NULL,
  `sanpham_id` varchar(7) CHARACTER SET utf8 NOT NULL,
  `soluong` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`ten_hoadon`) REFERENCES tblhoadon(`ten_hoadon`),
  FOREIGN KEY (`sanpham_id`) REFERENCES tblsanpham(`sanpham_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `tblbanhang`
--

INSERT INTO `tblbanhang` (`id`, `ten_hoadon`, `sanpham_id`, `soluong`) VALUES
(1, 'TTBH0000006', 'SA00001', 2),
(2, 'TTBH0000006', 'SA00002', 2),
(3, 'TTBH0000007', 'SA00003', 4),
(4, 'TTBH0000008', 'SA00003', 1),
(5, 'TTBH0000008', 'SA00005', 2),
(6, 'TTBH0000009', 'SA00004', 1),
(7, 'TTBH0000010', 'SA00003', 5),
(8, 'TTBH0000011', 'SA00001', 1),
(9, 'TTBH0000012', 'SA00001', 3),
(10, 'TTBH0000013', 'SA00004', 1),
(11, 'TTBH0000014', 'SA00005', 1),
(12, 'TTBH0000015', 'SA00001', 2),
(13, 'TTBH0000016', 'SA00001', 1),
(14, 'TTBH0000016', 'SA00001', 1),
(15, 'TTBH0000017', 'SA00001', 2),
(16, 'TTBH0000018', 'SA00001', 1),
(17, 'TTBH0000019', 'SA00002', 1),
(18, 'TTBH0000020', 'SA00005', 1),
(19, 'TTBH0000026', 'SA00001', 2),
(20, 'TTBH0000027', 'SA00002', 2),
(21, 'TTBH0000028', 'SA00001', 2),
(22, 'TTBH0000028', 'SA00003', 2),
(23, 'TTBH0000028', 'SA00001', 2),
(24, 'TTBH0000029', 'SA00004', 4),
(25, 'TTBH0000029', 'SA00005', 2),
(26, 'TTBH0000030', 'SA00002', 2),
(27, 'TTBH0000031', 'SA00001', 4),
(28, 'TTBH0000032', 'SA00005', 2),
(29, 'TTBH0000033', 'SA00004', 4),
(30, 'TTBH0000034', 'SA00001', 2),
(31, 'TTBH0000034', 'SA00003', 2),
(32, 'TTBH0000034', 'SA00005', 2),
(33, 'TTBH0000035', 'SA00004', 3);

--
-- Triggers `tblbanhang`
--
DROP TRIGGER IF EXISTS `banhang`;
DELIMITER //
CREATE TRIGGER `banhang` AFTER INSERT ON `tblbanhang`
 FOR EACH ROW BEGIN
	DECLARE soluongban INT;
    DECLARE masanpham varchar(7);
    SELECT soluong INTO soluongban FROM tblbanhang WHERE id = (SELECT MAX(id) FROM tblbanhang);
    SELECT sanpham_id INTO masanpham FROM tblbanhang WHERE id = (SELECT MAX(id) FROM tblbanhang);
    UPDATE
    	tblsanpham
    SET
    	soluong = soluong - soluongban
    WHERE
    	sanpham_id = masanpham;
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
  `ten_danhmuc` varchar(128) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`danhmuc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

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
  `ten_donvi` varchar(128) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`donvi_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

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
  `ten_hoadon` varchar(256) CHARACTER SET utf8 NOT NULL,
  `loaigiaodich_id` int(11) NOT NULL,
  `ngay` date NOT NULL,
  `gio` time NOT NULL,
  `nhanvien_id` varchar(5) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ten_hoadon`),
  FOREIGN KEY (`nhanvien_id`) REFERENCES tblnhanvien(`nhanvien_id`),
  FOREIGN KEY (`loaigiaodich_id`) REFERENCES tblloaigiaodich(`loaigiaodich_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblhoadon`
--

INSERT INTO `tblhoadon` (`ten_hoadon`, `loaigiaodich_id`, `ngay`, `gio`, `nhanvien_id`) VALUES
('TTBH0000001', 2, '2014-12-08', '15:16:50', '1'),
('TTBH0000002', 2, '2014-12-08', '15:16:50', '1'),
('TTBH0000003', 2, '2014-12-08', '15:16:50', '1'),
('TTBH0000004', 2, '2014-12-08', '15:16:50', '1'),
('TTBH0000005', 2, '2014-12-08', '15:16:50', '1'),
('TTBH0000006', 1, '2014-12-09', '14:56:50', '1'),
('TTBH0000007', 1, '2014-12-09', '14:57:40', '1'),
('TTBH0000008', 1, '2014-12-09', '14:57:40', '1'),
('TTBH0000009', 1, '2014-12-09', '14:57:40', '1'),
('TTBH0000010', 1, '2014-12-09', '14:57:40', '1'),
('TTBH0000011', 1, '2014-12-10', '14:58:50', '1'),
('TTBH0000012', 1, '2014-12-10', '15:01:11', '1'),
('TTBH0000013', 1, '2014-12-10', '15:01:11', '1'),
('TTBH0000014', 1, '2014-12-10', '15:01:11', '1'),
('TTBH0000015', 1, '2014-12-10', '15:01:11', '1'),
('TTBH0000016', 1, '2014-12-11', '15:02:05', '1'),
('TTBH0000017', 1, '2014-12-11', '15:02:05', '1'),
('TTBH0000018', 1, '2014-12-11', '15:02:05', '1'),
('TTBH0000019', 1, '2014-12-11', '15:02:05', '1'),
('TTBH0000020', 1, '2014-12-11', '15:02:05', '1'),
('TTBH0000021', 2, '2014-12-12', '15:18:19', '1'),
('TTBH0000022', 2, '2014-12-12', '15:18:19', '1'),
('TTBH0000023', 2, '2014-12-12', '15:18:19', '1'),
('TTBH0000024', 2, '2014-12-12', '15:18:19', '1'),
('TTBH0000025', 2, '2014-12-12', '15:18:19', '1'),
('TTBH0000026', 1, '2014-12-13', '15:03:54', '1'),
('TTBH0000027', 1, '2014-12-13', '15:03:54', '1'),
('TTBH0000028', 1, '2014-12-13', '15:03:54', '1'),
('TTBH0000029', 1, '2014-12-13', '15:03:54', '1'),
('TTBH0000030', 1, '2014-12-13', '15:03:54', '1'),
('TTBH0000031', 1, '2014-12-14', '15:05:09', '1'),
('TTBH0000032', 1, '2014-12-14', '15:05:09', '1'),
('TTBH0000033', 1, '2014-12-14', '15:05:09', '1'),
('TTBH0000034', 1, '2014-12-14', '15:05:09', '1'),
('TTBH0000035', 1, '2014-12-14', '15:05:09', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbllevel`
--

DROP TABLE IF EXISTS `tbllevel`;
CREATE TABLE IF NOT EXISTS `tbllevel` (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_level` varchar(64) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`level_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

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
  `ten_loaigiaodich` varchar(64) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`loaigiaodich_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

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
  `ten_nhacungcap` varchar(128) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`nhacungcap_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

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
  `nhanvien_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `ten_nhanvien` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `level_id` int(11) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `dia_chi` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_vao_lam` date NOT NULL,
  `avatar` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(26) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nhanvien_id` (`nhanvien_id`),
  FOREIGN KEY (`level_id`) REFERENCES tbllevel(`level_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblnhanvien`
--

INSERT INTO `tblnhanvien` (`id`, `nhanvien_id`, `ten_nhanvien`, `level_id`, `ngay_sinh`, `dia_chi`, `ngay_vao_lam`, `avatar`, `password`, `SDT`) VALUES
(1, 'BH001', 'Trương Bá Nam', 1, '1996-02-08', 'Hà Nội', '2014-07-07', '', '123456', '0962723029');

-- --------------------------------------------------------

--
-- Table structure for table `tblnhaphang`
--

DROP TABLE IF EXISTS `tblnhaphang`;
CREATE TABLE IF NOT EXISTS `tblnhaphang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sanpham_id` varchar(7) CHARACTER SET utf8 NOT NULL,
  `ten_hoadon` varchar(256) CHARACTER SET utf8 NOT NULL,
  `soluong` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`sanpham_id`) REFERENCES tblsanpham(`sanpham_id`),
  FOREIGN KEY (`ten_hoadon`) REFERENCES tblhoadon(`ten_hoadon`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tblnhaphang`
--

INSERT INTO `tblnhaphang` (`id`, `sanpham_id`, `ten_hoadon`, `soluong`) VALUES
(1, 'SA00001', 'TTBH0000001', 10),
(2, 'SA00001', 'TTBH0000001', 10),
(3, 'SA00002', 'TTBH0000002', 10),
(4, 'SA00003', 'TTBH0000003', 10),
(5, 'SA00004', 'TTBH0000004', 10),
(6, 'SA00005', 'TTBH0000005', 10),
(7, 'SA00001', 'TTBH0000021', 20),
(8, 'SA00002', 'TTBH0000022', 20),
(9, 'SA00003', 'TTBH0000023', 20),
(10, 'SA00004', 'TTBH0000024', 20),
(11, 'SA00005', 'TTBH0000025', 20);

--
-- Triggers `tblnhaphang`
--
DROP TRIGGER IF EXISTS `nhaphang`;
DELIMITER //
CREATE TRIGGER `nhaphang` AFTER INSERT ON `tblnhaphang`
 FOR EACH ROW BEGIN
	DECLARE soluongnhap INT;
    DECLARE masanpham varchar(7);
    SELECT soluong INTO soluongnhap FROM tblnhaphang WHERE id = (SELECT MAX(id) FROM tblnhaphang);
    SELECT sanpham_id INTO masanpham FROM tblnhaphang WHERE id = (SELECT MAX(id) FROM tblnhaphang);
    UPDATE
    	tblsanpham
    SET
    	soluong = soluong + soluongnhap
    WHERE
    	sanpham_id = masanpham;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tblsanpham`
--

DROP TABLE IF EXISTS `tblsanpham`;
CREATE TABLE IF NOT EXISTS `tblsanpham` (
  `sanpham_id` varchar(7) CHARACTER SET utf8 NOT NULL,
  `ten_sanpham` varchar(128) CHARACTER SET utf8 NOT NULL,
  `danhmuc_id` int(11) NOT NULL,
  `nhacungcap_id` int(11) NOT NULL,
  `donvi_id` int(11) NOT NULL,
  `gia_nhap` float unsigned NOT NULL,
  `gia_ban` float unsigned NOT NULL,
  `soluong` int(10) unsigned NOT NULL,
  `giam_gia` int(10) unsigned NOT NULL,
  `image_link` varchar(128) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`sanpham_id`),
  FOREIGN KEY (`danhmuc_id`) REFERENCES tbldanhmuc(`danhmuc_id`),
  FOREIGN KEY (`nhacungcap_id`) REFERENCES tblnhacungcap(`nhacungcap_id`),
  FOREIGN KEY (`donvi_id`) REFERENCES tbldonvi(`donvi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblsanpham`
--

INSERT INTO `tblsanpham` (`sanpham_id`, `ten_sanpham`, `danhmuc_id`, `nhacungcap_id`, `donvi_id`, `gia_nhap`, `gia_ban`, `soluong`, `giam_gia`, `image_link`) VALUES
('SA00001', 'Siêu quậy Teppi', 1, 1, 1, 10000, 100000, 15, 0, ''),
('SA00002', 'Thiên Ngọc Minh Uy', 1, 1, 1, 20000, 200000, 23, 0, ''),
('SA00003', 'Doremon', 1, 1, 1, 30000, 300000, 16, 0, ''),
('SA00004', 'Ô long viện', 1, 1, 1, 40000, 400000, 17, 0, ''),
('SA00005', 'Yêu nhầm chị hai, được nhầm em gái', 1, 1, 1, 50000, 500000, 20, 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
