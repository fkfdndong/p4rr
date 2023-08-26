<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $motdepasse = $_POST["motdepasse"]; // Hachage du mot de passe

    // Connectez-vous à la base de données (exemple avec MySQLi)
    $mysqli = new mysqli("localhost", "root", "", "gestion_stock_dclik");

    // Vérifiez la connexion à la base de données
    if ($mysqli->connect_error) {
        die("Erreur de connexion à la base de données : " . $mysqli->connect_error);
    }

    // Préparez et exécutez la requête d'insertion
    $query = "INSERT INTO utilisateurs (nom, email, motdepasse) VALUES ('$nom', '$email', '$motdepasse')";

    if ($mysqli->query($query)) {
        echo "Compte créé avec succès !";
    } else {
        echo "Erreur lors de la création du compte : " . $mysqli->error;
    }

    $mysqli->close();
}
?>
