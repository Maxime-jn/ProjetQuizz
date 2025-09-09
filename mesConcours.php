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
        <h2>Mes concours</h2>
        <ul>
            <?php if ($concours && count($concours) > 0): ?>
            <?php foreach ($concours as $c): ?>
            <li>
                <?= htmlspecialchars($c['nom']) ?>
                <span style="margin-left:1em;color:#aaa;">[<?= $c['typeConcour'] == 1 ? 'Quiz' : 'Casse-tête' ?>]</span>
                <a href="hubConcours.php?idConcours=<?= $c['idConcours'] ?>">
                    <button>Accéder</button>
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