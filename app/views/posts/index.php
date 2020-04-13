<?php require APPROOT . "/views/inc/header.php"; ?>
   <div class="container-fluid padding">
      <div class="row padding justify-content-center">
         <div class="col-lg-10">
            <h6 class="text-center">ESPACE ADMMINISTRATION – TOUS LES ÉPISODES</h6>
            <?php flash("post_message"); ?>
            <a class="btn btn-secondary btn-comment" href="view-comments.php">Commentaires signalés ({{ pending-comment }})</a>
            <table class="table table-hover">
               <thead class="thead-dark">
                  <tr>
                     <th scope="col" class="table-episode">Titre</th>
                     <th scope="col" class="sm-table ">Résumé</th>
                     <th scope="col" class="sm-table ">Créé le</th>
                     <th scope="col">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach($data['posts'] as $post) : ?>
                  <tr>
                     <td><?php echo $post->title; ?></td>
                     <td class="sm-table "><?php echo $post->excerpt; ?></td>
                     <td class="sm-table ">
                        <?php echo $post->created_at; ?><br> 
                        <span class="updatedAt-dashboard">
                           <?php if ($post->updated_at !== null) {
                              echo "Mise à jour le " . $post->updated_at; 
                           } ?>
                        </span>
                     </td>
                     <td>
                        <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->id_post; ?>"><button type="submit" class="btn btn-outline-success btn-sm">Afficher</button></a>
                        <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $post->id_post; ?>"><button type="submit" class="btn btn-outline-primary btn-sm">Modifier</button></a>
                        <form class="pull-right" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $post->id_post; ?>" method="post">
                           <button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button>
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