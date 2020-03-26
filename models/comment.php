<?php require_once("config.php"); ?>
<?php

class Comment {
   private $db;

   public function __construct($db) {
      $this->db = $db;
   }

   public function comment($name, $email, $comment, $published_at, $slug) {
      $sql = "INSERT INTO comments(name, email, comment, published_at, slug) VALUES ('$name', '$email', '$comment', '$published_at', '$slug')";
      $result = $this->db->query($sql);
      return $result;
   }

   public function getCommentBySlug($slug) {
      $sql = "SELECT * FROM comments WHERE slug = '$slug'";
      $result = $this->db->query($sql);
      return $result;
   }
}