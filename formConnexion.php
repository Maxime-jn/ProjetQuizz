<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BriseTête - Connexion</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <div><a href="Accueil.php">BriseTête<a></div>
        <div><a href="formConnexion.php">Connexion</a></div>
    </header>
    <main>
        <div>
            <div>
                <a href="formConnexion.php"><button>Connexion</button></a>
                <a href="formInscription.php"><button>Inscription</button></a>
            </div>
            <form>
                <label for="pseudo">Pseudo</label>
                <input type="text" id="pseudo" name="pseudo" placeholder="Entrez votre pseudo">

                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe">

                <button type="submit" class="login-button">Se connecter</button>
            </form>
        </div>
    </main>
    <footer>
        Footer
    </footer>
</body>

</html>