<?php

require_once "php/GlobalFunction/functions.php";
require_once "php/base/database.php";
session_start();
$concours = listeConcours();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BriseTête - Rejoindre un concours</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/form.css">
</head>

<body>
    <header>
        <div><a href="index.php">
                <h1>BriseTête</h1>
            </a></div>
        <div id="myConcours"></div>
        <div id="auth-buttons"></div>
    </header>

    <main id="rejoindreConcour">
        <h2>Rejoindre un Concours</h2>
        <div id="message-erreur" style="color:red;"></div>
        <form id="joinConcoursForm">
            <label for="name">Nom du concours</label>
            <select id="name" name="name" required>
                <option value="">Choisissez un concours</option>
                <?php foreach ($concours as $c): 
                    $placesRestantes = max(0, (int)$c['nbParticipantMax'] - (int)$c['nbInscrits']);
                ?>
                <option value="<?= htmlspecialchars($c['nom']) ?>">
                    <?= htmlspecialchars($c['nom']) ?> (<?= $placesRestantes ?> place<?= $placesRestantes > 1 ? 's' : '' ?> restante<?= $placesRestantes > 1 ? 's' : '' ?>)
                </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Rejoindre</button>
        </form>
        <a href="formCreationConcours.php">Créer un concours</a>
    </main>

    <footer>BriseTête © 2025</footer>
    <script src="js/connexion.js"></script>
    <script src="js/Joinconcours.js"></script>
    <script src="js/toMyConcours.js"></script>
</body>

</html>