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
        <div id="auth-buttons"></div>
    </header>
    <main>
        <h2>Choisissez un niveau de casse-tête</h2>
        <div class="grid-wrapper">
            <div class="grid-container">
                <?php for ($i = 1; $i <= 12; $i++): ?>
                    <a href="pageCasseTete.php?niveau=<?= $i ?>" class="tile">Niveau <?= $i ?></a>
                <?php endfor; ?>
            </div>
        </div>
    </main>
    <footer>BriseTête © 2025</footer>
    <script src="js/connexion.js"></script>
</body>

</html>
