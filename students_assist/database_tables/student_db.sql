-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: student_db
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comments_table`
--

DROP TABLE IF EXISTS `comments_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postid` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `timer1` varchar(100) DEFAULT NULL,
  `userid` text DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `photo` varchar(400) DEFAULT NULL,
  `data` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments_table`
--

LOCK TABLES `comments_table` WRITE;
/*!40000 ALTER TABLE `comments_table` DISABLE KEYS */;
INSERT INTO `comments_table` VALUES (13,20,'Am Interested','1728682683','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7','Esedo Fredrick','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7user1.png',NULL),(14,21,'Am Interested','1728683793','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7','Esedo Fredrick','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7user1.png',NULL);
/*!40000 ALTER TABLE `comments_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification_table`
--

DROP TABLE IF EXISTS `notification_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `userid` text DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `reciever_id` text DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `timing` varchar(100) DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `title_seo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification_table`
--

LOCK TABLES `notification_table` WRITE;
/*!40000 ALTER TABLE `notification_table` DISABLE KEYS */;
INSERT INTO `notification_table` VALUES (51,'19','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7','Esedo Fredrick','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7user1.png','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7','unread','post','1728680580','I can help Student with Physics and MathsTeaching','67099284de9b617286805800d804d0e5c8ed1606c88f555cf6a6337'),(52,'20','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7','Esedo Fredrick','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7user1.png','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7','read','post','1728680672','Am seeking for help on English Tutor','670992e0be12d1728680672a782d3f273f9b5f48002c671e137ecb0'),(53,'20','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7','Esedo Fredrick','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7user1.png','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7','unread','comment','1728682683','Am seeking for help on English Tutor','670992e0be12d1728680672a782d3f273f9b5f48002c671e137ecb0'),(54,'20','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7','Esedo Fredrick','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7user1.png','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7','unread','post_like','1728682690','Am seeking for help on English Tutor','670992e0be12d1728680672a782d3f273f9b5f48002c671e137ecb0'),(55,'21','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7','Esedo Fredrick','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7user1.png','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7','unread','post','1728682844','I can help student with Enterpreuship','67099b5c34f2517286828441e7ecf7045a6a659ce67c1ef11094cc9'),(56,'21','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7','Esedo Fredrick','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7user1.png','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7','unread','comment','1728683793','I can help student with Enterpreuship','67099b5c34f2517286828441e7ecf7045a6a659ce67c1ef11094cc9'),(57,'21','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7','Esedo Fredrick','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7user1.png','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7','unread','post_like','1728683797','I can help student with Enterpreuship','67099b5c34f2517286828441e7ecf7045a6a659ce67c1ef11094cc9'),(58,'22','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7','Esedo Fredrick','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7user1.png','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7','unread','post','1728683862','Am Seeking for help on Landslides Teaching in Geography','67099f561f36f172868386243a346e696fc6925706a8d5cf84120b9');
/*!40000 ALTER TABLE `notification_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_like_table`
--

DROP TABLE IF EXISTS `post_like_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_like_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postid` int(11) NOT NULL,
  `like_count` text DEFAULT NULL,
  `timer1` varchar(100) DEFAULT NULL,
  `userid` text DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_like_table`
--

LOCK TABLES `post_like_table` WRITE;
/*!40000 ALTER TABLE `post_like_table` DISABLE KEYS */;
INSERT INTO `post_like_table` VALUES (17,20,'1','1728682690','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7','Esedo Fredrick','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7user1.png'),(18,21,'1','1728683797','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7','Esedo Fredrick','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7user1.png');
/*!40000 ALTER TABLE `post_like_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts_table`
--

DROP TABLE IF EXISTS `posts_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `title_seo` varchar(200) DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `timer` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `userphoto` varchar(300) DEFAULT NULL,
  `userid` text DEFAULT NULL,
  `points` varchar(100) DEFAULT NULL,
  `total_comments` varchar(100) DEFAULT NULL,
  `total_like` varchar(20) DEFAULT NULL,
  `country_name` varchar(100) DEFAULT NULL,
  `country_nickname` varchar(100) DEFAULT NULL,
  `data` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts_table`
--

LOCK TABLES `posts_table` WRITE;
/*!40000 ALTER TABLE `posts_table` DISABLE KEYS */;
INSERT INTO `posts_table` VALUES (19,'I can help Student with Physics and MathsTeaching','67099284de9b617286805800d804d0e5c8ed1606c88f555cf6a6337','My name is Esedo Fredrick, Am From US. I can help educate students on physics and Mathematics. Interested Students should like my Post and  contact me in the Comment Section. You can also Email me from my Profile','1728680580','Esedo Fredrick','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7user1.png','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7','400','0','0','United States','Americans','Offering Help'),(20,'Am seeking for help on English Tutor','670992e0be12d1728680672a782d3f273f9b5f48002c671e137ecb0','\r\nMy name is Esedo Fredrick, Am From US. Am seeking for help on English Tutor. Can someone like my Post and  contact me in the Comment Section. You can also Email me from my Profile.','1728680672','Esedo Fredrick','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7user1.png','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7','400','1','1','United States','Americans','Seeking Help'),(21,'I can help student with Enterpreuship','67099b5c34f2517286828441e7ecf7045a6a659ce67c1ef11094cc9','My name is Esedo Fredrick. I can help student with Enterpreuship. Interested student should get back to me in the comment section or can send me an email from my profile','1728682844','Esedo Fredrick','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7user1.png','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7','400','1','1','United States','Americans','Offering Help'),(22,'Am Seeking for help on Landslides Teaching in Geography','67099f561f36f172868386243a346e696fc6925706a8d5cf84120b9','\r\nMy name is Esedo Fredrick, Am From US. Am seeking for Detailed help about Landslides in Geography. Can someone like my Post and  contact me in the Comment Section.\r\n You can also Email me from my Profile.','1728683862','Esedo Fredrick','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7user1.png','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7','400','0','0','United States','Americans','Seeking Help');
/*!40000 ALTER TABLE `posts_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_table`
--

DROP TABLE IF EXISTS `users_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) DEFAULT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `created_time` varchar(200) DEFAULT NULL,
  `timing` varchar(200) DEFAULT NULL,
  `userid` varchar(300) DEFAULT NULL,
  `photo` varchar(300) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `lat` varchar(30) DEFAULT NULL,
  `lng` varchar(30) DEFAULT NULL,
  `map_zoom` varchar(10) DEFAULT NULL,
  `country_nickname` varchar(30) DEFAULT NULL,
  `points` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_table`
--

LOCK TABLES `users_table` WRITE;
/*!40000 ALTER TABLE `users_table` DISABLE KEYS */;
INSERT INTO `users_table` VALUES (6,'test@gmail.com','Esedo Fredrick','$2y$04$sR8/r5VXnrBxQWWYFDO3T.ftUIpoR3fhsLHz8mVhzNX6Z1sjuYV7a','Friday, October 11, 2024, 4:57 pm','1728680278','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7','670991560a66c1728680278a4555a9ee2f275fa684d9e38fe82c1a7user1.png','United States','','39.78373','-100.445882','5','Americans','400');
/*!40000 ALTER TABLE `users_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'student_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-11 20:12:26
