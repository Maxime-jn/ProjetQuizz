<?php
require_once "php/GlobalFunction/functions.php";

$bestQuizzPlayers = getBestQuizzPlayers();
$bestCasseTetePlayers = getBestBreakerPlayers();
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
    <link rel="stylesheet" href="css/index.css">
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
        <div id="classement-quiz">
            <h2>classement quiz</h2>
            <ul id="classement">
                <?php foreach ($bestQuizzPlayers as $player): ?>
                <li><?= htmlspecialchars($player['username']) ?> <?= htmlspecialchars($player['scoreValue']) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div id="buttonNavAcceuil">
            <a href="menuSeul.php"><button class="btn">
                    <span>Seul</span>
                </button></a>
            <a href="rejoindreConcours.php"><button class="btn">
                    <span>Mode Concours</span>
                </button></a>

        </div>


        <div id="classement-casse-tete">
            <h2>classement casse-tête</h2>
            <ul id="classement">
                <?php foreach ($bestCasseTetePlayers as $player): ?>
                <li><?= htmlspecialchars($player['username']) ?> <?= htmlspecialchars($player['scoreValue'])?></li>
                <?php endforeach; ?>
            </ul>
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


    <script src="js/connexion.js"></script>
    <script src="js/toMyConcours.js"></script>
</body>

</html>