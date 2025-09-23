<?php
require_once '../base/database.php';
require_once '../base/constants.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars(trim($_POST[POST_USERNAME_KEY] ?? ''));

    if (empty($username)) {
        echo json_encode([SUCCESSFULL_REQUEST_JSON => false, ERROR_RETURN_DATA_VARIABLE => 'Veuillez entrer un pseudo.']);
        exit();
    }

    // Vérifier si l'utilisateur existe
    $checkUser = database::run("SELECT idUser FROM User WHERE username = ?", [$username])->fetch();

    if ($checkUser) {
        // Générer un token unique
        $token = bin2hex(random_bytes(16));
        database::run("UPDATE User SET token = ? WHERE idUser = ?", [$token, $checkUser['idUser']]);

        // Retourner le token et l'ID utilisateur
        echo json_encode([SUCCESSFULL_REQUEST_JSON => true, 'token' => $token, 'user_id' => $checkUser['idUser']]);
        exit();
    } else {
        echo json_encode([SUCCESSFULL_REQUEST_JSON => false, ERROR_RETURN_DATA_VARIABLE => 'Utilisateur non trouvé.']);
        exit();
    }
} else {
    echo json_encode([SUCCESSFULL_REQUEST_JSON => false, ERROR_RETURN_DATA_VARIABLE => 'Méthode non autorisée.']);
    exit();
}