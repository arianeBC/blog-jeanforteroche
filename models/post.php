<?php
require_once("config.php");

class Post {
   private $db;

   public function __construct($db) {
      $this->db = $db;
   }

   public function addPost($slug, $title, $excerpt, $content, $image, $created_at) {
      $sql = "INSERT INTO posts (slug, title, excerpt, content, image, created_at) VALUES ('$slug', '$title', '$excerpt', '$content', '$image', '$created_at')";
      $result = $this->db->query($sql);
      return $result;
   }

   public function getPost() {
      $sql = "SELECT * FROM posts ORDER BY created_at DESC";
      $result = $this->db->query($sql);
      return $result;
   }

   public function getSinglePost($slug) {
      $sql =
         "SELECT posts.*, users.user_name
         FROM posts
         INNER JOIN users
         ON (posts.id_user = users.id_user)
         WHERE slug = '$slug'";
      $result = $this->db->query($sql);
      return $result;
   }

   public function deletePostBySlug($slug) {
      $sql = "SELECT * FROM posts WHERE slug = '$slug'";
      $result = $this->db->query($sql);
      return $result;
   }
}


