<?php
require_once "../base/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Decode JSON input
    $data = json_decode(file_get_contents("php://input"), true);

    $userId = $data['userId'] ?? null;
    $scoreValue = $data['scoreValue'] ?? null;
    $gameMode = $data['gameMode'] ?? 'default';

    if (!$userId || $scoreValue === null) {
        http_response_code(400);
        echo json_encode(["error" => "Missing parameters"]);
        exit;
    }

    try {
        database::run(
            "UPDATE Score SET scoreValue = scoreValue + :score WHERE userId = :user AND gameMode = :mode",
            [
                'score' => $scoreValue,
                'user' => $userId,
                'mode' => $gameMode
            ]
        );

        echo json_encode(["success" => true]);
    } catch (Throwable $th) {
        http_response_code(500);
        echo json_encode(["error" => "Failed to add score"]);
    }
} else {
    http_response_code(405);
    echo json_encode(["error" => "Invalid request method"]);
}