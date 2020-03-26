<?php 
require_once("config.php");
require_once( ROOT_PATH . "/includes/head_section.php");
include( ROOT_PATH . "/models/post.php");
include( ROOT_PATH . "/models/comment.php");
?>
   <title>Jean Forteroche – Auteur de "Billet simple pour l'Alaska"</title>
</head>

<body>

   <?php 
   include( ROOT_PATH . "/includes/header.php");
   include( ROOT_PATH . "/includes/background.php");
   ?>

   <?php 
   $posts = new Post($db); 
   $comments = new Comment($db);
   ?>

      <section id="episode">
         <div class="container-fluid padding">
            <div class="row welcome text-center">
               <div class="col-12">
                  <h1 class="display-4">Billet simple pour l'Alaska</h1>
               </div>
            </div>
         </div>

         <div class="container-fluid padding">
         <?php 
         foreach($posts->getSinglePost($_GET['slug']) as $post) { ?>

            <div class="row padding justify-content-center">
               <div class="col-md-11 col-lg-10">
                  <div class="card page">
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
         <?php } ?>
         <?php 
         if(isset($_POST['btnComment'])) {
            $published_at = date("Y-m-d");
            $comments->comment($_POST['name'], $_POST['email'], $_POST['comment'], $published_at, $_GET['slug']);
         }
         ?>
                        <h4 class="card-title comment-section">Commentaires</h4>
                        <form class="comment-form" action="" method="POST">
                              <div class="col-xl-6">
                                 <div class="form-group">
                                    <label for="name">Nom</label>
                                    <input type="text" name="name" class="form-control" required>
                                 </div>
                                 <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                 </div>
                                 <div class="form-group">
                                    <label for="comment">Commentaire</label>
                                    <textarea name="comment" class="form-control" required></textarea>
                                 </div>
                                 <div class="form-group">
                                    <button type="submit" name="btnComment" class="btn btn-outline-secondary float-right"><i class="far fa-comment-alt"></i>Commenter</button>
                                 </div>
                              </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>


         </div>
      </section>

      <?php include( ROOT_PATH . "/includes/social-icons-sm.php") ?>
      <?php include( ROOT_PATH . "/includes/footer.php") ?>

</body>

</html>