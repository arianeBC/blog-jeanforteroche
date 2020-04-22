<?php require APPROOT . "/views/inc/header.php"; ?>
   <div class="container-fluid dashboard-page">
      <div class="row padding justify-content-center">
         <div class="col-lg-10">
         <a href="<?php echo URLROOT; ?>/posts" class="btn btn-outline-secondary btn-sm mb-3"><i class="fa fa-backward"></i> Tableau de bord</a>
            <h6 class="text-center">ESPACE ADMMINISTRATION – LES COMMENTAIRES</h6>
            <?php flash("comment_message"); ?>
            <table class="table table-hover">
               <thead class="thead-dark">
                  <tr>
                     <th scope="col">Name</th>
                     <th scope="col" class="sm-table">Email</th>
                     <th scope="col">Commentaire</th>
                     <th scope="col" class="table-action">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach($data['comments'] as $comment) : ?>
                  <tr>
                     <td ><?php echo $comment->name; ?></td>
                     <td class="table-email sm-table"><?php echo $comment->email; ?></td>
                     <td class="table-comment">
                     <?php echo $comment->comment; ?><br> 
                        <span class="updatedAt-dashboard">
                           Créé le <?php echo $comment->published_at; ?>
                        </span>
                     </td>
                     <td class="table-action">

                        <form action="" method="POST">
                           <input type="hidden" name="approveId" value="<?php echo $comment->id_comment; ?>">
                           <button type="submit" class="btn btn-outline-success btn-sm" name="approve">Approuver</button>
                           <input type="hidden" name="deleteId" value="<?php echo $comment->id_comment; ?>">
                           <button type="submit" class="btn btn-outline-danger btn-sm" name="delete">Supprimer</button>
                        </form>
                     </td>
                  </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>

</body>

</html>