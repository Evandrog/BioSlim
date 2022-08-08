-- MySQL dump 10.13  Distrib 8.0.30, for Linux (x86_64)
--
-- Host: localhost    Database: bioslim_api
-- ------------------------------------------------------
-- Server version	8.0.30-0ubuntu0.22.04.1

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
-- Table structure for table `deposito`
--

DROP TABLE IF EXISTS `deposito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `deposito` (
  `id` int NOT NULL,
  `conta` int NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `moeda` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deposito`
--

LOCK TABLES `deposito` WRITE;
/*!40000 ALTER TABLE `deposito` DISABLE KEYS */;
INSERT INTO `deposito` VALUES (5,1,250,'USD','2022-08-15 10:03:57'),(6,1,59,'BRL','2022-08-18 08:05:49'),(7,1,3053,'EUR','2022-08-20 18:06:03'),(8,1,40,'BRL','2022-08-15 17:06:34'),(9,2,2000,'BRL','2022-08-22 13:59:59'),(10,2,50,'USD','2022-08-19 23:01:09'),(11,1,5000,'EUR','2022-08-15 20:33:32');
/*!40000 ALTER TABLE `deposito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saldo`
--

DROP TABLE IF EXISTS `saldo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `saldo` (
  `id` int NOT NULL,
  `conta` int NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `moeda` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `operacao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saldo`
--

LOCK TABLES `saldo` WRITE;
/*!40000 ALTER TABLE `saldo` DISABLE KEYS */;
INSERT INTO `saldo` VALUES (6,1,2300,'BRL','2022-08-05 17:03:57','deposito'),(8,1,3150,'BRL','2022-08-15 19:08:30','saque'),(9,1,-250,'BRL','2022-08-22 19:08:23','saque'),(10,1,2500,'USD','2022-08-17 19:08:12','saque'),(11,1,50,'BRL','2022-08-10 19:07:35','deposito'),(12,1,3000,'EUR','2022-09-15 18:06:03','deposito'),(13,1,-1700,'BRL','2022-08-15 19:08:03','saque'),(14,1,4000,'BRL','2022-08-07 18:06:34','deposito'),(15,1,-300,'EUR','2022-08-13 19:05:50','saque'),(16,1,850,'BRL','2022-09-01 19:05:47','saque'),(17,1,-381,'EUR','2022-09-14 19:05:43','saque'),(18,1,-600,'BRL','2022-09-22 19:05:31','saque'),(19,2,200,'USD','2022-09-25 19:59:59','deposito'),(20,2,-50,'USD','2022-09-20 20:00:28','saque'),(21,2,6700,'BRL','2022-08-13 20:01:09','deposito'),(22,2,-500,'BRL','2022-07-01 20:01:22','saque'),(23,1,50000,'USD','2022-07-31 20:33:32','deposito'),(24,1,-1300,'EUR','2022-09-15 20:33:59','saque');
/*!40000 ALTER TABLE `saldo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saque`
--

DROP TABLE IF EXISTS `saque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `saque` (
  `id` int NOT NULL,
  `conta` int NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `moeda` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saque`
--

LOCK TABLES `saque` WRITE;
/*!40000 ALTER TABLE `saque` DISABLE KEYS */;
INSERT INTO `saque` VALUES (5,1,150,'BRL','2022-08-15 18:05:05'),(6,1,250,'EUR','2022-09-18 18:05:25'),(7,1,500,'BRL','2022-07-10 18:05:31'),(8,1,1700,'USD','2022-09-05 18:06:18'),(9,1,1200,'BRL','2022-06-25 18:23:51'),(10,1,270,'USD','2022-09-15 18:27:13'),(11,1,50,'BRL','2022-08-13 18:27:25'),(12,1,27,'EUR','2022-09-23 18:29:27'),(13,1,600,'EUR','2022-07-10 19:01:07'),(14,2,53,'BRL','2022-09-03 20:00:28'),(15,2,300,'USD','2022-08-02 20:01:22'),(16,1,1500,'BRL','2022-08-15 20:33:59');
/*!40000 ALTER TABLE `saque` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-07 23:35:00
