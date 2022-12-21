-- MySQL dump 10.19  Distrib 10.3.37-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: coding_collective
-- ------------------------------------------------------
-- Server version	10.3.37-MariaDB-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `education`
--

DROP TABLE IF EXISTS `education`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `education` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `education_name` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `education_user_id_foreign` (`user_id`),
  CONSTRAINT `education_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `education`
--

LOCK TABLES `education` WRITE;
/*!40000 ALTER TABLE `education` DISABLE KEYS */;
INSERT INTO `education` VALUES (1,'SMKN 1 Boyolangu',1,'2022-12-20 13:01:28','2022-12-20 13:01:28',NULL),(2,'SMKN 2 Tulungagung',2,'2022-12-20 13:01:45','2022-12-20 13:12:08',NULL);
/*!40000 ALTER TABLE `education` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `experiences`
--

DROP TABLE IF EXISTS `experiences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `experiences` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `experience_name` varchar(255) NOT NULL,
  `experience_position` varchar(255) NOT NULL,
  `experience_company` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `experiences_user_id_foreign` (`user_id`),
  CONSTRAINT `experiences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experiences`
--

LOCK TABLES `experiences` WRITE;
/*!40000 ALTER TABLE `experiences` DISABLE KEYS */;
INSERT INTO `experiences` VALUES (1,'Software Engineering','Backend Developer - Node.Js','PT. Sekurindo Bintang Solusi',1,'2022-12-20 20:53:57','2022-12-20 21:10:49',NULL);
/*!40000 ALTER TABLE `experiences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (57,'2019_12_14_000001_create_personal_access_tokens_table',1),(58,'2022_12_19_134244_create_roles_table',1),(59,'2022_12_20_154547_create_users_table',1),(63,'2022_12_20_185817_create_education_table',2),(65,'2022_12_21_030523_create_experiences_table',3),(66,'2022_12_21_041636_create_skills_table',4),(68,'2022_12_21_161146_add_column_user_applied_position_to_users_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` VALUES (11,'App\\Models\\User',6,'MyApp','062dd954a3144329024060915dd67f81d5f5334c1faafbd2a2af6d0610b5c8fd','[\"*\"]',NULL,NULL,'2022-12-21 09:50:28','2022-12-21 09:50:28'),(12,'App\\Models\\User',4,'MyApp','ba12b9802df976ebaf06e9b0e0c47032f936dd01ddbd5adc9b858477bc5da5a9','[\"*\"]','2022-12-21 09:59:26',NULL,'2022-12-21 09:55:20','2022-12-21 09:59:26'),(13,'App\\Models\\User',9,'MyApp','95ce306e21e92b2df32047ee67926fb617378003854c37f3c81a2363e50995fb','[\"*\"]',NULL,NULL,'2022-12-21 10:02:10','2022-12-21 10:02:10'),(14,'App\\Models\\User',4,'MyApp','28cd0241cdabcf253c7a0e0b5b7137efccc2ca9ce9321151b0969ac277f5ec3d','[\"*\"]','2022-12-21 10:23:06',NULL,'2022-12-21 10:05:03','2022-12-21 10:23:06'),(15,'App\\Models\\User',4,'MyApp','56a00fe79b70a371909001ba5d4c8bba4b6ab257a50332a9487dd44ec3b62202','[\"*\"]','2022-12-21 10:44:04',NULL,'2022-12-21 10:28:15','2022-12-21 10:44:04');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','2022-12-20 12:31:21','2022-12-20 12:31:21',NULL),(2,'senior hrd','2022-12-20 12:31:27','2022-12-20 12:31:27',NULL),(3,'hrd','2022-12-20 12:31:30','2022-12-21 07:42:45',NULL),(5,'user','2022-12-21 08:05:29','2022-12-21 09:29:08',NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skills` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `skill_name` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `skills_user_id_foreign` (`user_id`),
  CONSTRAINT `skills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skills`
--

LOCK TABLES `skills` WRITE;
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
INSERT INTO `skills` VALUES (1,'Node.js',1,'2022-12-20 21:30:44','2022-12-20 21:30:44',NULL),(2,'Express.js',1,'2022-12-20 21:30:52','2022-12-20 21:30:52',NULL),(3,'React.js',1,'2022-12-20 21:30:56','2022-12-20 21:30:56',NULL),(5,'Next.js',4,'2022-12-21 08:30:21','2022-12-21 08:30:21',NULL);
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_birthday` date NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_last_position` varchar(255) NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_applied_position` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Wahyu Ramadan','wramadan1203@gmail.com','rama2000','2000-03-12','081933195630','backend developer',2,'2022-12-20 12:32:30','2022-12-20 12:32:30',NULL,''),(2,'Wahyu Candra Krisna','candra@gmail.com','candra2000','1994-08-12','082933195630','frontend developer',2,'2022-12-20 12:33:15','2022-12-20 12:33:15',NULL,''),(4,'Wahyu Ramadan','wrama@gmail.com','$2y$10$LNiF8fgmUl/a7CeGwVEh8OGw/AvACVmVeXt6y1Vf/3TdHT90.X3MK','2000-01-01','081000000','default',3,'2022-12-21 05:18:15','2022-12-21 05:18:15',NULL,''),(5,'Wahyu Candra','candraa@gmail.com','candra2000','1994-08-12','082933195630','frontend developer',2,'2022-12-21 09:28:21','2022-12-21 09:28:21',NULL,'React.js Developer'),(7,'Wahyu Candra','candraaas@gmail.com','candra2000','1994-08-12','082933195630','frontend developer',2,'2022-12-21 09:55:42','2022-12-21 09:55:42',NULL,'React.js Developer'),(8,'Wahyu Alh','as@gmail.com','rama2000','2002-03-12','089933195611','frontend developer',2,'2022-12-21 09:57:32','2022-12-21 10:22:58',NULL,'OPOPOOPOOPO'),(9,'Wahyu Ramadan','wramasssss@gmail.com','$2y$10$tUrbDve4jn2qb7GpcpQJ1uetaCbZ7UJyUPCqNWU8jhwaU4y8gpAHW','2000-01-01','081000000','default',1,'2022-12-21 10:02:10','2022-12-21 10:02:10',NULL,''),(10,'Wahyu Candra','candrs@gmail.com','candra2000','1994-08-12','082933195630','frontend developer',2,'2022-12-21 10:10:56','2022-12-21 10:10:56',NULL,'React.js Developer'),(11,'Wahyu Candra','can@gmail.com','candra2000','1994-08-12','082933195630','frontend developer',2,'2022-12-21 10:21:48','2022-12-21 10:21:48',NULL,'React.js Developer');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-22  1:31:07
