<?php require_once("config.php"); ?>

<?php 
class Post {
   private $db;

   public function __construct($db) {
      $this->db = $db;
   }

   public function addPost($slug, $id_user, $title, $excerpt, $content, $image, $created_at) {
      $sql    = "INSERT INTO posts (slug, id_user, title, excerpt, content, image, created_at) VALUES ('$slug', '$id_user', '$title', '$excerpt', '$content', '$image', '$created_at')";
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
      $sql    = "UPDATE posts SET title='$title', excerpt='$excerpt', content='$content', updated_at='$updated_at' WHERE posts.slug = '$slug'";
      $result = $this->db->query($sql);
      return $result;
   }

   public function updatePostImage($title, $excerpt, $content, $image, $updated_at, $slug) {
      $sql    = "UPDATE posts SET title='$title', excerpt='$excerpt', content='$content', image='$image', updated_at='$updated_at' WHERE posts.slug = '$slug'";
      $result = $this->db->query($sql);
      return $result;
   }
}


