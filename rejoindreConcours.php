<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BriseTête - Rejoindre un concours</title>
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

    <main id="rejoindreConcour">
        <h2>Rejoindre un Concours</h2>
        <form action="rejoindreConcour.php" method="POST">
            <label for="name">Nom du concours</label>
            <input type="text" id="name" name="name" required>

            <label for="password">Mot de passe (optionnel)</label>
            <input type="password" id="password" name="password">

            <button type="submit">Rejoindre</button>
        </form>
        <a href="formCreationConcours.php">Créer un concours</a>
    </main>

    <footer>BriseTête © 2025</footer>
</body>

</html>