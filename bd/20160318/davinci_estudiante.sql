CREATE DATABASE  IF NOT EXISTS `davinci` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `davinci`;
-- MySQL dump 10.13  Distrib 5.6.13, for osx10.6 (i386)
--
-- Host: localhost    Database: davinci
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiante` (
  `idEstudiante` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idSanguineo` smallint(5) unsigned DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `app` varchar(45) DEFAULT NULL,
  `apm` varchar(45) DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `idEstadoNac` int(10) unsigned DEFAULT NULL,
  `calle` text,
  `noExt` varchar(10) DEFAULT NULL,
  `noInt` varchar(10) DEFAULT NULL,
  `codigoPostal` varchar(5) DEFAULT NULL,
  `delegacion` varchar(100) DEFAULT NULL,
  `curp` varchar(18) DEFAULT NULL,
  `estatura` decimal(10,2) DEFAULT NULL,
  `peso` int(10) unsigned DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `estado` char(1) DEFAULT 'A',
  PRIMARY KEY (`idEstudiante`),
  KEY `i_esadoNac` (`idEstadoNac`),
  KEY `i_grupoSanguineo` (`idSanguineo`),
  CONSTRAINT `fk_estadoNac` FOREIGN KEY (`idEstadoNac`) REFERENCES `estado` (`idEstado`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_grupoSanguineo` FOREIGN KEY (`idSanguineo`) REFERENCES `grupoSanguineo` (`idSanguineo`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante`
--

LOCK TABLES `estudiante` WRITE;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` VALUES (16,7,'hugo luis','santiago','altamirano','1983-11-15',20,'av san antonio','12','6','71236','san antonio de la cal','SAAH831115HOCNLG04',1.78,85,'H','A'),(20,6,'perenganito','paterno','materno','1983-11-15',8,'Domi','','2','','Oaxaca','SAAH831115HOCNLGI8',1.09,75,'H','A');
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-18 13:55:56
