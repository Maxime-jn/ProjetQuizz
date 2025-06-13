<?php

require_once '../base/database.php';

header('Content-Type: application/json');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['name'] ?? '';
    $idUser = $_POST['userId'] ?? null;

    if (!$idUser) {
        echo json_encode(['success' => false, 'message' => 'Utilisateur non connecté.']);
        exit();
    }

    if (empty($nom)) {
        echo json_encode(['success' => false, 'message' => 'Nom du concours requis.']);
        exit();
    }

    try {
        // Récupérer l'id du concours à partir du nom
        $sql = "SELECT idConcours FROM concours WHERE nom = :nom";
        $stmt = database::run($sql, [':nom' => $nom]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            echo json_encode(['success' => false, 'message' => 'Concours introuvable.']);
            exit();
        }
        $idConcours = $row['idConcours'];

        // Vérifier si l'utilisateur a déjà rejoint le concours
        $sql = "SELECT 1 FROM concours_user WHERE idConcours = :idConcours AND idUser = :idUser";
        $param = [
            ':idConcours' => $idConcours,
            ':idUser' => $idUser
        ];
        $stmt = database::run($sql, $param);
        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            echo json_encode(['success' => false, 'message' => 'Vous avez déjà rejoint ce concours.']);
            exit();
        }

        $sql = "INSERT INTO concours_user (idConcours, idUser) VALUES (:idConcours, :idUser)";
        database::run($sql, $param);

        echo json_encode(['success' => true, 'message' => 'Vous avez rejoint le concours.', 'idConcours' => $idConcours]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Erreur lors de la tentative de rejoindre.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée.']);
}