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
    <link rel="stylesheet" href="css/formCreationConcours.css">
</head>
<style>

</style>

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

    <main id="creationConcour">
        <h2>Créer un Concours</h2>
        <form action="creeConcours.php" method="POST">
            <label for="name">Nom du concours</label>
            <input type="text" id="name" name="name" required>

            <label for="participants">Nombre de participants</label>
            <input type="number" id="participants" name="participants" required min="1" max="1000">

            <label>Type</label>
            <div class="radio-group">
                <input type="radio" id="quizz" name="typeConcour" value="1" required>
                <label for="quizz">Quizz</label>

                <input type="radio" id="headbreaker" name="typeConcour" value="0" required>
                <label for="headbreaker">Casse tête</label>
            </div>

            <button type="submit" class="btnCreateConcours">
                <span class="btn_lg">
                    <span class="btn_sl"></span>
                    <span class="btn_text">Créer</span>
                </span>
            </button>

        </form>
        <a href="rejoindreConcours.php">Rejoindre un concours</a>
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


    <script src="js/creeConcours.js"></script>
    <!-- <script src="js/joinConcours.js"></script> -->
    <script src="js/connexion.js"></script>
    <script src="js/toMyConcours.js"></script>
</body>

</html>