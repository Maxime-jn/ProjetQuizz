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
        <div class="header-left">BriseTête</div>
        <button class="disconnect">Déconnexion</button>
    </header>
    <main>
        <div class="search-container">
            <label for="search">Rechercher</label>
            <input type="text" id="search" name="search" placeholder="Entrez votre recherche">
        </div>
        <div class="join-container">
            <h1>Rejoindre un concours</h1>
            <form>
                <label for="name">Nom du concours</label>
                <input type="text" id="name" name="name" placeholder="Nom du concours">

                <label for="participants">Nb participants</label>
                <input type="number" id="participants" name="participants" placeholder="Nombre de participants">

                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Entrez le mot de passe">

                <button type="submit" class="join-button">Rejoindre</button>
            </form>
        </div>
    </main>
    <footer>
        Footer
    </footer>
</body>
</html>
