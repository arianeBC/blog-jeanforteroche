<!-- foreach($post->getLastPosts(3) as $post) {  -->
<div class="col-md-4">
   <div class="card style="width: 300px;">
      <img src="public/images/{{ post-image }}"  alt="Aperçu de l'épisode" class="card-img-episodes">
      <div class="card-body d-flex flex-column">
         <h4 class="card-title">{{ post-title }}</h4>
         <p class="card-text">{{ post-excerpt }}</p>
         <a href="episode.php?slug={{ post-slug }}" class="btn btn-outline-secondary mt-auto">Lire l'épisode</a>
      </div>
   </div>
</div>
<!-- }  -->

<!-- foreach($posts->getPostsLimit(6) as $post) { -->
   <div class="col-md-4">
      <div class="card style="width: 300px;">
         <img src="public/images/{{ post-image }}" alt="Aperçu de l'épisode" class="card-img-episodes">
         <div class="card-body d-flex flex-column">
            <h4 class="card-title">{{ post-title }}</h4>
            <p class="card-text">{{ post-excerpt }}</p>
            <a href="episode.php?slug={{ post-slug }}" class="btn btn-outline-secondary mt-auto">Lire l'épisode</a>
         </div>
      </div>
   </div>
<!-- }  -->

<!-- foreach($posts->getSinglePost($_GET['slug']) as $post) {  -->
<img src="public/images/{{ post-image }}" alt="Aperçu de l'épisode" class="card-img-top">
<div class="card-body">
   <h4 class="card-title">{{ post-title }}</h4> 
   <p class="card-text author-date">
      {{ user_name }}<br>
      {{ created_at }}<br>
      MISE À JOUR {{ updated_at }}<br>
   </p>
   <p class="card-text">{{ post-content }}</p>
</div>
<!-- }  -->

<!-- foreach($posts->getPost() as $post) {  -->
<tr>
   <td>{{ post-title }}</td>
   <td class="sm-table ">{{ post-excerpt }}</td>
   <td class="sm-table ">
      {{ post-created_at }}<br> 
      <span class="updatedAt-dashboard">Mise à jour le {{ updated-at }}
      </span>
   </td>
   <td>
      <a href="episode.php?slug={{ post-slug }}"><button type="submit" class="btn btn-outline-success btn-sm">Afficher</button></a>
      <a href="edit.php?slug={{ post-slug }}"><button type="submit" class="btn btn-outline-primary btn-sm">Modifier</button></a>
      <a href="delete.php?slug={{ post-slug }}"><button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button></a>
   </td>
</tr>
<!-- }  -->

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