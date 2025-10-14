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
    <link rel="stylesheet" href="css/splashscreen.css">
</head>

<body>
    <div class="conteneurBackground"></div>
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
        <div id="layout-accueil">
            <!-- Colonne gauche -->
            <div class="col-classement">
                <div class="classement-container">
                    <h2>Classement Quiz</h2>
                    <ul class="classement-list">
                        <?php foreach ($bestQuizzPlayers as $player): ?>
                        <li>
                            <span><?= htmlspecialchars($player['username']) ?></span>
                            <span><?= htmlspecialchars($player['scoreValue']) ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <!-- Colonne centre (boutons) -->
            <div class="col-boutons">
                <div id="buttonNavAcceuil">
                    <a href="menuSeul.php" class="btnIndexSeul">
                        <span class="btnIndexSeul_lg">
                            <span class="btnIndexSeul_sl"></span>
                            <span class="btnIndexSeul_text">Seul</span>
                        </span>
                    </a>

                    <a href="rejoindreConcours.php" class="btnIndexConcours">
                        <span class="btnIndexConcours_lg">
                            <span class="btnIndexConcours_sl"></span>
                            <span class="btnIndexConcours_text">Mode Concours</span>
                        </span>
                    </a>
                </div>
            </div>

            <!-- Colonne droite -->
            <div class="col-classement">
                <div class="classement-container">
                    <h2>Classement Casse-tête</h2>
                    <ul class="classement-list">
                        <?php foreach ($bestCasseTetePlayers as $player): ?>
                        <li>
                            <span><?= htmlspecialchars($player['username']) ?></span>
                            <span><?= htmlspecialchars($player['scoreValue']) ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
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


    <script src="js/connexion.js"></script>
    <script src="js/toMyConcours.js"></script>
    <script src="js/splashscreenWelcome.js"></script>

</body>

</html>