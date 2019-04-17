-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2019 at 05:57 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

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
(351, 'دانه بندی 0 تا 100'),
(352, 'دانه بندی 100 تا 120');

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
(24, 52, '1398/1/28', 1),
(25, 52, '1398/1/28', 1);

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
  `fb_result_analyze` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factor_body`
--

INSERT INTO `factor_body` (`fb_id`, `f_id`, `p_id`, `cat_id`, `fb_quantity`, `fb_price`, `fb_verify_admin1`, `fb_send_customer`, `fb_verify_customer`, `fb_verify_docs`, `fb_verify_finan`, `fb_verify_admin2`, `fb_wait_bar`, `fb_ready_bar`, `fb_get_sample`, `fb_verify_bar`, `fb_exit_doc`, `fb_result_analyze`) VALUES
(14, 22, 1, 351, 8, 2500, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL),
(15, 22, 1, 351, 8, 2500, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL),
(16, 22, 1, 351, 8, 2500, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(17, 23, 1, 351, 2522, 2511, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(18, 23, 1, 351, 2522, 2511, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(19, 23, 1, 351, 2522, 2511, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(20, 24, 1, 351, 52, 52, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(21, 24, 1, 351, 52, 52, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(22, 25, 1, 351, 25, 25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `factor_log`
--

CREATE TABLE `factor_log` (
  `l_id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `l_date` varchar(16) CHARACTER SET utf8 DEFAULT NULL,
  `f_id` int(11) DEFAULT NULL,
  `l_details` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `factor_log`
--

INSERT INTO `factor_log` (`l_id`, `u_id`, `l_date`, `f_id`, `l_details`) VALUES
(1, 1, '$l_date', 1, ''),
(2, 1, '1398/01/22 18:45', 1, ''),
(3, 1, '1398/01/22 18:46', 1, ''),
(4, 1, '1398/01/22 18:46', 1, ''),
(5, 1, '1398/01/22 18:47', 1, ''),
(6, 1, '1398/01/22 18:47', 1, 'test'),
(7, 1, '1398/01/22 19:46', 1, 'dsadasda'),
(8, 1, '1398/01/22 19:46', 1, 'dsadasda'),
(9, 1, '1398/01/22 19:48', 1, 'salam'),
(10, 1, '1398/01/23 02:02', 1, 'salam'),
(11, 1, '1398/01/23 02:10', 1, ''),
(12, 1, '1398/01/23 02:10', 1, ''),
(13, 1, '1398/01/23 02:11', 1, ''),
(14, 1, '1398/01/23 02:11', 1, ''),
(15, 1, '1398/01/23 02:11', 1, ''),
(16, 1, '1398/01/23 02:11', 1, ''),
(17, 1, '1398/01/23 02:11', 1, ''),
(18, 1, '1398/01/23 02:12', 1, ''),
(19, 1, '1398/01/23 02:13', 1, ''),
(20, 1, '1398/01/23 02:17', 1, ''),
(21, 1, '1398/01/23 02:17', 1, ''),
(22, 1, '1398/01/23 02:17', 1, ''),
(23, 1, '1398/01/23 02:18', 1, ''),
(24, 1, '1398/01/23 02:18', 1, ''),
(25, 1, '1398/01/23 02:21', 1, ''),
(26, 1, '1398/01/23 02:21', 1, 'سشسشس'),
(27, 1, '1398/01/23 02:23', 1, 'سشسشس'),
(28, 1, '1398/01/23 02:23', 1, 'سشسشسش'),
(29, 1, '1398/01/24 09:55', 1, 'سشسشسش'),
(30, 1, '1398/01/24 10:00', 1, 'سشسشسش'),
(31, 1, '1398/01/24 10:14', 1, 'سشسشسش'),
(32, 1, '1398/01/24 10:14', 1, 'سش'),
(33, 1, '1398/01/24 10:14', 1, 'شس'),
(34, 1, '1398/01/24 10:14', 1, 'یشسیشس'),
(35, 1, '1398/01/24 10:14', 1, 'سشسی'),
(36, 1, '1398/01/24 10:14', 1, 'یشیش'),
(37, 1, '1398/01/24 10:15', 1, 'یشیسشس'),
(38, 1, '1398/01/24 10:15', 1, 'یسشیش'),
(39, 1, '1398/01/24 16:26', 1, 'یفیبل'),
(40, 1, '1398/01/24 20:30', 1, 'لنتل');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(35) DEFAULT NULL,
  `cat_id` varchar(20) DEFAULT NULL,
  `p_unit` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `cat_id`, `p_unit`) VALUES
(1, 'کک صنعتی', '351', 'کیلوگرم'),
(4, 'کک صنعتی dfsdf', '352', 'کیلوگرم');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `s_id` int(11) NOT NULL COMMENT 'کد ردیف',
  `p_id` int(11) DEFAULT NULL COMMENT 'کد محصول',
  `cat_id` int(11) NOT NULL COMMENT 'کد دسته بندی',
  `s_amount` varchar(35) DEFAULT NULL COMMENT 'مقدار',
  `s_eprice` double NOT NULL COMMENT 'قیمت تمام شده',
  `s_sprice` double NOT NULL COMMENT 'قیمت فروش'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`s_id`, `p_id`, `cat_id`, `s_amount`, `s_eprice`, `s_sprice`) VALUES
(2, 1, 352, '1500', 12500000, 1400000),
(6, 10, 0, '15450', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transfer_list`
--

CREATE TABLE `transfer_list` (
  `tl_id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `fb_id` int(11) DEFAULT NULL,
  `dr_name` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `dr_national` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `dr_mobile` varchar(11) CHARACTER SET utf8 DEFAULT NULL,
  `dr_plaque` varchar(9) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer_list`
--

INSERT INTO `transfer_list` (`tl_id`, `u_id`, `fb_id`, `dr_name`, `dr_national`, `dr_mobile`, `dr_plaque`) VALUES
(1, 1, 1, 'امام راننده ها', '3255352633', '09136522541', '96ی296-65'),
(2, 1, 14, 'یشس', 'یشسیش', 'یشس', 'یشیسش'),
(3, 1, 14, 'امام راننده ها', '3255352633', '09136522541', '96ی296-65');

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
  `u_password` varchar(35) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_family`, `u_level`, `u_username`, `u_password`) VALUES
(1, 'امیرعلی', 'شبانی', 'مدیر کل', 'admin', 'admin'),
(2, 'سید مرتضی', 'مهدوی', 'مدیر', 'mori', 'mori');

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
-- Indexes for table `factor_log`
--
ALTER TABLE `factor_log`
  ADD PRIMARY KEY (`l_id`);

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=353;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `factor`
--
ALTER TABLE `factor`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `factor_body`
--
ALTER TABLE `factor_body`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد ردیف', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `factor_log`
--
ALTER TABLE `factor_log`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد ردیف', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transfer_list`
--
ALTER TABLE `transfer_list`
  MODIFY `tl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
