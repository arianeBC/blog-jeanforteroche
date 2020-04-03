<?php 
require_once("config.php");
include( ROOT_PATH . "/models/post.php");
include( ROOT_PATH . "/models/comment.php");
require_once( ROOT_PATH . "/includes/head_section.php");
include( ROOT_PATH . "/includes/header.php");
include( ROOT_PATH . "/includes/background.php");
$posts = new Post($db);
$comments = new Comment($db)
?>

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

         <?php foreach($posts->getSinglePost($_GET['slug']) as $post) { ?>
         <div class="col-md-11 col-lg-10">
            <div class="card">
               <img src="public/images/<?php echo $post['image']; ?>" alt="Aperçu de l'épisode" class="card-img-top">
               <div class="card-body">
                  <h4 class="card-title"><?php echo $post['title']; ?></h4> 
                  <p class="card-text author-date">
                     <?php echo $post['user_name']; ?><br>
                     <?php echo $post['created_at']; ?><br>
                     <?php 
                        if ($post['updated_at'] !== null) {
                        echo "MISE À JOUR " . $post['updated_at']; 
                        }
                     ?>
                  </p>
                  <p class="card-text"><?php echo htmlspecialchars_decode( $post['content'] ); ?></p>
               </div>
         <?php } ?>

                  <h4 class="card-title comment-title">Commentaires (<?php echo $comments->countComments($_GET['slug']); ?>)</h4>

         <?php foreach($comments->getCommentBySlug($_GET['slug']) as $comment) { ?>
                  <div class="media comment-section">
                     <div class="media-left media-top">
                        <img class="avatar-img" src="public/images/avatar.png">
                     </div>
                     <div class="media-body comment-body">
                        <form action="" method="POST">
                           <input type="hidden" name="approveId" value="<?php echo $comment['id_comment']; ?>">
                           <strong><?php echo $comment['name']; ?></strong>
                           <p><?php echo $comment['comment']; ?></p> 
                           <span class="comment-date float-right"><?php echo "Publié le ". $comment['published_at']; ?></span>
                           <a href="#"><button type="submit" title="Signaler ce commentaire" name="commentFlag" class="btn float-left comment-flag"><i class="far fa-flag"></i></button></a>
                        </form>
                     </div>
                  </div> 
         <?php } ?>

         <?php if(isset($_POST['commentFlag'])) {
            if(isset($_POST['commentFlag'])) {
               $result = $comments->updateComment($_POST['approveId']);
               if($result == TRUE) {
                  echo "<div class='text-center alert alert-success'>Vous avez signalé ce commentaire.</div>";
               }
            }
         }
         if(isset($_POST['btnComment'])) {
            if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['comment'])) {
               $published_at = date("Y-m-d");
               $status = 1;
               $result = $comments->comment(strip_tags($_POST['name']), strip_tags($_POST['email']), strip_tags($_POST['comment']), $published_at, $_GET['slug'], $status);
               if ($result == TRUE) {
                  echo "<div class='text-center alert alert-success'>Votre commentaire à été ajouté</div>";
               }
            } else {
               echo "<div class='text-center alert alert-danger'>Votre commentaire n'a pas pu être ajouté. Vérifiez que tous les champs soient remplis.</div>";
            }
         }
         ?>

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
   </div>
</section>

<?php 
include( ROOT_PATH . "/includes/social-icons-sm.php");
include( ROOT_PATH . "/includes/footer.php") 
?>