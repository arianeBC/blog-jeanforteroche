<?php
require_once "controller/episode.php";
/**
 * 
   */
class Front {

   public  $html;
   private $uri;

   /**
   * [__construct description]
   * @param Array $uri [description]
   * @return Front
   */

   public function __construct($uri) {
      $this->uri = $uri;
      $todo = $uri[0];
      if ($uri[0] === "") $todo = "home";
      if ( !method_exists ( $this , $todo ) ) $todo = "home";
      $this->$todo();
   }

   private function home() {
      $vue = new View(
         [
         "{{ titre }}" => "bienvenue",
         "{{ linkLoginLogout }}" => "",
         "{{ textLoginLogout }}" => "connexion",
         "{{ contenu }}" => "---"
      ],
      "main"
      );
      $this->html = $vue->html;
   }

   private function chapitre() {
    // http://monsite.com/chapitre/un-super-ete
      $chapter = new Epidode(["readFromSlug"=>$this->uri[1]]);
      $comments = new Comments(["readFromId"=>$chapter->id]);
      $vue = new View(
      [
         "{{ titre }}" => $chapter->title,
         "{{ linkLoginLogout }}" => "",
         "{{ textLoginLogout }}" => "connexion",
         "{{ contenu }}" => $chapter->html.$comments->html
      ],
      "main"
      );
      $this->html = $vue->html;

   }
}