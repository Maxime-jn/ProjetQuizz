<?php
require_once 'php/base/database.php';
require_once 'php/GlobalFunction/functions.php';

$idUser = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;
if (!$idUser) {
    header('Location: formConnexion.php');
    exit();
}
$concours = getConcoursByUser($idUser);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mes concours</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/hub.css">
</head>

<body>
    <header>
        <div>
            <a href="index.php">
                <h1>BriseTête</h1>
            </a>
        </div>
        <div id="myConcours"></div>

        <div id="auth-buttons"></div>
    </header>
    <main>
        <h2>Mes concours</h2>
        <ul>
            <?php if ($concours && count($concours) > 0): ?>
            <?php foreach ($concours as $c): ?>
            <li>
                <?= htmlspecialchars($c['nom']) ?>
                <span style="margin-left:1em;color:#aaa;">[<?= $c['typeConcour'] == 1 ? 'Quiz' : 'Casse-tête' ?>]</span>
                <a href="hubConcours.php?idConcours=<?= $c['idConcours'] ?>">
                    <button>Accéder</button>
                </a>
            </li>
            <?php endforeach; ?>
            <?php else: ?>
            <li>Vous n'avez rejoint aucun concours.</li>
            <?php endif; ?>
        </ul>
    </main>
    <footer>BriseTête © 2025</footer>
    <script src="js/connexion.js"></script>
    <script src="js/toMyConcours.js"></script>
</body>

</html>