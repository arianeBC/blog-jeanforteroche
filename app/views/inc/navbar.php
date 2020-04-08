<header>
   <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top"> 
      <div class="container-fluid">
         <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo strtoupper(SITENAME) ;?></a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <?php if(isset($_SESSION['user_id'])) : ?>
               <li class="nav-item">
                  <a href="/posts/add" class="nav-link">Ajouter</a>
               </li>
               <li class="nav-item">
                  <a href="/users/edit" class="nav-link">Modifier</a>
               </li>
               <li class="nav-item">
                  <a href="/users/edit" class="nav-link">Tableau de bord</a>
               </li>
               <li class="nav-item">
                  <a href="/users/logout" class="nav-link">Déconnexion</a>
               </li>
            <?php else : ?>
               <li class="nav-item">
                  <a href="<?php echo URLROOT; ?>" class="nav-link">Accueil</a>
               </li>
               <li class="nav-item">
                  <a href="<?php echo URLROOT; ?>/pages/author" class="nav-link">Auteur</a>
               </li>
               <li class="nav-item">
                  <a href="<?php echo URLROOT; ?>/pages/episodes" class="nav-link">Les épisodes</a>
               </li>
               <li class="nav-item">
                  <a href="/users/register" class="nav-link">S'inscrire</a>
               </li>
               <li class="nav-item navItemConnexion">
                  <a href="/users/login" class="nav-link">Connexion</a>
               </li>
            <?php endif; ?>
            </ul>
         </div>
      </div>
   </nav>
</header>

<?php if(isset($_SESSION['user_id'])) : ?>
<div class="container-fluid padding">
      <div class="row text-right">
         <div class="col-12">
            <p class="dashboard-name">
               <?php 
                  echo "Bienvenue {$_SESSION['user_name']} 📖";
               ?>
            </p>
         </div>
      </div>
   </div>
<?php endif; ?>