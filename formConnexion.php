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
    <link rel="stylesheet" href="css/formConnexion.css">
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

    <main id="mainFormConnexion">
        <div>
            <div>
                <a href="formInscription.php"><button>Inscription</button></a>
            </div>
            <form id="login-form">
                <label for="pseudo">Pseudo</label>
                <input type="text" id="pseudo" name="pseudo" placeholder="Entrez votre pseudo" required>
                <button type="submit" class="btnFormConnexion">
                    <span class="btnFormConnexion_lg">
                        <span class="btnFormConnexion_sl"></span>
                        <span class="btnFormConnexion_text">Se connecter</span>
                    </span>
                </button>
            </form>
        </div>
    </main>


    <footer class="pageFooter">
        <div class="footerTitre">BriseTête © 2025</div>

        <div class="footerLinks">
            <span>Réalisé par : I.DA.P4A</span>
            <ul>
                <li><a href="https://edu.ge.ch/site/cfpt">CFPT</a></li>
                <li><a href="https://www.ge.ch/conditions-generales">Conditions générales</a></li>
                <li><a href="https://edu.ge.ch/site/cfpt/secretariats-2">Contact</a></li>\
                <img src="" alt="">
            </ul>
        </div>
        <img class="logoCFPT" src="./img/CFPT--L.png" alt="logoCFPT">
    </footer>


    <script src="js/connexion.js"></script>
    <script src="js/toMyConcours.js"></script>
</body>

</html>