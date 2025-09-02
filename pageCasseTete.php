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
        <div id="myConcours"></div>

        <div id="auth-buttons"></div>
    </header>
    <main>
        <?php

        // Récupérer le niveau depuis l'URL
        $niveau = isset($_GET['niveau']) ? (int) $_GET['niveau'] : null;

        switch ($niveau) {
            case 1:
                include("jeux/MoveBox.html");
                break;
            case 2:
                include("jeux/MoveBox.html");
                break;
            case 3:
                include("jeux/MoveBox.html");
                break;
            case 4:
                include("jeux/MoveBox.html");
                break;
            case 5:
                include("jeux/MoveBox.html");
                break;
            case 6:
                include("jeux/MoveBox.html");
                break;
            case 7:
                include("jeux/MoveBox.html");
                break;
            case 8:
                include("jeux/MoveBox.html");
                break;
            case 9:
                include("jeux/MoveBox.html");
                break;
            case 10:
                include("jeux/MoveBox.html");
                break;
            case 11:
                include("jeux/MoveBox.html");
                break;
            case 12:
                include("jeux/MoveBox.html");
                break;
            case 13:
                include("jeux/MoveBox.html");
                break;
            case 14:
                include("jeux/MoveBox.html");
                break;
            case 15:
                include("jeux/MoveBox.html");
                break;
            case 16:
                include("jeux/MoveBox.html");
                break;
            case 17:
                include("jeux/MoveBox.html");
                break;
            case 18:
                include("jeux/MoveBox.html");
                break;
            case 19:
                include("jeux/MoveBox.html");
                break;
            case 20:
                include("jeux/MoveBox.html");
                break;
            case 21:
                include("jeux/MoveBox.html");
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
    <script src="js/toMyConcours.js"></script>
</body>

</html>