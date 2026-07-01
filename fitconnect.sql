-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 01 juil. 2026 à 11:39
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fitconnect`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnement`
--

CREATE TABLE `abonnement` (
  `id_abonnement` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `abonnement`
--

INSERT INTO `abonnement` (`id_abonnement`, `type`, `date_debut`, `date_fin`) VALUES
(1, 'Mensuel', '2026-01-01', '2026-01-31'),
(2, 'Trimestriel', '2026-02-01', '2026-04-30'),
(3, 'Semestriel', '2026-03-01', '2026-08-31'),
(4, 'Annuel', '2026-01-01', '2026-12-31');

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `id_adherent` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `date_inscription` date NOT NULL,
  `id_seance` int(11) DEFAULT NULL,
  `id_abonnement` int(11) DEFAULT NULL,
  `salle_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`id_adherent`, `nom`, `prenom`, `email`, `telephone`, `date_inscription`, `id_seance`, `id_abonnement`, `salle_id`) VALUES
(1, 'Benali', 'Yassine', 'yassine@gmail.com', '0612345678', '2026-01-10', 1, 1, 1),
(2, 'El Amrani', 'Sara', 'sara@gmail.com', '0622334455', '2026-02-15', 2, 2, 1),
(3, 'Alaoui', 'Omar', 'omar@gmail.com', '0633445566', '2026-03-20', 3, 3, 2),
(4, 'Karimi', 'Lina', 'lina@gmail.com', '0644556677', '2026-04-12', 4, 4, 3),
(5, 'Bennani', 'Hicham', 'hicham@gmail.com', '0655667788', '2026-05-08', 5, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `salle_id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `adresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`salle_id`, `nom`, `adresse`) VALUES
(1, 'FitConnect Centre', 'Casablanca Centre'),
(2, 'FitConnect Maarif', 'Casablanca Maarif'),
(3, 'FitConnect Agdal', 'Rabat Agdal'),
(4, 'FitConnect Gueliz', 'Marrakech Gueliz');

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

CREATE TABLE `seance` (
  `id_seance` int(11) NOT NULL,
  `date` date NOT NULL,
  `duree` int(11) NOT NULL,
  `activite` varchar(100) NOT NULL,
  `equipement` varchar(100) DEFAULT NULL,
  `salle_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `seance`
--

INSERT INTO `seance` (`id_seance`, `date`, `duree`, `activite`, `equipement`, `salle_id`) VALUES
(1, '2026-06-01', 60, 'Musculation', 'Haltères', 1),
(2, '2026-06-02', 45, 'Cardio', 'Tapis de course', 1),
(3, '2026-06-03', 90, 'CrossFit', 'Kettlebell', 2),
(4, '2026-06-04', 60, 'Yoga', 'Tapis', 3),
(5, '2026-06-05', 30, 'Vélo', 'Vélo elliptique', 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonnement`
--
ALTER TABLE `abonnement`
  ADD PRIMARY KEY (`id_abonnement`);

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`id_adherent`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_adherent_seance` (`id_seance`),
  ADD KEY `fk_adherent_abonnement` (`id_abonnement`),
  ADD KEY `fk_adherent_salle` (`salle_id`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`salle_id`);

--
-- Index pour la table `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`id_seance`),
  ADD KEY `fk_seance_salle` (`salle_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonnement`
--
ALTER TABLE `abonnement`
  MODIFY `id_abonnement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `id_adherent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `salle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `seance`
--
ALTER TABLE `seance`
  MODIFY `id_seance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD CONSTRAINT `fk_adherent_abonnement` FOREIGN KEY (`id_abonnement`) REFERENCES `abonnement` (`id_abonnement`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_adherent_salle` FOREIGN KEY (`salle_id`) REFERENCES `salle` (`salle_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_adherent_seance` FOREIGN KEY (`id_seance`) REFERENCES `seance` (`id_seance`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `fk_seance_salle` FOREIGN KEY (`salle_id`) REFERENCES `salle` (`salle_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
