<?php 
include "db.php";
$db = new Db();

class Post {
   private $db;

   public function __construct($db) {
      $this->db = $db;
   }

   public function addPost($slug, $id_user, $title, $excerpt, $content, $image, $created_at) {
      $sql    = "INSERT INTO posts (slug, id_user, title, excerpt, content, image, created_at) VALUES ('$slug', '$id_user', '".addslashes($title)."', '".addslashes($excerpt)."', '".addslashes($content)."', '$image', '$created_at')";
      $result = $this->db->query($sql);
      return $result;
   }

   public function getPostsLimit($limit) {
      if(isset($_GET['page'])) {
         $page = $_GET['page'];
      } else {
         $page = 1;
      }
      $start  = ($page-1)*$limit;
      $sql    = "SELECT * FROM posts ORDER BY created_at DESC LIMIT $start, $limit";
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
      $sql    = "UPDATE posts SET title='".addslashes($title)."', excerpt='".addslashes($excerpt)."', content='".addslashes($content)."', updated_at='$updated_at' WHERE posts.slug = '$slug'";
      $result = $this->db->query($sql);
      return $result;
   }

   public function updatePostImage($title, $excerpt, $content, $image, $updated_at, $slug) {
      $sql    = "UPDATE posts SET title='".addslashes($title)."', excerpt='".addslashes($excerpt)."', content='".addslashes($content)."', image='$image', updated_at='$updated_at' WHERE posts.slug = '$slug'";
      $result = $this->db->query($sql);
      return $result;
   }

   public function pagination($postPerPage) {
      $sql = "SELECT COUNT(id_post) FROM posts";
      $result = $this->db->query($sql);
      $row = $result->fetch_row();
      $totalRecords = $row[0];
      $totalPages = ceil($totalRecords/$postPerPage);
      $pageLink = "<ul class='pagination justify-content-center'>";

      $page = $_GET['page'];
      if($page > 1) {
         $pageLink .= "<a class='arrow' href='episodes.php?page=".($page-1)."'><i class='fas fa-arrow-left'></i></a>";
      }

      for($i=1; $i<=$totalPages; $i++) {
         $pageLink .= "<a class='page-link' href='episodes.php?page=" .$i. "'>" .$i. "</a>";
      }

      if($page < $totalPages) {
         $pageLink .= "<a class='arrow' href='episodes.php?page=".($page+1)."'><i class='fas fa-arrow-right'></i></a>";
      }

      echo $pageLink."</ul>";
   }
}


