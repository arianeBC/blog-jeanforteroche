<?php require_once("config.php"); ?>
<?php

class Comment {
   private $db;

   public function __construct($db) {
      $this->db = $db;
   }

   public function addUser($id_user, $id_group, $user_name, $email, $password, $date_created) {
      $sql = "INSERT INTO users (id_user, id_group, user_name, email, password, date_created) VALUES (NULL, '$id_group', '$user_name', '$email', '', '$date_created')";
      $result = $this->db->query($sql);
      return $result;
   }

   public function addComment($id_user, $id_post, $comment, $published_at) {
      $sql = "INSERT INTO comments(id_user, id_post, comment, published_at) VALUES ('$id_user', '$id_post', '$comment', '$published_at')";
      $result = $this->db->query($sql);
      return $result;
   }

   public function findIdUser($username) {
      $sql = "SELECT id_group, user_name FROM users WHERE user_name = '$username'";
      $result = $this->db->query($sql);
      $row = $result->fetch_array(MYSQLI_ASSOC);
      if (($result->num_rows) > 0) {
         $_SESSION['login'] = $_POST['login'];
         $user_name = $row['user_name'];
         $_SESSION['userid'] = $row['id_user'];
         header("location:result.php");
      }
   }

   public function findIdPost($slug) {
      $sql = "SELECT id_post, slug FROM posts WHERE slug = '$slug'";
      $result = $this->db->query($sql);
      return $result;
   }
}