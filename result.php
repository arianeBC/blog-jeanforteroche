<?php 

require_once("config.php");
include( ROOT_PATH . "/session.php");
include( ROOT_PATH . "/models/post.php");
include( ROOT_PATH . "/models/comment.php");
require_once( ROOT_PATH . "/includes/head_section.php");
include( ROOT_PATH . "/includes/header-admin.php"); 
$posts = new Post($db); 
$comments = new Comment($db)
?>

<div class="container-fluid padding">
   <div class="row padding justify-content-center">
      <div class="col-lg-10">
         <h6 class="text-center">ESPACE ADMMINISTRATION – TOUS LES ÉPISODES</h6>
         <a class="btn btn-secondary btn-comment" href="view-comments.php">Commentaires signalés (<?php echo $comments->countPendingComments(); ?>)</a>
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

               <?php foreach($posts->getPost() as $post) { ?>
               <tr>
                  <td><?php echo $post['title']; ?></td>
                  <td class="sm-table "><?php echo $post['excerpt']; ?></td>
                  <td class="sm-table ">
                     <?php echo $post['created_at']; ?><br> 
                     <span class="updatedAt-dashboard"><?php if ($post['updated_at'] !== null) {
                        echo "Mise à jour le " . $post['updated_at']; 
                     } ?></span>
                  </td>
                  <td>
                     <a href="episode.php?slug=<?php echo $post['slug']; ?>"><button type="submit" class="btn btn-outline-success btn-sm">Afficher</button></a>
                     <a href="edit.php?slug=<?php echo $post['slug']; ?>"><button type="submit" class="btn btn-outline-primary btn-sm">Modifier</button></a>
                     <a href="delete.php?slug=<?php echo $post['slug']; ?>"><button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button></a>
                  </td>
               </tr>
               <?php } ?>

            </tbody>
         </table>
      </div>
   </div>
</div>