-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2019 at 05:13 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

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
-- Table structure for table `bar_bring`
--

CREATE TABLE `bar_bring` (
  `bar_id` int(11) NOT NULL COMMENT 'کد بار رسیده',
  `fk_id` int(11) NOT NULL COMMENT 'کد فاکتور خرید',
  `dr_id` int(11) NOT NULL COMMENT 'کد راننده',
  `bar_quantity` int(11) NOT NULL COMMENT 'وزن بار رسیده',
  `bar_date` int(11) NOT NULL COMMENT 'تاریخ بار',
  `bar_time` int(11) NOT NULL COMMENT 'زمان بار',
  `br_scan_waybill` int(11) NOT NULL COMMENT 'اسکن بارنامه',
  `bar_send_fiscal` int(11) DEFAULT NULL COMMENT 'ارسال به واحد مالی',
  `bar_verify_admin1` int(11) NOT NULL COMMENT 'تایید مدیریت',
  `bar_verify_admin_k` int(11) NOT NULL COMMENT 'تایید مدیریت کیفی',
  `bar_date_verify` int(11) NOT NULL COMMENT 'تاریخ تایید'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(351, 'دانه بندی 01 تا 100'),
(352, 'دانه بندی 100 تا 120'),
(353, 'دانه بندی 120 تا 140');

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
  `c_oaddress` text DEFAULT NULL,
  `c_faddress` text DEFAULT NULL,
  `c_email` text DEFAULT NULL,
  `c_vat` varchar(5) DEFAULT NULL,
  `c_expire_vat` varchar(10) DEFAULT NULL,
  `c_customertype` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `c_family`, `c_company`, `c_national`, `c_economic`, `c_phone`, `c_fax`, `c_mobile`, `c_oaddress`, `c_faddress`, `c_email`, `c_vat`, `c_expire_vat`, `c_customertype`) VALUES
(52, 'امیرعلی', 'شبانی', 'هشکی', '3040338323', '214452533652', '03434234145', '03434234145', '09136522305', 'رفسنجان خیابان طالقانی کوچه 62', 'داوران شهرک صنعتی', 'amirali.heshki@gmail.com', 'yes', '1398/2/31', 'مشتری'),
(54, 'محمد', 'اسماعیلی', 'گراتک', '3020525120', '54215525', '03434264167', '03434234145', '09134933739', 'رفسنجان خیابان طالقانی کوچه 62', 'معراج', 'amirali.heshki@gmail.com', 'yes', '1397/5/10', 'تامین کننده'),
(55, 'سید مرتضی', 'مهدوی', 'گراتک', '3040307193', '7714656848', '03434254167', '03434256363', '09138630341', 'کرمان', 'ی', 'asdas@yahoo.com', 'yes', '1398/7/21', 'مشتری'),
(57, 'ندارد', 'ندارد', 'ندارد', 'ندارد', 'ندارد', 'ندارد', 'ندارد', 'ندارد', 'ندارد', 'ندارد', 'ندارد', 'yes', '1398/2/10', 'ندارد'),
(58, 'مرتضی', 'مهدوی', 'گراتک', '3040307193', '', '09138630341', '', '09138630341', 'ی', 'ص', 'asda@yahoo.com', 'yes', '1398/6/20', 'مشتری'),
(59, 'حبیب', 'پیله وری', 'پتروسامان آذر', '3040307193', '3052', '034353636', '', '09123729651', 'س', 'ی', 'dasd@yahoo.com', 'yes', '1398/10/20', 'مشتری');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `dr_id` int(11) NOT NULL COMMENT 'کد راننده',
  `dr_name` varchar(50) DEFAULT NULL COMMENT 'نام',
  `dr_family` varchar(50) DEFAULT NULL COMMENT 'نام خانوادگی',
  `dr_national` int(10) DEFAULT NULL COMMENT 'کد ملی',
  `dr_car` varchar(50) DEFAULT NULL COMMENT 'نوع ماشین',
  `dr_plaque` varchar(50) DEFAULT NULL COMMENT 'پلاک',
  `dr_mobile` int(11) DEFAULT NULL COMMENT 'شماره همراه',
  `dr_status` int(11) DEFAULT NULL COMMENT 'وضعیت'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`dr_id`, `dr_name`, `dr_family`, `dr_national`, `dr_car`, `dr_plaque`, `dr_mobile`, `dr_status`) VALUES
(1, 'راننده', 'شماره 1', 30501882, 'کامیون', '10ب 5 ایرلن', 913145268, 1),
(2, 'سید مرتضی', 'مهدوی', 3025665, 'کامیون', '65623نمتن', 32365998, 1),
(3, 'محمد', 'اسماعیلی', 2147483647, 'تریلر', '11 ب 321 ایران 65', 2147483647, 1);

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
(59, 52, '1398/4/4', 1),
(60, 52, '1398/4/4', 1),
(61, 52, '1398/4/4', 1),
(62, 52, '1398/4/4', 1),
(63, 52, '1398/4/4', 1),
(64, 52, '1398/4/4', 1),
(65, 52, '1398/4/5', 1),
(66, 52, '1398/4/5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `factor_body`
--

CREATE TABLE `factor_body` (
  `fb_id` int(11) NOT NULL COMMENT 'کد ردیف',
  `f_id` int(11) NOT NULL COMMENT 'کد فاکتور',
  `p_id` int(11) NOT NULL COMMENT 'کد محصول',
  `cat_id` int(11) NOT NULL COMMENT 'کد دسته بندی',
  `fb_quantity` float NOT NULL COMMENT 'مقدار',
  `fb_price` double NOT NULL COMMENT 'مبلغ',
  `fb_pre_invoice_scan` int(11) DEFAULT 0,
  `fb_verify_admin1` tinyint(1) DEFAULT 0 COMMENT 'تایید 1 مدیر',
  `fb_send_customer` tinyint(1) DEFAULT 0 COMMENT 'ارسال مشتری',
  `fb_verify_customer` tinyint(1) DEFAULT 0 COMMENT 'تایید مشتری',
  `fb_verify_docs` tinyint(1) DEFAULT 0 COMMENT 'اسناد تایید',
  `fb_verify_finan` tinyint(1) DEFAULT 0 COMMENT 'تایید مالی',
  `fb_verify_admin2` tinyint(1) DEFAULT 0 COMMENT 'تایید 2 مدیر',
  `fb_wait_bar` tinyint(1) DEFAULT 0 COMMENT 'منتظر بارگیری',
  `fb_ready_bar` tinyint(1) DEFAULT 0 COMMENT 'آماده تحویل',
  `fb_get_sample` tinyint(1) DEFAULT 0 COMMENT 'نمونه برداری',
  `fb_verify_bar` tinyint(1) DEFAULT 0 COMMENT 'تایید بارگیری',
  `fb_exit_doc` tinyint(1) DEFAULT 0 COMMENT 'حواله خروج',
  `fb_exit_bar` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'تایید خروج بار',
  `fb_result_analyze` text DEFAULT NULL,
  `dr_id` int(11) DEFAULT NULL COMMENT 'کد راننده'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factor_body`
--

INSERT INTO `factor_body` (`fb_id`, `f_id`, `p_id`, `cat_id`, `fb_quantity`, `fb_price`, `fb_pre_invoice_scan`, `fb_verify_admin1`, `fb_send_customer`, `fb_verify_customer`, `fb_verify_docs`, `fb_verify_finan`, `fb_verify_admin2`, `fb_wait_bar`, `fb_ready_bar`, `fb_get_sample`, `fb_verify_bar`, `fb_exit_doc`, `fb_exit_bar`, `fb_result_analyze`, `dr_id`) VALUES
(33, 60, 1, 351, 1200, 2000, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, 0, 0, NULL, 0),
(34, 61, 1, 352, 2000, 1400, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 0, NULL, 3),
(35, 64, 1, 352, 8, 2000, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
(36, 65, 1, 352, 1200, 2500, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 0, NULL, 3),
(37, 66, 1, 352, 1200, 1400, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `factor_buy`
--

CREATE TABLE `factor_buy` (
  `bu_id` int(11) NOT NULL COMMENT 'کد خرید',
  `f_id` int(11) NOT NULL COMMENT 'کد سرفاکتور',
  `p_id` int(11) NOT NULL COMMENT 'کد محصول',
  `bu_scan_invoice` varchar(100) DEFAULT NULL COMMENT 'اسکن پیش فاکتور',
  `bu_quantity` float DEFAULT NULL COMMENT 'وزن',
  `bu_verify_admin1` int(11) DEFAULT NULL COMMENT 'تایید مدیریت',
  `bu_send_fiscal` int(11) DEFAULT NULL COMMENT 'ارسال به واحد مالی',
  `bu_send_customer` int(11) DEFAULT NULL COMMENT 'ارسال رسید به مشتری',
  `bu_quantity_r` float DEFAULT NULL,
  `bu_out` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factor_buy`
--

INSERT INTO `factor_buy` (`bu_id`, `f_id`, `p_id`, `bu_scan_invoice`, `bu_quantity`, `bu_verify_admin1`, `bu_send_fiscal`, `bu_send_customer`, `bu_quantity_r`, `bu_out`) VALUES
(1, 1, 1, '1', 23, 1, 1, 1, 0, NULL),
(2, 35, 1, '1', 100, 0, 0, 0, 0, NULL),
(3, 35, 1, '1', 200, 0, 0, 0, 0, NULL),
(4, 36, 1, '1', 200, 0, 0, 0, 0, NULL),
(5, 37, 1, '1', 200, 0, 0, 0, 0, NULL),
(6, 37, 5, '1', 100, 0, 0, 0, 0, NULL),
(7, 38, 1, '1', 100, 1, 0, 0, 0, NULL),
(8, 40, 5, '1', 200, 1, 0, 1, 0, NULL),
(9, 41, 1, '1', 300, 1, 1, 1, 0, NULL),
(10, 43, 1, '0', 200, 1, 0, 0, 0, NULL),
(11, 45, 5, '0', 10000, 0, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `factor_log`
--

CREATE TABLE `factor_log` (
  `l_id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `l_date` varchar(16) CHARACTER SET utf8 DEFAULT NULL,
  `fb_id` int(11) DEFAULT NULL,
  `l_details` text CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `factor_log`
--

INSERT INTO `factor_log` (`l_id`, `u_id`, `l_date`, `fb_id`, `l_details`) VALUES
(1, 1, '1398/02/10 15:39', 19, 'hhh'),
(2, 1, '1398/02/10 15:43', 19, 'مشکلی ندارد'),
(3, 1, '1398/02/14 13:15', 24, 'تایید'),
(4, 1, '1398/02/14 13:17', 24, 'h'),
(5, 1, '1398/02/14 13:19', 24, 'ر'),
(6, 1, '1398/02/14 13:21', 24, '0'),
(7, 1, '1398/02/14 13:21', 24, '3'),
(8, 1, '1398/02/14 13:22', 24, 'اا'),
(9, 1, '1398/02/14 13:24', 24, 'بیب'),
(10, 1, '1398/02/14 13:24', 24, 'ببب'),
(11, 1, '1398/02/14 13:25', 24, 'ب'),
(12, 1, '1398/02/14 13:25', 24, 'ل'),
(13, 1, '1398/02/14 13:25', 24, 'ف'),
(14, 3, '1398/03/26 11:46', 28, 'dfdf'),
(15, 1, '1398/04/03 11:45', 16, ''),
(16, 1, '1398/04/04 11:55', 30, 'no problem'),
(17, 1, '1398/04/04 11:55', 30, 'no'),
(18, 1, '1398/04/04 11:56', 30, 'ok'),
(19, 1, '1398/04/04 12:02', 30, 'ok'),
(20, 1, '1398/04/04 12:03', 30, 'ok'),
(21, 1, '1398/04/04 12:11', 30, 'ok'),
(22, 1, '1398/04/04 16:10', 32, 'ok'),
(23, 1, '1398/04/04 16:10', 32, 'ok'),
(24, 1, '1398/04/04 16:10', 32, ''),
(25, 1, '1398/04/04 16:10', 32, ''),
(26, 1, '1398/04/04 16:10', 32, ''),
(27, 1, '1398/04/04 16:28', 32, ''),
(28, 1, '1398/04/04 16:48', 32, ''),
(29, 1, '1398/04/04 18:07', 33, ''),
(30, 1, '1398/04/04 18:07', 33, ''),
(31, 1, '1398/04/04 18:07', 33, ''),
(32, 1, '1398/04/04 18:08', 33, ''),
(33, 1, '1398/04/04 18:09', 33, ''),
(34, 1, '1398/04/04 18:10', 33, ''),
(35, 1, '1398/04/04 18:11', 33, ''),
(36, 1, '1398/04/04 18:11', 33, ''),
(37, 1, '1398/04/04 18:13', 33, ''),
(38, 1, '1398/04/04 18:14', 33, ''),
(39, 1, '1398/04/04 19:06', 33, ''),
(40, 1, '1398/04/04 19:06', 33, ''),
(41, 1, '1398/04/04 19:06', 33, ''),
(42, 1, '1398/04/04 19:06', 33, ''),
(43, 1, '1398/04/04 19:25', 34, ''),
(44, 1, '1398/04/04 19:25', 34, ''),
(45, 1, '1398/04/04 19:25', 34, ''),
(46, 1, '1398/04/04 19:26', 34, ''),
(47, 1, '1398/04/04 19:26', 34, ''),
(48, 1, '1398/04/04 19:26', 34, ''),
(49, 1, '1398/04/04 19:26', 34, ''),
(50, 1, '1398/04/04 19:31', 34, ''),
(51, 1, '1398/04/04 19:31', 34, ''),
(52, 1, '1398/04/04 19:31', 34, ''),
(53, 1, '1398/04/04 19:31', 34, ''),
(54, 1, '1398/04/04 19:31', 34, ''),
(55, 1, '1398/04/04 19:31', 33, ''),
(56, 1, '1398/04/04 20:23', 35, ''),
(57, 1, '1398/04/04 20:23', 35, ''),
(58, 1, '1398/04/04 20:23', 35, ''),
(59, 1, '1398/04/04 20:23', 35, ''),
(60, 1, '1398/04/05 08:58', 36, ''),
(61, 1, '1398/04/05 09:00', 36, ''),
(62, 1, '1398/04/05 09:00', 36, ''),
(63, 1, '1398/04/05 09:01', 36, ''),
(64, 1, '1398/04/05 09:01', 36, ''),
(65, 1, '1398/04/05 09:05', 36, ''),
(66, 1, '1398/04/05 09:05', 36, ''),
(67, 1, '1398/04/05 09:05', 36, ''),
(68, 1, '1398/04/05 09:07', 36, ''),
(69, 1, '1398/04/05 09:07', 36, ''),
(70, 1, '1398/04/05 09:07', 36, ''),
(71, 1, '1398/04/05 09:07', 36, ''),
(72, 1, '1398/04/05 17:22', 35, ''),
(73, 1, '1398/04/05 17:35', 33, 'dsadsa');

-- --------------------------------------------------------

--
-- Table structure for table `group_info`
--

CREATE TABLE `group_info` (
  `g_id` int(11) NOT NULL COMMENT 'کد جدول',
  `g_name` varchar(20) DEFAULT NULL COMMENT 'نام گروه',
  `g_sup_1` varchar(50) DEFAULT NULL COMMENT 'سرپرست ۱',
  `g_sup_2` varchar(50) DEFAULT NULL COMMENT 'سرپرست‌ ۲',
  `g_sup_3` varchar(50) DEFAULT NULL COMMENT 'سرپرست ۳',
  `g_sup_4` varchar(50) DEFAULT NULL COMMENT 'سرپرست ۴',
  `g_sup_5` varchar(50) DEFAULT NULL COMMENT 'سرپرست ۵',
  `g_driver_1` varchar(50) DEFAULT NULL COMMENT 'راننده ۱',
  `g_driver_2` varchar(50) DEFAULT NULL COMMENT 'راننده ۲'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='اطلاعات گروه ها';

--
-- Dumping data for table `group_info`
--

INSERT INTO `group_info` (`g_id`, `g_name`, `g_sup_1`, `g_sup_2`, `g_sup_3`, `g_sup_4`, `g_sup_5`, `g_driver_1`, `g_driver_2`) VALUES
(4, 'A', 'محسن خلجی', 'احمرضا رشیدی', NULL, NULL, NULL, NULL, NULL),
(6, 'C', 'امیرعلی ۲', 'محمد ۲', 'کاوه ۲', 'مرتضی ۲', 'علی ۲', 'ارسلان ۲', 'احمد ۲');

-- --------------------------------------------------------

--
-- Table structure for table `mamad`
--

CREATE TABLE `mamad` (
  `mm_id` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(50) NOT NULL,
  `m_type` varchar(50) DEFAULT NULL,
  `m_name_file` varchar(50) NOT NULL,
  `bu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`m_id`, `m_name`, `m_type`, `m_name_file`, `bu_id`) VALUES
(18, '473347131_91163.jpg', 'buy', '1', 1),
(19, '473347131_91163.jpg', 'buy', 'invoice', 2),
(20, '623785993_70037.jpg', 'buy', 'invoice', 1),
(21, '623785993_70037.jpg', 'buy', 'invoice', 1),
(22, '', 'buy', 'invoice', 1),
(23, '', 'buy', 'receipt', 1),
(24, '', 'buy', 'receipt', 1),
(25, 'IMG_20181231_093157_651.jpg', 'buy', 'receipt', 1),
(26, '1560176488.jpg', 'buy', 'invoice', 9),
(27, '1560176583.jpg', 'buy', 'receipt', 9),
(28, '1560624798.jpg', 'buy', '', 1),
(29, '1560624901.jpg', 'buy', '', 1),
(30, '1560624905.jpg', 'buy', '', 1),
(31, '1560625019.jpg', 'buy', '', 1),
(32, '1560667687.jpg', 'buy', 'invoice', 8),
(33, '1560667775.jpg', 'buy', 'receipt', 8),
(34, '1560672875.jpg', 'buy', 'waybill', 1),
(42, '1561462786.jpg', 'sale', '', 32),
(43, '1561468259.jpg', 'pre_invoice', 'no_singed', 33),
(44, '1561468441.jpg', 'pre_invoice', 'no_singed', 33),
(45, '1561468770.jpg', 'pre_invoice', 'no_singed', 33),
(46, '1561468821.jpg', 'pre_invoice', 'no_singed', 33),
(47, '1561468821.jpg', 'pre_invoice', 'no_singed', 33),
(48, '1561468911.jpg', 'pre_invoice', 'no_singed', 33),
(49, '1561468982.jpg', 'pre_invoice', 'no_singed', 33),
(50, '1561469103.jpg', 'pre_invoice', 'no_singed', 33),
(51, '1561469142.jpg', 'pre_invoice', 'no_singed', 33),
(52, '1561469142.jpg', 'pre_invoice', 'no_singed', 33),
(53, '1561469636.jpg', 'pre_invoice', 'no_signed', 33),
(54, '1561469636.jpg', 'pre_invoice', 'no_signed', 33),
(55, '1561469847.jpg', 'pre_invoice_sale', 'no_signed', 33),
(56, '1561473353.jpg', 'pre_invoice_sale', 'signed', 33),
(57, '1561474532.png', 'pre_invoice_sale', 'no_signed', 34),
(58, '1561474585.jpg', 'pre_invoice_sale', 'signed', 34),
(59, '1561477658.png', 'pre_invoice_sale', 'no_signed', 35),
(60, '1561523312.jpg', 'pre_invoice_sale', 'no_signed', 36),
(61, '1561523553.jpg', 'pre_invoice_sale', 'signed', 36),
(62, 'melicart1562048888.jpg', 'user', 'melicart', 15),
(63, 'identify1562048888.jpg', 'user', 'identify', 15),
(64, 'melicart1562599936.jpg', 'user', 'melicart', 1),
(65, 'u_contract1562599936.jpg', 'user', 'u_contract', 1),
(66, 'identify1562767209.jpg', 'user', 'identify', 1),
(67, 'u_insurance1562767209.jpg', 'user', 'u_insurance', 1),
(68, 'u_guarantee1562768009.jpg', 'user', 'u_guarantee', 1),
(69, 'u_recognizance1562768009.jpg', 'user', 'u_recognizance', 1);

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `pa-id` int(11) NOT NULL,
  `pa_name` varchar(50) NOT NULL,
  `pa_family` varchar(50) NOT NULL,
  `pa_company` varchar(50) NOT NULL,
  `pa_company_adress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`pa-id`, `pa_name`, `pa_family`, `pa_company`, `pa_company_adress`) VALUES
(1, 'مرتضی', 'مهدوی', 'گراتک', 'امیر کبیر');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `pa-id` int(11) NOT NULL,
  `pa_name` varchar(50) NOT NULL,
  `pa_family` varchar(50) NOT NULL,
  `pa_company` varchar(50) NOT NULL,
  `pa_company_adress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`pa-id`, `pa_name`, `pa_family`, `pa_company`, `pa_company_adress`) VALUES
(1, 'مرتضی', 'مهدوی', 'گراتک', 'امیر کبیر');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `prl_id` int(11) NOT NULL COMMENT 'کد جدول',
  `prl_uid` int(11) NOT NULL COMMENT 'کد کاربر',
  `prl_month` varchar(10) NOT NULL COMMENT 'ماه',
  `prl_monthly_right` int(11) DEFAULT 0 COMMENT 'پایه حقوق',
  `prl_bon` int(11) DEFAULT 0 COMMENT 'بن و خوار و بار',
  `prl_home_right` int(11) DEFAULT 0 COMMENT 'حق مسکن',
  `prl_child_right` int(11) DEFAULT 0 COMMENT 'عائله مندی',
  `prl_overtime_hours` int(11) NOT NULL COMMENT 'ساعت اضافه کار',
  `prl_overtime_right` int(11) DEFAULT 0 COMMENT 'اضافه کاری',
  `prl_penalty` int(11) DEFAULT 0 COMMENT 'کارانه/جریمه	',
  `prl_shift_right` int(11) DEFAULT 0 COMMENT 'حق شیفت',
  `prl_night_work_right` int(11) DEFAULT 0 COMMENT 'شب کاری',
  `prl_traffic` int(11) DEFAULT 0 COMMENT 'ایاب و ذهاب',
  `prl_total_income` int(11) DEFAULT 0 COMMENT 'جمع دریافتی',
  `prl_insure` int(11) DEFAULT 0 COMMENT 'بیمه تامین اجتماعی',
  `prl_tax` int(11) DEFAULT 0 COMMENT 'مالیات',
  `prl_help` int(11) DEFAULT 0 COMMENT 'مساعده',
  `prl_debt` int(11) DEFAULT 0 COMMENT 'قسط وام',
  `prl_deficit` int(11) DEFAULT 0 COMMENT 'کسر از حقوق',
  `prl_saving` int(11) DEFAULT 0 COMMENT 'پس انداز',
  `prl_other` int(11) DEFAULT 0 COMMENT 'سایر',
  `prl_modifier` int(11) DEFAULT 0 COMMENT 'اصلاح حساب',
  `prl_total_expends` int(11) DEFAULT 0 COMMENT 'جمع کسورات',
  `prl_total` int(11) NOT NULL DEFAULT 0 COMMENT 'مبلغ خالص پرداختی',
  `prl_date` varchar(12) NOT NULL COMMENT 'تاریخ صدور'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='فیش حقوق';

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`prl_id`, `prl_uid`, `prl_month`, `prl_monthly_right`, `prl_bon`, `prl_home_right`, `prl_child_right`, `prl_overtime_hours`, `prl_overtime_right`, `prl_penalty`, `prl_shift_right`, `prl_night_work_right`, `prl_traffic`, `prl_total_income`, `prl_insure`, `prl_tax`, `prl_help`, `prl_debt`, `prl_deficit`, `prl_saving`, `prl_other`, `prl_modifier`, `prl_total_expends`, `prl_total`, `prl_date`) VALUES
(9, 2, '1398_4', 0, 126667, 66667, 0, 140, 0, 56000, 0, 0, 66000, 315334, 13533, 0, 2000, 35000, 0, 0, 0, -66220, -15687, 331021, '1398/4/19'),
(10, 1, '1398_4', 1000000, 63334, 33334, 3033762, 140, 13369714, 350000, 225000, 1289222, 60000, 19424365, 76767, 0, 59000, 366500, 0, 0, 0, -15000, 487267, 18937098, '1398/4/19');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(35) DEFAULT NULL,
  `p_unit` varchar(15) DEFAULT NULL,
  `p_type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_unit`, `p_type`) VALUES
(1, 'کک صنعتی', 'کیلوگرم', ''),
(4, 'کک صنعتی dfsdf', 'کیلوگرم', ''),
(5, 'گرافیت', '100', ''),
(6, 'کک نفتی', '10', 'Material');

-- --------------------------------------------------------

--
-- Table structure for table `raw_rights`
--

CREATE TABLE `raw_rights` (
  `rr_id` int(11) NOT NULL COMMENT 'کد جدول',
  `rr_uid` int(11) NOT NULL COMMENT 'کد کاربر',
  `rr_month` varchar(10) NOT NULL COMMENT 'ماه',
  `rr_work_days` int(11) NOT NULL DEFAULT 0 COMMENT 'روزهای کارکرد',
  `rr_overtime_hours` int(11) NOT NULL DEFAULT 0 COMMENT 'ساعت اضافه کاری',
  `rr_child_right_ratio` double NOT NULL DEFAULT 1 COMMENT 'ضریب حق اولاد',
  `rr_shift` int(11) NOT NULL DEFAULT 0 COMMENT 'شیفت',
  `rr_night_work_hours` int(11) NOT NULL DEFAULT 0 COMMENT 'ساعت شب',
  `rr_modifier` int(11) DEFAULT 0 COMMENT 'اصلاح حساب',
  `rr_penalty` int(11) DEFAULT 0 COMMENT 'جریمه / کارانه',
  `rr_traffic` int(11) DEFAULT 0 COMMENT 'ایاب ذهاب',
  `rr_help` int(11) DEFAULT 0 COMMENT 'مساعده',
  `rr_debt` int(11) DEFAULT 0 COMMENT 'قسط وام'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='محاسبه حقوق';

--
-- Dumping data for table `raw_rights`
--

INSERT INTO `raw_rights` (`rr_id`, `rr_uid`, `rr_month`, `rr_work_days`, `rr_overtime_hours`, `rr_child_right_ratio`, `rr_shift`, `rr_night_work_hours`, `rr_modifier`, `rr_penalty`, `rr_traffic`, `rr_help`, `rr_debt`) VALUES
(4, 1, '1398_4', 2, 140, 0.4, 1, 54, -15000, 350000, 60000, 59000, 366500),
(5, 2, '1398_4', 3, 140, 0.4, 1, 54, -66220, 56000, 66000, 2000, 35000),
(6, 1, '1398_4', 3, 140, 0.4, 1, 54, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `sc_id` int(11) NOT NULL COMMENT 'کد جدول',
  `sc_month` varchar(15) NOT NULL COMMENT 'ماه',
  `sc_group` varchar(2) NOT NULL COMMENT 'گروه',
  `sc_schedule` text NOT NULL COMMENT 'برنامه'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='شیفت کاری';

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`sc_id`, `sc_month`, `sc_group`, `sc_schedule`) VALUES
(3, '4', 'A', 'night.night.night.night.night.day.day.day.day.night.night.night.night.rest.rest.rest.rest.rest.rest.rest.rest.night.night.night.night.night.night.day.day.day.day');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `s_id` int(11) NOT NULL COMMENT 'کد ردیف',
  `p_id` int(11) DEFAULT NULL COMMENT 'کد محصول',
  `cat_id` int(11) NOT NULL COMMENT 'کد دسته بندی',
  `s_amount` int(11) DEFAULT NULL COMMENT 'مقدار',
  `s_eprice` double NOT NULL COMMENT 'قیمت تمام شده',
  `s_sprice` double NOT NULL COMMENT 'قیمت فروش'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`s_id`, `p_id`, `cat_id`, `s_amount`, `s_eprice`, `s_sprice`) VALUES
(2, 1, 352, 3500, 12500000, 1400000),
(7, 5, 353, 360000, 2500, 2650);

-- --------------------------------------------------------

--
-- Table structure for table `stock_log`
--

CREATE TABLE `stock_log` (
  `p_id` int(6) UNSIGNED NOT NULL,
  `sl_amount` double DEFAULT NULL,
  `sl_type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `s_id` int(11) NOT NULL,
  `s_type` int(11) NOT NULL,
  `s_weight` int(11) NOT NULL,
  `s_date` varchar(10) NOT NULL,
  `s_time` varchar(10) NOT NULL,
  `dr_id` int(11) NOT NULL,
  `s_scan_b` int(11) DEFAULT NULL,
  `s_verify_fiscal` int(1) DEFAULT NULL,
  `s_verify_admin` int(1) DEFAULT NULL,
  `s_verify_admin_Quality` int(1) DEFAULT NULL,
  `s_scan_gh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`s_id`, `s_type`, `s_weight`, `s_date`, `s_time`, `dr_id`, `s_scan_b`, `s_verify_fiscal`, `s_verify_admin`, `s_verify_admin_Quality`, `s_scan_gh`) VALUES
(1, 1, 200, '20/2/98', '8:30', 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transfer_list`
--

CREATE TABLE `transfer_list` (
  `tl_id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `fb_id` int(11) DEFAULT NULL,
  `dr_name` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `dr_family` varchar(25) CHARACTER SET utf8 NOT NULL,
  `dr_national` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `dr_mobile` varchar(11) CHARACTER SET utf8 DEFAULT NULL,
  `dr_car` varchar(25) CHARACTER SET utf8 NOT NULL,
  `dr_plaque` varchar(9) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer_list`
--

INSERT INTO `transfer_list` (`tl_id`, `u_id`, `fb_id`, `dr_name`, `dr_family`, `dr_national`, `dr_mobile`, `dr_car`, `dr_plaque`) VALUES
(1, 1, 1, 'امام راننده ها', '', '3255352633', '09136522541', '', '96ی296-65'),
(2, 1, 14, 'یشس', '', 'یشسیش', 'یشس', '', 'یشیسش'),
(3, 1, 14, 'امام راننده ها', '', '3255352633', '09136522541', '', '96ی296-65'),
(4, 1, 14, 'علی رضایی', '', '3052305417', '09138630341', '', 'الف ی 256'),
(5, 1, 14, 'علی رضایی', '', '3052305417', '09138630341', '', 'الف ی 256'),
(6, 1, 14, 'علی رضایی', '', '3052305417', '09138630341', '', 'الف ی 256'),
(7, 1, 14, 'علی رضایی', '', '3052305417', '09138630341', '', 'الف ی 256'),
(8, 1, 14, 'علی رضایی', '', '3052305417', '09138630341', '', 'الف ی 256'),
(9, 1, 14, 'علی رضایی', '', '3052305417', '09138630341', '', 'الف ی 256'),
(10, 1, 14, 'علی رضایی', '', '3052305417', '09138630341', '', 'الف ی 256'),
(11, 1, 14, 'علی رضایی', '', '3052305417', '09138630341', '', 'الف ی 256'),
(12, 1, 14, 'علی رضایی', '', '3052305417', '09138630341', '', 'الف ی 256'),
(13, 1, 14, 'علی رضایی', '', '3052305417', '09138630341', '', 'الف ی 256'),
(14, 1, 14, 'علی رضایی', '', '3052305417', '09138630341', '', 'الف ی 256'),
(15, 1, 14, 'سید علی مجیدی', '', '3052305417', '09138885252', '', 'الف ایران'),
(16, 1, 20, 'مجید', 'مجیدی', '3052305417', '09138630341', 'بنز', 'الف ی 256');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(35) CHARACTER SET utf8 DEFAULT NULL,
  `u_family` varchar(35) CHARACTER SET utf8 DEFAULT NULL,
  `u_level` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `u_username` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `u_password` varchar(35) CHARACTER SET utf8 DEFAULT NULL,
  `u_father` varchar(40) CHARACTER SET utf8 DEFAULT NULL COMMENT 'نام پدر',
  `u_meli` varchar(15) CHARACTER SET utf8 DEFAULT NULL COMMENT 'کد ملی',
  `u_birth` varchar(15) CHARACTER SET utf8 DEFAULT NULL COMMENT 'تاریخ تولد',
  `u_live_city` varchar(40) CHARACTER SET utf8 DEFAULT NULL COMMENT 'شهر محل سکونت',
  `u_destination` varchar(10) CHARACTER SET utf8 DEFAULT NULL COMMENT 'مسافت تا کارخانه',
  `u_mobile` varchar(15) CHARACTER SET utf8 DEFAULT NULL COMMENT 'موبایل',
  `u_tell` varchar(15) CHARACTER SET utf8 DEFAULT NULL COMMENT 'تلفن ثابت',
  `u_address` text CHARACTER SET utf8 DEFAULT NULL COMMENT 'آدرس محل سکونت',
  `u_pre` text CHARACTER SET utf8 DEFAULT NULL COMMENT 'سنوات',
  `u_group` varchar(2) CHARACTER SET utf8 DEFAULT NULL COMMENT 'نام گروه',
  `u_description` text CHARACTER SET utf8 DEFAULT NULL COMMENT 'توضیحات',
  `u_pcode` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT 'شماره پرسنل',
  `u_wtype` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT 'سمت',
  `u_marital` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT 'وضعیت تاهل',
  `u_evidence` varchar(40) CHARACTER SET utf8 DEFAULT NULL COMMENT 'مدرک',
  `u_child_count` int(11) DEFAULT 0 COMMENT 'تعداد فرزند',
  `u_daily_wage` bigint(20) DEFAULT 0 COMMENT 'دستمزد روزانه',
  `u_fix_right` int(11) DEFAULT 0 COMMENT 'اضافه ثابت',
  `u_fin_contract` varchar(11) CHARACTER SET utf8 NOT NULL COMMENT 'تاریخ انقضای قرارداد'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_family`, `u_level`, `u_username`, `u_password`, `u_father`, `u_meli`, `u_birth`, `u_live_city`, `u_destination`, `u_mobile`, `u_tell`, `u_address`, `u_pre`, `u_group`, `u_description`, `u_pcode`, `u_wtype`, `u_marital`, `u_evidence`, `u_child_count`, `u_daily_wage`, `u_fix_right`, `u_fin_contract`) VALUES
(1, 'امیرعلی', 'شبانی', 'مدیر کل', 'admin', 'admin', '', '', '', '', '', '', '', '', '', 'B', '', '15546', 'سرپرست کوره', 'متاهل', 'ارشد', 5, 500000, 1000000, '1398/4/18'),
(2, 'سید مرتضی', 'مهدوی', 'مدیر', 'mori', 'mori', '', '', '', '', '', '', '', '', '', 'A', '', '19', '', '', '', 0, 0, 0, ''),
(3, 'مژگان', 'حمزه', 'مدیر', 'hamze', '3050188200m', '', '', '', '', '', '', '', '', '', 'A', '', '', '', '', '', 0, 0, 0, ''),
(13, 'سید مرتضی', 'مهدوی', 'مالی', 'mori2', '22', 'محمد رضا', '3040430386', '1398/3/1', '', '200 کیلومت', '09134933739', '03434233072', 'www', 'sad', 'B', 'asdas', '17', '', '', '', 0, 0, 0, ''),
(15, 'محمد', 'اسماعیلی', 'مالی', 'mrm', '6233', 'محمد رضا', '3040430386', '1398/4/10', 'رفسنجان', '200 کیلومت', '09134933739', '03434233072', 'رفسنجان', 'ندارد', 'B', 'هیچی', '14', 'سرپرست کوره', 'مجرد', 'کارشناسی برق - مخابرات', 0, 5441101, 0, ''),
(16, 'تست ۱', 'تست ۱', 'مدیر', 'test1', 'test1', '', '', '', '', '', '', '', '', '', 'B', '', '', '', '', '', 0, 0, 0, ''),
(17, 'میلاد', 'جمشیدی', 'فروش', 'milad', '1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bar_bring`
--
ALTER TABLE `bar_bring`
  ADD PRIMARY KEY (`bar_id`);

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
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`dr_id`);

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
-- Indexes for table `factor_buy`
--
ALTER TABLE `factor_buy`
  ADD PRIMARY KEY (`bu_id`);

--
-- Indexes for table `factor_log`
--
ALTER TABLE `factor_log`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `group_info`
--
ALTER TABLE `group_info`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `mamad`
--
ALTER TABLE `mamad`
  ADD PRIMARY KEY (`mm_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`pa-id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`pa-id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`prl_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `raw_rights`
--
ALTER TABLE `raw_rights`
  ADD PRIMARY KEY (`rr_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`sc_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `stock_log`
--
ALTER TABLE `stock_log`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `transfer_list`
--
ALTER TABLE `transfer_list`
  ADD PRIMARY KEY (`tl_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bar_bring`
--
ALTER TABLE `bar_bring`
  MODIFY `bar_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد بار رسیده';

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `dr_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد راننده', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `factor`
--
ALTER TABLE `factor`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `factor_body`
--
ALTER TABLE `factor_body`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد ردیف', AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `factor_buy`
--
ALTER TABLE `factor_buy`
  MODIFY `bu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد خرید', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `factor_log`
--
ALTER TABLE `factor_log`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `group_info`
--
ALTER TABLE `group_info`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد جدول', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mamad`
--
ALTER TABLE `mamad`
  MODIFY `mm_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `pa-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `pa-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `prl_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد جدول', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `raw_rights`
--
ALTER TABLE `raw_rights`
  MODIFY `rr_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد جدول', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد جدول', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد ردیف', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stock_log`
--
ALTER TABLE `stock_log`
  MODIFY `p_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transfer_list`
--
ALTER TABLE `transfer_list`
  MODIFY `tl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
