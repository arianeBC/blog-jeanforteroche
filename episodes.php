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

   <?php $posts = new Post($db); ?>

      <section id="episode">
         <div class="container-fluid padding">
            <div class="row welcome text-center">
               <div class="col-12">
                  <h1 class="display-4">Billet simple pour l'Alaska</h1>
               </div>
            </div>
         </div>

         <div class="container-fluid padding">
            <div class="row padding episode-row">
               <?php foreach($posts->getPost() as $post) { ?>

                  <div class="col-md-4">
                     <div class="card style="width: 300px;">
                        <img src="public/images/<?php echo $post['image']; ?>" alt="Aperçu de l'épisode" class="card-img-top">
                        <div class="card-body d-flex flex-column">
                           <h4 class="card-title"><?php echo $post['title']; ?></h4>
                           <p class="card-text"><?php echo $post['excerpt']; ?></p>
                           <a href="view.php?slug=<?php echo $post['slug']; ?>" class="btn btn-outline-secondary mt-auto">Lire l'épisode</a>
                        </div>
                     </div>
                  </div>

               <?php } ?>
            </div>
         </div>
      </section>

      <?php include( ROOT_PATH . "/includes/social-icons-sm.php") ?>
      <?php include( ROOT_PATH . "/includes/footer.php") ?>

</body>

</html>