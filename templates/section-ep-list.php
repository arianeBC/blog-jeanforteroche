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
         <!-- pagination -->
         <?php 
         $sql = "SELECT COUNT(id_post) FROM posts";
         $result = $db->query($sql);
         $row = $result->fetch_row();
         $totalRecords = $row[0];
         // divided by limit of posts by pages & ceil for whole nb 
         $totalPages = ceil($totalRecords/6);
         $pageLink = "<ul class='pagination justify-content-center'>";

         $page = $_GET['page'];
         if($page > 1) {
            // $pageLink .= "<a class='page-link' href='episodes.php?page=1'>First</a>";
            $pageLink .= "<a class='arrow' href='episodes.php?page=".($page-1)."'><i class='fas fa-arrow-left'></i></a>";
         }

         for($i=1; $i<=$totalPages; $i++) {
            $pageLink .= "<a class='page-link' href='episodes.php?page=" .$i. "'>" .$i. "</a>";
         }

         if($page < $totalPages) {
            $pageLink .= "<a class='arrow' href='episodes.php?page=".($page+1)."'><i class='fas fa-arrow-right'></i></a>";
            // $pageLink .= "<a class='page-link' href='episodes.php?page=".$totalPages."'>Last</a>";
         }

         echo $pageLink."</ul>";
         ?>
         </div>
      </div>
   </div>
</section>
