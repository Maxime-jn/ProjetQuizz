<?php
require_once 'php/base/database.php';
require_once "php/GlobalFunction/functions.php";

// On récupère l'id du concours passé dans l'URL
$idConcours = isset($_GET['idConcours']) ? intval($_GET['idConcours']) : 0;


// Récupérer le type du concours
$typeConcour = null;


if ($idConcours > 0) {
    $concours = getConcoursById($idConcours);
    $typeConcour = $concours["typeConcour"];
}
?>
<!-- 

Auteurs :
Jean Maxime Robin
Leart Demiri
Timoléon Hede

Projet : 
BriseTete

Version : 
0.7 BETA

-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BriseTête</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/hubConcours.css">
</head>

<body class="conteneurBackground">

    <header class="barreDeHeader">
        <div class="insideHeaderContainer">
            <div>
                <a href="index.php">
                    <h1>BriseTête</h1>
                </a>
            </div>

            <div id="myConcours"></div>
            <div id="auth-buttons"></div>
        </div>
    </header>

    <main>
        <div class="hub-competition-container">
            <h1><?= $concours["nom"] ?></h1>

            <div class="hub-player-list">
                <h2>Liste des joueurs</h2>
                <ul id="classement">
                    <?php
          if ($idConcours > 0) {
            $users = getUsersFromConcours($idConcours);
            if ($users && count($users) > 0) {
              foreach ($users as $row) {
                echo '<li>' . htmlspecialchars($row['username']) . '</li>';
              }
            } else { echo "<li>Aucun joueur inscrit pour ce concours.</li>"; }
          } else { echo "<li>Erreur : Concours inconnu.</li>"; }
        ?>
                </ul>
            </div>

            <div class="hub-game-launch">
                <?php if ($typeConcour == 1): ?>
                <button class="hub-btnIndexSeul" onclick="lancerJeu('quiz')">
                    <span class="hub-btnIndexSeul_sl"></span>
                    <span class="hub-btnIndexSeul_lg"><span class="hub-btnIndexSeul_text">Lancer un Quiz</span></span>
                </button>
                <?php elseif ($typeConcour == 0): ?>
                <button class="hub-btnIndexSeul" onclick="lancerJeu('casse_tete')">
                    <span class="hub-btnIndexSeul_lg">
                    <span class="hub-btnIndexSeul_sl"></span>
                    <span class="hub-btnIndexSeul_text">Lancer un Casse-tête</span>
                    </span>
                </button>


                <?php else: ?>
                <span>Type de concours inconnu.</span>
                <?php endif; ?>
            </div>

        </div>

    </main>


    <footer class="pageFooter">
        <div class="footerTitre">BriseTête © 2025</div>

        <div class="footerLinks">
            <span>Réalisé par : I.DA.P4A</span>
            <ul>
                <li><a href="https://edu.ge.ch/site/cfpt">CFPT</a></li>
                <li><a href="https://www.ge.ch/conditions-generales">Conditions générales</a></li>
                <li><a href="https://edu.ge.ch/site/cfpt/secretariats-2">Contact</a></li>
            </ul>
        </div>
    </footer>

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
            const niveau = Math.floor(Math.random() * 21) + 1;
            window.location.href = "pageCasseTete.php?niveau=" + niveau + "?idConcours=" + concoursId;
        }
    }
    </script>
    <script src="js/connexion.js"></script>
    <script src="js/toMyConcours.js"></script>
</body>

</html>