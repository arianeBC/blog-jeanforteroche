   <div class="container-fluid padding addpost">
      <div class="row padding justify-content-center">

         
         <div class="col-lg-6 col-md-8">
            <form action="#" method="POST" enctype="multipart/form-data">
            <h6 class="text-center">ESPACE ADMMINISTRATION – MODIFIER UN ÉPISODE</h6>
            {{ edit-post-message }}
               <div class="card">
                  <div class="card-header">Modifier un épisode</div>
            <!-- foreach($posts->getSinglePost($_GET['slug']) as $post) { -->
                  <div class="card-body">
                     <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" name="title" class="form-control" maxlength="20" value = "{{ post-title }}"/>
                     </div>

                     <div class="form-group">
                        <label for="excerpt">Résumé</label>
                        <textarea name="excerpt" class="form-control" maxlength="70" >{{ post-excerpt }}</textarea>
                     </div>

                     <div class="form-group">
                        <label for="content">Contenu</label>
                        <textarea name="content" id="tiny" class="form-control">{{ post-content }}</textarea>
                     </div>

                     <div class="form-group text-center">
                     <hr>
                     <label for="image" class="float-left">Image</label><br>
                     <input type="file" name="image" class="form-control btn-img"/>
                     <img class="img-update" src="public/images/{{ post-image }}"/>
                     </div>
                     
                     <div class="form-group float-right">
                        <button type="submit" name="btnUpdate" class="btn btn-outline-secondary btn-lg">Mettre à jour</button>
                     </div>
                  </div>
            <!-- }  -->
               </div>
            </form>
         </div>
      </div>
   </div>

</body>

</html>