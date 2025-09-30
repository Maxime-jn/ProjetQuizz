<?php
require_once '../base/database.php';
require_once '../base/constants.php';

header('Content-Type: application/json');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars(trim($_POST['name'] ?? ''));
    $nbParticipants = (int)($_POST['participants'] ?? 0);
    $idUser = $_POST['userId'] ?? null;
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
        // Démarre une transaction pour garantir l’auto-join
        $pdo = database::db();
        $pdo->beginTransaction();

        // 1) Créer le concours
        $sql = "INSERT INTO concours (nom, nbParticipantMax, typeConcour, idUser)
                VALUES (:nom, :nbParticipants, :typeConcour, :idUser)";
        database::run($sql, [
            ':nom'            => $nom,
            ':nbParticipants' => $nbParticipants,
            ':typeConcour'    => $typeConcour,
            ':idUser'         => $idUser,
        ]);

        $idConcours = $pdo->lastInsertId();

        // 2) Auto-join du créateur
        // Si une contrainte d'unicité existe, ON DUPLICATE/IGNORE évite l'erreur en cas de double clic
        $sqlJoin = "INSERT IGNORE INTO concours_user (idConcours, idUser)
                    VALUES (:idConcours, :idUser)";
        database::run($sqlJoin, [
            ':idConcours' => $idConcours,
            ':idUser'     => $idUser
        ]);

        $pdo->commit();

        echo json_encode([
            'success'    => true,
            'message'    => 'Concours créé avec succès',
            'idConcours' => $idConcours
        ]);
    } catch (Exception $e) {
        if (isset($pdo) && $pdo->inTransaction()) {
            $pdo->rollBack();
        }
        echo json_encode(['success' => false, 'message' => 'Erreur lors de la création du concours.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée.']);
}