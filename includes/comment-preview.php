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