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
        <div class="header-left">BriseTête</div>
        <div class="header-right">connexion</div>
    </header>
    <main>
        <div class="login-container">
            <div class="tabs">
                <a href="formConnexion.php"><button class="active-tab">Connexion</button></a>
                <button>Inscription</button>
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
