<?php require APPROOT . "/views/inc/header.php"; ?>
   <div class="container-fluid padding">
      <div class="row padding justify-content-center">

         <div class="col-lg-10">
            <h6 class="text-center">ESPACE ADMMINISTRATION – TOUS LES ÉPISODES</h6>
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
                  <!-- foreach($posts->getPost() as $post) {  -->
                  <tr>
                     <td>{{ post-title }}</td>
                     <td class="sm-table ">{{ post-excerpt }}</td>
                     <td class="sm-table ">
                        {{ post-created_at }}<br> 
                        <span class="updatedAt-dashboard">{{ Mise à jour le {{ updated-at }} }}
                        </span>
                     </td>
                     <td>
                        <a href="episode.php?slug={{ post-slug }}"><button type="submit" class="btn btn-outline-success btn-sm">Afficher</button></a>
                        <a href="edit.php?slug={{ post-slug }}"><button type="submit" class="btn btn-outline-primary btn-sm">Modifier</button></a>
                        <a href="delete.php?slug={{ post-slug }}"><button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button></a>
                     </td>
                  </tr>
                  <!-- }  -->
               </tbody>
            </table>
         </div>
      </div>
   </div>

</body>

</html>
