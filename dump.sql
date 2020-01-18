-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: tweet
-- ------------------------------------------------------
-- Server version	5.7.25

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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (9,'2019_05_11_081459_create_twitter_table',1),(31,'2014_10_12_000000_create_users_table',2),(32,'2014_10_12_100000_create_password_resets_table',2),(33,'2019_05_11_081459_create_twitters_table',2),(34,'2019_05_16_094232_create_profiles_table',2),(39,'2019_05_16_094233_create_newprofiles_table',3),(40,'2019_05_28_081459_create_newtwitters_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `twitterId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (1,'TwitterID0602','自己紹介更新','https://ackn14twitter.s3.us-east-2.amazonaws.com/x5kT5gURLD79EKLPC3GgjFSAp6Nt8V8AL6WrcvAp.png','2019-05-28 23:36:24','2019-06-06 21:45:26',1),(2,'5cefc2d01394f','自己紹介','default.jpg','2019-05-30 11:47:28','2019-05-30 11:47:28',2),(3,'5cf4ff57c87bb','よろしくおねがいします','default.jpg','2019-06-03 11:07:03','2019-06-03 11:07:03',3),(4,'5cf500ed58ccb','よろしくおねがいします','default.jpg','2019-06-03 11:13:49','2019-06-03 11:13:49',4),(5,'5cf98ca343c24','よろしくおねがいします','storage/image/default.jpg','2019-06-06 21:58:59','2019-06-06 21:58:59',5),(6,'5cfa43a25108b','よろしくおねがいします',NULL,'2019-06-07 10:59:46','2019-06-07 10:59:46',9),(7,'5cfa43edeb440','こんにちは、よろしくおねがいします',NULL,'2019-06-07 11:01:01','2019-06-08 01:30:28',10),(8,'5cfb1327e81bb','よろしくおねがいします',NULL,'2019-06-08 01:45:11','2019-06-08 01:45:11',11);
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `twitters`
--

DROP TABLE IF EXISTS `twitters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `twitters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `twitters`
--

LOCK TABLES `twitters` WRITE;
/*!40000 ALTER TABLE `twitters` DISABLE KEYS */;
INSERT INTO `twitters` VALUES (1,'ツイートなう','YmipkBvEGtsq1AauNOL26MONBQT0oVsQy65YYL8W.png','2019-05-28 23:40:34','2019-05-28 23:40:34',1),(3,'テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト更新しました更新２回め３回目４回目',NULL,'2019-05-29 11:27:07','2019-06-01 07:42:14',1),(4,'トランザクション成功',NULL,'2019-05-30 11:58:22','2019-05-30 11:58:22',2),(5,'ツイートなう更新',NULL,'2019-06-01 23:52:28','2019-06-02 00:39:51',1),(6,'jfewi','https://ackn14twitter.s3.us-east-2.amazonaws.com/qpFM33DK051i7SaCPYFiX3g1yOR0UfcoOveaCYG9.jpeg','2019-06-06 12:00:31','2019-06-06 12:00:31',1);
/*!40000 ALTER TABLE `twitters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'test001','test01@gmail.com',NULL,'$2y$10$3S8tbCvTfhF9wbRTwOieUupoqLz7Sl69Vqi8naMxF9Q1ICXII5hSe',NULL,'2019-05-28 23:36:24','2019-06-01 21:56:49'),(2,'test000002','test02@gmail.com',NULL,'$2y$10$8g25LwgtzgMhF1ttG.pW5Oq3hd3WTnq8cYovUPPL.5xz3R0MKvouW',NULL,'2019-05-30 11:47:28','2019-05-30 11:57:45'),(3,'test03','tweet03@gmail.com',NULL,'$2y$10$mSpvHru1u//yCs0ZEBVQZO6UuLV9nvjj2XoY1l9gxSnSkk7oB3oou',NULL,'2019-06-03 11:07:03','2019-06-03 11:07:03'),(4,'test04','tweet04@gmail.com',NULL,'$2y$10$zGzY9Snkn.4cwOfKj0CpTu8cw4uvUeEkO40wJi7egfURwIkQ8ha1G',NULL,'2019-06-03 11:13:49','2019-06-03 11:13:49'),(5,'test05','test05@gmail.com',NULL,'$2y$10$lcdiQ4sr.CsVCZTc0ocdg.EEKaGKKBUe/W6c7DBd4kF2jNTckncxm',NULL,'2019-06-06 21:58:59','2019-06-06 21:58:59'),(6,'test06','test06@gmail.com',NULL,'$2y$10$JxH90eX0zJs59uS0ad3sgOJ7zIoXdBTWqw1lBCVY.8ja6k9MV7nF2',NULL,'2019-06-07 10:13:43','2019-06-07 10:13:43'),(7,'test07','test07@gmail.com',NULL,'$2y$10$RxYTKKvF/4dI09rAKhqlxuVlTPpDjRBwnzkXCBlmmcsnJxdmsz3Em',NULL,'2019-06-07 10:15:09','2019-06-07 10:15:09'),(8,'test07','tweet07@gmail.com',NULL,'$2y$10$mVtci4b.kguJEBqzYE2PwedLckEFDuQQe8w3AkS7E8NBVHG8RRwmi',NULL,'2019-06-07 10:33:41','2019-06-07 10:33:41'),(9,'test08','tweet08@gmail.com',NULL,'$2y$10$hMHWfI7MROavoMf.6I3uqeZC5I4VNwdJFm2HOyhcVr6YgUnN1.PI.',NULL,'2019-06-07 10:59:46','2019-06-07 10:59:46'),(10,'test09','tweet09@gmail.com',NULL,'$2y$10$eY..hFrlIF7Ys5KUOM3GXeZcC7dK5zz.3gyRW/bfJ8D//sVlEIUxC',NULL,'2019-06-07 11:01:01','2019-06-07 11:01:01'),(11,'test10','tweet10@gmail.com',NULL,'$2y$10$XpByomcV3qc.YHIIi9rn0e7SYy.r5KUIGVt5Q249qHxTqh8l3s1Sq',NULL,'2019-06-08 01:45:11','2019-06-08 01:45:11'),(12,'テスト太郎','test@taro.com',NULL,'$2y$04$0RCJpnrk0hJiIzaVBKRGb.fsPFjuGuVbzAaY9GwEW5BdawfRm1.S6',NULL,'2019-06-09 03:28:23','2019-06-09 03:28:23');
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

-- Dump completed on 2020-01-18 14:24:43
