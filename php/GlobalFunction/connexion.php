<?php
require_once '../base/database.php';
require_once '../base/constants.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars(trim($_POST['pseudo'] ?? ''));

    if (empty($username)) {
        echo json_encode(['success' => false, 'message' => 'Veuillez entrer un pseudo.']);
        exit();
    }

    // Vérifier si l'utilisateur existe
    $checkUser = database::run("SELECT idUser FROM User WHERE username = ?", [$username])->fetch();

    if ($checkUser) {
        // Générer un token unique
        $token = bin2hex(random_bytes(16));
        database::run("UPDATE User SET token = ? WHERE idUser = ?", [$token, $checkUser['idUser']]);

        // Retourner le token et l'ID utilisateur
        echo json_encode(['success' => true, 'token' => $token, 'user_id' => $checkUser['idUser']]);
        exit();
    } else {
        echo json_encode(['success' => false, 'message' => 'Utilisateur non trouvé.']);
        exit();
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée.']);
    exit();
}