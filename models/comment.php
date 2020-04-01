<?php require_once("config.php"); ?>
<?php

class Comment {
   private $db;

   public function __construct($db) {
      $this->db = $db;
   }

   public function getCommentBySlug($slug) {
      $sql = "SELECT * FROM comments WHERE slug='$slug' ORDER BY published_at DESC";
      $result = $this->db->query($sql);
      return $result;
   }

   public function comment($name, $email, $comment, $published_at, $slug, $status) {
      $sql = "INSERT INTO comments(name, email, comment, published_at, slug, status) VALUES ('".addslashes($name)."', '$email', '".addslashes($comment)."', '$published_at', '$slug', '$status')";
      $result = $this->db->query($sql);
      return $result;
   }

   public function getPendingComments() {
      $sql = "SELECT * FROM comments WHERE status=0 ORDER BY published_at DESC";
      $result = $this->db->query($sql);
      return $result;
   }

   public function approveComment($id) {
      $sql = "UPDATE comments SET status=1 WHERE comments.id_comment='$id'";
      $result = $this->db->query($sql);
      return $result;
   }

   public function updateComment($id) {
      $sql = "UPDATE comments SET status=0 WHERE comments.id_comment='$id'";
      $result = $this->db->query($sql);
      return $result;
   }

   public function deleteComment($id) {
      $sql = "DELETE FROM comments WHERE comments.id_comment='$id'";
      $result = $this->db->query($sql);
      return $result;
   }

   public function countComments($slug) {
      $sql = "SELECT * FROM comments WHERE slug='$slug'";
      $checkComments = $this->db->query($sql);
      $result = $checkComments->num_rows;
      return $result;
   }

   public function countPendingComments() {
      $sql = "SELECT * FROM comments WHERE status=0";
      $checkPendings = $this->db->query($sql);
      $result = $checkPendings->num_rows;
      return $result;
   }
}