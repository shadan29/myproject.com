-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2023 at 02:48 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bsbio`
--

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE IF NOT EXISTS `school_year` (
  `sy_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_year` varchar(256) NOT NULL,
  `semester` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL,
  PRIMARY KEY (`sy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`sy_id`, `school_year`, `semester`, `status`) VALUES
(14, '2022-2023', '1st Semester', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_encoding`
--

CREATE TABLE IF NOT EXISTS `tbl_encoding` (
  `encoding_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(256) NOT NULL,
  `subject_id` varchar(256) NOT NULL,
  `semester` varchar(256) NOT NULL,
  `course` varchar(256) NOT NULL,
  `school_year` varchar(256) NOT NULL,
  `grade_id` varchar(256) NOT NULL,
  `year_level` varchar(256) NOT NULL,
  `date_enrolled` varchar(256) NOT NULL,
  PRIMARY KEY (`encoding_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `tbl_encoding`
--

INSERT INTO `tbl_encoding` (`encoding_id`, `student_id`, `subject_id`, `semester`, `course`, `school_year`, `grade_id`, `year_level`, `date_enrolled`) VALUES
(45, '51', '', '1st Semester', 'BS INFORMATION TECHNOLOGY', '2022-2023', '', '1st Year', 'March 11, 2023, 10:00 AM'),
(46, '52', '', '1st Semester', 'BS INFORMATION TECHNOLOGY', '2022-2023', '', '1st Year', 'March 14, 2023, 07:22 AM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enrolled`
--

CREATE TABLE IF NOT EXISTS `tbl_enrolled` (
  `enroll_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(256) NOT NULL,
  `subject_id` varchar(256) NOT NULL,
  `grade_id` varchar(256) NOT NULL,
  `school_year_id` varchar(256) NOT NULL,
  `teacher_id` varchar(256) NOT NULL,
  PRIMARY KEY (`enroll_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=147 ;

--
-- Dumping data for table `tbl_enrolled`
--

INSERT INTO `tbl_enrolled` (`enroll_id`, `student_id`, `subject_id`, `grade_id`, `school_year_id`, `teacher_id`) VALUES
(131, '51', '24', '22', '14', '9'),
(132, '51', '25', '22', '14', '9'),
(133, '51', '26', '22', '14', '9'),
(138, '52', '22', '', '14', ''),
(139, '52', '24', '', '14', ''),
(140, '52', '25', '', '14', ''),
(142, '52', '27', '', '14', ''),
(143, '52', '28', '', '14', ''),
(144, '52', '29', '', '14', ''),
(145, '52', '30', '', '14', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

CREATE TABLE IF NOT EXISTS `tbl_faculty` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` varchar(256) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `middle_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `employee_number` varchar(256) NOT NULL,
  `gender` varchar(256) NOT NULL,
  `contact` varchar(256) NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`teacher_id`, `subject_id`, `first_name`, `middle_name`, `last_name`, `employee_number`, `gender`, `contact`) VALUES
(9, '', 'Nur-ain', 'Jumawid', 'Ibno', '1129', 'Male', '09057930667');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grade`
--

CREATE TABLE IF NOT EXISTS `tbl_grade` (
  `grade_id` int(11) NOT NULL AUTO_INCREMENT,
  `grade` varchar(256) NOT NULL,
  PRIMARY KEY (`grade_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `tbl_grade`
--

INSERT INTO `tbl_grade` (`grade_id`, `grade`) VALUES
(6, '1.00'),
(7, '1.25'),
(8, '1.50'),
(9, '1.75'),
(10, '2.00'),
(19, '2.25'),
(20, '2.50'),
(21, '2.75'),
(22, '3.00'),
(27, '4.00'),
(28, 'INC'),
(29, 'DRP');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE IF NOT EXISTS `tbl_student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(256) NOT NULL,
  `middle_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `student_no` varchar(250) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `semester` varchar(256) NOT NULL,
  `school_year` varchar(256) NOT NULL,
  `major` varchar(256) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `first_name`, `middle_name`, `last_name`, `student_no`, `gender`, `course`, `semester`, `school_year`, `major`) VALUES
(51, 'Alsadan', 'Kalbi', 'Hasiron', '2019000112', 'Male', 'BS INFORMATION TECHNOLOGY', '1st Semester', '2022-2023', 'Programmer'),
(52, 'shadan', 'kalbi', 'Ala', '11111', 'Male', 'BS INFORMATION TECHNOLOGY', '1st Semester', '2022-2023', 'programmer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE IF NOT EXISTS `tbl_subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_code` varchar(256) NOT NULL,
  `descriptive_title` varchar(256) NOT NULL,
  `course` varchar(256) NOT NULL,
  `lec_unit` varchar(256) NOT NULL,
  `lab_unit` varchar(256) NOT NULL,
  `semester` varchar(256) NOT NULL,
  `year_level` varchar(256) NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `course_code`, `descriptive_title`, `course`, `lec_unit`, `lab_unit`, `semester`, `year_level`) VALUES
(22, 'IT 101', 'Programming 1', 'BS INFORMATION TECHNOLOGY', '3', '3', '1st Semester', '1st Year'),
(24, 'IT 102', 'Programming 2', 'BS INFORMATION TECHNOLOGY', '3', '3', '1st Semester', '1st Year'),
(25, 'IT 103', 'Programming 3', 'BS INFORMATION TECHNOLOGY', '3', '3', '1st Semester', '1st Year'),
(26, 'IT 104', 'Progamming 4', 'BS INFORMATION TECHNOLOGY', '3', '3', '1st Semester', '1st Year'),
(27, 'IT 105', 'Programming 5', 'BS INFORMATION TECHNOLOGY', '3', '3', '1st Semester', '1st Year'),
(28, 'IT 106', 'Progamming 6', 'BS INFORMATION TECHNOLOGY', '3', '3', '1st Semester', '1st Year'),
(29, 'IT 107', 'Programming 7', 'BS INFORMATION TECHNOLOGY', '3', '3', '1st Semester', '1st Year'),
(30, 'IT 108', 'Programming 8', 'BS INFORMATION TECHNOLOGY', '3', '3', '1st Semester', '1st Year'),
(31, 'IT 101', 'Programming 1', 'BS INFORMATION TECHNOLOGY', '3', '3', '2nd Semester', '1st Year'),
(32, 'IT 102', 'Programming 2', 'BS INFORMATION TECHNOLOGY', '3', '3', '2nd Semester', '1st Year'),
(33, 'IT 103', 'Programming 3', 'BS INFORMATION TECHNOLOGY', '3', '3', '2nd Semester', '1st Year'),
(35, 'IT 101', 'Programming', 'BS INFORMATION TECHNOLOGY', '3', '3', '1st Semester', '2nd Year'),
(36, 'CS 101', 'INTRO', 'BS COMPUTER SCIENCE', '3', '2', '1st Semester', '1st Year'),
(37, 'CS 220', 'COMPUTER', 'BS COMPUTER SCIENCE', '2', '2', '1st Semester', '1st Year');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `employeeID` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `confirm_pass` varchar(256) NOT NULL,
  `picture` varchar(256) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `employeeID`, `name`, `user_name`, `password`, `confirm_pass`, `picture`) VALUES
(12, '11', 'administrator', 'admin@gmail.com', 'admin', 'admin', 'uploads/640be023750a54.73498155.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
