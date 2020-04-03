<?php 
require_once("config.php");
include( ROOT_PATH . "/models/post.php");
require_once( ROOT_PATH . "/includes/head_section.php")
?>

   <title>Jean Forteroche – Auteur de "Billet simple pour l'Alaska"</title>
</head>

<?php 
$posts = new Post($db);
$posts->deletePostBySlug($_GET['slug']);
header("Location:result.php");