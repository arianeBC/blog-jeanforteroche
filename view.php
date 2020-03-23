<?php 
require_once("config.php");
require_once( ROOT_PATH . "/includes/head_section.php");
include( ROOT_PATH . "/models/post.php");
?>
   <title>Jean Forteroche – Auteur de "Billet simple pour l'Alaska"</title>
</head>

<body>

   <?php 
   include( ROOT_PATH . "/includes/header.php");
   include( ROOT_PATH . "/includes/background.php");
   ?>

   <?php 
   $post = new Post($db); 
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
         <?php foreach($post->getSinglePost($_GET["slug"]) as $post) { ?>

            <div class="row padding justify-content-center">
               <div class="col-md-11 col-lg-10">
                  <div class="card page">
                     <img src="public/images/<?php echo $post["image"]; ?>" alt="" class="card-img-top">
                     <div class="card-body">
                        <h4 class="card-title"><?php echo $post["title"]; ?></h4> 
                        <p class="card-text author-date">
                           <?php echo $post["user_name"]; ?><br>
                           <?php echo $post["created_at"]; ?><br>
                           <?php 
                              if ($post["updated_at"] !== null) {
                              echo "MISE À JOUR " . $post["updated_at"]; 
                              }
                           ?>
                        </p>
                        <p class="card-text"><?php echo htmlspecialchars_decode( $post["content"] ); ?></p>
                        <a href="#" class="btn btn-outline-secondary float-right"><i class="far fa-comment-alt"></i>Commenter</a>
                     </div>
                  </div>
               </div>
            </div>

         <?php } ?>
         </div>
      </section>

      <?php include( ROOT_PATH . "/includes/social-icons-sm.php") ?>
      <?php include( ROOT_PATH . "/includes/footer.php") ?>

</body>

</html>