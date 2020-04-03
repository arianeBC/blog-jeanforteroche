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
                  <a href="{{ author-or-add-php }}" class="nav-link">{{ page-1 }}</a>
               </li>
               <li class="nav-item">
                  <a href="{{ episode-or-dashboard-php }}" class="nav-link">{{ page-2 }}</a>
               </li>
               <li class="nav-item navItemConnexion">
                  <a href="{{ login-or-logout-php }}" class="nav-link">{{ login-logout }}</a>
               </li>
            </ul>
         </div>
      </div>
   </nav>
</header>