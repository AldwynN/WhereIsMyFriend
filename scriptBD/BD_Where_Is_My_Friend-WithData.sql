CREATE DATABASE  IF NOT EXISTS `where_is_my_friend` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `where_is_my_friend`;
-- MySQL dump 10.13  Distrib 5.6.15, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: where_is_my_friend
-- ------------------------------------------------------
-- Server version	5.6.15-log

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
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friends` (
  `idUser` int(11) NOT NULL,
  `idFriend` int(11) NOT NULL,
  PRIMARY KEY (`idUser`,`idFriend`),
  KEY `fk_IdUser_idx` (`idUser`,`idFriend`),
  KEY `fk_IdFriend_idx` (`idFriend`),
  CONSTRAINT `fk_IdFriend` FOREIGN KEY (`idFriend`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_IdUser` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friends`
--

LOCK TABLES `friends` WRITE;
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;
INSERT INTO `friends` VALUES (7,8),(7,9),(7,10),(7,11);
/*!40000 ALTER TABLE `friends` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `idMessage` int(11) NOT NULL AUTO_INCREMENT,
  `idUserSent` int(11) NOT NULL,
  `idUserReceived` int(11) NOT NULL,
  `message` text NOT NULL,
  `dateSent` datetime NOT NULL,
  PRIMARY KEY (`idMessage`),
  KEY `idUserSent` (`idUserSent`),
  KEY `idUserReceived` (`idUserReceived`),
  CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`idUserSent`) REFERENCES `users` (`idUser`),
  CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`idUserReceived`) REFERENCES `users` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` int(33) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `adress` varchar(255) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (7,'gawen.ackrm@eduge.ch','8e2de782b390fa219acd03f1a04579c2ba963e11',2147483647,'Ackermann','Gawen','Charmille, 1203, rue de Miléant 10'),(8,'Jonathane@gmail.comd','2b6c0cd77101d36cdd75f9042db558dce87b973b',2147483647,'Borel-Jaquet','Jonathan','Rue de Fremis 47, 1241 Puplinge'),(9,'romain.prrt@eduge.ch','pourlinstantrien',2147483647,'Peretti','Romain','14 rue Joseph-Berthet'),(10,'vietvo@dao.com','veitvodao',0,'Viet','Vodao','Rue Gourgas 14'),(11,'khalil.mddb@eduge.ch','khalili',0,'Meddeb','Khalil','rue des pavillons 11, 1205');
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

-- Dump completed on 2019-03-11 14:02:06
