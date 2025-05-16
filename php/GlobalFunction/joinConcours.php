<?php

require_once '../base/database.php';

header('Content-Type: application/json');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars(trim($_POST['name'] ?? ''));
    $password = htmlspecialchars(trim($_POST['password'] ?? ''));
    $idUser = $_SESSION['user_id'] ?? null;

    if (!$idUser) {
        echo json_encode(['success' => false, 'message' => 'Utilisateur non connecté.']);
        exit();
    }

    if (empty($nom)) {
        echo json_encode(['success' => false, 'message' => 'Nom du concours requis.']);
        exit();
    }

    try {
        // Vérifier si le concours existe
        $sql = "SELECT * FROM concours WHERE nom = :nom";
        $stmt = database::run($sql, [':nom' => $nom]);
        $concours = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$concours) {
            echo json_encode(['success' => false, 'message' => 'Concours introuvable.']);
            exit();
        }

        // Vérifier le mot de passe si le concours est privé
        if ($concours['isPublic'] == 0 && $concours['password'] !== $password) {
            echo json_encode(['success' => false, 'message' => 'Mot de passe incorrect.']);
            exit();
        }

        // Vérifier si l'utilisateur est déjà inscrit
        $sqlCheck = "SELECT * FROM Answer WHERE userId = :idUser AND questionId = :idConcours";
        $stmtCheck = database::run($sqlCheck, [':idUser' => $idUser, ':idConcours' => $concours['idConcours']]);
        if ($stmtCheck->fetch()) {
            echo json_encode(['success' => false, 'message' => 'Déjà inscrit au concours.']);
            exit();
        }

        // Inscrire l'utilisateur
        $sqlJoin = "INSERT INTO Answer (userId, questionId) VALUES (:idUser, :idConcours)";
        database::run($sqlJoin, [':idUser' => $idUser, ':idConcours' => $concours['idConcours']]);

        echo json_encode(['success' => true, 'message' => 'Vous avez rejoint le concours.']);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Erreur lors de la tentative de rejoindre.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée.']);
}