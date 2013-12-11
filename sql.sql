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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `common_persons`
--

LOCK TABLES `common_persons` WRITE;
/*!40000 ALTER TABLE `common_persons` DISABLE KEYS */;
INSERT INTO `common_persons` VALUES (1,'test','test','test','2013-12-06'),(2,'Administrador',NULL,NULL,NULL),(3,'kjh','kjh','zxf','2013-12-06'),(5,'asd','asd','asd','2013-12-09');
/*!40000 ALTER TABLE `common_persons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `common_persons_phone_numbers`
--

DROP TABLE IF EXISTS `common_persons_phone_numbers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `common_persons_phone_numbers` (
  `id_person` int(10) unsigned NOT NULL,
  `id_phone_number` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_person`,`id_phone_number`),
  KEY `fk_common_persons_phone_numbers_1` (`id_person`),
  KEY `fk_common_persons_phone_numbers_2` (`id_phone_number`),
  CONSTRAINT `fk_common_persons_phone_numbers_1` FOREIGN KEY (`id_person`) REFERENCES `common_persons` (`id_person`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_common_persons_phone_numbers_2` FOREIGN KEY (`id_phone_number`) REFERENCES `common_phone_numbers` (`id_phone_number`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `common_persons_phone_numbers`
--

LOCK TABLES `common_persons_phone_numbers` WRITE;
/*!40000 ALTER TABLE `common_persons_phone_numbers` DISABLE KEYS */;
/*!40000 ALTER TABLE `common_persons_phone_numbers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `common_phone_numbers`
--

DROP TABLE IF EXISTS `common_phone_numbers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `common_phone_numbers` (
  `id_phone_number` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `area` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `extension` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `number` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_phone_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `common_phone_numbers`
--

LOCK TABLES `common_phone_numbers` WRITE;
/*!40000 ALTER TABLE `common_phone_numbers` DISABLE KEYS */;
/*!40000 ALTER TABLE `common_phone_numbers` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `common_user_logs`
--

LOCK TABLES `common_user_logs` WRITE;
/*!40000 ALTER TABLE `common_user_logs` DISABLE KEYS */;
INSERT INTO `common_user_logs` VALUES (1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,2,5),(6,1,6),(7,1,7),(8,1,8),(9,1,9),(10,3,10),(11,3,11),(12,3,12),(13,3,13),(14,1,14),(15,5,17);
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
  `id_role` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `password` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `fk_common_users_1` (`id_person`),
  KEY `fk_common_users_2` (`id_role`),
  CONSTRAINT `fk_common_users_1` FOREIGN KEY (`id_person`) REFERENCES `common_persons` (`id_person`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_common_users_2` FOREIGN KEY (`id_role`) REFERENCES `core_roles` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `common_users`
--

LOCK TABLES `common_users` WRITE;
/*!40000 ALTER TABLE `common_users` DISABLE KEYS */;
INSERT INTO `common_users` VALUES (1,1,1,3,'musicogui','f2ff02f6b1ca4cf320236d186b0c74dc'),(2,1,2,3,NULL,NULL),(3,1,3,3,'kjbk','kjh'),(5,1,5,3,'asd','7815696ecbf1c96e6894b779456d330e');
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
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_actions`
--

LOCK TABLES `core_actions` WRITE;
/*!40000 ALTER TABLE `core_actions` DISABLE KEYS */;
INSERT INTO `core_actions` VALUES (25,53,'indexAction'),(26,53,'messageAction'),(27,53,'aloAction'),(28,53,'notFoundAction'),(29,53,'getMethodFromAction'),(30,54,'indexAction'),(31,54,'createAction'),(32,54,'saveAction'),(33,54,'updateAction'),(34,54,'enableAction'),(35,54,'disableAction'),(36,54,'historyAction'),(37,54,'searchAction'),(38,54,'notFoundAction'),(39,54,'getMethodFromAction'),(40,55,'indexAction'),(41,55,'notFoundAction'),(42,55,'getMethodFromAction'),(43,56,'inspectAction'),(44,56,'filterAction'),(45,56,'configAction'),(46,56,'notFoundAction'),(47,56,'indexAction'),(48,56,'getMethodFromAction'),(49,59,'indexAction'),(50,59,'createAction'),(51,59,'updateAction'),(52,59,'saveAction'),(53,59,'enableAction'),(54,59,'disableAction'),(55,59,'historyAction'),(56,59,'notFoundAction'),(57,59,'getMethodFromAction'),(58,60,'loginAction'),(59,60,'authAction'),(60,60,'notFoundAction'),(61,60,'indexAction'),(62,60,'getMethodFromAction'),(63,61,'indexAction'),(64,61,'createAction'),(65,61,'updateAction'),(66,61,'saveAction'),(67,61,'enableAction'),(68,61,'disableAction'),(69,61,'historyAction'),(70,61,'notFoundAction'),(71,61,'getMethodFromAction'),(72,56,'setPrivilegeAction'),(73,56,'flushPrivilegesAction'),(74,64,'index-action'),(75,64,'message-action'),(76,64,'alo-action'),(77,64,'not-found-action'),(78,64,'get-method-from-action'),(79,65,'index-action'),(80,65,'create-action'),(81,65,'save-action'),(82,65,'update-action'),(83,65,'enable-action'),(84,65,'disable-action'),(85,65,'history-action'),(86,65,'search-action'),(87,65,'not-found-action'),(88,65,'get-method-from-action'),(89,66,'inspect-action'),(90,66,'filter-action'),(91,66,'config-action'),(92,66,'set-privilege-action'),(93,66,'flush-privileges-action'),(94,66,'not-found-action'),(95,66,'index-action'),(96,66,'get-method-from-action'),(97,67,'index-action'),(98,67,'create-action'),(99,67,'update-action'),(100,67,'save-action'),(101,67,'enable-action'),(102,67,'disable-action'),(103,67,'history-action'),(104,67,'not-found-action'),(105,67,'get-method-from-action'),(106,68,'login-action'),(107,68,'auth-action'),(108,68,'not-found-action'),(109,68,'index-action'),(110,68,'get-method-from-action'),(111,69,'index-action'),(112,69,'create-action'),(113,69,'update-action'),(114,69,'save-action'),(115,69,'enable-action'),(116,69,'disable-action'),(117,69,'history-action'),(118,69,'not-found-action'),(119,69,'get-method-from-action'),(120,1,'index-action'),(121,1,'message-action'),(122,1,'alo-action'),(123,1,'not-found-action'),(124,1,'get-method-from-action'),(125,2,'index-action'),(126,2,'create-action'),(127,2,'save-action'),(128,2,'update-action'),(129,2,'enable-action'),(130,2,'disable-action'),(131,2,'history-action'),(132,2,'search-action'),(133,2,'not-found-action'),(134,2,'get-method-from-action'),(135,3,'inspect-action'),(136,3,'filter-action'),(137,3,'config-action'),(138,3,'set-privilege-action'),(139,3,'flush-privileges-action'),(140,3,'not-found-action'),(141,3,'index-action'),(142,3,'get-method-from-action'),(143,4,'index-action'),(144,4,'create-action'),(145,4,'update-action'),(146,4,'save-action'),(147,4,'enable-action'),(148,4,'disable-action'),(149,4,'history-action'),(150,4,'not-found-action'),(151,4,'get-method-from-action'),(152,5,'login-action'),(153,5,'auth-action'),(154,5,'not-found-action'),(155,5,'index-action'),(156,5,'get-method-from-action'),(157,6,'index-action'),(158,6,'create-action'),(159,6,'update-action'),(160,6,'save-action'),(161,6,'enable-action'),(162,6,'disable-action'),(163,6,'history-action'),(164,6,'not-found-action'),(165,6,'get-method-from-action');
/*!40000 ALTER TABLE `core_actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_actions_roles`
--

DROP TABLE IF EXISTS `core_actions_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_actions_roles` (
  `id_action` int(10) unsigned NOT NULL,
  `id_role` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_action`,`id_role`),
  KEY `fk_core_actions_roles_1` (`id_role`),
  KEY `fk_core_actions_roles_2` (`id_action`),
  CONSTRAINT `fk_core_actions_roles_1` FOREIGN KEY (`id_role`) REFERENCES `core_roles` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_core_actions_roles_2` FOREIGN KEY (`id_action`) REFERENCES `core_actions` (`id_action`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_actions_roles`
--

LOCK TABLES `core_actions_roles` WRITE;
/*!40000 ALTER TABLE `core_actions_roles` DISABLE KEYS */;
INSERT INTO `core_actions_roles` VALUES (25,3),(26,3),(27,3),(28,3),(29,3),(30,3),(31,3),(32,3),(33,3),(34,3),(35,3),(36,3),(37,3),(38,3),(39,3),(40,3),(41,3),(42,3),(43,3),(44,3),(45,3),(46,3),(47,3),(48,3),(49,3),(50,3),(51,3),(52,3),(55,3),(56,3),(57,3),(58,3),(59,3),(60,3),(61,3),(62,3),(63,3),(64,3),(65,3),(66,3),(67,3),(68,3),(69,3),(70,3),(71,3),(72,3),(73,3),(120,3),(121,3),(122,3),(123,3),(124,3),(126,3),(127,3),(128,3),(129,3),(130,3),(131,3),(132,3),(133,3),(134,3),(135,3),(136,3),(137,3),(138,3),(139,3),(140,3),(141,3),(142,3),(143,3),(144,3),(145,3),(146,3),(147,3),(148,3),(149,3),(150,3),(151,3),(152,3),(153,3),(154,3),(155,3),(156,3),(157,3),(158,3),(159,3),(160,3),(161,3),(162,3),(163,3),(164,3),(165,3);
/*!40000 ALTER TABLE `core_actions_roles` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_controllers`
--

LOCK TABLES `core_controllers` WRITE;
/*!40000 ALTER TABLE `core_controllers` DISABLE KEYS */;
INSERT INTO `core_controllers` VALUES (1,1,'core\\controller\\index-controller'),(2,1,'core\\controller\\user-controller'),(3,1,'core\\controller\\core-controller'),(4,1,'core\\controller\\role-controller'),(5,1,'core\\controller\\auth-controller'),(6,1,'core\\controller\\menu-item-controller');
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_logs`
--

LOCK TABLES `core_logs` WRITE;
/*!40000 ALTER TABLE `core_logs` DISABLE KEYS */;
INSERT INTO `core_logs` VALUES (1,1,'2013-12-04 19:38:30',3,''),(2,1,'2013-12-04 19:38:36',4,''),(3,1,'2013-12-04 19:38:38',2,''),(4,1,'2013-12-04 19:38:39',1,''),(5,2,'2013-12-05 01:00:48',3,''),(6,1,'2013-12-06 14:46:22',4,''),(7,1,'2013-12-06 14:46:24',2,''),(8,1,'2013-12-06 14:46:25',1,''),(9,1,'2013-12-06 14:46:51',4,''),(10,3,'2013-12-06 14:47:14',3,''),(11,3,'2013-12-06 14:47:30',4,''),(12,3,'2013-12-06 14:47:31',2,''),(13,3,'2013-12-06 14:47:32',1,''),(14,1,'2013-12-09 17:05:18',4,''),(15,1,'2013-12-09 17:15:51',2,''),(16,1,'2013-12-09 17:15:53',1,''),(17,5,'2013-12-09 17:27:03',3,''),(18,1,'2013-12-09 18:10:54',3,''),(19,1,'2013-12-09 18:17:27',4,''),(20,1,'2013-12-09 18:17:34',4,''),(21,1,'2013-12-09 18:17:53',3,''),(22,1,'2013-12-09 18:48:33',3,''),(23,1,'2013-12-09 18:50:15',3,''),(24,1,'2013-12-09 19:05:34',3,''),(25,1,'2013-12-09 19:05:49',2,''),(26,1,'2013-12-09 19:08:15',3,''),(27,1,'2013-12-09 19:11:37',4,''),(28,1,'2013-12-09 19:14:46',4,''),(29,1,'2013-12-09 19:15:35',3,''),(30,1,'2013-12-09 19:15:57',3,''),(31,1,'2013-12-09 19:16:02',3,''),(32,1,'2013-12-09 20:22:10',3,''),(33,1,'2013-12-10 21:38:58',3,''),(34,1,'2013-12-11 00:15:35',3,''),(35,1,'2013-12-11 00:16:06',3,'');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_menu_item_logs`
--

LOCK TABLES `core_menu_item_logs` WRITE;
/*!40000 ALTER TABLE `core_menu_item_logs` DISABLE KEYS */;
INSERT INTO `core_menu_item_logs` VALUES (1,1,34),(2,2,35);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_menu_items`
--

LOCK TABLES `core_menu_items` WRITE;
/*!40000 ALTER TABLE `core_menu_items` DISABLE KEYS */;
INSERT INTO `core_menu_items` VALUES (1,NULL,NULL,'Administración',0,1),(2,137,1,'Privilegios',0,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_role_logs`
--

LOCK TABLES `core_role_logs` WRITE;
/*!40000 ALTER TABLE `core_role_logs` DISABLE KEYS */;
INSERT INTO `core_role_logs` VALUES (1,3,15),(2,3,16),(3,4,31),(4,5,32);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_roles`
--

LOCK TABLES `core_roles` WRITE;
/*!40000 ALTER TABLE `core_roles` DISABLE KEYS */;
INSERT INTO `core_roles` VALUES (3,'Administrador',1),(4,'test',1),(5,'demo',1);
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

-- Dump completed on 2013-12-10 19:02:15
