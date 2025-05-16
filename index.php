<?php
require_once "php/GlobalFunction/functions.php";

$bestQuizzPlayers = getBestQuizzPlayers();
$bestCasseTetePlayers = getBestBreakerPlayers();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BriseTête</title>
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

    <main id="accueil">
        <div id="classement-quiz">
            <h2>classement concours quiz</h2>
            <ul id="classement">
                <?php foreach ($bestQuizzPlayers as $player): ?>
                    <li><?= htmlspecialchars($player['username']) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div id="buttonNavAcceuil">
            <a href="menuSeul.php"><button>
                    <h2>Seul</h2>
                </button></a>
            <a href="rejoindreConcours.php"><button>
                    <h2>Mode Concours</h2>
                </button></a>
        </div>

        <div id="classement-casse-tete">
            <h2>classement concours casse-tête</h2>
            <ul id="classement">
                <?php foreach ($bestCasseTetePlayers as $player): ?>
                    <li><?= htmlspecialchars($player['username']) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </main>

    <footer>BriseTête © 2025</footer>
    <script src="js/connexion.js"></script>

</body>

</html>
