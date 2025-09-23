-- Création de la base de données
CREATE DATABASE BriseTete_DB
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_general_ci;

-- Utilisation de la base
USE BriseTete_DB;

-- Table User
CREATE TABLE User (
    idUser INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL,
    sessionToken VARCHAR(255) NOT NULL
);

-- Table GameMode
CREATE TABLE GameMode (
    idGamemode INT PRIMARY KEY AUTO_INCREMENT,
    gamemodeName VARCHAR(100) NOT NULL
);

-- Table Score
CREATE TABLE Score (
    idScore INT PRIMARY KEY AUTO_INCREMENT,
    idUser INT NOT NULL,
    idGamemode INT NOT NULL,
    value INT NOT NULL,
    FOREIGN KEY (idUser) REFERENCES User(idUser)
        ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (idGamemode) REFERENCES GameMode(idGamemode)
        ON DELETE CASCADE ON UPDATE CASCADE
);

-- Table Contest
CREATE TABLE Contest (
    idContest INT PRIMARY KEY AUTO_INCREMENT,
    idUser INT NOT NULL,  -- créateur/organisateur
    contestName VARCHAR(150) NOT NULL,
    maxPlayers INT NOT NULL,
    idGamemode INT NOT NULL,
    FOREIGN KEY (idUser) REFERENCES User(idUser)
        ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (idGamemode) REFERENCES GameMode(idGamemode)
        ON DELETE CASCADE ON UPDATE CASCADE
);

-- Table associative Contest_Has_User
CREATE TABLE Contest_Has_User (
    idUser INT NOT NULL,
    idContest INT NOT NULL,
    PRIMARY KEY (idUser, idContest),
    FOREIGN KEY (idUser) REFERENCES User(idUser)
        ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (idContest) REFERENCES Contest(idContest)
        ON DELETE CASCADE ON UPDATE CASCADE
);

-- Table Question
CREATE TABLE Question (
    idQuestion INT PRIMARY KEY AUTO_INCREMENT,
    questionText VARCHAR(500) NOT NULL
);

-- Table Choice
CREATE TABLE Choice (
    idChoice INT PRIMARY KEY AUTO_INCREMENT,
    idQuestion INT NOT NULL,
    choiceText VARCHAR(500) NOT NULL,
    FOREIGN KEY (idQuestion) REFERENCES Question(idQuestion)
        ON DELETE CASCADE ON UPDATE CASCADE
);
