<?php
   class Pages extends Controller {
      public function __construct() {
         $this->postModel = $this->model("Post");
      }

      public function index() {
         if(isLoggedIn()) {
            redirect("posts");
         }

         // Get last posts
         $posts = $this->postModel->getLastPosts(3);

         $data = [
            "posts" => $posts
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

         // Get posts
         $posts = $this->postModel->getPosts();
         $data = [
            "posts" => $posts
         ];

         $this->view("pages/episodes", $data);
      }
   }