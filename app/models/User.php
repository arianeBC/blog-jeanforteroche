<?php 
   class User {
      private $db;

      public function __construct() {
         $this->db = new Database;
      }

      // Register user
      public function register($data) {
         $this->db->query("INSERT INTO users (id_group, user_name, email, password, date_created) VALUES(:id_group, :user_name, :email, :password, :date_created)");
         // Bind values
         $this->db->bind(":id_group", 4);
         $this->db->bind(":user_name", $data['name']);
         $this->db->bind(":email", $data['email']);
         $this->db->bind(":password", $data['password']);
         $this->db->bind(":date_created", date("Y-m-d"));

         // Execute
         if($this->db->execute()) {
            return true;
         } else {
            return false;
         }
      }

      // Find user by email
      public function findUserByEmail($email) {
         $this->db->query("SELECT * FROM users WHERE email = :email");
         // Bind value
         $this->db->bind(":email", $email);

         $row = $this->db->single();

         // Check row
         if($this->db->rowCount() > 0) {
            return true;
         } else {
            return false;
         }
      }

   }