<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BriseTête - Question</title>
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
    <main id="mainQuiz">
        <h1>Question à choix multiple</h1>
        <div id="buttonQuestionQuiz">
            <button>Réponse 1</button>
            <button>Réponse 2</button>
            <button>Réponse 3</button>
            <button>Réponse 4</button>
            <button>Réponse 5</button>
        </div>
        <div>
            <button id="buttonSoumettreQuiz">Soumettre</button>
        </div>
    </main>
    <footer>BriseTête © 2025</footer>

</body>

</html>