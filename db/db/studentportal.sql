-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2017 at 06:37 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `studentportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `instructor_archive`
--

CREATE TABLE IF NOT EXISTS `instructor_archive` (
`facultyid` int(11) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20004 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor_archive`
--

INSERT INTO `instructor_archive` (`facultyid`, `lname`, `fname`, `mname`, `address`, `contact`, `username`, `password`) VALUES
(20001, 'Santos', 'Chiezle', 'Donna', 'Candaba,Pampanga', '09366706558', 'chin', 'chin'),
(20002, 'Montero', 'Jhomar', 'Caraig', 'Sampaguita St, San Jose, Baliwag, Bulacan', '09069204164', 'hodor', 'hodor'),
(20003, 'Castro', 'Maureen', 'Sulit', 'San Ildefonso, Bulacan', '09366706558', 'Maureen171019', 'Maureen171019');

-- --------------------------------------------------------

--
-- Table structure for table `loginattempts`
--

CREATE TABLE IF NOT EXISTS `loginattempts` (
  `ip` varchar(20) NOT NULL,
  `attemps` varchar(20) NOT NULL,
  `lastlogin` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_archive`
--

CREATE TABLE IF NOT EXISTS `student_archive` (
  `lname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `age` int(10) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `strand` varchar(50) NOT NULL,
  `ay` varchar(45) DEFAULT NULL,
  `year_level` int(11) NOT NULL,
  `semester` varchar(45) DEFAULT NULL,
  `section` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
`studentid` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=170120004 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_archive`
--

INSERT INTO `student_archive` (`lname`, `fname`, `mname`, `age`, `gender`, `strand`, `ay`, `year_level`, `semester`, `section`, `address`, `contact`, `username`, `password`, `studentid`) VALUES
('Alba', 'Vernice', 'F', 19, 'Female', 'ABM', '2017-2018', 11, '1st', '1', 'San Ildefonso, Bulacan', '09366706558', 'Vernice171019', 'irma', 170120000),
('Angeles', 'Joaquin', 'M', 19, 'Male', 'ABM', '2017-2018', 11, '1st', '1', 'San Ildefonso, Bulacan', '09366706558', 'hodor', 'irma', 170120001),
('Ricarte', 'Escarilla', 'T', 19, 'Male', 'ABM', '2017-2018', 11, '1st', '1', 'San Ildefonso, Bulacan', '09366706558', 'Escarilla171020', 'Escarilla171020', 170120002),
('Punzalan', 'Irma', 'C', 19, 'Female', 'HUMMS', '2015-2016', 11, '1st', '1', 'dfsa', '0923456', 'Irma211020', 'Irma211020', 170120003);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE IF NOT EXISTS `tbladmin` (
`id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblconfiguration`
--

CREATE TABLE IF NOT EXISTS `tblconfiguration` (
`id` int(11) NOT NULL,
  `config_name` varchar(50) NOT NULL,
  `config_value` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblconfiguration`
--

INSERT INTO `tblconfiguration` (`id`, `config_name`, `config_value`) VALUES
(1, 'evaluation', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `tblevaluation`
--

CREATE TABLE IF NOT EXISTS `tblevaluation` (
  `evaluationid` varchar(45) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `facultyid` int(11) DEFAULT NULL,
  `studentid` int(11) DEFAULT NULL,
  `ay` varchar(45) DEFAULT NULL,
  `semester` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblevaluation`
--

INSERT INTO `tblevaluation` (`evaluationid`, `comment`, `facultyid`, `studentid`, `ay`, `semester`) VALUES
('1701200002000120171018151314', 'irmaganda', 20001, 170120000, '2016-2017', '1st'),
('1701200032000320171019171002', 'asdfghjkl', 20003, 170120003, '2017-2018', '1st');

-- --------------------------------------------------------

--
-- Table structure for table `tblevaluation_details`
--

CREATE TABLE IF NOT EXISTS `tblevaluation_details` (
`id` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `evaluationid` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblevaluation_details`
--

INSERT INTO `tblevaluation_details` (`id`, `answer`, `question_id`, `evaluationid`) VALUES
(1, 4, 1, '1701200002000120171018151314'),
(2, 3, 2, '1701200002000120171018151314'),
(3, 3, 3, '1701200002000120171018151314'),
(4, 3, 4, '1701200002000120171018151314'),
(5, 3, 5, '1701200002000120171018151314'),
(6, 4, 6, '1701200002000120171018151314'),
(7, 4, 7, '1701200002000120171018151314'),
(8, 4, 8, '1701200002000120171018151314'),
(9, 4, 9, '1701200002000120171018151314'),
(10, 4, 10, '1701200002000120171018151314'),
(11, 3, 11, '1701200002000120171018151314'),
(12, 3, 12, '1701200002000120171018151314'),
(13, 3, 13, '1701200002000120171018151314'),
(14, 3, 14, '1701200002000120171018151314'),
(15, 4, 15, '1701200002000120171018151314'),
(16, 4, 16, '1701200002000120171018151314'),
(17, 4, 17, '1701200002000120171018151314'),
(18, 4, 18, '1701200002000120171018151314'),
(19, 4, 19, '1701200002000120171018151314'),
(20, 4, 20, '1701200002000120171018151314'),
(21, 3, 21, '1701200002000120171018151314'),
(22, 3, 22, '1701200002000120171018151314'),
(23, 3, 23, '1701200002000120171018151314'),
(24, 4, 24, '1701200002000120171018151314'),
(25, 4, 25, '1701200002000120171018151314'),
(26, 4, 1, '1701200032000320171019171002'),
(27, 4, 2, '1701200032000320171019171002'),
(28, 4, 3, '1701200032000320171019171002'),
(29, 4, 4, '1701200032000320171019171002'),
(30, 3, 5, '1701200032000320171019171002'),
(31, 3, 6, '1701200032000320171019171002'),
(32, 3, 7, '1701200032000320171019171002'),
(33, 3, 8, '1701200032000320171019171002'),
(34, 3, 9, '1701200032000320171019171002'),
(35, 3, 10, '1701200032000320171019171002'),
(36, 4, 11, '1701200032000320171019171002'),
(37, 4, 12, '1701200032000320171019171002'),
(38, 3, 13, '1701200032000320171019171002'),
(39, 3, 14, '1701200032000320171019171002'),
(40, 3, 15, '1701200032000320171019171002'),
(41, 3, 16, '1701200032000320171019171002'),
(42, 4, 17, '1701200032000320171019171002'),
(43, 4, 18, '1701200032000320171019171002'),
(44, 3, 19, '1701200032000320171019171002'),
(45, 3, 20, '1701200032000320171019171002'),
(46, 3, 21, '1701200032000320171019171002'),
(47, 3, 22, '1701200032000320171019171002'),
(48, 3, 23, '1701200032000320171019171002'),
(49, 3, 24, '1701200032000320171019171002'),
(50, 3, 25, '1701200032000320171019171002');

-- --------------------------------------------------------

--
-- Table structure for table `tblfaculty`
--

CREATE TABLE IF NOT EXISTS `tblfaculty` (
`facultyid` int(11) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20004 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfaculty`
--

INSERT INTO `tblfaculty` (`facultyid`, `lname`, `fname`, `mname`, `address`, `contact`, `username`, `password`) VALUES
(20001, 'Santos', 'Chiezle', 'Donna', 'Candaba,Pampanga', '09366706558', 'chin', 'chin'),
(20002, 'Montero', 'Jhomar', 'Caraig', 'Sampaguita St, San Jose, Baliwag, Bulacan', '09069204164', 'hodor', 'hodor'),
(20003, 'Castro', 'Maureen', 'Sulit', 'San Ildefonso, Bulacan', '09366706558', 'Maureen171019', 'Maureen171019');

-- --------------------------------------------------------

--
-- Table structure for table `tblgrade`
--

CREATE TABLE IF NOT EXISTS `tblgrade` (
  `id` int(10) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `grading_period` varchar(50) NOT NULL,
  `facultyid` int(50) NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `strand` varchar(20) NOT NULL,
  `studentid` int(50) NOT NULL,
  `student` varchar(50) NOT NULL,
  `ww_s1` int(50) NOT NULL,
  `ww_s2` int(10) NOT NULL,
  `ww_total` int(14) NOT NULL,
  `ww_percent` float NOT NULL,
  `mt_1` int(49) NOT NULL,
  `mt_2` int(13) NOT NULL,
  `mt_3` int(14) NOT NULL,
  `mt_4` int(13) NOT NULL,
  `mt_5` int(14) NOT NULL,
  `mt_total` int(14) NOT NULL,
  `mt_percent` float NOT NULL,
  `pt_self` int(30) NOT NULL,
  `pt_tg1` int(14) NOT NULL,
  `pt_peer` int(15) NOT NULL,
  `pt_tg2` int(15) NOT NULL,
  `pt_teacher` int(15) NOT NULL,
  `pt_tg3` int(15) NOT NULL,
  `pt_percent` float NOT NULL,
  `qa_total` float NOT NULL,
  `qa_percent` float NOT NULL,
  `total_raw` double NOT NULL,
  `transmu` int(50) NOT NULL,
  `school_year` varchar(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblgrade`
--

INSERT INTO `tblgrade` (`id`, `semester`, `grading_period`, `facultyid`, `faculty`, `subject`, `section`, `strand`, `studentid`, `student`, `ww_s1`, `ww_s2`, `ww_total`, `ww_percent`, `mt_1`, `mt_2`, `mt_3`, `mt_4`, `mt_5`, `mt_total`, `mt_percent`, `pt_self`, `pt_tg1`, `pt_peer`, `pt_tg2`, `pt_teacher`, `pt_tg3`, `pt_percent`, `qa_total`, `qa_percent`, `total_raw`, `transmu`, `school_year`) VALUES
(1, '1st', '1st Grading', 20001, 'Santos, Chiezle', 'Komunikasyon at Pananaliksik', '1', 'ABM', 170120000, 'ALBA, VERNICE  F.', 30, 45, 75, 18.75, 5, 5, 5, 5, 5, 25, 10, 5, 5, 5, 5, 5, 10, 20, 75, 23.4375, 72.1875, 82, '2017-2018'),
(2, '1st', '1st Grading', 20001, 'Santos, Chiezle', 'Komunikasyon at Pananaliksik', '1', 'ABM', 170120001, 'ANGELES,  JOAQUIN M.', 41, 43, 84, 21, 4, 4, 4, 4, 4, 20, 8, 4, 4, 4, 4, 8, 16, 24, 74, 23.125, 76.125, 85, '2017-2018'),
(1, '1st', '2nd Grading', 20001, 'Santos, Chiezle', 'Komunikasyon at Pananaliksik', '1', 'ABM', 170120000, 'ALBA, VERNICE  F.', 30, 45, 75, 18.75, 5, 5, 5, 5, 5, 25, 10, 5, 5, 5, 5, 5, 10, 20, 75, 23.4375, 72.1875, 82, '2017-2018'),
(2, '1st', '2nd Grading', 20001, 'Santos, Chiezle', 'Komunikasyon at Pananaliksik', '1', 'ABM', 170120001, 'ANGELES,  JOAQUIN M.', 41, 43, 84, 21, 4, 4, 4, 4, 4, 20, 8, 4, 4, 4, 4, 8, 16, 24, 74, 23.125, 76.125, 85, '2017-2018'),
(1, '2nd', '3rd Grading', 20001, 'Santos, Chiezle', 'Komunikasyon at Pananaliksik', '1', 'HUMMS', 170120000, 'ALBA, VERNICE FREUD F.', 45, 45, 90, 22.5, 5, 5, 5, 5, 5, 25, 10, 5, 5, 5, 5, 8, 16, 26, 75, 23.4375, 81.9375, 88, '2017-2018'),
(2, '2nd', '3rd Grading', 20001, 'Santos, Chiezle', 'Komunikasyon at Pananaliksik', '1', 'HUMMS', 170120001, 'ANGELES, GERARD JOAQUIN M.', 43, 43, 86, 21.5, 4, 4, 4, 4, 4, 20, 8, 4, 4, 4, 4, 7, 14, 22, 74, 23.125, 74.625, 84, '2017-2018'),
(3, '2nd', '3rd Grading', 20001, 'Santos, Chiezle', 'Komunikasyon at Pananaliksik', '1', 'HUMMS', 170120002, 'AQUINO, PAMELA LOUISE N.', 43, 43, 86, 21.5, 8, 9, 9, 8, 9, 43, 17.2, 3, 3, 3, 3, 6, 12, 18, 73, 22.8125, 79.5125, 87, '2017-2018'),
(4, '2nd', '3rd Grading', 20001, 'Santos, Chiezle', 'Komunikasyon at Pananaliksik', '1', 'HUMMS', 170120003, 'AQUINO,JOYMEE', 45, 45, 90, 22.5, 4, 8, 4, 9, 5, 30, 12, 4, 4, 4, 4, 5, 10, 18, 76, 23.75, 76.25, 85, '2017-2018'),
(5, '2nd', '3rd Grading', 20001, 'Santos, Chiezle', 'Komunikasyon at Pananaliksik', '1', 'HUMMS', 170120004, 'BALAJADIA, COLE SAMUEL DV.', 41, 41, 82, 20.5, 7, 6, 8, 8, 6, 35, 14, 4, 4, 3, 3, 5, 10, 17, 70, 21.875, 73.375, 83, '2017-2018'),
(6, '2nd', '3rd Grading', 20001, 'Santos, Chiezle', 'Komunikasyon at Pananaliksik', '1', 'HUMMS', 170120005, 'DAYAO,JOLINA', 40, 40, 80, 20, 4, 3, 4, 3, 4, 18, 7.2, 3, 3, 3, 3, 9, 18, 24, 50, 15.625, 66.825, 79, '2017-2018'),
(7, '2nd', '3rd Grading', 20001, 'Santos, Chiezle', 'Komunikasyon at Pananaliksik', '1', 'HUMMS', 170120006, 'PUNZALAN, JOHN CEDRIC M.', 39, 41, 80, 20, 7, 9, 5, 6, 7, 34, 13.6, 3, 3, 4, 4, 10, 20, 27, 50, 15.625, 76.225, 85, '2017-2018'),
(8, '2nd', '3rd Grading', 20001, 'Santos, Chiezle', 'Komunikasyon at Pananaliksik', '1', 'HUMMS', 170120007, 'PUNZALAN,IRMA', 39, 39, 78, 19.5, 3, 3, 3, 3, 3, 15, 6, 4, 4, 4, 4, 7, 14, 22, 70, 21.875, 69.375, 80, '2017-2018'),
(9, '2nd', '3rd Grading', 20001, 'Santos, Chiezle', 'Komunikasyon at Pananaliksik', '1', 'HUMMS', 170120008, 'TUAZON, JONI ROSE D.', 30, 30, 60, 15, 4, 3, 4, 3, 4, 18, 7.2, 3, 3, 3, 3, 8, 16, 22, 76, 23.75, 67.95, 79, '2017-2018'),
(10, '2nd', '3rd Grading', 20001, 'Santos, Chiezle', 'Komunikasyon at Pananaliksik', '1', 'HUMMS', 170120009, 'ZERRUDO, KRISTIAN H.', 50, 49, 99, 24.75, 4, 4, 4, 4, 4, 20, 8, 4, 4, 4, 4, 9, 18, 26, 77, 24.0625, 82.8125, 89, '2017-2018'),
(1, '1st', '1st Grading', 20002, 'Montero, Jhomar', 'CSS', '1', 'ICT', 170120000, 'ALBA, VERNICE  F.', 30, 45, 75, 18.75, 5, 5, 5, 5, 5, 25, 10, 5, 5, 5, 5, 5, 10, 20, 75, 23.4375, 72.1875, 82, '2017-2018'),
(2, '1st', '1st Grading', 20002, 'Montero, Jhomar', 'CSS', '1', 'ICT', 170120001, 'ANGELES,  JOAQUIN M.', 41, 43, 84, 21, 4, 4, 4, 4, 4, 20, 8, 4, 4, 4, 4, 8, 16, 24, 74, 23.125, 76.125, 85, '2017-2018'),
(3, '1st', '1st Grading', 20002, 'Montero, Jhomar', 'CSS', '1', 'ICT', 170120002, 'AQUINO, PAMELA LOUISE N.', 40, 43, 83, 20.75, 8, 9, 9, 8, 9, 43, 17.2, 3, 3, 3, 3, 5, 10, 16, 73, 22.8125, 76.7625, 85, '2017-2018'),
(4, '1st', '1st Grading', 20002, 'Montero, Jhomar', 'CSS', '1', 'ICT', 170120003, 'AQUINO,JOYMEE', 39, 45, 84, 21, 4, 8, 4, 9, 5, 30, 12, 4, 4, 4, 4, 4, 8, 16, 76, 23.75, 72.75, 82, '2017-2018'),
(5, '1st', '1st Grading', 20002, 'Montero, Jhomar', 'CSS', '1', 'ICT', 170120004, 'BALAJADIA, SAMUEL DV.', 41, 41, 82, 20.5, 7, 6, 8, 8, 6, 35, 14, 4, 4, 3, 3, 5, 10, 17, 70, 21.875, 73.375, 83, '2017-2018'),
(6, '1st', '1st Grading', 20002, 'Montero, Jhomar', 'CSS', '1', 'ICT', 170120005, 'DAYAO,JOLINA', 40, 40, 80, 20, 4, 3, 4, 3, 4, 18, 7.2, 3, 3, 3, 3, 9, 18, 24, 50, 15.625, 66.825, 79, '2017-2018'),
(7, '1st', '1st Grading', 20002, 'Montero, Jhomar', 'CSS', '1', 'ICT', 170120006, 'PUNZALAN, JOHN CEDRIC M.', 44, 41, 85, 21.25, 7, 9, 5, 6, 7, 34, 13.6, 3, 3, 4, 4, 10, 20, 27, 50, 15.625, 77.475, 85, '2017-2018'),
(8, '1st', '1st Grading', 20002, 'Montero, Jhomar', 'CSS', '1', 'ICT', 170120007, 'PUNZALAN,IRMA', 38, 39, 77, 19.25, 3, 3, 3, 3, 3, 15, 6, 4, 4, 4, 4, 7, 14, 22, 70, 21.875, 69.125, 80, '2017-2018'),
(9, '1st', '1st Grading', 20002, 'Montero, Jhomar', 'CSS', '1', 'ICT', 170120008, 'TUAZON, JONI ROSE D.', 30, 30, 60, 15, 4, 3, 4, 3, 4, 18, 7.2, 3, 3, 3, 3, 8, 16, 22, 76, 23.75, 67.95, 79, '2017-2018'),
(10, '1st', '1st Grading', 20002, 'Montero, Jhomar', 'CSS', '1', 'ICT', 170120009, 'ZERRUDO, KRISTIAN H.', 47, 49, 96, 24, 4, 4, 4, 4, 4, 20, 8, 4, 4, 4, 4, 9, 18, 26, 77, 24.0625, 82.0625, 88, '2017-2018'),
(1, '1st', '1st Grading', 20001, 'Santos, Chiezle', 'Komunikasyon at Pananaliksik', '1', 'HUMMS', 170120000, 'ALBA, VERNICE  F.', 30, 45, 75, 18.75, 5, 5, 5, 5, 5, 25, 10, 5, 5, 5, 5, 5, 10, 20, 75, 23.4375, 72.1875, 82, '2014-2015'),
(2, '1st', '1st Grading', 20001, 'Santos, Chiezle', 'Komunikasyon at Pananaliksik', '1', 'HUMMS', 170120001, 'ANGELES,  JOAQUIN M.', 41, 43, 84, 21, 4, 4, 4, 4, 4, 20, 8, 4, 4, 4, 4, 8, 16, 24, 74, 23.125, 76.125, 85, '2014-2015'),
(3, '1st', '1st Grading', 20001, 'Santos, Chiezle', 'Komunikasyon at Pananaliksik', '1', 'HUMMS', 170120002, 'AQUINO, PAMELA LOUISE N.', 40, 43, 83, 20.75, 8, 9, 9, 8, 9, 43, 17.2, 3, 3, 3, 3, 5, 10, 16, 73, 22.8125, 76.7625, 85, '2014-2015'),
(4, '1st', '1st Grading', 20001, 'Santos, Chiezle', 'Komunikasyon at Pananaliksik', '1', 'HUMMS', 170120003, 'AQUINO,JOYMEE', 39, 45, 84, 21, 4, 8, 4, 9, 5, 30, 12, 4, 4, 4, 4, 4, 8, 16, 76, 23.75, 72.75, 82, '2014-2015'),
(5, '1st', '1st Grading', 20001, 'Santos, Chiezle', 'Komunikasyon at Pananaliksik', '1', 'HUMMS', 170120004, 'BALAJADIA, SAMUEL DV.', 41, 41, 82, 20.5, 7, 6, 8, 8, 6, 35, 14, 4, 4, 3, 3, 5, 10, 17, 70, 21.875, 73.375, 83, '2014-2015'),
(6, '1st', '1st Grading', 20001, 'Santos, Chiezle', 'Komunikasyon at Pananaliksik', '1', 'HUMMS', 170120005, 'DAYAO,JOLINA', 40, 40, 80, 20, 4, 3, 4, 3, 4, 18, 7.2, 3, 3, 3, 3, 9, 18, 24, 50, 15.625, 66.825, 79, '2014-2015'),
(7, '1st', '1st Grading', 20001, 'Santos, Chiezle', 'Komunikasyon at Pananaliksik', '1', 'HUMMS', 170120006, 'PUNZALAN, JOHN CEDRIC M.', 44, 41, 85, 21.25, 7, 9, 5, 6, 7, 34, 13.6, 3, 3, 4, 4, 10, 20, 27, 50, 15.625, 77.475, 85, '2014-2015'),
(8, '1st', '1st Grading', 20001, 'Santos, Chiezle', 'Komunikasyon at Pananaliksik', '1', 'HUMMS', 170120007, 'PUNZALAN,IRMA', 38, 39, 77, 19.25, 3, 3, 3, 3, 3, 15, 6, 4, 4, 4, 4, 7, 14, 22, 70, 21.875, 69.125, 80, '2014-2015'),
(9, '1st', '1st Grading', 20001, 'Santos, Chiezle', 'Komunikasyon at Pananaliksik', '1', 'HUMMS', 170120008, 'TUAZON, JONI ROSE D.', 30, 30, 60, 15, 4, 3, 4, 3, 4, 18, 7.2, 3, 3, 3, 3, 8, 16, 22, 76, 23.75, 67.95, 79, '2014-2015'),
(10, '1st', '1st Grading', 20001, 'Santos, Chiezle', 'Komunikasyon at Pananaliksik', '1', 'HUMMS', 170120009, 'ZERRUDO, KRISTIAN H.', 47, 49, 96, 24, 4, 4, 4, 4, 4, 20, 8, 4, 4, 4, 4, 9, 18, 26, 77, 24.0625, 82.0625, 88, '2014-2015');

-- --------------------------------------------------------

--
-- Table structure for table `tblquestions`
--

CREATE TABLE IF NOT EXISTS `tblquestions` (
`id` int(11) NOT NULL,
  `criteria` varchar(100) NOT NULL,
  `category` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblquestions`
--

INSERT INTO `tblquestions` (`id`, `criteria`, `category`) VALUES
(1, 'Focuses student attention', 'Lesson Implementation'),
(2, 'Relates the lesson to previous and future lessons', 'Lesson Implementation'),
(3, 'Models, demonstrates and provides examples', 'Lesson Implementation'),
(4, 'Monitors student learning continuously', 'Lesson Implementation'),
(5, 'Provides feedback and re-teaches when necessary', 'Lesson Implementation'),
(6, 'Shows concern for students', 'Motivation on Student'),
(7, 'Establishes good rapport', 'Motivation on Student'),
(8, 'Uses student interest to motivate them', 'Motivation on Student'),
(9, 'Uses effective strategies in teaching', 'Motivation on Student'),
(10, 'Encourages participation from all students', 'Motivation on Student'),
(11, 'Begins class work promptly', 'Maximizing Learning Time'),
(12, 'Makes effective use of academic learning time ', 'Maximizing Learning Time'),
(13, 'Gives clear and concise directions', 'Maximizing Learning Time'),
(14, 'Monitors student progress', 'Maximizing Learning Time'),
(15, 'Provides feedback on performance task, written exams', 'Maximizing Learning Time'),
(16, 'Manages discipline problems', 'Classroom Time Management'),
(17, 'Promotes self-discipline', 'Classroom Time Management'),
(18, 'Manages disruptive behavior constructively', 'Classroom Time Management'),
(19, 'Demonstrates fairness and consistently', 'Classroom Time Management'),
(20, 'Arranges the classroom for effective instruction', 'Classroom Time Management'),
(21, 'Give criticism and praise which are constructive', 'Interaction with Students'),
(22, 'Makes an effort to know each student as an individual', 'Interaction with Students'),
(23, 'Provides opportunities for each student to meet success', 'Interaction with Students'),
(24, 'Promotes positive self-image in students', 'Interaction with Students'),
(25, 'Communicates with students with understanding', 'Interaction with Students');

-- --------------------------------------------------------

--
-- Table structure for table `tblschedule`
--

CREATE TABLE IF NOT EXISTS `tblschedule` (
`id` int(11) NOT NULL,
  `subjectcode` varchar(50) NOT NULL,
  `day` varchar(50) NOT NULL,
  `classstart` time NOT NULL DEFAULT '00:00:00',
  `classend` time NOT NULL DEFAULT '00:00:00',
  `room` varchar(50) NOT NULL,
  `strand` varchar(45) DEFAULT NULL,
  `ay` varchar(45) DEFAULT NULL,
  `year_level` int(10) DEFAULT NULL,
  `section` varchar(45) DEFAULT NULL,
  `semester` varchar(45) DEFAULT NULL,
  `facultyid` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblschedule`
--

INSERT INTO `tblschedule` (`id`, `subjectcode`, `day`, `classstart`, `classend`, `room`, `strand`, `ay`, `year_level`, `section`, `semester`, `facultyid`) VALUES
(1, 'Komunikasyon at Pananaliksik', 'Monday', '07:00:00', '08:00:00', '201', 'ABM', '2017-2018', 11, '1', '1st', 20001),
(2, 'General Mathematics', 'Tuesday', '07:00:00', '08:00:00', '202', 'ABM', '2017-2018', 11, '1', '1st', 20001),
(3, 'Malikhaing Pagsulat', 'Thursday', '10:00:00', '11:00:00', '301', 'ABM', '2017-2018', 11, '1', '1st', 20003),
(4, 'CSS', 'Wednesday', '13:00:00', '14:00:00', '301', 'ICT', '2017-2018', 12, '1', '1st', 20002),
(5, 'Pre-Calculus', 'Tuesday', '07:00:00', '08:00:00', '202', 'ICT', '2017-2018', 12, '1', '1st', 20002),
(6, 'English for Academic & Professional Purposes', 'Friday', '11:00:00', '12:00:00', '206', 'ICT', '2017-2018', 12, '1', '1st', 20001),
(7, 'Reading and Writing', 'Wednesday', '11:00:00', '00:00:00', '202', 'HES', '2017-2018', 11, '1', '1st', 20001);

-- --------------------------------------------------------

--
-- Table structure for table `tblsection`
--

CREATE TABLE IF NOT EXISTS `tblsection` (
  `id` int(20) NOT NULL,
  `section` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsection`
--

INSERT INTO `tblsection` (`id`, `section`) VALUES
(1, 'ABM1'),
(2, 'ABM2'),
(3, 'HUMSS'),
(4, 'ICT1');

-- --------------------------------------------------------

--
-- Table structure for table `tblstrand`
--

CREATE TABLE IF NOT EXISTS `tblstrand` (
  `id` int(20) DEFAULT NULL,
  `strand` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstrand`
--

INSERT INTO `tblstrand` (`id`, `strand`) VALUES
(1, 'HUMMS'),
(2, 'ABM'),
(3, 'STEM'),
(4, 'ICT'),
(6, 'HES');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE IF NOT EXISTS `tblstudent` (
  `lname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `age` int(10) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `strand` varchar(50) NOT NULL,
  `ay` varchar(45) DEFAULT NULL,
  `year_level` int(11) NOT NULL,
  `semester` varchar(45) DEFAULT NULL,
  `section` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
`studentid` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=170120006 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`lname`, `fname`, `mname`, `age`, `gender`, `strand`, `ay`, `year_level`, `semester`, `section`, `address`, `contact`, `username`, `password`, `studentid`) VALUES
('Angeles', 'Joaquin', 'M', 19, 'Male', 'ABM', '2017-2018', 11, '1st', '1', 'San Ildefonso, Bulacan', '09366706558', 'hodor', 'irma', 170120001),
('Punzalan', 'Irma', '', 123123, 'Male', 'HUMMS', '2017-2018', 12, '1st', '4', '123123123', '123123123', 'awdawd171207', 'awdawd171207', 170120005);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE IF NOT EXISTS `tblsubjects` (
`id` int(11) NOT NULL,
  `subjectname` varchar(50) NOT NULL,
  `category` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`id`, `subjectname`, `category`) VALUES
(2, 'Komunikasyon at Pananaliksik', 'APPLIED'),
(5, 'Physical and Health Education', 'CORE'),
(9, 'Malikhaing Pagsulat', 'CORE'),
(11, 'Pre-Calculus', 'CORE'),
(13, 'CSS', 'APPLIED'),
(16, 'Reading and Writing', 'APPLIED'),
(17, 'Statistics and Probability', 'APPLIED');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instructor_archive`
--
ALTER TABLE `instructor_archive`
 ADD PRIMARY KEY (`facultyid`);

--
-- Indexes for table `student_archive`
--
ALTER TABLE `student_archive`
 ADD PRIMARY KEY (`studentid`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblconfiguration`
--
ALTER TABLE `tblconfiguration`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblevaluation`
--
ALTER TABLE `tblevaluation`
 ADD PRIMARY KEY (`evaluationid`);

--
-- Indexes for table `tblevaluation_details`
--
ALTER TABLE `tblevaluation_details`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblfaculty`
--
ALTER TABLE `tblfaculty`
 ADD PRIMARY KEY (`facultyid`);

--
-- Indexes for table `tblquestions`
--
ALTER TABLE `tblquestions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblschedule`
--
ALTER TABLE `tblschedule`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
 ADD PRIMARY KEY (`studentid`);

--
-- Indexes for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `instructor_archive`
--
ALTER TABLE `instructor_archive`
MODIFY `facultyid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20004;
--
-- AUTO_INCREMENT for table `student_archive`
--
ALTER TABLE `student_archive`
MODIFY `studentid` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=170120004;
--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblconfiguration`
--
ALTER TABLE `tblconfiguration`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblevaluation_details`
--
ALTER TABLE `tblevaluation_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `tblfaculty`
--
ALTER TABLE `tblfaculty`
MODIFY `facultyid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20004;
--
-- AUTO_INCREMENT for table `tblquestions`
--
ALTER TABLE `tblquestions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tblschedule`
--
ALTER TABLE `tblschedule`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
MODIFY `studentid` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=170120006;
--
-- AUTO_INCREMENT for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
