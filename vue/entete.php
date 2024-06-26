<?php
include_once '../model/function.php';
?>

<!DOCTYPE html>
<head>
<?php
if(isset($_GET['theme']) && $_GET['theme'] == 'dark') {
  setcookie('theme', 'dark', time() + (86400 * 30), "/"); // 30 jours
} elseif(isset($_GET['theme']) && $_GET['theme'] == 'light') {
  setcookie('theme', 'light', time() + (86400 * 30), "/"); // 30 jours
}
// Par défaut, le thème est clair
$themeClass = 'theme-light';

// Vérifier s'il y a un paramètre de requête 'theme' défini
if(isset($_COOKIE['theme']) && $_COOKIE['theme'] == 'dark') {
  $themeClass = 'dark-mode';
}
// Appliquer la classe de thème au corps du document
echo '<body class="' . $themeClass . '">';

// Reste du code HTML...
?>


    <meta charset="UTF-8" />
    <title>
        <?php
        echo ucfirst(str_replace(".php", "", basename($_SERVER['PHP_SELF'])));
        ?>
    </title>
    <link rel="stylesheet" href="../public/css/style.css" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
      .sidebar {
  position: fixed;
  height: 100%;
  width: 240px;
  background: #130161;
  transition: all 0.5s ease;
}
.sidebar.active {
  width: 60px;
}
.logo-container {
   
    margin-top: 20px; /* Add some space from the top */
}

.logo-details {
  
    width: 100px; /* Set the width of the image (adjust as needed) */
    height: 440px; /* Set the height to maintain aspect ratio */
    border-radius: 40%; /* Ensure it's a circle */
    
   
}
.sidebar .logo-details .logo_name {
  color: #ffffff;
  font-size: 64px;
  font-weight: 500;
}
.sidebar .nav-links {
  margin-top: 10px;

}
.sidebar .nav-links li {
  position: relative;
  list-style: none;
  height: 50px;
}
.sidebar .nav-links li a {
  height: 100%;
  width: 100%;
  display: flex;
  align-items: center;
  text-decoration: none;
  transition: all 0.4s ease;
}
.sidebar .nav-links li a.active {
  background: #1e023d;
}
.sidebar .nav-links li a:hover {
  background: #1e023d;
}
.sidebar .nav-links li i {
  min-width: 60px;
  text-align: center;
  font-size: 18px;
  color: #fff;
}
.sidebar .nav-links li a .links_name {
  color: #fff;
  font-size: 15px;
  font-weight: 400;
  white-space: nowrap;
}
.sidebar .nav-links .log_out {
  position: absolute;
  bottom: 0;
  width: 100%;
}
.home-section {
  position: relative;
  background: #f5f5f5;
  min-height: 100vh;
  width: calc(100% - 240px);
  left: 240px;
  transition: all 0.5s ease;
}
.sidebar.active ~ .home-section {
  width: calc(100% - 60px);
  left: 60px;
}
.home-section nav {
  display: flex;
  justify-content: space-between;
  height: 80px;
  background: #fff;
  display: flex;
  align-items: center;
  position: fixed;
  width: calc(100% - 240px);
  left: 240px;
  z-index: 100;
  padding: 0 20px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  transition: all 0.5s ease;
}
.sidebar.active ~ .home-section nav {
  left: 60px;
  width: calc(100% - 60px);
}
.home-section nav .sidebar-button {
  display: flex;
  align-items: center;
  font-size: 24px;
  font-weight: 500;
}
nav .sidebar-button i {
  font-size: 35px;
  margin-right: 10px;
}
.home-section nav .search-box {
  position: relative;
  height: 50px;
  max-width: 350px;
  width: 100%;
  margin: 0 20px;
}
nav .search-box input {
  height: 100%;
  width: 100%;
  outline: none;
  background: #f5f6fa;
  border: 2px solid #efeef1;
  border-radius: 6px;
  font-size: 18px;
  padding: 0 15px;
}
nav .search-box .bx-search {
  position: absolute;
  height: 40px;
  width: 40px;
  background: #2697ff;
  right: 5px;
  top: 50%;
  transform: translateY(-50%);
  border-radius: 4px;
  line-height: 40px;
  text-align: center;
  color: #fff;
  font-size: 22px;
  transition: all 0.4 ease;
}
.home-section nav .profile-details {
  display: flex;
  align-items: center;
  background: #f5f6fa;
  border: 2px solid #efeef1;
  border-radius: 6px;
  height: 50px;
  min-width: 190px;
  padding: 0 15px 0 2px;
}
nav .profile-details img {
  height: 40px;
  width: 40px;
  border-radius: 6px;
  object-fit: cover;
}
nav .profile-details .admin_name {
  font-size: 15px;
  font-weight: 500;
  color: #333;
  margin: 0 10px;
  white-space: nowrap;
}
nav .profile-details i {
  font-size: 25px;
  color: #333;
}
.home-section .home-content {
  position: relative;
  padding-top: 104px;
}
.home-content .overview-boxes {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  flex-wrap: nowrap;
  padding: 0 20px;
  margin-bottom: 26px;
}
.overview-boxes .box {
  display: flex;
  align-items: center;
  justify-content: center;
  /* min-width: calc(100% / 4 - 15px); */
  background: #fff;
  padding: 15px 14px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  margin: 5px;
}
.overview-boxes .box-topic {
  font-size: 20px;
  font-weight: 500;
}
.home-content .box .number {
  display: inline-block;
  font-size: 35px;
  margin-top: -6px;
  font-weight: 500;
}
.home-content .box .indicator {
  display: flex;
  align-items: center;
}
.home-content .box .indicator i {
  height: 20px;
  width: 20px;
  background: #8fdacb;
  line-height: 20px;
  text-align: center;
  border-radius: 50%;
  color: #fff;
  font-size: 20px;
  margin-right: 5px;
}
.box .indicator i.down {
  background: #e87d88;
}
.home-content .box .indicator .text {
  font-size: 12px;
}
.home-content .box .cart {
  display: inline-block;
  font-size: 32px;
  height: 50px;
  width: 50px;
  background: #cce5ff;
  line-height: 50px;
  text-align: center;
  color: #66b0ff;
  border-radius: 12px;
  margin: -15px 0 0 6px;
}
.home-content .box .cart.two {
  color: #2bd47d;
  background: #c0f2d8;
}
.home-content .box .cart.three {
  color: #ffc233;
  background: #ffe8b3;
}
.home-content .box .cart.four {
  color: #e05260;
  background: #f7d4d7;
}
.home-content .total-order {
  font-size: 20px;
  font-weight: 500;
}
.home-content .sales-boxes {
  display: flex;
  justify-content: space-between;
  /* padding: 0 20px; */
}

/* left box */
.home-content .sales-boxes .recent-sales {
  width: 65%;
  background: #fff;
  padding: 20px 30px;
  margin: 0 20px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}
.home-content .sales-boxes .sales-details {
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.sales-boxes .box .title {
  font-size: 24px;
  font-weight: 500;
  /* margin-bottom: 10px; */
}
.sales-boxes .sales-details li.topic {
  font-size: 20px;
  font-weight: 500;
}
.sales-boxes .sales-details li {
  list-style: none;
  margin: 8px 0;
}
.sales-boxes .sales-details li a {
  font-size: 18px;
  color: #333;
  font-size: 400;
  text-decoration: none;
}
.sales-boxes .box .button {
  width: 100%;
  display: flex;
  justify-content: flex-end;
}
.sales-boxes .box .button a {
  color: #fff;
  background: #0a2558;
  padding: 4px 12px;
  font-size: 15px;
  font-weight: 400;
  border-radius: 4px;
  text-decoration: none;
  transition: all 0.3s ease;
}
.sales-boxes .box .button a:hover {
  background: #0d3073;
}

/* Right box */
.home-content .sales-boxes .top-sales {
  width: 35%;
  background: #fff;
  padding: 20px 30px;
  margin: 0 20px 0 0;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}
.sales-boxes .top-sales li {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin: 10px 0;
}
.sales-boxes .top-sales li a img {
  height: 40px;
  width: 40px;
  object-fit: cover;
  border-radius: 12px;
  margin-right: 10px;
  background: #333;
}
.sales-boxes .top-sales li a {
  display: flex;
  align-items: center;
  text-decoration: none;
}
.sales-boxes .top-sales li .product,
.price {
  font-size: 17px;
  font-weight: 400;
  color: #333;
}
/* Responsive Media Query */
@media (max-width: 1240px) {
  .sidebar {
    width: 60px;
  }
  .sidebar.active {
    width: 220px;
  }
  .home-section {
    width: calc(100% - 60px);
    left: 60px;
  }
  .sidebar.active ~ .home-section {
    /* width: calc(100% - 220px); */
    overflow: hidden;
    left: 220px;
  }
  .home-section nav {
    width: calc(100% - 60px);
    left: 60px;
  }
  .sidebar.active ~ .home-section nav {
    width: calc(100% - 220px);
    left: 220px;
  }
}
@media (max-width: 1150px) {
  .home-content .sales-boxes {
    flex-direction: column;
  }
  .home-content .sales-boxes .box {
    width: 100%;
    overflow-x: scroll;
    margin-bottom: 30px;
  }
  .home-content .sales-boxes .top-sales {
    margin: 0;
  }
}
@media (max-width: 1000px) {
  .overview-boxes .box {
    width: calc(100% / 2 - 15px);
    margin-bottom: 15px;
  }
}
@media (max-width: 700px) {
  nav .sidebar-button .dashboard,
  nav .profile-details .admin_name,
  nav .profile-details i {
    display: none;
  }
  .home-section nav .profile-details {
    height: 50px;
    min-width: 40px;
  }
  .home-content .sales-boxes .sales-details {
    width: 560px;
  }
}
@media (max-width: 550px) {
  .overview-boxes .box {
    width: 100%;
    margin-bottom: 15px;
  }
  .sidebar.active ~ .home-section nav .profile-details {
    display: none;
  }
}
@media (max-width: 400px) {
  .sidebar {
    width: 0;
  }
  .sidebar.active {
    width: 60px;
  }
  .home-section {
    width: 100%;
    left: 0;
  }
  .sidebar.active ~ .home-section {
    left: 60px;
    width: calc(100% - 60px);
  }
  .home-section nav {
    width: 100%;
    left: 0;
  }
  .sidebar.active ~ .home-section nav {
    left: 60px;
    width: calc(100% - 60px);
  }
}

/* INPUT */
input,
textarea,
select {
  margin-bottom: 10px;
  box-sizing: border-box;
  width: 100%;
  margin: 8px 0;
  padding: 8px 5px;
  border-radius: 5px;
  border: 1px solid #ccc;
}

.radio {
  margin-bottom: 10px;
  width: 20px;
}

button {
  background-color: rgb(6, 183, 233);
  color: white;
  width: 150px;
  height: 30px;
  border: 1px solid #ccc;
  font-size: 15px;
  border-radius: 5px;
}

label {
  display: block;
}

form {
  width: 100%;
}

/* Alert */

.alert {
  margin: 10px;
  padding: 15px;
  color: white;
  border-radius: 10px;
}

.alert.danger {
  background-color: #f44336;
}

.alert.success {
  background-color: #25da7c;
}

.alert.warning {
  background-color: #e69e2b;
}

/* Style Table  */

/* table */
table.mtable {
  width: 100%;
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
}

td{text-align: left;
  padding: 16px;
  background: #f2f2f2;
  color:#333
}
th {
  text-align: left;
  padding: 16px;
}

table.mtable tr:nth-child(even) {
  background: #f2f2f2;
}
table.mtable td {
  padding: 10px;
}

/* list */
ul.mtable,
ol.mtable {
  padding: 0;
  margin: 0;
  list-style: none;
}
ul.mtable li,
ol.mtable li {
  padding: 10px;
}
ul.mtable li:nth-child(even),
ol.mtable li:nth-child(even) {
  background: #f2f2f2;
}

/* Reçu */

.cote-a-cote {
  display: flex; justify-content: space-between;
}

/* source http://jsfiddle.net/mturjak/2wk6Q/1949/ */
.page {
  width: 210mm;
  min-height: 297mm;
  padding: 20mm;
  margin: 10mm auto;
  border: 1px #d3d3d3 solid;
  border-radius: 5px;
  background: white;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
  padding: 1cm;
  border: 5px red solid;
  height: 257mm;
  outline: 2cm #ffeaea solid;
}

@media print {
  .hidden-print,
  .hidden-print * {
    display: none !important;
  }
}

@page {
  size: A4;
  margin: 0;
}
@media print {
  html,
  body {
    width: 210mm;
    height: 297mm;
  }
  .hidden-print,
  .hidden-print * {
    display: none !important;
  }
  .page {
    margin: 0;
    border: initial;
    border-radius: initial;
    width: initial;
    min-height: initial;
    box-shadow: initial;
    background: initial;
    page-break-after: always;
  }
}
/* source http://jsfiddle.net/mturjak/2wk6Q/1949/ */

.pagination {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

.pagination a {
  display: inline-block;
  padding: 8px 12px;
  margin-right: 5px;
  background-color: #f5f5f5;
  color: #333;
  border: 1px solid #ddd;
  text-decoration: none;
  transition: background-color 0.3s ease;
}

.pagination a:hover {
  background-color: #ddd;
}

.pagination .active {
  background-color: #333;
  color: #fff;
}
.site-name {
    color: white; /* Set text color to white */
    font-size: 18px;
    padding: 20px 1px;
  margin-right: 5px;
   }
  
/* Styles pour le thème sombre */
/* Styles pour le thème sombre */
.dark-mode {
    background-color: #3c3c3d;
    
}


.dark-mode .sidebar {
    background-color: #1d1d1d;
}

.dark-mode .nav-links li a.active,
.dark-mode .nav-links li a:hover {
    background-color: #272626;
}

.dark-mode .home-section {
    background-color: #272626;
}

.dark-mode nav {
    background-color: #1d1d1d;
    color: #000;
}
.dark-mode .site-name {
    color: #fff; /* Couleur du texte */
    background-color: #1d1d1d; /* Couleur de fond */

}
.dark-mode .hidden-print {
    color: #fff; /* Couleur du texte */
    background-color: #1e023d; /* Couleur de fond */
}

.dark-mode .hidden-print a {
    color: #fff; /* Couleur des liens */
}

.dark-mode .sales-boxes .sales-details li a {
  font-size: 18px;
  color: #fff;
  font-size: 400;
  text-decoration: none;}

.dark-mode .home-content {
    color: #fff; } 

.dark-mode .home-content .sales-boxes .recent-sales {
  width: 65%;
  background: #2e2a3b;
  padding: 20px 30px;
  margin: 0 20px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}

.dark-mode .sales-boxes .box .button a {
  color: #fff;
  background: #0a2558;
  padding: 4px 12px;
  font-size: 15px;
  font-weight: 400;
  border-radius: 4px;
  text-decoration: none;
  transition: all 0.3s ease;
}


/* Right box */
.dark-mode .home-content .sales-boxes .top-sales {
  width: 35%;
  background: #34313b;
  padding: 20px 30px;
  margin: 0 20px 0 0;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}


.dark-mode .sales-boxes .top-sales li .product,
.price {
  font-size: 17px;
  font-weight: 400;
  color: #fff;
}

.dark-mode .overview-boxes .box {
  display: flex;
  align-items: center;
  justify-content: center;
  /* min-width: calc(100% / 4 - 15px); */
  background: #34313b;
  padding: 15px 14px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  margin: 5px; }
  .dark-mode .home-section nav {
  display: flex;
  justify-content: space-between;
  height: 80px;
  background: #1d1d1d;
  display: flex;
  align-items: center;
  position: fixed;
  width: calc(100% - 240px);
  left: 240px;
  z-index: 100;
  padding: 0 20px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  transition: all 0.5s ease;
}
.dark-mode .nav .search-box input {
  height: 100%;
  width: 100%;
  outline: none;
  background: #fff;
  border: 2px solid #efeef1;
  border-radius: 6px;
  font-size: 18px;
  padding: 0 15px;
}



.dark-mode nav .search-box input {
  height: 100%;
  width: 100%;
  outline: none;
  background: #3c3c3d;
  border: 2px solid #efeef1;
  border-radius: 6px;
  font-size: 18px;
  padding: 0 15px;
}


/* Styles pour le thème clair */
.theme-light {
    background-color: #fff;
    color: #333;
}
#searchForm {
    display: inline; /* Pour que le formulaire prenne la taille de son contenu */
}

.search-box {
    position: relative; /* Permet de positionner l'icône de recherche par rapport à son parent */
}

#searchInput {
    padding-right: 30px; /* Espace pour l'icône de recherche */
}

#searchIcon {
    position: absolute; /* Positionne l'icône de recherche de manière absolue */
    right: 5px; /* Ajuste la position horizontale de l'icône */
    top: 50%; /* Positionne l'icône verticalement au milieu */
    transform: translateY(-50%); /* Centre l'icône verticalement */
    cursor: pointer; /* Affiche le curseur de type pointer au survol de l'icône */
}

    </style>
</head>

<body>

    <div class="sidebar">

    <div class="site-name">
   
        
        <!--<img class="logo-details" src="/images/Image1.png" alt="Logo">
                <span class="logo_name"></span> -->
           
       
        <span class="logo_name">	&#8711&#916 STOCK-SENS</span>
    </div>
        <ul class="nav-links">
            <li>
                <a href="dashboard.php" class="<?php echo basename($_SERVER['PHP_SELF'])=="dashboard.php" ? "active" : "" ?> ">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Tableau de bord</span>
                </a>
            </li>
            <li>
                <a href="vente.php" class="<?php echo basename($_SERVER['PHP_SELF'])=="vente.php" ? "active" : "" ?> ">
                    <i class='bx bx-shopping-bag'></i>
                    <span class="links_name">Vente</span>
                </a>
            </li>
            <li>
                <a href="client.php" class="<?php echo basename($_SERVER['PHP_SELF'])=="client.php" ? "active" : "" ?> ">
                    <i class="bx bx-user"></i>
                    <span class="links_name">Client</span>
                </a>
            </li>
            <li>
                <a href="article.php"  class="<?php echo basename($_SERVER['PHP_SELF'])=="article.php" ? "active" : "" ?> ">
                    <i class="bx bx-box"></i>
                    <span class="links_name">Article</span>
                </a>
            </li>
            <li>
                <a href="fournisseur.php"  class="<?php echo basename($_SERVER['PHP_SELF'])=="fournisseur.php" ? "active" : "" ?> ">
                    <i class="bx bx-user"></i>
                    <span class="links_name">Fournisseur</span>
                </a>
            </li>
            <li>
                <a href="commande.php"  class="<?php echo basename($_SERVER['PHP_SELF'])=="commande.php" ? "active" : "" ?> ">
                    <i class="bx bx-list-ul"></i>
                    <span class="links_name">Commandes</span>
                </a>
            </li>
            <li>
                <a href="categorie.php"  class="<?php echo basename($_SERVER['PHP_SELF'])=="categorie.php" ? "active" : "" ?> ">
                    <i class="bx bx-list-ul"></i>
                    <span class="links_name">Catégorie</span>
                </a>
            </li>
            <li>
    <!-- Formulaire de déconnexion -->
    <li>
    <a href="../vue/deconnexion.php" class="<?php echo basename($_SERVER['PHP_SELF']) == "deconnexion.php" ? "active" : "" ?>">
        <i class="bx bx-log-out"></i>
        <span class="links_name">Déconnexion</span>
    </a>
</li>
</li>
            
        
       
            
        </ul>
    </div>
    <section class="home-section">
    
        <nav class="hidden-print">
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
                <span class="dashboard">
                    <?php
                    echo ucfirst(str_replace(".php", "", basename($_SERVER['PHP_SELF'])));
                    ?>
                </span>
            </div>
           
    <!-- Contenu précédent du nav -->

           <form action="redirection.php" method="get">
    <div class="search-box">
        <input type="text" name="query" placeholder="Recherche..." />
        <button type="submit"  class="bx bx-search"></button>
    </div>
</form>
            
  
    <!-- Boutons de changement de thème -->
    
        <!-- Bouton pour activer le thème clair -->
        <a href="?theme=light">Thème Clair</a>
        
        <!-- Bouton pour activer le thème sombre -->
        <a href="?theme=dark">Thème Sombre</a>
    
</nav>


             
             <!-- 
             <form action="resultat_recherche.php" method="GET">
             
        <select name="type">
            <option value="commandes">Commandes</option>
            <option value="ventes">Ventes</option>
            <option value="clients">Clients</option>
            <option value="articles">Articles</option>
            <option value="categories">Catégories</option>
        </select>
         <button type="submit">Rechercher</button>
        <form>
    -->
        </nav>
        
  </body>
 