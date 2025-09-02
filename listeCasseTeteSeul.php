<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BriseTête - Liste des Casse-têtes</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/CasseTete.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
    <style>
    body {
        background-color: #121212;
        color: #ffffff;
        text-align: center;
    }
    .grid-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh;
    }
    .grid-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 15px;
        padding: 20px;
        background-color: #1a1a1a;
        border: 5px solid #00ffea;
        border-radius: 15px;
        box-shadow: 6px 6px 20px rgba(0, 255, 234, 0.5);
        max-width: 500px;
    }
    .tile {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 140px;
        height: 70px;
        background: linear-gradient(135deg, #00ffea, #007f8a);
        color: white;
        border-radius: 10px;
        font-size: 1.2rem;
        text-decoration: none;
        font-weight: bold;
        box-shadow: 4px 4px 10px rgba(0, 255, 234, 0.3);
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .tile:hover {
        transform: scale(1.1);
        box-shadow: 6px 6px 15px rgba(0, 255, 234, 0.5);
    }
    header h1 {
        font-size: 2.5rem;
        color: #00ffea;
        text-shadow: 2px 2px 8px rgba(0, 255, 234, 0.5);
    }
    </style>
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
        <h2>Choisissez un niveau de casse-tête</h2>
        <div class="grid-wrapper">
            <div class="grid-container">
                <?php
                // Mets ici tes niveaux Move the Box
                $mesNiveauxBox = [
                    ["num" => 1, "titre" => "Niveau 1"],
                    ["num" => 2, "titre" => "Niveau 2"],
                    ["num" => 3, "titre" => "Niveau 3"],
                    ["num" => 4, "titre" => "Niveau 4"],
                    ["num" => 5, "titre" => "Niveau 5"],
                    ["num" => 6, "titre" => "Niveau 6"],
                    ["num" => 7, "titre" => "Niveau 7"],
                    ["num" => 8, "titre" => "Niveau 8"],
                    ["num" => 9, "titre" => "Niveau 9"],
                    ["num" => 10, "titre" => "Niveau 10"],
                    ["num" => 11, "titre" => "Niveau 11"],
                    ["num" => 12, "titre" => "Niveau 12"],
                    ["num" => 13, "titre" => "Niveau 13"],
                    ["num" => 14, "titre" => "Niveau 14"],
                    ["num" => 15, "titre" => "Niveau 15"],
                    ["num" => 16, "titre" => "Niveau 16"],
                    ["num" => 17, "titre" => "Niveau 17"],
                    ["num" => 18, "titre" => "Niveau 18"],
                    ["num" => 19, "titre" => "Niveau 19"],
                    ["num" => 20, "titre" => "Niveau 20"],
                    ["num" => 21, "titre" => "Niveau 21"],
                    // ["num" => 5, "titre" => "Niveau 5 – Ton super niveau"],
                    // etc...
                ];
                foreach ($mesNiveauxBox as $niveau): ?>
                    <a href="pageCasseTete.php?niveau=<?= $niveau['num'] ?>" class="tile"><?= htmlspecialchars($niveau['titre']) ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
    <footer>BriseTête © 2025</footer>
    <script src="js/connexion.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const userId = localStorage.getItem('user_id');
        document.querySelectorAll('a[href="mesConcours.php"]').forEach(link => {
            if (userId) link.href = 'mesConcours.php?user_id=' + encodeURIComponent(userId);
        });
    });
    </script>
    <script src="js/toMyConcours.js"></script>
</body>
</html>
