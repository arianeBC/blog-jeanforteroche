<?php require APPROOT . "/views/inc/header.php"; ?>
   <div class="background">
      <figure>
         <div class="fixed-wrap secondary">
            <div id="fixed-secondary">
            </div>
         </div>
      </figure>
   </div>

   <section id="episode">
      <div class="container-fluid padding">
         <div class="row welcome text-center">
            <div class="col-12">
               <h1 class="display-4">BILLET SIMPLE POUR L'ALASKA</h1>

            </div>
         </div>
      </div>
      <div class="container-fluid padding card-page">
         <div class="row padding justify-content-center">
            <div class="col-md-11 col-lg-10">
            <a href="<?php echo URLROOT; ?>/posts" class="btn btn-outline-secondary btn-sm mb-4"><i class="fa fa-backward"></i> Tableau de bord</a>
               <div class="card">
                  <img src="<?php echo URLROOT; ?>/images/<?php echo $data['post']->image; ?>" alt="Aperçu de l'épisode" class="card-img-top">
                  <div class="card-body">
                     <h4 class="card-title"><?php echo $data['post']->title; ?></h4> 
                     <p class="card-text author-date">
                     <?php echo $data['post']->user_name; ?><br>
                     <?php echo $data['post']->created_at; ?><br>
                     <?php if($data['post']->updated_at ==! null) {
                        echo "Mise à jour le " . $data['post']->updated_at; 
                     }?>
                     </p>
                     <p class="card-text"><?php echo $data['post']->content; ?></p>
                     <?php if($data['post']->id_user == $_SESSION['user_id']) : ?>
                        <hr>
                        <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id_post; ?>" class="btn btn-outline-primary btn-sm float-right">Modifier</a>
                        <form class="pull-right" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id_post; ?>" method="post">
                           <button type="submit" class="btn btn-outline-danger btn-sm float-right">Supprimer</button>
                        </form>
                     <?php endif; ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <div class="connect">
      <div class="container-fluid padding">
         <div class="row text-center padding">
            <div class="col-12 social-small padding">
               <a href="#"><i class="fab fa-facebook"></i></a>
               <a href="#"><i class="fab fa-twitter"></i></a>
               <a href="#"><i class="fab fa-instagram"></i></a>
               <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
         </div>
      </div>
   </div>
<?php require APPROOT . "/views/inc/footer.php"; ?>