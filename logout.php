<?php
// Démarrez la session
session_start();

// Détruisez la session
session_destroy();

// Redirigez l'utilisateur après la déconnexion
header("Location: login.php");
exit();
?>
