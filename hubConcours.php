<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BriseTête - Hub de Compétition</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Style pour la page hubConcours.php */
        .competition-container {
            width: 100%;
            height: 100%;   
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-around;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .player-list,
        .ranking {
            background: linear-gradient(145deg, #3b004d, #610080);
            padding: 50px;
            border-radius: 50px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 0 15px rgba(128, 0, 255, 0.5), 0 0 25px rgba(255, 0, 255, 0.7);
            border: 4px solid #ff00ff;
            margin-bottom: 20px;
        }

        .player-list h2,
        .ranking h2 {
            font-size: 24px;
            font-weight: bold;
            color: #ffb3ff;
            text-shadow: 1px 1px 2px rgba(255, 182, 255, 0.8);
        }

        .player-list ul,
        .ranking ul {
            list-style: none;
            padding: 0;
        }

        .player-list li,
        .ranking li {
            margin: 10px 0;
        }

        .player-list input,
        .ranking input {
            width: 100%;
            padding: 15px;
            border: 2px solid #ff00ff;
            background: linear-gradient(145deg, #3a003e, #580064);
            color: white;
            font-family: 'Press Start 2P', cursive;
            text-align: center;
            font-size: 1rem;
            border-radius: 25px;
            transition: transform 0.3s ease, background 0.3s ease;
            box-shadow: 0 0 10px rgba(128, 0, 255, 0.5);
        }

        .player-list input:focus,
        .ranking input:focus {
            transform: scale(1.05);
            background: linear-gradient(145deg, #580064, #9100b2);
            box-shadow: 0 0 15px rgba(128, 0, 255, 0.7);
        }

        .participate button {
            width: 100%;
            font-size: 18px;
            cursor: pointer;
            margin-top: 20px;
            font-family: 'Press Start 2P', cursive;
            text-align: center;
            display: inline-block;
            font-weight: bold;
            padding: 15px 0;
            background: linear-gradient(145deg, #e3b8ff, #7744e8, #9e62f5);
            color: #ffffff;
            text-shadow: 2px 2px 5px rgba(255, 255, 255, 0.8), 1px 1px 2px #ffb3ff;
            border-radius: 50px;
            border: 4px solid #ff00ff;
            transition: transform 0.3s ease, background 0.3s ease, filter 0.3s ease;
            filter: drop-shadow(0 0 10px rgba(255, 0, 255, 0.7)) drop-shadow(0 0 20px rgba(128, 0, 255, 0.8));
            position: relative;
        }

        .participate button:hover {
            background: linear-gradient(145deg, #d89eff, #6b29ff);
            transform: scale(1.1);
            filter: drop-shadow(0 0 15px rgba(255, 0, 255, 0.9)) drop-shadow(0 0 25px rgba(128, 0, 255, 1));
        }

        .participate button:active {
            background: linear-gradient(145deg, #a02ae8, #5e009f);
            transform: scale(0.95);
            filter: drop-shadow(0 0 8px rgba(255, 0, 255, 0.6)) drop-shadow(0 0 15px rgba(128, 0, 255, 0.7));
        }
    </style>
</head>

<body>
    <header>
        <div>
            <a href="Accueil.php">
                <h1>BriseTête</h1>
            </a>
        </div>
        <div class="header-right">
            <span>Nb participants : 5 / 10</span>
            <button class="disconnect">Déconnexion</button>
        </div>
        <?php
        session_start();
        if (isset($_SESSION['user_id'])) {
            echo '<div><a href="php/GlobalFunction/logout.php">Déconnexion</a></div>';
        } else {
            echo '<div><a href="formConnexion.php">Connexion</a></div>';
        }
        ?>
    </header>
    <main>
        <div class="competition-container">
            <div class="player-list">
                <h2>Liste joueur</h2>
                <ul>
                    <li><input type="text" placeholder="Joueur 1"></li>
                    <li><input type="text" placeholder="Joueur 2"></li>
                    <li><input type="text" placeholder="Joueur 3"></li>
                    <li><input type="text" placeholder="Joueur 4"></li>
                    <li><input type="text" placeholder="Joueur 5"></li>
                </ul>
            </div>
            <div class="participate">
                <button>Participer</button>
            </div>
            <div class="ranking">
                <h2>Classement</h2>
                <ul>
                    <li><input type="text" placeholder="1er"></li>
                    <li><input type="text" placeholder="2e"></li>
                    <li><input type="text" placeholder="3e"></li>
                    <li><input type="text" placeholder="4e"></li>
                    <li><input type="text" placeholder="5e"></li>
                </ul>
            </div>
        </div>
    </main>
    <footer>BriseTête © 2025</footer>

</body>

</html>