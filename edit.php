<?php 
require_once("config.php");
require_once( ROOT_PATH . "/includes/head_section.php");
include( ROOT_PATH . "/models/post.php");
include( ROOT_PATH . "/includes/functions.php");
?>

   <title>Jean Forteroche – Auteur de "Billet simple pour l'Alaska"</title>
</head>

<body>

   <?php include( ROOT_PATH . "/includes/header.php"); ?>

   <?php $posts = new Post($db);

   if(isset($_POST["btnUpdate"])) {
      $updated_at = date("Y-m-d");
      $result = $posts->updatePost($_POST["title"], $_POST["excerpt"], $_POST["content"], $updated_at, $_GET["slug"]);
      if($result == TRUE) {
         echo "<div class='text-center alert alert-success'>Votre épisode à été mis à jour</div>";
      } else {
         echo "<div class='text-center alert alert-danger'>Veuillez réessayer</div>";
      }
   }
   ?>
   
   <div class="container-fluid padding addpost">
      <div class="row padding justify-content-center">

         <?php foreach($posts->getSinglePost($_GET["slug"]) as $post) { ?>

         <div class="col-lg-6 col-md-8">
            <form action="add.php" method="POST" enctype="multipart/form-data">
            <h6 class="text-center">ESPACE ADMMINISTRATION – MODIFIER UN ÉPISODE</h6>
               <div class="card">
                  <div class="card-header">Modifier un épisode</div>
                  <div class="card-body">

                     <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" name="title" class="form-control" maxlength="20" value = "<?php echo $post['title']; ?>"/>
                     </div>

                     <div class="form-group">
                        <label for="excerpt">Résumé</label>
                        <textarea name="excerpt" class="form-control" maxlength="70" ><?php echo $post['excerpt']; ?></textarea>
                     </div>

                     <div class="form-group">
                        <label for="content">Contenu</label>
                        <textarea name="content" id="tiny" class="form-control"><?php echo $post['content']; ?></textarea>
                     </div>

                     <div class="form-group text-center">
                     <hr>
                     <label for="image" class="float-left">Image</label><br>
                     <input type="file" name="image" class="form-control btn-img"/>
                     <img class="img-update" src="public/images/<?php echo $post["image"]; ?>"/>
                     </div>
                     
                     <div class="form-group float-right">
                        <button type="submit" name="btnUpdate" class="btn btn-outline-secondary btn-lg">Mettre à jour</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>

         <?php } ?>
         
      </div>
   </div>