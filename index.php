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
            padding: 20px;
            justify-content: space-between;
        }

        .sidebar {
            width: 20%;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .sidebar h2 {
            margin-top: 0;
        }

        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 1;
        }

        .content button {
            margin: 0 10px;
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
        <a href="#">connexion</a>
    </header>
    <main>
        <div class="sidebar">
            <h2>classement concours quiz</h2>
            <ul>
                <?php 
                
                ?>
            </ul>
        </div>
        <div class="content">
            <button>Seul</button>
            <button>Mode Concour</button>
        </div>
        <div class="sidebar">
            <h2>classement concours casse-tête</h2>
            <ul>
                <?php 
                
                ?>
            </ul>
        </div>
    </main>
    <footer>
        Footer
    </footer>
</body>

</html>