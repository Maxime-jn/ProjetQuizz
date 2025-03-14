<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BriseTête - Création du Concours</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="header-left">BriseTête</div>
        <button class="disconnect">Déconnexion</button>
    </header>
    <main>
        <div class="contest-creation">
            <h1>Création du concours</h1>
            <form>
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="Entrez le nom du concours">
                
                <label for="participants">Nb participant</label>
                <input type="number" id="participants" name="participants" placeholder="Nombre de participants">

                <div class="radio-buttons">
                    <label>
                        <input type="radio" name="visibility" value="public" checked>
                        Public
                    </label>
                    <label>
                        <input type="radio" name="visibility" value="private">
                        Privé
                    </label>
                </div>

                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Entrez le mot de passe">

                <button type="submit" class="create-button">Créer</button>
            </form>
        </div>
    </main>
    <footer>
        Footer
    </footer>
</body>
</html>
