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
    <main>
        <div class="grid-container">
            <div class="tile">1</div>
            <div class="tile">2</div>
            <div class="tile">3</div>
            <div class="tile">4</div>
            <div class="tile">5</div>
            <div class="tile">6</div>
            <div class="tile">7</div>
            <div class="tile">8</div>
            <div class="tile">9</div>
            <div class="tile">10</div>
            <div class="tile">11</div>
            <div class="tile">12</div>
        </div>
    </main>
    <footer>BriseTête © 2025</footer>

</body>
</html>
