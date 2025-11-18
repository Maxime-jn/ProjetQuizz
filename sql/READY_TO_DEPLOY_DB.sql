-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 18 nov. 2025 à 09:05
-- Version du serveur : 10.6.22-MariaDB-0ubuntu0.22.04.1
-- Version de PHP : 8.1.2-1ubuntu2.22
    
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


--
-- Base de données : `QuizGame`
--
CREATE DATABASE IF NOT EXISTS `QuizGame` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `QuizGame`;

-- --------------------------------------------------------

--
-- Structure de la table `Choice`
--

CREATE TABLE `Choice` (
  `idChoice` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  `choiceText` text NOT NULL,
  `isCorrect` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Choice`
--

INSERT INTO `Choice` (`idChoice`, `questionId`, `choiceText`, `isCorrect`) VALUES
-- Q1
(1, 1, 'Le disque dur', 1),
(2, 1, 'Le ventilateur', 0),
(3, 1, 'Le câble HDMI', 0),
(4, 1, 'La webcam', 0),
(5, 1, 'Le clavier', 0),

-- Q2
(6, 2, 'À visiter des sites Internet', 1),
(7, 2, 'À augmenter la puissance du PC', 0),
(8, 2, 'À créer des jeux vidéo', 0),
(9, 2, 'À écouter de la musique', 0),
(10, 2, 'À nettoyer l’ordinateur', 0),

-- Q3
(11, 3, 'Le clavier', 1),
(12, 3, 'Les écouteurs', 0),
(13, 3, 'La batterie', 0),
(14, 3, 'L’écran', 0),
(15, 3, 'Le micro', 0),

-- Q4
(16, 4, 'Il protège l’ordinateur contre les logiciels dangereux', 1),
(17, 4, 'Il accélère Internet', 0),
(18, 4, 'Il répare le clavier', 0),
(19, 4, 'Il change la couleur de l’écran', 0),
(20, 4, 'Il supprime automatiquement toutes les photos', 0),

-- Q5
(21, 5, 'À alimenter l’ordinateur en énergie', 1),
(22, 5, 'À transférer des fichiers', 0),
(23, 5, 'À imprimer des documents', 0),
(24, 5, 'À améliorer le son', 0),
(25, 5, 'À connecter au Wi-Fi', 0),

-- Q6
(26, 6, 'Une suite de lettres/chiffres pour protéger un compte', 1),
(27, 6, 'Un dessin', 0),
(28, 6, 'Une vidéo', 0),
(29, 6, 'Un nom d’animal', 0),
(30, 6, 'Un message secret pour les extraterrestres', 0),

-- Q7
(31, 7, 'Une chose qu’on enregistre, comme un document ou une image', 1),
(32, 7, 'Une clé USB', 0),
(33, 7, 'Une application', 0),
(34, 7, 'Une boîte en carton', 0),
(35, 7, 'Une page web', 0),

-- Q8
(36, 8, 'À accéder à des sites et des informations', 1),
(37, 8, 'À refroidir l’ordinateur', 0),
(38, 8, 'À augmenter la batterie', 0),
(39, 8, 'À changer la couleur du clavier', 0),
(40, 8, 'À imprimer plus rapidement', 0),

-- Q9
(41, 9, 'Copier un fichier depuis Internet vers son ordinateur', 1),
(42, 9, 'Effacer un programme', 0),
(43, 9, 'Allumer l’écran', 0),
(44, 9, 'Agrandir une image', 0),
(45, 9, 'Brancher un câble', 0),

-- Q10
(46, 10, 'Un programme qu’on utilise sur un ordinateur ou un téléphone', 1),
(47, 10, 'Une musique', 0),
(48, 10, 'Une photo', 0),
(49, 10, 'Un câble', 0),
(50, 10, 'Un mot compliqué pour faire peur', 0);

-- --------------------------------------------------------

--
-- Structure de la table `concours`
--

CREATE TABLE `concours` (
  `idConcours` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `nbParticipantMax` int(11) NOT NULL,
  `typeConcour` varchar(50) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Structure de la table `concours_user`
--

CREATE TABLE `concours_user` (
  `idConcours` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `joined_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Structure de la table `Question`
--

CREATE TABLE `Question` (
  `idQuestion` int(11) NOT NULL,
  `questionText` text NOT NULL,
  `difficulty` varchar(50) NOT NULL,
  `category` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Question`
--

INSERT INTO `Question` (`idQuestion`, `questionText`, `difficulty`, `category`, `created_at`) VALUES
(1, 'Quel appareil permet d’enregistrer et conserver des fichiers ?', 'easy', 'Découverte', NOW()),
(2, 'À quoi sert un navigateur web ?', 'easy', 'Découverte', NOW()),
(3, 'Quelle partie d’un ordinateur permet de taper du texte ?', 'easy', 'Découverte', NOW()),
(4, 'Que fait un antivirus ?', 'easy', 'Découverte', NOW()),
(5, 'À quoi sert un câble de chargement ?', 'easy', 'Découverte', NOW()),
(6, 'Qu’est-ce qu’un mot de passe ?', 'easy', 'Découverte', NOW()),
(7, 'Qu’est-ce qu’un fichier sur un ordinateur ?', 'easy', 'Découverte', NOW()),
(8, 'À quoi sert Internet ?', 'easy', 'Découverte', NOW()),
(9, 'Que signifie « télécharger » ?', 'easy', 'Découverte', NOW()),
(10, 'Qu’est-ce qu’une application ?', 'easy', 'Découverte', NOW());

-- --------------------------------------------------------

--
-- Structure de la table `Score`
--

CREATE TABLE `Score` (
  `idScore` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `scoreValue` int(11) NOT NULL,
  `gameMode` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `idUser` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `token` varchar(256) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Choice`
--
ALTER TABLE `Choice`
  ADD PRIMARY KEY (`idChoice`),
  ADD KEY `questionId` (`questionId`);

--
-- Index pour la table `concours`
--
ALTER TABLE `concours`
  ADD PRIMARY KEY (`idConcours`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `concours_user`
--
ALTER TABLE `concours_user`
  ADD KEY `idConcours` (`idConcours`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `Question`
--
ALTER TABLE `Question`
  ADD PRIMARY KEY (`idQuestion`);

--
-- Index pour la table `Score`
--
ALTER TABLE `Score`
  ADD PRIMARY KEY (`idScore`),
  ADD KEY `userId` (`userId`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Choice`
--
ALTER TABLE `Choice`
  MODIFY `idChoice` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `concours`
--
ALTER TABLE `concours`
  MODIFY `idConcours` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Question`
--
ALTER TABLE `Question`
  MODIFY `idQuestion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Score`
--
ALTER TABLE `Score`
  MODIFY `idScore` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Choice`
--
ALTER TABLE `Choice`
  ADD CONSTRAINT `Choice_ibfk_1` FOREIGN KEY (`questionId`) REFERENCES `Question` (`idQuestion`) ON DELETE CASCADE;

--
-- Contraintes pour la table `concours`
--
ALTER TABLE `concours`
  ADD CONSTRAINT `concours_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `User` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `concours_user`
--
ALTER TABLE `concours_user`
  ADD CONSTRAINT `concours_user_ibfk_1` FOREIGN KEY (`idConcours`) REFERENCES `concours` (`idConcours`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `concours_user_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `User` (`idUser`);

--
-- Contraintes pour la table `Score`
--
ALTER TABLE `Score`
  ADD CONSTRAINT `Score_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `User` (`idUser`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
