<?php 
require_once("config.php");
require_once( ROOT_PATH . "/includes/head_section.php");
include( ROOT_PATH . "/models/post.php");
?>

   <title>Jean Forteroche – Auteur de "Billet simple pour l'Alaska"</title>
</head>

<body>

   <?php include( ROOT_PATH . "/includes/header.php"); ?>

   <?php $posts = new Post($db); ?>

   <div class="container-fluid padding">
      <div class="row padding justify-content-center">
         <div class="col-md-10">

            <h6 class="text-center">ESPACE ADMMINISTRATION – TOUS LES ÉPISODES</h6>
            <table class="table table-hover">
               <thead class="thead-dark">
                  <tr>
                     <th>Titre</th>
                     <th class="sm-table">Résumé</th>
                     <th class="sm-table">Créé le</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach($posts->getPost() as $post) { ?>
                  <tr>
                     <td><?php echo $post["title"]; ?></td>
                     <td class="sm-table"><?php echo $post["excerpt"]; ?></td>
                     <td class="sm-table">
                        <?php echo $post["created_at"]; ?><br> 
                        <span class="updatedAt-dashboard"><?php if ($post["updated_at"] !== null) {
                           echo "Mise à jour le " . $post["updated_at"]; 
                        } ?></span>
                     </td>
                     <td>
                        <a href="view.php?slug=<?php echo $post["slug"]; ?>"><button type="submit" class="btn btn-outline-success btn-sm">Afficher</button></a>
                        <a href="edit.php?slug=<?php echo $post["slug"]; ?>"><button type="submit" class="btn btn-outline-primary btn-sm">Modifier</button></a>
                        <a href="delete.php?slug=<?php echo $post["slug"]; ?>"><button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button></a>
                     </td>
                  </tr>
                  <?php } ?>
               </tbody>
            </table>

         </div>
      </div>
   </div>