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

      public function getCommentById($id_post) {
         $this->db->query("SELECT * FROM comments WHERE id_post = :id_post ORDER BY published_at DESC");
         $this->db->bind(":id_post", $id_post);

         $results = $this->db->resultSet();

         return $results;
      }

      public function commentCount($id_post) {
         $this->db->query("SELECT * FROM comments WHERE id_post = :id_post");
         $this->db->bind(":id_post", $id_post);

         $results = $this->db->resultSet();

         $row = $this->db->rowCount();

         return $row;
      }

      public function addComment($data) {
         $this->db->query("INSERT INTO comments (id_post, name, email, comment, published_at, status) VALUES(:id_post, :name, :email, :comment, :published_at, :status)");
         // Bind values
         $this->db->bind(":id_post", $data['id_post']);
         $this->db->bind(":name", $data['name']);
         $this->db->bind(":email", $data['email']);
         $this->db->bind(":comment", $data['comment']);
         $this->db->bind(":published_at", date("Y-m-d"));
         $this->db->bind(":status", 1);

         // Execute
         if($this->db->execute()) {
            return true;
         } else {
            return false;
         }

      }

      public function flagComment($id_comment) {
         $this->db->query("UPDATE comments SET status=0 WHERE id_comment = :id_comment");
         // Bind values
         $this->db->bind(":id_comment", $id_comment);

         // Execute
         if($this->db->execute()) {
            return true;
         } else {
            return false;
         }
      }

      public function pendingComments() {
         $this->db->query("SELECT * FROM comments WHERE status=0 ORDER BY published_at DESC");

         $results = $this->db->resultSet();

         return $results;
      }

      public function pendingCommentCount() {
         $this->db->query("SELECT * FROM comments WHERE status=0");

         $results = $this->db->resultSet();

         $row = $this->db->rowCount();

         return $row;
      }

      public function deleteComment($id_comment) {
         $this->db->query("DELETE FROM comments WHERE id_comment = :id_comment");

         $this->db->bind(":id_comment", $id_comment);

         // Execute
         if($this->db->execute()) {
            return true;
         } else {
            return false;
         }
      }

      public function updateComment($id_comment) {
         $this->db->query("UPDATE comments SET status=1 WHERE id_comment = :id_comment");
         // Bind values
         $this->db->bind(":id_comment", $id_comment);

         // Execute
         if($this->db->execute()) {
            return true;
         } else {
            return false;
         }
      }

      public function pagination($noPage) {
         $this->db->query("SELECT * FROM posts");
         $results = $this->db->resultSet();
         $row = $this->db->rowCount();
         $totalRecords = $row;
         $limit = 6;
         $totalPages = ceil($totalRecords/$limit);

         $pageLink = "<ul class='pagination justify-content-center'>";

         $page = $noPage;
         
         if($page > 1) {
            $pageLink .= "<a class='arrow' href='" .URLROOT. "/posts/episodes/" .($page-1). "'><i class='fas fa-arrow-left'></i></a>";
         }
   
         for($i=1; $i<=$totalPages; $i++) {
            $pageLink .= "<a class='page-link' href='" .URLROOT. "/posts/episodes/" .$i. "'>" .$i. "</a>";
         }
   
         if($page < $totalPages) {
            $pageLink .= "<a class='arrow' href='" .URLROOT. "/posts/episodes/" .($page+1). "'><i class='fas fa-arrow-right'></i></a>";
         }
   
         return $pageLink."</ul>";
      }

      public function getPostsLimit($limit) {
         $page = getUrl();
         $start = ($page[2]-1)*$limit;
   
         $this->db->query("SELECT * FROM posts ORDER BY created_at DESC LIMIT $start, $limit");

         $results = $this->db->resultSet();

         return $results;
      }

   }