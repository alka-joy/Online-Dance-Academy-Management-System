-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2023 at 07:05 AM
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
  `admission_status` varchar(500) NOT NULL default '0',
  `payment_date` varbinary(500) NOT NULL,
  PRIMARY KEY  (`admission_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_admission`
--

INSERT INTO `tbl_admission` (`admission_id`, `admission_number`, `student_id`, `subcategory_id`, `grand_total`, `emi`, `count`, `admission_status`, `payment_date`) VALUES
(1, '154437', 1, '6', '-2000', '-2000', '1', '1', '2023-10-21'),
(2, '231671', 3, '1,2', '8000', '4000', '2', '0', '0');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_assigntrainer`
--

INSERT INTO `tbl_assigntrainer` (`assign_id`, `trainer_id`, `student_id`, `assign_status`) VALUES
(1, 2, 1, ''),
(2, 2, 1, ''),
(3, 2, 1, ''),
(4, 2, 3, ''),
(5, 2, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batches`
--

CREATE TABLE `tbl_batches` (
  `batch_id` int(11) NOT NULL auto_increment,
  `batch_name` varchar(20) NOT NULL,
  `batch_starttime` varchar(20) NOT NULL,
  `batch_endtime` varchar(20) NOT NULL,
  `batch_day` varchar(20) NOT NULL,
  `assign_id` int(11) NOT NULL,
  PRIMARY KEY  (`batch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_batches`
--

INSERT INTO `tbl_batches` (`batch_id`, `batch_name`, `batch_starttime`, `batch_endtime`, `batch_day`, `assign_id`) VALUES
(1, 'Eveng Batch', '5:00', '8:00', 'Monday', 1),
(2, 'Eveng Batch', '5:00', '8:00', 'Monday', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL auto_increment,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Classical '),
(2, 'Western');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL auto_increment,
  `complaint_content` varchar(100) NOT NULL,
  `complaint_date` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `complaint_reply` varchar(100) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  PRIMARY KEY  (`complaint_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_content`, `complaint_date`, `student_id`, `complaint_reply`, `trainer_id`) VALUES
(1, 'yhg', '2023-10-21', 1, '', 0),
(2, 'huhhh\r\n', '2023-10-30', 0, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complainttype`
--

CREATE TABLE `tbl_complainttype` (
  `complainttype_id` int(11) NOT NULL auto_increment,
  `complainttype_name` varchar(500) NOT NULL,
  PRIMARY KEY  (`complainttype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_complainttype`
--

INSERT INTO `tbl_complainttype` (`complainttype_id`, `complainttype_name`) VALUES
(3, 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL auto_increment,
  `feedback_date` varchar(100) NOT NULL,
  `feedback_content` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  PRIMARY KEY  (`feedback_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_date`, `feedback_content`, `student_id`, `trainer_id`) VALUES
(1, '2023-10-21', 'tgu', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL auto_increment,
  `user_name` varchar(500) NOT NULL,
  `user_rating` varchar(500) NOT NULL,
  `user_review` varchar(5000) NOT NULL,
  `review_datetime` varchar(5000) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  PRIMARY KEY  (`review_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `user_name`, `user_rating`, `user_review`, `review_datetime`, `trainer_id`) VALUES
(1, 'Hello', '2', 'wdefrg', '2023-10-29 12:29:57', 2),
(2, 'Hello', '4', 'wdefrg', '2023-10-29 12:30:09', 2),
(3, 'Hello', '1', 'wrost\n', '2023-10-29 12:30:47', 2),
(4, 'Hello', '1', 'wrost\n', '2023-10-29 12:30:55', 2),
(5, 'Hello', '1', 'bad\n', '2023-10-29 12:31:06', 2),
(6, 'Hello', '1', 'bad\n', '2023-10-29 12:31:12', 2),
(7, 'Hello', '1', 'bad\n', '2023-10-29 12:31:15', 2),
(8, 'Hello', '1', 'bad\n', '2023-10-29 12:31:20', 2),
(9, 'Hello', '1', 'bad\n', '2023-10-29 12:31:24', 2),
(10, 'Hello', '1', 'bad\n', '2023-10-29 12:31:39', 2),
(11, 'Hello', '1', 'bad\n', '2023-10-29 12:31:45', 2),
(12, 'Hello', '1', 'bad\n', '2023-10-29 12:31:50', 2),
(13, 'Hello', '1', 'bad\n', '2023-10-29 12:31:54', 2),
(14, 'Hello', '1', 'bad\n', '2023-10-29 12:31:58', 2),
(15, 'Hello', '1', 'bad\n', '2023-10-29 12:32:04', 2),
(16, 'Hello', '3', 'dgjh', '2023-10-30 12:52:06', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_studentregistration`
--

INSERT INTO `tbl_studentregistration` (`student_id`, `student_name`, `student_contact`, `student_email`, `student_password`, `student_photo`) VALUES
(1, 'Anu S', '9584452136', 'anus@gmail.com', 'anu123', 'user1.jpg'),
(3, 'Anjali V', '9875632475', 'anjaliv@gmail.com', 'anjali123', 'user1.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `subcategory_name`, `category_id`, `subcategory_rate`) VALUES
(1, 'Kuchippudi', 1, 'Rs.10000'),
(2, 'Mohiniyattam', 1, 'Rs.10000'),
(3, 'Bharatanatyam', 1, 'Rs.8000'),
(4, 'Kathak', 1, 'Rs.10000'),
(5, 'Ballet', 2, 'Rs.10000'),
(6, 'Break', 2, 'Rs.10000'),
(7, 'Hip Hop', 2, 'Rs.10000');

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
  `student_id` int(11) NOT NULL,
  PRIMARY KEY  (`trainer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_trainer`
--

INSERT INTO `tbl_trainer` (`trainer_id`, `trainer_name`, `trainer_contact`, `trainer_email`, `trainer_photo`, `trainer_certificate`, `trainer_video`, `trainer_password`, `subcategory_id`, `student_id`) VALUES
(2, 'Elena Diaz', '9988776003', 'elenad@gmail.com', '', 'break.webp', 'breakt.jpg', 'elena123', '6', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`video_id`, `video_details`, `trainer_id`, `subcategory_id`, `video_file`) VALUES
(1, 'Top rocks are used as an introduction to a breakdancing routine. You would start off your routine by engaging in some top rocks before moving on to more advanced moves. Footwork involves moving with the lower half of your body. This involves using your feet, legs, and hips to dance.', 2, '6', 'videoplayback.mp4');
