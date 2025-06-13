-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 13 juin 2025 à 11:05
-- Version du serveur : 10.11.11-MariaDB-0ubuntu0.24.04.2
-- Version de PHP : 8.3.12

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
-- Structure de la table `Answer`
--

DROP TABLE IF EXISTS `Answer`;
CREATE TABLE `Answer` (
  `idAnswer` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  `choiceId` int(11) NOT NULL,
  `answered_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Choice`
--

DROP TABLE IF EXISTS `Choice`;
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
(1, 1, 'CSS', 1),
(2, 1, 'HTML', 0),
(3, 1, 'JavaScript', 0),
(4, 1, 'C++', 0),
(5, 1, 'Python', 0),
(6, 2, 'HyperText Markup Language', 1),
(7, 2, 'HighText Modern Language', 0),
(8, 2, 'Home Tool Markup Language', 0),
(9, 2, 'Hyper Tool Multi Language', 0),
(10, 2, 'None of the above', 0),
(11, 3, '1010', 1),
(12, 3, '1100', 0),
(13, 3, '1001', 0),
(14, 3, '1110', 0),
(15, 3, '1000', 0),
(16, 4, 'Alan Turing', 1),
(17, 4, 'Bill Gates', 0),
(18, 4, 'Steve Jobs', 0),
(19, 4, 'Ada Lovelace', 0),
(20, 4, 'Tim Berners-Lee', 0),
(21, 5, 'Sécuriser la communication sur le Web', 1),
(22, 5, 'Accélérer les téléchargements', 0),
(23, 5, 'Compresser les images', 0),
(24, 5, 'Changer d’adresse IP', 0),
(25, 5, 'Afficher des pages plus vite', 0),
(26, 6, '1991', 1),
(27, 6, '1989', 0),
(28, 6, '1995', 0),
(29, 6, '2000', 0),
(30, 6, '1985', 0),
(31, 7, 'Organisation du code autour d’objets qui regroupent données et comportements', 1),
(32, 7, 'Exécution parallèle du code', 0),
(33, 7, 'Utilisation de fonctions récursives uniquement', 0),
(34, 7, 'Déploiement d’applications web', 0),
(35, 7, 'Création de scripts linéaires', 0),
(36, 8, 'git clone [URL]', 1),
(37, 8, 'git commit', 0),
(38, 8, 'git push', 0),
(39, 8, 'git merge', 0),
(40, 8, 'git pull', 0),
(41, 9, 'Central Processing Unit', 1),
(42, 9, 'Computer Program Utility', 0),
(43, 9, 'Control Panel Unit', 0),
(44, 9, 'Central Program Unit', 0),
(45, 9, 'Core Processing Utility', 0),
(46, 10, 'Un environnement simulé qui imite un ordinateur physique', 1),
(47, 10, 'Un antivirus puissant', 0),
(48, 10, 'Un disque dur secondaire', 0),
(49, 10, 'Un navigateur web sécurisé', 0),
(50, 10, 'Une application cloud', 0);

-- --------------------------------------------------------

--
-- Structure de la table `concours`
--

DROP TABLE IF EXISTS `concours`;
CREATE TABLE `concours` (
  `idConcours` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `nbParticipantMax` int(11) NOT NULL,
  `typeConcour` varchar(50) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `concours`
--

INSERT INTO `concours` (`idConcours`, `nom`, `nbParticipantMax`, `typeConcour`, `idUser`) VALUES
(1, 'test', 12, '0', 1),
(5, 'Superconcours', 100, '1', 1),
(6, 'superTest', 120, '0', 1),
(7, 'MegaTestSuper', 121211212, '1', 1),
(8, 'SuperConcours', 1211, '1', 13);

-- --------------------------------------------------------

--
-- Structure de la table `concours_user`
--

DROP TABLE IF EXISTS `concours_user`;
CREATE TABLE `concours_user` (
  `idConcours` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `joined_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `concours_user`
--

INSERT INTO `concours_user` (`idConcours`, `idUser`, `joined_at`) VALUES
(1, 1, '2025-06-06 13:49:58'),
(1, 2, '2025-06-06 14:53:49'),
(5, 1, '2025-06-06 15:11:53'),
(6, 1, '2025-06-06 15:50:07'),
(7, 1, '2025-06-06 15:51:26'),
(5, 13, '2025-06-06 15:52:42'),
(1, 13, '2025-06-06 15:53:31');

-- --------------------------------------------------------

--
-- Structure de la table `HeadBreaker`
--

DROP TABLE IF EXISTS `HeadBreaker`;
CREATE TABLE `HeadBreaker` (
  `idHeadBreaker` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  `timeLimit` int(11) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Question`
--

DROP TABLE IF EXISTS `Question`;
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
(1, 'Quel langage est principalement utilisé pour styliser les pages web ?', 'easy', 'Technologie', '2025-05-09 13:03:46'),
(2, 'Que signifie HTML ?', 'easy', 'Technologie', '2025-05-09 13:03:46'),
(3, 'Quelle est la valeur binaire de 10 en base décimale ?', 'medium', 'Programmation', '2025-05-09 13:03:46'),
(4, 'Qui est considéré comme le père de l\'informatique ?', 'medium', 'Histoire de l\'informatique', '2025-05-09 13:03:46'),
(5, 'À quoi sert le protocole HTTPS ?', 'medium', 'Réseaux', '2025-05-09 13:03:46'),
(6, 'En quelle année a été créé le langage Python ?', 'hard', 'Programmation', '2025-05-09 13:03:46'),
(7, 'Définir le principe de la programmation orientée objet.', 'hard', 'Programmation', '2025-05-09 13:03:46'),
(8, 'Quelle est la commande Git pour cloner un dépôt ?', 'easy', 'Développement', '2025-05-09 13:03:46'),
(9, 'Que signifie « CPU » ?', 'medium', 'Architecture', '2025-05-09 13:03:46'),
(10, 'Expliquez brièvement le concept de machine virtuelle.', 'hard', 'Systèmes', '2025-05-09 13:03:46');

-- --------------------------------------------------------

--
-- Structure de la table `quizz`
--

DROP TABLE IF EXISTS `quizz`;
CREATE TABLE `quizz` (
  `idQuizz` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  `timeLimit` int(11) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Score`
--

DROP TABLE IF EXISTS `Score`;
CREATE TABLE `Score` (
  `idScore` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `scoreValue` int(11) NOT NULL,
  `gameMode` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Score`
--

INSERT INTO `Score` (`idScore`, `userId`, `scoreValue`, `gameMode`, `created_at`) VALUES
(1, 2, 1611, 'quizz', '2025-04-11 13:27:59'),
(2, 3, 1379, 'quizz', '2025-04-11 13:27:59'),
(3, 4, 1559, 'quizz', '2025-04-11 13:27:59'),
(4, 5, 1660, 'quizz', '2025-04-11 13:27:59'),
(5, 6, 1620, 'quizz', '2025-04-11 13:27:59'),
(6, 7, 1119, 'quizz', '2025-04-11 13:27:59'),
(7, 8, 1740, 'quizz', '2025-04-11 13:27:59'),
(8, 9, 1856, 'quizz', '2025-04-11 13:27:59'),
(9, 10, 17, 'quizz', '2025-04-11 13:27:59'),
(10, 11, 851, 'quizz', '2025-04-11 13:27:59'),
(11, 2, 837, 'casse-tete', '2025-04-11 13:27:59'),
(12, 3, 1132, 'casse-tete', '2025-04-11 13:27:59'),
(13, 4, 1149, 'casse-tete', '2025-04-11 13:27:59'),
(14, 5, 1851, 'casse-tete', '2025-04-11 13:27:59'),
(15, 6, 803, 'casse-tete', '2025-04-11 13:27:59'),
(16, 7, 967, 'casse-tete', '2025-04-11 13:27:59'),
(17, 8, 1924, 'casse-tete', '2025-04-11 13:27:59'),
(18, 9, 1715, 'casse-tete', '2025-04-11 13:27:59'),
(19, 10, 806, 'casse-tete', '2025-04-11 13:27:59'),
(20, 11, 1388, 'casse-tete', '2025-04-11 13:27:59'),
(21, 13, 0, 'quizz', '2025-06-06 15:41:59'),
(22, 13, 0, 'casse-tete', '2025-06-06 15:41:59');

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

DROP TABLE IF EXISTS `User`;
CREATE TABLE `User` (
  `idUser` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `token` varchar(256) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `User`
--

INSERT INTO `User` (`idUser`, `username`, `token`, `created_at`) VALUES
(1, 'Bonjour', NULL, '2025-04-04 13:48:20'),
(2, 'AliceTest', NULL, '2025-04-11 13:27:59'),
(3, 'BobTest', '', '2025-04-11 13:27:59'),
(4, 'CharlieTest', '', '2025-04-11 13:27:59'),
(5, 'DianaTest', '', '2025-04-11 13:27:59'),
(6, 'EveTest', '', '2025-04-11 13:27:59'),
(7, 'FrankTest', '', '2025-04-11 13:27:59'),
(8, 'GraceTest', '', '2025-04-11 13:27:59'),
(9, 'HeidiTest', NULL, '2025-04-11 13:27:59'),
(10, 'IvanTest', NULL, '2025-04-11 13:27:59'),
(11, 'JudyTest', '', '2025-04-11 13:27:59'),
(12, 'bonjourMonsieur', NULL, '2025-05-16 13:13:14'),
(13, 'test2', '571e8c05e4dbeb58aa7e2798ffb61337', '2025-06-06 15:41:59');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Answer`
--
ALTER TABLE `Answer`
  ADD PRIMARY KEY (`idAnswer`),
  ADD KEY `userId` (`userId`),
  ADD KEY `questionId` (`questionId`),
  ADD KEY `choiceId` (`choiceId`);

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
-- Index pour la table `HeadBreaker`
--
ALTER TABLE `HeadBreaker`
  ADD PRIMARY KEY (`idHeadBreaker`),
  ADD KEY `questionId` (`questionId`);

--
-- Index pour la table `Question`
--
ALTER TABLE `Question`
  ADD PRIMARY KEY (`idQuestion`);

--
-- Index pour la table `quizz`
--
ALTER TABLE `quizz`
  ADD PRIMARY KEY (`idQuizz`),
  ADD KEY `questionId` (`questionId`);

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
-- AUTO_INCREMENT pour la table `Answer`
--
ALTER TABLE `Answer`
  MODIFY `idAnswer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Choice`
--
ALTER TABLE `Choice`
  MODIFY `idChoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `concours`
--
ALTER TABLE `concours`
  MODIFY `idConcours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `HeadBreaker`
--
ALTER TABLE `HeadBreaker`
  MODIFY `idHeadBreaker` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Question`
--
ALTER TABLE `Question`
  MODIFY `idQuestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `quizz`
--
ALTER TABLE `quizz`
  MODIFY `idQuizz` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Score`
--
ALTER TABLE `Score`
  MODIFY `idScore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Answer`
--
ALTER TABLE `Answer`
  ADD CONSTRAINT `Answer_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `User` (`idUser`) ON DELETE CASCADE,
  ADD CONSTRAINT `Answer_ibfk_2` FOREIGN KEY (`questionId`) REFERENCES `Question` (`idQuestion`) ON DELETE CASCADE,
  ADD CONSTRAINT `Answer_ibfk_3` FOREIGN KEY (`choiceId`) REFERENCES `Choice` (`idChoice`) ON DELETE CASCADE;

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
-- Contraintes pour la table `HeadBreaker`
--
ALTER TABLE `HeadBreaker`
  ADD CONSTRAINT `HeadBreaker_ibfk_1` FOREIGN KEY (`questionId`) REFERENCES `Question` (`idQuestion`) ON DELETE CASCADE;

--
-- Contraintes pour la table `quizz`
--
ALTER TABLE `quizz`
  ADD CONSTRAINT `quizz_ibfk_1` FOREIGN KEY (`questionId`) REFERENCES `Question` (`idQuestion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Score`
--
ALTER TABLE `Score`
  ADD CONSTRAINT `Score_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `User` (`idUser`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
