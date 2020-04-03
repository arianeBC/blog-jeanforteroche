<?php 
require_once("config.php");
include( ROOT_PATH . "/models/comment.php");
$comments = new Comment($db);
require_once( ROOT_PATH . "/includes/head_section.php")
?>

   <title>Jean Forteroche – Auteur de "Billet simple pour l'Alaska"</title>
</head>

<body>

   <?php include( ROOT_PATH . "/includes/header-admin.php"); ?>

   <div class="container-fluid padding">
      <div class="row text-right">
         <div class="col-12">
            <p class="dashboard-name">
               <?php 
               if(!empty($_SESSION['login'])) {
                  echo "Bienvenue {$_SESSION['username']} 📖";
               } else {
                  echo "Vous n'êtes pas connecté";
               }
               ?>
            </p>
         </div>
      </div>
   </div>

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

                        <form action="" method="POST">
                           <input type="hidden" name="approveId" value="<?php echo $comment['id_comment']; ?>">
                           <a href="#"><button type="submit" class="btn btn-outline-success btn-sm" name="approve">Approuver</button></a>
                           <input type="hidden" name="deleteId" value="<?php echo $comment['id_comment']; ?>">
                           <a href="#"><button type="submit" class="btn btn-outline-danger btn-sm" name="delete">Supprimer</button></a>
                        </form>
                     </td>
                  </tr>
                  <?php } ?>

                  <?php
                  if(isset($_POST['approve'])) {
                     $result = $comments->approveComment($_POST['approveId']);
                     if($result == TRUE) {
                        echo "<div class='text-center alert alert-success'>Commentaire approuvé</div>";
                     }
                  }
                  if(isset($_POST['delete'])) {
                     $result = $comments->deleteComment($_POST['deleteId']);
                     if($result == TRUE) {
                        echo "<div class='text-center alert alert-danger'>Commentaire supprimé</div>";
                     }
                  }
                  ?>

               </tbody>
            </table>
         </div>
      </div>
   </div>
