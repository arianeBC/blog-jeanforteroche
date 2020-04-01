<!-- include "header.php"; -->
<!-- include "/models/post.php"; -->
<!-- $posts = new Post($db); -->

<?php 
$posts->deletePostBySlug($_GET['slug']);
header("Location:result.php");
?>