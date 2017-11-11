-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 28, 2016 at 06:37 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `feedback`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `year` int(11) DEFAULT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `sec_id` int(11) DEFAULT NULL,
  `comment` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`year`, `sub_id`, `sec_id`, `comment`) VALUES
(5, 1, 2, 'kjjkh5'),
(5, 2, 2, 'mv5'),
(5, 3, 2, 'jf5'),
(5, 4, 2, 'uru5');

-- --------------------------------------------------------

--
-- Table structure for table `comments_lab`
--

CREATE TABLE IF NOT EXISTS `comments_lab` (
  `year` int(11) DEFAULT NULL,
  `lab_id` int(11) DEFAULT NULL,
  `sec_id` int(11) DEFAULT NULL,
  `comment` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments_lab`
--

INSERT INTO `comments_lab` (`year`, `lab_id`, `sec_id`, `comment`) VALUES
(5, 1, 2, '5'),
(5, 2, 2, '5');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_data_1`
--

CREATE TABLE IF NOT EXISTS `feedback_data_1` (
  `question` varchar(300) NOT NULL DEFAULT '',
  `sub_id` int(11) NOT NULL DEFAULT '0',
  `sec_id` int(11) NOT NULL DEFAULT '0',
  `a` int(11) NOT NULL DEFAULT '0',
  `b` int(11) NOT NULL DEFAULT '0',
  `c` int(11) NOT NULL DEFAULT '0',
  `d` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`question`,`sub_id`,`sec_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_data_1`
--


-- --------------------------------------------------------

--
-- Table structure for table `feedback_data_2`
--

CREATE TABLE IF NOT EXISTS `feedback_data_2` (
  `question` varchar(300) DEFAULT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `sec_id` int(11) DEFAULT NULL,
  `a` int(11) NOT NULL DEFAULT '0',
  `b` int(11) NOT NULL DEFAULT '0',
  `c` int(11) NOT NULL DEFAULT '0',
  `d` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_data_2`
--


-- --------------------------------------------------------

--
-- Table structure for table `feedback_data_3`
--

CREATE TABLE IF NOT EXISTS `feedback_data_3` (
  `question` varchar(300) DEFAULT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `sec_id` int(11) DEFAULT NULL,
  `a` int(11) NOT NULL DEFAULT '0',
  `b` int(11) NOT NULL DEFAULT '0',
  `c` int(11) NOT NULL DEFAULT '0',
  `d` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_data_3`
--


-- --------------------------------------------------------

--
-- Table structure for table `feedback_data_4`
--

CREATE TABLE IF NOT EXISTS `feedback_data_4` (
  `question` varchar(300) DEFAULT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `sec_id` int(11) DEFAULT NULL,
  `a` int(11) NOT NULL DEFAULT '0',
  `b` int(11) NOT NULL DEFAULT '0',
  `c` int(11) NOT NULL DEFAULT '0',
  `d` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_data_4`
--


-- --------------------------------------------------------

--
-- Table structure for table `feedback_data_lab_1`
--

CREATE TABLE IF NOT EXISTS `feedback_data_lab_1` (
  `question` varchar(300) NOT NULL DEFAULT '',
  `lab_id` int(11) NOT NULL DEFAULT '0',
  `sec_id` int(11) NOT NULL DEFAULT '0',
  `a` int(11) NOT NULL DEFAULT '0',
  `b` int(11) NOT NULL DEFAULT '0',
  `c` int(11) NOT NULL DEFAULT '0',
  `d` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`question`,`lab_id`,`sec_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_data_lab_1`
--


-- --------------------------------------------------------

--
-- Table structure for table `feedback_data_lab_2`
--

CREATE TABLE IF NOT EXISTS `feedback_data_lab_2` (
  `question` varchar(300) DEFAULT NULL,
  `lab_id` int(11) DEFAULT NULL,
  `sec_id` int(11) DEFAULT NULL,
  `a` int(11) NOT NULL DEFAULT '0',
  `b` int(11) NOT NULL DEFAULT '0',
  `c` int(11) NOT NULL DEFAULT '0',
  `d` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_data_lab_2`
--


-- --------------------------------------------------------

--
-- Table structure for table `feedback_data_lab_3`
--

CREATE TABLE IF NOT EXISTS `feedback_data_lab_3` (
  `question` varchar(300) DEFAULT NULL,
  `lab_id` int(11) DEFAULT NULL,
  `sec_id` int(11) DEFAULT NULL,
  `a` int(11) NOT NULL DEFAULT '0',
  `b` int(11) NOT NULL DEFAULT '0',
  `c` int(11) NOT NULL DEFAULT '0',
  `d` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_data_lab_3`
--


-- --------------------------------------------------------

--
-- Table structure for table `feedback_data_lab_4`
--

CREATE TABLE IF NOT EXISTS `feedback_data_lab_4` (
  `question` varchar(300) DEFAULT NULL,
  `lab_id` int(11) DEFAULT NULL,
  `sec_id` int(11) DEFAULT NULL,
  `a` int(11) NOT NULL DEFAULT '0',
  `b` int(11) NOT NULL DEFAULT '0',
  `c` int(11) NOT NULL DEFAULT '0',
  `d` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_data_lab_4`
--


-- --------------------------------------------------------

--
-- Table structure for table `feedback_details`
--

CREATE TABLE IF NOT EXISTS `feedback_details` (
  `year` int(1) DEFAULT NULL,
  `sec` int(1) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `stu_count` int(11) DEFAULT NULL,
  `stu_count_l` int(11) DEFAULT NULL,
  `sem` int(11) DEFAULT NULL,
  `dept` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_details`
--

INSERT INTO `feedback_details` (`year`, `sec`, `date`, `stu_count`, `stu_count_l`, `sem`, `dept`) VALUES
(5, 2, '31-10-15', 4, 4, 1, 'Computer Science Engineering'),
(4, 2, '01-11-15', 4, 4, 1, 'Computer Science Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `fix_1_1`
--

CREATE TABLE IF NOT EXISTS `fix_1_1` (
  `id` int(11) NOT NULL,
  `fac_name` varchar(30) DEFAULT NULL,
  `sub_name` varchar(30) DEFAULT NULL,
  `lab_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fix_1_1`
--


-- --------------------------------------------------------

--
-- Table structure for table `fix_1_2`
--

CREATE TABLE IF NOT EXISTS `fix_1_2` (
  `id` int(11) NOT NULL,
  `fac_name` varchar(30) DEFAULT NULL,
  `sub_name` varchar(30) DEFAULT NULL,
  `lab_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fix_1_2`
--


-- --------------------------------------------------------

--
-- Table structure for table `fix_1_3`
--

CREATE TABLE IF NOT EXISTS `fix_1_3` (
  `id` int(11) NOT NULL,
  `fac_name` varchar(30) DEFAULT NULL,
  `sub_name` varchar(30) DEFAULT NULL,
  `lab_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fix_1_3`
--


-- --------------------------------------------------------

--
-- Table structure for table `indi_comments`
--

CREATE TABLE IF NOT EXISTS `indi_comments` (
  `comment` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indi_comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `indi_details`
--

CREATE TABLE IF NOT EXISTS `indi_details` (
  `year` int(1) DEFAULT NULL,
  `sec` int(1) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `type` varchar(1) DEFAULT NULL,
  `sub_lab` varchar(30) DEFAULT NULL,
  `faculty` varchar(30) DEFAULT NULL,
  `dept` varchar(100) DEFAULT NULL,
  `stu_count` int(11) DEFAULT NULL,
  `sem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indi_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `indi_feedback_data`
--

CREATE TABLE IF NOT EXISTS `indi_feedback_data` (
  `id` int(11) NOT NULL DEFAULT '0',
  `question` varchar(100) DEFAULT NULL,
  `no_of_a` int(11) DEFAULT NULL,
  `no_of_b` int(11) DEFAULT NULL,
  `no_of_c` int(11) DEFAULT NULL,
  `no_of_d` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indi_feedback_data`
--


-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE IF NOT EXISTS `login_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `dept` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`id`, `username`, `password`, `dept`) VALUES
(1, 'ravir34', 'ravidb', 'Computer Scence Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `other_comments`
--

CREATE TABLE IF NOT EXISTS `other_comments` (
  `year` int(11) DEFAULT NULL,
  `sec` int(11) DEFAULT NULL,
  `comment` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `question_bank`
--

CREATE TABLE IF NOT EXISTS `question_bank` (
  `question` varchar(1000) DEFAULT NULL,
  `indi` varchar(1) DEFAULT NULL,
  `overall` varchar(1) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `option1` varchar(60) DEFAULT NULL,
  `option2` varchar(60) DEFAULT NULL,
  `option3` varchar(60) DEFAULT NULL,
  `option4` varchar(60) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `question_bank`
--

INSERT INTO `question_bank` (`question`, `indi`, `overall`, `status`, `option1`, `option2`, `option3`, `option4`, `id`) VALUES
('HOW WOULD YOU RATE THE AWARENESS YOU WERE GIVEN ABOUT THE COURSE OBJECTIVES AND COURSE OUTCOMES AS DEFINED FOR THE COURSE?', 'y', 'y', 'For Subjects', 'EXCELLENT', 'GOOD', 'SATISFACTORY', 'POOR', 1),
('HOW WOULD YOU RATE THE COURSE ORIENTATION GIVEN PRIOR TO THE BEGINNING OF THE COURSE?', 'y', 'y', 'For Subjects', 'GOOD', 'SATISFACTORY', 'POOR', 'NO ORIENTATION IS GIVEN', 2),
('HOW WOULD YOU RATE THE RELEVANCE AND COVERAGE OF PRE-REQUISITES OF THE COURSE?', 'y', 'y', 'For Subjects', 'HIGHLY RELEVANT', 'SUFFICIENTLY RELEVANT', 'INSUFFICIENT', 'NOT AT ALL', 3),
('HOW WOULD YOU RATE THE COMPATIBILITY OF LESSON PLAN TO COURSE DELIVERY?', 'y', 'y', 'For Subjects', 'EXCELLENT', 'GOOD', 'SATISFACTORY', 'POOR', 4),
('DO LECTURES START ON SCHEDULED TIME FOR THIS COURSE NORMALLY OR IS THERE ALWAYS SIGNIFICANT DEVIATION?', 'y', 'y', 'For Subjects', 'NEVER', 'RARELY', 'OFTEN', 'VERY OFTEN', 5),
('HOW WOULD YOU RATE THE QUALITY OF ASSIGNMENTS GIVEN DURING THE COURSE IN TERMS OF THEIR RELEVANCE TO THE LEARNING OBJECTIVES OF THE COURSE AND EXAMINATION?', 'y', 'y', 'For Subjects', 'EXCELLENT', 'GOOD', 'SATISFACTORY', 'POOR', 6),
('HOW WOULD YOU RATE THE ADEQUACY OF TUTORIAL SESSIONS BEING CONDUCTED ?', 'y', 'y', 'For Subjects', 'AMPLY', 'SUFFICIENT ', 'NOT SUFFICIENT', 'NEVER HAPPENED', 7),
('HOW WOULD YOU RATE THE OVERALL ENVIRONMENT IN THE CLASSES FOR THIS COURSE IN TERMS OF THEIR AMENABILITY TO LEARNING?', 'y', 'y', 'For Subjects', 'EXCELLENT', 'GOOD', 'SATISFACTORY', 'POOR', 8),
('HOW WOULD YOU RATE THE LEVEL OF INTERACTION IN THE CLASS IN TERMS OF QUESTIONS & ANSWERS?', 'n', 'y', 'For Subjects', 'EXCELLENT', 'GOOD', 'SATISFACTORY', 'POOR', 9),
('HOW DO YOU FIND THE COURSE INSTRUCTOR’S  ATTITUDE IN TOWARDS STUDENTS?', 'n', 'y', 'For Subjects', 'SYMPATHETIC AND HELPFUL', 'USUALLY SYMPATHETIC', 'AVOIDING PERSONAL CONTACT', 'HUMILIATING', 10),
('HOW DO YOU RATE YOUR COURSE INSTRUCTOR''S TOLERANCE TO DISAGREEMENT?', 'n', 'y', 'For Subjects', 'ENCOURAGE AND VALUES DISAGREEMENT', 'ACCEPTS DISAGREEMENT', 'ACCEPTS DISAGREEMENT FAIRLY WELL', 'INTOLERANT TO DISAGREEMENT', 11),
('HOW DO YOU RATE ACCESSIBILITY / AVAILABILITY OF  YOUR COURSE INSTRUCTOR FOR INFORMAL CONTACT ?', 'n', 'y', 'For Subjects', 'ALWAYS AVAILABLE', 'GOOD NUMBER OF TIMES AVAILABLE', 'NORMALLY AVAILABLE', 'NEVER AVAILABLE', 12),
('HOW DO YOU RATE THE COMPETENCY OF THE COURSE INSTRUCTOR ON THE SUBJECT?', 'n', 'y', 'For Subjects', 'EXPERT IN THE SUBJECT', 'VERY GOOD AT THE SUBJECT', 'GOOD AT THE SUBJECT', 'REQUIRES IMPROVEMENTS', 13),
('HOW WOULD YOU RATE THE USEFULNESS OF CASE STUDIES / ILLUSTRATIONS / EXAMPLES WORKED OUT IN THE CLASS ?', 'n', 'y', 'For Subjects', 'VERY USEFUL', 'SUFFICIENT', 'INSUFFICIENT', 'NOT AT ALL', 14),
('HOW IS THE AUDIBILITY AND CLARITY OF THE LECTURE?', 'n', 'y', 'For Subjects', 'AUDIBLE AND VERY CLEAR', 'SUFFICIENTLY LOUD AND CLEAR', 'AUDIBLE BUT NOT CLEAR', 'NOT AUDIBLE', 15),
('HOW WOULD YOU RATE THE USAGE OF INFORMATION  AND COMMUNICATION TOOLS(ICT) SUCH AS OHP, PPTS, MODELS ETC… IN THE CLASS ROOM?', 'n', 'y', 'For Subjects', 'AMPLY', 'OCCASIONALLY', 'RARELY', 'NEVER', 16),
('HOW WOULD YOU RATE THE ASSESSMENT OF THE INTERNAL TESTS ?', 'n', 'y', 'For Subjects', 'FAIR AND IMPARTIAL', 'USUALLY FAIR', 'RARELY FAIR', 'ALWAYS UNFAIR', 17),
('HOW DO YOU RATE YOUR COURSE INSTRUCTOR(OVERALL RATING)?', 'n', 'y', 'For Subjects', 'VERY GOOD', 'GOOD', 'SATISFACTORY', 'POOR', 18);

-- --------------------------------------------------------

--
-- Table structure for table `section_details_1_1`
--

CREATE TABLE IF NOT EXISTS `section_details_1_1` (
  `id` int(11) NOT NULL,
  `fac_name` varchar(30) DEFAULT NULL,
  `sub_name` varchar(30) DEFAULT NULL,
  `lab_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section_details_1_1`
--


-- --------------------------------------------------------

--
-- Table structure for table `section_details_1_2`
--

CREATE TABLE IF NOT EXISTS `section_details_1_2` (
  `id` int(11) NOT NULL,
  `fac_name` varchar(30) DEFAULT NULL,
  `sub_name` varchar(30) DEFAULT NULL,
  `lab_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section_details_1_2`
--


-- --------------------------------------------------------

--
-- Table structure for table `section_details_1_3`
--

CREATE TABLE IF NOT EXISTS `section_details_1_3` (
  `id` int(11) NOT NULL,
  `fac_name` varchar(30) DEFAULT NULL,
  `sub_name` varchar(30) DEFAULT NULL,
  `lab_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section_details_1_3`
--


-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE IF NOT EXISTS `temp` (
  `year` int(11) DEFAULT NULL,
  `section` int(11) DEFAULT NULL,
  `feed` int(1) DEFAULT NULL,
  `fl` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`year`, `section`, `feed`, `fl`) VALUES
(1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `year_structure`
--

CREATE TABLE IF NOT EXISTS `year_structure` (
  `year_no` int(11) DEFAULT NULL,
  `regulation` varchar(5) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `no_of_sec` int(11) DEFAULT NULL,
  `no_of_sub` int(11) DEFAULT NULL,
  `no_of_labs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year_structure`
--

INSERT INTO `year_structure` (`year_no`, `regulation`, `semester`, `no_of_sec`, `no_of_sub`, `no_of_labs`) VALUES
(1, 'R13', 2, 3, 3, 3),
(2, '-NA-', 1, 0, 0, 0),
(3, '-NA-', 1, 0, 0, 0),
(4, '-NA-', 1, 0, 0, 0);
