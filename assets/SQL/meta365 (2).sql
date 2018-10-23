-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2018 at 11:15 AM
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
('BNI100', 'Bank', 'BNI', 'BNI 100 K'),
('BNI150', 'Bank', 'BNI', 'BNI 150 K'),
('BNI20', 'Bank', 'BNI', 'BNI 20 K'),
('BNI200', 'Bank', 'BNI', 'BNI 200 K'),
('BNI300', 'Bank', 'BNI', 'BNI 300 K'),
('BNI50', 'Bank', 'BNI', 'BNI 50 K'),
('BNI500', 'Bank', 'BNI', 'BNI 500 K'),
('M100', 'Bank', 'MANDIRI', 'Mandiri 100 '),
('M150', 'Bank', 'MANDIRI', 'Mandiri 150 '),
('M20', 'Bank', 'MANDIRI', 'Mandiri 20 K'),
('M200', 'Bank', 'MANDIRI', 'Mandiri 200 '),
('M300', 'Bank', 'MANDIRI', 'Mandiri 300 '),
('M50', 'Bank', 'MANDIRI', 'Mandiri 50 K'),
('M500', 'Bank', 'MANDIRI', 'Mandiri 500 ');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `phone` varchar(12) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `transaction_id` varchar(20) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`phone`, `product_id`, `transaction_id`, `uid`) VALUES
('081234129812', 'GDG10H', 'GM1810001', 9),
('081234129812', 'GAS100H', 'GM1810002', 9),
('081211111111', 'GAR1030H', 'GM1810003', 9),
('081234129812', 'GAS100H', 'GM1810004', 9),
('083834129812', 'GAR1030H', 'GM1810005', 2147483647);

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
  `uid` int(11) NOT NULL
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
(12, 'PLNPRAY', '1000 K', '1000000');

-- --------------------------------------------------------

--
-- Table structure for table `pdam`
--

CREATE TABLE `pdam` (
  `idpel1` varchar(12) NOT NULL,
  `idpel2` varchar(12) NOT NULL,
  `product_id` varchar(9) NOT NULL,
  `transaction_id` varchar(15) NOT NULL,
  `uid` int(11) NOT NULL,
  `pelanggan` varchar(60) NOT NULL,
  `nominal` varchar(15) NOT NULL,
  `struk` varchar(60) NOT NULL,
  `date_transaction` datetime NOT NULL,
  `ref2` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `uid` int(11) NOT NULL
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
  `uid` int(11) NOT NULL,
  `pelanggan` varchar(60) NOT NULL,
  `struk` varchar(40) NOT NULL,
  `date_transaction` datetime NOT NULL,
  `ref2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('SRG', 'JAWA', 'BANDARA', 'Bandar Udara Internasional Achmad Yani,Semarang'),
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
('TIM', 'PAPUA DAN MALUKU', 'BANDARA', 'Bandar Udara Internasional Mozes Kilangin,Mimika'),
('TKG', 'SUMATERA', 'BANDARA', 'Bandar Udara Internasional Radin Inten II,Bandar Lampung'),
('TNJ', 'SUMATERA', 'BANDARA', 'Bandar Udara Internasional Raja Haji Fisabilillah,Tanjungpin'),
('TRK', 'KALIMANTAN', 'BANDARA', 'Bandar Udara Internasional Juwata,Tarakan'),
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
  `uid` int(11) NOT NULL,
  `product_id` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pulsa`
--

INSERT INTO `pulsa` (`phone`, `transaction_id`, `uid`, `product_id`) VALUES
('083834129812', 'PL1810001', 2147483647, 'AXD1H');

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
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Indexes for table `emoney`
--
ALTER TABLE `emoney`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `kai`
--
ALTER TABLE `kai`
  ADD PRIMARY KEY (`transaction_id`);

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
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

-- AUTO_INCREMENT for table `nominal`
--
ALTER TABLE `nominal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pricelist`
--
ALTER TABLE `pricelist`
  MODIFY `pricelist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
