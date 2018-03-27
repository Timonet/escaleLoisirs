-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 26 Mars 2018 à 09:35
-- Version du serveur :  5.7.21-0ubuntu0.16.04.1
-- Version de PHP :  7.0.25-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `escaleloisirs`
--

-- --------------------------------------------------------

--
-- Structure de la table `activites`
--

CREATE TABLE `activites` (
  `code_activite` int(11) NOT NULL,
  `nom_activite` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nb_participants_max_activite` smallint(6) DEFAULT NULL,
  `salle_activite` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_activite` text COLLATE utf8mb4_unicode_ci,
  `prix_activite` decimal(8,2) DEFAULT NULL,
  `date_debut_activite` datetime DEFAULT '1000-01-01 00:00:00',
  `date_fin_activite` datetime DEFAULT '1000-01-01 00:00:00',
  `code_personne` int(11) NOT NULL,
  `code_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `code_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`code_categorie`, `nom_categorie`) VALUES
(1, 'Gastronomie'),
(2, 'Santé et détente'),
(3, 'Activité physique'),
(4, 'Activités jeunesse'),
(5, 'Activités enfance'),
(6, 'Création'),
(7, 'Culturelles');

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

CREATE TABLE `inscriptions` (
  `paye` tinyint(1) DEFAULT NULL,
  `code_personne` int(11) NOT NULL,
  `code_activite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE `personnes` (
  `code_personne` int(11) NOT NULL,
  `mot_passe_personne` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_personne` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom_personne` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_adresse_personne` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rue_adresse_personne` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville_adresse_personne` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_postal_adresse_personne` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `courriel_personne` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone_personne` int(10) DEFAULT NULL,
  `code_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `code_role` int(11) NOT NULL,
  `nom_role` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`code_role`, `nom_role`) VALUES
(1, 'Administrateur'),
(2, 'Animateur'),
(3, 'Membre'),
(4, 'Autre');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `activites`
--
ALTER TABLE `activites`
  ADD PRIMARY KEY (`code_activite`),
  ADD KEY `FK_activites_code_personne` (`code_personne`),
  ADD KEY `FK_activites_code_categorie` (`code_categorie`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`code_categorie`);

--
-- Index pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`code_personne`,`code_activite`),
  ADD KEY `FK_inscrit_code_activite` (`code_activite`);

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`code_personne`),
  ADD KEY `FK_personnes_code_role` (`code_role`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`code_role`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `activites`
--
ALTER TABLE `activites`
  MODIFY `code_activite` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `code_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `code_personne` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `code_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `activites`
--
ALTER TABLE `activites`
  ADD CONSTRAINT `FK_activites_code_categorie` FOREIGN KEY (`code_categorie`) REFERENCES `categories` (`code_categorie`),
  ADD CONSTRAINT `FK_activites_code_personne` FOREIGN KEY (`code_personne`) REFERENCES `personnes` (`code_personne`);

--
-- Contraintes pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `FK_inscrit_code_activite` FOREIGN KEY (`code_activite`) REFERENCES `activites` (`code_activite`),
  ADD CONSTRAINT `FK_inscrit_code_personne` FOREIGN KEY (`code_personne`) REFERENCES `personnes` (`code_personne`);

--
-- Contraintes pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD CONSTRAINT `FK_personnes_code_role` FOREIGN KEY (`code_role`) REFERENCES `roles` (`code_role`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
