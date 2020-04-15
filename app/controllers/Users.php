<?php 
   class Users extends Controller {
      public function __construct() {
         $this->userModel = $this->model("User");
      }

      public function login() {
         // Check for POST
         if($_SERVER["REQUEST_METHOD"] == "POST") {
            // Process de form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init Data
            $data = [
               "email" => trim($_POST['email']),
               "password" => trim($_POST['password']),
               "email_error" => "",
               "password_error" => "",
            ];

            // Validate Email
            if(empty($data['email'])) {
               $data['email_err'] = "Veuillez entrer votre email";
            }

            // Validate Password
            if(empty($data['password'])) {
               $data['password_err'] = "Veuillez entrer votre mot de passe";
            }

            // Check for user/email
            if($this->userModel->findUserByEmail($data['email'])) {
               // User found

            } else {
               $data['email_err'] = "Aucun utilisateur trouvé";
            }

            // Make sure errors are empty
            if( empty($data['email_err']) && empty($data['password_err']) ) {
               // Validated
               // Check and set logged in user
               $loggedInUser = $this->userModel->login($data['email'], $data['password']);

               if($loggedInUser) {
                  // Create Session
                  $this->createUserSession($loggedInUser);
               } else {
                  $data['password_err'] = "Mot de passe incorrect";

                  $this->view('users/login', $data);
               }
            } else {
               // Load view with errors
               $this->view("users/login", $data);
            }

         } else {
            // Init data
            $data = [
               "email" => "",
               "password" => "",
               "email_error" => "",
               "password_error" => "",
            ];
         
            // Load view
            $this->view('users/login', $data);
            }
      }

      public function createUserSession($user) {
         $_SESSION['user_id'] = $user->id_user;
         $_SESSION['user_email'] = $user->email;
         $_SESSION['user_name'] = $user->user_name;
         redirect("posts");
      }

      public function logout() {
         unset($_SESSION['user_id']);
         unset($_SESSION['user_email']);
         unset($_SESSION['user_name']);
         session_destroy();
         redirect("users/login");
      }

   }