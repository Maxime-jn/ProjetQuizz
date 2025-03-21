<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création du concours</title>
    <style>
        .header, .footer {
            background-color: #ddd;
            padding: 10px;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 80vh;
        }
        .form-container {
            border: 1px solid #000;
            padding: 20px;
            display: inline-block;
        }
        .form-container input, .form-container select, .form-container button {
            margin: 5px 0;
            padding: 5px;
        }
        .form-container label {
            display: block;
            text-align: left;
        }
        .toggle {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header">
        <span>Brise Tête</span>
        <span>Déconnexion</span>
    </div>
    
    <div class="container">
        <div class="form-container">
            <h2>Création du concours</h2>
            <label for="name">Nom</label>
            <input type="text" id="name" name="name">
            
            <label for="participants">Nb participant</label>
            <input type="number" id="participants" name="participants">
            
            <div class="toggle">
                <label>Public</label>
                <select>
                    <option value="public">public</option>
                    <option value="prive">privé</option>
                </select>
            </div>
            
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password">
            
            <button>Créer</button>
        </div>
    </div>
    
    <div class="footer">Footer</div>
</body>
</html>
