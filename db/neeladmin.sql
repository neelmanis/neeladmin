-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2016 at 07:10 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `neeladmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_login_info`
--

CREATE TABLE `app_login_info` (
  `uid` int(11) NOT NULL,
  `create_on_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `login_name` varchar(250) NOT NULL,
  `login_pass` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `login_fullname` varchar(250) NOT NULL,
  `login_contact` varchar(250) NOT NULL,
  `profile_img` varchar(250) NOT NULL,
  `login_active` int(11) NOT NULL DEFAULT '1',
  `user_type` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_login_info`
--

INSERT INTO `app_login_info` (`uid`, `create_on_date`, `login_name`, `login_pass`, `email`, `login_fullname`, `login_contact`, `profile_img`, `login_active`, `user_type`) VALUES
(1, '2015-09-08 18:59:59', 'admin', 'admin', 'admin@gmail.com', 'Neelmani ', '9090909090', 'profile_img/11906OM.png', 1, 'superadmin'),
(3, '2015-09-09 16:10:42', 'neel', 'neel', 'wqeqwe', 'qweqwe', 'e', '', 1, 'admin'),
(4, '2015-09-09 16:10:42', 'weqwe', 'qweqw', 'qwe', 'qwe', '', '', 1, 'admin'),
(6, '2015-09-09 16:11:03', 'user', '123', 'asd', '', '', '', 1, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `create_on_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `code`, `title`, `create_on_date`) VALUES
(6, 'BSCS', 'Bachelor in Science in Computer Science', '2015-09-12 18:08:12'),
(7, 'BSAT', 'Bachelor in Science in Accounting Technology', '2015-09-12 18:08:12'),
(8, 'BSIT', 'Bachelor in Science in Information Technology', '2015-09-12 18:08:12'),
(9, 'IT', 'Information Technology', '2015-09-12 18:08:12'),
(10, 'CET', 'Computer and Electronics Technology', '2015-09-12 18:08:12');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `create_on_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `course` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `roll_no` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `year_level` varchar(100) NOT NULL,
  `term` varchar(100) NOT NULL,
  `student_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `create_on_date`, `firstname`, `lastname`, `password`, `gender`, `course`, `address`, `contact`, `photo`, `roll_no`, `status`, `year_level`, `term`, `student_status`) VALUES
(22, '2015-09-12 18:07:27', 'Jonnel Ray', 'Acostoy', 'j', 'Male', 'BSIT', 'Bacolod', '09362154039', 'upload/19690_419968988091510_2003011347_n.jpg', '01720100001', 'active', 'First Year', '1st', 'Irregular'),
(23, '2015-09-12 18:07:27', 'JR', 'Ang', 'r', 'Male', 'BSIT', 'Bacolod', '09382651402', 'upload/69624_419989601422782_90451266_n.jpg', '01720100002', 'active', 'First Year', '2nd', 'Regular'),
(24, '2015-09-12 18:07:27', 'Wendell', 'Francisco', 'w', 'Male', 'BSIT', 'Bacolod', '09358462054', 'upload/69624_419989601422782_90451266_n.jpg', '01720100003', '', 'First Year', '1st', 'Irregular'),
(25, '2015-09-12 18:07:27', 'Jade ', 'Omangayon', 'j', 'Male', 'BSIT', 'Bacolod', '0125487568', 'upload/72920_419993158089093_1036712210_n.jpg', '01720100004', '', 'First Year', '2nd', 'Regular'),
(26, '2015-09-12 18:07:27', 'Clarisse Joanne', 'Quinto', 'cj', 'Female', 'BSIT', 'Silay', '09658589848', 'upload/69624_419989601422782_90451266_n.jpg', '01720100005', '', 'First Year', '2nd', 'Irregular'),
(27, '2015-09-12 18:07:27', 'Aldrin Jay', 'Fuentes', 'aj', 'Male', 'BSIT', 'Saravia', '09365487236', 'upload/222683_419992111422531_710097129_n.jpg', '01720100006', '', 'Fourth', '', ''),
(28, '2015-09-12 18:07:27', 'Daresa ', 'Alolor', 'd', 'Female', 'BSIT', 'Silay', '0236875462', 'upload/19729_419991678089241_651129214_n.jpg', '01720100007', '', 'Fourth', '', ''),
(29, '2015-09-12 18:07:27', 'Mariestella', 'Santillan', 'm', 'Female', 'BSIT', 'Silay', '03269587456', 'upload/222754_419991128089296_1808353796_n.jpg', '01720100008', '', 'Fourth', '', ''),
(30, '2015-09-12 18:07:27', 'Oliver', 'Martinez', 'o', 'Male', 'BSIT', 'Catabla', '02147569865', 'upload/67281_419969851424757_397713077_n.jpg', '01720100009', '', 'Fourth', '', ''),
(31, '2015-09-12 18:07:27', 'Reyden', 'Lamig', 'r', 'Male', 'BSIT', 'Talisay', '09025487562', 'upload/223397_419990678089341_1327250400_n.jpg', '01720100010', '', 'Fourth', '', ''),
(32, '2015-09-12 18:07:27', 'Arjay', 'Valladarez', 'a', 'Male', 'BSIT', 'Bacolod', '09365482614', 'upload/222610_419988838089525_2056922731_n.jpg', '01720100011', '', 'Fourth', '', ''),
(33, '2015-09-12 18:07:27', 'Ricky', 'Hegino', 'r', 'Male', 'BSIT', 'Victorias', '09365425879', 'upload/69624_419989601422782_90451266_n.jpg', '01720100012', '', 'Third', '', ''),
(34, '2015-09-12 18:07:27', 'Kayvin Joshua', 'Nobleza', 'k', 'Male', 'BSIT', 'Talisay', '09587463259', 'upload/19729_419991804755895_1497610900_n.jpg', '01720100013', '', 'Third', '', ''),
(35, '2015-09-12 18:07:27', 'Dave', 'Macellana', 'd', 'Male', 'BSIT', 'Talisay', '02587496584', 'upload/28887_419991644755911_1991666035_n.jpg', '01720100014', '', 'Third', '', ''),
(36, '2015-09-12 18:07:27', 'Neri James', 'Yusala', 'j', 'Male', 'BSIT', 'Bacolod', '09065484120', 'upload/23905_10152405107074240_1249032324_n.jpg', '01720100015', 'active', 'Third', '', ''),
(37, '2015-09-12 18:07:27', 'Neri James', 'Yusala', 'nj', 'Male', 'BSIT', 'Bacolod', '09065484120', 'upload/11353_419989368089472_1146683879_n.jpg', '01720100016', '', 'Third', '', ''),
(38, '2015-09-12 18:07:27', 'Ziek', 'Lumogdang', 'z', 'Male', 'BSIT', 'Bacolod', '09657845623', 'upload/69624_419989601422782_90451266_n.jpg', '01720100017', '', 'Second', '', ''),
(39, '2015-09-12 18:07:27', 'Jay', 'Hegino', 'j', 'Male', 'BSIT', 'Talisay', '09050624568', 'upload/64818_419991544755921_1245275723_n.jpg', '01720100018', '', 'Second', '', ''),
(40, '2015-09-12 18:07:27', 'Kris', 'Mayo', 'k', 'Female', 'BSIT', 'Silay', '09325487123', 'upload/44351_419991981422544_242320805_n.jpg', '01720100019', '', 'Second', '', ''),
(41, '2015-09-12 18:07:27', 'Dannie', 'Villarias', 'd', 'Female', 'BSIT', 'Silay', '09382546201', 'upload/222610_419988838089525_2056922731_n.jpg', '01720100020', '', 'Second', '', ''),
(42, '2015-09-12 18:07:27', 'Christine', 'Diaz', 'c', 'Female', 'BSIT', 'Saravia', '09365481254', 'upload/19729_419991804755895_1497610900_n.jpg', '01720100021', '', 'First', '', ''),
(43, '2015-09-12 18:07:27', 'Gemar', 'Diaz', 'g', 'Male', 'BSIT', 'Talisay', '09093652140', 'upload/222683_419992111422531_710097129_n.jpg', '01720100022', '', 'First', '', ''),
(44, '2015-09-12 18:07:27', 'Jing', 'Fuentes', 'j', 'Female', 'BSIT', 'Silay', '09482635001', 'upload/67281_419969851424757_397713077_n.jpg', '01720100023', '', 'First', '', ''),
(45, '2015-09-12 18:07:27', 'Maica', 'Santillan', 'm', 'Female', 'BSIT', 'Saravia', '09365875623', 'upload/72920_419993158089093_1036712210_n.jpg', '01720100024', '', 'First', '', ''),
(46, '2015-09-12 18:07:27', 'Laarnie', 'Sanchez', 'l', 'Female', 'BSIT', 'Bacolod', '09394856230', 'upload/149434_419992328089176_2137045757_n.jpg', '01720100025', '', 'First', '', ''),
(47, '2015-09-12 18:07:27', 'Econ', 'Villacampa', 'e', 'Female', 'BSCS', 'Silay', '09364756201', 'upload/222754_419991128089296_1808353796_n.jpg', '01720100026', '', 'Fourth', '', ''),
(48, '2015-09-12 18:07:27', 'Julius', 'Vistar', 'sti', 'Male', 'BSIT', 'Bacolod', '09385214562', 'upload/28887_419991644755911_1991666035_n.jpg', '01720100054', 'active', 'Fourth', '1st', 'Regular'),
(50, '2015-09-12 18:07:27', 'john kevin ', 'lorayna ', 'teph', '', 'BSIT', '', '', 'upload/1240518_10200243579963092_2073745461_n.jpg', '100175', 'active', 'First Year', '2nd', 'Irregular'),
(51, '2015-09-12 18:07:27', 'leocadio', 'lea', 'm', '', 'BSIT', '', '', 'upload/14179_560838690598595_2144623357_s.jpg', '00002', 'active', 'First Year', '1st', 'Regular');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_login_info`
--
ALTER TABLE `app_login_info`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_login_info`
--
ALTER TABLE `app_login_info`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
