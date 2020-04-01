   <div class="container-fluid dashboard-page">
      <div class="row padding justify-content-center">

         <div class="col-lg-10">
            <h6 class="text-center">ESPACE ADMMINISTRATION – LES COMMENTAIRES</h6>
            {{ comment-approved }}
            {{ comment-deleted }}
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
                  <!-- foreach($comments->getPendingComments() as $comment) {  -->
                  <tr>
                     <td >{{ comment-name }}</td>
                     <td class="table-email sm-table">{{ comment-email }}</td>
                     <td class="table-comment">
                        {{ comment }}<br> 
                        <span class="updatedAt-dashboard">
                           Créé le {{ comment-published_at }}
                        </span>
                     </td>
                     <td class="table-action">

                        <form action="" method="POST">
                           <input type="hidden" name="approveId" value="{{ comment-id }}">
                           <a href="#"><button type="submit" class="btn btn-outline-success btn-sm" name="approve">Approuver</button></a>
                           <input type="hidden" name="deleteId" value="{{ comment-id }}">
                           <a href="#"><button type="submit" class="btn btn-outline-danger btn-sm" name="delete">Supprimer</button></a>
                        </form>
                     </td>
                  </tr>
                  <!-- } -->
               </tbody>
            </table>
         </div>
      </div>
   </div>

</body>

</html>

<?php
// if(isset($_POST['approve'])) {
//    $result = $comments->approveComment($_POST['approveId']);
//    if($result == TRUE) {
//       echo "<div class='text-center alert alert-success'>Commentaire approuvé</div>";
//    }
// }

// if(isset($_POST['delete'])) {
//    $result = $comments->deleteComment($_POST['deleteId']);
//    if($result == TRUE) {
//       echo "<div class='text-center alert alert-danger'>Commentaire supprimé</div>";
//    }
// }
?>