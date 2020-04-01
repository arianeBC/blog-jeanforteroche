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
<!-- foreach($posts->getSinglePost($_GET['slug']) as $post) {  -->
               <img src="public/images/{{ post-image }}" alt="Aperçu de l'épisode" class="card-img-top">
               <div class="card-body">
                  <h4 class="card-title">{{ post-title }}</h4> 
                  <p class="card-text author-date">
                     {{ user_name }}<br>
                     {{ created_at }}<br>
                     {{ MISE À JOUR {{ updated_at }} }}<br>
                  </p>
                  <p class="card-text">{{ post-content }}</p>
               </div>
<!-- }  -->
               <h4 class="card-title comment-title">Commentaires ( {{ count-comment }})</h4>
               {{ added-commentflag-alert}}
<!-- foreach($comments->getCommentBySlug($_GET['slug']) as $comment) {  -->
               <div class="media comment-section">
                  <div class="media-left media-top">
                     <img class="avatar-img" src="public/images/avatar.png">
                  </div>
                  <div class="media-body comment-body">
                     <form action="" method="POST">
                        <input type="hidden" name="approveId" value="{{ id-comment }}">
                        <strong>{{ comment-name }}</strong>
                        <p>{{ comment }}</p> 
                        <span class="comment-date float-right">Publié le {{ published_at }}</span>
                        <a href="#"><button type="submit" title="Signaler ce commentaire" name="commentFlag" class="btn float-left comment-flag"><i class="far fa-flag"></i></button></a>
                     </form>
                  </div>
               </div>
<!-- }  -->
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


<?php 
// if(isset($_POST['commentFlag'])) {
//    if(isset($_POST['commentFlag'])) {
//       $result = $comments->updateComment($_POST['approveId']);
//       if($result == TRUE) {
//          echo "<div class='text-center alert alert-success'>Vous avez signalé ce commentaire.</div>";
//       }
//    }
// } 
?>

<?php 
// if(isset($_POST['btnComment'])) {
//    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['comment'])) {
//       $published_at = date("Y-m-d");
//       $status = 1;
//       $result = $comments->comment(strip_tags($_POST['name']), strip_tags($_POST['email']), strip_tags($_POST['comment']), $published_at, $_GET['slug'], $status);
//       if ($result == TRUE) {
//          echo "<div class='text-center alert alert-success'>Votre commentaire à été ajouté</div>";
//       }
//    } else {
//       echo "<div class='text-center alert alert-danger'>Votre commentaire n'a pas pu être ajouté. Vérifiez que tous les champs soient remplis.</div>";
//    }
// }
?>