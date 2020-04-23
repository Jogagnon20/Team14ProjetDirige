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
-- Table structure for table `Achat`
--

DROP TABLE IF EXISTS `Achat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Achat` (
  `idAchat` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `idClient` int(11) NOT NULL,
  PRIMARY KEY (`idAchat`),
  UNIQUE KEY `noCommande_UNIQUE` (`idAchat`),
  KEY `idClient_idx` (`idClient`),
  CONSTRAINT `idClient` FOREIGN KEY (`idClient`) REFERENCES `Clients` (`idClient`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Achat`
--

LOCK TABLES `Achat` WRITE;
/*!40000 ALTER TABLE `Achat` DISABLE KEYS */;
/*!40000 ALTER TABLE `Achat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `AchatsReels`
--

DROP TABLE IF EXISTS `AchatsReels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `AchatsReels` (
  `idBillet` int(11) NOT NULL,
  `idAchat` int(11) NOT NULL,
  `Quantite` int(11) NOT NULL,
  PRIMARY KEY (`idAchat`,`idBillet`),
  CONSTRAINT `fk_idAchat` FOREIGN KEY (`idAchat`) REFERENCES `Achat` (`idAchat`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AchatsReels`
--

LOCK TABLES `AchatsReels` WRITE;
/*!40000 ALTER TABLE `AchatsReels` DISABLE KEYS */;
/*!40000 ALTER TABLE `AchatsReels` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `Categories`
--

DROP TABLE IF EXISTS `Categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Categories` (
  `idCategorie` char(3) NOT NULL,
  `Description` varchar(45) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Categories`
--

LOCK TABLES `Categories` WRITE;
/*!40000 ALTER TABLE `Categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `Categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Clients`
--

DROP TABLE IF EXISTS `Clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Clients` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `nomClient` varchar(50) NOT NULL,
  `adresseClient` varchar(50) NOT NULL,
  `telephoneClient` varchar(12) NOT NULL,
  PRIMARY KEY (`idClient`),
  UNIQUE KEY `idClient_UNIQUE` (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Clients`
--

LOCK TABLES `Clients` WRITE;
/*!40000 ALTER TABLE `Clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `Clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Representations`
--

DROP TABLE IF EXISTS `Representations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Representations` (
  `idRepresentation` int(11) NOT NULL AUTO_INCREMENT,
  `idSpectacle` int(11) NOT NULL,
  `idSalle` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  PRIMARY KEY (`idRepresentation`,`idSpectacle`),
  UNIQUE KEY `idRepresentation_UNIQUE` (`idRepresentation`),
  KEY `idSalle_idx` (`idSalle`),
  KEY `fk_idSpectacle` (`idSpectacle`),
  CONSTRAINT `fk_idSalle` FOREIGN KEY (`idSalle`) REFERENCES `Salles` (`idSalle`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_idSpectacle` FOREIGN KEY (`idSpectacle`) REFERENCES `Spectacles` (`idSpectacle`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Representations`
--

LOCK TABLES `Representations` WRITE;
/*!40000 ALTER TABLE `Representations` DISABLE KEYS */;
/*!40000 ALTER TABLE `Representations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Salles`
--

DROP TABLE IF EXISTS `Salles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Salles` (
  `idSalle` int(11) NOT NULL AUTO_INCREMENT,
  `Adresse` varchar(45) NOT NULL,
  `Capacite` int(11) NOT NULL,
  PRIMARY KEY (`idSalle`),
  UNIQUE KEY `idSalle_UNIQUE` (`idSalle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Salles`
--

LOCK TABLES `Salles` WRITE;
/*!40000 ALTER TABLE `Salles` DISABLE KEYS */;
/*!40000 ALTER TABLE `Salles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Sections`
--

DROP TABLE IF EXISTS `Sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Sections` (
  `idSection` int(11) NOT NULL,
  `idSalle` int(11) NOT NULL,
  `Couleur` varchar(45) NOT NULL,
  `fm_Prix` decimal(10,0) NOT NULL,
  PRIMARY KEY (`idSection`,`idSalle`),
  KEY `idSalle_idx` (`idSalle`),
  CONSTRAINT `idSalle` FOREIGN KEY (`idSalle`) REFERENCES `Salles` (`idSalle`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Sections`
--

LOCK TABLES `Sections` WRITE;
/*!40000 ALTER TABLE `Sections` DISABLE KEYS */;
/*!40000 ALTER TABLE `Sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Spectacles`
--

DROP TABLE IF EXISTS `Spectacles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Spectacles` (
  `idSpectacle` int(11) NOT NULL AUTO_INCREMENT,
  `idCategorie` char(3) NOT NULL,
  `description` varchar(45) NOT NULL,
  `artiste` varchar(45) NOT NULL,
  `prix_de_base` decimal(10,0) NOT NULL,
  PRIMARY KEY (`idSpectacle`),
  UNIQUE KEY `idSpectacle_UNIQUE` (`idSpectacle`),
  UNIQUE KEY `idCategorie_UNIQUE` (`idCategorie`),
  CONSTRAINT `idCategorie` FOREIGN KEY (`idCategorie`) REFERENCES `Categories` (`idCategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Spectacles`
--

LOCK TABLES `Spectacles` WRITE;
/*!40000 ALTER TABLE `Spectacles` DISABLE KEYS */;
/*!40000 ALTER TABLE `Spectacles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-22 18:05:32
