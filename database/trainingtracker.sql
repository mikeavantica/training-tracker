CREATE DATABASE  IF NOT EXISTS `training_tracker` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `training_tracker`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: training_tracker
-- ------------------------------------------------------
-- Server version	5.1.31-community

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
-- Table structure for table `AuthAssignment`
--

DROP TABLE IF EXISTS `AuthAssignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AuthAssignment`
--

LOCK TABLES `AuthAssignment` WRITE;
/*!40000 ALTER TABLE `AuthAssignment` DISABLE KEYS */;
INSERT INTO `AuthAssignment` VALUES ('admin','1',NULL,'N;'),('admin','3',NULL,'N;'),('authenticated','2',NULL,'N;');
/*!40000 ALTER TABLE `AuthAssignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `AuthItem`
--

DROP TABLE IF EXISTS `AuthItem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AuthItem`
--

LOCK TABLES `AuthItem` WRITE;
/*!40000 ALTER TABLE `AuthItem` DISABLE KEYS */;
INSERT INTO `AuthItem` VALUES ('admin',2,'administrator',NULL,'N;'),('authenticated',2,'authenticated user','return !Yii::app()->user->isGuest;','N;'),('guest',2,'guest user','return Yii::app()->user->isGuest;','N;');
/*!40000 ALTER TABLE `AuthItem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `AuthItemChild`
--

DROP TABLE IF EXISTS `AuthItemChild`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AuthItemChild`
--

LOCK TABLES `AuthItemChild` WRITE;
/*!40000 ALTER TABLE `AuthItemChild` DISABLE KEYS */;
/*!40000 ALTER TABLE `AuthItemChild` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `athlete`
--

DROP TABLE IF EXISTS `athlete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `athlete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(150) NOT NULL,
  `height` decimal(10,2) NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `sex_typeid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `athlete_sex_type` (`sex_typeid`),
  CONSTRAINT `athlete_sex_type` FOREIGN KEY (`sex_typeid`) REFERENCES `sex_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `athlete`
--

LOCK TABLES `athlete` WRITE;
/*!40000 ALTER TABLE `athlete` DISABLE KEYS */;
INSERT INTO `athlete` VALUES (2,'chitin','zamora','zamora@gmail.com',21.00,81.00,1),(3,'chitin','zamora','chitin@gmail.com',20.00,30.00,1),(5,'javier','dobles','javier@avantica.net',20.00,99.99,2),(6,'genesis','parrales','javier@avantica.net',30.00,39.58,2),(7,'christhian','perez','javier@avantica.net',40.00,39.00,1),(8,'javier','dobles','javier@avantica.net',80.99,78.99,2),(9,'asjdhjakhdfjkhfskjlhsdlkhslkdfksdnsljhgjhrelk','asdasjdhjasdhakjdfhsjrdfgdshmgsndgshjkhjdgsfg','javier@avantica.net',39.80,120.90,1);
/*!40000 ALTER TABLE `athlete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `body_profiles`
--

DROP TABLE IF EXISTS `body_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `body_profiles` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `body_part__name` varchar(45) NOT NULL,
  `weight` decimal(10,0) NOT NULL,
  `height` decimal(10,0) NOT NULL,
  `sex_typeid` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `body_profiles_sex_type` (`sex_typeid`),
  CONSTRAINT `body_profiles_sex_type` FOREIGN KEY (`sex_typeid`) REFERENCES `sex_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `body_profiles`
--

LOCK TABLES `body_profiles` WRITE;
/*!40000 ALTER TABLE `body_profiles` DISABLE KEYS */;
INSERT INTO `body_profiles` VALUES (1,'Legs',20,10,2),(2,'Arms',20,30,2),(3,'Trunk',54,54,1),(4,'Upper Arm',3,3,1),(5,'Forearm and half hand',2,2,1),(6,'Thigh',11,11,1),(7,'Leg and foot',6,6,1),(8,'Weight',100,100,1),(9,'Head and Neck',11,11,1),(10,'Trunk',30,30,2),(11,'Upper Arm',17,17,2),(12,'Forearm and half hand',19,19,2),(13,'Thigh',23,23,2),(14,'Leg and foot',29,29,2),(15,'Other Distance',100,100,2),(16,'Other Distance',100,100,1);
/*!40000 ALTER TABLE `body_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercise`
--

DROP TABLE IF EXISTS `exercise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercise`
--

LOCK TABLES `exercise` WRITE;
/*!40000 ALTER TABLE `exercise` DISABLE KEYS */;
INSERT INTO `exercise` VALUES (2,'Thruster'),(3,'Pull Up'),(4,'Hang Clean and Jerk'),(5,'Power Clean and Jerk'),(6,'Power Clean'),(7,'Burpee Box Jump'),(8,'Burpee'),(9,'Strict Press'),(10,'Back of the Neck Push Press'),(11,'Push Press'),(12,'Dead Lift'),(13,'Box Jump'),(14,'Snatch Balance'),(15,'Toes to Bar'),(16,'Kettlebell Push Press'),(17,'Kettlebell Swing'),(18,'Double Under'),(19,'Power Snatch'),(20,'Hand Stand Push Up'),(21,'Hand Release Push Up'),(22,'Push Up'),(23,'Chest to Bar Pull Up'),(24,'Ring Dip'),(25,'Hang Clean'),(26,'Wall Ball'),(27,'Power Clean'),(28,'Hang Power Snatch'),(29,'Row'),(30,'Medicine Ball Sit up'),(31,'Sit up'),(32,'Front Squat'),(33,'Back Squat'),(34,'Overhead Squat'),(35,'Lunge'),(36,'Air Squat'),(37,'Lunge'),(38,'Overhead Plate Lunge'),(39,'Mountain Climber'),(40,'Pistol');
/*!40000 ALTER TABLE `exercise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercise_detail`
--

DROP TABLE IF EXISTS `exercise_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercise_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attr1` decimal(10,0) NOT NULL,
  `attr2` decimal(10,0) NOT NULL,
  `attr3` decimal(10,0) NOT NULL,
  `attr4` decimal(10,0) NOT NULL,
  `attr5` decimal(10,0) NOT NULL,
  `attr6` decimal(10,0) NOT NULL,
  `attr7` decimal(10,0) NOT NULL,
  `body_profilesId` int(11) NOT NULL,
  `exerciseid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `exercise_profile_detail_body_profiles` (`body_profilesId`),
  KEY `exercise_profile_detail_exercise_profile` (`exerciseid`),
  CONSTRAINT `exercise_profile_detail_body_profiles` FOREIGN KEY (`body_profilesId`) REFERENCES `body_profiles` (`Id`),
  CONSTRAINT `exercise_profile_detail_exercise_profile` FOREIGN KEY (`exerciseid`) REFERENCES `exercise` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=274 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercise_detail`
--

LOCK TABLES `exercise_detail` WRITE;
/*!40000 ALTER TABLE `exercise_detail` DISABLE KEYS */;
INSERT INTO `exercise_detail` VALUES (1,0,0,0,0,0,2,0,1,2),(2,0,0,0,2,0,0,0,1,3),(3,0,0,0,0,0,0,0,1,4),(4,0,0,0,0,0,0,0,1,5),(5,0,0,0,0,0,0,0,1,6),(6,1,2,0,0,2,2,2,1,7),(7,1,2,0,0,2,2,2,1,8),(8,0,0,0,0,0,0,0,1,9),(9,0,0,0,0,1,0,0,1,10),(10,0,0,0,0,1,0,0,1,11),(11,0,0,2,0,0,0,0,1,12),(12,0,0,0,0,0,0,2,1,13),(13,0,0,0,0,0,2,0,1,14),(14,0,0,0,0,0,0,0,1,15),(15,0,0,0,0,0,0,0,1,16),(16,0,0,0,0,0,0,0,1,17),(17,0,0,0,0,0,0,2,1,18),(18,0,0,0,0,0,0,0,1,19),(19,0,0,0,1,0,0,0,1,20),(20,0,0,0,2,2,0,0,1,21),(21,0,0,0,2,2,0,0,1,22),(22,0,0,0,2,0,0,0,1,23),(23,0,0,0,2,2,0,0,1,24),(24,0,0,0,0,0,0,0,1,25),(25,0,0,0,0,0,2,0,1,26),(26,0,0,2,0,0,0,0,1,27),(27,0,0,0,0,0,0,0,1,28),(28,0,0,0,0,0,0,0,1,29),(29,2,2,0,0,0,0,0,1,30),(30,2,2,0,0,0,0,0,1,31),(31,0,0,0,0,2,0,0,1,32),(32,0,0,0,0,2,0,0,1,33),(33,0,0,0,0,2,0,0,1,34),(34,0,0,0,0,2,0,0,1,35),(35,0,0,0,0,2,0,0,1,36),(36,0,0,0,0,2,0,0,1,37),(37,0,0,0,0,1,0,0,1,38),(38,0,0,0,0,0,0,0,1,39),(39,0,0,0,0,2,0,0,1,40),(40,0,0,0,0,0,2,0,2,2),(41,0,0,0,2,0,0,0,2,3),(42,0,1,0,0,0,0,0,2,4),(43,0,1,0,0,0,0,0,2,5),(44,0,0,1,0,0,0,0,2,6),(45,0,1,0,0,2,2,2,2,7),(46,0,1,0,0,2,2,2,2,8),(47,0,0,0,0,0,0,0,2,9),(48,0,0,0,0,1,0,0,2,10),(49,0,0,0,0,1,0,0,2,11),(50,0,0,1,0,0,0,0,2,12),(51,0,0,0,0,0,0,2,2,13),(52,0,0,0,0,0,2,0,2,14),(53,0,0,0,0,0,0,0,2,15),(54,0,0,0,0,0,0,0,2,16),(55,0,0,0,0,0,0,0,2,17),(56,0,0,0,0,0,0,2,2,18),(57,0,0,0,0,0,0,0,2,19),(58,0,0,0,2,0,0,0,2,20),(59,0,0,0,2,2,0,0,2,21),(60,0,0,0,2,2,0,0,2,22),(61,0,0,0,2,0,0,0,2,23),(62,0,0,0,2,2,0,0,2,24),(63,0,0,0,0,0,0,0,2,25),(64,0,0,0,0,0,2,0,2,26),(65,0,0,1,0,0,0,0,2,27),(66,0,0,0,0,0,0,0,2,28),(67,0,0,0,0,0,0,0,2,29),(68,0,2,0,0,0,0,0,2,30),(69,0,2,0,0,0,0,0,2,31),(70,0,0,0,0,2,0,0,2,32),(71,0,0,0,0,2,0,0,2,33),(72,0,0,0,0,2,0,0,2,34),(73,0,0,0,0,2,0,0,2,35),(74,0,0,0,0,2,0,0,2,36),(75,0,0,0,0,2,0,0,2,37),(76,0,0,0,0,1,0,0,2,38),(77,0,0,0,0,0,0,0,2,39),(78,0,0,0,0,2,0,0,2,40),(79,0,0,0,2,0,2,0,3,2),(80,0,0,0,1,0,0,0,3,3),(81,0,0,0,2,0,0,0,3,4),(82,0,0,0,2,0,0,0,3,5),(83,0,0,0,2,0,0,0,3,6),(84,0,2,1,0,2,2,2,3,7),(85,0,2,1,0,2,2,2,3,8),(86,0,0,1,0,0,0,0,3,9),(87,0,0,1,2,1,0,0,3,10),(88,0,0,1,2,1,0,0,3,11),(89,0,0,2,0,0,0,0,3,12),(90,0,0,0,0,0,0,2,3,13),(91,0,0,0,1,0,0,0,3,14),(92,0,0,0,0,0,0,0,3,15),(93,0,0,1,0,0,0,0,3,16),(94,0,0,0,2,0,0,0,3,17),(95,0,0,0,0,0,0,2,3,18),(96,0,0,0,2,0,2,0,3,19),(97,0,0,0,1,0,0,0,3,20),(98,0,0,0,0,0,0,0,3,21),(99,0,0,0,0,0,0,0,3,22),(100,0,0,0,1,0,0,0,3,23),(101,0,0,0,1,0,0,0,3,24),(102,0,0,0,1,0,0,0,3,25),(103,0,0,0,0,0,2,0,3,26),(104,0,0,2,1,0,0,0,3,27),(105,0,0,0,2,0,2,0,3,28),(106,0,0,0,0,0,0,0,3,29),(107,0,2,0,0,0,0,0,3,30),(108,0,2,0,0,0,0,0,3,31),(109,0,0,0,0,2,0,0,3,32),(110,0,0,0,0,2,0,0,3,33),(111,0,0,0,0,2,0,0,3,34),(112,0,0,0,0,2,0,0,3,35),(113,0,0,0,0,2,0,0,3,36),(114,0,0,0,0,2,0,0,3,37),(115,0,0,1,2,1,0,0,3,38),(116,0,0,0,0,0,0,0,3,39),(117,0,0,0,0,2,0,0,3,40),(118,0,0,0,2,1,2,0,4,2),(119,0,0,0,0,0,0,0,4,3),(120,0,0,1,2,2,0,0,4,4),(121,0,0,1,2,2,1,0,4,5),(122,0,0,1,2,2,1,0,4,6),(123,0,1,0,0,2,2,2,4,7),(124,0,1,0,0,2,2,2,4,8),(125,0,0,2,1,0,0,0,4,9),(126,0,0,1,2,1,0,0,4,10),(127,0,0,1,2,1,0,0,4,11),(128,0,0,2,0,0,0,0,4,12),(129,0,0,0,0,0,0,2,4,13),(130,0,0,0,2,1,0,0,4,14),(131,0,0,0,0,0,0,0,4,15),(132,0,0,2,1,0,0,0,4,16),(133,0,0,2,2,1,0,0,4,17),(134,0,0,0,0,0,0,2,4,18),(135,0,0,0,2,1,2,1,4,19),(136,0,0,0,0,0,0,0,4,20),(137,0,0,0,0,0,0,0,4,21),(138,0,0,0,0,0,0,0,4,22),(139,0,0,0,0,0,0,0,4,23),(140,0,0,0,0,0,0,0,4,24),(141,0,0,0,2,1,0,0,4,25),(142,0,0,0,0,0,2,0,4,26),(143,0,0,2,2,1,0,0,4,27),(144,0,0,0,2,1,2,1,4,28),(145,0,0,0,0,0,0,0,4,29),(146,0,2,0,0,0,0,0,4,30),(147,0,2,0,0,0,0,0,4,31),(148,0,0,0,0,2,0,0,4,32),(149,0,0,0,0,2,0,0,4,33),(150,0,0,0,0,2,0,0,4,34),(151,0,0,0,0,2,0,0,4,35),(152,0,0,0,0,2,0,0,4,36),(153,0,0,0,0,2,0,0,4,37),(154,0,0,1,2,1,0,0,4,38),(155,0,0,0,0,0,0,0,4,39),(156,0,0,0,0,2,0,0,4,40),(157,0,0,0,0,0,0,0,5,2),(158,0,0,0,2,0,0,0,5,3),(159,0,0,0,0,0,0,0,5,4),(160,0,0,0,0,0,0,0,5,5),(161,0,0,0,0,0,0,0,5,6),(162,0,0,0,0,1,2,2,5,7),(163,0,0,0,0,1,2,2,5,8),(164,0,0,0,0,0,0,0,5,9),(165,0,0,0,0,0,0,0,5,10),(166,0,0,0,0,0,0,0,5,11),(167,0,0,0,0,0,0,0,5,12),(168,0,0,0,0,0,0,2,5,13),(169,0,0,0,0,0,1,0,5,14),(170,0,0,2,0,0,1,0,5,15),(171,0,0,0,0,0,0,0,5,16),(172,0,0,0,0,0,0,0,5,17),(173,0,0,0,0,0,0,2,5,18),(174,0,0,0,0,0,0,0,5,19),(175,0,0,0,2,0,0,0,5,20),(176,0,0,0,0,0,0,0,5,21),(177,0,0,0,0,0,0,0,5,22),(178,0,0,0,2,0,0,0,5,23),(179,0,0,0,2,2,0,0,5,24),(180,0,0,0,0,0,0,0,5,25),(181,0,0,0,0,0,1,0,5,26),(182,0,0,0,0,0,0,0,5,27),(183,0,0,0,0,0,0,0,5,28),(184,0,0,0,0,0,0,0,5,29),(185,0,0,0,0,0,0,0,5,30),(186,0,0,0,0,0,0,0,5,31),(187,0,0,0,0,1,0,0,5,32),(188,0,0,0,0,1,0,0,5,33),(189,0,0,0,0,1,0,0,5,34),(190,0,0,0,0,1,0,0,5,35),(191,0,0,0,0,1,0,0,5,36),(192,0,0,0,0,1,0,0,5,37),(193,0,0,0,0,0,0,0,5,38),(194,0,0,0,0,0,0,0,5,39),(195,0,0,0,0,1,0,0,5,40),(196,0,0,0,0,0,0,0,6,2),(197,0,0,0,2,0,0,0,6,3),(198,0,0,0,0,0,0,0,6,4),(199,0,0,0,0,0,0,0,6,5),(200,0,0,0,0,0,0,0,6,6),(201,0,0,0,0,0,1,2,6,7),(202,0,0,0,0,0,1,2,6,8),(203,0,0,0,0,0,0,0,6,9),(204,0,0,0,0,0,0,0,6,10),(205,0,0,0,0,0,0,0,6,11),(206,0,0,0,0,0,0,0,6,12),(207,0,0,0,0,0,0,2,6,13),(208,0,0,0,0,0,0,0,6,14),(209,0,0,2,1,0,2,1,6,15),(210,0,0,0,0,0,0,0,6,16),(211,0,0,0,0,0,0,0,6,17),(212,0,0,0,0,0,0,2,6,18),(213,0,0,0,0,0,0,0,6,19),(214,0,0,0,2,0,0,0,6,20),(215,0,0,0,0,0,0,0,6,21),(216,0,0,0,0,0,0,0,6,22),(217,0,0,0,2,0,0,0,6,23),(218,0,0,0,2,2,0,0,6,24),(219,0,0,0,0,0,0,0,6,25),(220,0,0,0,0,0,0,0,6,26),(221,0,0,0,0,0,0,0,6,27),(222,0,0,0,0,0,0,0,6,28),(223,0,0,0,0,0,0,0,6,29),(224,0,0,0,0,0,0,0,6,30),(225,0,0,0,0,0,0,0,6,31),(226,0,0,0,0,0,0,0,6,32),(227,0,0,0,0,0,0,0,6,33),(228,0,0,0,0,0,0,0,6,34),(229,0,0,0,0,0,0,0,6,35),(230,0,0,0,0,0,0,0,6,36),(231,0,0,0,0,0,0,0,6,37),(232,0,0,0,0,0,0,0,6,38),(233,0,0,0,0,0,0,0,6,39),(234,0,0,0,0,0,0,0,6,40),(235,0,0,0,2,2,2,0,7,2),(236,0,0,0,0,0,0,0,7,3),(237,0,2,2,2,2,0,0,7,4),(238,0,2,2,2,2,2,0,7,5),(239,0,2,0,0,2,2,0,7,6),(240,0,0,0,0,0,0,2,7,7),(241,0,0,0,0,0,0,2,7,8),(242,0,0,2,2,0,0,0,7,9),(243,0,0,2,2,1,0,0,7,10),(244,0,0,2,2,1,0,0,7,11),(245,0,0,2,0,0,0,0,7,12),(246,0,0,0,0,0,0,2,7,13),(247,0,0,0,2,2,1,0,7,14),(248,0,0,0,0,0,0,0,7,15),(249,0,0,2,2,0,0,0,7,16),(250,0,0,2,2,2,0,0,7,17),(251,0,0,0,0,0,0,2,7,18),(252,0,0,2,2,2,2,2,7,19),(253,0,0,0,0,0,0,0,7,20),(254,0,0,0,0,0,0,0,7,21),(255,0,0,0,0,0,0,0,7,22),(256,0,0,0,0,0,0,0,7,23),(257,0,0,0,0,0,0,0,7,24),(258,0,0,2,0,0,2,0,7,25),(259,0,0,2,0,0,2,2,7,26),(260,0,0,2,0,0,2,2,7,27),(261,0,0,2,2,2,0,0,7,28),(262,0,0,0,0,0,0,0,7,29),(263,0,4,4,4,0,0,0,7,30),(264,0,0,0,0,0,0,0,7,31),(265,0,0,0,0,2,0,0,7,32),(266,0,0,0,0,2,0,0,7,33),(267,0,0,0,0,2,0,0,7,34),(268,0,0,0,0,2,0,0,7,35),(269,0,0,0,0,2,0,0,7,36),(270,0,0,0,0,2,0,0,7,37),(271,0,0,0,0,2,0,0,7,38),(272,0,0,0,0,0,0,0,7,39),(273,0,0,0,0,2,0,0,7,40);
/*!40000 ALTER TABLE `exercise_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `record_data`
--

DROP TABLE IF EXISTS `record_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `record_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weight` decimal(10,0) NOT NULL,
  `height` decimal(10,0) NOT NULL,
  `calories` decimal(10,0) NOT NULL,
  `assist` decimal(10,0) NOT NULL,
  `reps` int(11) NOT NULL,
  `time` time NOT NULL,
  `athleteid` int(11) NOT NULL,
  `workout_detailid` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `record_data_athlete` (`athleteid`),
  KEY `record_data_detail_workout` (`workout_detailid`),
  CONSTRAINT `record_data_athlete` FOREIGN KEY (`athleteid`) REFERENCES `athlete` (`id`),
  CONSTRAINT `record_data_detail_workout` FOREIGN KEY (`workout_detailid`) REFERENCES `workout_detail` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `record_data`
--

LOCK TABLES `record_data` WRITE;
/*!40000 ALTER TABLE `record_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `record_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sex_type`
--

DROP TABLE IF EXISTS `sex_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sex_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sex_type`
--

LOCK TABLES `sex_type` WRITE;
/*!40000 ALTER TABLE `sex_type` DISABLE KEYS */;
INSERT INTO `sex_type` VALUES (1,'Male'),(2,'Female');
/*!40000 ALTER TABLE `sex_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Jason','pass1','test1@example.com'),(2,'test2','pass2','test2@example.com'),(3,'test3','pass3','test3@example.com'),(4,'test4','pass4','test4@example.com'),(5,'test5','pass5','test5@example.com'),(6,'test6','pass6','test6@example.com'),(7,'test7','pass7','test7@example.com'),(8,'test8','pass8','test8@example.com'),(9,'test9','pass9','test9@example.com'),(10,'test10','pass10','test10@example.com'),(11,'test11','pass11','test11@example.com'),(12,'test12','pass12','test12@example.com'),(13,'test13','pass13','test13@example.com'),(14,'test14','pass14','test14@example.com'),(15,'test15','pass15','test15@example.com'),(16,'test16','pass16','test16@example.com'),(17,'test17','pass17','test17@example.com'),(18,'test18','pass18','test18@example.com'),(19,'test19','pass19','test19@example.com'),(20,'test20','pass20','test20@example.com'),(21,'test21','pass21','test21@example.com');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workout`
--

DROP TABLE IF EXISTS `workout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `workout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(150) NOT NULL,
  `workout_typeid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `workout_workout_type` (`workout_typeid`),
  CONSTRAINT `workout_workout_type` FOREIGN KEY (`workout_typeid`) REFERENCES `workout_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workout`
--

LOCK TABLES `workout` WRITE;
/*!40000 ALTER TABLE `workout` DISABLE KEYS */;
INSERT INTO `workout` VALUES (1,'2014-04-07','Mary','No se',2),(8,'2014-04-07','fran','no se',1),(9,'2014-04-08','Fran','12-15-9 thrusters, pullups',1),(10,'2014-04-11','Henry','working',1);
/*!40000 ALTER TABLE `workout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workout_detail`
--

DROP TABLE IF EXISTS `workout_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `workout_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `measure_weight` tinyint(1) NOT NULL,
  `measure_height` tinyint(1) NOT NULL,
  `measure_calories` tinyint(1) NOT NULL,
  `measure_assist` tinyint(1) NOT NULL,
  `total_reps` int(11) DEFAULT NULL,
  `total_time` time DEFAULT NULL,
  `workoutid` int(11) NOT NULL,
  `exerciseid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_workout_workout` (`workoutid`),
  KEY `workout_detail_exercise_profile` (`exerciseid`),
  CONSTRAINT `detail_workout_workout` FOREIGN KEY (`workoutid`) REFERENCES `workout` (`id`),
  CONSTRAINT `workout_detail_exercise_profile` FOREIGN KEY (`exerciseid`) REFERENCES `exercise` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workout_detail`
--

LOCK TABLES `workout_detail` WRITE;
/*!40000 ALTER TABLE `workout_detail` DISABLE KEYS */;
INSERT INTO `workout_detail` VALUES (4,0,0,1,0,20,'10:00:00',1,13),(5,1,1,0,0,20,'20:10:00',8,18),(6,1,0,1,1,20,'10:15:00',8,8),(7,1,0,1,1,20,'01:20:00',1,18),(8,0,1,0,0,20,NULL,8,17),(12,0,0,1,1,20,NULL,8,2),(15,0,1,0,0,20,'10:10:00',1,10),(17,0,1,0,0,NULL,'15:12:00',1,37),(18,0,0,1,1,50,NULL,8,40),(19,0,1,1,0,NULL,'15:12:00',1,13),(20,1,0,1,0,NULL,'01:00:00',1,6),(37,0,1,1,0,10,NULL,8,12),(38,1,1,1,1,NULL,'15:12:00',1,35),(39,0,1,1,1,NULL,'15:10:00',1,19),(45,1,0,0,1,NULL,'15:00:00',1,12),(49,0,1,1,0,10,NULL,10,12),(51,1,1,1,1,10,NULL,10,7);
/*!40000 ALTER TABLE `workout_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workout_type`
--

DROP TABLE IF EXISTS `workout_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `workout_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workout_type`
--

LOCK TABLES `workout_type` WRITE;
/*!40000 ALTER TABLE `workout_type` DISABLE KEYS */;
INSERT INTO `workout_type` VALUES (1,'ForTime'),(2,'ForReps'),(3,'MaxWeight'),(4,'NoScore');
/*!40000 ALTER TABLE `workout_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-04-10 11:42:36
