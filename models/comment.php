<?php require_once("config.php"); ?>
<?php

class Comment {
   private $db;

   public function __construct($db) {
      $this->db = $db;
   }

   public function comment($name, $email, $comment, $published_at, $slug, $status) {
      $sql = "INSERT INTO comments(name, email, comment, published_at, slug, status) VALUES ('$name', '$email', '$comment', '$published_at', '$slug', '$status')";
      $result = $this->db->query($sql);
      return $result;
   }

   public function getCommentBySlug($slug) {
      $sql = "SELECT * FROM comments WHERE slug='$slug' AND status=1 ORDER BY published_at DESC";
      $result = $this->db->query($sql);
      return $result;
   }

   public function countComments($slug) {
      $sql = "SELECT * FROM comments WHERE slug='$slug' AND status=1 ORDER BY published_at DESC";
      $checkComments = $this->db->query($sql);
      $result = $checkComments->num_rows;
      return $result;
   }
}