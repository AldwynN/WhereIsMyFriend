-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 11 Février 2019 à 13:51
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `whereismyfriend`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `idMessage` int(11) NOT NULL AUTO_INCREMENT,
  `idUserSent` int(11) NOT NULL,
  `idUserReceived` int(11) NOT NULL,
  `message` text NOT NULL,
  `dateSent` datetime NOT NULL,
  PRIMARY KEY (`idMessage`),
  KEY `idUserSent` (`idUserSent`),
  KEY `idUserReceived` (`idUserReceived`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` int(33) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `adress` varchar(255) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`idUser`, `email`, `password`, `salt`, `lastName`, `firstName`, `adress`) VALUES
(7, 'gawen.ackrm@eduge.ch', '8e2de782b390fa219acd03f1a04579c2ba963e11', 2147483647, 'Ackermann', 'Gawen', 'Charmille, 1289, rue de la pigale 47'),
(8, 'Jonathane@gmail.comd', '2b6c0cd77101d36cdd75f9042db558dce87b973b', 2147483647, 'Borel-Jaquet', 'Jonathan', 'Rue de Fremis 47, 1241 Puplinge');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`idUserSent`) REFERENCES `users` (`idUser`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`idUserReceived`) REFERENCES `users` (`idUser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
