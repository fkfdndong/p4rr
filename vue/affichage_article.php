




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
          <a href="tableau_de_bord.php" class="active">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Accueil</span>
          </a>
        </li>
        <li>
          <a href="index.html" class="active">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Ajouter un article</span>
          </a>
        </li>
        <li>
          <a href="affichage_article.php">
            <i class="bx bx-box"></i>
            <span class="links_name"> les articles disponibles</span>
          </a>
        </li>
       
        <li>
          <a href="sortie.html" class="active">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Enregistré une sortie</span>
          </a>
        </li>

        <li>
            <a href="affichage_sortie.php" class="active">
              <i class="bx bx-grid-alt"></i>
              <span class="links_name">les articles sortant</span>
            </a>
        </li>

        <li>
            <a href="quantiite_disponible.php" class="active">
              <i class="bx bx-grid-alt"></i>
              <span class="links_name">verifier la quantiite disponible</span>
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
 

      <div class="home-content">
      <div class="overview-boxes">
     
      <div class="box">
     <table class="mtable">
        <tr>
            <th>ID</th>
            <th>Nom </th>
            <th>Quantite</th>
            <th>Prix unitaire</th>
            <th>Action</th>
        </tr>
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

        // Récupération des articles depuis la base de données
        $sql = "SELECT * FROM articles";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nom'] . "</td>";
                echo "<td>" . $row['quantite'] . "</td>";
                echo "<td>" . $row['prix_unitaire'] . "</td>";
                echo "<td><a href='editer_article.php?id=" . $row['id'] . "'>Éditer</a></td>";
                echo "</tr>";
            }
        } else {
            echo "Aucun article trouvé.";
        }

        $conn->close();
        ?>
    </table>
    </div>
    </div>
</body>
</html>
