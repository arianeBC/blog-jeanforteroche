<?php 
require_once("config.php");
require_once( ROOT_PATH . "/includes/head_section.php");
include( ROOT_PATH . "/models/account.php");
?>
   <title>Jean Forteroche – Auteur de "Billet simple pour l'Alaska"</title>
</head>

<body>

   <?php include( ROOT_PATH . "/includes/header.php"); ?>
   <?php $user = new Account($db); ?>
   <?php 
   if(isset($_POST["btnLogin"])) {
      $user->login($_POST["login"], md5($_POST["pwd"]));
   }
   ?> 

   <section id="login">
      <div class="container-fluid padding login">
         <div class="row padding justify-content-center">
            <div class="col-xl-4 col-lg-6 col-md-8 col-sm-10">
               <h6 class="text-center">ACCÉDEZ À L'ESPACE ADMMINISTRATION</h6>
               <form action="login.php" method="POST">
                  <div class="form-group login">

                     <input type="email" name="login" autocomplete="off" required>
                     <label for="login" class="label-name">
                        <span class="content-name">Identifiant</span>
                     </label>
                  </div>
                  <div class="form-group login">
                     <input type="password" name="pwd" required>
                     <label for="pwd" class="label-name">
                        <span class="content-name">Mot de passe</span>
                     </label>
                  </div>
                  <div class="col-12 text-center">
                     <button name="btnLogin" type="submit" class="btn btn-outline-secondary">Se connecter</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </section>

</body>

</html>