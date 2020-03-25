<?php 
require_once("config.php");
require_once( ROOT_PATH . "/includes/head_section.php");
include( ROOT_PATH . "/models/post.php");
?>

   <title>Jean Forteroche – Auteur de "Billet simple pour l'Alaska"</title>
</head>

<?php $posts = new Post($db); ?>

<?php 
$posts->deletePostBySlug($_GET["slug"]);
header("Location:result.php");
?>