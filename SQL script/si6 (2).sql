-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 14 fév. 2019 à 08:25
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `si6`
--

-- --------------------------------------------------------

--
-- Structure de la table `tcategorie`
--

CREATE TABLE `tcategorie` (
  `CATCode` varchar(8) NOT NULL,
  `CATLibelle` varchar(50) NOT NULL,
  `CATDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tcategorie`
--

INSERT INTO `tcategorie` (`CATCode`, `CATLibelle`, `CATDescription`) VALUES
('AP1', 'Appartement Luxe et Spa', ''),
('AP2', 'Appartement Luxe', ''),
('AP3', 'Appartement Charme', ''),
('AP4', 'Appartement Charme et Spa', ''),
('CH1', 'Chalet Luxe et Spa', ''),
('CH2', 'Chalet Luxe', ''),
('CH3', 'Chalet Charme', ''),
('CH4', 'Chalet Charme et Spa', '');

-- --------------------------------------------------------

--
-- Structure de la table `tchalet`
--

CREATE TABLE `tchalet` (
  `CHALETId` varchar(30) NOT NULL,
  `CHALETNom` varchar(255) NOT NULL,
  `CHALETSurface` int(11) NOT NULL,
  `CHALETAdresse` varchar(255) NOT NULL,
  `CHALETZip` int(11) NOT NULL,
  `CHALETVille` varchar(255) NOT NULL,
  `CHALETCatCode` varchar(8) NOT NULL,
  `CHALETProprioId` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tchalet`
--

INSERT INTO `tchalet` (`CHALETId`, `CHALETNom`, `CHALETSurface`, `CHALETAdresse`, `CHALETZip`, `CHALETVille`, `CHALETCatCode`, `CHALETProprioId`) VALUES
('0fe3657ccd5693dd5a1ede7057aed6', 'Chalettest1', 1, 'test1', 1, 'test1', 'CH1', '44da087e301233f369a86b1f99941b'),
('638dee321e5958205a5c73e562423f', 'Chalet de charme', 254, 'Rue des skieurs', 58965, 'Megeve', 'CH3', '44da087e301233f369a86b1f99941b'),
('69ce073c1cccae6d9fd4d0870002a4', 'test15 test', 25, 'te', 26954, 'tes', 'CH1', '44da087e301233f369a86b1f99941b'),
('e7a5f5f09305d2c922fd589619fa3a', 'test15 test', 25, 'te', 26954, 'tes', 'CH1', '44da087e301233f369a86b1f99941b'),
('e84322804f1306c2fa6416a3a09602', 'Chalettest1', 1, 'test1', 1, 'test1', 'CH1', '44da087e301233f369a86b1f99941b'),
('fc9762de8cb36fb9c6f9c6f7e131ed', 'Appartement 5 Ã©toiles', 63, 'Rue des skis', 25445, 'Combloux', 'CH3', '44da087e301233f369a86b1f99941b');

-- --------------------------------------------------------

--
-- Structure de la table `tclient`
--

CREATE TABLE `tclient` (
  `CLIId` varchar(30) NOT NULL,
  `CLIMail` varchar(255) NOT NULL,
  `CLIPassword` varchar(255) NOT NULL,
  `CLIDateInscription` date NOT NULL,
  `CLINom` varchar(50) NOT NULL,
  `CLIPrenom` varchar(40) NOT NULL,
  `CLIDateNaissance` date NOT NULL,
  `CLIVerif` int(11) DEFAULT '0',
  `CLIAdresse` varchar(255) NOT NULL,
  `CLIZip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tclient`
--

INSERT INTO `tclient` (`CLIId`, `CLIMail`, `CLIPassword`, `CLIDateInscription`, `CLINom`, `CLIPrenom`, `CLIDateNaissance`, `CLIVerif`, `CLIAdresse`, `CLIZip`) VALUES
('44da087e301233f369a86b1f99941b', 'vic20016@gmail.com', 'ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff', '2019-02-05', 'Durand', 'Victor', '0000-00-00', 0, '', 0),
('cce66d246117d87b30881c954759b6', 'l.albouy@eleve.leschartreux.net', 'ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff', '2019-02-08', 'Leo', 'Albouy', '0000-00-00', 0, '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `treserver`
--

CREATE TABLE `treserver` (
  `RESCliId` varchar(30) NOT NULL,
  `RESChaletId` varchar(30) NOT NULL,
  `RESDateArrive` date NOT NULL,
  `RESDateDepart` date NOT NULL,
  `RESPrix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tcategorie`
--
ALTER TABLE `tcategorie`
  ADD PRIMARY KEY (`CATCode`);

--
-- Index pour la table `tchalet`
--
ALTER TABLE `tchalet`
  ADD PRIMARY KEY (`CHALETId`),
  ADD KEY `CHALETCatCode` (`CHALETCatCode`),
  ADD KEY `CHALETProprioId` (`CHALETProprioId`);

--
-- Index pour la table `tclient`
--
ALTER TABLE `tclient`
  ADD PRIMARY KEY (`CLIId`);

--
-- Index pour la table `treserver`
--
ALTER TABLE `treserver`
  ADD PRIMARY KEY (`RESCliId`,`RESChaletId`,`RESDateArrive`),
  ADD KEY `RESChaletId` (`RESChaletId`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tchalet`
--
ALTER TABLE `tchalet`
  ADD CONSTRAINT `tchalet_ibfk_1` FOREIGN KEY (`CHALETCatCode`) REFERENCES `tcategorie` (`CATCode`),
  ADD CONSTRAINT `tchalet_ibfk_2` FOREIGN KEY (`CHALETProprioId`) REFERENCES `tclient` (`CLIId`);

--
-- Contraintes pour la table `treserver`
--
ALTER TABLE `treserver`
  ADD CONSTRAINT `treserver_ibfk_1` FOREIGN KEY (`RESCliId`) REFERENCES `tclient` (`CLIId`),
  ADD CONSTRAINT `treserver_ibfk_2` FOREIGN KEY (`RESChaletId`) REFERENCES `tchalet` (`CHALETId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
