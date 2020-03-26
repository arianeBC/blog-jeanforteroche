<?php 
require_once("config.php");
require_once( ROOT_PATH . "/includes/head_section.php");
include( ROOT_PATH . "/models/comment.php");
$comments = new Comment($db);
?>

   <title>Jean Forteroche – Auteur de "Billet simple pour l'Alaska"</title>
</head>

<body>

   <?php include( ROOT_PATH . "/includes/header.php"); ?>

   <div class="container-fluid dashboard-page">
      <div class="row padding justify-content-center">
         <div class="col-lg-10">

            <h6 class="text-center">ESPACE ADMMINISTRATION – LES COMMENTAIRES</h6>

            <table class="table table-hover">
               <thead class="thead-dark">
                  <tr>
                     <th scope="col">Name</th>
                     <th scope="col" class="sm-table">Email</th>
                     <th scope="col">Commentaire</th>
                     <!-- <th scope="col">Créé le</th> -->
                     <th scope="col" class="table-action">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach($comments->getPendingComments() as $comment) { ?>
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
                        <a href="#"><button type="submit" class="btn btn-outline-success btn-sm">Approuver</button></a>
                        <a href="#"><button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button></a>
                     </td>
                  </tr>
                  <?php } ?>
               </tbody>
            </table>

         </div>
      </div>
   </div>
