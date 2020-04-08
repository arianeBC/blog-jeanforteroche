<?php
   class Pages extends Controller {
      public function __construct() {

      }

      public function index() {
         if(isLoggedIn()) {
            redirect("posts");
         }

         $data = [
            'title' => 'Welcome'
            // {{ page-1 }} => "Autheur",
            // {{ page-2 }} => "Les épisodes",
            // {{ login-logout }} => "Connexion"
            // {{ author-or-add-php }}
            // {{ episode-or-dashboard-php }}
            // {{ login-or-logout-php }}
         ];

         $this->view("pages/index", $data);
      }

      public function author() {
         $data = [
            'title' => 'Author'
         ];

         $this->view("pages/author", $data);
      }

      public function episodes() {
         $data = [
            'title' => 'Episodes'
         ];

         $this->view("pages/episodes", $data);
      }
   }