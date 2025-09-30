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
    <link rel="stylesheet" href="css/menuSeul.css">
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

    <main id="mainSeul">
        <div id="btnMenuSeul">
            <a href="listeCasseTeteSeul.php" class="btnMenuCasseTete">
                <span class="btnMenuCasseTete_lg">
                    <span class="btnMenuCasseTete_sl"></span>
                    <span class="btnMenuCasseTete_text">Casse-tête</span>
                </span>
            </a>

            <a href="pageQuiz.php" class="btnMenuQuiz">
                <span class="btnMenuQuiz_lg">
                    <span class="btnMenuQuiz_sl"></span>
                    <span class="btnMenuQuiz_text">Quiz</span>
                </span>
            </a>
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