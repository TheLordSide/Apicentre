-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 19 oct. 2022 à 12:50
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `inta_tracking`
--

-- --------------------------------------------------------

--
-- Structure de la table `centre`
--

CREATE TABLE `centre` (
  `centre_id` int(11) NOT NULL,
  `centre_code` varchar(10) DEFAULT NULL,
  `centre_designation` varchar(30) DEFAULT NULL,
  `centre_localisation` varchar(50) DEFAULT NULL,
  `centre_telephone` varchar(10) DEFAULT NULL,
  `centre_nb_personne` tinyint(2) DEFAULT NULL,
  `centre_chef_nom` varchar(30) NOT NULL,
  `centre_chef_prenom` varchar(30) NOT NULL,
  `centre_chef_tel` tinyint(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `centre`
--

INSERT INTO `centre` (`centre_id`, `centre_code`, `centre_designation`, `centre_localisation`, `centre_telephone`, `centre_nb_personne`, `centre_chef_nom`, `centre_chef_prenom`, `centre_chef_tel`) VALUES
(1, 'sss', 'sss', 'ssss', '111', 11, 'sssss', 'sss', 11),
(2, 'dd', 'fff', 'fd', '77', 7, 'ddwd', 'wdwd', 7);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `compte_id` int(11) NOT NULL,
  `compte_pseudo` varchar(15) NOT NULL,
  `compte_password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `centre`
--
ALTER TABLE `centre`
  ADD PRIMARY KEY (`centre_id`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`compte_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `centre`
--
ALTER TABLE `centre`
  MODIFY `centre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `compte_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
