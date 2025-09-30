<?php
require_once '../base/database.php';

header('Content-Type: application/json');
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée.']);
    exit;
}

$idUser     = isset($_POST['userId'])     ? (int)$_POST['userId']     : 0;
$idConcours = isset($_POST['idConcours']) ? (int)$_POST['idConcours'] : 0;
$nom        = isset($_POST['name'])       ? trim((string)$_POST['name']) : '';

if ($idUser <= 0) {
    echo json_encode(['success' => false, 'message' => 'Utilisateur non connecté.']);
    exit;
}

try {
    // 1) Résoudre le concours si seul le nom est fourni
    if ($idConcours <= 0) {
        if ($nom === '') {
            echo json_encode(['success' => false, 'message' => 'Concours non spécifié.']);
            exit;
        }
        $row = database::run(
            "SELECT idConcours FROM concours WHERE nom = :nom ORDER BY idConcours DESC LIMIT 1",
            [':nom' => $nom]
        )->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            echo json_encode(['success' => false, 'message' => 'Concours introuvable.']);
            exit;
        }
        $idConcours = (int)$row['idConcours'];
    } else {
        $row = database::run(
            "SELECT idConcours FROM concours WHERE idConcours = :id",
            [':id' => $idConcours]
        )->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            echo json_encode(['success' => false, 'message' => 'Concours introuvable.']);
            exit;
        }
    }

    // 2) Vérifier que l’utilisateur existe (table User, colonne idUser)
    $u = database::run(
        "SELECT 1 FROM User WHERE idUser = :u LIMIT 1",
        [':u' => $idUser]
    )->fetch(PDO::FETCH_ASSOC);

    if (!$u) {
        echo json_encode(['success' => false, 'message' => 'Utilisateur inexistant. Veuillez vous reconnecter.']);
        exit;
    }

    // 3) Déjà inscrit ?
    $exists = database::run(
        "SELECT 1 FROM concours_user WHERE idConcours = :c AND idUser = :u",
        [':c' => $idConcours, ':u' => $idUser]
    )->fetch(PDO::FETCH_ASSOC);

    if ($exists) {
        echo json_encode(['success' => false, 'message' => 'Vous avez déjà rejoint ce concours.', 'idConcours' => $idConcours]);
        exit;
    }

    // 4) Transaction + contrôle de capacité avec FOR UPDATE
    $txStarted = false;
    database::begin();
    $txStarted = true;

    // Verrouille la ligne du concours pour calculer les places restantes de manière atomique
    $cap = database::run("
        SELECT c.nbParticipantMax, COUNT(cu.idUser) AS nbInscrits
        FROM concours c
        LEFT JOIN concours_user cu ON cu.idConcours = c.idConcours
        WHERE c.idConcours = :c
        FOR UPDATE
    ", [':c' => $idConcours])->fetch(PDO::FETCH_ASSOC);

    if ($cap) {
        $placesRestantes = (int)$cap['nbParticipantMax'] - (int)$cap['nbInscrits'];
        if ($placesRestantes <= 0) {
            database::rollback();
            echo json_encode(['success' => false, 'message' => 'Le concours est complet.']);
            exit;
        }
    }

    // 5) Inscription
    database::run(
        "INSERT INTO concours_user (idConcours, idUser) VALUES (:c, :u)",
        [':c' => $idConcours, ':u' => $idUser]
    );

    database::commit();

    echo json_encode(['success' => true, 'message' => 'Vous avez rejoint le concours.', 'idConcours' => $idConcours]);
} catch (PDOException $e) {
    // rollback seulement si la transaction était ouverte
    if (!empty($txStarted)) {
        try { database::rollback(); } catch (Throwable $ignored) {}
    }
    // En DEV, garde le message SQL pour voir la vraie cause :
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    exit;
} catch (Exception $e) {
    if (!empty($txStarted)) {
        try { database::rollback(); } catch (Throwable $ignored) {}
    }
    echo json_encode(['success' => false, 'message' => 'Erreur lors de la tentative de rejoindre.']);
    exit;
}
