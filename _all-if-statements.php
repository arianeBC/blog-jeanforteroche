<?php 

// amdin-template.php {{ welcome-message }}
if(!empty($_SESSION['login'])) {
   echo "Bienvenue {$_SESSION['username']} 📖";
} else {
   echo "Vous n'êtes pas connecté";
}

//section-admin-login.php {{ connect-user }}
if(isset($_POST['btnLogin'])) {
   $user->login($_POST['login'], md5($_POST['pwd']));
}

//section-admin-comment.php {{ comment-approved }}
if(isset($_POST['approve'])) {
   $result = $comments->approveComment($_POST['approveId']);
   if($result == TRUE) {
      echo "<div class='text-center alert alert-success'>Commentaire approuvé</div>";
   }
}

//section-admin-comment.php {{ comment-deleted }}
if(isset($_POST['delete'])) {
   $result = $comments->deleteComment($_POST['deleteId']);
   if($result == TRUE) {
      echo "<div class='text-center alert alert-danger'>Commentaire supprimé</div>";
   }
}

//section-admin-add.php {{ add-post-message }}
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

//section-admin-edit.php {{ edit-post-message }}
if(isset($_POST['btnUpdate'])) {
   $imagename = $_FILE["image"]["name"];
   $updated_at = date("Y-m-d");
   
   if(!empty($imagename)) {
      $result1 = $posts->updatePostImage($_POST['title'], $_POST['excerpt'], $_POST['content'], uploadImage(), $updated_at, $_GET['slug']);
      if($result1 == TRUE) {
         echo "<div class='text-center alert alert-success'>Votre épisode a été mis à jour</div>";
      } else {
         echo "<div class='text-center alert alert-danger'>Veuillez réessayer</div>";
      }
   } else {
      $result2 = $posts->updatePost($_POST['title'], $_POST['excerpt'], $_POST['content'], $updated_at, $_GET['slug']);
      if($result2 == TRUE) {
         echo "<div class='text-center alert alert-success'>Votre épisode a été mis à jour</div>";
      } else {
         echo "<div class='text-center alert alert-danger'>Veuillez réessayer</div>";
      }
   }

}

// ********************************************* //

//section-episode.php {{ updated_at }}
if ($post['updated_at'] !== null) {
   echo "MISE À JOUR " . $post['updated_at']; 
}

//section-episode.php {{ comment-flag-message }}
if(isset($_POST['commentFlag'])) {
   if(isset($_POST['commentFlag'])) {
      $result = $comments->updateComment($_POST['approveId']);
      if($result == TRUE) {
         echo "<div class='text-center alert alert-success'>Vous avez signalé ce commentaire.</div>";
      }
   }
}

//section-episode.php {{ add-comment-message }}
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