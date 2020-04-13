
<?php
   function pagination($postPerPage) {
      $this->db->query("SELECT COUNT(id_post) FROM posts");
      $results = $this->db->resultSet();
      // $sql = "SELECT COUNT(id_post) FROM posts";
      // $result = $this->db->query($sql);
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