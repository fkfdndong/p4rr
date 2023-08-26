<?php

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion_stock_dclik";
// Connexion à la base de données (à modifier comme dans process.php)
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Récupération de l'ID de l'article à éditer
$id = $_GET['id'];

// Récupération des données de l'article
$sql = "SELECT * FROM articles WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Traitement de la soumission du formulaire de mise à jour
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nouveaunom = $_POST['nouveau_nom'];
    $nouveauquantite = $_POST['nouveau_quantite'];
    $nouveauprix = $_POST['nouveau_prix'];
    
    // Mise à jour des données dans la base de données
    $sql_update = "UPDATE articles SET nom = '$nouveaunom', quantite = '$nouveauquantite', prix_unitaire = $nouveauprix WHERE id = $id";
    if ($conn->query($sql_update) === TRUE) {
        echo "Article mis à jour avec succès.";
        $row['nom'] = $nouveaunom; // Mettre à jour la valeur affichée dans la page
        $row['quantite'] = $nouveauquantite; // Mettre à jour la valeur affichée dans la page
        $row['prix_unitaire'] = $nouveauprix; // Mettre à jour la valeur affichée dans la page
    } else {
        echo "Erreur : " . $sql_update . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../plublic/CSS/style.css" />
    <!-- Boxicons CDN Link -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
        <i class="bx bxl-c-plus-plus"></i>
        <span class="logo_name">D-CLIC</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="index.html" class="active">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Ajouter un article</span>
          </a>
        </li>
        <li>
          <a href="affichage_article.php">
            <i class="bx bx-box"></i>
            <span class="links_name">Article</span>
          </a>
        </li>
       
        </li>
        <li>
          <a href="inscription.html">
            <i class="bx bx-coin-stack"></i>
            <span class="links_name">Inscription</span>
          </a>
        </li>
       
          
        <li>
          <a href="connexion.html">
            <i class="bx bx-coin-stack"></i>
            <span class="links_name">Connexion</span>
          </a>
        </li>

        <li>
          <a href="#">
            <i class="bx bx-user"></i>
            <span class="links_name">Utilisateur</span>
          </a>
        </li>
        <!-- <li>
          <a href="#">
            <i class="bx bx-message" ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-heart" ></i>
            <span class="links_name">Favrorites</span>
          </a>
        </li> -->
        <li>
          <a href="deconnexion.php">
            <i class="bx bx-cog"></i>
            <span class="links_name">Configuration</span>
          </a>
        </li>
        <li class="log_out">
          <a href="deconnexion.php">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Déconnexion</span>
          </a>
        </li>
      </ul>
    </div>
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Dashboard</span>
        </div>
        <div class="search-box">
          <input type="text" placeholder="Recherche..." />
          <i class="bx bx-search"></i>
        </div>
        <div class="profile-details">
          <!--<img src="images/profile.jpg" alt="">-->
          <span class="admin_name">Komche</span>
          <i class="bx bx-chevron-down"></i>
        </div>
      </nav>
 
<body>
<div class="home-content">
          <h1>Éditer l'article</h1>
        <div class="overview-boxes">
           
            <div class="box">
    
    <form action="" method="post">
        <label for="nouveau_nom">Nouveau nom :</label> <br> 
        <input type="text" name="nouveau_nom" value="<?php echo $row['nom']; ?>" required><br> <br> 
        
        <label for="nouveau_quantite">Quantite :</label> <br> 
        <input type="number" name="nouveau_quantite" value="<?php echo $row['quantite']; ?>" required><br> <br>
       
        <label for="nouveau_quantite">Prix :</label> <br> 
        <input type="number" name="nouveau_prix" value="<?php echo $row['prix_unitaire']; ?>" required><br> <br> 
        
        
        <input type="submit" value="Mettre à jour">
    </form>
    </div>
    </div>
    </div>
</body>
</html>
