-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 25 fév. 2019 à 15:26
-- Version du serveur :  5.7.17
-- Version de PHP :  7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `where_is_my_friend`
--

-- --------------------------------------------------------

--
-- Structure de la table `friends`
--

CREATE TABLE `friends` (
  `idUser` int(11) NOT NULL,
  `idFriend` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `friends`
--

INSERT INTO `friends` (`idUser`, `idFriend`) VALUES
(7, 8);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `idMessage` int(11) NOT NULL,
  `idUserSent` int(11) NOT NULL,
  `idUserReceived` int(11) NOT NULL,
  `message` text NOT NULL,
  `dateSent` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `adress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `email`, `password`, `salt`, `lastName`, `firstName`, `adress`) VALUES
(7, 'gawen.ackrm@eduge.ch', '8e2de782b390fa219acd03f1a04579c2ba963e11', '2147483647', 'Ackermann', 'Gawen', 'Charmille, 1289, rue de la pigale 47'),
(8, 'Jonathane@gmail.comd', '2b6c0cd77101d36cdd75f9042db558dce87b973b', '2147483647', 'Borel-Jaquet', 'Jonathan', 'Rue de Fremis 47, 1241 Puplinge');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`idUser`,`idFriend`),
  ADD KEY `idFriend` (`idFriend`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`idMessage`),
  ADD KEY `idUserSent` (`idUserSent`),
  ADD KEY `idUserReceived` (`idUserReceived`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `idMessage` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`),
  ADD CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`idFriend`) REFERENCES `users` (`idUser`);

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`idUserSent`) REFERENCES `users` (`idUser`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`idUserReceived`) REFERENCES `users` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
