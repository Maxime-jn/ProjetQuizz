<?php
session_start();
require_once '../base/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['pseudo'] ?? '');

    if (empty($username)) {
        $_SESSION['error'] = "Veuillez entrer un pseudo.";
        header("Location: formInscription.php");
        exit();
    }

    // Vérifier si l'utilisateur existe déjà
    $checkUser = database::run("SELECT idUser FROM User WHERE username = ?", [$username])->fetch();
    
    if ($checkUser) {
        $_SESSION['user_id'] = $checkUser['idUser'];
        $_SESSION['username'] = $username;
        header("Location: ../../Accueil.php");
        exit();
    } else {
        // Insérer l'utilisateur
        database::run("INSERT INTO User (username) VALUES (?)", [$username]);
        $_SESSION['user_id'] = database::db()->lastInsertId();
        $_SESSION['username'] = $username;
        header("Location: ../../Accueil.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Méthode non autorisée.";
    header("Location: formInscription.php");
    exit();
}