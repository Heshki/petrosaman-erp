-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2019 at 03:47 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

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
  `c_oaddress` text,
  `c_faddress` text,
  `c_email` text,
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
  `dr_name` varchar(50) NOT NULL COMMENT 'نام',
  `dr_family` varchar(50) NOT NULL COMMENT 'نام خانوادگی',
  `dr_kmeli` int(10) NOT NULL COMMENT 'کد ملی',
  `dr_car` varchar(50) NOT NULL COMMENT 'نوع ماشین',
  `dr_plate` varchar(50) NOT NULL COMMENT 'پلاک',
  `dr_mobile` int(11) NOT NULL COMMENT 'شماره همراه',
  `dr_status` int(11) NOT NULL COMMENT 'وضعیت'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`dr_id`, `dr_name`, `dr_family`, `dr_kmeli`, `dr_car`, `dr_plate`, `dr_mobile`, `dr_status`) VALUES
(1, 'راننده', 'شماره 1', 30501882, 'کامیون', '10ب 5 ایرلن', 913145268, 1),
(2, 'سید مرتضی', 'مهدوی', 3025665, 'کامیون', '65623نمتن', 32365998, 0);

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
(9, 1, '1398/01/12 10:19', 1),
(10, 31, '1398/01/12 12:13', 1),
(11, 54, '1398/01/12 12:14', 1),
(12, 54, '1398/1/20', 1),
(13, 52, '1398/1/20', 1),
(14, 54, '1398/1/20', 1),
(15, 52, '1398/1/12', 1),
(16, 52, '1398/1/12', 1),
(17, 54, '1398/1/17', 1),
(18, 52, '1398/1/13', 1),
(19, 52, '1398/1/5', 1),
(20, 52, '1398/1/16', 1),
(21, 52, '1398/1/20', 1),
(22, 52, '1398/1/21', 1),
(23, 54, '1398/1/21', 1),
(24, 55, '1398/2/7', 1),
(25, 52, '1398/2/7', 1),
(26, 52, '1398/2/16', 1),
(27, 55, '1398/2/9', 1),
(28, 54, '1398/2/14', 1),
(29, 52, '1398/2/16', 3),
(30, 52, '1398/2/15', 3),
(31, 55, '1398/2/17', 3),
(32, 52, '1398/2/17', 3),
(33, 52, '1398/2/17', 3),
(34, 52, '1398/2/17', 3),
(35, 52, '1398/2/22', 3),
(36, 55, '1398/2/17', 3),
(37, 59, '1398/2/26', 3),
(38, 59, '1398/2/22', 3),
(39, 55, '1398/2/28', 3),
(40, 52, '1398/3/7', 1),
(41, 54, '1398/3/13', 1),
(42, 54, '1398/3/13', 1),
(43, 52, '1398/3/6', 1),
(44, 52, '1398/3/13', 1),
(45, 52, '1398/3/14', 1),
(46, 52, '1398/3/30', 1);

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
  `fb_verify_admin1` tinyint(1) DEFAULT '0' COMMENT 'تایید 1 مدیر',
  `fb_send_customer` tinyint(1) DEFAULT '0' COMMENT 'ارسال مشتری',
  `fb_verify_customer` tinyint(1) DEFAULT '0' COMMENT 'تایید مشتری',
  `fb_verify_docs` tinyint(1) DEFAULT '0' COMMENT 'اسناد تایید',
  `fb_verify_finan` tinyint(1) DEFAULT '0' COMMENT 'تایید مالی',
  `fb_verify_admin2` tinyint(1) DEFAULT '0' COMMENT 'تایید 2 مدیر',
  `fb_wait_bar` tinyint(1) DEFAULT '0' COMMENT 'منتظر بارگیری',
  `fb_ready_bar` tinyint(1) DEFAULT '0' COMMENT 'آماده تحویل',
  `fb_get_sample` tinyint(1) DEFAULT '0' COMMENT 'نمونه برداری',
  `fb_verify_bar` tinyint(1) DEFAULT '0' COMMENT 'تایید بارگیری',
  `fb_exit_doc` tinyint(1) DEFAULT '0' COMMENT 'حواله خروج',
  `fb_exit_bar` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'تایید خروج بار',
  `fb_dname` varchar(50) NOT NULL COMMENT 'نام راننده',
  `fb_dfamily` varchar(15) NOT NULL COMMENT 'نام خانوادگی راننده',
  `fb_mellicode` varchar(15) NOT NULL COMMENT 'کد ملی راننده',
  `fb_car` varchar(15) NOT NULL COMMENT 'ماشین',
  `fb_plaque` varchar(25) NOT NULL COMMENT 'پلاک',
  `fb_mobile` varchar(11) NOT NULL COMMENT 'موبایل'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factor_body`
--

INSERT INTO `factor_body` (`fb_id`, `f_id`, `p_id`, `cat_id`, `fb_quantity`, `fb_price`, `fb_verify_admin1`, `fb_send_customer`, `fb_verify_customer`, `fb_verify_docs`, `fb_verify_finan`, `fb_verify_admin2`, `fb_wait_bar`, `fb_ready_bar`, `fb_get_sample`, `fb_verify_bar`, `fb_exit_doc`, `fb_exit_bar`, `fb_dname`, `fb_dfamily`, `fb_mellicode`, `fb_car`, `fb_plaque`, `fb_mobile`) VALUES
(14, 22, 1, 351, 8, 2500, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'امیر', 'علی بیگی', '3052305418', 'بنز', 'الف 51 ی ایران 65', '09138630341'),
(15, 22, 1, 351, 8, 2500, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'سعید', 'سلطانی', '3052305415', 'سمند', 'الف 25 ی', '09125556565'),
(16, 22, 1, 351, 8, 2500, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
(17, 23, 1, 351, 2522, 2511, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
(18, 23, 1, 351, 2522, 2511, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
(19, 23, 1, 351, 2522, 2511, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
(20, 24, 1, 352, 250000, 3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 'رضا', 'حمیدی', '3052306363', 'مرسدس', 'الف س', '091125236'),
(21, 26, 5, 353, 350000, 2100, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 'مصطفی', 'عرب', '3040188828', 'بنز', 'الف 51 ی ایران 65', '09132920360'),
(23, 27, 5, 353, 1250, 1950, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
(24, 28, 5, 353, 300000, 2700, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'امیر', 'حمیدی', '305230517', 'بنز', 'الف 51 ی ایران 65', '09138630341'),
(25, 29, 1, 351, 2, 20000, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '');

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
  `bu_send_customer` int(11) DEFAULT NULL COMMENT 'ارسال رسید به مشتری'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factor_buy`
--

INSERT INTO `factor_buy` (`bu_id`, `f_id`, `p_id`, `bu_scan_invoice`, `bu_quantity`, `bu_verify_admin1`, `bu_send_fiscal`, `bu_send_customer`) VALUES
(1, 1, 1, '1', 23, 1, 1, 1),
(2, 35, 1, '1', 100, 0, 0, 0),
(3, 35, 1, '1', 200, 0, 0, 0),
(4, 36, 1, '1', 200, 0, 0, 0),
(5, 37, 1, '1', 200, 0, 0, 0),
(6, 37, 5, '1', 100, 0, 0, 0),
(7, 38, 1, '1', 100, 0, 0, 0),
(8, 40, 4, '0', 200, 0, 0, 0),
(9, 42, 4, '0', 200, 0, 0, 0),
(10, 42, 5, '0', 200, 0, 0, 0),
(11, 43, 1, '0', 200, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `factor_log`
--

CREATE TABLE `factor_log` (
  `l_id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `l_date` varchar(16) CHARACTER SET utf8 DEFAULT NULL,
  `fb_id` int(11) DEFAULT NULL,
  `l_details` text CHARACTER SET utf8
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
(14, 1, '1398/03/07 11:18', 25, 'wwww');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(50) NOT NULL,
  `m_type` varchar(11) NOT NULL,
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
(88, 'melicart1560004215.png', 'user', 'melicart', 13),
(89, 'identify1560002723.jpg', 'user', 'identify', 13);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(35) DEFAULT NULL,
  `p_unit` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_unit`) VALUES
(1, 'کک صنعتی', 'کیلوگرم'),
(4, 'کک صنعتی dfsdf', 'کیلوگرم'),
(5, 'گرافیت', '100');

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
(1, '3', 'B', 'rest.day.day.day.night.night.night.night.rest.rest.rest.rest.day.day.day.day.night.night.night.night.rest.rest.rest.rest.day.day.day.day.night.night.night'),
(2, '4', 'B', 'day.day.night.night.rest.rest.rest.rest.day.day.day.day.night.night.night.night.rest.rest.rest.rest.day.day.day.day.night.night.night.night.rest.rest.rest');

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
  `u_id` int(11) NOT NULL COMMENT 'کد جدول',
  `u_name` varchar(35) CHARACTER SET utf8 DEFAULT NULL COMMENT 'نام',
  `u_family` varchar(35) CHARACTER SET utf8 DEFAULT NULL COMMENT 'نام خانوادگی',
  `u_level` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT 'سطح دسترسی',
  `u_username` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT 'نام کاربری',
  `u_password` varchar(35) CHARACTER SET utf8 DEFAULT NULL COMMENT 'رمز عبور',
  `u_father` varchar(40) CHARACTER SET utf8 DEFAULT NULL COMMENT 'نام پدر',
  `u_meli` varchar(15) CHARACTER SET utf8 DEFAULT NULL COMMENT 'کد ملی',
  `u_birth` varchar(15) CHARACTER SET utf8 DEFAULT NULL COMMENT 'تاریخ تولد',
  `u_live_city` varchar(40) CHARACTER SET utf8 DEFAULT NULL COMMENT 'شهر محل سکونت',
  `u_destination` varchar(10) CHARACTER SET utf8 DEFAULT NULL COMMENT 'مسافت تا کارخانه',
  `u_mobile` varchar(15) CHARACTER SET utf8 DEFAULT NULL COMMENT 'موبایل',
  `u_tell` varchar(15) CHARACTER SET utf8 DEFAULT NULL COMMENT 'تلفن ثابت',
  `u_address` text CHARACTER SET utf8 COMMENT 'آدرس محل سکونت',
  `u_pre` text CHARACTER SET utf8 COMMENT 'سنوات',
  `u_group` varchar(2) CHARACTER SET utf8 DEFAULT NULL COMMENT 'نام گروه',
  `u_description` text CHARACTER SET utf8 COMMENT 'توضیحات'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_family`, `u_level`, `u_username`, `u_password`, `u_father`, `u_meli`, `u_birth`, `u_live_city`, `u_destination`, `u_mobile`, `u_tell`, `u_address`, `u_pre`, `u_group`, `u_description`) VALUES
(13, 'سید مرتضی', 'مهدوی', 'مالی', 'mori2', '22', 'محمد رضا', '3040430386', '1398/3/1', '', '200 کیلومت', '09134933739', '03434233072', 'www', 'sad', 'C', 'asdas'),
(15, 'محمد', 'اسماعیلی', 'مالی', 'mrm', '65', '', '', '', '', '', '', '', '', '', 'A', '');

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
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

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
  MODIFY `dr_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد راننده', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `factor`
--
ALTER TABLE `factor`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `factor_body`
--
ALTER TABLE `factor_body`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد ردیف', AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `factor_buy`
--
ALTER TABLE `factor_buy`
  MODIFY `bu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد خرید', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `factor_log`
--
ALTER TABLE `factor_log`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد جدول', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد ردیف', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transfer_list`
--
ALTER TABLE `transfer_list`
  MODIFY `tl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد جدول', AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
