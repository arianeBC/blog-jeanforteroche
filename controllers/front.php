<?php

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
      $this->html = "lmkldfkfmlkdfslmfksdlfk";
   }

   private function chapitre() {
      $this->html = "chapitre : ";
      if (isset($this->uri[1])) $this->html .= $this->uri[1];
      
   }

}