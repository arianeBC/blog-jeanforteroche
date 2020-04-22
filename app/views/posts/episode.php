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
                  </div>

                  <h4 class="card-title comment-title">Commentaires (<?php echo $data['count']; ?>)</h4>
                  <?php flash("comment_added"); ?>
                  <?php flash("comment_flag"); ?>
                  <?php foreach($data['comments'] as $comment) : ?>
                  <div class="media comment-section">
                     <div class="media-left media-top">
                        <img class="avatar-img" src="<?php echo URLROOT; ?>/images/avatar.png">
                     </div>
                     <div class="media-body comment-body">
                        <form action="" method="POST">
                           <input type="hidden" name="approveId" value="<?php echo $comment->id_comment; ?>">
                           <strong><?php echo $comment->name; ?></strong>
                           <p><?php echo $comment->comment; ?></p> 
                           <span class="comment-date float-right">Publié le <?php echo $comment->published_at; ?></span>
                           <button type="submit" title="Signaler ce commentaire" name="commentFlag" class="btn float-left comment-flag"><i class="far fa-flag"></i></button>
                        </form>
                     </div>
                  </div>
                  <?php endforeach; ?>
                  <h5 class="card-title comment-title">Votre commentaire :</h5>
                  <div class="col-xl-6">
                     <form class="comment-form" action="<?php echo URLROOT; ?>/posts/episode/<?php echo $data['id_post']; ?>" method="post">

                        <div class="form-group">
                           <label for="name">Nom : <sup>*</sup></label>
                           <input type="text" name="name" class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
                           <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                        </div>
                        <div class="form-group">
                           <label for="email">Email : <sup>*</sup></label>
                           <input type="email" name="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                           <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                        </div>
                        <div class="form-group">
                           <label for="comment">Commentaire : <sup>*</sup></label>
                           <textarea name="comment" maxlength="516" class="form-control <?php echo (!empty($data['comment_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['comment']; ?></textarea>
                           <span class="invalid-feedback"><?php echo $data['comment_err']; ?></span>
                        </div>
                        <div class="form-group">
                           <button type="submit" name="btnComment" class="btn btn-outline-secondary float-right btn-comment"><i class="far fa-comment-alt"></i>Publier</button>
                        </div>

                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <div class="connect">
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
   </div>
<?php require APPROOT . "/views/inc/footer.php"; ?>