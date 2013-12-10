-- MySQL dump 10.13  Distrib 5.5.31, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: baseProject
-- ------------------------------------------------------
-- Server version	5.5.31-0+wheezy1

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
-- Table structure for table `common_persons`
--

DROP TABLE IF EXISTS `common_persons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `common_persons` (
  `id_person` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `second_last_name` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  PRIMARY KEY (`id_person`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `common_persons`
--

LOCK TABLES `common_persons` WRITE;
/*!40000 ALTER TABLE `common_persons` DISABLE KEYS */;
INSERT INTO `common_persons` VALUES (1,'test','test','test','2013-12-04'),(2,'Administrador',NULL,NULL,NULL);
/*!40000 ALTER TABLE `common_persons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `common_user_logs`
--

DROP TABLE IF EXISTS `common_user_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `common_user_logs` (
  `id_user_log` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `id_log` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_user_log`),
  KEY `fk_common_user_logs_1` (`id_log`),
  KEY `fk_common_user_logs_2` (`id_user`),
  CONSTRAINT `fk_common_user_logs_1` FOREIGN KEY (`id_log`) REFERENCES `core_logs` (`id_log`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_common_user_logs_2` FOREIGN KEY (`id_user`) REFERENCES `common_users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `common_user_logs`
--

LOCK TABLES `common_user_logs` WRITE;
/*!40000 ALTER TABLE `common_user_logs` DISABLE KEYS */;
INSERT INTO `common_user_logs` VALUES (1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,2,5);
/*!40000 ALTER TABLE `common_user_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `common_users`
--

DROP TABLE IF EXISTS `common_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `common_users` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `id_person` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `password` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `fk_common_users_1` (`id_person`),
  CONSTRAINT `fk_common_users_1` FOREIGN KEY (`id_person`) REFERENCES `common_persons` (`id_person`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `common_users`
--

LOCK TABLES `common_users` WRITE;
/*!40000 ALTER TABLE `common_users` DISABLE KEYS */;
INSERT INTO `common_users` VALUES (1,1,1,'test','test'),(2,1,2,NULL,NULL);
/*!40000 ALTER TABLE `common_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_actions`
--

DROP TABLE IF EXISTS `core_actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_actions` (
  `id_action` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_controller` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_action`),
  KEY `fk_core_actions_core_controllers1` (`id_controller`),
  CONSTRAINT `fk_core_actions_core_controllers1` FOREIGN KEY (`id_controller`) REFERENCES `core_controllers` (`id_controller`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_actions`
--

LOCK TABLES `core_actions` WRITE;
/*!40000 ALTER TABLE `core_actions` DISABLE KEYS */;
INSERT INTO `core_actions` VALUES (25,53,'indexAction'),(26,53,'messageAction'),(27,53,'aloAction'),(28,53,'notFoundAction'),(29,53,'getMethodFromAction'),(30,54,'indexAction'),(31,54,'createAction'),(32,54,'saveAction'),(33,54,'updateAction'),(34,54,'enableAction'),(35,54,'disableAction'),(36,54,'historyAction'),(37,54,'searchAction'),(38,54,'notFoundAction'),(39,54,'getMethodFromAction'),(40,55,'indexAction'),(41,55,'notFoundAction'),(42,55,'getMethodFromAction'),(43,56,'inspectAction'),(44,56,'filterAction'),(45,56,'configAction'),(46,56,'notFoundAction'),(47,56,'indexAction'),(48,56,'getMethodFromAction');
/*!40000 ALTER TABLE `core_actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_controllers`
--

DROP TABLE IF EXISTS `core_controllers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_controllers` (
  `id_controller` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_module` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_controller`),
  KEY `fk_core_controllers_core_modules` (`id_module`),
  CONSTRAINT `fk_core_controllers_core_modules` FOREIGN KEY (`id_module`) REFERENCES `core_modules` (`id_module`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_controllers`
--

LOCK TABLES `core_controllers` WRITE;
/*!40000 ALTER TABLE `core_controllers` DISABLE KEYS */;
INSERT INTO `core_controllers` VALUES (53,1,'Core\\Controller\\IndexController'),(54,1,'Core\\Controller\\UserController'),(55,1,'Core\\Controller\\MenuController'),(56,1,'Core\\Controller\\CoreController');
/*!40000 ALTER TABLE `core_controllers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_logs`
--

DROP TABLE IF EXISTS `core_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_logs` (
  `id_log` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `event` tinyint(4) DEFAULT NULL,
  `note` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_log`),
  KEY `fk_core_logs_1` (`id_user`),
  CONSTRAINT `fk_core_logs_1` FOREIGN KEY (`id_user`) REFERENCES `common_users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_logs`
--

LOCK TABLES `core_logs` WRITE;
/*!40000 ALTER TABLE `core_logs` DISABLE KEYS */;
INSERT INTO `core_logs` VALUES (1,1,'2013-12-04 19:38:30',3,''),(2,1,'2013-12-04 19:38:36',4,''),(3,1,'2013-12-04 19:38:38',2,''),(4,1,'2013-12-04 19:38:39',1,''),(5,2,'2013-12-05 01:00:48',3,'');
/*!40000 ALTER TABLE `core_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_menu_item_logs`
--

DROP TABLE IF EXISTS `core_menu_item_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_menu_item_logs` (
  `id_menu_item_log` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_menu_item` int(10) unsigned NOT NULL,
  `id_log` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_menu_item_log`),
  KEY `fk_common_user_logs_1` (`id_log`),
  KEY `fk_common_user_logs_2` (`id_menu_item`),
  CONSTRAINT `fk_common_user_logs_10` FOREIGN KEY (`id_log`) REFERENCES `core_logs` (`id_log`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_common_user_logs_20` FOREIGN KEY (`id_menu_item`) REFERENCES `core_menu_items` (`id_menu_item`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_menu_item_logs`
--

LOCK TABLES `core_menu_item_logs` WRITE;
/*!40000 ALTER TABLE `core_menu_item_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_menu_item_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_menu_items`
--

DROP TABLE IF EXISTS `core_menu_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_menu_items` (
  `id_menu_item` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_action` int(10) unsigned DEFAULT NULL,
  `id_parent` int(10) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `order` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_menu_item`),
  KEY `fk_core_menu_items_1` (`id_action`),
  KEY `fk_core_menu_items_2` (`id_parent`),
  CONSTRAINT `fk_core_menu_items_1` FOREIGN KEY (`id_action`) REFERENCES `core_actions` (`id_action`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_core_menu_items_2` FOREIGN KEY (`id_parent`) REFERENCES `core_menu_items` (`id_menu_item`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_menu_items`
--

LOCK TABLES `core_menu_items` WRITE;
/*!40000 ALTER TABLE `core_menu_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_menu_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_modules`
--

DROP TABLE IF EXISTS `core_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_modules` (
  `id_module` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_module`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_modules`
--

LOCK TABLES `core_modules` WRITE;
/*!40000 ALTER TABLE `core_modules` DISABLE KEYS */;
INSERT INTO `core_modules` VALUES (1,'Core'),(2,'Query'),(3,'Model'),(4,'SmartyModule');
/*!40000 ALTER TABLE `core_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_role_logs`
--

DROP TABLE IF EXISTS `core_role_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_role_logs` (
  `id_role_log` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_role` int(10) unsigned NOT NULL,
  `id_log` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_role_log`),
  KEY `fk_common_user_logs_1` (`id_log`),
  KEY `fk_core_role_logs_1` (`id_role`),
  CONSTRAINT `fk_common_user_logs_100` FOREIGN KEY (`id_log`) REFERENCES `core_logs` (`id_log`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_core_role_logs_1` FOREIGN KEY (`id_role`) REFERENCES `core_roles` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_role_logs`
--

LOCK TABLES `core_role_logs` WRITE;
/*!40000 ALTER TABLE `core_role_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_role_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_roles`
--

DROP TABLE IF EXISTS `core_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_roles` (
  `id_role` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_roles`
--

LOCK TABLES `core_roles` WRITE;
/*!40000 ALTER TABLE `core_roles` DISABLE KEYS */;
INSERT INTO `core_roles` VALUES (3,'Administrador',1);
/*!40000 ALTER TABLE `core_roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-12-05 19:49:45
