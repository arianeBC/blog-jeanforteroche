<?php 
   class Post {
      private $db;

      public function __construct() {
         $this->db = new Database;
      }

      public function getPosts() {
         $this->db->query("SELECT * FROM posts ORDER BY created_at DESC");

         $results = $this->db->resultSet();

         return $results;
      }

      public function getLastPosts($numberOfPosts) {
         $this->db->query("SELECT * FROM posts ORDER BY created_at DESC LIMIT :numberOfPost");

         $this->db->bind(":numberOfPost", $numberOfPosts);

         $results = $this->db->resultSet();

         return $results;
      }

      public function addPost($data) {
         $this->db->query("INSERT INTO posts (id_user, title, excerpt, content, image, created_at) VALUES(:id_user, :title, :excerpt, :content, :image, :created_at)");
         // Bind values
         $this->db->bind(":id_user", $data['user_id']);
         $this->db->bind(":title", $data['title']);
         $this->db->bind(":excerpt", $data['excerpt']);
         $this->db->bind(":content", $data['content']);
         $this->db->bind(":image", $data['image']);
         $this->db->bind(":created_at", date("Y-m-d"));

         // Execute
         if($this->db->execute()) {
            return true;
         } else {
            return false;
         }
      }

      public function updatePost($data) {
         if($data['image']) {
            $this->db->query("UPDATE posts SET title = :title, excerpt = :excerpt, content = :content, image = :image, updated_at = :updated_at WHERE posts.id_post = :id_post");
            // Bind values 
            $this->db->bind(":id_post", $data['id_post']);
            $this->db->bind(":title", $data['title']);
            $this->db->bind(":excerpt", $data['excerpt']);
            $this->db->bind(":content", $data['content']);
            $this->db->bind(":image", $data['image']);
            $this->db->bind(":updated_at", date("Y-m-d"));

            // Execute
            if($this->db->execute()) {
               return true;
            } else {
               return false;
            }
         } else {
            $this->db->query("UPDATE posts SET title = :title, excerpt = :excerpt, content = :content, updated_at = :updated_at WHERE posts.id_post = :id_post");
            // Bind values 
            $this->db->bind(":id_post", $data['id_post']);
            $this->db->bind(":title", $data['title']);
            $this->db->bind(":excerpt", $data['excerpt']);
            $this->db->bind(":content", $data['content']);
            $this->db->bind(":updated_at", date("Y-m-d"));

            // Execute
            if($this->db->execute()) {
               return true;
            } else {
               return false;
            }
         }
      }

      public function getPostById($id_post) {
         $this->db->query("SELECT posts.*, users.user_name FROM posts INNER JOIN users ON (posts.id_user = users.id_user) WHERE id_post = :id_post");
         $this->db->bind(":id_post", $id_post);

         $row = $this->db->single();

         return $row;
      }

      public function deletePost($id_post) {
         $this->db->query("DELETE FROM posts WHERE id_post = :id_post");
         // Bind values
         $this->db->bind(":id_post", $id_post);

         // Execute
         if($this->db->execute()) {
            return true;
         } else {
            return false;
         }
      }

   }