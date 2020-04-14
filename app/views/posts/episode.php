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
         <div class="row padding justify-content-center">
            <div class="col-md-11 col-lg-10">
               <div class="card">
                  <img src="<?php echo URLROOT; ?>/images/<?php echo $data['posts']->image; ?>" alt="Aperçu de l'épisode" class="card-img-top">
                  <div class="card-body">
                     <h4 class="card-title"><?php echo $data['posts']->title; ?></h4> 
                     <p class="card-text author-date">
                     <?php echo $data['posts']->user_name; ?><br>
                     <?php echo $data['posts']->created_at; ?><br>
                     <?php if($data['posts']->updated_at ==! null) {
                        echo "Mise à jour le " . $data['posts']->updated_at; 
                     }?>
                     </p>
                     <p class="card-text"><?php echo $data['posts']->content; ?></p>
                  </div>

                  <h4 class="card-title comment-title">Commentaires (<?php echo $data['count']; ?>)</h4>
                  <?php //flash("comment_message"); ?>
                  <?php foreach($data['comments'] as $comment) : ?>
                  <div class="media comment-section">
                     <div class="media-left media-top">
                        <img class="avatar-img" src="<?php echo URLROOT; ?>/images/avatar.png">
                     </div>
                     <div class="media-body comment-body">
                        <form action="" method="POST">
                           <input type="hidden" name="approveId" value="{{ id-comment }}">
                           <strong><?php echo $comment->name; ?></strong>
                           <p><?php echo $comment->comment; ?></p> 
                           <span class="comment-date float-right">Publié le <?php echo $comment->published_at; ?></span>
                           <a href="#"><button type="submit" title="Signaler ce commentaire" name="commentFlag" class="btn float-left comment-flag"><i class="far fa-flag"></i></button></a>
                        </form>
                     </div>
                  </div>
                  <?php endforeach; ?>
                  <h5 class="card-title comment-title">Votre commentaire :</h5>
                  <form class="comment-form" action="" method="POST">
                     <div class="col-xl-6">
                        <div class="form-group">
                           <label for="name">Nom</label>
                           <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                           <label for="email">Email</label>
                           <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                           <label for="comment">Commentaire</label>
                           <textarea name="comment" class="form-control" maxlength="516"></textarea>
                        </div>
                        <div class="form-group">
                           <button type="submit" name="btnComment" class="btn btn-outline-secondary float-right btn-comment"><i class="far fa-comment-alt"></i>Publier</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>

<?php require APPROOT . "/views/inc/footer.php"; ?>