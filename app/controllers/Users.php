<?php 
   class Users extends Controller {
      public function __construct() {

      }

      public function register() {
         // Check for POST
         if($_SERVER["REQUEST_METHOD"] == "POST") {
            // Process de form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init Data
            $data = [
               "name" => $_POST['name'],
               "email" => trim($_POST['email']),
               "password" => trim($_POST['password']),
               "confirm_password" => trim($_POST['confirm_password']),
               "name_error" => "",
               "email_error" => "",
               "password_error" => "",
               "confirm_password_error" => ""
            ];

            // Validate Email
            if(empty($data['email'])) {
               $data['email_err'] = "Veuillez entrer votre email";
            }

            // Validate Name
            if(empty($data['name'])) {
               $data['name_err'] = "Veuillez entrer votre prénom et nom";
            }

            // Validate Password
            if(empty($data['password'])) {
               $data['password_err'] = "Veuillez entrer un mot de passe";
            } elseif( strlen($data['password']) < 6 ) {
               $data['password_err'] = "Le mot de passe doit contenir au moins 6 caractères";
            }

            // Validate Confirm Password
            if(empty($data['confirm_password'])) {
               $data['confirm_password_err'] = "Veuillez confimer le mot de passe";
            } else {
               if($data['password'] != $data['confirm_password']) {
                  $data['confirm_password_err'] = "Les mots de passes que vous avez saisis ne correspondent pas";
               }
            }

            // Make sure errors are empty
            if(empty($data['email_err']) && empty($data['namel_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
               // Validated
               die('SUCCESS');
            } else {
               // Load view with errors
               $this->view("users/register", $data);
            }

         } else {
            // Init data
            $data = [
               "name" => "",
               "email" => "",
               "password" => "",
               "confirm_password" => "",
               "name_error" => "",
               "email_error" => "",
               "password_error" => "",
               "confirm_password_error" => ""
            ];

            // Load view
            $this->view("users/register", $data);
         }
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

            // Make sure errors are empty
            if( empty($data['email_err']) && empty($data['password_err']) ) {
               // Validated
               die('SUCCESS');
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

   }