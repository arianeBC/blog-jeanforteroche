<?php require APPROOT . "/views/inc/header.php"; ?>
   <div class="row">
      <div class="col-md-6 mx-auto">
         <div class="card card-body bg-light mt-5">
         <h2>Connexion</h2>
         <p>Veuillez saisir vos identifiants pour vous connecter</p>
         <form action="<?php echo URLROOT; ?>/users/login" method="post">
            <div class="form-group">
               <label for="email">Email : <sup>*</sup></label>
               <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
               <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
            </div>
            <div class="form-group">
               <label for="password">Mot de passe : <sup>*</sup></label>
               <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
               <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
            </div>
            <div class="row">
               <div class="col">
               <input type="submit" value="Se connecter" class="btn btn-success btn-block">
               </div>
               <div class="col">
               <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-light btn-block">Vous n'avez pas de compte? S'inscrire</a>
               </div>
            </div>
         </form>
         </div>
      </div>
   </div>

</body>

</html>