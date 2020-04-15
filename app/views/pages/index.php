<?php require APPROOT . "/views/inc/header.php"; ?>
<section id="home">
   <div class="video-background">
      <div class="video-wrap">
         <div class="video">
            <video id="bgvid" autoplay loop muted playsinline>
               <source src="<?php echo URLROOT; ?>/images/woman-comes-to-the-lake.mp4" type="video/mp4">
            </video>
         </div>
      </div>
   </div>
   <div class="caption text-center">
      <h1>BILLET SIMPLE POUR L'ALASKA</h1>
      <h3>par JEAN FORTEROCHE</h3>
      <a href="#episodes" class="btn btn-outline-light btn-lg">LIRE LE DERNIER ÉPISODE</a>
   </div>
</section>

<section id="concept">
   <div class="container-fluid containerConcept">
      <div class="row jumbotron">
         <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10" >
            <p class="lead">Pour mon nouveau roman "Billet simple pour l'Alaska", j'ai choisi d'innover. Je change totalement de concept au profit d'un style que l'on pourrait apparenter aux web-séries. Mon livre sera publié par épisodes, à chaque semaine les lundi et les jeudi.</p>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 ">
            <a href="<?php echo URLROOT; ?>/pages/episodes"><button type="button" class="btn btn-outline-secondary btn-lg">Voir tous les épisodes</button></a>
         </div>
      </div>
   </div>
</section>

<section id="author-excerpt">
   <div class="container-fluid padding">
      <div class="row padding justify-content-center">
         <div class="col-lg-7">
            <h2>JEAN FORTEROCHE</h2>
            <p>Je ne suis né qu'une fois. Cela s'est fait à Saint-Félix-de-Valois, dans la province de Québec. La prochaine fois que je mourrai, ce sera la première fois. Je veux mourir verticalement, la tête en bas et les pieds en haut.</p>
            <p>À l'école, j'étais toujours le premier à partir. Je n'y allais pas souvent et j'y restais le moins longtemps possible. J'ai complété mes études secondaires à Joliette, avec les Clercs de Saint-Viateur.</p>
            <p>J'ai souffert six mois à l'École polytechnique de Montréal. Enfin délivré, je me suis pris pour un commis de bureau et me prends encore aujourd'hui pour tel. Mais ceux qui embauchent des commis de bureau ne veulent pas me prendre pour un commis de bureau. Je ne travaille pas toujours et ne travaille pas toujours comme commis de bureau. Un mois sur deux, je suis en chômage.</p>
            <a href="<?php echo URLROOT; ?>/pages/author" class="btn btn-primary">En savoir plus</a>
         </div>
         <div class="col-lg-4 text-center">
            <img src="<?php echo URLROOT; ?>/images/jean-forteroche-s.jpg" alt="Je me fais passer pour l'écrivain Jean Forteroche mais en réalité je suis Réjean Ducharme">
         </div>
      </div>
   </div>
</section>

<section class="background">
   <figure>
      <div class="fixed-wrap main">
         <div id="fixed-main">
         </div>
      </div>
   </figure>
</section>

<section id="episodes">
   <div class="container-fluid padding">
      <div class="row welcome text-center">
         <div class="col-12">
            <h1 class="display-4">Billet simple pour l'Alaska</h1>
         </div>
         <hr>
      </div>
   </div>
   
   <div class="container-fluid padding">
      <div class="row padding episode-row">

         <?php foreach($data['posts'] as $post) : ?>
            <div class="col-md-4">
               <div class="card style="width: 300px;">
                  <img src="<?php echo URLROOT; ?>/images/<?php echo $post->image; ?>"  alt="Aperçu de l'épisode" class="card-img-episodes">
                  <div class="card-body d-flex flex-column">
                     <h4 class="card-title"><?php echo $post->title; ?></h4>
                     <p class="card-text"><?php echo $post->excerpt; ?></p>
                     <a href="<?php echo URLROOT; ?>pages/episode/<?php echo $post->id_post; ?>" class="btn btn-outline-secondary mt-auto">Lire l'épisode</a>
                  </div>
               </div>
            </div>
         <?php endforeach; ?>

      </div>
   </div>

   <div class="container-fluid padding">
   <div class="row text-center padding">
      <div class="col-12">
         <a href="<?php echo URLROOT; ?>/pages/episodes" class="btn btn-primary btn-lg">VOIR TOUS LES ÉPISODES</a>
      </div>
   </div>
</div>
</section>

<section class="connect">
   <div class="container-fluid padding">
      <div class="row text-center padding">
         <div class="col-12">
            <h2>Suivez-moi</h2>
         </div>
         <div class="col-12 social padding">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
         </div>
      </div>
   </div>
</section>
<?php require APPROOT . "/views/inc/footer.php"; ?>