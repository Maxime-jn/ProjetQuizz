<?php

require_once '../base/database.php';
require_once '../base/constants.php';

header('Content-Type: application/json');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars(trim($_POST['name'] ?? ''));
    $nbParticipants = (int)($_POST['participants'] ?? 0);
    $idUser = $_POST['userId'];
    $typeConcour = $_POST['typeConcour'] ?? null;

    if (!$idUser || $typeConcour === null) {
        echo json_encode(['success' => false, 'message' => 'Utilisateur ou type manquant.']);
        exit();
    }

    if (empty($nom) || $nbParticipants <= 0) {
        echo json_encode(['success' => false, 'message' => 'Données invalides.']);
        exit();
    }

    try {
        $sql = "INSERT INTO concours (nom, nbParticipantMax, typeConcour, idUser) 
                VALUES (:nom, :nbParticipants, :typeConcour, :idUser)";
        database::run($sql, [
            ':nom' => $nom,
            ':nbParticipants' => $nbParticipants,
            ':typeConcour' => $typeConcour,
            ':idUser' => $idUser,
        ]);

        echo json_encode(['success' => true, 'message' => 'Concours créé avec succès.']);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Erreur lors de la création du concours.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée.']);
}