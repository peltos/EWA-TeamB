-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: ronpelt.synology.me    Database: mini
-- ------------------------------------------------------
-- Server version	5.5.57-MariaDB

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
-- Table structure for table `Streamer`
--

DROP TABLE IF EXISTS `Streamer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Streamer` (
  `streamID` int(11) NOT NULL AUTO_INCREMENT,
  `streamName` varchar(20) NOT NULL,
  `lastOnline` datetime DEFAULT NULL,
  `categorie` varchar(45) DEFAULT NULL,
  `website` varchar(25) NOT NULL,
  PRIMARY KEY (`streamID`)
) ENGINE=InnoDB AUTO_INCREMENT=38774590 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Streamer`
--

LOCK TABLES `Streamer` WRITE;
/*!40000 ALTER TABLE `Streamer` DISABLE KEYS */;
INSERT INTO `Streamer` VALUES (3459335,'Gq_viral','2018-04-10 14:02:49','Overwatch','mixer'),(10860522,'Netcode_II_TE5','2018-04-10 12:41:56','Overwatch','mixer'),(14155706,'BIGCHRISCHRIS','2018-04-10 14:02:49','Overwatch','mixer'),(14161322,'Jukenstines3','2018-04-10 12:41:56','Overwatch','mixer'),(15267542,'G0D_Kenpachi','2018-04-10 14:02:49','Overwatch','mixer'),(18106544,'RowdyRoyMkyBoy','2018-04-10 14:02:49','Overwatch','mixer'),(18287039,'Mini_El_Duga','2018-04-10 13:23:46','Overwatch','mixer'),(21627491,'ClubbedKnight60','2018-04-10 14:02:49','Overwatch','mixer'),(24732610,'LiftedTea99','2018-04-10 10:30:29','Overwatch','mixer'),(26141245,'TwoSundew7961','2018-04-10 12:41:57','Overwatch','mixer'),(26602324,'KinetikTheory','2018-04-10 14:02:49','Overwatch','mixer'),(28049987,'montie88','2018-04-10 14:02:49','Overwatch','mixer'),(28398320,'Commander_Kam','2018-04-10 14:02:49','Overwatch','mixer'),(31032009,'NGC_Jester','2018-04-10 14:02:49','Overwatch','mixer'),(31859448,'Troll1Maker','2018-04-10 14:02:49','Overwatch','mixer'),(32221836,'SolidestCrawdad','2018-04-10 14:02:49','Overwatch','mixer'),(32247162,'AMAZING_PARAD0X','2018-04-10 14:02:49','Overwatch','mixer'),(32371608,'LarceHobbit0181','2018-04-10 14:02:49','Overwatch','mixer'),(32379933,'XFroDoSwgginsX','2018-04-10 14:02:49','Overwatch','mixer'),(32544648,'Jkidplayer','2018-04-10 12:41:57','Overwatch','mixer');
/*!40000 ALTER TABLE `Streamer` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-10 14:08:15
