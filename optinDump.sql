-- MySQL dump 10.13  Distrib 5.1.37, for debian-linux-gnu (i486)
--
-- Host: localhost    Database: optin
-- ------------------------------------------------------
-- Server version	5.1.37-1ubuntu5

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
-- Table structure for table `EQUIPMENT`
--

DROP TABLE IF EXISTS `EQUIPMENT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EQUIPMENT` (
  `EQUIP_ID` int(10) NOT NULL AUTO_INCREMENT,
  `SPORT_ID` int(10) NOT NULL,
  `EQUIP_NAME` varchar(100) NOT NULL,
  PRIMARY KEY (`EQUIP_ID`),
  UNIQUE KEY `EQUIP_ID` (`EQUIP_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COMMENT='Equipment Table';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EQUIPMENT`
--

LOCK TABLES `EQUIPMENT` WRITE;
/*!40000 ALTER TABLE `EQUIPMENT` DISABLE KEYS */;
INSERT INTO `EQUIPMENT` VALUES (1,1,'Soccer Net'),(2,2,'Right-Handed Glove'),(3,2,'Left-Handed Glove'),(4,2,'Baseball Bat'),(5,2,'Baseball Helmet'),(6,2,'Baseball'),(7,3,'Right-Handed Glove'),(8,3,'Left-Handed Glove'),(9,3,'Softball Bat'),(10,3,'Softball Helmet'),(11,3,'Softball');
/*!40000 ALTER TABLE `EQUIPMENT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EVENT`
--

DROP TABLE IF EXISTS `EVENT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EVENT` (
  `EVENT_ID` int(10) NOT NULL AUTO_INCREMENT,
  `SPORT_ID` int(10) NOT NULL,
  `COORDINATOR_USER_ID` int(10) NOT NULL,
  `LOCATION` varchar(100) NOT NULL,
  `STREET` varchar(100) NOT NULL,
  `CITY` varchar(100) NOT NULL,
  `STATE` varchar(2) NOT NULL,
  `ZIP` int(5) NOT NULL,
  `DATE` date NOT NULL,
  `START` varchar(20) NOT NULL,
  `STOP` varchar(20) NOT NULL,
  `MIN_PARTICIPANTS` int(10) NOT NULL,
  `MAX_PARTICIPANTS` int(10) NOT NULL,
  `DESCRIPTION` varchar(500) NOT NULL,
  PRIMARY KEY (`EVENT_ID`),
  UNIQUE KEY `EVENT_ID` (`EVENT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='Event Table';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EVENT`
--

LOCK TABLES `EVENT` WRITE;
/*!40000 ALTER TABLE `EVENT` DISABLE KEYS */;
INSERT INTO `EVENT` VALUES (1,1,1,'Patriot&#39;s Park','','','',30809,'2010-01-31','1:00 PM','1:00 PM',1,50,''),(2,2,2,'ASU','','','',30901,'2009-12-01','5:00 PM','1:00 AM',1,22,'baseball rules'),(3,1,2,'ASU','','','',30901,'2010-10-01','1:00 AM','1:00 AM',1,9,'yay soccer'),(4,12,1,'Patriot&#39;s Park','','','',30809,'2012-09-01','1:00 AM','1:00 AM',1,10,'wtf is this'),(5,6,1,'Augusta Ice Forum','','Augusta','GA',30901,'2010-07-04','1:00 AM','1:00 AM',1,2,'adf'),(6,4,1,'florida state','','','',12345,'2013-02-20','5:00 PM','1:00 AM',3,20,''),(7,16,3,'Pilates Studio','','','',30809,'2010-01-01','1:00 AM','1:00 AM',1,2,'');
/*!40000 ALTER TABLE `EVENT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EVENT_EQUIPMENT`
--

DROP TABLE IF EXISTS `EVENT_EQUIPMENT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EVENT_EQUIPMENT` (
  `EQUIP_ID` int(10) NOT NULL,
  `EVENT_ID` int(10) NOT NULL,
  `NUM_AVAILABLE` int(10) NOT NULL,
  `NUM_NEEDED` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Equipment available and needed for the event';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EVENT_EQUIPMENT`
--

LOCK TABLES `EVENT_EQUIPMENT` WRITE;
/*!40000 ALTER TABLE `EVENT_EQUIPMENT` DISABLE KEYS */;
/*!40000 ALTER TABLE `EVENT_EQUIPMENT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PARTICIPANT_EQUIPMENT`
--

DROP TABLE IF EXISTS `PARTICIPANT_EQUIPMENT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PARTICIPANT_EQUIPMENT` (
  `USER_ID` int(10) NOT NULL,
  `EVENT_ID` int(10) NOT NULL,
  `EQUIP_ID` int(10) NOT NULL,
  `QUANTITY` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Equipment that participants are bringing';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PARTICIPANT_EQUIPMENT`
--

LOCK TABLES `PARTICIPANT_EQUIPMENT` WRITE;
/*!40000 ALTER TABLE `PARTICIPANT_EQUIPMENT` DISABLE KEYS */;
/*!40000 ALTER TABLE `PARTICIPANT_EQUIPMENT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PARTICIPANT_LOOKUP`
--

DROP TABLE IF EXISTS `PARTICIPANT_LOOKUP`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PARTICIPANT_LOOKUP` (
  `USER_ID` int(10) NOT NULL,
  `EVENT_ID` int(10) NOT NULL,
  `BRINGING_EQUIPMENT_ID` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Participants Lookup Table';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PARTICIPANT_LOOKUP`
--

LOCK TABLES `PARTICIPANT_LOOKUP` WRITE;
/*!40000 ALTER TABLE `PARTICIPANT_LOOKUP` DISABLE KEYS */;
INSERT INTO `PARTICIPANT_LOOKUP` VALUES (2,1,0),(3,6,0),(3,1,0);
/*!40000 ALTER TABLE `PARTICIPANT_LOOKUP` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SPORTS`
--

DROP TABLE IF EXISTS `SPORTS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SPORTS` (
  `SPORT_ID` int(10) NOT NULL AUTO_INCREMENT,
  `SPORTNAME` varchar(100) NOT NULL,
  `SPORTTYPE` varchar(100) NOT NULL,
  PRIMARY KEY (`SPORT_ID`),
  UNIQUE KEY `SPORT_ID` (`SPORT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COMMENT='Sports Table';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SPORTS`
--

LOCK TABLES `SPORTS` WRITE;
/*!40000 ALTER TABLE `SPORTS` DISABLE KEYS */;
INSERT INTO `SPORTS` VALUES (1,'Soccer','VERSUS'),(2,'Baseball','VERSUS'),(3,'Softball','VERSUS'),(4,'Football','VERSUS'),(5,'Basketball','VERSUS'),(6,'Ice Hockey','VERSUS'),(7,'Field Hockey','VERSUS'),(8,'Cricket','VERSUS'),(9,'Lacrosse','VERSUS'),(10,'Tennis','VERSUS'),(11,'Golf','VERSUS'),(12,'Disc Golf','VERSUS'),(13,'Ultimate Frisbee','VERSUS'),(14,'Rugby','VERSUS'),(15,'Yoga','GROUP'),(16,'Pilates','GROUP');
/*!40000 ALTER TABLE `SPORTS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USER_INFO`
--

DROP TABLE IF EXISTS `USER_INFO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USER_INFO` (
  `USER_ID` int(10) NOT NULL AUTO_INCREMENT,
  `USER_ROLE` int(10) NOT NULL,
  `FNAME` varchar(30) NOT NULL,
  `LNAME` varchar(30) NOT NULL,
  `CITY` varchar(50) NOT NULL,
  `STATE` varchar(2) NOT NULL,
  `ZIP` int(5) NOT NULL,
  `PHONE` varchar(14) NOT NULL,
  `SHOW_ADDY` tinyint(1) NOT NULL,
  `SHOW_PHONE` tinyint(1) NOT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='User Information Table';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USER_INFO`
--

LOCK TABLES `USER_INFO` WRITE;
/*!40000 ALTER TABLE `USER_INFO` DISABLE KEYS */;
INSERT INTO `USER_INFO` VALUES (1,0,'steven','','','',30809,'() -',0,0),(2,0,'casey','','','',30901,'() -',0,0),(3,0,'Andrea','','','',30809,'() -',0,0);
/*!40000 ALTER TABLE `USER_INFO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USER_LOGIN`
--

DROP TABLE IF EXISTS `USER_LOGIN`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USER_LOGIN` (
  `USER_ID` int(10) NOT NULL AUTO_INCREMENT,
  `UNAME` varchar(100) NOT NULL,
  `UPW` varchar(500) NOT NULL,
  PRIMARY KEY (`USER_ID`),
  UNIQUE KEY `UNAME` (`UNAME`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='User Login Table';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USER_LOGIN`
--

LOCK TABLES `USER_LOGIN` WRITE;
/*!40000 ALTER TABLE `USER_LOGIN` DISABLE KEYS */;
INSERT INTO `USER_LOGIN` VALUES (1,'steven','6ed61d4b80bb0f81937b32418e98adca'),(2,'casey','1e21afeba99926d69874ae1c97c88418'),(3,'andrea','1c42f9c1ca2f65441465b43cd9339d6c');
/*!40000 ALTER TABLE `USER_LOGIN` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2009-12-09 20:29:45
