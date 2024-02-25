-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 11, 2023 at 02:01 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_onlinedanceclass`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL auto_increment,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_contact` int(11) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_contact`, `admin_password`) VALUES
(1, 'admin', 'admin@gmail.com', 1234567890, 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admission`
--

CREATE TABLE `tbl_admission` (
  `admission_id` int(11) NOT NULL auto_increment,
  `admission_number` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subcategory_id` varchar(100) NOT NULL,
  `grand_total` varchar(100) NOT NULL,
  `emi` varchar(100) NOT NULL,
  `count` varchar(100) NOT NULL,
  PRIMARY KEY  (`admission_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_admission`
--

INSERT INTO `tbl_admission` (`admission_id`, `admission_number`, `student_id`, `subcategory_id`, `grand_total`, `emi`, `count`) VALUES
(7, '135705', 5, '', '', '', ''),
(8, '408798', 5, '4,9,11', '73000', '24333.333333333', '3'),
(9, '899722', 5, '4', '3000', '3000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assigntrainer`
--

CREATE TABLE `tbl_assigntrainer` (
  `assign_id` int(11) NOT NULL auto_increment,
  `trainer_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `assign_status` varchar(100) NOT NULL,
  PRIMARY KEY  (`assign_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_assigntrainer`
--

INSERT INTO `tbl_assigntrainer` (`assign_id`, `trainer_id`, `student_id`, `assign_status`) VALUES
(3, 1, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL auto_increment,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(3, 'classical'),
(6, 'Western');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_studentregistration`
--

CREATE TABLE `tbl_studentregistration` (
  `student_id` int(11) NOT NULL auto_increment,
  `student_name` varchar(50) NOT NULL,
  `student_contact` varchar(50) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `student_password` varchar(50) NOT NULL,
  `student_photo` varchar(50) NOT NULL,
  PRIMARY KEY  (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_studentregistration`
--

INSERT INTO `tbl_studentregistration` (`student_id`, `student_name`, `student_contact`, `student_email`, `student_password`, `student_photo`) VALUES
(2, 'anu josephine', '9846935816', 'anjana@gmail.com', 'asdfg', 'index.php'),
(3, 'Babymol', '9884995050', 'molbaby@gmail.com', 'qwer', ''),
(4, 'Nandhu', '9856439870', 'nandhu@gmail.com', 'nandhu123', ''),
(5, 'Mariyam', '9576432094', 'mariyam@gmail.com', 'mariyam', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL auto_increment,
  `subcategory_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_rate` varchar(50) NOT NULL,
  PRIMARY KEY  (`subcategory_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `subcategory_name`, `category_id`, `subcategory_rate`) VALUES
(4, 'mohiniyattam', 3, '5000'),
(6, 'Bharatanatyam', 0, '10000'),
(7, 'Kuchippudi', 3, '1000'),
(8, 'Kathak', 3, '30000'),
(9, 'Hip Hop', 6, '60000'),
(10, 'Ballet', 6, '10000'),
(11, 'Break', 6, '10000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trainer`
--

CREATE TABLE `tbl_trainer` (
  `trainer_id` int(11) NOT NULL auto_increment,
  `trainer_name` varchar(100) NOT NULL,
  `trainer_contact` varchar(50) NOT NULL,
  `trainer_email` varchar(100) NOT NULL,
  `trainer_photo` varchar(50) NOT NULL,
  `trainer_certificate` varchar(50) NOT NULL,
  `trainer_video` varchar(50) NOT NULL,
  `trainer_password` varchar(50) NOT NULL,
  `subcategory_id` varchar(50) NOT NULL,
  PRIMARY KEY  (`trainer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_trainer`
--

INSERT INTO `tbl_trainer` (`trainer_id`, `trainer_name`, `trainer_contact`, `trainer_email`, `trainer_photo`, `trainer_certificate`, `trainer_video`, `trainer_password`, `subcategory_id`) VALUES
(1, 'Anjana', '9846935816', 'anjana@gmail.com', 'index.php', 'index.php', 'index.php', 'asdf', '4'),
(2, 'Anjana s p', '9846935816', 'anjana@gmail.com', 'index.php', 'index.php', 'index.php', 'anjana', '4'),
(3, 'anna', '7654239845', 'anna@gmail.com', 'Screenshot (1).png', 'Screenshot (2).png', 'Screenshot (1).png', 'asdf', '4,7');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_name` varchar(100) NOT NULL,
  `user_gender` varchar(40) NOT NULL,
  `user_contact` int(11) NOT NULL,
  `user_email` varchar(20) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_pincode` varchar(30) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_user`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE `tbl_video` (
  `video_id` int(11) NOT NULL auto_increment,
  `video_details` varchar(1000) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `subcategory_id` varchar(100) NOT NULL,
  `video_file` varchar(50) NOT NULL,
  PRIMARY KEY  (`video_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`video_id`, `video_details`, `trainer_id`, `subcategory_id`, `video_file`) VALUES
(2, 'drges', 3, '4', 'h2_EuvuX6n.jpeg');
