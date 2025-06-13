<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BriseTête - Connexion</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/form.css">
</head>

<body>
    <header>
        <div>
            <a href="index.php">
                <h1>BriseTête</h1>
            </a>
        </div>
        <div id="myConcours"></div>
        <div id="auth-buttons"></div>
    </header>
    <main id="mainFormConnexion">
        <div>
            <div>
                <a href="formInscription.php"><button>Inscription</button></a>
            </div>
            <form id="login-form">
                <label for="pseudo">Pseudo</label>
                <input type="text" id="pseudo" name="pseudo" placeholder="Entrez votre pseudo" required>
                <button type="submit" class="login-button">Se connecter</button>
            </form>
        </div>
    </main>
    <footer>BriseTête © 2025</footer>
    <script src="js/connexion.js"></script>
    <script src="js/toMyConcours.js"></script>
</body>

</html>