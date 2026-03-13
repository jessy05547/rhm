-- MySQL dump 10.13  Distrib 9.6.0, for Win64 (x86_64)
--
-- Host: localhost    Database: ressourceHumain
-- ------------------------------------------------------
-- Server version	9.6.0

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
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ '';

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conge_tables`
--

DROP TABLE IF EXISTS `conge_tables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conge_tables` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_utilisateur` bigint unsigned NOT NULL,
  `id_employe` bigint unsigned NOT NULL,
  `date_sortie` date NOT NULL,
  `date_entre` date NOT NULL,
  `types` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `conge_tables_id_utilisateur_foreign` (`id_utilisateur`),
  KEY `conge_tables_id_employe_foreign` (`id_employe`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conge_tables`
--

LOCK TABLES `conge_tables` WRITE;
/*!40000 ALTER TABLE `conge_tables` DISABLE KEYS */;
INSERT INTO `conge_tables` VALUES (1,1,10,'2026-04-05','2026-03-02','Congé de maternité','Accepté','2026-03-02 14:47:24','2026-03-02 14:47:24'),(2,1,14,'2026-03-04','2026-03-12','Congé annuelle','Accepté','2026-03-04 10:19:42','2026-03-04 10:19:42');
/*!40000 ALTER TABLE `conge_tables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departement_tables`
--

DROP TABLE IF EXISTS `departement_tables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departement_tables` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `departement` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departement_tables`
--

LOCK TABLES `departement_tables` WRITE;
/*!40000 ALTER TABLE `departement_tables` DISABLE KEYS */;
INSERT INTO `departement_tables` VALUES (1,'Ressources Humaines','2026-02-23 10:08:58','2026-02-23 10:08:58'),(2,'Informatique','2026-02-23 10:08:58','2026-02-23 10:08:58'),(3,'Commercial','2026-02-23 10:08:58','2026-02-23 10:08:58'),(4,'Production','2026-02-23 10:08:58','2026-02-23 10:08:58'),(5,'Logistique','2026-02-23 10:08:58','2026-02-23 10:08:58'),(6,'Finance','2026-02-23 10:08:58','2026-02-23 10:08:58'),(7,'Marketing','2026-02-23 10:08:58','2026-02-23 10:08:58'),(8,'Recherche et Développement','2026-02-23 10:08:58','2026-02-23 10:08:58'),(9,'Service Client','2026-02-23 10:08:58','2026-02-23 10:08:58'),(10,'Administration','2026-02-23 10:08:58','2026-02-23 10:08:58');
/*!40000 ALTER TABLE `departement_tables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employe_tables`
--

DROP TABLE IF EXISTS `employe_tables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employe_tables` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_utilisateur` bigint unsigned NOT NULL,
  `id_departement` bigint unsigned NOT NULL,
  `id_poste` bigint unsigned NOT NULL,
  `nom` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `cin` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_embauche` date NOT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matricule` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employe_tables_cin_unique` (`cin`),
  UNIQUE KEY `employe_tables_matricule_unique` (`matricule`),
  KEY `employe_tables_id_utilisateur_foreign` (`id_utilisateur`),
  KEY `employe_tables_id_departement_foreign` (`id_departement`),
  KEY `employe_tables_id_poste_foreign` (`id_poste`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employe_tables`
--

LOCK TABLES `employe_tables` WRITE;
/*!40000 ALTER TABLE `employe_tables` DISABLE KEYS */;
INSERT INTO `employe_tables` VALUES (18,1,5,22,'RAZAFINDRAIBE','Nilaina Idealy','2004-02-29','001900199245','2026-03-05','Soavinandrina','idealy@gmail.com','0374589600','Masculin','EMP0018','2026-03-05 14:02:48','2026-03-05 14:02:48'),(17,1,9,23,'RASOARIMALALA','Marie Hortance','2000-12-26','010231564801','2022-04-25','Ambohimalaza','marie@gmail.com','0324578966','Féminin','EMP0017','2026-03-05 13:51:02','2026-03-05 13:51:02'),(5,1,2,13,'RAZAFINDRAIBE','Etienne Ulrich','2001-04-05','102045036987','2000-01-04','Isotry','ulrich@yahoo.mg','0341537472','Masculin','EMP0005','2026-02-25 09:16:34','2026-02-25 09:16:34'),(6,1,9,18,'ANDRIANAIVO','Marie Juliah','2002-04-05','103405708908','2026-02-25','Ambatobe','juliah@gmail.com','0324578196','Féminin','EMP0006','2026-02-25 09:20:11','2026-02-25 09:20:11'),(14,1,2,14,'RAZAFINDRAIBE','Jessy Roméo','2005-04-24','000111222334','2026-03-03','Ambohimangakely','romeorazafindraibe76@gmail.com','0384696755','Masculin','EMP0014','2026-03-03 17:40:25','2026-03-03 17:40:25'),(8,1,2,13,'RAVONIARISON','Toussaint','2005-04-02','102704859321','2026-02-12','Anosy Soa','toussaint@gmail.com','0331245698','Masculin','EMP0008','2026-02-26 15:00:38','2026-02-26 15:00:38'),(16,1,1,6,'ANDRIANJAKA','Orime','1999-01-12','101212300412','2026-03-05','Mahazo','orime@gmail.com','0321547899','Féminin','EMP0016','2026-03-05 04:04:33','2026-03-05 04:04:33'),(10,1,2,12,'TOKINIAINA','Eddy','2003-05-30','111222000333','2020-01-07','Ambohimangakely','eddy05@gmail.com','0331232100','Masculin','EMP0010','2026-02-26 15:07:23','2026-02-26 15:07:23'),(11,1,8,19,'ANDRIANAGALY','Fitiavana','2000-02-01','000111222333','2026-01-29','Alasora','fyh001@yahoo.mg','0373100084','Masculin','EMP0011','2026-02-26 15:09:54','2026-02-26 15:09:54'),(15,1,3,21,'RAMANDIBISOA','Viviane','1995-04-12','000444777555','2026-03-04','Ambohimahitsy','vivi@gmail.com','0324178566','Féminin','EMP0015','2026-03-05 03:15:34','2026-03-05 03:15:34'),(13,1,2,13,'LUCIANO','Oscar','1988-10-04','777000555666','2026-02-20','Ambohimanabola','oscarluciano@gmail.com','0331578942','Masculin','EMP0013','2026-02-27 04:04:29','2026-02-27 04:04:29'),(19,1,1,1,'ROUVRE','Givin','2003-10-31','701845236900','2026-03-05','Mandroseza','givin@gmail.com','0336401755','Masculin','EMP0019','2026-03-05 14:05:26','2026-03-06 08:46:38'),(20,1,1,1,'RANDRIANIRINA','Mickaël','2004-11-24','143000971500','2026-02-23','Nanisana','mike@gmail.com','0201698744','Masculin','EMP0020','2026-03-05 14:08:29','2026-03-06 07:59:02'),(21,1,1,1,'Christoph','Emmanuël','1998-12-24','077127700888','2020-05-03','Ivato','emmanuel@yahoo.fr','0380246577','Masculin','EMP0021','2026-03-06 07:51:45','2026-03-09 15:49:43'),(22,1,1,1,'RAZANABOLONA','Lucie','1998-12-25','003101942770','2026-03-06','Tsaralalana','lucie@gmail.com','0339841520','Féminin','EMP0022','2026-03-07 10:19:02','2026-03-10 03:42:13'),(23,1,1,1,'ANDRIANATENAINA','Sambatra Nomentsoa','2001-11-09','017302664101','2019-04-20','Anjeva','sambatra@gmail.com','0334597866','Masculin','EMP0023','2026-03-07 10:23:50','2026-03-09 02:32:47'),(24,1,7,18,'RAZAFINDRAIBE','Ricah Andrianina','1999-02-24','003119550761','2026-02-23','Alasora','ricah00@gmail.com','0204798566','Masculin','EMP0024','2026-03-09 12:31:34','2026-03-09 12:31:34'),(25,1,10,8,'RAMILIARIMANANA','Mioty Fandresena','2005-02-02','909666132732','2026-03-11','Itosy','mioty@gmail.com','0321879544','Masculin','EMP0025','2026-03-12 02:35:51','2026-03-12 02:35:51');
/*!40000 ALTER TABLE `employe_tables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (1,'default','{\"uuid\":\"4f9255b0-2b99-4124-ba40-7d103ed88124\",\"displayName\":\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\",\"command\":\"O:58:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\\\":6:{s:14:\\\"\\u0000*\\u0000conversions\\\";O:52:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\ConversionCollection\\\":2:{s:8:\\\"\\u0000*\\u0000items\\\";a:1:{i:0;O:42:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Conversion\\\":11:{s:12:\\\"\\u0000*\\u0000fileNamer\\\";O:54:\\\"Spatie\\\\MediaLibrary\\\\Support\\\\FileNamer\\\\DefaultFileNamer\\\":0:{}s:28:\\\"\\u0000*\\u0000extractVideoFrameAtSecond\\\";d:0;s:16:\\\"\\u0000*\\u0000manipulations\\\";O:45:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Manipulations\\\":1:{s:16:\\\"\\u0000*\\u0000manipulations\\\";a:4:{s:8:\\\"optimize\\\";a:1:{i:0;O:36:\\\"Spatie\\\\ImageOptimizer\\\\OptimizerChain\\\":3:{s:13:\\\"\\u0000*\\u0000optimizers\\\";a:7:{i:0;O:42:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Jpegoptim\\\":5:{s:7:\\\"options\\\";a:4:{i:0;s:4:\\\"-m85\\\";i:1;s:7:\\\"--force\\\";i:2;s:11:\\\"--strip-all\\\";i:3;s:17:\\\"--all-progressive\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:9:\\\"jpegoptim\\\";}i:1;O:41:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Pngquant\\\":5:{s:7:\\\"options\\\";a:1:{i:0;s:7:\\\"--force\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:8:\\\"pngquant\\\";}i:2;O:40:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Optipng\\\":5:{s:7:\\\"options\\\";a:3:{i:0;s:3:\\\"-i0\\\";i:1;s:3:\\\"-o2\\\";i:2;s:6:\\\"-quiet\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:7:\\\"optipng\\\";}i:3;O:37:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Svgo\\\":5:{s:7:\\\"options\\\";a:1:{i:0;s:20:\\\"--disable=cleanupIDs\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:4:\\\"svgo\\\";}i:4;O:41:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Gifsicle\\\":5:{s:7:\\\"options\\\";a:2:{i:0;s:2:\\\"-b\\\";i:1;s:3:\\\"-O3\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:8:\\\"gifsicle\\\";}i:5;O:38:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Cwebp\\\":5:{s:7:\\\"options\\\";a:4:{i:0;s:4:\\\"-m 6\\\";i:1;s:8:\\\"-pass 10\\\";i:2;s:3:\\\"-mt\\\";i:3;s:5:\\\"-q 90\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:5:\\\"cwebp\\\";}i:6;O:40:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Avifenc\\\":6:{s:7:\\\"options\\\";a:8:{i:0;s:14:\\\"-a cq-level=23\\\";i:1;s:6:\\\"-j all\\\";i:2;s:7:\\\"--min 0\\\";i:3;s:8:\\\"--max 63\\\";i:4;s:12:\\\"--minalpha 0\\\";i:5;s:13:\\\"--maxalpha 63\\\";i:6;s:14:\\\"-a end-usage=q\\\";i:7;s:12:\\\"-a tune=ssim\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:7:\\\"avifenc\\\";s:16:\\\"decodeBinaryName\\\";s:7:\\\"avifdec\\\";}}s:9:\\\"\\u0000*\\u0000logger\\\";O:33:\\\"Spatie\\\\ImageOptimizer\\\\DummyLogger\\\":0:{}s:10:\\\"\\u0000*\\u0000timeout\\\";i:60;}}s:6:\\\"format\\\";a:1:{i:0;s:3:\\\"jpg\\\";}s:5:\\\"width\\\";a:1:{i:0;i:150;}s:6:\\\"height\\\";a:1:{i:0;i:150;}}}s:23:\\\"\\u0000*\\u0000performOnCollections\\\";a:0:{}s:17:\\\"\\u0000*\\u0000performOnQueue\\\";b:1;s:26:\\\"\\u0000*\\u0000keepOriginalImageFormat\\\";b:0;s:27:\\\"\\u0000*\\u0000generateResponsiveImages\\\";b:0;s:18:\\\"\\u0000*\\u0000widthCalculator\\\";N;s:24:\\\"\\u0000*\\u0000loadingAttributeValue\\\";N;s:16:\\\"\\u0000*\\u0000pdfPageNumber\\\";i:1;s:7:\\\"\\u0000*\\u0000name\\\";s:5:\\\"thumb\\\";}}s:28:\\\"\\u0000*\\u0000escapeWhenCastingToString\\\";b:0;}s:8:\\\"\\u0000*\\u0000media\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:49:\\\"Spatie\\\\MediaLibrary\\\\MediaCollections\\\\Models\\\\Media\\\";s:2:\\\"id\\\";i:9;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:14:\\\"\\u0000*\\u0000onlyMissing\\\";b:0;s:10:\\\"connection\\\";s:8:\\\"database\\\";s:5:\\\"queue\\\";s:0:\\\"\\\";s:11:\\\"afterCommit\\\";b:1;}\",\"batchId\":null},\"createdAt\":1773088645,\"delay\":null}',0,NULL,1773088646,1773088646),(2,'default','{\"uuid\":\"38053a9c-865a-4770-87eb-6df513e98f57\",\"displayName\":\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\",\"command\":\"O:58:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\\\":6:{s:14:\\\"\\u0000*\\u0000conversions\\\";O:52:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\ConversionCollection\\\":2:{s:8:\\\"\\u0000*\\u0000items\\\";a:1:{i:0;O:42:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Conversion\\\":11:{s:12:\\\"\\u0000*\\u0000fileNamer\\\";O:54:\\\"Spatie\\\\MediaLibrary\\\\Support\\\\FileNamer\\\\DefaultFileNamer\\\":0:{}s:28:\\\"\\u0000*\\u0000extractVideoFrameAtSecond\\\";d:0;s:16:\\\"\\u0000*\\u0000manipulations\\\";O:45:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Manipulations\\\":1:{s:16:\\\"\\u0000*\\u0000manipulations\\\";a:4:{s:8:\\\"optimize\\\";a:1:{i:0;O:36:\\\"Spatie\\\\ImageOptimizer\\\\OptimizerChain\\\":3:{s:13:\\\"\\u0000*\\u0000optimizers\\\";a:7:{i:0;O:42:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Jpegoptim\\\":5:{s:7:\\\"options\\\";a:4:{i:0;s:4:\\\"-m85\\\";i:1;s:7:\\\"--force\\\";i:2;s:11:\\\"--strip-all\\\";i:3;s:17:\\\"--all-progressive\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:9:\\\"jpegoptim\\\";}i:1;O:41:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Pngquant\\\":5:{s:7:\\\"options\\\";a:1:{i:0;s:7:\\\"--force\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:8:\\\"pngquant\\\";}i:2;O:40:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Optipng\\\":5:{s:7:\\\"options\\\";a:3:{i:0;s:3:\\\"-i0\\\";i:1;s:3:\\\"-o2\\\";i:2;s:6:\\\"-quiet\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:7:\\\"optipng\\\";}i:3;O:37:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Svgo\\\":5:{s:7:\\\"options\\\";a:1:{i:0;s:20:\\\"--disable=cleanupIDs\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:4:\\\"svgo\\\";}i:4;O:41:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Gifsicle\\\":5:{s:7:\\\"options\\\";a:2:{i:0;s:2:\\\"-b\\\";i:1;s:3:\\\"-O3\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:8:\\\"gifsicle\\\";}i:5;O:38:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Cwebp\\\":5:{s:7:\\\"options\\\";a:4:{i:0;s:4:\\\"-m 6\\\";i:1;s:8:\\\"-pass 10\\\";i:2;s:3:\\\"-mt\\\";i:3;s:5:\\\"-q 90\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:5:\\\"cwebp\\\";}i:6;O:40:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Avifenc\\\":6:{s:7:\\\"options\\\";a:8:{i:0;s:14:\\\"-a cq-level=23\\\";i:1;s:6:\\\"-j all\\\";i:2;s:7:\\\"--min 0\\\";i:3;s:8:\\\"--max 63\\\";i:4;s:12:\\\"--minalpha 0\\\";i:5;s:13:\\\"--maxalpha 63\\\";i:6;s:14:\\\"-a end-usage=q\\\";i:7;s:12:\\\"-a tune=ssim\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:7:\\\"avifenc\\\";s:16:\\\"decodeBinaryName\\\";s:7:\\\"avifdec\\\";}}s:9:\\\"\\u0000*\\u0000logger\\\";O:33:\\\"Spatie\\\\ImageOptimizer\\\\DummyLogger\\\":0:{}s:10:\\\"\\u0000*\\u0000timeout\\\";i:60;}}s:6:\\\"format\\\";a:1:{i:0;s:3:\\\"jpg\\\";}s:5:\\\"width\\\";a:1:{i:0;i:150;}s:6:\\\"height\\\";a:1:{i:0;i:150;}}}s:23:\\\"\\u0000*\\u0000performOnCollections\\\";a:0:{}s:17:\\\"\\u0000*\\u0000performOnQueue\\\";b:1;s:26:\\\"\\u0000*\\u0000keepOriginalImageFormat\\\";b:0;s:27:\\\"\\u0000*\\u0000generateResponsiveImages\\\";b:0;s:18:\\\"\\u0000*\\u0000widthCalculator\\\";N;s:24:\\\"\\u0000*\\u0000loadingAttributeValue\\\";N;s:16:\\\"\\u0000*\\u0000pdfPageNumber\\\";i:1;s:7:\\\"\\u0000*\\u0000name\\\";s:5:\\\"thumb\\\";}}s:28:\\\"\\u0000*\\u0000escapeWhenCastingToString\\\";b:0;}s:8:\\\"\\u0000*\\u0000media\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:49:\\\"Spatie\\\\MediaLibrary\\\\MediaCollections\\\\Models\\\\Media\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:14:\\\"\\u0000*\\u0000onlyMissing\\\";b:0;s:10:\\\"connection\\\";s:8:\\\"database\\\";s:5:\\\"queue\\\";s:0:\\\"\\\";s:11:\\\"afterCommit\\\";b:1;}\",\"batchId\":null},\"createdAt\":1773089204,\"delay\":null}',0,NULL,1773089204,1773089204),(3,'default','{\"uuid\":\"c557e01d-8fba-499d-bb35-91aedf77619c\",\"displayName\":\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\",\"command\":\"O:58:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\\\":6:{s:14:\\\"\\u0000*\\u0000conversions\\\";O:52:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\ConversionCollection\\\":2:{s:8:\\\"\\u0000*\\u0000items\\\";a:1:{i:0;O:42:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Conversion\\\":11:{s:12:\\\"\\u0000*\\u0000fileNamer\\\";O:54:\\\"Spatie\\\\MediaLibrary\\\\Support\\\\FileNamer\\\\DefaultFileNamer\\\":0:{}s:28:\\\"\\u0000*\\u0000extractVideoFrameAtSecond\\\";d:0;s:16:\\\"\\u0000*\\u0000manipulations\\\";O:45:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Manipulations\\\":1:{s:16:\\\"\\u0000*\\u0000manipulations\\\";a:4:{s:8:\\\"optimize\\\";a:1:{i:0;O:36:\\\"Spatie\\\\ImageOptimizer\\\\OptimizerChain\\\":3:{s:13:\\\"\\u0000*\\u0000optimizers\\\";a:7:{i:0;O:42:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Jpegoptim\\\":5:{s:7:\\\"options\\\";a:4:{i:0;s:4:\\\"-m85\\\";i:1;s:7:\\\"--force\\\";i:2;s:11:\\\"--strip-all\\\";i:3;s:17:\\\"--all-progressive\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:9:\\\"jpegoptim\\\";}i:1;O:41:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Pngquant\\\":5:{s:7:\\\"options\\\";a:1:{i:0;s:7:\\\"--force\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:8:\\\"pngquant\\\";}i:2;O:40:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Optipng\\\":5:{s:7:\\\"options\\\";a:3:{i:0;s:3:\\\"-i0\\\";i:1;s:3:\\\"-o2\\\";i:2;s:6:\\\"-quiet\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:7:\\\"optipng\\\";}i:3;O:37:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Svgo\\\":5:{s:7:\\\"options\\\";a:1:{i:0;s:20:\\\"--disable=cleanupIDs\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:4:\\\"svgo\\\";}i:4;O:41:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Gifsicle\\\":5:{s:7:\\\"options\\\";a:2:{i:0;s:2:\\\"-b\\\";i:1;s:3:\\\"-O3\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:8:\\\"gifsicle\\\";}i:5;O:38:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Cwebp\\\":5:{s:7:\\\"options\\\";a:4:{i:0;s:4:\\\"-m 6\\\";i:1;s:8:\\\"-pass 10\\\";i:2;s:3:\\\"-mt\\\";i:3;s:5:\\\"-q 90\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:5:\\\"cwebp\\\";}i:6;O:40:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Avifenc\\\":6:{s:7:\\\"options\\\";a:8:{i:0;s:14:\\\"-a cq-level=23\\\";i:1;s:6:\\\"-j all\\\";i:2;s:7:\\\"--min 0\\\";i:3;s:8:\\\"--max 63\\\";i:4;s:12:\\\"--minalpha 0\\\";i:5;s:13:\\\"--maxalpha 63\\\";i:6;s:14:\\\"-a end-usage=q\\\";i:7;s:12:\\\"-a tune=ssim\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:7:\\\"avifenc\\\";s:16:\\\"decodeBinaryName\\\";s:7:\\\"avifdec\\\";}}s:9:\\\"\\u0000*\\u0000logger\\\";O:33:\\\"Spatie\\\\ImageOptimizer\\\\DummyLogger\\\":0:{}s:10:\\\"\\u0000*\\u0000timeout\\\";i:60;}}s:6:\\\"format\\\";a:1:{i:0;s:3:\\\"jpg\\\";}s:5:\\\"width\\\";a:1:{i:0;i:150;}s:6:\\\"height\\\";a:1:{i:0;i:150;}}}s:23:\\\"\\u0000*\\u0000performOnCollections\\\";a:0:{}s:17:\\\"\\u0000*\\u0000performOnQueue\\\";b:1;s:26:\\\"\\u0000*\\u0000keepOriginalImageFormat\\\";b:0;s:27:\\\"\\u0000*\\u0000generateResponsiveImages\\\";b:0;s:18:\\\"\\u0000*\\u0000widthCalculator\\\";N;s:24:\\\"\\u0000*\\u0000loadingAttributeValue\\\";N;s:16:\\\"\\u0000*\\u0000pdfPageNumber\\\";i:1;s:7:\\\"\\u0000*\\u0000name\\\";s:5:\\\"thumb\\\";}}s:28:\\\"\\u0000*\\u0000escapeWhenCastingToString\\\";b:0;}s:8:\\\"\\u0000*\\u0000media\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:49:\\\"Spatie\\\\MediaLibrary\\\\MediaCollections\\\\Models\\\\Media\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:14:\\\"\\u0000*\\u0000onlyMissing\\\";b:0;s:10:\\\"connection\\\";s:8:\\\"database\\\";s:5:\\\"queue\\\";s:0:\\\"\\\";s:11:\\\"afterCommit\\\";b:1;}\",\"batchId\":null},\"createdAt\":1773124435,\"delay\":null}',0,NULL,1773124435,1773124435),(4,'default','{\"uuid\":\"22b34f67-519a-42c1-ad20-9e70371fe3f1\",\"displayName\":\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\",\"command\":\"O:58:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\\\":6:{s:14:\\\"\\u0000*\\u0000conversions\\\";O:52:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\ConversionCollection\\\":2:{s:8:\\\"\\u0000*\\u0000items\\\";a:1:{i:0;O:42:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Conversion\\\":11:{s:12:\\\"\\u0000*\\u0000fileNamer\\\";O:54:\\\"Spatie\\\\MediaLibrary\\\\Support\\\\FileNamer\\\\DefaultFileNamer\\\":0:{}s:28:\\\"\\u0000*\\u0000extractVideoFrameAtSecond\\\";d:0;s:16:\\\"\\u0000*\\u0000manipulations\\\";O:45:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Manipulations\\\":1:{s:16:\\\"\\u0000*\\u0000manipulations\\\";a:4:{s:8:\\\"optimize\\\";a:1:{i:0;O:36:\\\"Spatie\\\\ImageOptimizer\\\\OptimizerChain\\\":3:{s:13:\\\"\\u0000*\\u0000optimizers\\\";a:7:{i:0;O:42:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Jpegoptim\\\":5:{s:7:\\\"options\\\";a:4:{i:0;s:4:\\\"-m85\\\";i:1;s:7:\\\"--force\\\";i:2;s:11:\\\"--strip-all\\\";i:3;s:17:\\\"--all-progressive\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:9:\\\"jpegoptim\\\";}i:1;O:41:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Pngquant\\\":5:{s:7:\\\"options\\\";a:1:{i:0;s:7:\\\"--force\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:8:\\\"pngquant\\\";}i:2;O:40:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Optipng\\\":5:{s:7:\\\"options\\\";a:3:{i:0;s:3:\\\"-i0\\\";i:1;s:3:\\\"-o2\\\";i:2;s:6:\\\"-quiet\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:7:\\\"optipng\\\";}i:3;O:37:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Svgo\\\":5:{s:7:\\\"options\\\";a:1:{i:0;s:20:\\\"--disable=cleanupIDs\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:4:\\\"svgo\\\";}i:4;O:41:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Gifsicle\\\":5:{s:7:\\\"options\\\";a:2:{i:0;s:2:\\\"-b\\\";i:1;s:3:\\\"-O3\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:8:\\\"gifsicle\\\";}i:5;O:38:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Cwebp\\\":5:{s:7:\\\"options\\\";a:4:{i:0;s:4:\\\"-m 6\\\";i:1;s:8:\\\"-pass 10\\\";i:2;s:3:\\\"-mt\\\";i:3;s:5:\\\"-q 90\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:5:\\\"cwebp\\\";}i:6;O:40:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Avifenc\\\":6:{s:7:\\\"options\\\";a:8:{i:0;s:14:\\\"-a cq-level=23\\\";i:1;s:6:\\\"-j all\\\";i:2;s:7:\\\"--min 0\\\";i:3;s:8:\\\"--max 63\\\";i:4;s:12:\\\"--minalpha 0\\\";i:5;s:13:\\\"--maxalpha 63\\\";i:6;s:14:\\\"-a end-usage=q\\\";i:7;s:12:\\\"-a tune=ssim\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:7:\\\"avifenc\\\";s:16:\\\"decodeBinaryName\\\";s:7:\\\"avifdec\\\";}}s:9:\\\"\\u0000*\\u0000logger\\\";O:33:\\\"Spatie\\\\ImageOptimizer\\\\DummyLogger\\\":0:{}s:10:\\\"\\u0000*\\u0000timeout\\\";i:60;}}s:6:\\\"format\\\";a:1:{i:0;s:3:\\\"jpg\\\";}s:5:\\\"width\\\";a:1:{i:0;i:150;}s:6:\\\"height\\\";a:1:{i:0;i:150;}}}s:23:\\\"\\u0000*\\u0000performOnCollections\\\";a:0:{}s:17:\\\"\\u0000*\\u0000performOnQueue\\\";b:1;s:26:\\\"\\u0000*\\u0000keepOriginalImageFormat\\\";b:0;s:27:\\\"\\u0000*\\u0000generateResponsiveImages\\\";b:0;s:18:\\\"\\u0000*\\u0000widthCalculator\\\";N;s:24:\\\"\\u0000*\\u0000loadingAttributeValue\\\";N;s:16:\\\"\\u0000*\\u0000pdfPageNumber\\\";i:1;s:7:\\\"\\u0000*\\u0000name\\\";s:5:\\\"thumb\\\";}}s:28:\\\"\\u0000*\\u0000escapeWhenCastingToString\\\";b:0;}s:8:\\\"\\u0000*\\u0000media\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:49:\\\"Spatie\\\\MediaLibrary\\\\MediaCollections\\\\Models\\\\Media\\\";s:2:\\\"id\\\";i:16;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:14:\\\"\\u0000*\\u0000onlyMissing\\\";b:0;s:10:\\\"connection\\\";s:8:\\\"database\\\";s:5:\\\"queue\\\";s:0:\\\"\\\";s:11:\\\"afterCommit\\\";b:1;}\",\"batchId\":null},\"createdAt\":1773130327,\"delay\":null}',0,NULL,1773130327,1773130327),(5,'default','{\"uuid\":\"a169cc89-4123-453c-bc5f-fc45af309637\",\"displayName\":\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\",\"command\":\"O:58:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\\\":6:{s:14:\\\"\\u0000*\\u0000conversions\\\";O:52:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\ConversionCollection\\\":2:{s:8:\\\"\\u0000*\\u0000items\\\";a:1:{i:0;O:42:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Conversion\\\":11:{s:12:\\\"\\u0000*\\u0000fileNamer\\\";O:54:\\\"Spatie\\\\MediaLibrary\\\\Support\\\\FileNamer\\\\DefaultFileNamer\\\":0:{}s:28:\\\"\\u0000*\\u0000extractVideoFrameAtSecond\\\";d:0;s:16:\\\"\\u0000*\\u0000manipulations\\\";O:45:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Manipulations\\\":1:{s:16:\\\"\\u0000*\\u0000manipulations\\\";a:4:{s:8:\\\"optimize\\\";a:1:{i:0;O:36:\\\"Spatie\\\\ImageOptimizer\\\\OptimizerChain\\\":3:{s:13:\\\"\\u0000*\\u0000optimizers\\\";a:7:{i:0;O:42:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Jpegoptim\\\":5:{s:7:\\\"options\\\";a:4:{i:0;s:4:\\\"-m85\\\";i:1;s:7:\\\"--force\\\";i:2;s:11:\\\"--strip-all\\\";i:3;s:17:\\\"--all-progressive\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:9:\\\"jpegoptim\\\";}i:1;O:41:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Pngquant\\\":5:{s:7:\\\"options\\\";a:1:{i:0;s:7:\\\"--force\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:8:\\\"pngquant\\\";}i:2;O:40:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Optipng\\\":5:{s:7:\\\"options\\\";a:3:{i:0;s:3:\\\"-i0\\\";i:1;s:3:\\\"-o2\\\";i:2;s:6:\\\"-quiet\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:7:\\\"optipng\\\";}i:3;O:37:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Svgo\\\":5:{s:7:\\\"options\\\";a:1:{i:0;s:20:\\\"--disable=cleanupIDs\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:4:\\\"svgo\\\";}i:4;O:41:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Gifsicle\\\":5:{s:7:\\\"options\\\";a:2:{i:0;s:2:\\\"-b\\\";i:1;s:3:\\\"-O3\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:8:\\\"gifsicle\\\";}i:5;O:38:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Cwebp\\\":5:{s:7:\\\"options\\\";a:4:{i:0;s:4:\\\"-m 6\\\";i:1;s:8:\\\"-pass 10\\\";i:2;s:3:\\\"-mt\\\";i:3;s:5:\\\"-q 90\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:5:\\\"cwebp\\\";}i:6;O:40:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Avifenc\\\":6:{s:7:\\\"options\\\";a:8:{i:0;s:14:\\\"-a cq-level=23\\\";i:1;s:6:\\\"-j all\\\";i:2;s:7:\\\"--min 0\\\";i:3;s:8:\\\"--max 63\\\";i:4;s:12:\\\"--minalpha 0\\\";i:5;s:13:\\\"--maxalpha 63\\\";i:6;s:14:\\\"-a end-usage=q\\\";i:7;s:12:\\\"-a tune=ssim\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:7:\\\"avifenc\\\";s:16:\\\"decodeBinaryName\\\";s:7:\\\"avifdec\\\";}}s:9:\\\"\\u0000*\\u0000logger\\\";O:33:\\\"Spatie\\\\ImageOptimizer\\\\DummyLogger\\\":0:{}s:10:\\\"\\u0000*\\u0000timeout\\\";i:60;}}s:6:\\\"format\\\";a:1:{i:0;s:3:\\\"jpg\\\";}s:5:\\\"width\\\";a:1:{i:0;i:150;}s:6:\\\"height\\\";a:1:{i:0;i:150;}}}s:23:\\\"\\u0000*\\u0000performOnCollections\\\";a:0:{}s:17:\\\"\\u0000*\\u0000performOnQueue\\\";b:1;s:26:\\\"\\u0000*\\u0000keepOriginalImageFormat\\\";b:0;s:27:\\\"\\u0000*\\u0000generateResponsiveImages\\\";b:0;s:18:\\\"\\u0000*\\u0000widthCalculator\\\";N;s:24:\\\"\\u0000*\\u0000loadingAttributeValue\\\";N;s:16:\\\"\\u0000*\\u0000pdfPageNumber\\\";i:1;s:7:\\\"\\u0000*\\u0000name\\\";s:5:\\\"thumb\\\";}}s:28:\\\"\\u0000*\\u0000escapeWhenCastingToString\\\";b:0;}s:8:\\\"\\u0000*\\u0000media\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:49:\\\"Spatie\\\\MediaLibrary\\\\MediaCollections\\\\Models\\\\Media\\\";s:2:\\\"id\\\";i:17;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:14:\\\"\\u0000*\\u0000onlyMissing\\\";b:0;s:10:\\\"connection\\\";s:8:\\\"database\\\";s:5:\\\"queue\\\";s:0:\\\"\\\";s:11:\\\"afterCommit\\\";b:1;}\",\"batchId\":null},\"createdAt\":1773135135,\"delay\":null}',0,NULL,1773135135,1773135135),(6,'default','{\"uuid\":\"a96c543e-6f87-43a7-ac0a-d47ae7938ec9\",\"displayName\":\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\",\"command\":\"O:58:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\\\":6:{s:14:\\\"\\u0000*\\u0000conversions\\\";O:52:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\ConversionCollection\\\":2:{s:8:\\\"\\u0000*\\u0000items\\\";a:1:{i:0;O:42:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Conversion\\\":11:{s:12:\\\"\\u0000*\\u0000fileNamer\\\";O:54:\\\"Spatie\\\\MediaLibrary\\\\Support\\\\FileNamer\\\\DefaultFileNamer\\\":0:{}s:28:\\\"\\u0000*\\u0000extractVideoFrameAtSecond\\\";d:0;s:16:\\\"\\u0000*\\u0000manipulations\\\";O:45:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Manipulations\\\":1:{s:16:\\\"\\u0000*\\u0000manipulations\\\";a:4:{s:8:\\\"optimize\\\";a:1:{i:0;O:36:\\\"Spatie\\\\ImageOptimizer\\\\OptimizerChain\\\":3:{s:13:\\\"\\u0000*\\u0000optimizers\\\";a:7:{i:0;O:42:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Jpegoptim\\\":5:{s:7:\\\"options\\\";a:4:{i:0;s:4:\\\"-m85\\\";i:1;s:7:\\\"--force\\\";i:2;s:11:\\\"--strip-all\\\";i:3;s:17:\\\"--all-progressive\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:9:\\\"jpegoptim\\\";}i:1;O:41:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Pngquant\\\":5:{s:7:\\\"options\\\";a:1:{i:0;s:7:\\\"--force\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:8:\\\"pngquant\\\";}i:2;O:40:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Optipng\\\":5:{s:7:\\\"options\\\";a:3:{i:0;s:3:\\\"-i0\\\";i:1;s:3:\\\"-o2\\\";i:2;s:6:\\\"-quiet\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:7:\\\"optipng\\\";}i:3;O:37:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Svgo\\\":5:{s:7:\\\"options\\\";a:1:{i:0;s:20:\\\"--disable=cleanupIDs\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:4:\\\"svgo\\\";}i:4;O:41:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Gifsicle\\\":5:{s:7:\\\"options\\\";a:2:{i:0;s:2:\\\"-b\\\";i:1;s:3:\\\"-O3\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:8:\\\"gifsicle\\\";}i:5;O:38:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Cwebp\\\":5:{s:7:\\\"options\\\";a:4:{i:0;s:4:\\\"-m 6\\\";i:1;s:8:\\\"-pass 10\\\";i:2;s:3:\\\"-mt\\\";i:3;s:5:\\\"-q 90\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:5:\\\"cwebp\\\";}i:6;O:40:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Avifenc\\\":6:{s:7:\\\"options\\\";a:8:{i:0;s:14:\\\"-a cq-level=23\\\";i:1;s:6:\\\"-j all\\\";i:2;s:7:\\\"--min 0\\\";i:3;s:8:\\\"--max 63\\\";i:4;s:12:\\\"--minalpha 0\\\";i:5;s:13:\\\"--maxalpha 63\\\";i:6;s:14:\\\"-a end-usage=q\\\";i:7;s:12:\\\"-a tune=ssim\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:7:\\\"avifenc\\\";s:16:\\\"decodeBinaryName\\\";s:7:\\\"avifdec\\\";}}s:9:\\\"\\u0000*\\u0000logger\\\";O:33:\\\"Spatie\\\\ImageOptimizer\\\\DummyLogger\\\":0:{}s:10:\\\"\\u0000*\\u0000timeout\\\";i:60;}}s:6:\\\"format\\\";a:1:{i:0;s:3:\\\"jpg\\\";}s:5:\\\"width\\\";a:1:{i:0;i:150;}s:6:\\\"height\\\";a:1:{i:0;i:150;}}}s:23:\\\"\\u0000*\\u0000performOnCollections\\\";a:0:{}s:17:\\\"\\u0000*\\u0000performOnQueue\\\";b:1;s:26:\\\"\\u0000*\\u0000keepOriginalImageFormat\\\";b:0;s:27:\\\"\\u0000*\\u0000generateResponsiveImages\\\";b:0;s:18:\\\"\\u0000*\\u0000widthCalculator\\\";N;s:24:\\\"\\u0000*\\u0000loadingAttributeValue\\\";N;s:16:\\\"\\u0000*\\u0000pdfPageNumber\\\";i:1;s:7:\\\"\\u0000*\\u0000name\\\";s:5:\\\"thumb\\\";}}s:28:\\\"\\u0000*\\u0000escapeWhenCastingToString\\\";b:0;}s:8:\\\"\\u0000*\\u0000media\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:49:\\\"Spatie\\\\MediaLibrary\\\\MediaCollections\\\\Models\\\\Media\\\";s:2:\\\"id\\\";i:18;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:14:\\\"\\u0000*\\u0000onlyMissing\\\";b:0;s:10:\\\"connection\\\";s:8:\\\"database\\\";s:5:\\\"queue\\\";s:0:\\\"\\\";s:11:\\\"afterCommit\\\";b:1;}\",\"batchId\":null},\"createdAt\":1773158480,\"delay\":null}',0,NULL,1773158482,1773158482),(7,'default','{\"uuid\":\"504a5843-49f9-4099-a543-b7d4c047afa3\",\"displayName\":\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\",\"command\":\"O:58:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\\\":6:{s:14:\\\"\\u0000*\\u0000conversions\\\";O:52:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\ConversionCollection\\\":2:{s:8:\\\"\\u0000*\\u0000items\\\";a:1:{i:0;O:42:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Conversion\\\":11:{s:12:\\\"\\u0000*\\u0000fileNamer\\\";O:54:\\\"Spatie\\\\MediaLibrary\\\\Support\\\\FileNamer\\\\DefaultFileNamer\\\":0:{}s:28:\\\"\\u0000*\\u0000extractVideoFrameAtSecond\\\";d:0;s:16:\\\"\\u0000*\\u0000manipulations\\\";O:45:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Manipulations\\\":1:{s:16:\\\"\\u0000*\\u0000manipulations\\\";a:4:{s:8:\\\"optimize\\\";a:1:{i:0;O:36:\\\"Spatie\\\\ImageOptimizer\\\\OptimizerChain\\\":3:{s:13:\\\"\\u0000*\\u0000optimizers\\\";a:7:{i:0;O:42:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Jpegoptim\\\":5:{s:7:\\\"options\\\";a:4:{i:0;s:4:\\\"-m85\\\";i:1;s:7:\\\"--force\\\";i:2;s:11:\\\"--strip-all\\\";i:3;s:17:\\\"--all-progressive\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:9:\\\"jpegoptim\\\";}i:1;O:41:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Pngquant\\\":5:{s:7:\\\"options\\\";a:1:{i:0;s:7:\\\"--force\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:8:\\\"pngquant\\\";}i:2;O:40:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Optipng\\\":5:{s:7:\\\"options\\\";a:3:{i:0;s:3:\\\"-i0\\\";i:1;s:3:\\\"-o2\\\";i:2;s:6:\\\"-quiet\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:7:\\\"optipng\\\";}i:3;O:37:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Svgo\\\":5:{s:7:\\\"options\\\";a:1:{i:0;s:20:\\\"--disable=cleanupIDs\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:4:\\\"svgo\\\";}i:4;O:41:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Gifsicle\\\":5:{s:7:\\\"options\\\";a:2:{i:0;s:2:\\\"-b\\\";i:1;s:3:\\\"-O3\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:8:\\\"gifsicle\\\";}i:5;O:38:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Cwebp\\\":5:{s:7:\\\"options\\\";a:4:{i:0;s:4:\\\"-m 6\\\";i:1;s:8:\\\"-pass 10\\\";i:2;s:3:\\\"-mt\\\";i:3;s:5:\\\"-q 90\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:5:\\\"cwebp\\\";}i:6;O:40:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Avifenc\\\":6:{s:7:\\\"options\\\";a:8:{i:0;s:14:\\\"-a cq-level=23\\\";i:1;s:6:\\\"-j all\\\";i:2;s:7:\\\"--min 0\\\";i:3;s:8:\\\"--max 63\\\";i:4;s:12:\\\"--minalpha 0\\\";i:5;s:13:\\\"--maxalpha 63\\\";i:6;s:14:\\\"-a end-usage=q\\\";i:7;s:12:\\\"-a tune=ssim\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:7:\\\"avifenc\\\";s:16:\\\"decodeBinaryName\\\";s:7:\\\"avifdec\\\";}}s:9:\\\"\\u0000*\\u0000logger\\\";O:33:\\\"Spatie\\\\ImageOptimizer\\\\DummyLogger\\\":0:{}s:10:\\\"\\u0000*\\u0000timeout\\\";i:60;}}s:6:\\\"format\\\";a:1:{i:0;s:3:\\\"jpg\\\";}s:5:\\\"width\\\";a:1:{i:0;i:150;}s:6:\\\"height\\\";a:1:{i:0;i:150;}}}s:23:\\\"\\u0000*\\u0000performOnCollections\\\";a:0:{}s:17:\\\"\\u0000*\\u0000performOnQueue\\\";b:1;s:26:\\\"\\u0000*\\u0000keepOriginalImageFormat\\\";b:0;s:27:\\\"\\u0000*\\u0000generateResponsiveImages\\\";b:0;s:18:\\\"\\u0000*\\u0000widthCalculator\\\";N;s:24:\\\"\\u0000*\\u0000loadingAttributeValue\\\";N;s:16:\\\"\\u0000*\\u0000pdfPageNumber\\\";i:1;s:7:\\\"\\u0000*\\u0000name\\\";s:5:\\\"thumb\\\";}}s:28:\\\"\\u0000*\\u0000escapeWhenCastingToString\\\";b:0;}s:8:\\\"\\u0000*\\u0000media\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:49:\\\"Spatie\\\\MediaLibrary\\\\MediaCollections\\\\Models\\\\Media\\\";s:2:\\\"id\\\";i:20;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:14:\\\"\\u0000*\\u0000onlyMissing\\\";b:0;s:10:\\\"connection\\\";s:8:\\\"database\\\";s:5:\\\"queue\\\";s:0:\\\"\\\";s:11:\\\"afterCommit\\\";b:1;}\",\"batchId\":null},\"createdAt\":1773296885,\"delay\":null}',0,NULL,1773296886,1773296886),(8,'default','{\"uuid\":\"7005c386-7d23-486a-9ab3-afd3fdc90609\",\"displayName\":\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\",\"command\":\"O:58:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\\\":6:{s:14:\\\"\\u0000*\\u0000conversions\\\";O:52:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\ConversionCollection\\\":2:{s:8:\\\"\\u0000*\\u0000items\\\";a:1:{i:0;O:42:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Conversion\\\":11:{s:12:\\\"\\u0000*\\u0000fileNamer\\\";O:54:\\\"Spatie\\\\MediaLibrary\\\\Support\\\\FileNamer\\\\DefaultFileNamer\\\":0:{}s:28:\\\"\\u0000*\\u0000extractVideoFrameAtSecond\\\";d:0;s:16:\\\"\\u0000*\\u0000manipulations\\\";O:45:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Manipulations\\\":1:{s:16:\\\"\\u0000*\\u0000manipulations\\\";a:4:{s:8:\\\"optimize\\\";a:1:{i:0;O:36:\\\"Spatie\\\\ImageOptimizer\\\\OptimizerChain\\\":3:{s:13:\\\"\\u0000*\\u0000optimizers\\\";a:7:{i:0;O:42:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Jpegoptim\\\":5:{s:7:\\\"options\\\";a:4:{i:0;s:4:\\\"-m85\\\";i:1;s:7:\\\"--force\\\";i:2;s:11:\\\"--strip-all\\\";i:3;s:17:\\\"--all-progressive\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:9:\\\"jpegoptim\\\";}i:1;O:41:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Pngquant\\\":5:{s:7:\\\"options\\\";a:1:{i:0;s:7:\\\"--force\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:8:\\\"pngquant\\\";}i:2;O:40:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Optipng\\\":5:{s:7:\\\"options\\\";a:3:{i:0;s:3:\\\"-i0\\\";i:1;s:3:\\\"-o2\\\";i:2;s:6:\\\"-quiet\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:7:\\\"optipng\\\";}i:3;O:37:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Svgo\\\":5:{s:7:\\\"options\\\";a:1:{i:0;s:20:\\\"--disable=cleanupIDs\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:4:\\\"svgo\\\";}i:4;O:41:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Gifsicle\\\":5:{s:7:\\\"options\\\";a:2:{i:0;s:2:\\\"-b\\\";i:1;s:3:\\\"-O3\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:8:\\\"gifsicle\\\";}i:5;O:38:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Cwebp\\\":5:{s:7:\\\"options\\\";a:4:{i:0;s:4:\\\"-m 6\\\";i:1;s:8:\\\"-pass 10\\\";i:2;s:3:\\\"-mt\\\";i:3;s:5:\\\"-q 90\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:5:\\\"cwebp\\\";}i:6;O:40:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Avifenc\\\":6:{s:7:\\\"options\\\";a:8:{i:0;s:14:\\\"-a cq-level=23\\\";i:1;s:6:\\\"-j all\\\";i:2;s:7:\\\"--min 0\\\";i:3;s:8:\\\"--max 63\\\";i:4;s:12:\\\"--minalpha 0\\\";i:5;s:13:\\\"--maxalpha 63\\\";i:6;s:14:\\\"-a end-usage=q\\\";i:7;s:12:\\\"-a tune=ssim\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:7:\\\"avifenc\\\";s:16:\\\"decodeBinaryName\\\";s:7:\\\"avifdec\\\";}}s:9:\\\"\\u0000*\\u0000logger\\\";O:33:\\\"Spatie\\\\ImageOptimizer\\\\DummyLogger\\\":0:{}s:10:\\\"\\u0000*\\u0000timeout\\\";i:60;}}s:6:\\\"format\\\";a:1:{i:0;s:3:\\\"jpg\\\";}s:5:\\\"width\\\";a:1:{i:0;i:150;}s:6:\\\"height\\\";a:1:{i:0;i:150;}}}s:23:\\\"\\u0000*\\u0000performOnCollections\\\";a:0:{}s:17:\\\"\\u0000*\\u0000performOnQueue\\\";b:1;s:26:\\\"\\u0000*\\u0000keepOriginalImageFormat\\\";b:0;s:27:\\\"\\u0000*\\u0000generateResponsiveImages\\\";b:0;s:18:\\\"\\u0000*\\u0000widthCalculator\\\";N;s:24:\\\"\\u0000*\\u0000loadingAttributeValue\\\";N;s:16:\\\"\\u0000*\\u0000pdfPageNumber\\\";i:1;s:7:\\\"\\u0000*\\u0000name\\\";s:5:\\\"thumb\\\";}}s:28:\\\"\\u0000*\\u0000escapeWhenCastingToString\\\";b:0;}s:8:\\\"\\u0000*\\u0000media\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:49:\\\"Spatie\\\\MediaLibrary\\\\MediaCollections\\\\Models\\\\Media\\\";s:2:\\\"id\\\";i:21;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:14:\\\"\\u0000*\\u0000onlyMissing\\\";b:0;s:10:\\\"connection\\\";s:8:\\\"database\\\";s:5:\\\"queue\\\";s:0:\\\"\\\";s:11:\\\"afterCommit\\\";b:1;}\",\"batchId\":null},\"createdAt\":1773297546,\"delay\":null}',0,NULL,1773297546,1773297546);
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_uuid_unique` (`uuid`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  KEY `media_order_column_index` (`order_column`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (15,'App\\Models\\employe',20,'a9843e17-cd0b-4e98-981c-ea4f1e2e83d9','photos','ZHAlBvjvnX3LJqyELWHD4ppDP8t1C6tufhF7mRKr','ZHAlBvjvnX3LJqyELWHD4ppDP8t1C6tufhF7mRKr.jpg','image/jpeg','public','public',4469665,'[]','[]','[]','[]',1,'2026-03-10 03:50:42','2026-03-10 03:50:42'),(3,'App\\Models\\employe',19,'372b17f7-4fb2-4c38-95c9-a693941f64e2','photos','GH1dZ20sYV34YJbjFIAlLvlrJAvzNLixqaMVQWyw','GH1dZ20sYV34YJbjFIAlLvlrJAvzNLixqaMVQWyw.jpg','image/jpeg','public','public',171142,'[]','[]','[]','[]',1,'2026-03-06 08:46:39','2026-03-06 08:46:39'),(4,'App\\Models\\employe',22,'985193db-cce8-46f3-a7bf-5a012bb56e9d','photos','PeAkMPyP04mOyujMuFlHdE6WYLjVZ30NZSyJb3bK','PeAkMPyP04mOyujMuFlHdE6WYLjVZ30NZSyJb3bK.jpg','image/jpeg','public','public',6442917,'[]','[]','[]','[]',1,'2026-03-07 10:19:10','2026-03-07 10:19:10'),(5,'App\\Models\\employe',23,'ec16533d-2730-41c4-9be7-af0169af6118','photos','9tGxCIe6DtuzM7fAP21edpzLxPO3NZj9GmMQtg4N','9tGxCIe6DtuzM7fAP21edpzLxPO3NZj9GmMQtg4N.jpg','image/jpeg','public','public',4469665,'[]','[]','[]','[]',1,'2026-03-07 10:23:51','2026-03-07 10:23:51'),(6,'App\\Models\\employe',23,'858f8253-d127-41ed-8773-3b4254eee933','photos','WdlQZjppQUWPipyQ0Hr4xJfjDR6BtxiOFUsHvLsm','WdlQZjppQUWPipyQ0Hr4xJfjDR6BtxiOFUsHvLsm.jpg','image/jpeg','public','public',15280543,'[]','[]','[]','[]',2,'2026-03-09 02:33:02','2026-03-09 02:33:02'),(7,'App\\Models\\employe',24,'60044f3d-5303-4fea-a016-d50de7363bf6','photos','cMvWH7O7Q36g8WwqCSOJYyaIrRlADnJgncvuumIR','cMvWH7O7Q36g8WwqCSOJYyaIrRlADnJgncvuumIR.jpg','image/jpeg','public','public',7007599,'[]','[]','[]','[]',1,'2026-03-09 12:31:40','2026-03-09 12:31:40'),(19,'App\\Models\\employe',25,'30b3a4be-cf54-4ff9-9030-42cf2b81f80c','photos','yYPeYKViCOAAzkLCquM0BUb4usq7qodXNg0vfoAK','yYPeYKViCOAAzkLCquM0BUb4usq7qodXNg0vfoAK.jpg','image/jpeg','public','public',1353798,'[]','[]','[]','[]',1,'2026-03-12 02:35:59','2026-03-12 02:35:59'),(21,'App\\Models\\utilisateur',1,'ed9a3c17-ddd4-4e5b-b0df-40ef458f12f0','photos','TOBXzYoFf4L4GA0HoiwpQgivUm6zMB4nfJ4C8BOl','TOBXzYoFf4L4GA0HoiwpQgivUm6zMB4nfJ4C8BOl.jpg','image/jpeg','public','public',2704213,'[]','[]','[]','[]',1,'2026-03-12 03:39:06','2026-03-12 03:39:06'),(12,'App\\Models\\employe',22,'bbcc350c-ffbe-432d-a82f-8aaea1f1b0a3','photos','fv6JoOGP3Cel00AFIEzfHslEGyMXGaYyqg96aW9T','fv6JoOGP3Cel00AFIEzfHslEGyMXGaYyqg96aW9T.jpg','image/jpeg','public','public',3169629,'[]','[]','[]','[]',2,'2026-03-10 03:42:13','2026-03-10 03:42:13'),(14,'App\\Models\\employe',21,'bb9ba4c8-dff3-4a83-9f4e-55a8b5464d22','photos','oky3PtgeYQxXMkU7JpcAkDooA2M8BKhZCNA8aoGm','oky3PtgeYQxXMkU7JpcAkDooA2M8BKhZCNA8aoGm.jpg','image/jpeg','public','public',356566,'[]','[]','[]','[]',1,'2026-03-10 03:48:53','2026-03-10 03:48:53');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000001_create_cache_table',1),(2,'0001_01_01_000002_create_jobs_table',1),(3,'2026_02_16_123618_create_sessions_table',1),(4,'2026_02_16_130844_create_media_table',1),(5,'2026_02_17_171011_create_departement_tables',1),(6,'2026_02_17_171358_create_poste_tables',1),(7,'2026_02_17_172613_create_presence_tables',1),(8,'2026_02_17_173145_create_utilisateur_tables',1),(9,'2026_02_17_181103_create_employe_tables',1),(10,'2026_02_17_182611_create_conge_tables',1),(11,'2026_02_25_111904_add_date_pointage_to_presence_tables',2),(12,'2026_02_25_112033_add_date_pointage_to_presence_tables',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poste_tables`
--

DROP TABLE IF EXISTS `poste_tables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `poste_tables` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `poste` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salaire` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poste_tables`
--

LOCK TABLES `poste_tables` WRITE;
/*!40000 ALTER TABLE `poste_tables` DISABLE KEYS */;
INSERT INTO `poste_tables` VALUES (1,'Directeur / Gérant',6000000.00,'2026-02-23 10:09:18','2026-02-23 10:09:18'),(2,'Directeur adjoint',5500000.00,'2026-02-23 10:09:18','2026-02-23 10:09:18'),(3,'Secrétaire de direction',5000000.00,'2026-02-23 10:09:18','2026-02-23 10:09:18'),(4,'Responsable RH',3800000.00,'2026-02-23 10:09:18','2026-02-23 10:09:18'),(5,'Gestionnaire RH',3500000.00,'2026-02-23 10:09:18','2026-02-23 10:09:18'),(6,'Assistant RH',3200000.00,'2026-02-23 10:09:18','2026-02-23 10:09:18'),(7,'Chargé de paie',3600000.00,'2026-02-23 10:09:18','2026-02-23 10:09:18'),(8,'Responsable administratif',4200000.00,'2026-02-23 10:09:18','2026-02-23 10:09:18'),(9,'Agent administratif',3400000.00,'2026-02-23 10:09:18','2026-02-23 10:09:18'),(10,'Secrétaire',3100000.00,'2026-02-23 10:09:18','2026-02-23 10:09:18'),(11,'Agent d\'accueil',2800000.00,'2026-02-23 10:09:18','2026-02-23 10:09:18'),(12,'Responsable IT',4800000.00,'2026-02-23 10:09:18','2026-02-23 10:09:18'),(13,'Développeur',4500000.00,'2026-02-23 10:09:18','2026-02-23 10:09:18'),(14,'Technicien informatique',3900000.00,'2026-02-23 10:09:18','2026-02-23 10:09:18'),(15,'Support IT',3750000.00,'2026-02-23 10:09:18','2026-02-23 10:09:18'),(16,'Responsable commercial',4700000.00,'2026-02-23 10:09:18','2026-02-23 10:09:18'),(17,'Commercial / Vendeur',3500000.00,'2026-02-23 10:09:18','2026-02-23 10:09:18'),(18,'Chargé de clientèle',3200000.00,'2026-02-23 10:09:18','2026-02-23 10:09:18'),(19,'Community manager',3800000.00,'2026-02-23 10:09:18','2026-02-23 10:09:18'),(20,'Technicien',3400000.00,'2026-02-23 10:09:18','2026-02-23 10:09:18'),(21,'Magasinier',2900000.00,'2026-02-23 10:09:18','2026-02-23 10:09:18'),(22,'Chauffeur',3150000.00,'2026-02-23 10:09:19','2026-02-23 10:09:19'),(23,'Agent de sécurité',3250000.00,'2026-02-23 10:09:19','2026-02-23 10:09:19'),(24,'Agent de nettoyage',2750000.00,'2026-02-23 10:09:19','2026-02-23 10:09:19');
/*!40000 ALTER TABLE `poste_tables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presence_tables`
--

DROP TABLE IF EXISTS `presence_tables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `presence_tables` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `statut` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime NOT NULL,
  `id_utilisateur` bigint unsigned NOT NULL,
  `id_employe` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_pointage` date DEFAULT NULL,
  `motifs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `presence_tables_id_utilisateur_foreign` (`id_utilisateur`),
  KEY `presence_tables_id_employe_foreign` (`id_employe`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presence_tables`
--

LOCK TABLES `presence_tables` WRITE;
/*!40000 ALTER TABLE `presence_tables` DISABLE KEYS */;
INSERT INTO `presence_tables` VALUES (1,'Présent','2026-03-03 11:49:00','2026-03-03 23:16:00',1,5,'2026-03-03 05:49:55','2026-03-03 16:16:51','2026-03-03','neant'),(2,'Présent','2026-03-03 08:17:00','2026-03-03 22:47:00',1,6,'2026-03-03 16:17:24','2026-03-03 16:48:02','2026-03-03','accepté'),(3,'Présent','2026-03-05 16:48:00','2026-03-05 21:47:00',1,5,'2026-03-04 09:47:36','2026-03-04 09:48:03','2026-03-05','néant'),(4,'Présent','2026-03-04 20:45:00','2026-03-04 00:00:00',1,13,'2026-03-04 14:45:18','2026-03-04 14:45:18','2026-03-04','néant'),(5,'Présent','2026-03-04 15:45:00','2026-03-04 00:00:00',1,8,'2026-03-04 14:45:53','2026-03-04 14:45:53','2026-03-04','néant'),(6,'Présent','2026-03-04 16:10:00','2026-03-04 00:00:00',1,11,'2026-03-04 15:10:34','2026-03-04 15:10:34','2026-03-04','néant'),(7,'Présent','2026-03-05 08:33:00','2026-03-05 00:00:00',1,5,'2026-03-05 02:34:08','2026-03-05 02:34:08','2026-03-05','accepté'),(8,'Présent','2026-03-05 08:34:00','2026-03-05 00:00:00',1,6,'2026-03-05 02:34:58','2026-03-05 02:34:58','2026-03-05','Néant'),(9,'Présent','2026-03-05 08:35:00','2026-03-05 00:00:00',1,14,'2026-03-05 02:35:21','2026-03-05 02:35:21','2026-03-05','néant'),(10,'Présent','2026-03-05 08:35:00','2026-03-05 00:00:00',1,8,'2026-03-05 02:35:45','2026-03-05 02:35:45','2026-03-05','néant'),(11,'Présent','2026-03-05 12:41:00','2026-03-05 00:00:00',1,5,'2026-03-05 06:41:50','2026-03-05 06:41:50','2026-03-05','néant'),(12,'Présent','2026-03-05 19:51:00','2026-03-05 00:00:00',1,17,'2026-03-05 13:52:04','2026-03-05 13:52:04','2026-03-05','néant'),(13,'Présent','2026-03-05 19:52:00','2026-03-05 21:52:00',1,16,'2026-03-05 13:52:40','2026-03-05 13:52:55','2026-03-05','néant'),(14,'Présent','2026-03-05 20:53:00','2026-03-05 00:00:00',1,11,'2026-03-05 13:53:27','2026-03-05 13:53:27','2026-03-05','néant'),(15,'Présent','2026-03-05 19:54:00','2026-03-05 00:00:00',1,8,'2026-03-05 13:54:33','2026-03-05 13:54:33','2026-03-05','néant'),(16,'Présent','2026-03-05 20:09:00','2026-03-05 00:00:00',1,18,'2026-03-05 14:09:24','2026-03-05 14:09:24','2026-03-05','néant'),(17,'Présent','2026-03-05 20:09:00','2026-03-05 00:00:00',1,20,'2026-03-05 14:09:50','2026-03-05 14:09:50','2026-03-05','néant'),(18,'Présent','2026-03-05 20:10:00','2026-03-05 00:00:00',1,14,'2026-03-05 14:10:28','2026-03-05 14:10:28','2026-03-05','néant'),(19,'Présent','2026-03-06 09:21:00','2026-03-06 00:00:00',1,18,'2026-03-06 03:21:50','2026-03-06 03:21:50','2026-03-06','tard'),(20,'Présent','2026-03-06 08:03:00','2026-03-06 00:00:00',1,17,'2026-03-06 03:22:28','2026-03-06 03:22:28','2026-03-06','néant'),(21,'Présent','2026-03-06 08:00:00','2026-03-06 00:00:00',1,5,'2026-03-06 03:23:03','2026-03-06 03:23:03','2026-03-06','néant'),(22,'Présent','2026-03-06 08:06:00','2026-03-06 00:00:00',1,6,'2026-03-06 03:23:29','2026-03-06 03:23:29','2026-03-06','néant'),(23,'Présent','2026-03-06 09:23:00','2026-03-06 00:00:00',1,6,'2026-03-06 03:23:52','2026-03-06 03:23:52','2026-03-06','tard'),(24,'Présent','2026-03-06 08:01:00','2026-03-06 00:00:00',1,14,'2026-03-06 03:24:15','2026-03-06 03:24:15','2026-03-06','néant'),(25,'Présent','2026-03-06 08:00:00','2026-03-06 00:00:00',1,8,'2026-03-06 03:24:45','2026-03-06 03:24:45','2026-03-06','néant'),(26,'Présent','2026-03-06 09:24:00','2026-03-06 00:00:00',1,16,'2026-03-06 03:25:03','2026-03-06 03:25:03','2026-03-06','tard'),(27,'Présent','2026-03-06 08:02:00','2026-03-06 00:00:00',1,10,'2026-03-06 03:25:27','2026-03-06 03:25:27','2026-03-06','néant'),(28,'Présent','2026-03-06 09:25:00','2026-03-06 00:00:00',1,11,'2026-03-06 03:25:54','2026-03-06 03:25:54','2026-03-06','tard'),(29,'Présent','2026-03-06 08:02:00','2026-03-06 00:00:00',1,15,'2026-03-06 03:26:25','2026-03-06 03:26:25','2026-03-06','néant'),(30,'Présent','2026-03-06 08:01:00','2026-03-06 15:00:00',1,13,'2026-03-06 03:27:10','2026-03-06 09:00:50','2026-03-06','néant'),(31,'Présent','2026-03-06 08:01:00','2026-03-06 15:00:00',1,19,'2026-03-06 03:27:34','2026-03-06 09:00:33','2026-03-06','néant'),(32,'Présent','2026-03-06 09:27:00','2026-03-06 15:00:00',1,20,'2026-03-06 03:28:06','2026-03-06 09:00:19','2026-03-06','tard (rendez-vous au docteur)'),(33,'Retard','2026-03-06 15:01:00','2026-03-06 00:00:00',1,21,'2026-03-06 09:01:53','2026-03-06 09:01:53','2026-03-06','rendez-vous avec l\'entreprise AUTO'),(34,'Retard','2026-03-07 09:56:00','2026-03-07 00:00:00',1,18,'2026-03-07 03:56:19','2026-03-07 03:56:19','2026-03-07','tard'),(35,'Présent','2026-03-07 08:00:00','2026-03-07 00:00:00',1,17,'2026-03-07 03:56:46','2026-03-07 03:56:46','2026-03-07','néant'),(36,'Présent','2026-03-07 08:00:00','2026-03-07 00:00:00',1,5,'2026-03-07 03:57:08','2026-03-07 03:57:08','2026-03-07','néant'),(37,'Présent','2026-03-07 08:00:00','2026-03-07 00:00:00',1,6,'2026-03-07 03:57:31','2026-03-07 03:57:31','2026-03-07','néant'),(38,'Présent','2026-03-07 08:00:00','2026-03-07 00:00:00',1,14,'2026-03-07 03:58:00','2026-03-07 03:58:00','2026-03-07','néant'),(39,'Présent','2026-03-07 08:00:00','2026-03-07 00:00:00',1,8,'2026-03-07 03:58:23','2026-03-07 03:58:23','2026-03-07','néant'),(40,'Présent','2026-03-07 08:00:00','2026-03-07 00:00:00',1,16,'2026-03-07 03:59:14','2026-03-07 03:59:14','2026-03-07','néant'),(41,'Présent','2026-03-07 08:00:00','2026-03-07 00:00:00',1,10,'2026-03-07 03:59:46','2026-03-07 03:59:46','2026-03-07','néant'),(42,'Retard','2026-03-07 10:00:00','2026-03-07 00:00:00',1,11,'2026-03-07 04:00:10','2026-03-07 04:00:10','2026-03-07','tard'),(43,'Présent','2026-03-07 08:00:00','2026-03-07 00:00:00',1,15,'2026-03-07 04:00:34','2026-03-07 04:00:34','2026-03-07','néant'),(44,'Retard','2026-03-07 10:00:00','2026-03-07 00:00:00',1,13,'2026-03-07 04:00:54','2026-03-07 04:00:54','2026-03-07','tard'),(45,'Présent','2026-03-07 08:01:00','2026-03-07 00:00:00',1,19,'2026-03-07 04:01:17','2026-03-07 04:01:17','2026-03-07','néant'),(46,'Présent','2026-03-07 08:01:00','2026-03-07 00:00:00',1,20,'2026-03-07 04:01:41','2026-03-07 04:01:41','2026-03-07','néant'),(47,'Présent','2026-03-07 08:01:00','2026-03-07 00:00:00',1,21,'2026-03-07 04:02:03','2026-03-07 04:02:03','2026-03-07','néant'),(48,'Présent','2026-03-07 08:36:00','2026-03-07 00:00:00',1,22,'2026-03-07 10:36:37','2026-03-07 10:36:37','2026-03-07','néant'),(49,'Présent','2026-03-07 08:36:00','2026-03-07 00:00:00',1,23,'2026-03-07 10:37:03','2026-03-07 10:37:03','2026-03-07','néant'),(50,'Présent','2026-03-07 08:37:00','2026-03-07 00:00:00',1,19,'2026-03-07 10:37:41','2026-03-07 10:37:41','2026-03-07','néant'),(51,'Présent','2026-03-09 08:15:00','2026-03-09 00:00:00',1,18,'2026-03-09 02:15:13','2026-03-09 02:15:13','2026-03-09','néant'),(52,'Présent','2026-03-09 08:15:00','2026-03-09 00:00:00',1,17,'2026-03-09 02:15:43','2026-03-09 02:15:43','2026-03-09','néant'),(53,'Présent','2026-03-09 08:16:00','2026-03-09 00:00:00',1,5,'2026-03-09 02:16:26','2026-03-09 02:16:26','2026-03-09','néant'),(54,'Présent','2026-03-09 08:16:00','2026-03-09 00:00:00',1,14,'2026-03-09 02:17:03','2026-03-09 02:17:03','2026-03-09','néant'),(55,'Présent','2026-03-09 08:18:00','2026-03-09 00:00:00',1,8,'2026-03-09 02:18:14','2026-03-09 02:18:14','2026-03-09','néant'),(56,'Présent','2026-03-09 08:19:00','2026-03-09 00:00:00',1,16,'2026-03-09 02:19:58','2026-03-09 02:19:58','2026-03-09','néant'),(57,'Présent','2026-03-09 17:25:00','2026-03-09 00:00:00',1,13,'2026-03-09 11:25:38','2026-03-09 11:25:38','2026-03-09','néant'),(58,'Présent','2026-03-09 18:21:00','2026-03-09 00:00:00',1,6,'2026-03-09 12:21:39','2026-03-09 12:21:39','2026-03-09','néant'),(59,'Présent','2026-03-09 18:23:00','2026-03-09 00:00:00',1,10,'2026-03-09 12:23:32','2026-03-09 12:23:32','2026-03-09','neant'),(60,'Présent','2026-03-09 18:23:00','2026-03-09 00:00:00',1,11,'2026-03-09 12:23:58','2026-03-09 12:23:58','2026-03-09','néant'),(61,'Présent','2026-03-09 18:24:00','2026-03-09 00:00:00',1,15,'2026-03-09 12:24:23','2026-03-09 12:24:23','2026-03-09','rien'),(62,'Présent','2026-03-09 18:24:00','2026-03-09 00:00:00',1,19,'2026-03-09 12:24:43','2026-03-09 12:24:43','2026-03-09','rien'),(63,'Présent','2026-03-09 18:24:00','2026-03-09 00:00:00',1,20,'2026-03-09 12:25:02','2026-03-09 12:25:02','2026-03-09','rien'),(64,'Présent','2026-03-09 18:25:00','2026-03-09 00:00:00',1,21,'2026-03-09 12:25:20','2026-03-09 12:25:20','2026-03-09','rien'),(65,'Présent','2026-03-09 18:25:00','2026-03-09 00:00:00',1,22,'2026-03-09 12:25:38','2026-03-09 12:25:38','2026-03-09','rien'),(66,'Présent','2026-03-09 18:26:00','2026-03-09 00:00:00',1,23,'2026-03-09 12:26:32','2026-03-09 12:26:32','2026-03-09','present'),(67,'Présent','2026-03-10 09:10:00','2026-03-10 00:00:00',1,18,'2026-03-10 03:10:22','2026-03-10 03:10:22','2026-03-10','néant'),(68,'Présent','2026-03-10 09:10:00','2026-03-10 00:00:00',1,17,'2026-03-10 03:10:51','2026-03-10 03:10:51','2026-03-10','néant'),(69,'Présent','2026-03-10 09:11:00','2026-03-10 00:00:00',1,5,'2026-03-10 03:11:18','2026-03-10 03:11:18','2026-03-10','néant'),(70,'Présent','2026-03-10 09:11:00','2026-03-10 00:00:00',1,6,'2026-03-10 03:12:00','2026-03-10 03:12:00','2026-03-10','néant'),(71,'Présent','2026-03-10 09:12:00','2026-03-10 00:00:00',1,14,'2026-03-10 03:12:25','2026-03-10 03:12:25','2026-03-10','néant'),(72,'Présent','2026-03-10 09:12:00','2026-03-10 00:00:00',1,8,'2026-03-10 03:12:46','2026-03-10 03:12:46','2026-03-10','néant'),(73,'Présent','2026-03-10 09:13:00','2026-03-10 00:00:00',1,16,'2026-03-10 03:13:11','2026-03-10 03:13:11','2026-03-10','néant'),(74,'Présent','2026-03-10 09:13:00','2026-03-10 00:00:00',1,10,'2026-03-10 03:13:35','2026-03-10 03:13:35','2026-03-10','néant'),(75,'Présent','2026-03-10 09:13:00','2026-03-10 00:00:00',1,11,'2026-03-10 03:14:01','2026-03-10 03:14:01','2026-03-10','néant'),(76,'Présent','2026-03-10 09:14:00','2026-03-10 00:00:00',1,15,'2026-03-10 03:14:23','2026-03-10 03:14:23','2026-03-10','néant'),(77,'Présent','2026-03-10 09:14:00','2026-03-10 00:00:00',1,13,'2026-03-10 03:14:50','2026-03-10 03:14:50','2026-03-10','néant'),(78,'Présent','2026-03-10 09:15:00','2026-03-10 00:00:00',1,19,'2026-03-10 03:15:16','2026-03-10 03:15:16','2026-03-10','néant'),(79,'Présent','2026-03-10 09:15:00','2026-03-10 00:00:00',1,20,'2026-03-10 03:15:44','2026-03-10 03:15:44','2026-03-10','néant'),(80,'Présent','2026-03-10 09:16:00','2026-03-10 00:00:00',1,21,'2026-03-10 03:16:12','2026-03-10 03:16:12','2026-03-10','néant'),(81,'Présent','2026-03-10 09:16:00','2026-03-10 00:00:00',1,22,'2026-03-10 03:16:50','2026-03-10 03:16:50','2026-03-10','néant'),(82,'Présent','2026-03-10 09:17:00','2026-03-10 00:00:00',1,23,'2026-03-10 03:17:21','2026-03-10 03:17:21','2026-03-10','néant'),(83,'Présent','2026-03-10 09:17:00','2026-03-10 00:00:00',1,24,'2026-03-10 03:17:52','2026-03-10 03:17:52','2026-03-10','néant'),(84,'Présent','2026-03-12 08:24:00','2026-03-12 00:00:00',1,18,'2026-03-12 02:24:38','2026-03-12 02:24:38','2026-03-12','néant'),(85,'Présent','2026-03-12 08:24:00','2026-03-12 00:00:00',1,17,'2026-03-12 02:25:01','2026-03-12 02:25:01','2026-03-12','néant'),(86,'Présent','2026-03-12 08:25:00','2026-03-12 00:00:00',1,5,'2026-03-12 02:25:27','2026-03-12 02:25:27','2026-03-12','néant'),(87,'Présent','2026-03-12 08:25:00','2026-03-12 00:00:00',1,6,'2026-03-12 02:25:48','2026-03-12 02:25:48','2026-03-12','néant'),(88,'Présent','2026-03-12 08:26:00','2026-03-12 00:00:00',1,14,'2026-03-12 02:26:12','2026-03-12 02:26:12','2026-03-12','néant'),(89,'Présent','2026-03-12 08:26:00','2026-03-12 00:00:00',1,8,'2026-03-12 02:26:35','2026-03-12 02:26:35','2026-03-12','néant'),(90,'Présent','2026-03-12 08:26:00','2026-03-12 00:00:00',1,16,'2026-03-12 02:26:57','2026-03-12 02:26:57','2026-03-12','néant'),(91,'Présent','2026-03-12 08:27:00','2026-03-12 00:00:00',1,10,'2026-03-12 02:27:19','2026-03-12 02:27:19','2026-03-12','néant'),(92,'Présent','2026-03-12 08:27:00','2026-03-12 00:00:00',1,11,'2026-03-12 02:27:42','2026-03-12 02:27:42','2026-03-12','néant'),(93,'Présent','2026-03-12 08:28:00','2026-03-12 00:00:00',1,15,'2026-03-12 02:28:47','2026-03-12 02:28:47','2026-03-12','néant'),(94,'Présent','2026-03-12 08:29:00','2026-03-12 00:00:00',1,13,'2026-03-12 02:29:07','2026-03-12 02:29:07','2026-03-12','néant'),(95,'Présent','2026-03-12 08:29:00','2026-03-12 00:00:00',1,19,'2026-03-12 02:29:29','2026-03-12 02:29:29','2026-03-12','néant'),(96,'Présent','2026-03-12 08:29:00','2026-03-12 00:00:00',1,20,'2026-03-12 02:29:52','2026-03-12 02:29:52','2026-03-12','néant'),(97,'Présent','2026-03-12 08:30:00','2026-03-12 00:00:00',1,21,'2026-03-12 02:30:13','2026-03-12 02:30:13','2026-03-12','néant'),(98,'Présent','2026-03-12 08:30:00','2026-03-12 00:00:00',1,22,'2026-03-12 02:30:34','2026-03-12 02:30:34','2026-03-12','néant'),(99,'Présent','2026-03-12 08:30:00','2026-03-12 00:00:00',1,23,'2026-03-12 02:31:04','2026-03-12 02:31:04','2026-03-12','néant'),(100,'Présent','2026-03-12 08:31:00','2026-03-12 00:00:00',1,24,'2026-03-12 02:31:37','2026-03-12 02:31:37','2026-03-12','néant'),(101,'Présent','2026-03-12 09:37:00','2026-03-12 00:00:00',1,25,'2026-03-12 02:37:20','2026-03-12 02:37:20','2026-03-12','néant');
/*!40000 ALTER TABLE `presence_tables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('dw4LiPD2rdBi5llDO6Ub9YNthmdgrvTcGuvjhQIR',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','YTo4OntzOjY6Il90b2tlbiI7czo0MDoiT1l1a0N6U3FhTEFmOFdkb1BKUnI0em5nYVo4NWVzTUxjcVVQZW9CRCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9pbmRleC9kYXNoYm9hcmRBcHAiO3M6NToicm91dGUiO3M6MTU6ImluZGV4LmRhc2hib2FyZCI7fXM6MTQ6InV0aWxpc2F0ZXVyX2lkIjtpOjE7czoxNzoidXRpbGlzYXRldXJfZW1haWwiO3M6MzA6InJvbWVvcmF6YWZpbmRyYWliZTc2QGdtYWlsLmNvbSI7czoxNToidXRpbGlzYXRldXJfbm9tIjtzOjEzOiJSQVpBRklORFJBSUJFIjtzOjE4OiJ1dGlsaXNhdGV1cl9wcmVub20iO3M6MTI6Ikplc3N5IFJvbcOpbyI7czoxNzoidXRpbGlzYXRldXJfcG9zdGUiO2k6MTM7fQ==',1773298769),('rawXL8ffFXnj4vmfSsphIEWMydCVfEAGL5CvvZEI',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTVRQRDAyT3ZrMDMxb3NxNjlKM1BZVHBITjRaMVVhd1VKemVsb3lZZSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1773292921);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur_tables`
--

DROP TABLE IF EXISTS `utilisateur_tables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateur_tables` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cin` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_poste` bigint unsigned NOT NULL,
  `id_departement` bigint unsigned NOT NULL,
  `date_embauche` date NOT NULL,
  `date_naissance` date NOT NULL,
  `telephone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matricule` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `utilisateur_tables_cin_unique` (`cin`),
  UNIQUE KEY `utilisateur_tables_matricule_unique` (`matricule`),
  KEY `utilisateur_tables_id_poste_foreign` (`id_poste`),
  KEY `utilisateur_tables_id_departement_foreign` (`id_departement`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur_tables`
--

LOCK TABLES `utilisateur_tables` WRITE;
/*!40000 ALTER TABLE `utilisateur_tables` DISABLE KEYS */;
INSERT INTO `utilisateur_tables` VALUES (1,'RAZAFINDRAIBE','Jessy Roméo','109456789123','Ambohimangakely','romeorazafindraibe76@gmail.com','$2y$12$geauT50Okb8yJ8EjOJ8C5O0z37xEkyAw70KopJfbhxhvUVwLTmtpq',13,2,'2026-02-11','2005-04-24','0384696755','Masculin','EMP0001','2026-02-23 10:12:18','2026-02-23 10:12:18'),(2,'RAZAFINDRAIBE','Etienne Ulrich','102091543091','Ambohimangakely','ulrich@gmail.com','$2y$12$.8GlPx/m/fS4e5OxiHHLT.mFGfFspw3o11nXeO/zJ50ijn1m/IbLa',1,1,'2026-02-20','2005-02-02','0321545678','Masculin','EMP0002','2026-02-24 15:10:05','2026-02-24 15:10:05'),(3,'RAZANABOLOLONA','Lucie','102301605456','Ambohimalaza','lucie@gmail.com','$2y$12$Lnwbxm9IkKdsXK5YEevUn.ZKJvg.fn68IYOYkUZ/soNGYqf3WOkQK',2,1,'2026-02-18','1999-01-04','0321547896','Féminin','EMP0003','2026-02-25 13:52:10','2026-02-25 13:52:10');
/*!40000 ALTER TABLE `utilisateur_tables` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-03-13 12:10:32
