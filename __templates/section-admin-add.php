<?php require APPROOT . "/views/inc/header.php"; ?>
<div class="container-fluid padding addpost">
      <div class="row padding justify-content-center">

         <div class="col-lg-6 col-md-8">
            <form action="add.php" method="POST" enctype="multipart/form-data">
            <h6 class="text-center">ESPACE ADMMINISTRATION – AJOUTER UN ÉPISODE</h6>
            <!-- {{ add-post-message }} -->
               <div class="card">
                  <div class="card-header">Ajouter un épisode</div>
                  <div class="card-body">

                     <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" name="title" class="form-control" maxlength="20">
                     </div>

                     <div class="form-group">
                        <label for="excerpt">Résumé</label>
                        <textarea name="excerpt" class="form-control" maxlength="70"></textarea>
                     </div>

                     <div class="form-group">
                        <label for="content">Contenu</label>
                        <textarea name="content" id="tiny" class="form-control" ></textarea>
                     </div>

                     <div class="form-group">
                        <hr>
                        <label for="image">Image</label><br>
                        <input type="file" name="image" class="form-control btn-img"/>
                     </div>
                     
                     <div class="form-group float-right">
                        <button type="submit" name="btnSubmit" class="btn btn-outline-secondary btn-lg"><i class="fas fa-pencil-alt"></i>Ajouter</button>
                     </div>

                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>

</body>

</html>
