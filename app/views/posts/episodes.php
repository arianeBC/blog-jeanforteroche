<?php require APPROOT . "/views/inc/header.php"; ?>

   <section class="background">
      <figure>
         <div class="fixed-wrap secondary">
            <div id="fixed-secondary">
            </div>
         </div>
      </figure>
   </section>

   <section id="episode">
      <div class="container-fluid padding">
         <div class="row welcome text-center">
            <div class="col-12">
               <h1 class="display-4">BILLET SIMPLE POUR L'ALASKA</h1>
            </div>
         </div>
      </div>

      <div class="container-fluid padding card-page">
         <div class="row padding episode-row">
            <?php foreach($data['posts'] as $key => $post) : ?>
            <div class="col-md-4">
               <div class="card style="width: 300px;">
                  <img src="<?php echo URLROOT; ?>/images/<?php echo $post->image; ?>" alt="Aperçu de l'épisode" class="card-img-episodes">
                  <div class="card-body d-flex flex-column">
                     <h4 class="card-title"><?php echo $post->title; ?></h4>
                     <p class="card-text"><?php echo $post->excerpt; ?></p>
                     <a href="<?php echo URLROOT; ?>/posts/episode/<?php echo $post->id_post; ?>" class="btn btn-outline-secondary mt-auto">Lire l'épisode</a>
                  </div>
               </div>
            </div>
            <?php endforeach; ?>
         </div>
      </div>

      <div class="container-fluid padding">
         <div class="row text-center">
            <div class="col-12 text-center">

               <?php echo $data['paging']; ?>
               
            </div>
         </div>
      </div>
   </section>

   <section class="connect">
      <div class="container-fluid padding">
         <div class="row text-center padding">
            <div class="col-12 social-small padding ">
               <a href="#"><i class="fab fa-facebook"></i></a>
               <a href="#"><i class="fab fa-twitter"></i></a>
               <a href="#"><i class="fab fa-instagram"></i></a>
               <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
         </div>
      </div>
   </section>
   
<?php require APPROOT . "/views/inc/footer.php"; ?>