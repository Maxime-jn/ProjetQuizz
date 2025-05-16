<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BriseTête - Inscription</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/form.css">
</head>

<body>
    <header>
        <div><a href="index.php">
                <h1>BriseTête</h1>
            </a></div>
        <div id="auth-buttons"></div>
    </header>
    <main id="mainFormInscription">
        <div>
            <div>
                <a href="formConnexion.php"><button>Connexion</button></a>
            </div>
            <form action="php/GlobalFunction/Utilisateur.php" method="post">
                <label for="pseudo">Pseudo</label>
                <input type="text" id="pseudo" name="pseudo" placeholder="Entrez votre pseudo">

                <button type="submit" class="login-button">S'inscrire</button>
            </form>
        </div>
    </main>
    <footer>BriseTête © 2025</footer>
    <script src="js/connexion.js"></script>
</body>

</html>