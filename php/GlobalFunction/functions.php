<?php
require_once 'php/base/constants.php';
require_once 'php/base/database.php';

function createToken()
{
    return bin2hex(random_bytes(TOKEN_BYTE_LENGTH));
}

// Cette fonction regarde si la méthode est belle et bien ce qui est demandé
function checkMethod(string $redirection, string $method)
{
    $method = $_SERVER['REQUEST_METHOD'];

    if ($method !== $method) {
        http_response_code(HTTP_STATUS_METHOD_NOT_ALLOWED);
        header("Location: $redirection");
        die();
    }
}
// Cette fonction retourne les 10 joueurs avec le plus de elo dans la categorie quizz sous forme de ARRAY
function getBestQuizzPlayers(): array
{
    $sql = "SELECT u.username, s.scoreValue 
            FROM Score s
            JOIN User u ON s.userId = u.idUser
            WHERE s.gameMode = 'quizz'
            ORDER BY s.scoreValue DESC
            LIMIT " . TOP_PLAYER_LIMIT;

    $stmt = database::run($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Cette fonction retourne les 10 joueurs avec le plus de elo dans la categorie casse-tete sous forme de ARRAY
function getBestBreakerPlayers(): array
{
    $sql = "SELECT u.username, s.scoreValue 
            FROM Score s
            JOIN User u ON s.userId = u.idUser
            WHERE s.gameMode = 'casse-tete'
            ORDER BY s.scoreValue DESC
            LIMIT " . TOP_PLAYER_LIMIT;

    $stmt = database::run($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}




function getRandomQuestions(): array
{
    $sql = "
        SELECT 
            q.idQuestion,
            q.questionText,
            q.difficulty,
            q.category,
            c.idChoice,
            c.choiceText,
            c.isCorrect
        FROM Question q
        JOIN Choice c ON q.idQuestion = c.questionId
        ORDER BY RAND()
    ";

    $stmt = database::run($sql);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $questions = [];

    foreach ($results as $row) {
        $id = $row['idQuestion'];

        if (!isset($questions[$id])) {
            $questions[$id] = [
                'idQuestion' => $row['idQuestion'],
                'questionText' => $row['questionText'],
                'difficulty' => $row['difficulty'],
                'category' => $row['category'],
                'choices' => []
            ];
        }

        $questions[$id]['choices'][] = [
            'idChoice' => $row['idChoice'],
            'choiceText' => $row['choiceText'],
            'isCorrect' => (bool) $row['isCorrect']
        ];
    }

    // Re-index array to remove gaps in keys (from associative array to indexed array)
    return array_values($questions);
}

function listeConcours()
{
    $sql = "SELECT c.idConcours, c.nom, c.nbParticipantMax, 
                   (SELECT COUNT(*) FROM concours_user cu WHERE cu.idConcours = c.idConcours) as nbInscrits
            FROM concours c";
    $stmt = database::run($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getConcoursByUser($idUser) {
    $sql = "SELECT c.idConcours, c.nom, c.typeConcour
            FROM concours_user cu
            JOIN concours c ON c.idConcours = cu.idConcours
            WHERE cu.idUser = :idUser";
    $stmt = database::run($sql, [':idUser' => $idUser]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUsersFromConcours($idConcours) {
    $sql = "SELECT User.username 
            FROM concours_user 
            JOIN User ON User.idUser = concours_user.idUser
            WHERE concours_user.idConcours = :idConcours";
    $param = [
        "idConcours" => $idConcours
    ];
    $statement = database::run($sql , $param);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}