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
    <main id="mainSeul">

        <div id="btnMenuSeul">
            <a href="pageCasseTete.php"><button>
                    <h2>Casse-tête</h2>
                </button></a>
            <a href="pageQuiz.php"><button>
                    <h2>QUIZ</h2>
                </button></a>
        </div>
    </main>
    <footer>BriseTête © 2025</footer>

</body>

</html>