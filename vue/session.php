<?php
session_start();

// Vérifiez si l'utilisateur n'est pas authentifié
if (!isset($_SESSION["utilisateur_id"])) {
    header("Location: connexion.php"); // Redirigez les utilisateurs non authentifiés vers la page de connexion
    exit();
}
?>
