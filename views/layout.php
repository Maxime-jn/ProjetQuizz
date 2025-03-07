<!--
page layout qui va accueillir les vues
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Application') ?></title>
    <link rel="stylesheet" href="/css/style.css"> 
</head>
<body>
    <nav>
        <ul>
            <li><a href="/login">Login</a></li>
            <li><a href="/galerie">Galerie</a></li>
        </ul>
        <ul>
        <?php if (isset($_SESSION['user'])) { ?>
                <li class="boutonDelog"> 
                    <form action="/logout" method="POST">
                        <button type="submit">Déconnexion</button>
                    </form>
                </li>
            <?php } ?>
        </ul>
    </nav>
    <?= $content ?>
</body>
</html>
