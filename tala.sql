-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 19 mai 2024 à 14:51
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tala`
--

-- --------------------------------------------------------

--
-- Structure de la table `annotation`
--

CREATE TABLE `annotation` (
  `id anno` int(5) NOT NULL,
  `id file` int(5) NOT NULL,
  `frequence` int(5) NOT NULL,
  `moyenne` decimal(2,2) NOT NULL,
  `motcle` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `file`
--

CREATE TABLE `file` (
  `id file` int(10) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `localisation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fréquence`
--

CREATE TABLE `fréquence` (
  `id clés` int(10) NOT NULL,
  `id file` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mot clés`
--

CREATE TABLE `mot clés` (
  `id clés` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id user` int(20) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `motdpass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id user`, `nom`, `prenom`, `username`, `motdpass`) VALUES
(1, 'uhy', 'jji', 'achref23', 'achref2033'),
(2, 'dfvds', 'QXSQS', 'achref23', 'achref2033'),
(51, 'achref', 'abed', 'achref23', '02082003');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annotation`
--
ALTER TABLE `annotation`
  ADD PRIMARY KEY (`id anno`),
  ADD KEY `id clés` (`id anno`,`id file`);

--
-- Index pour la table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id file`);

--
-- Index pour la table `fréquence`
--
ALTER TABLE `fréquence`
  ADD KEY `id clés` (`id clés`,`id file`);

--
-- Index pour la table `mot clés`
--
ALTER TABLE `mot clés`
  ADD PRIMARY KEY (`id clés`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annotation`
--
ALTER TABLE `annotation`
  MODIFY `id anno` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `file`
--
ALTER TABLE `file`
  MODIFY `id file` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mot clés`
--
ALTER TABLE `mot clés`
  MODIFY `id clés` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
