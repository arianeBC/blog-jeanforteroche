<?php
   class Posts extends Controller {
      public function __construct() {
         if(!isLoggedIn()) {
            redirect("users/login");
         }

         $this->postModel = $this->model("Post");

      }

      public function index() {
         // Get posts
         $posts = $this->postModel->getPosts();

         $data = [
            "posts" => $posts
         ];

         $this->view('posts/index', $data);
      }

      public function add() {
         if($_SERVER['REQUEST_METHOD'] == "POST") {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
               "title" => trim($_POST['title']),
               "excerpt" => trim($_POST['excerpt']),
               "content" => trim($_POST['content']),
               // "image" => uploadImage(),
               "id_user" => $_SESSION['user_id'],
               // "created_at" => date("Y-m-d"),
               "title_err" => "",
               "excerpt_err" => "",
               "content_err" => ""
               // "image_err" => ""
            ];

            //Validate title
            if(empty($data['title'])) {
               $data['title_err'] = "Veuillez entrer le titre";
            }

            //Validate excerpt
            if(empty($data['excerpt'])) {
               $data['excerpt_err'] = "Veuillez entrer un résumé";
            }

            //Validate content
            if(empty($data['content'])) {
               $data['content_err'] = "Veuillez entrer un contenu";
            }

            //Validate image
            if(empty($data['image'])) {
               $data['image_err'] = "Veuillez ajouter une image dans les formats JPEG JPG ou PNG";
            }

            // Make sure no errors
            if(empty($data['title_err']) && empty($data['excerpt_err']) && empty($data['content_err']) && empty($data['image_err'])) {

            } else {
               // Load view with errors
               $this->view("posts/add", $data);
            }

         } else {
            $data = [
               "title" => "",
               "excerpt" => "",
               "content" => ""
            ];
   
            $this->view('posts/add', $data);
         }
      }
   }