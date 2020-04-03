<?php 
require_once("config.php"); 
include( ROOT_PATH . "/session.php"); 
include( ROOT_PATH . "/models/post.php"); 
include( ROOT_PATH . "/includes/functions.php");
require_once( ROOT_PATH . "/includes/head_section.php");
include( ROOT_PATH . "/includes/header-admin.php"); 
$posts = new Post($db);

if(isset($_POST['btnSubmit'])) {

   if( !empty($_POST['title']) && !empty($_POST['excerpt']) && !empty($_POST['content']) && !empty(uploadImage())) {
      $id_user    = $_SESSION['userid'];
      $title      = strip_tags($_POST['title']);
      $excerpt    = strip_tags($_POST['excerpt']);
      $content    = $_POST['content'];
      $created_at = date("Y-m-d");
      $slug       = createSlug($title);

      $checkSlug = $db->query("SELECT * FROM posts WHERE slug = '$slug'");
      $result    = $checkSlug->num_rows;

      if($result > 0) {
         foreach($checkSlug as $cslug) {
            $newSlug = $slug.uniqid();
         }
         $record = $posts->addPost($newSlug, $id_user, $title, $excerpt, $content, uploadImage(), $created_at);
      } else {
         $record = $posts->addPost($slug, $id_user, $title, $excerpt, $content, uploadImage(), $created_at);
      }

      if($record == TRUE) {
         echo "<div class='text-center alert alert-success'>Votre épisode à été ajouté</div>";
      }
   } else {
      echo "<div class='text-center alert alert-danger'>Votre épisode n'a pas pu être ajouté</div>";
   }
}
?>
   
<div class="container-fluid padding addpost">
   <div class="row padding justify-content-center">
      <div class="col-lg-6 col-md-8">
         <form action="add.php" method="POST" enctype="multipart/form-data">
         <h6 class="text-center">ESPACE ADMMINISTRATION – AJOUTER UN ÉPISODE</h6>
            <div class="card">
               <div class="card-header">Ajouter un épisode</div>
               <div class="card-body">

                  <div class="form-group">
                     <label for="title">Titre</label>
                     <input type="text" name="title" class="form-control" maxlength="20">
                  </div>

                  <div class="form-group">
                     <label for="excerpt">Résumé</label>
                     <textarea name="excerpt" class="form-control" maxlength="70"></textarea>
                  </div>

                  <div class="form-group">
                     <label for="content">Contenu</label>
                     <textarea name="content" id="tiny" class="form-control" ></textarea>
                  </div>

                  <div class="form-group">
                  <hr>
                  <label for="image">Image</label><br>
                  <input type="file" name="image" class="form-control btn-img"/>
                  </div>
                  
                  <div class="form-group float-right">
                     <button type="submit" name="btnSubmit" class="btn btn-outline-secondary btn-lg">Ajouter</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>