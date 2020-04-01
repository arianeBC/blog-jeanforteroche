<div class="container-fluid padding addpost">
   <div class="row padding justify-content-center">

      
      <div class="col-lg-6 col-md-8">
         <form action="#" method="POST" enctype="multipart/form-data">
         <h6 class="text-center">ESPACE ADMMINISTRATION – MODIFIER UN ÉPISODE</h6>
         {{ edited-post-successfully }}
            <div class="card">
               <div class="card-header">Modifier un épisode</div>
         <!-- foreach($posts->getSinglePost($_GET['slug']) as $post) { -->
               <div class="card-body">
                  <div class="form-group">
                     <label for="title">Titre</label>
                     <input type="text" name="title" class="form-control" maxlength="20" value = "{{ post-title }}"/>
                  </div>

                  <div class="form-group">
                     <label for="excerpt">Résumé</label>
                     <textarea name="excerpt" class="form-control" maxlength="70" >{{ post-excerpt }}</textarea>
                  </div>

                  <div class="form-group">
                     <label for="content">Contenu</label>
                     <textarea name="content" id="tiny" class="form-control">{{ post-content }}</textarea>
                  </div>

                  <div class="form-group text-center">
                  <hr>
                  <label for="image" class="float-left">Image</label><br>
                  <input type="file" name="image" class="form-control btn-img"/>
                  <img class="img-update" src="public/images/{{ post-image }}"/>
                  </div>
                  
                  <div class="form-group float-right">
                     <button type="submit" name="btnUpdate" class="btn btn-outline-secondary btn-lg">Mettre à jour</button>
                  </div>
               </div>
         <!-- }  -->
            </div>
         </form>
      </div>
   </div>
</div>


<?php
// if(isset($_POST['btnUpdate'])) {

//    $imagename = $_FILE["image"]["name"];
//    $updated_at = date("Y-m-d");
//    if(!empty($imagename)) {
//       $result1 = $posts->updatePostImage($_POST['title'], $_POST['excerpt'], $_POST['content'], uploadImage(), $updated_at, $_GET['slug']);
//       if($result1 == TRUE) {
//          echo "<div class='text-center alert alert-success'>Votre épisode a été mis à jour</div>";
//       } else {
//          echo "<div class='text-center alert alert-danger'>Veuillez réessayer</div>";
//       }
//    } else {
//       $result2 = $posts->updatePost($_POST['title'], $_POST['excerpt'], $_POST['content'], $updated_at, $_GET['slug']);
//       if($result2 == TRUE) {
//          echo "<div class='text-center alert alert-success'>Votre épisode a été mis à jour</div>";
//       } else {
//          echo "<div class='text-center alert alert-danger'>Veuillez réessayer</div>";
//       }
//    }

// }
?>