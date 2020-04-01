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

<!-- foreach($comments->getPendingComments() as $comment) {  -->
<tr>
   <td ><?php echo $comment['name']; ?></td>
   <td class="table-email sm-table"><?php echo $comment['email']; ?></td>
   <td class="table-comment">
      <?php echo $comment['comment']; ?><br> 
      <span class="updatedAt-dashboard">
         <?php echo "Créé le " . $comment['published_at']; ?>
      </span>
   </td>
   <td class="table-action">

      <form action="" method="POST">
         <input type="hidden" name="approveId" value="<?php echo $comment['id_comment']; ?>">
         <a href="#"><button type="submit" class="btn btn-outline-success btn-sm" name="approve">Approuver</button></a>
         <input type="hidden" name="deleteId" value="<?php echo $comment['id_comment']; ?>">
         <a href="#"><button type="submit" class="btn btn-outline-danger btn-sm" name="delete">Supprimer</button></a>
      </form>
   </td>
</tr>
<!-- } -->