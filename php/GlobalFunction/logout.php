<?php
require_once '../base/database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = trim($_POST['token'] ?? '');

    if (empty($token)) {
        echo json_encode(['success' => false, 'message' => 'Token manquant.']);
        exit();
    }

    // Supprimer le token de l'utilisateur
    $result = database::run("UPDATE User SET token = NULL WHERE token = ?", [$token]);

    if ($result->rowCount() > 0) {
        echo json_encode(['success' => true, 'message' => 'Déconnexion réussie.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Token invalide.']);
    }
    exit();
} else {
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée.']);
    exit();
}
?>
