<?php
session_start();

// Vérifie si une session existe avant de la détruire
if (isset($_SESSION['user_id'])) {
    // Détruit toutes les variables de session
    session_unset();
    
    // Détruit la session
    session_destroy();
}

// Redirige l'utilisateur vers la page d'accueil après la déconnexion
header("Location: ../../Accueil.php");
exit();
?>
