<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BriseTête</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #f1f1f1;
            border-bottom: 1px solid #ccc;
        }
        header h1 {
            margin: 0;
        }
        header a {
            text-decoration: none;
            color: #000;
        }
        main {
            display: flex;
            flex: 1;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .content button {
            margin: 10px;
            padding: 20px;
            font-size: 18px;
            cursor: pointer;
        }
        footer {
            padding: 10px;
            background-color: #f1f1f1;
            border-top: 1px solid #ccc;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>BriseTête</h1>
        <a href="">connexion</a>
    </header>
    <main>
        <div class="content">
            <button>Impossible</button>
            <button>Difficile</button>
            <button>Moyen</button>
            <button>Facile</button>
        </div>
    </main>
    <footer>
        Footer
    </footer>
</body>
</html>
