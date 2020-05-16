-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 16 mai 2020 à 16:21
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `siteemploi`
--

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE `offres` (
  `id` int(11) NOT NULL,
  `emploi` varchar(255) NOT NULL,
  `salaire` int(11) NOT NULL,
  `entreprise` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `offres`
--

INSERT INTO `offres` (`id`, `emploi`, `salaire`, `entreprise`) VALUES
(1, 'developpeur full stack', 5000, 'ketchup@gmail.com'),
(2, 'beta testeur', 1000, 'ketchup@gmail.com'),
(3, 'vendeur', 10000, 'arthur.laforest33@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passsword` varchar(255) NOT NULL,
  `rrole` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `passsword`, `rrole`) VALUES
(1, 'doe', 'john', 'admin@admin.com', '$2y$10$lR4jGRvftefOvWJHA2lJVuRhrrgpag/FY2ZJQATkgjaXPINmaHZ2y', 2),
(2, 'laforest', 'arthur', 'arthur.laforest33@gmail.com', '$2y$10$YMnokN.NXG5XMbqgOHJ4Ju75cUQEjQ9YOnkrBdUzxhxV3DRaWx8BC', 1),
(3, 'test', 'mctest', 'test@test.com', '$2y$10$h51zqQc1g77ZDrQWtbE8w.6nbZcBCh8Da1ZK/RPYf2WF4iBPEVzxi', 0),
(4, 'tutur', 'lavoiture', 'ketchup@gmail.com', '$2y$10$Z/knl0Qj2Jki3GnD8BlhouUGw1E6p6dTMMGHjDhvTcGs1ZWzV540O', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `offres`
--
ALTER TABLE `offres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `offres`
--
ALTER TABLE `offres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
