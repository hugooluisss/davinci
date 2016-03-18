CREATE DATABASE  IF NOT EXISTS `davinci` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `davinci`;
-- MySQL dump 10.13  Distrib 5.6.13, for osx10.6 (i386)
--
-- Host: 127.0.0.1    Database: davinci
-- ------------------------------------------------------
-- Server version	5.6.13

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
-- Table structure for table `estudiantenivel`
--

DROP TABLE IF EXISTS `estudiantenivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiantenivel` (
  `matricula` varchar(11) NOT NULL,
  `idEstudiante` bigint(20) unsigned NOT NULL,
  `idNivel` smallint(5) unsigned NOT NULL,
  `anio` year(4) NOT NULL,
  `estado` char(1) DEFAULT 'A',
  PRIMARY KEY (`matricula`),
  KEY `key_nivelEstudiante` (`idEstudiante`,`idNivel`),
  KEY `fk_nivel_idx` (`idNivel`),
  CONSTRAINT `fk_estudiante` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiante` (`idEstudiante`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_nivelnivel` FOREIGN KEY (`idNivel`) REFERENCES `nivel` (`idNivel`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiantenivel`
--

LOCK TABLES `estudiantenivel` WRITE;
/*!40000 ALTER TABLE `estudiantenivel` DISABLE KEYS */;
INSERT INTO `estudiantenivel` VALUES ('P2015H00013',20,1,2015,'A'),('P2016H00009',16,1,2016,'A');
/*!40000 ALTER TABLE `estudiantenivel` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-18  0:00:47
