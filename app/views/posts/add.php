<?php require APPROOT . "/views/inc/header.php"; ?>
   <div class="container-fluid padding addpost">
      <div class="row padding justify-content-center">
         <div class="col-lg-6 col-md-8">
            <form action="<?php echo URLROOT; ?>/posts/add" method="post" enctype="multipart/form-data">
            <h6 class="text-center">ESPACE ADMMINISTRATION – AJOUTER UN ÉPISODE</h6>
            <!-- {{ add-post-message }} -->
               <div class="card">
                  <div class="card-header">Ajouter un épisode</div>
                  <div class="card-body">

                     <div class="form-group">
                        <label for="title">Titre : <sup>*</sup></label>
                        <input type="text" name="title" class="form-control" maxlength="20" <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
                        <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
                     </div>

                     <div class="form-group">
                        <label for="excerpt">Résumé : <sup>*</sup></label>
                        <textarea name="excerpt" class="form-control" maxlength="70" <?php echo (!empty($data['excerpt_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['excerpt']; ?></textarea>
                        <span class="invalid-feedback"><?php echo $data['excerpt_err']; ?></span>
                     </div>

                     <div class="form-group">
                        <label for="content">Contenu : <sup>*</sup></label>
                        <textarea name="content" id="tiny" class="form-control" <?php echo (!empty($data['content_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['content']; ?></textarea>
                        <span class="invalid-feedback"><?php echo $data['content_err']; ?></span>
                     </div>

                     <!-- <div class="form-group">
                        <hr>
                        <label for="image">Image : <sup>*</sup></label><br>
                        <input type="file" name="image" class="form-control btn-img" <?php // echo (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>" value="<?php // echo $data['image']; ?>">
                        <span class="invalid-feedback"><?php // echo $data['image_err']; ?></span>
                     </div> -->
                     
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