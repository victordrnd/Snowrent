-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 05 mars 2019 à 08:23
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
  `CATDescription` text NOT NULL,
  `CATPrix` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tcategorie`
--

INSERT INTO `tcategorie` (`CATCode`, `CATLibelle`, `CATDescription`, `CATPrix`) VALUES
('AP1', 'Appartement Luxe et Spa', '', 0),
('AP2', 'Appartement Luxe', '', 0),
('AP3', 'Appartement Charme', '', 0),
('AP4', 'Appartement Charme et Spa', '', 0),
('CH1', 'Chalet Luxe et Spa', '', 0),
('CH2', 'Chalet Luxe', '', 0),
('CH3', 'Chalet Charme', '', 0),
('CH4', 'Chalet Charme et Spa', '', 0);

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
  `CHALETProprioId` varchar(30) NOT NULL,
  `CHALETDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tchalet`
--

INSERT INTO `tchalet` (`CHALETId`, `CHALETNom`, `CHALETSurface`, `CHALETAdresse`, `CHALETZip`, `CHALETVille`, `CHALETCatCode`, `CHALETProprioId`, `CHALETDescription`) VALUES
('8934945bbcc99e3344c055ffdd7c6e', 'Appartement 5 Ã©toiles', 25, 'Rue des skis', 25445, 'Combloux', 'CH1', '44da087e301233f369a86b1f99941b', ''),
('8f5036482b3e7711b8c30dd5c57816', 'Appartement 5 Ã©toiles', 25, 'Rue des skis', 25445, 'Combloux', 'CH1', '44da087e301233f369a86b1f99941b', ''),
('cf2212f4877277143df06432c39625', 'test2', 25, 'test2', 2, 'test2', 'CH1', '44da087e301233f369a86b1f99941b', ''),
('e7a5f5f09305d2c922fd589619fa3a', 'test15 test', 25, 'te', 26954, 'tes', 'CH1', '44da087e301233f369a86b1f99941b', '');

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
  `RESId` varchar(255) NOT NULL,
  `RESCliId` varchar(30) NOT NULL,
  `RESChaletId` varchar(30) NOT NULL,
  `RESDateArrive` date NOT NULL,
  `RESDateDepart` date NOT NULL,
  `RESPrix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `treserver`
--

INSERT INTO `treserver` (`RESId`, `RESCliId`, `RESChaletId`, `RESDateArrive`, `RESDateDepart`, `RESPrix`) VALUES
('', '44da087e301233f369a86b1f99941b', '8f5036482b3e7711b8c30dd5c57816', '2019-03-23', '2019-03-24', 54);

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
  ADD PRIMARY KEY (`CLIId`),
  ADD UNIQUE KEY `uniquemail` (`CLIMail`);

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
