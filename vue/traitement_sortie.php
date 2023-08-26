<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion_stock_dclik";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Récupération des données du formulaire
$nom_article = $_POST['nom'];
$quantite = $_POST['quantite'];
$prix_unitaire = $_POST['prix_unitaire'];

// Insertion des données dans la base de données
$sql = "INSERT INTO sorties (nom, quantite, prix_unitaire) VALUES ('$nom_article ', '$quantite', '$prix_unitaire')";
if ($conn->query($sql) === TRUE) {
    echo "Article enregistré avec succès.";
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
