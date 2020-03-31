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
   <div class="col-md-11 col-lg-10">
   <div class="card">
      <img src="public/images/{{ post-image }}" alt="Aperçu de l'épisode" class="card-img-top">
      <div class="card-body">
         <h4 class="card-title">{{ post-title }}</h4> 
         <p class="card-text author-date">
            {{ user_name }}<br>
            {{ created_at }}<br>
            MISE À JOUR {{ updated_at }}<br>
         </p>
         <p class="card-text">{{ post-content }}</p>
<!-- }  -->