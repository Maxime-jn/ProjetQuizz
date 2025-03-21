<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BriseTête</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <div><a href="Accueil.php">
                <h1>BriseTête</h1>
            </a></div>
        <?php
        session_start();
        if (isset($_SESSION['user_id'])) {
            echo '<div><a href="php/GlobalFunction/logout.php">Déconnexion</a></div>';
        } else {
            echo '<div><a href="formConnexion.php">Connexion</a></div>';
        }
        ?>
    </header>

    <main id="accueil">
        <div id="classement-quiz">
            <h2>classement concours quiz</h2>
            <ul id="classement">
                <li>Test1</li>
                <li>Test2</li>
                <li>Test3</li>
                <li>Test4</li>
                <li>Test5</li>
                <li>Test6</li>
                <li>Test7</li>
                <li>Test8</li>
                <li>Test9</li>
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
                <li>Test1</li>
                <li>Test2</li>
                <li>Test3</li>
                <li>Test4</li>
                <li>Test5</li>
                <li>Test6</li>
                <li>Test7</li>
                <li>Test8</li>
                <li>Test9</li>
            </ul>
        </div>
    </main>

    <footer>BriseTête © 2025</footer>

</body>

</html>