<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BriseTête - Hub de Compétition</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/hub.css">
</head>

<body>
    <header>
        <div><a href="index.php">
                <h1>BriseTête</h1>
            </a></div>
        <div id="auth-buttons"></div>
    </header>
    <main>
        <div class="competition-container">
            <div class="player-list">
                <h2>Liste joueur</h2>
                <ul>
                    <li><input type="text" placeholder="Joueur 1"></li>
                    <li><input type="text" placeholder="Joueur 2"></li>
                    <li><input type="text" placeholder="Joueur 3"></li>
                    <li><input type="text" placeholder="Joueur 4"></li>
                    <li><input type="text" placeholder="Joueur 5"></li>
                </ul>
            </div>
            <div class="participate">
                <button>Participer</button>
            </div>
            <div class="ranking">
                <h2>Classement</h2>
                <ul>
                    <li><input type="text" placeholder="1er"></li>
                    <li><input type="text" placeholder="2e"></li>
                    <li><input type="text" placeholder="3e"></li>
                    <li><input type="text" placeholder="4e"></li>
                    <li><input type="text" placeholder="5e"></li>
                </ul>
            </div>
        </div>
    </main>
    <footer>BriseTête © 2025</footer>
    <script src="js/connexion.js"></script>
</body>

</html>