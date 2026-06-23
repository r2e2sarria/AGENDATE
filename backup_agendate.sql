-- MySQL dump 10.13  Distrib 8.0.46, for Linux (aarch64)
--
-- Host: localhost    Database: agendate
-- ------------------------------------------------------
-- Server version	8.0.46

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `citas`
--

DROP TABLE IF EXISTS `citas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `citas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_consejero` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `duracion` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'DuraciÃ³n de la cita',
  `tipo` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT '1 pre / 2 virtual',
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `apellido` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `estado` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT '0 libre / 1 cancelada / 2 cumplida / 3 ausente',
  `date_reserva` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citas`
--

LOCK TABLES `citas` WRITE;
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `citys`
--

DROP TABLE IF EXISTS `citys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `citys` (
  `id` int DEFAULT NULL,
  `IdDpto` int DEFAULT NULL,
  `idDane` varchar(254) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `cityName` varchar(254) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citys`
--

LOCK TABLES `citys` WRITE;
/*!40000 ALTER TABLE `citys` DISABLE KEYS */;
/*!40000 ALTER TABLE `citys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consejero`
--

DROP TABLE IF EXISTS `consejero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `consejero` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `last` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `pass` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `gmail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'correo gmail para meet',
  `meet` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'codigo meet',
  `addr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `dpto` int DEFAULT NULL,
  `city` int DEFAULT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consejero`
--

LOCK TABLES `consejero` WRITE;
/*!40000 ALTER TABLE `consejero` DISABLE KEYS */;
INSERT INTO `consejero` VALUES (6,'Cristian','Castillo Rodriguez','cristian.castillo@agendate.com','123456','cristian.castillo@gmail.com','','',NULL,NULL,''),(7,'Steve Sebastian','Fox Lynton','steve.fox@agendate.com','123456','steve.fox@gmail.com','','',NULL,NULL,''),(8,'Nicolas','Gallego Restrepo','nicolas.gallego@agendate.com','123456','nicolas.gallego@gmail.com','','',NULL,NULL,''),(9,'Yeison Miguel','Noriega Amaya','yeison.noriega@agendate.com','123456','yeison.noriega@gmail.com','','',NULL,NULL,''),(10,'Jorge Arturo','Sarria Cobo','jorge.sarria@agendate.com','123456','jorge.sarria@gmail.com','','',NULL,NULL,'');
/*!40000 ALTER TABLE `consejero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dptos`
--

DROP TABLE IF EXISTS `dptos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dptos` (
  `id` int DEFAULT NULL,
  `idDane` int DEFAULT NULL,
  `nameDpto` varchar(254) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dptos`
--

LOCK TABLES `dptos` WRITE;
/*!40000 ALTER TABLE `dptos` DISABLE KEYS */;
/*!40000 ALTER TABLE `dptos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `memos`
--

DROP TABLE IF EXISTS `memos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `memos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cita` int DEFAULT NULL,
  `memo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci COMMENT 'Anotaciones de la cita',
  `tipo_nota` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT '1 inicio - 2 envia - 3 recibe',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `memos`
--

LOCK TABLES `memos` WRITE;
/*!40000 ALTER TABLE `memos` DISABLE KEYS */;
/*!40000 ALTER TABLE `memos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-23  2:01:41
