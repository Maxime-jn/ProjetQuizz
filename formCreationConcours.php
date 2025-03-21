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

    <main id="creationConcour">
        <h2>Créer un Concours</h2>
        <form action="creerConcours.php" method="POST">
            <label for="name">Nom du concours</label>
            <input type="text" id="name" name="name" required>

            <label for="participants">Nombre de participants</label>
            <input type="number" id="participants" name="participants" required min="1">

            <label>Type</label>
            <div class="radio-group">
                <input type="radio" id="public" name="public" value="1" required>
                <label for="public">Public</label>

                <input type="radio" id="prive" name="public" value="0" required>
                <label for="prive">Privé</label>
            </div>

            <label for="password">Mot de passe (optionnel)</label>
            <input type="password" id="password" name="password">

            <button type="submit">Créer</button>
        </form>

        </main>

        <footer>BriseTête © 2025</footer>
</body>


</html>