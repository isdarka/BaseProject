-- MySQL dump 10.13  Distrib 5.5.31, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: s2CreditTools
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
-- Table structure for table `common_address`
--

DROP TABLE IF EXISTS `common_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `common_address` (
  `id_address` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `street` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `house_number` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `apartment_number` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `zipcode` varchar(5) COLLATE latin1_spanish_ci DEFAULT NULL,
  `neighborhood` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'Colonia',
  `settlement` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'Poblacion\n',
  `city` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `state` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_address`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `common_address`
--

LOCK TABLES `common_address` WRITE;
/*!40000 ALTER TABLE `common_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `common_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `common_emails`
--

DROP TABLE IF EXISTS `common_emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `common_emails` (
  `id_email` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `common_emails`
--

LOCK TABLES `common_emails` WRITE;
/*!40000 ALTER TABLE `common_emails` DISABLE KEYS */;
/*!40000 ALTER TABLE `common_emails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `common_messages`
--

DROP TABLE IF EXISTS `common_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `common_messages` (
  `id_message` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `subject` varchar(255) NOT NULL,
  `message` text,
  PRIMARY KEY (`id_message`),
  KEY `fk_common_messages_1` (`id_user`),
  CONSTRAINT `fk_common_messages_1` FOREIGN KEY (`id_user`) REFERENCES `common_users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `common_messages`
--

LOCK TABLES `common_messages` WRITE;
/*!40000 ALTER TABLE `common_messages` DISABLE KEYS */;
INSERT INTO `common_messages` VALUES (1,1,1,'2014-01-29 21:04:35','test','test'),(2,1,1,'2014-01-30 18:42:53','test de correo','asdfasdf'),(3,1,1,'2014-01-30 18:43:03','test de correo 2','asdfasdf'),(4,1,2,'2014-01-30 18:43:07','test de correo 3','asdfasdf ');
/*!40000 ALTER TABLE `common_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `common_messages_logs`
--

DROP TABLE IF EXISTS `common_messages_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `common_messages_logs` (
  `id_message_log` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_message` int(10) unsigned NOT NULL,
  `id_log` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_message_log`),
  KEY `fk_common_messages_logs_1` (`id_message`),
  KEY `fk_common_messages_logs_2` (`id_log`),
  CONSTRAINT `fk_common_messages_logs_1` FOREIGN KEY (`id_message`) REFERENCES `common_messages` (`id_message`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_common_messages_logs_2` FOREIGN KEY (`id_log`) REFERENCES `core_logs` (`id_log`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `common_messages_logs`
--

LOCK TABLES `common_messages_logs` WRITE;
/*!40000 ALTER TABLE `common_messages_logs` DISABLE KEYS */;
INSERT INTO `common_messages_logs` VALUES (1,4,51),(2,4,52),(3,4,53),(4,1,54),(5,1,55);
/*!40000 ALTER TABLE `common_messages_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `common_mexico_zip_codes`
--

DROP TABLE IF EXISTS `common_mexico_zip_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `common_mexico_zip_codes` (
  `id_mexico_zip_code` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `d_codigo` int(5) unsigned zerofill NOT NULL COMMENT 'Código Postal asentamiento',
  `d_asenta` varchar(255) DEFAULT NULL COMMENT 'Nombre asentamiento',
  `d_tipo_asenta` varchar(255) DEFAULT NULL COMMENT 'Tipo de asentamiento (Catálogo SEPOMEX)',
  `D_mnpio` varchar(255) DEFAULT NULL COMMENT 'Nombre Municipio (INEGI, Marzo 2013)',
  `d_estado` varchar(255) DEFAULT NULL COMMENT 'Nombre Entidad (INEGI, Marzo 2013)',
  `d_ciudad` varchar(255) DEFAULT NULL COMMENT 'Nombre Ciudad (Catálogo SEPOMEX)',
  `d_CP` int(11) DEFAULT NULL COMMENT 'CÃ³digo Postal de la Administración Postal que reparte al asentamiento',
  `c_estado` int(11) DEFAULT NULL COMMENT 'Clave Entidad (INEGI, Marzo 2013)',
  `c_oficina` int(11) DEFAULT NULL COMMENT 'CÃ³digo Postal de la Administración Postal que reparte al asentamiento',
  `c_CP` varchar(255) DEFAULT NULL COMMENT 'Campo Vacio',
  `c_tipo_asenta` int(11) DEFAULT NULL COMMENT 'Clave Tipo de asentamiento (Catálogo SEPOMEX)',
  `c_mnpio` int(11) DEFAULT NULL COMMENT 'Clave Municipio (INEGI, Marzo 2013)',
  `id_asenta_cpcons` int(11) DEFAULT NULL COMMENT 'Identificador Único del asentamiento (nivel municipal)\n',
  `d_zona` varchar(255) DEFAULT NULL COMMENT 'Zona en la que se ubica el asentamiento (Urbano/Rural)',
  `c_cve_ciudad` int(11) DEFAULT NULL COMMENT 'Clave Ciudad (Catálogo SEPOMEX)',
  PRIMARY KEY (`id_mexico_zip_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Actualizado a 31 Octubre 2013\nIsdarkA';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `common_mexico_zip_codes`
--

LOCK TABLES `common_mexico_zip_codes` WRITE;
/*!40000 ALTER TABLE `common_mexico_zip_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `common_mexico_zip_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `common_persons`
--

DROP TABLE IF EXISTS `common_persons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `common_persons` (
  `id_person` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_address` int(10) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `second_last_name` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `curp` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `tax_reference` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'RFC',
  `registry_core` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'Homoclave',
  `gender` tinyint(4) NOT NULL DEFAULT '1',
  `marital_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_person`),
  KEY `fk_common_persons_1` (`id_address`),
  CONSTRAINT `fk_common_persons_1` FOREIGN KEY (`id_address`) REFERENCES `common_address` (`id_address`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `common_persons`
--

LOCK TABLES `common_persons` WRITE;
/*!40000 ALTER TABLE `common_persons` DISABLE KEYS */;
INSERT INTO `common_persons` VALUES (1,NULL,'Israel','IsdarkA','IsdarkA','2000-01-01',NULL,NULL,NULL,1,1),(2,NULL,'demo','demo','demo','2014-01-29',NULL,NULL,NULL,1,1),(3,NULL,'test','test','test','2014-01-29',NULL,NULL,NULL,1,1);
/*!40000 ALTER TABLE `common_persons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `common_persons_emails`
--

DROP TABLE IF EXISTS `common_persons_emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `common_persons_emails` (
  `id_person` int(10) unsigned NOT NULL,
  `id_email` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_person`,`id_email`),
  KEY `fk_common_persons_emails_1` (`id_person`),
  KEY `fk_common_persons_emails_2` (`id_email`),
  CONSTRAINT `fk_common_persons_emails_1` FOREIGN KEY (`id_person`) REFERENCES `common_persons` (`id_person`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_common_persons_emails_2` FOREIGN KEY (`id_email`) REFERENCES `common_emails` (`id_email`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `common_persons_emails`
--

LOCK TABLES `common_persons_emails` WRITE;
/*!40000 ALTER TABLE `common_persons_emails` DISABLE KEYS */;
/*!40000 ALTER TABLE `common_persons_emails` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `common_user_logs`
--

LOCK TABLES `common_user_logs` WRITE;
/*!40000 ALTER TABLE `common_user_logs` DISABLE KEYS */;
INSERT INTO `common_user_logs` VALUES (1,1,8),(2,1,15),(3,1,16),(4,1,17),(5,1,18),(6,1,19),(7,1,20),(8,1,21),(9,1,22),(10,1,23),(11,1,28),(12,1,29),(13,1,30),(14,1,31),(15,1,32),(16,1,33),(17,1,34),(18,1,35),(19,1,36),(20,1,37),(21,1,38),(22,1,39),(23,1,40),(24,1,41),(25,1,42),(26,1,43),(27,1,44),(28,2,45),(29,1,46),(30,3,47),(31,1,48),(32,1,49),(33,1,50);
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
  `id_file` int(10) unsigned DEFAULT NULL,
  `username` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `password` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `fk_common_users_1` (`id_person`),
  KEY `fk_common_users_2` (`id_role`),
  KEY `fk_common_users_3` (`id_file`),
  CONSTRAINT `fk_common_users_1` FOREIGN KEY (`id_person`) REFERENCES `common_persons` (`id_person`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_common_users_2` FOREIGN KEY (`id_role`) REFERENCES `core_roles` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_common_users_3` FOREIGN KEY (`id_file`) REFERENCES `core_files` (`id_file`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `common_users`
--

LOCK TABLES `common_users` WRITE;
/*!40000 ALTER TABLE `common_users` DISABLE KEYS */;
INSERT INTO `common_users` VALUES (1,1,1,1,87,'admin','202cb962ac59075b964b07152d234b70'),(2,1,2,1,NULL,'demo','fe01ce2a7fbac8fafaed7c982a04e229'),(3,1,3,1,NULL,'test','098f6bcd4621d373cade4e832627b4f6');
/*!40000 ALTER TABLE `common_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `common_users_messages`
--

DROP TABLE IF EXISTS `common_users_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `common_users_messages` (
  `id_user_message` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `id_user` int(10) unsigned NOT NULL,
  `id_message` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_user_message`),
  KEY `fk_common_users_messages_1` (`id_user`),
  KEY `fk_common_users_messages_2` (`id_message`),
  CONSTRAINT `fk_common_users_messages_1` FOREIGN KEY (`id_user`) REFERENCES `common_users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_common_users_messages_2` FOREIGN KEY (`id_message`) REFERENCES `common_messages` (`id_message`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `common_users_messages`
--

LOCK TABLES `common_users_messages` WRITE;
/*!40000 ALTER TABLE `common_users_messages` DISABLE KEYS */;
INSERT INTO `common_users_messages` VALUES (1,2,1,1),(2,2,1,2),(3,2,1,3),(4,1,3,3),(5,1,1,4),(6,1,3,4);
/*!40000 ALTER TABLE `common_users_messages` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_actions`
--

LOCK TABLES `core_actions` WRITE;
/*!40000 ALTER TABLE `core_actions` DISABLE KEYS */;
INSERT INTO `core_actions` VALUES (1,1,'index-action'),(2,1,'message-action'),(3,1,'alo-action'),(4,1,'zipcode-action'),(5,1,'not-found-action'),(6,1,'get-method-from-action'),(7,2,'index-action'),(8,2,'create-action'),(9,2,'save-action'),(10,2,'update-action'),(11,2,'enable-action'),(12,2,'disable-action'),(13,2,'history-action'),(14,2,'search-action'),(15,2,'not-found-action'),(16,2,'get-method-from-action'),(17,3,'inspect-action'),(18,3,'filter-action'),(19,3,'config-action'),(20,3,'set-privilege-action'),(21,3,'flush-privileges-action'),(22,3,'not-found-action'),(23,3,'index-action'),(24,3,'get-method-from-action'),(25,4,'index-action'),(26,4,'create-action'),(27,4,'update-action'),(28,4,'save-action'),(29,4,'enable-action'),(30,4,'disable-action'),(31,4,'history-action'),(32,4,'not-found-action'),(33,4,'get-method-from-action'),(34,5,'login-action'),(35,5,'auth-action'),(36,5,'not-found-action'),(37,5,'index-action'),(38,5,'get-method-from-action'),(39,6,'index-action'),(40,6,'create-action'),(41,6,'update-action'),(42,6,'save-action'),(43,6,'enable-action'),(44,6,'disable-action'),(45,6,'history-action'),(46,6,'not-found-action'),(47,6,'get-method-from-action'),(48,7,'index-action'),(49,7,'create-action'),(50,7,'update-action'),(51,7,'save-action'),(52,7,'enable-action'),(53,7,'disable-action'),(54,7,'history-action'),(55,7,'not-found-action'),(56,7,'get-method-from-action'),(57,2,'change-password-action'),(58,2,'profile-action'),(59,8,'soap-action'),(60,8,'wsdl-action'),(61,8,'not-found-action'),(62,8,'index-action'),(63,8,'get-method-from-action'),(64,2,'save-profile-action'),(65,2,'avatar-action'),(66,2,'upload-action'),(67,2,'crop-action'),(68,9,'index-action'),(69,9,'create-action'),(70,9,'update-action'),(71,9,'save-action'),(72,9,'enable-action'),(73,9,'disable-action'),(74,9,'history-action'),(75,9,'not-found-action'),(76,9,'get-method-from-action'),(77,9,'save-message-action'),(78,9,'has-messages-action'),(79,9,'get-messages-action'),(80,9,'get-message-action'),(81,9,'my-messages-action');
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
INSERT INTO `core_actions_roles` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1),(57,1),(58,1),(64,1),(65,1),(66,1),(67,1),(68,1),(69,1),(70,1),(71,1),(72,1),(73,1),(74,1),(75,1),(76,1),(77,1),(78,1),(79,1),(80,1),(81,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_controllers`
--

LOCK TABLES `core_controllers` WRITE;
/*!40000 ALTER TABLE `core_controllers` DISABLE KEYS */;
INSERT INTO `core_controllers` VALUES (1,1,'core\\controller\\index-controller'),(2,1,'core\\controller\\user-controller'),(3,1,'core\\controller\\core-controller'),(4,1,'core\\controller\\role-controller'),(5,1,'core\\controller\\auth-controller'),(6,1,'core\\controller\\menu-item-controller'),(7,1,'core\\controller\\file-controller'),(8,1,'core\\controller\\wsdl-controller'),(9,1,'core\\controller\\message-controller');
/*!40000 ALTER TABLE `core_controllers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_files`
--

DROP TABLE IF EXISTS `core_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_files` (
  `id_file` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `path` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_file`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_files`
--

LOCK TABLES `core_files` WRITE;
/*!40000 ALTER TABLE `core_files` DISABLE KEYS */;
INSERT INTO `core_files` VALUES (1,1,'1.png','0000-00-00 00:00:00','public/images/avatar'),(2,1,'2.png','0000-00-00 00:00:00','public/images/avatar'),(3,1,'3.png','0000-00-00 00:00:00','public/images/avatar'),(4,1,'4.png','0000-00-00 00:00:00','public/images/avatar'),(5,1,'5.png','0000-00-00 00:00:00','public/images/avatar'),(6,1,'6.png','0000-00-00 00:00:00','public/images/avatar'),(7,1,'7.jpg','0000-00-00 00:00:00','public/images/avatar'),(8,1,'8.jpeg','0000-00-00 00:00:00','public/images/avatar'),(9,1,'9.jpeg','0000-00-00 00:00:00','public/images/avatar'),(10,1,'10.jpeg','0000-00-00 00:00:00','public/images/avatar'),(11,1,'11.jpeg','0000-00-00 00:00:00','public/images/avatar'),(12,1,'12.jpeg','0000-00-00 00:00:00','public/images/avatar'),(13,1,'13.jpeg','0000-00-00 00:00:00','public/images/avatar'),(14,1,'14.jpg','0000-00-00 00:00:00','public/images/avatar'),(15,1,'15.jpeg','0000-00-00 00:00:00','public/images/avatar'),(16,1,'16.jpeg','0000-00-00 00:00:00','public/images/avatar'),(17,1,'17.jpeg','0000-00-00 00:00:00','public/images/avatar'),(18,1,'18.jpeg','0000-00-00 00:00:00','public/images/avatar'),(19,1,'19.jpeg','0000-00-00 00:00:00','public/images/avatar'),(20,1,'20.jpeg','0000-00-00 00:00:00','public/images/avatar'),(21,1,'21.jpg','0000-00-00 00:00:00','public/images/avatar'),(22,1,'22.jpg','0000-00-00 00:00:00','public/images/avatar'),(23,1,'23.jpg','0000-00-00 00:00:00','public/images/avatar'),(24,1,'24.jpg','0000-00-00 00:00:00','public/images/avatar'),(25,1,'25.jpg','0000-00-00 00:00:00','public/images/avatar'),(26,1,'26.jpg','0000-00-00 00:00:00','public/images/avatar'),(27,1,'27.jpg','0000-00-00 00:00:00','public/images/avatar'),(28,1,'28.jpg','0000-00-00 00:00:00','public/images/avatar'),(29,1,'29.jpeg','0000-00-00 00:00:00','public/images/avatar'),(30,1,'30.jpg','0000-00-00 00:00:00','public/images/avatar'),(31,1,'31.jpeg','0000-00-00 00:00:00','public/images/avatar'),(32,1,'32.jpeg','0000-00-00 00:00:00','public/images/avatar'),(33,1,'33.jpeg','0000-00-00 00:00:00','public/images/avatar'),(34,1,'34.jpeg','0000-00-00 00:00:00','public/images/avatar'),(35,1,'35.jpeg','0000-00-00 00:00:00','public/images/avatar'),(36,1,'36.jpg','0000-00-00 00:00:00','public/images/avatar'),(37,1,'37.jpeg','0000-00-00 00:00:00','public/images/avatar'),(38,1,'38.jpeg','0000-00-00 00:00:00','public/images/avatar'),(39,1,'39.jpeg','0000-00-00 00:00:00','public/images/avatar'),(40,1,'40.jpeg','0000-00-00 00:00:00','public/images/avatar'),(41,1,'41.jpg','0000-00-00 00:00:00','public/images/avatar'),(42,1,'42.jpeg','0000-00-00 00:00:00','public/images/avatar'),(43,1,'43.jpg','0000-00-00 00:00:00','public/images/avatar'),(44,1,'44.jpeg','0000-00-00 00:00:00','public/images/avatar'),(45,1,'45.jpeg','0000-00-00 00:00:00','public/images/avatar'),(46,1,'46.jpeg','0000-00-00 00:00:00','public/images/avatar'),(47,1,'47.jpeg','0000-00-00 00:00:00','public/images/avatar'),(48,1,'48.jpeg','0000-00-00 00:00:00','public/images/avatar'),(49,1,'49.png','0000-00-00 00:00:00','public/images/avatar'),(50,1,'50.png','0000-00-00 00:00:00','public/images/avatar'),(51,1,'51.jpg','0000-00-00 00:00:00','public/images/avatar'),(52,1,'52.png','0000-00-00 00:00:00','public/images/avatar'),(53,1,'53.png','0000-00-00 00:00:00','public/images/avatar'),(54,1,'54.jpeg','0000-00-00 00:00:00','public/images/avatar'),(55,1,'55.jpg','0000-00-00 00:00:00','public/images/avatar'),(56,1,'56.jpeg','0000-00-00 00:00:00','public/images/avatar'),(57,1,'57.jpeg','0000-00-00 00:00:00','public/images/avatar'),(58,1,'58.jpg','0000-00-00 00:00:00','public/images/avatar'),(59,1,'59.png','0000-00-00 00:00:00','public/images/avatar'),(60,1,'60.jpg','0000-00-00 00:00:00','public/images/avatar'),(61,1,'61.jpg','0000-00-00 00:00:00','public/images/avatar'),(62,1,'62.jpg','0000-00-00 00:00:00','public/images/avatar'),(63,1,'63.jpg','0000-00-00 00:00:00','public/images/avatar'),(64,1,'64.png','0000-00-00 00:00:00','public/images/avatar'),(65,1,'65.png','0000-00-00 00:00:00','public/images/avatar'),(66,1,'66.png','0000-00-00 00:00:00','public/images/avatar'),(67,1,'67.jpeg','0000-00-00 00:00:00','public/images/avatar'),(68,1,'68.jpg','0000-00-00 00:00:00','public/images/avatar'),(69,1,'69.jpg','0000-00-00 00:00:00','public/images/avatar'),(70,1,'70.png','0000-00-00 00:00:00','public/images/avatar'),(71,1,'71.png','0000-00-00 00:00:00','public/images/avatar'),(72,1,'72.png','0000-00-00 00:00:00','public/images/avatar'),(73,1,'73.jpeg','0000-00-00 00:00:00','public/images/avatar'),(74,1,'74.jpeg','0000-00-00 00:00:00','public/images/avatar'),(75,1,'75.jpeg','0000-00-00 00:00:00','public/images/avatar'),(76,1,'76.jpeg','0000-00-00 00:00:00','public/images/avatar'),(77,1,'77.jpg','0000-00-00 00:00:00','public/images/avatar'),(78,1,'78.jpeg','0000-00-00 00:00:00','public/images/avatar'),(79,1,'79.jpeg','0000-00-00 00:00:00','public/images/avatar'),(80,1,'80.jpeg','0000-00-00 00:00:00','public/images/avatar'),(81,1,'81.jpeg','0000-00-00 00:00:00','public/images/avatar'),(82,1,'82.jpeg','0000-00-00 00:00:00','public/images/avatar'),(83,1,'83.png','0000-00-00 00:00:00','public/images/avatar'),(84,1,'84.jpg','0000-00-00 00:00:00','public/images/avatar'),(85,1,'85.jpg','0000-00-00 00:00:00','public/images/avatar'),(86,1,'86.jpeg','0000-00-00 00:00:00','public/images/avatar'),(87,1,'87.jpeg','0000-00-00 00:00:00','public/images/avatar');
/*!40000 ALTER TABLE `core_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_files_logs`
--

DROP TABLE IF EXISTS `core_files_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_files_logs` (
  `id_file_log` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_file` int(10) unsigned NOT NULL,
  `id_log` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_file_log`),
  KEY `fk_core_files_logs_1` (`id_file`),
  KEY `fk_core_files_logs_2` (`id_log`),
  CONSTRAINT `fk_core_files_logs_1` FOREIGN KEY (`id_file`) REFERENCES `core_files` (`id_file`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_core_files_logs_2` FOREIGN KEY (`id_log`) REFERENCES `core_logs` (`id_log`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_files_logs`
--

LOCK TABLES `core_files_logs` WRITE;
/*!40000 ALTER TABLE `core_files_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_files_logs` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_logs`
--

LOCK TABLES `core_logs` WRITE;
/*!40000 ALTER TABLE `core_logs` DISABLE KEYS */;
INSERT INTO `core_logs` VALUES (8,1,'2014-01-24 00:24:59',5,NULL),(9,1,'2014-01-24 00:28:01',3,NULL),(10,1,'2014-01-24 00:28:24',3,NULL),(11,1,'2014-01-24 00:28:42',3,NULL),(12,1,'2014-01-24 00:29:00',3,NULL),(13,1,'2014-01-24 00:29:16',3,NULL),(14,1,'2014-01-24 00:30:16',3,NULL),(15,1,'2014-01-24 01:05:01',5,NULL),(16,1,'2014-01-24 01:07:39',6,NULL),(17,1,'2014-01-24 01:07:44',5,NULL),(18,1,'2014-01-24 17:23:58',5,NULL),(19,1,'2014-01-28 20:40:09',5,NULL),(20,1,'2014-01-28 21:06:50',5,NULL),(21,1,'2014-01-28 23:15:59',5,NULL),(22,1,'2014-01-29 15:15:56',6,NULL),(23,1,'2014-01-29 15:16:02',5,NULL),(24,1,'2014-01-29 17:47:29',3,NULL),(25,1,'2014-01-29 17:48:35',3,NULL),(26,1,'2014-01-29 17:48:46',2,NULL),(27,1,'2014-01-29 17:48:49',1,NULL),(28,1,'2014-01-29 18:55:28',5,NULL),(29,1,'2014-01-29 18:55:46',6,NULL),(30,1,'2014-01-29 18:55:53',5,NULL),(31,1,'2014-01-29 18:56:01',6,NULL),(32,1,'2014-01-29 18:56:01',5,NULL),(33,1,'2014-01-29 18:56:23',6,NULL),(34,1,'2014-01-29 18:56:23',5,NULL),(35,1,'2014-01-29 18:56:33',6,NULL),(36,1,'2014-01-29 18:56:33',5,NULL),(37,1,'2014-01-29 18:57:08',6,NULL),(38,1,'2014-01-29 18:57:09',5,NULL),(39,1,'2014-01-29 18:57:22',6,NULL),(40,1,'2014-01-29 18:57:22',5,NULL),(41,1,'2014-01-29 18:57:27',6,NULL),(42,1,'2014-01-29 18:57:27',5,NULL),(43,1,'2014-01-29 18:57:45',6,NULL),(44,1,'2014-01-29 18:57:45',5,NULL),(45,2,'2014-01-29 18:59:44',3,NULL),(46,1,'2014-01-29 19:48:17',5,NULL),(47,3,'2014-01-29 19:49:48',3,NULL),(48,1,'2014-01-30 16:02:26',5,NULL),(49,1,'2014-01-30 16:03:29',6,NULL),(50,1,'2014-01-30 16:03:29',5,NULL),(51,1,'2014-01-30 19:37:17',4,NULL),(52,1,'2014-01-30 19:43:29',4,NULL),(53,1,'2014-01-30 20:41:44',2,NULL),(54,1,'2014-01-30 20:41:58',2,NULL),(55,1,'2014-01-30 20:42:04',1,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_menu_item_logs`
--

LOCK TABLES `core_menu_item_logs` WRITE;
/*!40000 ALTER TABLE `core_menu_item_logs` DISABLE KEYS */;
INSERT INTO `core_menu_item_logs` VALUES (1,1,9),(2,2,10),(3,3,11),(4,4,12),(5,5,13),(6,6,14);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_menu_items`
--

LOCK TABLES `core_menu_items` WRITE;
/*!40000 ALTER TABLE `core_menu_items` DISABLE KEYS */;
INSERT INTO `core_menu_items` VALUES (1,NULL,NULL,'System',NULL,1),(2,7,1,'Users',NULL,1),(3,25,1,'Roles',NULL,1),(4,39,1,'Menu',NULL,1),(5,48,1,'Files',NULL,1),(6,19,1,'Privileges',NULL,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_modules`
--

LOCK TABLES `core_modules` WRITE;
/*!40000 ALTER TABLE `core_modules` DISABLE KEYS */;
INSERT INTO `core_modules` VALUES (1,'Core'),(2,'Query'),(3,'Model'),(4,'SmartyModule'),(5,'WkhtmlToPdf');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_roles`
--

LOCK TABLES `core_roles` WRITE;
/*!40000 ALTER TABLE `core_roles` DISABLE KEYS */;
INSERT INTO `core_roles` VALUES (1,'Administrator',1);
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

-- Dump completed on 2014-01-30 14:56:31
