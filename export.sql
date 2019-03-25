-- MySQL dump 10.13  Distrib 5.1.73, for debian-linux-gnu (i486)
--
-- Host: 10.11.1.27    Database: vdurand
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.16.04.2

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
-- Table structure for table `TPC1_CATEGORIEAGE`
--

DROP TABLE IF EXISTS `TPC1_CATEGORIEAGE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TPC1_CATEGORIEAGE` (
  `CACode` int(2) NOT NULL,
  `CALibelle` varchar(50) NOT NULL,
  `CAAgeDebut` int(2) DEFAULT NULL,
  `CAAgeFin` int(2) DEFAULT NULL,
  PRIMARY KEY (`CACode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TPC1_CATEGORIEAGE`
--

LOCK TABLES `TPC1_CATEGORIEAGE` WRITE;
/*!40000 ALTER TABLE `TPC1_CATEGORIEAGE` DISABLE KEYS */;
INSERT INTO `TPC1_CATEGORIEAGE` VALUES (1,'Petits poussins',5,7),(2,'Poussins',8,9),(3,'Pupilles',10,11),(4,'Benjamin',12,13),(5,'Minimes',14,15),(6,'Cadets',16,17),(7,'Juniors',18,19),(8,'Seniors',20,59),(9,'Veterans',60,110);
/*!40000 ALTER TABLE `TPC1_CATEGORIEAGE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TPC1_CLUB`
--

DROP TABLE IF EXISTS `TPC1_CLUB`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TPC1_CLUB` (
  `CLBNum` int(2) NOT NULL,
  `CLBNom` varchar(50) DEFAULT NULL,
  `CLBRue` varchar(150) DEFAULT NULL,
  `CLBCodePostal` varchar(5) DEFAULT NULL,
  `CLBVille` varchar(150) DEFAULT NULL,
  `CLBTelephone` varchar(14) DEFAULT NULL,
  `CLBMail` varchar(255) NOT NULL,
  PRIMARY KEY (`CLBNum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TPC1_CLUB`
--

LOCK TABLES `TPC1_CLUB` WRITE;
/*!40000 ALTER TABLE `TPC1_CLUB` DISABLE KEYS */;
INSERT INTO `TPC1_CLUB` VALUES (1,'OTC45','14 r Faubourg Saint JEAN','45000','Orléans','06 68 99 11 11','OTC45@gmail.com'),(2,'Elan sportif de Clergie','114 r Pierre de Taille','45720','CLERGIE','06 88 19 31 71','');
/*!40000 ALTER TABLE `TPC1_CLUB` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TPC1_ENTRAINE`
--

DROP TABLE IF EXISTS `TPC1_ENTRAINE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TPC1_ENTRAINE` (
  `ENTTRIANumLicence` varchar(7) NOT NULL,
  `ENTCLBNum` int(2) NOT NULL,
  `ENTDatePremiereLicence` date DEFAULT NULL,
  `ENTDateDerniereLicence` date DEFAULT NULL,
  PRIMARY KEY (`ENTTRIANumLicence`,`ENTCLBNum`),
  KEY `ENTCLBNum` (`ENTCLBNum`),
  CONSTRAINT `TPC1_ENTRAINE_ibfk_1` FOREIGN KEY (`ENTTRIANumLicence`) REFERENCES `TPC1_TRIATHLETE` (`TRIANumLicence`),
  CONSTRAINT `TPC1_ENTRAINE_ibfk_2` FOREIGN KEY (`ENTCLBNum`) REFERENCES `TPC1_CLUB` (`CLBNum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TPC1_ENTRAINE`
--

LOCK TABLES `TPC1_ENTRAINE` WRITE;
/*!40000 ALTER TABLE `TPC1_ENTRAINE` DISABLE KEYS */;
INSERT INTO `TPC1_ENTRAINE` VALUES ('A104526',1,'2019-02-15','2019-02-15');
/*!40000 ALTER TABLE `TPC1_ENTRAINE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TPC1_ENTRAINEUR`
--

DROP TABLE IF EXISTS `TPC1_ENTRAINEUR`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TPC1_ENTRAINEUR` (
  `ENTRTRIANumLicence` varchar(7) NOT NULL,
  `ENTRCLBNum` int(2) NOT NULL,
  PRIMARY KEY (`ENTRTRIANumLicence`,`ENTRCLBNum`),
  KEY `ENTRCLBNum` (`ENTRCLBNum`),
  CONSTRAINT `TPC1_ENTRAINEUR_ibfk_1` FOREIGN KEY (`ENTRTRIANumLicence`) REFERENCES `TPC1_TRIATHLETE` (`TRIANumLicence`),
  CONSTRAINT `TPC1_ENTRAINEUR_ibfk_2` FOREIGN KEY (`ENTRCLBNum`) REFERENCES `TPC1_CLUB` (`CLBNum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TPC1_ENTRAINEUR`
--

LOCK TABLES `TPC1_ENTRAINEUR` WRITE;
/*!40000 ALTER TABLE `TPC1_ENTRAINEUR` DISABLE KEYS */;
/*!40000 ALTER TABLE `TPC1_ENTRAINEUR` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TPC1_TRIATHLETE`
--

DROP TABLE IF EXISTS `TPC1_TRIATHLETE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TPC1_TRIATHLETE` (
  `TRIANumLicence` varchar(7) NOT NULL,
  `TRIANom` varchar(50) DEFAULT NULL,
  `TRIAPrenom` varchar(50) DEFAULT NULL,
  `TRIASexe` varchar(1) DEFAULT NULL,
  `TRIARue` varchar(150) DEFAULT NULL,
  `TRIACodePostal` varchar(5) DEFAULT NULL,
  `TRIAVille` varchar(150) DEFAULT NULL,
  `TRIADateNaissance` date DEFAULT NULL,
  `TRIACaCode` int(2) DEFAULT NULL,
  PRIMARY KEY (`TRIANumLicence`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TPC1_TRIATHLETE`
--

LOCK TABLES `TPC1_TRIATHLETE` WRITE;
/*!40000 ALTER TABLE `TPC1_TRIATHLETE` DISABLE KEYS */;
INSERT INTO `TPC1_TRIATHLETE` VALUES ('A104526','GUIMOT','Jean','M','34 rue de la Bergerie','45720','CLERGIE','1967-07-21',8),('A11530','NAREFF','Albert','M','95, rue de la planche','45720','CLERGIE','2050-01-28',9),('A154525','PASCAL','Hervé','M','5, rue de la franchise','45720','CLERGIE','1956-04-05',9),('A154530','GERARD','Lambert','M','95, rue de la mobylette','45720','CLERGIE','2012-01-17',1),('A154570','Sasoule','Bastien','M','35, rue de la goéllette','45120','BELLAT','2000-03-15',7),('A184525','PASCALINE','Aimé','M','5, rue de la franchise','45720','CLERGIE','2007-09-12',4),('A184526','BOU','Karim','M','15, rue du mensonge','45720','CLERGIE','2011-03-11',2),('A184528','BOU','Karine','F','15, rue du mensonge','45720','CLERGIE','2009-11-22',3),('A191402','VELIOT','Julien','M','3 rue des Ormes','45120','BELLAT','1998-03-26',8);
/*!40000 ALTER TABLE `TPC1_TRIATHLETE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spdt_activite`
--

DROP TABLE IF EXISTS `spdt_activite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spdt_activite` (
  `ACTIVITECode` varchar(255) DEFAULT NULL,
  `ACTIVITENom` varchar(255) DEFAULT NULL,
  `ACTIVITECatCode` varchar(255) DEFAULT NULL,
  KEY `ACTIVITECatCode` (`ACTIVITECatCode`),
  CONSTRAINT `spdt_activite_ibfk_1` FOREIGN KEY (`ACTIVITECatCode`) REFERENCES `spdt_activitecategorie` (`CATCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spdt_activite`
--

LOCK TABLES `spdt_activite` WRITE;
/*!40000 ALTER TABLE `spdt_activite` DISABLE KEYS */;
/*!40000 ALTER TABLE `spdt_activite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spdt_activitecategorie`
--

DROP TABLE IF EXISTS `spdt_activitecategorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spdt_activitecategorie` (
  `CATCode` varchar(255) NOT NULL,
  `CATLibelle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CATCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spdt_activitecategorie`
--

LOCK TABLES `spdt_activitecategorie` WRITE;
/*!40000 ALTER TABLE `spdt_activitecategorie` DISABLE KEYS */;
/*!40000 ALTER TABLE `spdt_activitecategorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spdt_association`
--

DROP TABLE IF EXISTS `spdt_association`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spdt_association` (
  `ASSONum` int(11) NOT NULL,
  `ASSONom` varchar(100) DEFAULT NULL,
  `ASSOAdresse` varchar(255) DEFAULT NULL,
  `ASSOCodePostal` varchar(10) DEFAULT NULL,
  `ASSOVille` varchar(100) DEFAULT NULL,
  `ASSONumTelephone` varchar(20) DEFAULT NULL,
  `ASSONomPresident` varchar(100) DEFAULT NULL,
  `ASSOActivite` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ASSONum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spdt_association`
--

LOCK TABLES `spdt_association` WRITE;
/*!40000 ALTER TABLE `spdt_association` DISABLE KEYS */;
INSERT INTO `spdt_association` VALUES (1,'J&M','69 rue chétane ','75002','Paris','9056145444','Victor Durand','geek'),(2,'JuL','Marseille plage','83662','Marseille','0675864453','Jules Clear','Stalker');
/*!40000 ALTER TABLE `spdt_association` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spdt_attribuer`
--

DROP TABLE IF EXISTS `spdt_attribuer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spdt_attribuer` (
  `ASSONum` int(11) NOT NULL,
  `LOCALNom` int(11) NOT NULL,
  `CréneauJour` varchar(45) DEFAULT NULL,
  `CréneauHeure` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ASSONum`,`LOCALNom`),
  KEY `ATTRILocalNum_idx` (`LOCALNom`),
  CONSTRAINT `ATTRIAssoNum` FOREIGN KEY (`ASSONum`) REFERENCES `spdt_association` (`ASSONum`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ATTRILocalNum` FOREIGN KEY (`LOCALNom`) REFERENCES `spdt_local` (`LOCALNum`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spdt_attribuer`
--

LOCK TABLES `spdt_attribuer` WRITE;
/*!40000 ALTER TABLE `spdt_attribuer` DISABLE KEYS */;
/*!40000 ALTER TABLE `spdt_attribuer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spdt_local`
--

DROP TABLE IF EXISTS `spdt_local`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spdt_local` (
  `LOCALNum` int(11) NOT NULL DEFAULT '0',
  `LOCALNom` varchar(45) DEFAULT NULL,
  `LOCALAdresse` varchar(45) DEFAULT NULL,
  `LOCALCodePostal` varchar(45) DEFAULT NULL,
  `LOCALVille` varchar(45) DEFAULT NULL,
  `LOCALSurface` varchar(45) DEFAULT NULL,
  `LOCALMontantLocation` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`LOCALNum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spdt_local`
--

LOCK TABLES `spdt_local` WRITE;
/*!40000 ALTER TABLE `spdt_local` DISABLE KEYS */;
INSERT INTO `spdt_local` VALUES (1,'OVH ','6 chemin paumé','1215','France','88','7'),(2,'Goolge inc','infinity loop','513351','Mountain View','888888888','9'),(254,'Google park','1 infitnite Loop','457866','Mountain View','88888888','999'),(2566,'Wallah pas d\'idée','6 chemin Paumé','85456','Lyon','854','125');
/*!40000 ALTER TABLE `spdt_local` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spdt_location`
--

DROP TABLE IF EXISTS `spdt_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spdt_location` (
  `LOCFicheNum` int(11) NOT NULL,
  `LOCDate` varchar(45) DEFAULT NULL,
  `LOCDateRéglement` varchar(45) DEFAULT NULL,
  `LOCPartNum` int(11) DEFAULT NULL,
  `LOCLocNum` int(11) DEFAULT NULL,
  PRIMARY KEY (`LOCFicheNum`),
  KEY `PARTNum_idx` (`LOCPartNum`),
  KEY `LOCNum_idx` (`LOCLocNum`),
  CONSTRAINT `LocationLocalNumRef` FOREIGN KEY (`LOCLocNum`) REFERENCES `spdt_location` (`LOCFicheNum`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `PARTNumRef` FOREIGN KEY (`LOCPartNum`) REFERENCES `spdt_particulier` (`PARTNum`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spdt_location`
--

LOCK TABLES `spdt_location` WRITE;
/*!40000 ALTER TABLE `spdt_location` DISABLE KEYS */;
/*!40000 ALTER TABLE `spdt_location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spdt_materiel`
--

DROP TABLE IF EXISTS `spdt_materiel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spdt_materiel` (
  `MATCode` int(11) NOT NULL,
  `MATDésignation` varchar(45) DEFAULT NULL,
  `MATDateAchat` varchar(45) DEFAULT NULL,
  `MATLocal` varchar(45) DEFAULT NULL,
  `MATLocalNum` int(11) DEFAULT NULL,
  PRIMARY KEY (`MATCode`),
  KEY `LOCALNum_idx` (`MATLocal`),
  KEY `MATlocaNumFK_idx` (`MATLocalNum`),
  CONSTRAINT `MATlocaNumFK` FOREIGN KEY (`MATLocalNum`) REFERENCES `spdt_local` (`LOCALNum`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spdt_materiel`
--

LOCK TABLES `spdt_materiel` WRITE;
/*!40000 ALTER TABLE `spdt_materiel` DISABLE KEYS */;
/*!40000 ALTER TABLE `spdt_materiel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spdt_particulier`
--

DROP TABLE IF EXISTS `spdt_particulier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spdt_particulier` (
  `PARTNum` int(11) NOT NULL DEFAULT '0',
  `PARTNom` varchar(45) DEFAULT NULL,
  `PARTPrenom` varchar(45) DEFAULT NULL,
  `PARTAdresse` varchar(255) DEFAULT NULL,
  `PARTCodePostal` varchar(45) DEFAULT NULL,
  `PARTVille` varchar(45) DEFAULT NULL,
  `PARTNumTéléphone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`PARTNum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spdt_particulier`
--

LOCK TABLES `spdt_particulier` WRITE;
/*!40000 ALTER TABLE `spdt_particulier` DISABLE KEYS */;
/*!40000 ALTER TABLE `spdt_particulier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spdt_proposer`
--

DROP TABLE IF EXISTS `spdt_proposer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spdt_proposer` (
  `ASSONum` int(11) NOT NULL,
  `ACTIVITECode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ASSONum`),
  CONSTRAINT `spdt_proposer_ibfk_1` FOREIGN KEY (`ASSONum`) REFERENCES `spdt_association` (`ASSONum`),
  CONSTRAINT `spdt_proposer_ibfk_2` FOREIGN KEY (`ASSONum`) REFERENCES `spdt_association` (`ASSONum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spdt_proposer`
--

LOCK TABLES `spdt_proposer` WRITE;
/*!40000 ALTER TABLE `spdt_proposer` DISABLE KEYS */;
/*!40000 ALTER TABLE `spdt_proposer` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-16 12:04:12
