<!-- 

Auteurs :
Jean Maxime Robin
Leart Demiri
Timoléon Hede

Projet : 
BriseTete

Version : 
0.7 BETA

-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BriseTête</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/casseTetes.css">
</head>

<body class="conteneurBackground">

    <header class="barreDeHeader">
        <div class="insideHeaderContainer">
            <div>
                <a href="index.php">
                    <h1>BriseTête</h1>
                </a>
            </div>

            <div id="myConcours"></div>
            <div id="auth-buttons"></div>
        </div>
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
                <a href="pageCasseTete.php?niveau=<?= $niveau['num'] ?>" class="tile">
                    <?= htmlspecialchars($niveau['titre']) ?>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </main>


    <footer class="pageFooter">
        <div class="footerTitre">BriseTête © 2025</div>

        <div class="footerLinks">
            <span>Réalisé par : I.DA.P4A</span>
            <ul>
                <li><a href="https://edu.ge.ch/site/cfpt">CFPT</a></li>
                <li><a href="https://www.ge.ch/conditions-generales">Conditions générales</a></li>
                <li><a href="https://edu.ge.ch/site/cfpt/secretariats-2">Contact</a></li>
            </ul>
        </div>
    </footer>


    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const userId = localStorage.getItem('user_id');
        document.querySelectorAll('a[href="mesConcours.php"]').forEach(link => {
            if (userId) link.href = 'mesConcours.php?user_id=' + encodeURIComponent(userId);
        });
    });
    </script>
    <script src="js/connexion.js"></script>
    <script src="js/toMyConcours.js"></script>
</body>

</html>