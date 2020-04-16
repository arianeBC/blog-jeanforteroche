<?php
   class Posts extends Controller {
      public function __construct() {

         $this->postModel = $this->model("Post");

      }

      public function episodes() {
         // Get posts
         $posts = $this->postModel->getPosts();
         // $paging = $this->postModel->pagination($noPage);

         $data = [
            "posts" => $posts,
            // "paging" => $paging
         ];

         $this->view("posts/episodes", $data);
      }

      public function episode($id_post) {
         $post = $this->postModel->getPostById($id_post);
         $comments = $this->postModel->getCommentById($id_post);
         $count = $this->postModel->commentCount($id_post);

         $data = [
            "id_post" => $id_post,
            "post" => $post,
            "comments" => $comments,
            "count" => $count,
            "name" => "",
            "email" => "",
            "comment" => "",
         ];

         $this->view("posts/episode", $data);

         if(isset($_POST['btnComment'])) {
            $post = $this->postModel->getPostById($id_post);
            $comments = $this->postModel->getCommentById($id_post);
            $count = $this->postModel->commentCount($id_post);

            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
               "id_post" => $id_post,
               "post" => $post,
               "comments" => $comments,
               "count" => $count,
               "name" => trim($_POST['name']),
               "email" => trim($_POST['email']),
               "comment" => trim($_POST['comment']),
               "name_err" => "",
               "email_err" => "",
               "comment_err" => ""
            ];

            //Validate data
            if(empty($data['name'])) {
               $data['name_err'] = "Veuillez entrer votre nom";
            }
            if(empty($data['email'])) {
               $data['email_err'] = "Veuillez entrer votre email";
            }
            if(empty($data['comment'])) {
               $data['comment_err'] = "Veuillez entrer un commentaire";
            }

            // Make sure no errors //)
            if(empty($data['name_err']) && empty($data['email_err']) && empty($data['comment_err'])) {
               // Validated
               if($this->postModel->addComment($data)) {
                  flash("comment_added", "Votre commentaire a été ajouté");
                  // redirect("posts/episode");
               } else {
                  die("Votre commentaire n'a pas pu être ajouté");
               }
            } else {
               // Load view with errors
               $this->view("posts/episode", $data);
            }

         } 

         if(isset($_POST['commentFlag'])) {
            // Validated
            if($this->postModel->flagComment($_POST['approveId'])) {
               flash("comment_flag", "Ce commentaire a été signalé");
               // redirect("posts/episode");
            } else {
               die("Ce commentaire n'a pas pu être signalé");
            }
         }
      }

      public function index() {
         if(!isLoggedIn()) {
            redirect("users/login");
         }
         // Get posts
         $posts = $this->postModel->getPosts();
         $count = $this->postModel->pendingCommentCount();

         $data = [
            "posts" => $posts,
            "count" => $count
         ];

         $this->view('posts/index', $data);
      }

      public function add() {
         if(!isLoggedIn()) {
            redirect("users/login");
         }
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
         if(!isLoggedIn()) {
            redirect("users/login");
         }
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
         if(!isLoggedIn()) {
            redirect("users/login");
         }
         $post = $this->postModel->getPostById($id_post);

         $data = [
            "post" => $post
         ];

         $this->view("posts/show", $data);
      }

      public function delete($id_post) {
         if(!isLoggedIn()) {
            redirect("users/login");
         }
         if($_SERVER['REQUEST_METHOD'] == "POST") {    
            // Execute    
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

      public function flags() {
         if(!isLoggedIn()) {
            redirect("users/login");
         }
         // Get posts
         $comments = $this->postModel->pendingComments();


         $data = [
            "comments" => $comments,
         ];

         $this->view('posts/flags', $data);

         if(isset($_POST['delete'])) {
            if ($this->postModel->deleteComment($_POST['deleteId'])) {
               flash("comment_message", "Ce commentaire a été supprimé");
               // redirect("posts/flags");
            }
         }

         if(isset($_POST['approve'])) {
            if($this->postModel->updateComment($_POST['approveId'])) {
               flash("comment_message", "Ce commentaire a été validé");
               // redirect("posts/flags");
            }
         }
      }
      
   }