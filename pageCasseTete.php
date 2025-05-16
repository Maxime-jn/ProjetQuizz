<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BriseTête - Casse-tête</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/CasseTete.css">
</head>

<body>
    <header>
        <div><a href="index.php">
                <h1>BriseTête</h1>
            </a></div>
        <div id="auth-buttons"></div>
    </header>
    <main>
        <?php

        // Récupérer le niveau depuis l'URL
        $niveau = isset($_GET['niveau']) ? (int)$_GET['niveau'] : null;

        switch ($niveau) {
            case 1:
                include("jeux/tri_algorithme.html");
                break;
            case 2:
                include("jeux/BoxGame.html");
                break;
            // ...
            default:
                echo "<h2>Niveau invalide</h2>";
                echo "<p>Veuillez sélectionner un niveau valide.</p>";
                break;
        }
        ?>
    </main>
    <footer>BriseTête © 2025</footer>
    <script src="js/connexion.js"></script>
</body>

</html>