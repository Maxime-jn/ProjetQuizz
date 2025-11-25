<?php

require_once "php/GlobalFunction/functions.php";
require_once "php/base/database.php";
session_start();
$concours = listeConcours();

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
    <link rel="stylesheet" href="css/rejoindreConcours.css">
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

    <main id="rejoindreConcour">
        <h2>Rejoindre un Concours</h2>
        <div id="message-erreur"></div>

        <form id="joinConcoursForm" method="POST" action="joinConcours.php">
            <label for="name">Nom du concours</label>
            <select id="name" name="name" required>
                <option value="">Choisissez un concours</option>
                <?php foreach ($concours as $c):
                $placesRestantes = max(0, (int)$c['nbParticipantMax'] - (int)$c['nbInscrits']);
                $full = $placesRestantes === 0;
            ?>
                <option value="<?= (int)$c['idConcours'] ?>" <?= $full ? 'disabled' : '' ?>>
                    <?= htmlspecialchars($c['nom']) ?> (<?= $placesRestantes ?>
                    place<?= $placesRestantes > 1 ? 's' : '' ?> restante<?= $placesRestantes > 1 ? 's' : '' ?>)
                    <?= $full ? ' — COMPLET' : '' ?>
                </option>
                <?php endforeach; ?>
            </select>


            <div class="form-buttons">
                <button type="submit" class="btnJoinConcours">
                    <span class="btnJoinConcours_lg">
                        <span class="btnJoinConcours_sl"></span>
                        <span class="btnJoinConcours_text">Rejoindre</span>
                    </span>
                </button>
            </div>
        </form>


        <a href="formCreationConcours.php" class="link-alt">Créer un concours</a>
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
        <img class="logoCFPT" src="./img/CFPT--L.png" alt="logoCFPT">
    </footer>


    <script src="js/connexion.js"></script>
    <script src="js/joinConcours.js"></script>
    <script src="js/toMyConcours.js"></script>
</body>

</html>