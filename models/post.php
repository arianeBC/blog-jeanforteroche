<?php
require_once("config.php");

class Post {
   private $db;

   public function __construct($db) {
      $this->db = $db;
   }

   public function addPost($slug, $title, $excerpt, $content, $image, $created_at) {
      $sql    = "INSERT INTO posts (slug, title, excerpt, content, image, created_at) VALUES ('$slug', '$title', '$excerpt', '$content', '$image', '$created_at')";
      $result = $this->db->query($sql);
      return $result;
   }

   public function getPost() {
      $sql    = "SELECT * FROM posts ORDER BY created_at DESC";
      $result = $this->db->query($sql);
      return $result;
   }

   public function getLastPosts($numberOfPost) {
      $sql    = "SELECT * FROM posts ORDER BY created_at DESC LIMIT $numberOfPost";
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
      $sql    = "DELETE FROM posts WHERE posts.slug = '$slug'";
      $result = $this->db->query($sql);
      return $result;
   }

   public function updatePost($title, $excerpt, $content, $updated_at, $slug) {
      $newImage = $_FILE["image"]["name"];
      if(!empty($newImage)) {
         $image  = uploadImage();
         $sql    = "UPDATE posts SET title='$title', excerpt='$excerpt', content='$content', image='$image', updated_at='$updated_at' WHERE slug = '$slug'";
         $result = $this->db->query($sql);
         return $result;
      } else {
         $sql    = "UPDATE posts SET title='$title', excerpt='$excerpt', content='$content', updated_at='$updated_at' WHERE slug = '$slug'";
         $result = $this->db->query($sql);
         return $result;
      }
   }
}


