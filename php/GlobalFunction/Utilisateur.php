<?php
session_start();
require_once '../base/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['pseudo'] ?? '');

    if (empty($username)) {
        $_SESSION['error'] = "Veuillez entrer un pseudo.";
        header("Location: ../../formInscription.php");
        exit();
    }

    // Vérifier si l'utilisateur existe déjà
    $checkUser = database::run("SELECT idUser FROM User WHERE username = ?", [$username])->fetch();

    if ($checkUser) {
        // Générer un token unique
        $token = bin2hex(random_bytes(16));
        database::run("UPDATE User SET token = ? WHERE idUser = ?", [$token, $checkUser['idUser']]);

        $_SESSION['user_id'] = $checkUser['idUser'];
        $_SESSION['username'] = $username;
        $_SESSION['token'] = $token;

        header("Location: ../../index.php");
        exit();
    } else {
        // Créer le nouvel utilisateur
        $token = bin2hex(random_bytes(16));
        database::run("INSERT INTO User (username, token) VALUES (?, ?)", [$username, $token]);

        $userId = database::db()->lastInsertId();

        // Créer les scores pour les deux modes de jeu
        database::run("INSERT INTO Score (userId, gameMode, scoreValue) VALUES (?, 'quizz', 0)", [$userId]);
        database::run("INSERT INTO Score (userId, gameMode, scoreValue) VALUES (?, 'casse-tete', 0)", [$userId]);

        // Stocker dans la session
        $_SESSION['user_id'] = $userId;
        $_SESSION['username'] = $username;
        $_SESSION['token'] = $token;

        header("Location: ../../index.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Méthode non autorisée.";
    header("Location: ../../formInscription.php");
    exit();
}