<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BriseTête - Inscription</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <div><a href="Accueil.php">BriseTête<a></div>
        <div><a href="formConnexion.php">Connexion</a></div>
    </header>
    <main class="mainFormInscription">
        <div>
            <div>
                <a href="formConnexion.php"><button>Connexion</button></a>
                <a href="formInscription.php"><button>Inscription</button></a>
            </div>
            <form action="php/GlobalFunction/Utilisateur.php" method="post">
                <label for="pseudo">Pseudo</label>
                <input type="text" id="pseudo" name="pseudo" placeholder="Entrez votre pseudo">

                <button type="submit" class="login-button">S'inscrire</button>
            </form>
        </div>
    </main>
    <footer>
        Footer
    </footer>
</body>

</html>
