<<<<<<< HEAD
<!-- include "header.php"; -->
<!-- include "/models/post.php"; -->
<!-- $posts = new Post($db); -->

<?php 
=======
<?php 
require_once("config.php");
include( ROOT_PATH . "/models/post.php");
require_once( ROOT_PATH . "/includes/head_section.php");
$posts = new Post($db);
>>>>>>> second-version-blog
$posts->deletePostBySlug($_GET['slug']);
header("Location:result.php");