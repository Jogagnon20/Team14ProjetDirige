-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: 167.114.152.54    Database: dbequipe14
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.44-MariaDB-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Billets`
--

DROP TABLE IF EXISTS `Billets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Billets` (
  `noBillet` int(11) NOT NULL AUTO_INCREMENT,
  `Prix_deBase` int(11) NOT NULL,
  `idSection` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `idRepresentation` int(11) NOT NULL,
  `idSalle` int(11) NOT NULL,
  PRIMARY KEY (`noBillet`),
  UNIQUE KEY `noBillet_UNIQUE` (`noBillet`),
  KEY `idSection_idx` (`idSection`),
  KEY `idClient_idx` (`idClient`),
  KEY `idRepresentation_idx` (`idRepresentation`),
  CONSTRAINT `fk_idClient_` FOREIGN KEY (`idClient`) REFERENCES `Clients` (`idClient`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_idRepresentation` FOREIGN KEY (`idRepresentation`) REFERENCES `Representations` (`idRepresentation`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_idSection` FOREIGN KEY (`idSection`) REFERENCES `Sections` (`idSection`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Billets`
--

LOCK TABLES `Billets` WRITE;
/*!40000 ALTER TABLE `Billets` DISABLE KEYS */;
/*!40000 ALTER TABLE `Billets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-22 18:04:56
