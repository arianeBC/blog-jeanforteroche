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
               "user_id" => $_SESSION['user_id'],
               "title" => trim($_POST['title']),
               "excerpt" => trim($_POST['excerpt']),
               "content" => trim($_POST['content']),
               "image" => uploadImage(),
               "title_err" => "",
               "excerpt_err" => "",
               "content_err" => "",
               "image_err" => ""
            ];

            //Validate data
            if(empty($data['title'])) {
               $data['title_err'] = "Veuillez entrer le titre";
            }
            if(empty($data['excerpt'])) {
               $data['excerpt_err'] = "Veuillez entrer un résumé";
            }
            if(empty($data['content'])) {
               $data['content_err'] = "Veuillez entrer un contenu";
            }
            if(empty($data['image'])) {
               $data['image_err'] = "Veuillez ajouter une image dans les formats JPEG JPG ou PNG";
            }

            // Make sure no errors //)
            if(empty($data['title_err']) && empty($data['excerpt_err']) && empty($data['content_err']) && empty($data['image_err'])) {
               // Validated
               if($this->postModel->addPost($data)) {
                  flash("post_message", "Votre épisode a été ajouté");
                  redirect("posts");
               } else {
                  die("Votre épisode n'a pas pu être ajouté");
               }
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

      public function edit($id_post) {
         if($_SERVER['REQUEST_METHOD'] == "POST") {

            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
               "id_post" => $id_post,
               "user_id" => $_SESSION['user_id'],
               "title" => trim($_POST['title']),
               "excerpt" => trim($_POST['excerpt']),
               "content" => trim($_POST['content']),
               "image" => uploadImage(),
               "title_err" => "",
               "excerpt_err" => "",
               "content_err" => "",
               "image_err" => ""
            ];

            //Validate data
            if(empty($data['title'])) {
               $data['title_err'] = "Veuillez entrer le titre";
            }
            if(empty($data['excerpt'])) {
               $data['excerpt_err'] = "Veuillez entrer un résumé";
            }
            if(empty($data['content'])) {
               $data['content_err'] = "Veuillez entrer un contenu";
            }
            // if(empty($data['image'])) {
            //    $data['image_err'] = "Veuillez ajouter une image dans les formats JPEG JPG ou PNG";
            // }

            // Make sure no errors //)
            if(empty($data['title_err']) && empty($data['excerpt_err']) && empty($data['content_err']) && empty($data['image_err'])) {
               // Validated
               if($this->postModel->updatePost($data)) {
                  flash("post_message", "Votre épisode a été modifié");
                  redirect("posts");
               } else {
                  die("Votre épisode n'a pas pu être modifié");
               }
            } else {
               // Load view with errors
               $this->view("posts/edit", $data);
            }

         } else {
            // Get existing post from model
            $post = $this->postModel->getPostById($id_post);

            // Check for owner
            if($post->id_user != $_SESSION['user_id']) {
               redirect("posts");
               flash("post_message", "Vous n'êtes pas l'auteur de cet épisode");
            }

            $data = [
               "id_post" => $id_post,
               "title" => $post->title,
               "excerpt" => $post->excerpt,
               "content" => $post->content,
               "image" => $post->image
            ];
   
            $this->view('posts/edit', $data);
         }
      }

      public function show($id_post) {
         $post = $this->postModel->getPostById($id_post);

         $data = [
            "post" => $post
         ];

         $this->view("posts/show", $data);
      }

      public function delete($id_post) {
         if($_SERVER['REQUEST_METHOD'] == "POST") {
            // Get existing post from model
            $post = $this->postModel->getPostById($id_post);

            // Check for owner
            if($post->id_user != $_SESSION['user_id']) {
               redirect("posts");
               flash("post_message", "Vous n'êtes pas l'auteur de cet épisode");
            }
            
            if($this->postModel->deletePost($id_post)) {
               flash("post_message", "Cet épisode a été supprimé");
               redirect("posts");
            } else {
               die("Cet épisode n'a pas pu être supprimé");
            }
         } else {
            redirect("posts");
         }
      }
   }