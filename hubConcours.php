<?php
require_once 'php/base/database.php';
require_once "php/GlobalFunction/functions.php";

// On récupère l'id du concours passé dans l'URL
$idConcours = isset($_GET['idConcours']) ? intval($_GET['idConcours']) : 0;


// Récupérer le type du concours
$typeConcour = null;
if ($idConcours > 0) {
    $sql = "SELECT typeConcour FROM concours WHERE idConcours = :idConcours";
    $stmt = database::run($sql, ["idConcours" => $idConcours]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $typeConcour = $row ? $row['typeConcour'] : null;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>BriseTête - Hub de Compétition</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/hub.css">
</head>
<style>

</style>
<body>
    <header>
        <div><a href="index.php">
                <h1>BriseTête</h1>
            </a></div>
        <div id="myConcours"></div>
        <div id="auth-buttons"></div>

    </header>
    <main>
        <div class="competition-container">
            <div class="player-list">
                <h2>Liste des joueurs</h2>
                <ul id="classement">
                    <?php
                    if ($idConcours > 0) {
                        $users = getUsersFromConcours($idConcours);
                        if ($users && count($users) > 0) {
                            foreach ($users as $row) {
                                echo '<li>' . htmlspecialchars($row['username']) . '</li>';
                            }
                        } else {
                            echo "<li>Aucun joueur inscrit pour ce concours.</li>";
                        }
                    } else {
                        echo "<li>Erreur : Concours inconnu.</li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="game-launch">
                <?php if ($typeConcour == 1): ?>
                    <button onclick="lancerJeu('quiz')">Lancer un Quiz</button>
                <?php elseif ($typeConcour == 0): ?>
                    <button onclick="lancerJeu('casse_tete')">Lancer un Casse-tête</button>
                <?php else: ?>
                    <span>Type de concours inconnu.</span>
                <?php endif; ?>
            </div>
        </div>
    </main>
    <footer>BriseTête © 2025</footer>
    <script>
    function lancerJeu(type) {
        const params = new URLSearchParams(window.location.search);
        const concoursId = params.get('idConcours');
        if (!concoursId) {
            alert("Aucun concours sélectionné !");
            return;
        }
        if (type === 'quiz') {
            window.location.href = 'pageQuiz.php?idConcours=' + concoursId;
        } else if (type === 'casse_tete') {
            window.location.href = 'pageCasseTete.php?idConcours=' + concoursId;
        }
    }
    </script>
    <script src="js/connexion.js"></script>
    <script src="js/toMyConcours.js"></script>
</body>

</html>