<section id="episode">
   <div class="container-fluid padding">
      <div class="row welcome text-center">
         <div class="col-12">
            <h1 class="display-4">BILLET SIMPLE POUR L'ALASKA</h1>
         </div>
      </div>
   </div>

   <div class="container-fluid padding card-page">
      <div class="row padding episode-row">
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
      </div>
   </div>

   <div class="container-fluid padding">
      <div class="row text-center">
         <div class="col-12 text-center">

            {{ pagination }}
            
         </div>
      </div>
   </div>
</section>
