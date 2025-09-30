<?php
require_once 'php/base/database.php';
require_once 'php/GlobalFunction/functions.php';

$idUser = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;
if (!$idUser) {
    header('Location: formConnexion.php');
    exit();
}

$concours = getConcoursByUser($idUser);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BriseTête — Mes concours</title>
    <link rel="stylesheet" href="css/base.css" />
    <link rel="stylesheet" href="css/mesConcours.css" /><!-- contient aussi les styles .btnIndexConcours -->
</head>

<body class="conteneurBackground">
    <header class="barreDeHeader">
        <div class="insideHeaderContainer">
            <div><a href="index.php">
                    <h1>BriseTête</h1>
                </a></div>
            <div id="myConcours"></div>
            <div id="auth-buttons"></div>
        </div>
    </header>

    <main>
        <h2>Mes concours</h2>
        <ul>
            <?php if (!empty($concours)): ?>
            <?php foreach ($concours as $c): ?>
            <li>
                <span>
                    <?= htmlspecialchars($c['nom']) ?>
                    <span style="margin-left:.8em;opacity:.8;">
                        [<?= ($c['typeConcour'] ?? 0) == 1 ? 'Quiz' : 'Casse-tête' ?>]
                    </span>
                </span>

                <a class="btnMesConcours" href="hubConcours.php?idConcours=<?= (int)$c['idConcours'] ?>"
                    aria-label="Accéder au concours « <?= htmlspecialchars($c['nom']) ?> »">
                    <span class="btnMesConcours_lg">
                        <span class="btnMesConcours_sl"></span>
                        <span class="btnMesConcours_text">Accéder</span>
                    </span>
                </a>


            </li>
            <?php endforeach; ?>
            <?php else: ?>
            <li>Vous n'avez rejoint aucun concours.</li>
            <?php endif; ?>
        </ul>
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

    <script src="js/connexion.js"></script>
    <script src="js/toMyConcours.js"></script>
</body>

</html>