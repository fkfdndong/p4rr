<?php
session_start();
session_destroy(); // Détruire la session en cours

// Rediriger l'utilisateur vers la page d'accueil ou une autre page après la déconnexion
header("Location: connexion.html");
exit();
?>
