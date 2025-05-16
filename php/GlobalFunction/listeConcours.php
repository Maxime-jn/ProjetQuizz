<?php

require_once 'database.php';

try {
    $sql = "SELECT idConcours, nom, nbParticipant, isPublic FROM concours";
    $stmt = database::run($sql);
    $concours = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['success' => true, 'concours' => $concours]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Erreur lors de la récupération des concours.']);
}
?>
