




<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifiant = $_POST["identifiant"];
    $motdepasse = $_POST["motdepasse"];

    // Connectez-vous à la base de données (exemple avec MySQLi)
    $mysqli = new mysqli("localhost", "root", "", "gestion_stock_dclik");

    if ($mysqli->connect_error) {
        die("Erreur de connexion à la base de données : " . $mysqli->connect_error);
    }

    // Requête pour récupérer l'utilisateur par son identifiant
    $query = "SELECT id, motdepasse FROM utilisateurs WHERE email = '$identifiant' ";
    $result = $mysqli->query($query);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($motdepasse, $row["motdepasse"])) {
            // Authentification réussie
            session_start();
            $_SESSION["utilisateur_id"] = $row["id"];
            header("Location: tableau_de_bord.php"); // Rediriger vers le tableau de bord
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Identifiant incorrect.";
    }

    $mysqli->close();
}
?>
