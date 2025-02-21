<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BriseTête</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            justify-content: space-between;
            text-align: center;
        }

        header {
            display: flex;
            justify-content: space-between;
            padding: 10px 20px;
            border-bottom: 1px solid black;
            font-weight: bold;
        }

        main {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .buttons {
            display: flex;
            gap: 20px;
        }

        button {
            border: 1px solid black;
            padding: 15px 30px;
            background: white;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: lightgray;
        }

        footer {
            padding: 10px;
            border-top: 1px solid black;
        }
    </style>
</head>

<body>

    <header>
        <div>BriseTête</div>
        <div>connexion</div>
    </header>

    <main>
        <div class="buttons">
            <button>Casse-tête</button>
            <button>QUIZ</button>
        </div>
    </main>

    <footer>Footer</footer>

</body>

</html>
