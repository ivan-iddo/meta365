-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2018 at 01:21 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meta365`
--

-- --------------------------------------------------------

--
-- Table structure for table `acl`
--

CREATE TABLE `acl` (
  `ai` int(10) UNSIGNED NOT NULL,
  `action_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `acl_actions`
--

CREATE TABLE `acl_actions` (
  `action_id` int(10) UNSIGNED NOT NULL,
  `action_code` varchar(100) NOT NULL COMMENT 'No periods allowed!',
  `action_desc` varchar(100) NOT NULL COMMENT 'Human readable description',
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `acl_categories`
--

CREATE TABLE `acl_categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_code` varchar(100) NOT NULL COMMENT 'No periods allowed!',
  `category_desc` varchar(100) NOT NULL COMMENT 'Human readable description'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_sessions`
--

CREATE TABLE `auth_sessions` (
  `id` varchar(128) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `login_time` datetime DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_address` varchar(45) NOT NULL,
  `user_agent` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_sessions`
--

INSERT INTO `auth_sessions` (`id`, `user_id`, `login_time`, `modified_at`, `ip_address`, `user_agent`) VALUES
('39r0p2vp34qj5hftbksevfg956hl692i', 3614488494, '2018-10-27 16:22:20', '2018-10-27 17:04:01', '::1', 'Chrome 55.0.2883.87 on Windows 7'),
('7qgnu389ttr331k3vug3unfim40dc7te', 3614488494, '2018-10-27 21:41:11', '2018-10-27 21:01:26', '::1', 'Chrome 55.0.2883.87 on Windows 7'),
('2kmums0iv51p3rpgrj800ie57lr29aku', 3614488494, '2018-10-27 23:23:43', '2018-10-27 23:19:18', '::1', 'Chrome 55.0.2883.87 on Windows 7');

-- --------------------------------------------------------

--
-- Table structure for table `bpjs`
--

CREATE TABLE `bpjs` (
  `idpel1` varchar(12) NOT NULL,
  `product_id` varchar(9) NOT NULL,
  `transaction_id` varchar(15) NOT NULL,
  `uid` varchar(11) NOT NULL,
  `pelanggan` varchar(60) NOT NULL,
  `nominal` varchar(15) NOT NULL,
  `struk` varchar(60) NOT NULL,
  `periode` varchar(10) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `date_transaction` datetime NOT NULL,
  `ref2` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bpjs`
--

INSERT INTO `bpjs` (`idpel1`, `product_id`, `transaction_id`, `uid`, `pelanggan`, `nominal`, `struk`, `periode`, `phone`, `date_transaction`, `ref2`) VALUES
('123456789012', '', 'BPJ1810001', '3614488494', '', '', '', '12', '081234129812', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `denied_access`
--

CREATE TABLE `denied_access` (
  `ai` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  `reason_code` tinyint(1) UNSIGNED DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `emoney`
--

CREATE TABLE `emoney` (
  `product_id` varchar(9) NOT NULL,
  `product` varchar(12) NOT NULL,
  `product_type` varchar(20) NOT NULL,
  `nominal` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emoney`
--

INSERT INTO `emoney` (`product_id`, `product`, `product_type`, `nominal`) VALUES
('BNI100', 'E-TOL', 'E-TOL BNI', 'BNI 100 K'),
('BNI150', 'E-TOL', 'E-TOL BNI', 'BNI 150 K'),
('BNI20', 'E-TOL', 'E-TOL BNI', 'BNI 20 K'),
('BNI200', 'E-TOL', 'E-TOL BNI', 'BNI 200 K'),
('BNI300', 'E-TOL', 'E-TOL BNI', 'BNI 300 K'),
('BNI50', 'E-TOL', 'E-TOL BNI', 'BNI 50 K'),
('BNI500', 'E-TOL', 'E-TOL BNI', 'BNI 500 K'),
('G100', 'Go', 'Go-Pay', 'Go-Pay 100 K'),
('G150', 'Go', 'Go-Pay', 'Go-Pay 150 K'),
('G20', 'Go', 'Go-Pay', 'Go-Pay 20 K'),
('G200', 'Go', 'Go-Pay', 'Go-Pay 200 K'),
('G300', 'Go', 'Go-Pay', 'Go-Pay 300 K'),
('G50', 'Go', 'Go-Pay', 'Go-Pay 50 K'),
('G500', 'Go', 'Go-Pay', 'Go-Pay 500 K'),
('Gd100', 'Go', 'Go-Drive', 'Go-Drive 100'),
('Gd150', 'Go', 'Go-Drive', 'Go-Drive 150'),
('Gd20', 'Go', 'Go-Drive', 'Go-Drive 20 '),
('Gd200', 'Go', 'Go-Drive', 'Go-Drive 200'),
('Gd300', 'Go', 'Go-Drive', 'Go-Drive 300'),
('Gd50', 'Go', 'Go-Drive', 'Go-Drive 50 '),
('Gd500', 'Go', 'Go-Drive', 'Go-Drive 500'),
('Gov100', 'Grab', 'Grab-OVO', 'Grab-OVO 100'),
('Gov150', 'Grab', 'Grab-OVO', 'Grab-OVO 150'),
('Gov20', 'Grab', 'Grab-OVO', 'Grab-OVO 20 '),
('Gov200', 'Grab', 'Grab-OVO', 'Grab-OVO 200'),
('Gov300', 'Grab', 'Grab-OVO', 'Grab-OVO 300'),
('Gov50', 'Grab', 'Grab-OVO', 'Grab-OVO 50 '),
('Gov500', 'Grab', 'Grab-OVO', 'Grab-OVO 500'),
('M100', 'E-TOL', 'E-TOL MANDIRI', 'Mandiri 100 '),
('M150', 'E-TOL', 'E-TOL MANDIRI', 'Mandiri 150 '),
('M20', 'E-TOL', 'E-TOL MANDIRI', 'Mandiri 20 K'),
('M200', 'E-TOL', 'E-TOL MANDIRI', 'Mandiri 200 '),
('M300', 'E-TOL', 'E-TOL MANDIRI', 'Mandiri 300 '),
('M50', 'E-TOL', 'E-TOL MANDIRI', 'Mandiri 50 K'),
('M500', 'E-TOL', 'E-TOL MANDIRI', 'Mandiri 500 ');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `phone` varchar(12) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `transaction_id` varchar(20) NOT NULL,
  `uid` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`phone`, `product_id`, `transaction_id`, `uid`) VALUES
('083834129812', 'BSF25H', 'GM1810005', '2147484848');

-- --------------------------------------------------------

--
-- Table structure for table `ips_on_hold`
--

CREATE TABLE `ips_on_hold` (
  `ai` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kai`
--

CREATE TABLE `kai` (
  `from` varchar(40) NOT NULL,
  `to` varchar(40) NOT NULL,
  `date_go` date NOT NULL,
  `date_back` date NOT NULL,
  `transaction_id` varchar(20) NOT NULL,
  `uid` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kai`
--

INSERT INTO `kai` (`from`, `to`, `date_go`, `date_back`, `transaction_id`, `uid`) VALUES
('BDG-BANDUNG', 'JKT-JAKARTA', '2018-10-01', '0000-00-00', 'KAI1810001', '3614488494');

-- --------------------------------------------------------

--
-- Table structure for table `login_errors`
--

CREATE TABLE `login_errors` (
  `ai` int(10) UNSIGNED NOT NULL,
  `username_or_email` varchar(255) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_errors`
--

INSERT INTO `login_errors` (`ai`, `username_or_email`, `ip_address`, `time`) VALUES
(19, 'admin', '::1', '2018-10-27 19:55:21');

-- --------------------------------------------------------

--
-- Table structure for table `multifinance`
--

CREATE TABLE `multifinance` (
  `idpel1` varchar(12) NOT NULL,
  `product_id` varchar(9) NOT NULL,
  `transaction_id` varchar(15) NOT NULL,
  `uid` varchar(11) NOT NULL,
  `pelanggan` varchar(60) NOT NULL,
  `nominal` varchar(15) NOT NULL,
  `struk` varchar(60) NOT NULL,
  `date_transaction` datetime NOT NULL,
  `ref2` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nominal`
--

CREATE TABLE `nominal` (
  `id` int(11) NOT NULL,
  `product_id` varchar(9) NOT NULL,
  `products_type` varchar(12) NOT NULL,
  `nominal` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nominal`
--

INSERT INTO `nominal` (`id`, `product_id`, `products_type`, `nominal`) VALUES
(1, 'PLNPRAH', '20 K', '20000'),
(2, 'PLNPRAH', '50 K', '50000'),
(3, 'PLNPRAH', '100 K', '100000'),
(4, 'PLNPRAH', '200 K', '200000'),
(5, 'PLNPRAH', '500 K', '500000'),
(6, 'PLNPRAH', '1000 K', '1000000'),
(7, 'PLNPRAY', ' 20 K', '20000'),
(8, 'PLNPRAY', '50 K', '50000'),
(9, 'PLNPRAY', '100 K', '100000'),
(10, 'PLNPRAY', '200 K', '200000'),
(11, 'PLNPRAY', '500 K', '500000'),
(12, 'PLNPRAY', '1000 K', '1000000'),
(13, 'PLNNONH', '20 K', '20000'),
(14, 'PLNNONH', '50 K', '500000'),
(15, 'PLNNONH', '100 K', '100000'),
(16, 'PLNNONH', '200 K', '200000'),
(17, 'PLNNONH', '500 K', '500000');

-- --------------------------------------------------------

--
-- Table structure for table `pdam`
--

CREATE TABLE `pdam` (
  `idpel1` varchar(12) NOT NULL,
  `idpel2` varchar(12) NOT NULL,
  `product_id` varchar(9) NOT NULL,
  `transaction_id` varchar(15) NOT NULL,
  `uid` varchar(11) NOT NULL,
  `pelanggan` varchar(60) NOT NULL,
  `nominal` varchar(15) NOT NULL,
  `struk` varchar(60) NOT NULL,
  `date_transaction` datetime NOT NULL,
  `ref2` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pdam`
--

INSERT INTO `pdam` (`idpel1`, `idpel2`, `product_id`, `transaction_id`, `uid`, `pelanggan`, `nominal`, `struk`, `date_transaction`, `ref2`) VALUES
('9889888', '', 'WAAETRA', 'PAM1810001', '3614488494', '', '', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `uid` varchar(11) NOT NULL,
  `transaction_id` varchar(15) NOT NULL,
  `title` varchar(225) NOT NULL,
  `isi` varchar(1000) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `uid`, `transaction_id`, `title`, `isi`, `date`) VALUES
(1, '2147484848', 'PLN1810002', 'Transaksi dengan kode PLN1810002 berhasil', 'Transaksi dengan kode PLN1810002 berhasil', '2018-10-28 04:09:00'),
(2, '3614488494', 'PAM1810001', 'Transaksi dengan kode PAM1810001 berhasil', 'Transaksi dengan kode PAM1810001 berhasil', '2018-10-31 04:00:00'),
(3, '3614488494', '', '', 'hay bang', '2018-10-27 23:33:54'),
(4, '3614488494', '', '', 'Trima Kasih', '2018-10-28 00:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `pesawat`
--

CREATE TABLE `pesawat` (
  `from` varchar(40) NOT NULL,
  `to` varchar(40) NOT NULL,
  `date_go` date NOT NULL,
  `date_back` date NOT NULL,
  `transaction_id` varchar(20) NOT NULL,
  `uid` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pln`
--

CREATE TABLE `pln` (
  `idpel1` varchar(12) NOT NULL,
  `idpel2` varchar(12) NOT NULL,
  `product_id` varchar(9) NOT NULL,
  `nominal` varchar(15) NOT NULL,
  `transaction_id` varchar(15) NOT NULL,
  `uid` varchar(11) NOT NULL,
  `pelanggan` varchar(60) NOT NULL,
  `struk` varchar(40) NOT NULL,
  `date_transaction` datetime NOT NULL,
  `ref2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pln`
--

INSERT INTO `pln` (`idpel1`, `idpel2`, `product_id`, `nominal`, `transaction_id`, `uid`, `pelanggan`, `struk`, `date_transaction`, `ref2`) VALUES
('', '981211111111', 'PLNPRAH', '20000', 'PLN1810001', '2147484848', '', '', '0000-00-00 00:00:00', ''),
('', '981211111111', 'PLNPRAY', '100000', 'PLN1810002', '2147484848', '', '', '0000-00-00 00:00:00', ''),
('981211111111', '', 'PLNPASCH', '', 'PLN1810003', '2147484848', '', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `pricelist`
--

CREATE TABLE `pricelist` (
  `pricelist_id` int(11) NOT NULL,
  `product_id` varchar(9) NOT NULL,
  `price_buy` varchar(15) NOT NULL,
  `price_sell` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pricelist`
--

INSERT INTO `pricelist` (`pricelist_id`, `product_id`, `price_buy`, `price_sell`) VALUES
(1, 'AGUH', '31600', '32000'),
(2, 'AX5H', '5600', '6000'),
(3, 'AX10H', '10600', '11000'),
(4, 'AX25H', '25100', '26000'),
(5, 'AX50H', '49525', '50500'),
(6, 'AX100H', '98600', '100100'),
(7, 'AXD1H', '21100', '22000'),
(8, 'AXD2H', '28100', '29000'),
(9, 'I5H', '5675', '6000'),
(10, 'I10H', '10675', '11000'),
(11, 'I20H', '20050', '21000'),
(12, 'I25H', '25000', '26000'),
(13, 'I30H', '29900', '31000'),
(14, 'I50H', '49250', '50500'),
(15, 'I100H', '97600', '100500'),
(16, 'ID2H', '37100', '38000'),
(17, 'ID3H', '51000', '52000'),
(18, 'ID1H', '27100', '28000'),
(19, 'T5H', '4975', '6000'),
(20, 'T10H', '9850', '11000'),
(21, 'T20H', '19650', '21000'),
(22, 'T25H', '24700', '25000'),
(23, 'T30H', '29600', '31000'),
(24, 'T50H', '49300', '50500');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` varchar(9) NOT NULL,
  `product_type` varchar(40) NOT NULL,
  `product` varchar(40) NOT NULL,
  `product_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_type`, `product`, `product_name`) VALUES
('ADIRA', 'MULTIFINANCE ADIRA FINANCE', 'Multifinance', 'ADIRA FINANCE'),
('AGUH', 'AXIS', 'PULSA', 'Internet Unlimited 30 Hari (Paket Data)'),
('AMQ', 'PAPUA DAN MALUKU', 'BANDARA', 'Bandar Udara Internasional Pattimura,Ambon'),
('AX100H', 'AXIS', 'PULSA', 'AXIS 100 K'),
('AX10H', 'AXIS', 'PULSA', 'AXIS 10 K'),
('AX25H', 'AXIS', 'PULSA', 'AXIS 25 K'),
('AX50H', 'AXIS', 'PULSA', 'AXIS 50 K'),
('AX5H', 'AXIS', 'PULSA', 'AXIS 5 K'),
('AXD1H', 'AXIS', 'PULSA', '1GB,24JAM Aktif 30 Hari (Paket Data)'),
('AXD2H', 'AXIS', 'PULSA', '2GB,24JAM Aktif 60 Hari (Paket Data)'),
('B100H', 'BOLT', 'PULSA', 'BOLT 100 K'),
('B150H', 'BOLT', 'PULSA', 'BOLT 150 K'),
('B200H', 'BOLT', 'PULSA', 'BOLT 200 K'),
('B25H', 'BOLT', 'PULSA', 'BOLT 25 K'),
('B50H', 'BOLT', 'PULSA', 'BOLT 50 K'),
('BAF', 'MULTIFINANCE BAF FINANCE', 'Multifinance', 'BAF FINANCE'),
('BDJ', 'KALIMANTAN', 'BANDARA', 'Bandar Udara Internasional Syamsuddin Noor,Banjarbaru'),
('BDO', 'JAWA', 'BANDARA', 'Bandar Udara Internasional Husein Sastranegara,Bandung'),
('BIK', 'PAPUA DAN MALUKU', 'BANDARA', 'Bandar Udara Internasional Frans Kaisiepo,Biak Numfor'),
('BPN', 'KALIMANTAN', 'BANDARA', 'Bandar Udara Sultan Aji Muhammad Sulaiman,Balikpapan'),
('BSF100H', 'BSF', 'GAME', 'BSF Voucher 100 K'),
('BSF10H', 'BSF', 'GAME', 'BSF Voucher 10 K'),
('BSF25H', 'BSF', 'GAME', 'BSF Voucher 25 K'),
('BSF500H', 'BSF', 'GAME', 'BSF Voucher 500 K'),
('BSF50H', 'BSF', 'GAME', 'BSF Voucher 50 K'),
('BSF5H', 'BSF', 'GAME', 'BSF Voucher 5 K'),
('BTH', 'SUMATERA', 'BANDARA', 'Bandar Udara Hang Nadim,Batam'),
('BTJ', 'SUMATERA', 'BANDARA', 'Bandar Udara Internasional Sultan Iskandar Muda,Banda Aceh'),
('BUW', 'SULAWESI', 'BANDARA', 'Bandar Udara Internasional Sultan Murhum Kaimuddin,Baubau'),
('CGK', 'JAWA', 'BANDARA', 'Bandar Udara Internasional Soekarno-Hatta,Tangerang'),
('CITIBANK', 'MULTIFINANCE CITIBANK', 'Multifinance ', 'CITIBANK'),
('CM100H', 'SMARTFREN', 'PULSA', 'SMARTFREN 100 K'),
('CM10H', 'SMARTFREN', 'PULSA', 'SMARTFREN 10 K'),
('CM150H', 'SMARTFREN', 'PULSA', 'SMARTFREN 150 K'),
('CM200H', 'SMARTFREN', 'PULSA', 'SMARTFREN 200 K'),
('CM20H', 'SMARTFREN', 'PULSA', 'SMARTFREN 20 K'),
('CM25H', 'SMARTFREN', 'PULSA', 'SMARTFREN 25 K'),
('CM300H', 'SMARTFREN', 'PULSA', 'SMARTFREN 300 K'),
('CM500H', 'SMARTFREN', 'PULSA', 'SMARTFREN 500 K'),
('CM50H', 'SMARTFREN', 'PULSA', 'SMARTFREN 50 K'),
('CM5H', 'SMARTFREN', 'PULSA', 'SMARTFREN 5 K'),
('CM60H', 'SMARTFREN', 'PULSA', 'SMARTFREN 60 K'),
('DJJ', 'PAPUA DAN MALUKU', 'BANDARA', 'Bandar Udara Internasional Sentani,Jayapura'),
('DPS', 'BALI DAN NUSA TENGGARA', 'BANDARA', 'Bandar Udara Internasional Ngurah Rai,Denpasar'),
('GAR1030H', 'Aeria', 'GAME', 'Aeria 1030 Point'),
('GAR11600H', 'Aeria', 'GAME', 'Aeria 11600 Point'),
('GAR2100H', 'Aeria', 'GAME', 'Aeria 2100 Point'),
('GAR3240H', 'Aeria', 'GAME', 'Aeria 3240 Point'),
('GAR510H', 'Aeria', 'GAME', 'Aeria 510 Point'),
('GAR5500H', 'Aeria', 'GAME', 'Aeria 5500 Point'),
('GAR8550H', 'Aeria', 'GAME', 'Aeria 8550 Poin'),
('GAS100H', 'CASH', 'GAME', 'CASH 100 K'),
('GDG100H', 'DASA', 'GAME', 'DASA COIN 100 K'),
('GDG10H', 'DASA', 'GAME', 'DASA COIN 10 K'),
('GDG20H', 'DASA', 'GAME', 'DASA COIN 20 K'),
('GDG50H', 'DASA', 'GAME', 'DASA COIN 50 K'),
('HLP', 'JAWA', 'BANDARA', 'Bandar Udara Internasional Halim Perdanakusuma,Jakarta'),
('HPESIA', 'TELEPON PASCA BAYAR', 'TELKOM', 'ESIA (POSTPAID)'),
('HPFREN', 'TELEPON PASCA BAYAR', 'TELKOM', 'FREN, MOBI (POSTPAID)'),
('HPMTRIX', 'TELEPON PASCA BAYAR', 'TELKOM', 'INDOSAT (MATRIX)'),
('HPSMART', 'TELEPON PASCA BAYAR', 'TELKOM', 'SMARTFREN (POSTPAID)'),
('HPTHREE', 'TELEPON PASCA BAYAR', 'TELKOM', 'THREE (POSTPAID)'),
('HPTSEL', 'TELEPON PASCA BAYAR', 'TELKOM', 'TELKOMSEL (HALO)'),
('HPTSELH', 'TELEPON PASCA BAYAR', 'TELKOM', 'TELKOMSEL HALO H2H'),
('HPXL', 'TELEPON PASCA BAYAR', 'TELKOM', 'XL (XPLOR)'),
('I100H', 'INDOSAT', 'PULSA', 'INDOSAT 100 K'),
('I10H', 'INDOSAT', 'PULSA', 'INDOSAT 10 K'),
('I20H', 'INDOSAT', 'PULSA', 'INDOSAT 20 K'),
('I25H', 'INDOSAT', 'PULSA', 'INDOSAT 25 K'),
('I30H', 'INDOSAT', 'PULSA', 'INDOSAT 30 K'),
('I50H', 'INDOSAT', 'PULSA', 'INDOSAT 50 K'),
('I5H', 'INDOSAT', 'PULSA', 'INDOSAT 5 K'),
('ID1H', 'INDOSAT', 'PULSA', '1GB 24JAM + BONUS 1GB 4G (60HR) (Paket Data)'),
('ID2H', 'INDOSAT', 'PULSA', '2GB 24jam + Bonus 2GB 4G (Paket Data)'),
('ID3H', 'INDOSAT', 'PULSA', '3GB 24jam + Bonus 2GB 4GB (Paket Data)'),
('JOG', 'JAWA', 'BANDARA', 'Bandar Udara Internasional Adisutjipto,Sleman'),
('KNO', 'SUMATERA', 'BANDARA', 'Bandar Udara Internasional Kualanamu,Deli Serdang'),
('KOE', 'BALI DAN NUSA TENGGARA', 'BANDARA', 'Bandar Udara Internasional El Tari,Kupang'),
('LBJ', 'BALI DAN NUSA TENGGARA', 'BANDARA', 'Bandar Udara Komodo,Manggarai Barat'),
('LOP', 'BALI DAN NUSA TENGGARA', 'BANDARA', 'Bandar Udara Internasional Lombok Praya,Lombok Tengah'),
('MAF', 'MULTIFINANCE MAF FINANCE', 'Multifinance', 'MAF FINANCE'),
('Mandiri T', 'MULTIFINANCE Mandiri Tunas FINANCE', 'Multifinance', 'Mandiri Tunas FINANCE'),
('MCF FINAN', 'MULTIFINANCE MCF FINANCE', 'Multifinance', 'MCF FINANCE'),
('MDC', 'SULAWESI', 'BANDARA', 'Bandar Udara Internasional Sam Ratulangi,Manado'),
('MES', 'SUMATERA', 'BANDARA', 'Bandar Udara Internasional Polonia,Medan'),
('MKQ', 'PAPUA DAN MALUKU', 'BANDARA', 'Bandar Udara Internasional Mopah,Merauke'),
('PDG', 'SUMATERA', 'BANDARA', 'Bandar Udara Internasional Minangkabau,Padang Pariaman'),
('PKU', 'SUMATERA', 'BANDARA', 'Bandar Udara Internasional Sultan Syarif Kasim II,Pekanbaru'),
('PLM', 'SUMATERA', 'BANDARA', 'Bandar Udara Internasional Sultan Mahmud Badaruddin II,Palem'),
('PLNNONH', 'NON TAGIHAN', 'PLN', 'PLN NONTAGLIS H2H'),
('PLNPASCH', 'PASCA BAYAR', 'PLN', 'PLN PASCABAYAR H2H'),
('PLNPRAH', 'PRAH BAYAR', 'PLN', 'PLN Prah Bayar (Token)'),
('PLNPRAY', 'PRA BAYAR', 'PLN', 'PLN Pra Bayar (Token)'),
('PNK', 'KALIMANTAN', 'BANDARA', 'Bandar Udara Internasional Supadio,Pontianak'),
('R100H', 'FREN', 'PULSA', 'FREN 100 K'),
('R10H', 'FREN', 'PULSA', 'FREN 10 K'),
('R20H', 'FREN', 'PULSA', 'FREN 20 K'),
('R25H', 'FREN', 'PULSA', 'FREN 25 K'),
('R50H', 'FREN', 'PULSA', 'FREN 50 K'),
('R5H', 'FREN', 'PULSA', 'FREN 5 K'),
('S100H', 'TELKOMSEL', 'PULSA', 'TELKOMSEL  100 K'),
('S10H', 'TELKOMSEL', 'PULSA', 'TELKOMSEL  10 K'),
('S20H', 'TELKOMSEL', 'PULSA', 'TELKOMSEL  20 K'),
('S25H', 'TELKOMSEL', 'PULSA', 'TELKOMSEL  25 K'),
('S50H', 'TELKOMSEL', 'PULSA', 'TELKOMSEL  50 K'),
('S5H', 'TELKOMSEL', 'PULSA', 'TELKOMSEL  5 K'),
('SD100H', 'TELKOMSEL', 'PULSA', 'DATA 2,5GB, 30hari (Paket Data)'),
('SD10H', 'TELKOMSEL', 'PULSA', 'DATA 40MB, 7hari (Paket Data)'),
('SD20H', 'TELKOMSEL', 'PULSA', 'DATA 200MB, 7hari (Paket Data)'),
('SD25H', 'TELKOMSEL', 'PULSA', 'DATA 360MB, 30hari (Paket Data)'),
('SD50H', 'TELKOMSEL', 'PULSA', 'DATA 800MB, 30hari (Paket Data)'),
('SD5H', 'TELKOMSEL', 'PULSA', 'DATA 20MB, 7hari (Paket Data)'),
('SOC', 'JAWA', 'BANDARA', 'Bandar Udara Internasional Adisumarmo,Boyolali'),
('SPEEDY', 'TELKOM', 'TELKOM', 'SPEEDY'),
('SRG', 'JAWA', 'BANDARA', 'Bandar Udara Internasional Achmad Yani,Semarang'),
('STANDAR', 'MULTIFINANCE STANDAR CHARTERED', 'Multifinance', 'STANDAR CHARTERED'),
('SUB', 'JAWA', 'BANDARA', 'Bandar Udara Internasional Juanda,Sidoarjo'),
('T100H', 'THREE', 'PULSA', 'THREE 100 K'),
('T10H', 'THREE', 'PULSA', 'THREE 10 K'),
('T20H', 'THREE', 'PULSA', 'THREE 20 K'),
('T25H', 'THREE', 'PULSA', 'THREE 25 K'),
('T30H', 'THREE', 'PULSA', 'THREE 30 K'),
('T50H', 'THREE', 'PULSA', 'THREE 50 K'),
('T5H', 'THREE', 'PULSA', 'THREE 5 K'),
('TD1H', 'THREE', 'PULSA', '1GB + 1GB 4G 7HARI (Paket Data)'),
('TD2H', 'THREE', 'PULSA', '2GB + 4GB 4G 7HARI (Paket Data)'),
('TELEPON', 'TELKOM', 'TELKOM', 'TELEPON'),
('TELVISCOS', 'Voucher Telkomvision', 'TV', 'Voucher Telkomvision Pra Cosmo'),
('TELVISFIL', 'Voucher Telkomvision', 'TV', 'Voucher Telkomvision Pra Film'),
('TELVISHEM', 'Voucher Telkomvision', 'TV', 'Voucher Telkomvision Pra Hemat'),
('TELVISOLA', 'Voucher Telkomvision', 'TV', 'Voucher Telkomvision Pra Olahrag'),
('TELVISPEL', 'Voucher Telkomvision', 'TV', 'Voucher Telkomvision Pra Pelangi'),
('TELVISPEN', 'Voucher Telkomvision', 'TV', 'Voucher Telkomvision Pra Pendidi'),
('TIM', 'PAPUA DAN MALUKU', 'BANDARA', 'Bandar Udara Internasional Mozes Kilangin,Mimika'),
('TKG', 'SUMATERA', 'BANDARA', 'Bandar Udara Internasional Radin Inten II,Bandar Lampung'),
('TNJ', 'SUMATERA', 'BANDARA', 'Bandar Udara Internasional Raja Haji Fisabilillah,Tanjungpin'),
('TRK', 'KALIMANTAN', 'BANDARA', 'Bandar Udara Internasional Juwata,Tarakan'),
('TVBIG', 'BIG TV', 'TV', 'BIG TV'),
('TVGEN100', 'GENFLIX', 'TV', 'GENFLIX (100.000)'),
('TVGEN25', 'GENFLIX', 'TV', 'GENFLIX (25.000)'),
('TVGEN50', 'GENFLIX', 'TV', 'GENFLIX (50.000)'),
('TVINDVS', 'INDOVISION, TOPTV, OKEVISION', 'TV', 'INDOVISION, TOPTV, OKEVISION'),
('TVINNOV', 'INNOVATE TV', 'TV', 'INNOVATE TV'),
('TVKMVPRE', 'Voucher Telkomvision', 'TV', 'Voucher Telkomvision Pra Combo'),
('TVKV100', 'K VISION ', 'TV', 'K VISION (100.000)'),
('TVKV1000', 'K VISION ', 'TV', 'K VISION (1.000.000)'),
('TVKV125', 'K VISION ', 'TV', 'K VISION (125.000)'),
('TVKV150', 'K VISION ', 'TV', 'K VISION (150.000)'),
('TVKV175', 'K VISION ', 'TV', 'K VISION (175.000)'),
('TVKV200', 'K VISION ', 'TV', 'K VISION (200.000)'),
('TVKV250', 'K VISION ', 'TV', 'K VISION (250.000)'),
('TVKV300', 'K VISION ', 'TV', 'K VISION (300.000)'),
('TVKV50', 'K VISION ', 'TV', 'K VISION (50.000)'),
('TVKV500', 'K VISION ', 'TV', 'K VISION (500.000)'),
('TVKV75', 'K VISION ', 'TV', 'K VISION (75.000)'),
('TVKV750', 'K VISION ', 'TV', 'K VISION (750.000)'),
('TVNEX', 'Nex Media', 'TV', 'Nex Media'),
('TVORANGE', 'Orange TV', 'TV', 'Orange TV'),
('TVORG100', 'Orange TV', 'TV', 'Orange TV (100.000)'),
('TVORG300', 'Orange TV', 'TV', 'Orange TV (300.000)'),
('TVORG50', 'Orange TV', 'TV', 'Orange TV (50.000)'),
('TVORG80', 'Orange TV', 'TV', 'Orange TV (80.000)'),
('TVSKYFAM1', 'SKYNINDO TV FAMILY', 'TV', 'SKYNINDO TV FAMILY 12 BLN (480.000)'),
('TVSKYFAM6', 'SKYNINDO TV FAMILY', 'TV', 'SKYNINDO TV FAMILY 6 BLN (240.000)'),
('TVTLKMV', 'Transvision, Telkomvision, Yes TV', 'TV', 'Transvision, Telkomvision, Yes TV'),
('TVTOPAS', 'Topas TV', 'TV', 'Topas TV'),
('UPG', 'SULAWESI', 'BANDARA', 'Bandar Udara Internasional Sultan Hasanuddin,Maros'),
('VCC100H', 'Cherry', 'GAME', 'Cherry Credit 100 K'),
('VCC300H', 'Cherry', 'GAME', 'Cherry Credit 300 K'),
('VCC50H', 'Cherry', 'GAME', 'Cherry Credit 50 K'),
('WAAETRA', 'JAKARTA', 'PDAM', 'AETRA JAKARTA'),
('WABALIKPP', 'KALIMANTAN TIMUR', 'PDAM', 'KOTA BALIKPAPAN (KALTIM)'),
('WABATANG', 'JAWA TENGAH', 'PDAM', 'KAB. BATANG (JATENG)'),
('WABDG', 'JAWA BARAT', 'PDAM', 'KOTA BANDUNG (JABAR)'),
('WABEKASI', 'JAWA BARAT', 'PDAM', 'KOTA BEKASI (JABAR)'),
('WABGK', 'JAWA TIMUR', 'PDAM', 'KAB. BANGKALAN (JATIM)'),
('WABJN', 'JAWA TIMUR', 'PDAM', 'KAB. BOJONEGORO (JATIM)'),
('WABOGOR', 'JAWA BARAT', 'PDAM', 'KAB. BOGOR (JABAR)'),
('WABONDO', 'JAWA TIMUR', 'PDAM', 'KAB. BONDOWOSO (JATIM)'),
('WADEPOK', 'JAWA BARAT', 'PDAM', 'KOTA DEPOK (JABAR)'),
('WADPSR', 'BALI', 'PDAM', 'KOTA DENPASAR (BALI)'),
('WAGIRIMM', 'NUSA TENGGARA BARAT', 'PDAM', 'KOTA MATARAM (NTB)'),
('WAGROBGAN', 'JAWA TENGAH', 'PDAM', 'KAB. GROBOGAN (JATENG)'),
('WAGROGOT', 'KALIMANTAN TIMUR', 'PDAM', 'PDAM KOTA TANAH GROGOT (KALTIM)'),
('WAJAMBI', 'JAMBI', 'PDAM', 'KOTA JAMBI'),
('WAJMBR', 'JAWA TIMUR', 'PDAM', 'KAB. JEMBER (JATIM)'),
('WAKLATEN', 'JAWA TENGAH', 'PDAM', 'KAB. KLATEN (JATENG)'),
('WAKOBGR', 'JAWA BARAT', 'PDAM', 'KOTA BOGOR (JABAR)'),
('WAKOPASU', 'JAWA TIMUR', 'PDAM', 'KOTA PASURUAN (JATIM)'),
('WAKOSOLO', 'JAWA TENGAH', 'PDAM', 'KOTA SURAKARTA / KOTA SOLO (JATENG)'),
('WAKRWNG', 'JAWA BARAT', 'PDAM', 'KAB. KARAWANG (JABAR)'),
('WAKUBURAY', 'KALIMANTAN BARAT', 'PDAM', 'KAB. KUBU RAYA (KALBAR)'),
('WALMPNG', 'LAMPUNG', 'PDAM', 'KOTA BANDAR LAMPUNG'),
('WAMAKASAR', 'SULAWESI SELATAN', 'PDAM', 'KOTA MAKASSAR (SULSEL)'),
('WAMANADO', 'SULAWESI UTARA', 'PDAM', 'KOTA MANADO (SULUT)'),
('WAMEDAN', 'SUMATRA UTARA', 'PDAM', 'KOTA MEDAN (SUMUT)'),
('WAMJK', 'JAWA TIMUR', 'PDAM', 'KAB. MOJOKERTO (JATIM)'),
('WAPLMBNG', 'SUMATRA SELATAN', 'PDAM', 'KOTA PALEMBANG (SUMSEL)'),
('WAPLYJ', 'JAKARTA', 'PDAM', 'PALYJA JAKARTA'),
('WAPURWORE', 'JAWA TENGAH', 'PDAM', 'KAB. PURWOREJO (JATENG)'),
('WASBY', 'JAWA TIMUR', 'PDAM', 'KOTA SURABAYA (JATIM)'),
('WASDA', 'JAWA TIMUR', 'PDAM', 'KAB. SIDOARJO (JATIM)'),
('WASITU', 'JAWA TIMUR', 'PDAM', 'KAB. SITUBONDO (JATIM)'),
('WATAPIN', 'KALIMANTAN SELATAN', 'PDAM', 'KAB. TAPIN (KALSEL)'),
('WOM', 'MULTIFINANCE WOM FINANCE', 'Multifinance', 'WOM FINANCE'),
('XD120H', 'XL', 'PULSA', 'HOTROD 6GB 30HARI (Paket Data)'),
('XD30H', 'XL', 'PULSA', 'HOTROD 600MB 30HARI (Paket Data)'),
('XD60H', 'XL', 'PULSA', 'HOTROD 2GB 30HARI'),
('XDC12H', 'XL', 'PULSA', '2GB+10GB 4G + 30menit all 30hr 24jam (Paket Data)'),
('XDC19H', 'XL', 'PULSA', '4GB+15GB 4G + 30menit all 30hr 24jam (Paket Data)'),
('XDC26H', 'XL', 'PULSA', '6GB+20GB 4G + 30menit all 30hr 24jam (Paket Data)'),
('XDC40H', 'XL', 'PULSA', '10GB+30GB 4G + 30menit all 30hr 24jam (Paket Data)'),
('XDC56H', 'XL', 'PULSA', '16GB+40GB 4G + 30menit all 30hr 24jam (Paket Data)'),
('XDC8H', 'XL', 'PULSA', '1GB+500MB 4G + 30menit all 30hr 24jam (Paket Data)'),
('XR100H', 'XL', 'PULSA', ' XL 100 K'),
('XR10H', 'XL', 'PULSA', ' XL 10 K'),
('XR15H', 'XL', 'PULSA', ' XL 15 K'),
('XR200H', 'XL', 'PULSA', ' XL 200 K'),
('XR25H', 'XL', 'PULSA', ' XL 25 K'),
('XR50H', 'XL', 'PULSA', ' XL 50 K'),
('XR5H', 'XL', 'PULSA', ' XL 5 K');

-- --------------------------------------------------------

--
-- Table structure for table `pulsa`
--

CREATE TABLE `pulsa` (
  `phone` varchar(12) NOT NULL,
  `transaction_id` varchar(9) NOT NULL,
  `uid` varchar(11) NOT NULL,
  `product_id` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pulsa`
--

INSERT INTO `pulsa` (`phone`, `transaction_id`, `uid`, `product_id`) VALUES
('083834129812', 'PL1810001', '2147484848', 'AXD1H'),
('081234129812', 'PL1810002', '2147484848', 'SD100H'),
('081234129812', 'PL1810003', '2147484848', 'S20H');

-- --------------------------------------------------------

--
-- Table structure for table `telkom`
--

CREATE TABLE `telkom` (
  `idpel1` varchar(12) NOT NULL,
  `idpel2` varchar(12) NOT NULL,
  `product_id` varchar(9) NOT NULL,
  `transaction_id` varchar(15) NOT NULL,
  `uid` varchar(11) NOT NULL,
  `pelanggan` varchar(60) NOT NULL,
  `nominal` varchar(15) NOT NULL,
  `struk` varchar(60) NOT NULL,
  `date_transaction` datetime NOT NULL,
  `ref2` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `telkom`
--

INSERT INTO `telkom` (`idpel1`, `idpel2`, `product_id`, `transaction_id`, `uid`, `pelanggan`, `nominal`, `struk`, `date_transaction`, `ref2`) VALUES
('064411111111', '0644', 'HPESIA', 'TEL1810001', '3614488494', '', '', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `topup`
--

CREATE TABLE `topup` (
  `transaction_id` varchar(30) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `nominal` varchar(15) NOT NULL,
  `kode` int(11) NOT NULL,
  `uid` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topup`
--

INSERT INTO `topup` (`transaction_id`, `no_rek`, `nominal`, `kode`, `uid`) VALUES
('UP1810004', '', '500000', 916, '2147484848'),
('UP1810005', '', '500000', 377, '2147484848'),
('UP1810006', '', '500000', 823, '2147484848'),
('UP1810007', '', '1000000', 494, '3614488494'),
('UP1810008', '', '1000000', 597, '3614488494');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `product_id` varchar(9) NOT NULL,
  `transaction_id` varchar(15) NOT NULL,
  `date_transaction` datetime NOT NULL,
  `debit` varchar(15) NOT NULL,
  `saldo` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL,
  `kredit` varchar(15) NOT NULL,
  `uid` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`product_id`, `transaction_id`, `date_transaction`, `debit`, `saldo`, `status`, `kredit`, `uid`) VALUES
('GAR1030H', 'GM1810005', '2018-10-17 04:08:11', '100000', '', 'Pendding', '', '2147484848'),
('K', 'KAI1810001', '2018-10-31 03:00:00', '120000', '', 'Pendding', '', '3614488494'),
('WAAETRA', 'PAM1810001', '2018-10-01 03:09:11', '200000', '', 'Succes', '', '3614488494'),
('AXD1H', 'PL1810001', '2018-10-17 02:09:00', '50000', '', 'Gagal', '', '2147484848'),
('PLNPRAY', 'PLN1810002', '2018-10-07 02:00:00', '100000', '', 'Succes', '', '2147484848'),
('Topup', 'UP1810005', '2018-10-24 01:33:30', '', '', 'Pendding', '500000', '2147484848'),
('Topup', 'UP1810006', '2018-10-24 04:24:44', '', '', 'Pendding', '500000', '2147484848'),
('Topup', 'UP1810007', '2018-10-24 13:50:29', '', '', 'Pendding', '1000000', '3614488494');

-- --------------------------------------------------------

--
-- Table structure for table `tv`
--

CREATE TABLE `tv` (
  `idpel1` varchar(12) NOT NULL,
  `idpel2` varchar(12) NOT NULL,
  `product_id` varchar(9) NOT NULL,
  `transaction_id` varchar(15) NOT NULL,
  `uid` varchar(11) NOT NULL,
  `pelanggan` varchar(60) NOT NULL,
  `nominal` varchar(15) NOT NULL,
  `struk` varchar(60) NOT NULL,
  `date_transaction` datetime NOT NULL,
  `ref2` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `username_or_email_on_hold`
--

CREATE TABLE `username_or_email_on_hold` (
  `ai` int(10) UNSIGNED NOT NULL,
  `username_or_email` varchar(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(12) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `auth_level` tinyint(3) UNSIGNED NOT NULL,
  `banned` enum('0','1') NOT NULL DEFAULT '0',
  `passwd` varchar(60) NOT NULL,
  `passwd_recovery_code` varchar(60) DEFAULT NULL,
  `passwd_recovery_date` datetime DEFAULT NULL,
  `passwd_modified_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `auth_level`, `banned`, `passwd`, `passwd_recovery_code`, `passwd_recovery_date`, `passwd_modified_at`, `last_login`, `created_at`, `modified_at`) VALUES
(730510257, 'bangsa', 'bangsa@gmail.com', 9, '0', '$2y$11$BYQHui/8kHtRyQav5keEfeZ9odSJpyLFLurQELlPgauuJTsWd9WOO', NULL, NULL, NULL, '2018-10-27 15:48:04', '2018-10-24 02:25:05', '2018-10-27 13:48:04'),
(1729583169, 'ivan', 'ivan@meta365.com', 6, '0', '$2y$11$X0NMge6rqfG4X1Ed2T/Nkuml3duriW8nlLWy6ja7DyIPuQmwoAtNS', NULL, NULL, NULL, '2018-10-16 20:42:51', '2018-10-16 20:42:39', '2018-10-16 20:42:51'),
(2147484848, 'kebangsaan', 'Kebangsaan@gmail.com', 1, '0', '$2y$11$dW56TEdtK/KJZqQm.dpZf.qQK6vUr4CXtlaakmSYijzcYt0nlGhvq', NULL, NULL, NULL, '2018-10-24 19:27:11', '2018-10-24 02:23:48', '2018-10-24 17:27:11'),
(3614488494, 'admin', 'admin@meta365.com', 6, '0', '$2y$11$OUHGkJK4rxU/XDjUb7YTEeRRWeYreFvADm28bvCjIdMAcArHEczG6', NULL, NULL, NULL, '2018-10-27 23:23:43', '2018-10-16 10:35:31', '2018-10-27 21:23:43');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `ca_passwd_trigger` BEFORE UPDATE ON `users` FOR EACH ROW BEGIN
    IF ((NEW.passwd <=> OLD.passwd) = 0) THEN
        SET NEW.passwd_modified_at = NOW();
    END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acl`
--
ALTER TABLE `acl`
  ADD PRIMARY KEY (`ai`),
  ADD KEY `action_id` (`action_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `acl_actions`
--
ALTER TABLE `acl_actions`
  ADD PRIMARY KEY (`action_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `acl_categories`
--
ALTER TABLE `acl_categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_code` (`category_code`),
  ADD UNIQUE KEY `category_desc` (`category_desc`);

--
-- Indexes for table `auth_sessions`
--
ALTER TABLE `auth_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bpjs`
--
ALTER TABLE `bpjs`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `denied_access`
--
ALTER TABLE `denied_access`
  ADD PRIMARY KEY (`ai`);

--
-- Indexes for table `emoney`
--
ALTER TABLE `emoney`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `ips_on_hold`
--
ALTER TABLE `ips_on_hold`
  ADD PRIMARY KEY (`ai`);

--
-- Indexes for table `kai`
--
ALTER TABLE `kai`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `login_errors`
--
ALTER TABLE `login_errors`
  ADD PRIMARY KEY (`ai`);

--
-- Indexes for table `multifinance`
--
ALTER TABLE `multifinance`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `nominal`
--
ALTER TABLE `nominal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdam`
--
ALTER TABLE `pdam`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesawat`
--
ALTER TABLE `pesawat`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `pln`
--
ALTER TABLE `pln`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `pricelist`
--
ALTER TABLE `pricelist`
  ADD PRIMARY KEY (`pricelist_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `pulsa`
--
ALTER TABLE `pulsa`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `telkom`
--
ALTER TABLE `telkom`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `tv`
--
ALTER TABLE `tv`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `username_or_email_on_hold`
--
ALTER TABLE `username_or_email_on_hold`
  ADD PRIMARY KEY (`ai`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acl`
--
ALTER TABLE `acl`
  MODIFY `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `acl_actions`
--
ALTER TABLE `acl_actions`
  MODIFY `action_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `acl_categories`
--
ALTER TABLE `acl_categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `denied_access`
--
ALTER TABLE `denied_access`
  MODIFY `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ips_on_hold`
--
ALTER TABLE `ips_on_hold`
  MODIFY `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `login_errors`
--
ALTER TABLE `login_errors`
  MODIFY `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `nominal`
--
ALTER TABLE `nominal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pricelist`
--
ALTER TABLE `pricelist`
  MODIFY `pricelist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `username_or_email_on_hold`
--
ALTER TABLE `username_or_email_on_hold`
  MODIFY `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `acl`
--
ALTER TABLE `acl`
  ADD CONSTRAINT `acl_ibfk_1` FOREIGN KEY (`action_id`) REFERENCES `acl_actions` (`action_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `acl_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `acl_actions`
--
ALTER TABLE `acl_actions`
  ADD CONSTRAINT `acl_actions_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `acl_categories` (`category_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
