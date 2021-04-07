-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: studentportal
-- ------------------------------------------------------
-- Server version	5.6.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbladmin`
--

DROP TABLE IF EXISTS `tbladmin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbladmin`
--

LOCK TABLES `tbladmin` WRITE;
/*!40000 ALTER TABLE `tbladmin` DISABLE KEYS */;
INSERT INTO `tbladmin` VALUES (1,'admin','admin');
/*!40000 ALTER TABLE `tbladmin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblevaluation`
--

DROP TABLE IF EXISTS `tblevaluation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblevaluation` (
  `evaluationid` varchar(45) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `facultyid` int(11) DEFAULT NULL,
  `studentid` int(11) DEFAULT NULL,
  `ay` varchar(45) DEFAULT NULL,
  `semester` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`evaluationid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblevaluation`
--

LOCK TABLES `tblevaluation` WRITE;
/*!40000 ALTER TABLE `tblevaluation` DISABLE KEYS */;
INSERT INTO `tblevaluation` VALUES ('1701200002000120171015231359','Comment Here',20001,170120000,'2016-2017','1st');
/*!40000 ALTER TABLE `tblevaluation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblevaluation_details`
--

DROP TABLE IF EXISTS `tblevaluation_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblevaluation_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `evaluationid` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblevaluation_details`
--

LOCK TABLES `tblevaluation_details` WRITE;
/*!40000 ALTER TABLE `tblevaluation_details` DISABLE KEYS */;
INSERT INTO `tblevaluation_details` VALUES (1,1,1,'1701200002000120171015231359'),(2,1,2,'1701200002000120171015231359'),(3,1,3,'1701200002000120171015231359'),(4,0,4,'1701200002000120171015231359'),(5,0,5,'1701200002000120171015231359'),(6,0,6,'1701200002000120171015231359'),(7,0,7,'1701200002000120171015231359'),(8,0,8,'1701200002000120171015231359'),(9,0,9,'1701200002000120171015231359'),(10,0,10,'1701200002000120171015231359'),(11,0,11,'1701200002000120171015231359'),(12,0,12,'1701200002000120171015231359'),(13,0,13,'1701200002000120171015231359'),(14,0,14,'1701200002000120171015231359'),(15,0,15,'1701200002000120171015231359'),(16,0,16,'1701200002000120171015231359'),(17,0,17,'1701200002000120171015231359'),(18,0,18,'1701200002000120171015231359'),(19,0,19,'1701200002000120171015231359'),(20,0,20,'1701200002000120171015231359'),(21,0,21,'1701200002000120171015231359'),(22,0,22,'1701200002000120171015231359'),(23,0,23,'1701200002000120171015231359'),(24,1,24,'1701200002000120171015231359'),(25,1,25,'1701200002000120171015231359');
/*!40000 ALTER TABLE `tblevaluation_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblfaculty`
--

DROP TABLE IF EXISTS `tblfaculty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblfaculty` (
  `facultyid` int(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`facultyid`)
) ENGINE=InnoDB AUTO_INCREMENT=20003 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblfaculty`
--

LOCK TABLES `tblfaculty` WRITE;
/*!40000 ALTER TABLE `tblfaculty` DISABLE KEYS */;
INSERT INTO `tblfaculty` VALUES (20001,'Santos','Chiezle','Donna','Candaba,Pampanga','09366706558','chin','chin'),(20002,'Montero','Jhomar','Caraig','Sampaguita St, San Jose, Baliwag, Bulacan','09069204164','hodor','hodor');
/*!40000 ALTER TABLE `tblfaculty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblgrade`
--

DROP TABLE IF EXISTS `tblgrade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblgrade` (
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
  `transmu` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblgrade`
--

LOCK TABLES `tblgrade` WRITE;
/*!40000 ALTER TABLE `tblgrade` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblgrade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblquestions`
--

DROP TABLE IF EXISTS `tblquestions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblquestions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `criteria` varchar(100) NOT NULL,
  `category` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblquestions`
--

LOCK TABLES `tblquestions` WRITE;
/*!40000 ALTER TABLE `tblquestions` DISABLE KEYS */;
INSERT INTO `tblquestions` VALUES (1,'Focuses student attention','Lesson Implementation'),(2,'Relates the lesson to previous and future lessons','Lesson Implementation'),(3,'Models, demonstrates and provides examples','Lesson Implementation'),(4,'Monitors student learning continuously','Lesson Implementation'),(5,'Provides feedback and re-teaches when necessary','Lesson Implementation'),(6,'Shows concern for students','Motivation on Student'),(7,'Establishes good rapport','Motivation on Student'),(8,'Uses student interest to motivate them','Motivation on Student'),(9,'Uses effective strategies in teaching','Motivation on Student'),(10,'Encourages participation from all students','Motivation on Student'),(11,'Begins class work promptly','Maximizing Learning Time'),(12,'Makes effective use of academic learning time ','Maximizing Learning Time'),(13,'Gives clear and concise directions','Maximizing Learning Time'),(14,'Monitors student progress','Maximizing Learning Time'),(15,'Provides feedback on performance task, written exams','Maximizing Learning Time'),(16,'Manages discipline problems','Classroom Time Management'),(17,'Promotes self-discipline','Classroom Time Management'),(18,'Manages disruptive behavior constructively','Classroom Time Management'),(19,'Demonstrates fairness and consistently','Classroom Time Management'),(20,'Arranges the classroom for effective instruction','Classroom Time Management'),(21,'Give criticism and praise which are constructive','Interaction with Students'),(22,'Makes an effort to know each student as an individual','Interaction with Students'),(23,'Provides opportunities for each student to meet success','Interaction with Students'),(24,'Promotes positive self-image in students','Interaction with Students'),(25,'Communicates with students with understanding','Interaction with Students');
/*!40000 ALTER TABLE `tblquestions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblschedule`
--

DROP TABLE IF EXISTS `tblschedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblschedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `facultyid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblschedule`
--

LOCK TABLES `tblschedule` WRITE;
/*!40000 ALTER TABLE `tblschedule` DISABLE KEYS */;
INSERT INTO `tblschedule` VALUES (2,'ITE12','Tuesday','14:00:00','14:30:00','20555','HUMMS','2014-2015',12,'4','2nd',20002),(3,'ITE12','Monday','01:01:00','01:02:00','qqaaa','HUMMS','2014-2015',11,'1','1st',20002),(4,'ITE12','','12:57:00','00:59:00','333','HUMMS','2014-2015',11,'1','1st',20002),(5,'ITE12','Monday','22:59:00','13:58:00','211','HUMMS','2014-2015',11,'1','1st',20002),(6,'ITE12','Monday','00:00:00','12:59:00','211','HUMMS','2014-2015',11,'1','1st',20002),(7,'ITE12','Monday','12:00:00','17:00:00','101','STEM','2016-2017',12,'1','1st',20002),(8,'ITE12','Monday','13:00:00','17:00:00','101','HUMMS','2014-2015',11,'1','1st',20002),(9,'ITE19','Monday','12:59:00','12:59:00','20001','HUMMS','2014-2015',11,'1','1st',20002),(10,'ITE19','Monday','12:59:00','12:59:00','101','HUMMS','2014-2015',11,'1','1st',20001),(11,'ITE12','Monday','12:59:00','12:59:00','200','HUMMS','2016-2017',12,'1','2nd',20001),(12,'ITE19','Monday','01:01:00','01:01:00','123','ABM','2016-2017',12,'1','1st',20001);
/*!40000 ALTER TABLE `tblschedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsection`
--

DROP TABLE IF EXISTS `tblsection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblsection` (
  `id` int(20) NOT NULL,
  `section` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsection`
--

LOCK TABLES `tblsection` WRITE;
/*!40000 ALTER TABLE `tblsection` DISABLE KEYS */;
INSERT INTO `tblsection` VALUES (1,'ABM1'),(2,'ABM2'),(3,'HUMSS'),(4,'ICT1');
/*!40000 ALTER TABLE `tblsection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstrand`
--

DROP TABLE IF EXISTS `tblstrand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblstrand` (
  `id` int(20) DEFAULT NULL,
  `strand` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstrand`
--

LOCK TABLES `tblstrand` WRITE;
/*!40000 ALTER TABLE `tblstrand` DISABLE KEYS */;
INSERT INTO `tblstrand` VALUES (1,'HUMMS'),(2,'ABM'),(3,'STEM'),(4,'ICT'),(6,'HES');
/*!40000 ALTER TABLE `tblstrand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstudent`
--

DROP TABLE IF EXISTS `tblstudent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblstudent` (
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
  `studentid` int(50) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`studentid`)
) ENGINE=InnoDB AUTO_INCREMENT=170120006 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstudent`
--

LOCK TABLES `tblstudent` WRITE;
/*!40000 ALTER TABLE `tblstudent` DISABLE KEYS */;
INSERT INTO `tblstudent` VALUES ('Punzalans','Irma','Coronel',19,'Female','ABM','2016-2017',12,'1st','1','San Ildefonso, Bulacan','09366706558','irma','irma',170120000),('papapapapa','jhomssssssssss','panget',30,'female','ict',NULL,12,'1st','2','bbbb','0000000','jhoms','jhoms',170120003),('Lastname','Firstname','Middlename',12,'Male','ABM','2016-2017',11,'1st','1','Makinabang,Baliwag,Bulacan','0','student','student',170120004),('Parkers','Peters','Middlename',23,'Male','ABM','2016-2017',11,'1st','1','Sampaguita St, San Jose, Baliwag, Bulacan','09','peter','peter',170120005);
/*!40000 ALTER TABLE `tblstudent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsubjects`
--

DROP TABLE IF EXISTS `tblsubjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblsubjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjectname` varchar(50) NOT NULL,
  `subj_desc` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsubjects`
--

LOCK TABLES `tblsubjects` WRITE;
/*!40000 ALTER TABLE `tblsubjects` DISABLE KEYS */;
INSERT INTO `tblsubjects` VALUES (1,'ITE12','Software Engineering'),(2,'ITE19','Web Design');
/*!40000 ALTER TABLE `tblsubjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblteacher`
--

DROP TABLE IF EXISTS `tblteacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblteacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `contact` int(11) NOT NULL,
  `address` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblteacher`
--

LOCK TABLES `tblteacher` WRITE;
/*!40000 ALTER TABLE `tblteacher` DISABLE KEYS */;
INSERT INTO `tblteacher` VALUES (1,'Teacher','Teacher','Teacher',1234567890,'address','a','a'),(2,'Escarilla','ricarte','Flameno',1111,'taal,pulilan','ricarte','ricarte');
/*!40000 ALTER TABLE `tblteacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'studentportal'
--

--
-- Dumping routines for database 'studentportal'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-16  1:10:27
