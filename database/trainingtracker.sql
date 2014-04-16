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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `athlete`
--

LOCK TABLES `athlete` WRITE;
/*!40000 ALTER TABLE `athlete` DISABLE KEYS */;
INSERT INTO `athlete` VALUES (1,'chitin','Burton','barry@gmail.com',21.00,131.00,1),(2,'chitin','zamora','zamora@gmail.com',21.00,81.00,1),(3,'chitin','zamora','chitin@gmail.com',20.00,30.00,1),(5,'javier','dobles','javier@avantica.net',20.00,99.99,2),(6,'genesis','parrales','javier@avantica.net',30.00,39.58,2),(7,'christhian','perez','javier@avantica.net',40.00,39.00,1),(8,'javier','dobles','javier@avantica.net',80.99,78.99,2);
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
  `weight` decimal(10,6) NOT NULL,
  `height` decimal(10,6) NOT NULL,
  `sex_typeid` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `body_profiles_sex_type` (`sex_typeid`),
  CONSTRAINT `body_profiles_sex_type` FOREIGN KEY (`sex_typeid`) REFERENCES `sex_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `body_profiles`
--

LOCK TABLES `body_profiles` WRITE;
/*!40000 ALTER TABLE `body_profiles` DISABLE KEYS */;
INSERT INTO `body_profiles` VALUES (1,'Legs',20,10,2),(2,'Arms',20,30,2),(3,'Trunk',54,54,1),(4,'Upper Arm',3,3,1),(5,'Forearm and half hand',2,2,1),(6,'Thigh',11,11,1),(7,'Leg and foot',6,6,1),(8,'Weight',100,100,1),(9,'Head and Neck',11,11,1),(10,'Trunk',30,30,2),(11,'Upper Arm',17,17,2),(12,'Forearm and half hand',19,19,2),(13,'Thigh',23,23,2),(14,'Leg and foot',29,29,2),(15,'Other Distance',100,100,2);
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
  `attr1` decimal(10,6) NOT NULL,
  `attr2` decimal(10,6) NOT NULL,
  `attr3` decimal(10,6) NOT NULL,
  `attr4` decimal(10,6) NOT NULL,
  `attr5` decimal(10,6) NOT NULL,
  `attr6` decimal(10,6) NOT NULL,
  `attr7` decimal(10,6) NOT NULL,
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
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (1,0,0,0,0,0,2,0,1,1);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (2,0,0,0,2,0,0,0,1,2);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (3,0,0,0,0,0,0,0,1,3);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (4,0,0,0,0,0,0,0,1,4);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (5,0,0,0,0,0,0,0,1,5);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (6,1,2,0,0,2,2,2,1,6);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (7,1,2,0,0,2,2,2,1,7);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (8,0,0,0,0,0,0,0,1,8);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (9,0,0,0,0,0.5,0,0,1,9);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (10,0,0,0,0,0.5,0,0,1,10);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (11,0,0,2,0,0,0,0,1,11);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (12,0,0,0,0,0,0,2,1,12);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (13,0,0,0,0,0,2.25,0,1,13);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (14,0,0,0,0,0,0,0,1,14);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (15,0,0,0,0,0,0,0,1,15);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (16,0,0,0,0,0,0,0,1,16);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (17,0,0,0,0,0,0,2,1,17);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (18,0,0,0,0,0,0,0,1,18);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (19,0,0,0,1,0,0,0,1,19);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (20,0,0,0,2,2,0,0,1,20);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (21,0,0,0,2,2,0,0,1,21);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (22,0,0,0.25,2,0,0,0,1,22);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (23,0,0,0,2,2,0,0,1,23);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (24,0,0,0,0,0,0,0,1,24);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (25,0,0,0,0,0,2,0,1,25);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (26,0,0,2,0,0,0,0,1,26);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (27,0,0,0,0,0,0,0,1,27);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (28,0,0,0,0,0,0,0,1,28);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (29,2,2,0,0,0,0,0,1,29);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (30,2,2,0,0,0,0,0,1,30);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (31,0,0,0,0,2,0,0,1,31);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (32,0,0,0,0,2,0,0,1,32);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (33,0,0,0,0,2,0,0,1,33);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (34,0,0,0,0,2,0,0,1,34);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (35,0,0,0,0,2,0,0,1,35);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (36,0,0,0,0,2,0,0,1,36);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (37,0,0,0,0,0.5,0,0,1,37);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (38,0,0,0,0,0,0,0,1,38);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (39,0,0,0,0,2,0,0,1,39);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (40,0,0,0,0,0,2,0,2,1);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (41,0,0,0,2,0,0,0,2,2);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (42,0,0.5,0,0,0,0,0,2,3);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (43,0,1,0,0,0,0,0,2,4);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (44,0,0,0.5,0,0,0,0,2,5);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (45,0,1,0,0,2,2,2,2,6);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (46,0,1,0,0,2,2,2,2,7);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (47,0,0,0,0,0,0,0,2,8);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (48,0,0,0,0,0.5,0,0,2,9);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (49,0,0,0,0,0.5,0,0,2,10);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (50,0,0,1,0,0,0,0,2,11);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (51,0,0,0,0,0,0,2,2,12);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (52,0,0,0,0,0,2.25,0,2,13);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (53,0,0,0,0,0,0,0,2,14);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (54,0,0,0,0,0,0,0,2,15);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (55,0,0,0,0,0,0,0,2,16);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (56,0,0,0,0,0,0,2,2,17);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (57,0,0,0,0,0,0,0,2,18);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (58,0,0,0,2,0,0,0,2,19);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (59,0,0,0,2,2,0,0,2,20);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (60,0,0,0,2,2,0,0,2,21);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (61,0,0,0.25,2,0,0,0,2,22);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (62,0,0,0,2,2,0,0,2,23);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (63,0,0,0,0,0,0,0,2,24);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (64,0,0,0,0,0,2,0,2,25);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (65,0,0,1,0,0,0,0,2,26);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (66,0,0,0,0,0,0,0,2,27);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (67,0,0,0,0,0,0,0,2,28);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (68,0,2,0,0,0,0,0,2,29);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (69,0,2,0,0,0,0,0,2,30);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (70,0,0,0,0,2,0,0,2,31);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (71,0,0,0,0,2,0,0,2,32);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (72,0,0,0,0,2,0,0,2,33);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (73,0,0,0,0,2,0,0,2,34);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (74,0,0,0,0,2,0,0,2,35);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (75,0,0,0,0,2,0,0,2,36);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (76,0,0,0,0,0.5,0,0,2,37);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (77,0,0,0,0,0,0,0,2,38);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (78,0,0,0,0,2,0,0,2,39);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (79,0,0,0,2,0,2,0,3,1);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (80,0,0,0,1,0,0,0,3,2);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (81,0,0,0,2,0,0,0,3,3);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (82,0,0,0,2,0,0,0,3,4);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (83,0,0,0,2,0,0,0,3,5);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (84,0,1.5,1,0,2,2,2,3,6);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (85,0,1.5,1,0,2,2,2,3,7);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (86,0,0,1,0,0,0,0,3,8);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (87,0,0,1,2,0.5,0,0,3,9);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (88,0,0,1,2,0.5,0,0,3,10);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (89,0,0,2,0,0,0,0,3,11);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (90,0,0,0,0,0,0,2,3,12);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (91,0,0,0,1,0,0.25,0,3,13);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (92,0,0,0,0,0,0,0,3,14);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (93,0,0,1,0,0,0,0,3,15);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (94,0,0,0,2,0,0,0,3,16);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (95,0,0,0,0,0,0,2,3,17);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (96,0,0,0,2,0,2,0,3,18);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (97,0,0,0,1,0,0,0,3,19);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (98,0,0,0,0,0,0,0,3,20);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (99,0,0,0,0,0,0,0,3,21);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (100,0,0,0,1,0,0,0,3,22);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (101,0,0,0,1,0,0,0,3,23);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (102,0,0,0,1,0,0,0,3,24);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (103,0,0,0,0,0,2,0,3,25);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (104,0,0,2,1,0,0,0,3,26);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (105,0,0,0,2,0,2,0,3,27);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (106,0,0,0,0,0,0,0,3,28);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (107,0,2,0,0,0,0,0,3,29);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (108,0,2,0,0,0,0,0,3,30);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (109,0,0,0,0,2,0,0,3,31);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (110,0,0,0,0,2,0,0,3,32);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (111,0,0,0,0,2,0,0,3,33);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (112,0,0,0,0,2,0,0,3,34);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (113,0,0,0,0,2,0,0,3,35);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (114,0,0,0,0,2,0,0,3,36);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (115,0,0,1,2,0.5,0,0,3,37);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (116,0,0,0,0,0,0,0,3,38);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (117,0,0,0,0,2,0,0,3,39);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (118,0,0,0,2,1,2,0,4,1);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (119,0,0,0,0,0,0,0,4,2);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (120,0,0,1,2,2,0,0,4,3);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (121,0,0,1,2,2,0.8,0,4,4);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (122,0,0,1,2,2,0.8,0,4,5);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (123,0,0.75,0,0,2,2,2,4,6);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (124,0,0.75,0,0,2,2,2,4,7);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (125,0,0,2,1,0,0,0,4,8);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (126,0,0,1,2,0.5,0,0,4,9);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (127,0,0,1,2,0.5,0,0,4,10);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (128,0,0,2,0,0,0,0,4,11);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (129,0,0,0,0,0,0,2,4,12);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (130,0,0,0,2,1,0.25,0,4,13);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (131,0,0,0,0,0,0,0,4,14);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (132,0,0,2,1,0,0,0,4,15);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (133,0,0,2,2,1,0,0,4,16);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (134,0,0,0,0,0,0,2,4,17);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (135,0,0,0,2,1,2,1,4,18);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (136,0,0,0,0,0,0,0,4,19);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (137,0,0,0,0,0,0,0,4,20);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (138,0,0,0,0,0,0,0,4,21);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (139,0,0,0,0,0,0,0,4,22);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (140,0,0,0,0,0,0,0,4,23);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (141,0,0,0,2,1,0,0,4,24);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (142,0,0,0,0,0,2,0,4,25);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (143,0,0,2,2,1,0,0,4,26);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (144,0,0,0,2,1,2,1,4,27);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (145,0,0,0,0,0,0,0,4,28);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (146,0,2,0,0,0,0,0,4,29);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (147,0,2,0,0,0,0,0,4,30);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (148,0,0,0,0,2,0,0,4,31);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (149,0,0,0,0,2,0,0,4,32);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (150,0,0,0,0,2,0,0,4,33);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (151,0,0,0,0,2,0,0,4,34);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (152,0,0,0,0,2,0,0,4,35);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (153,0,0,0,0,2,0,0,4,36);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (154,0,0,1,2,0.5,0,0,4,37);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (155,0,0,0,0,0,0,0,4,38);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (156,0,0,0,0,2,0,0,4,39);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (157,0,0,0,0,0,0,0,5,1);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (158,0,0,0,2,0,0,0,5,2);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (159,0,0,0,0,0,0,0,5,3);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (160,0,0,0,0,0,0,0,5,4);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (161,0,0,0,0,0,0,0,5,5);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (162,0,0,0,0,1,2,2,5,6);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (163,0,0,0,0,1,2,2,5,7);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (164,0,0,0,0,0,0,0,5,8);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (165,0,0,0,0,0.25,0,0,5,9);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (166,0,0,0,0,0.25,0,0,5,10);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (167,0,0,0,0,0,0,0,5,11);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (168,0,0,0,0,0,0,2,5,12);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (169,0,0,0,0,0,1.125,0,5,13);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (170,0,0,2,0,0,1,0,5,14);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (171,0,0,0,0,0,0,0,5,15);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (172,0,0,0,0,0,0,0,5,16);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (173,0,0,0,0,0,0,2,5,17);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (174,0,0,0,0,0,0,0,5,18);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (175,0,0,0,2,0,0,0,5,19);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (176,0,0,0,0.4,0.4,0,0,5,20);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (177,0,0,0,0.4,0.4,0,0,5,21);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (178,0,0,0.25,2,0,0,0,5,22);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (179,0,0,0,2,2,0,0,5,23);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (180,0,0,0,0,0,0,0,5,24);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (181,0,0,0,0,0,1,0,5,25);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (182,0,0,0,0,0,0,0,5,26);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (183,0,0,0,0,0,0,0,5,27);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (184,0,0,0,0,0,0,0,5,28);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (185,0,0,0,0,0,0,0,5,29);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (186,0,0,0,0,0,0,0,5,30);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (187,0,0,0,0,1,0,0,5,31);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (188,0,0,0,0,1,0,0,5,32);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (189,0,0,0,0,1,0,0,5,33);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (190,0,0,0,0,1,0,0,5,34);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (191,0,0,0,0,1,0,0,5,35);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (192,0,0,0,0,1,0,0,5,36);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (193,0,0,0,0,0.25,0,0,5,37);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (194,0,0.203873598,0,0,0,0,0,5,38);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (195,0,0,0,0,1,0,0,5,39);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (196,0,0,0,0,0,0,0,6,1);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (197,0,0,0,2,0,0,0,6,2);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (198,0,0,0,0,0,0,0,6,3);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (199,0,0,0,0,0,0,0,6,4);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (200,0,0,0,0,0,0,0,6,5);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (201,0,0,0,0,0,1,2,6,6);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (202,0,0,0,0,0,1,2,6,7);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (203,0,0,0,0,0,0,0,6,8);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (204,0,0,0,0,0,0,0,6,9);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (205,0,0,0,0,0,0,0,6,10);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (206,0,0,0,0,0,0,0,6,11);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (207,0,0,0,0,0,0,2,6,12);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (208,0,0,0,0,0,0,0,6,13);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (209,0,0,2,1,0,2,1,6,14);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (210,0,0,0,0,0,0,0,6,15);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (211,0,0,0,0,0,0,0,6,16);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (212,0,0,0,0,0,0,2,6,17);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (213,0,0,0,0,0,0,0,6,18);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (214,0,0,0,2,0,0,0,6,19);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (215,0,0,0,0.2,0.2,0,0,6,20);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (216,0,0,0,0.2,0.2,0,0,6,21);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (217,0,0,0.25,2,0,0,0,6,22);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (218,0,0,0,2,2,0,0,6,23);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (219,0,0,0,0,0,0,0,6,24);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (220,0,0,0,0,0,0,0,6,25);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (221,0,0,0,0,0,0,0,6,26);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (222,0,0,0,0,0,0,0,6,27);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (223,0,0,0,0,0,0,0,6,28);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (224,0,0,0,0,0,0,0,6,29);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (225,0,0,0,0,0,0,0,6,30);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (226,0,0,0,0,0,0,0,6,31);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (227,0,0,0,0,0,0,0,6,32);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (228,0,0,0,0,0,0,0,6,33);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (229,0,0,0,0,0,0,0,6,34);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (230,0,0,0,0,0,0,0,6,35);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (231,0,0,0,0,0,0,0,6,36);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (232,0,0,0,0,0,0,0,6,37);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (233,0,0.203873598,0,0,0,0,0,6,38);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (234,0,0,0,0,0,0,0,6,39);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (235,0,0,0,2,2,2,0,7,1);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (236,0,0,0,0,0,0,0,7,2);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (237,0,2,2,2,2,0,0,7,3);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (238,0,2,2,2,2,1.6,0,7,4);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (239,0,2,0,0,2,1.6,0,7,5);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (240,0,0,0,0,0,0,2,7,6);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (241,0,0,0,0,0,0,2,7,7);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (242,0,0,2,2,0,0,0,7,8);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (243,0,0,2,2,0.5,0,0,7,9);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (244,0,0,2,2,0.5,0,0,7,10);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (245,0,0,2,0,0,0,0,7,11);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (246,0,0,0,0,0,0,2,7,12);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (247,0,0,0,2,2,1.25,0,7,13);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (248,0,0,0,0,0,0,0,7,14);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (249,0,0,2,2,0,0,0,7,15);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (250,0,0,2,2,2,0,0,7,16);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (251,0,0,0,0,0,0,2,7,17);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (252,0,0,2,1.5,1.5,2,2,7,18);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (253,0,0,0,0,0,0,0,7,19);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (254,0,0,0,0,0,0,0,7,20);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (255,0,0,0,0,0,0,0,7,21);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (256,0,0,0,0,0,0,0,7,22);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (257,0,0,0,0,0,0,0,7,23);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (258,0,0,2,0,0,1.6,0,7,24);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (259,0,0,2,0,0,2,2,7,25);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (260,0,0,2,0,0,2,2,7,26);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (261,0,0,2,1.5,1.5,0,0,7,27);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (262,0,0,0,0,0,0,0,7,28);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (263,0,4,4,4,0,0,0,7,29);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (264,0,0,0,0,0,0,0,7,30);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (265,0,0,0,0,2,0,0,7,31);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (266,0,0,0,0,2,0,0,7,32);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (267,0,0,0,0,2,0,0,7,33);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (268,0,0,0,0,2,0,0,7,34);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (269,0,0,0,0,2,0,0,7,35);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (270,0,0,0,0,2,0,0,7,36);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (271,0,0,0,0,2,0,0,7,37);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (272,0,0,0,0,0,0,0,7,38);
INSERT INTO `exercise_detail` (`id`, `attr1`, `attr2`, `attr3`, `attr4`, `attr5`, `attr6`, `attr7`, `body_profilesId`, `exerciseid`) VALUES (273,0,0,0,0,2,0,0,7,39);

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
  `weight` decimal(10,6) NOT NULL,
  `height` decimal(10,6) NOT NULL,
  `calories` decimal(10,6) NOT NULL,
  `assist` decimal(10,6) NOT NULL,
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

-- Dump completed on 2014-04-09 13:00:20
