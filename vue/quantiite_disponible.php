<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion_stock_dclik";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $articleNom = $_POST["article_nom"];

    // Requête SQL pour récupérer la quantité de l'article
    $sql = "SELECT quantite FROM articles WHERE nom = '$articleNom'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $quantite = $row["quantite"];
    } else {
        $quantite = "Article non trouvé";
    }
    
    $conn->close();
}
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
            <span class="links_name"> les Articles disponible</span>
          </a>
        </li>
       
        <li>
            <a href="sortie.html" class="active">
              <i class="bx bx-grid-alt"></i>
              <span class="links_name">Enregistrer une sortie</span>
            </a>
          </li>

          <li>
            <a href="affichage_sortie.php" class="active">
              <i class="bx bx-grid-alt"></i>
              <span class="links_name">les articles sortant</span>
            </a>
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
          <span class="dashboard">Ajouter un article</span>
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
      <div class="home-content">
      <h1>Vérification de la Quantité d'Article</h1>
        <div class="overview-boxes">
        <div class="box">

    
    <form method="post" action="">
        <label for="article_nom">Nom de l'article :</label> <br> <br>
        <input type="text" name="article_nom" required><br> <br>
       
        <button type="submit">Vérifier</button>
    </form>

    <?php if(isset($quantite)): ?>
        <p>Quantité de l'article: <?php echo $quantite; ?></p>
    <?php endif; ?>
</body>
</html>
</div>
</div>
</div>