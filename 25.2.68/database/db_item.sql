-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2020 at 02:30 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_item`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `item_id` varchar(50) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `item_qty` int(11) NOT NULL,
  `use_qty` int(11) NOT NULL,
  `lend_qty` int(11) NOT NULL,
  `pending_qty` int(11) NOT NULL,
  `total_qty` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `img`, `item_id`, `item_name`, `price`, `item_qty`, `use_qty`, `lend_qty`, `pending_qty`, `total_qty`, `type`) VALUES
(1, '00.jpg', 'COM-001 - B', 'Dell - XX3- FFG74', 20000, 5, 0, 0, 0, 5, ''),
(2, '16032756187680.jpg', 'COM-001 - R', ' Dell - XX3- FFG63', 20000, 5, 1, 1, 0, 3, ''),
(5, 'no.jpg', '9mUv9ImoVH', 'C2OmZ6DO9J', 118, 10, 1, 0, 1, 8, ''),
(10, '16032897686073.jpg', 'emIlHqMwhP', 'QiZLAe9O3Y', 118, 10, 0, 0, 0, 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `item_borrowreturn`
--

CREATE TABLE `item_borrowreturn` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL COMMENT 'ผู้ยืม',
  `item` int(11) NOT NULL COMMENT 'เบิก / ยืม / คืน สินค้าอะไร',
  `qty` int(11) NOT NULL,
  `status` varchar(10) NOT NULL COMMENT 'เบิก / ยืม / คืน',
  `date` datetime NOT NULL COMMENT 'วันที่ เบิก / ยืม ',
  `approved_by` int(11) NOT NULL COMMENT 'คนที่อนุมัติ',
  `approved_date` datetime NOT NULL COMMENT 'วันที่อนุมัติ',
  `type` varchar(20) NOT NULL COMMENT 'ต้องคืน / ไม่ต้องคืน',
  `returned_date` datetime NOT NULL COMMENT 'วันที่คืน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_borrowreturn`
--

INSERT INTO `item_borrowreturn` (`id`, `user`, `item`, `qty`, `status`, `date`, `approved_by`, `approved_date`, `type`, `returned_date`) VALUES
(55, 7, 10, 5, 'Returned', '2020-10-23 13:47:10', 1, '2020-10-23 14:08:39', 'Lend', '2020-10-23 14:14:00'),
(56, 4, 2, 1, 'Approved', '2020-10-23 13:47:17', 1, '2020-10-23 14:10:24', 'Use', '0000-00-00 00:00:00'),
(57, 2, 5, 1, 'Returned', '2020-10-23 13:47:24', 1, '2020-10-23 14:09:46', 'Lend', '2020-10-23 14:14:23'),
(58, 7, 5, 2, 'Canceled', '2020-10-23 13:47:42', 0, '0000-00-00 00:00:00', 'Lend', '0000-00-00 00:00:00'),
(59, 2, 5, 1, 'Approved', '2020-10-23 14:09:09', 1, '2020-10-23 14:09:28', 'Use', '0000-00-00 00:00:00'),
(60, 4, 5, 2, 'Rejected', '2020-10-23 14:11:46', 1, '2020-10-23 14:13:05', 'Lend', '0000-00-00 00:00:00'),
(61, 3, 1, 2, 'Canceled', '2020-10-23 14:19:11', 0, '0000-00-00 00:00:00', 'Lend', '0000-00-00 00:00:00'),
(62, 3, 1, 1, 'Rejected', '2020-10-23 14:19:23', 2, '2020-10-23 14:30:15', 'Use', '0000-00-00 00:00:00'),
(63, 3, 2, 1, 'Approved', '2020-10-23 14:19:28', 2, '2020-10-23 14:29:31', 'Lend', '0000-00-00 00:00:00'),
(64, 3, 5, 1, 'Pending', '2020-10-23 14:19:33', 0, '0000-00-00 00:00:00', 'Use', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `item_user`
--

CREATE TABLE `item_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `department` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `dont_delete` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_user`
--

INSERT INTO `item_user` (`id`, `username`, `password`, `emp_id`, `emp_name`, `role`, `department`, `position`, `dont_delete`) VALUES
(1, 'admin', '123', '0001', 'This is a Admin', 'admin', 'Manager', 'Admin', 'Yes'),
(2, 'approval', '123', '0002', 'This is a approval', 'approval', 'Approval', 'Approval', ''),
(5, 'itsupport', '123', '0005', 'Anan', 'user', 'IT', 'IT Support', ''),
(7, 'qc', '123', '0006', 'Mana Manee', 'user', 'QC', 'QC', ''),
(4, 'sa', '1234', '0004', 'Ant', 'user', 'Sales', 'sa', ''),
(3, 'user', '123', '0003', 'This is a User', 'user', 'Accounting', 'Accounting Staff', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_itemborrowreturn`
-- (See below for the actual view)
--
CREATE TABLE `view_itemborrowreturn` (
`id` int(11)
,`user` int(11)
,`item` int(11)
,`qty` int(11)
,`status` varchar(10)
,`date` datetime
,`approved_by` int(11)
,`approved_date` datetime
,`type` varchar(20)
,`returned_date` datetime
,`emp_id` varchar(20)
,`emp_name` varchar(255)
,`item_id` varchar(50)
,`item_name` varchar(255)
,`img` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `view_itemborrowreturn`
--
DROP TABLE IF EXISTS `view_itemborrowreturn`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_itemborrowreturn`  AS  select `item_borrowreturn`.`id` AS `id`,`item_borrowreturn`.`user` AS `user`,`item_borrowreturn`.`item` AS `item`,`item_borrowreturn`.`qty` AS `qty`,`item_borrowreturn`.`status` AS `status`,`item_borrowreturn`.`date` AS `date`,`item_borrowreturn`.`approved_by` AS `approved_by`,`item_borrowreturn`.`approved_date` AS `approved_date`,`item_borrowreturn`.`type` AS `type`,`item_borrowreturn`.`returned_date` AS `returned_date`,`item_user`.`emp_id` AS `emp_id`,`item_user`.`emp_name` AS `emp_name`,`item`.`item_id` AS `item_id`,`item`.`item_name` AS `item_name`,`item`.`img` AS `img` from ((`item_borrowreturn` join `item_user` on(`item_borrowreturn`.`user` = `item_user`.`id`)) join `item` on(`item_borrowreturn`.`item` = `item`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `item_borrowreturn`
--
ALTER TABLE `item_borrowreturn`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `item_user`
--
ALTER TABLE `item_user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `item_borrowreturn`
--
ALTER TABLE `item_borrowreturn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `item_user`
--
ALTER TABLE `item_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
