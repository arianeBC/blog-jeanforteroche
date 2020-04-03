<header>
   <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top"> 
      <div class="container-fluid">
         <a class="navbar-brand" href="index.php">JEAN FORTEROCHE</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a href="add.php" class="nav-link">Ajouter</a>
               </li>
               <li class="nav-item">
                  <a href="result.php" class="nav-link">Tableau de bord</a>
               </li>
<?php if(!empty($_SESSION['login'])) { ?> 
               <li class="nav-item navItemConnexion">
                  <a href="logout.php" class="nav-link">Déconnexion</a>
               </li>
<?php } else { ?>
               <li class="nav-item navItemConnexion">
                  <a href="login.php" class="nav-link">Connexion</a>
               </li>
<?php } ?>
            </ul>
         </div>
      </div>
   </nav>
</header>

<div class="container-fluid padding">
   <div class="row text-right">
      <div class="col-12">
         <p class="dashboard-name">
            <?php 
            if(!empty($_SESSION['login'])) {
               echo "Bienvenue {$_SESSION['username']} 📖";
            } else {
               echo "Vous n'êtes pas connecté";
            }
            ?>
         </p>
      </div>
   </div>
</div>