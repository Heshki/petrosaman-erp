-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2019 at 07:57 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saman`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(215, 'ظطزظ'),
(217, 'کک 1080'),
(220, 'کک 1080'),
(226, 'کک 1080'),
(229, 'کک 1080'),
(231, 'یشسبسشی'),
(234, 'کک 1080'),
(235, 'کک 1080'),
(236, 'کک 1080'),
(237, 'کک 1080'),
(238, 'کک 1080'),
(239, 'کک 1080'),
(240, 'کک 1080'),
(241, 'کک 1080'),
(242, 'کک 1080'),
(243, 'کک 1080'),
(244, 'کک 1080'),
(245, 'کک 1080'),
(246, 'کک 1080'),
(247, 'کک 1080'),
(248, 'کک 1080'),
(249, 'کک 1080'),
(250, 'کک 1080'),
(251, 'کک 1080'),
(252, 'کک 1080'),
(253, 'کک 1080'),
(254, 'کک 1080'),
(255, 'کک 1080'),
(256, 'کک 1080'),
(257, 'کک 1080'),
(258, 'کک 1080'),
(259, 'کک 1080'),
(260, 'کک 1080'),
(261, 'کک 1080'),
(262, 'کک 1080'),
(263, 'کک 1080'),
(264, 'کک 1080'),
(265, 'کک 1080'),
(266, 'کک 1080'),
(267, 'کک 1080'),
(268, 'کک 1080'),
(269, 'کک 1080'),
(270, 'کک 1080'),
(271, 'کک 1080'),
(272, 'کک 1080'),
(273, 'کک 1080'),
(274, 'کک 1080'),
(275, 'کک 1080'),
(276, 'کک 1080'),
(277, 'کک 1080'),
(278, 'کک 1080'),
(279, 'کک 1080'),
(280, 'کک 1080'),
(281, 'کک 1080'),
(282, 'کک 1080'),
(283, 'کک 1080'),
(284, 'کک 1080'),
(285, 'کک 1080'),
(286, 'کک 1080'),
(287, 'کک 1080'),
(288, 'کک 1080'),
(289, 'کک 1080'),
(290, 'کک 1080'),
(291, 'کک 1080'),
(292, 'کک 1080'),
(293, 'کک 1080'),
(294, 'کک 1080'),
(295, 'کک 1080'),
(296, 'کک 1080'),
(297, 'کک 1080'),
(298, 'کک 1080'),
(299, 'کک 1080'),
(300, 'کک 1080'),
(301, 'کک 1080'),
(302, 'کک 1080'),
(303, 'کک 1080'),
(304, 'کک 1080'),
(305, 'کک 1080'),
(306, 'کک 1080'),
(307, 'کک 1080'),
(308, 'کک 1080'),
(309, 'کک 1080'),
(310, 'کک 1080'),
(311, 'کک 1080'),
(312, 'کک 1080'),
(313, 'کک 1080'),
(314, 'کک 1080'),
(315, 'کک 1080'),
(316, 'کک 1080'),
(317, 'کک 1080'),
(318, 'کک 1080'),
(319, 'کک 1080'),
(320, 'کک 1080'),
(321, 'کک 1080'),
(322, 'کک 1080'),
(323, 'کک 1080'),
(324, 'کک 1080'),
(325, 'کک 1080'),
(326, 'کک 1080'),
(327, 'کک 1080'),
(328, 'کک 1080'),
(329, 'کک 1080'),
(330, 'کک 1080'),
(331, 'کک 1080'),
(332, 'کک 1080'),
(333, 'کک 1080'),
(334, 'کک 1080'),
(335, 'کک 1080'),
(336, 'کک 1080'),
(337, 'کک 1080'),
(338, 'کک 1080'),
(339, 'کک 1080'),
(340, 'کک 1080'),
(341, 'کک 1080'),
(342, 'کک 1080'),
(343, 'کک 1080'),
(344, 'کک 1080'),
(345, 'کک 1080'),
(346, 'کک 1080'),
(347, 'کک 1080'),
(348, 'کک 1080'),
(349, 'کک 1080'),
(350, 'کک 1080'),
(351, 'کک 1080'),
(352, 'کک 1080'),
(353, 'کک 1080'),
(354, 'کک 1080'),
(355, 'کک 1080'),
(356, 'کک 1080'),
(357, 'کک 1080'),
(358, 'کک 1080'),
(359, 'کک 1080'),
(360, 'کک 1080'),
(361, 'کک 1080'),
(362, 'کک 1080'),
(363, 'کک 1080'),
(364, 'کک 1080'),
(365, 'کک 1080'),
(366, 'کک 1080'),
(367, 'کک 1080'),
(369, 'کک 1080'),
(370, 'طزظطزظطزظط');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(15) DEFAULT NULL,
  `c_family` varchar(25) DEFAULT NULL,
  `c_company` varchar(35) DEFAULT NULL,
  `c_national` varchar(10) DEFAULT NULL,
  `c_economic` varchar(12) DEFAULT NULL,
  `c_phone` varchar(11) DEFAULT NULL,
  `c_fax` varchar(11) DEFAULT NULL,
  `c_mobile` varchar(11) DEFAULT NULL,
  `c_oaddress` text,
  `c_faddress` text,
  `c_email` text,
  `c_vat` varchar(5) DEFAULT NULL,
  `c_dvat` varchar(2) DEFAULT NULL,
  `c_mvat` varchar(2) DEFAULT NULL,
  `c_yvat` varchar(4) DEFAULT NULL,
  `c_customertype` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `c_family`, `c_company`, `c_national`, `c_economic`, `c_phone`, `c_fax`, `c_mobile`, `c_oaddress`, `c_faddress`, `c_email`, `c_vat`, `c_dvat`, `c_mvat`, `c_yvat`, `c_customertype`) VALUES
(4, 'امیرعلی', 'شبانی', 'هشکی', 'ندارد', '214452533652', '3040338323', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'no', '', '', '', 'تامین کننده'),
(5, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '3040338323', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'no', '', '', '', 'تامین کننده'),
(6, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '', '', '', 'مشتری'),
(7, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '18', '12', '1402', 'مشتری'),
(8, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'no', '', '', '', 'تامین کننده'),
(11, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(12, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(13, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(14, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(15, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(16, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(17, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(18, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(19, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(20, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(21, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(22, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(23, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(24, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(25, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(26, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(27, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(28, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(29, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(30, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(31, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(32, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(33, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(34, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(35, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(36, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(37, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(38, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(39, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(40, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(41, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(42, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(43, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(44, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(45, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(46, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(47, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(48, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(49, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(50, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(52, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '26', '11', '1398', 'مشتری'),
(54, 'امام ', 'اسماعیلیا', 'گراتک', '3020525120', '54215525', '03434264167', '03434234145', '09134933739', 'رفسنجان خیابان طالقانی کوچه 62', 'معراج', 'amirali.heshki@gmail.com', 'yes', '18', '11', '1397', 'تامین کننده');

-- --------------------------------------------------------

--
-- Table structure for table `factor`
--

CREATE TABLE `factor` (
  `f_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `f_date` varchar(16) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factor`
--

INSERT INTO `factor` (`f_id`, `c_id`, `f_date`, `u_id`) VALUES
(1, 1, '1398/01/10 03:26', 1),
(2, 2, '1398/01/10 03:32', 1),
(3, 4, '1398/01/10 03:34', 1),
(4, 2, '1398/01/10 03:35', 1),
(5, 1, '1398/01/10 03:36', 1),
(6, 1, '1398/01/10 03:37', 1),
(7, 3, '1398/01/10 03:45', 1),
(8, 2, '1398/01/10 14:24', 1),
(9, 1, '1398/01/12 10:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `factor_body`
--

CREATE TABLE `factor_body` (
  `fb_id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `fb_quantity` float NOT NULL,
  `fb_price` double NOT NULL,
  `fb_verify_admin1` tinyint(1) NOT NULL,
  `fb_send_customer` tinyint(1) NOT NULL,
  `fb_verify_customer` tinyint(1) NOT NULL,
  `fb_verify_docs` tinyint(1) NOT NULL,
  `fb_verify_finan` tinyint(1) NOT NULL,
  `fb_verify_admin2` tinyint(1) NOT NULL,
  `fb_wait_bar` tinyint(1) NOT NULL,
  `fb_ready_bar` tinyint(1) NOT NULL,
  `fb_get_sample` tinyint(1) NOT NULL,
  `fb_verify_bar` tinyint(1) NOT NULL,
  `fb_exit_doc` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(35) DEFAULT NULL,
  `p_cat` varchar(20) DEFAULT NULL,
  `p_unit` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_cat`, `p_unit`) VALUES
(1, 'کک صنعتی', '11235', 'کیلوگرم'),
(4, 'کک صنعتی dfsdf', '11235', 'کیلوگرم');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `s_id` int(11) NOT NULL,
  `s_product` varchar(35) DEFAULT NULL,
  `s_amount` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`s_id`, `s_product`, `s_amount`) VALUES
(2, '13', '1500'),
(6, '10', '15450');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `factor`
--
ALTER TABLE `factor`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `factor_body`
--
ALTER TABLE `factor_body`
  ADD PRIMARY KEY (`fb_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=371;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `factor`
--
ALTER TABLE `factor`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `factor_body`
--
ALTER TABLE `factor_body`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
