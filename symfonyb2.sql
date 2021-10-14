-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 15 oct. 2021 à 00:25
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `symfonyb2`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Restauration'),
(2, 'Informatique'),
(3, 'Banque'),
(4, 'Automobile');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20211009180505', '2021-10-10 23:20:59', 709);

-- --------------------------------------------------------

--
-- Structure de la table `society`
--

CREATE TABLE `society` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `society`
--

INSERT INTO `society` (`id`, `category_id`, `title`, `description`, `date`, `image`) VALUES
(1, 1, 'Bistro Régent', 'LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM', '2021-10-10 00:00:00', 'images/img12_20180507100839-61671ba06294e.jpg'),
(2, 3, 'Société Générale', 'LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM', '2021-10-11 18:33:27', 'images/000_8wl9xw-61671d1d70199.jpg'),
(3, 2, 'LDLC', 'LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM', '2021-10-13 03:45:50', 'images/ldlccom_6246004-61671d547016e.jpg'),
(4, 4, 'Renault', 'LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM', '2021-10-13 03:46:25', 'images/15607766712photogaragegomez062019-61671e07a989a.jpg'),
(5, 1, 'McDonald\'s', 'LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM', '2021-10-13 04:12:56', 'images/0603030558747webtete-61671e4398924.jpg'),
(6, 1, 'Burger King', 'LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM', '2021-10-13 04:14:10', 'images/burger_king_at_night_0-61671e7a4e560.jpg'),
(7, 2, 'Cybertek', 'LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM', '2021-10-13 22:46:07', 'images/eeb37336094b278e539147a442ac3f6f_l-61674592db424.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `society`
--
ALTER TABLE `society`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D6461F212469DE2` (`category_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `society`
--
ALTER TABLE `society`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `society`
--
ALTER TABLE `society`
  ADD CONSTRAINT `FK_D6461F212469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
