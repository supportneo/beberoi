-- MySQL dump 10.13  Distrib 5.5.37, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: beberoi
-- ------------------------------------------------------
-- Server version	5.5.37-0+wheezy1-log

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
-- Table structure for table `liste_acces`
--

DROP TABLE IF EXISTS `liste_acces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `liste_acces` (
  `id_acces` int(10) NOT NULL AUTO_INCREMENT,
  `id_client` int(10) DEFAULT NULL,
  `id_liste` int(10) NOT NULL,
  `actif` tinyint(1) NOT NULL,
  `date_insert` datetime NOT NULL,
  `date_modif` datetime NOT NULL,
  `date_archive` datetime NOT NULL,
  PRIMARY KEY (`id_acces`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liste_acces`
--

LOCK TABLES `liste_acces` WRITE;
/*!40000 ALTER TABLE `liste_acces` DISABLE KEYS */;
INSERT INTO `liste_acces` VALUES (5,2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `liste_acces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `liste_admins`
--

DROP TABLE IF EXISTS `liste_admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `liste_admins` (
  `id_admin` int(10) NOT NULL AUTO_INCREMENT,
  `id_session` varchar(100) COLLATE utf8_bin NOT NULL,
  `nom` varchar(100) CHARACTER SET latin1 NOT NULL,
  `prenom` varchar(100) CHARACTER SET latin1 NOT NULL,
  `tel_1` varchar(30) CHARACTER SET latin1 NOT NULL,
  `tel_2` varchar(30) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `actif` tinyint(1) NOT NULL,
  `date_insert` datetime NOT NULL,
  `date_modif` datetime NOT NULL,
  `date_archive` datetime NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liste_admins`
--

LOCK TABLES `liste_admins` WRITE;
/*!40000 ALTER TABLE `liste_admins` DISABLE KEYS */;
INSERT INTO `liste_admins` VALUES (1,'','','','','','admin@test.com','098f6bcd4621d373cade4e832627b4f6',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `liste_admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `liste_clients`
--

DROP TABLE IF EXISTS `liste_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `liste_clients` (
  `id_client` int(10) NOT NULL AUTO_INCREMENT,
  `id_session` varchar(100) COLLATE utf8_bin NOT NULL,
  `titre` varchar(100) COLLATE utf8_bin NOT NULL,
  `nom` varchar(100) CHARACTER SET latin1 NOT NULL,
  `prenom` varchar(100) CHARACTER SET latin1 NOT NULL,
  `adresse_1` varchar(255) CHARACTER SET latin1 NOT NULL,
  `adresse_2` varchar(255) CHARACTER SET latin1 NOT NULL,
  `adresse_3` varchar(255) CHARACTER SET latin1 NOT NULL,
  `code_postal` varchar(30) CHARACTER SET latin1 NOT NULL,
  `ville` varchar(100) CHARACTER SET latin1 NOT NULL,
  `pays` varchar(10) CHARACTER SET latin1 NOT NULL,
  `tel_1` varchar(30) CHARACTER SET latin1 NOT NULL,
  `tel_2` varchar(30) CHARACTER SET latin1 NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `code_activation` varchar(100) COLLATE utf8_bin NOT NULL,
  `actif` tinyint(1) NOT NULL,
  `total_paye` decimal(10,2) NOT NULL,
  `nb_liste_paye` decimal(10,0) NOT NULL,
  `nb_liste_paye_30` decimal(10,0) NOT NULL,
  `date_insert` datetime NOT NULL,
  `date_modif` datetime NOT NULL,
  `date_archive` datetime NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liste_clients`
--

LOCK TABLES `liste_clients` WRITE;
/*!40000 ALTER TABLE `liste_clients` DISABLE KEYS */;
INSERT INTO `liste_clients` VALUES (2,'V25cqbwO6RM5sVMA5Nv4N4ys7nK5hMUc','a','a','a','a','a','a','a','a','a','a','a',0,'test@test.com','81dc9bdb52d04dc20036dbd8313ed055','fn97ORWwQe38a29428xCg756o1tt618N',0,0.00,0,0,'2014-05-22 23:45:17','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `liste_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `liste_naissances`
--

DROP TABLE IF EXISTS `liste_naissances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `liste_naissances` (
  `id_liste` int(10) NOT NULL AUTO_INCREMENT,
  `id_client` int(10) NOT NULL,
  `nom_famille` varchar(100) CHARACTER SET latin1 NOT NULL,
  `prenom_enfant` varchar(100) CHARACTER SET latin1 NOT NULL,
  `date_naissance` date NOT NULL,
  `lieu_naissance` varchar(255) CHARACTER SET latin1 NOT NULL,
  `identifiant` varchar(100) COLLATE utf8_bin NOT NULL,
  `code_acces` varchar(30) COLLATE utf8_bin NOT NULL,
  `total_liste` decimal(10,2) NOT NULL,
  `total_paye` decimal(10,2) NOT NULL,
  `date_insert` datetime NOT NULL,
  `date_modif` datetime NOT NULL,
  `date_archive` datetime NOT NULL,
  PRIMARY KEY (`id_liste`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liste_naissances`
--

LOCK TABLES `liste_naissances` WRITE;
/*!40000 ALTER TABLE `liste_naissances` DISABLE KEYS */;
INSERT INTO `liste_naissances` VALUES (1,1,'TEST','TEST','0000-00-00','Noumea / Nouvelle caledonie','TEST','TEST',10259.71,2584.00,'0000-00-00 00:00:00','2014-05-30 23:07:17','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `liste_naissances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `liste_naissances_det`
--

DROP TABLE IF EXISTS `liste_naissances_det`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `liste_naissances_det` (
  `id_detail` int(10) NOT NULL AUTO_INCREMENT,
  `id_liste` int(10) NOT NULL,
  `id_produit` int(10) NOT NULL,
  `ref_produit` varchar(100) COLLATE utf8_bin NOT NULL,
  `nom_produit` varchar(255) COLLATE utf8_bin NOT NULL,
  `prix_vente` decimal(10,2) NOT NULL,
  `prix_paye` decimal(10,2) NOT NULL,
  `date_insert` datetime NOT NULL,
  `date_modif` datetime NOT NULL,
  `date_archive` datetime NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liste_naissances_det`
--

LOCK TABLES `liste_naissances_det` WRITE;
/*!40000 ALTER TABLE `liste_naissances_det` DISABLE KEYS */;
INSERT INTO `liste_naissances_det` VALUES (1,1,1,'8945364952195','Produit n°1',710.59,800.00,'2014-05-22 21:15:26','2014-05-30 23:07:17','0000-00-00 00:00:00'),(2,1,2,'8744045300163','Produit N°2',139.98,140.00,'2014-05-22 21:15:26','2014-05-30 23:07:17','0000-00-00 00:00:00'),(3,1,3,'1670244730978','Produit N°3',568.15,568.00,'0000-00-00 00:00:00','2014-05-30 23:07:17','0000-00-00 00:00:00'),(4,1,4,'455251930552','Produit N°4',420.78,0.00,'0000-00-00 00:00:00','2014-05-30 16:40:42','0000-00-00 00:00:00'),(5,1,5,'8471525534974','Produit N°5',399.45,0.00,'0000-00-00 00:00:00','2014-05-30 16:41:46','0000-00-00 00:00:00'),(6,1,6,'7559464108983','Produit N°6',734.93,0.00,'0000-00-00 00:00:00','2014-05-30 16:41:46','0000-00-00 00:00:00'),(7,1,7,'7874935384180','Produit N°7',476.30,0.00,'0000-00-00 00:00:00','2014-05-30 16:41:46','0000-00-00 00:00:00'),(8,1,8,'71857303275','Produit N°8',176.71,0.00,'0000-00-00 00:00:00','2014-05-30 16:40:42','0000-00-00 00:00:00'),(9,1,9,'7147719878294','Produit N°9',454.65,0.00,'0000-00-00 00:00:00','2014-05-30 16:41:46','0000-00-00 00:00:00'),(10,1,10,'1555416263037','Produit N°10',743.10,0.00,'0000-00-00 00:00:00','2014-05-30 16:41:46','0000-00-00 00:00:00'),(11,1,11,'5176526395263','Produit N°11',351.57,0.00,'0000-00-00 00:00:00','2014-05-30 16:40:42','0000-00-00 00:00:00'),(12,1,12,'7191503911826','Produit N°12',528.54,0.00,'0000-00-00 00:00:00','2014-05-30 16:41:46','0000-00-00 00:00:00'),(13,1,13,'1260860110719','Produit N°13',588.00,0.00,'0000-00-00 00:00:00','2014-05-30 16:41:46','0000-00-00 00:00:00'),(14,1,14,'7757260473219','Produit N°14',354.37,0.00,'0000-00-00 00:00:00','2014-05-30 16:40:42','0000-00-00 00:00:00'),(15,1,15,'2845067308621','Produit N°15',7.85,0.00,'0000-00-00 00:00:00','2014-05-30 16:40:42','0000-00-00 00:00:00'),(16,1,16,'3710455015010','Produit N°16',976.13,1076.00,'0000-00-00 00:00:00','2014-05-30 23:07:17','0000-00-00 00:00:00'),(17,1,17,'4798828532620','Produit N°17',857.13,0.00,'0000-00-00 00:00:00','2014-05-30 16:40:42','0000-00-00 00:00:00'),(18,1,18,'3641338698633','Produit N°18',357.24,0.00,'0000-00-00 00:00:00','2014-05-30 16:40:42','0000-00-00 00:00:00'),(19,1,19,'9065704050776','Produit N°19',214.82,0.00,'0000-00-00 00:00:00','2014-05-30 16:40:42','0000-00-00 00:00:00'),(20,1,20,'5092431024321','Produit N°20',2.36,0.00,'0000-00-00 00:00:00','2014-05-30 16:40:42','0000-00-00 00:00:00'),(21,1,21,'1904064806151','Produit N°21',367.36,0.00,'0000-00-00 00:00:00','2014-05-30 16:40:42','0000-00-00 00:00:00'),(22,1,22,'9659997002073','Produit N°22',829.70,0.00,'0000-00-00 00:00:00','2014-05-30 16:40:42','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `liste_naissances_det` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `liste_paiements`
--

DROP TABLE IF EXISTS `liste_paiements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `liste_paiements` (
  `id_paiement` int(10) NOT NULL AUTO_INCREMENT,
  `id_client` int(10) NOT NULL,
  `id_panier` int(10) NOT NULL,
  `prix_paye` decimal(10,2) NOT NULL,
  `mode_paiement` varchar(30) CHARACTER SET latin1 NOT NULL,
  `statut_paiement` int(1) NOT NULL,
  `no_transaction` varchar(30) CHARACTER SET latin1 NOT NULL,
  `date_insert` datetime NOT NULL,
  `date_modif` datetime NOT NULL,
  `date_archive` datetime NOT NULL,
  PRIMARY KEY (`id_paiement`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liste_paiements`
--

LOCK TABLES `liste_paiements` WRITE;
/*!40000 ALTER TABLE `liste_paiements` DISABLE KEYS */;
INSERT INTO `liste_paiements` VALUES (1,2,2,550.00,'paybox',1,'1237','2014-05-22 23:11:54','2014-05-22 23:11:54','0000-00-00 00:00:00'),(2,1,0,1000.00,'paybox',1,'','2014-05-30 16:28:05','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,1,0,830.00,'paybox',1,'','2014-05-30 16:28:18','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,1,0,876.00,'paybox',1,'','2014-05-30 16:43:36','0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,1,0,100.00,'paybox',1,'','2014-05-30 16:44:24','0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,1,0,140.00,'paybox',1,'','2014-05-30 16:50:56','0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,1,0,568.00,'paybox',1,'','2014-05-30 16:53:55','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `liste_paiements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `liste_paniers`
--

DROP TABLE IF EXISTS `liste_paniers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `liste_paniers` (
  `id_panier` int(10) NOT NULL AUTO_INCREMENT,
  `id_client` int(10) NOT NULL,
  `id_liste` int(10) NOT NULL,
  `total_paye` decimal(10,2) NOT NULL,
  `statut` tinyint(1) NOT NULL,
  `date_insert` datetime NOT NULL,
  `date_modif` datetime NOT NULL,
  `date_archive` datetime NOT NULL,
  PRIMARY KEY (`id_panier`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liste_paniers`
--

LOCK TABLES `liste_paniers` WRITE;
/*!40000 ALTER TABLE `liste_paniers` DISABLE KEYS */;
INSERT INTO `liste_paniers` VALUES (1,2,1,0.00,0,'2014-05-22 22:17:40','2014-05-22 22:17:40','0000-00-00 00:00:00'),(2,2,1,550.00,1,'2014-05-22 22:24:38','2014-05-22 23:11:54','0000-00-00 00:00:00'),(3,2,1,0.00,0,'2014-05-22 23:17:35','2014-05-22 23:17:35','0000-00-00 00:00:00'),(4,1,1,0.00,1,'2014-05-30 16:27:59','2014-05-30 16:28:05','0000-00-00 00:00:00'),(5,1,1,0.00,1,'2014-05-30 16:28:14','2014-05-30 16:28:18','0000-00-00 00:00:00'),(6,1,1,0.00,1,'2014-05-30 16:43:32','2014-05-30 16:43:36','0000-00-00 00:00:00'),(7,1,1,0.00,1,'2014-05-30 16:44:22','2014-05-30 16:44:24','0000-00-00 00:00:00'),(8,1,1,800.00,0,'2014-05-30 16:49:46','2014-05-30 16:49:46','0000-00-00 00:00:00'),(9,1,1,0.00,1,'2014-05-30 16:50:54','2014-05-30 16:50:56','0000-00-00 00:00:00'),(10,1,1,0.00,1,'2014-05-30 16:52:36','2014-05-30 16:53:55','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `liste_paniers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `liste_paniers_det`
--

DROP TABLE IF EXISTS `liste_paniers_det`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `liste_paniers_det` (
  `id_panier_det` int(10) NOT NULL AUTO_INCREMENT,
  `id_panier` int(10) NOT NULL,
  `id_client` int(10) NOT NULL,
  `id_liste` int(10) NOT NULL,
  `id_produit` int(10) NOT NULL,
  `prix_paye` decimal(10,2) NOT NULL,
  `statut` tinyint(1) NOT NULL,
  `date_insert` datetime NOT NULL,
  `date_modif` datetime NOT NULL,
  `date_archive` datetime NOT NULL,
  PRIMARY KEY (`id_panier_det`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liste_paniers_det`
--

LOCK TABLES `liste_paniers_det` WRITE;
/*!40000 ALTER TABLE `liste_paniers_det` DISABLE KEYS */;
INSERT INTO `liste_paniers_det` VALUES (28,10,1,1,3,568.00,1,'2014-05-30 16:52:36','2014-05-30 16:53:55','0000-00-00 00:00:00'),(27,9,1,1,2,140.00,1,'2014-05-30 16:50:54','2014-05-30 16:50:56','0000-00-00 00:00:00'),(20,2,2,1,16,100.00,1,'2014-05-22 22:24:38','2014-05-22 23:11:54','0000-00-00 00:00:00'),(26,8,1,1,1,800.00,0,'2014-05-30 16:49:46','0000-00-00 00:00:00','0000-00-00 00:00:00'),(25,7,1,1,16,100.00,1,'2014-05-30 16:44:22','2014-05-30 16:44:24','0000-00-00 00:00:00'),(24,6,1,1,16,876.00,1,'2014-05-30 16:43:32','2014-05-30 16:43:36','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `liste_paniers_det` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-05-30 23:59:06
