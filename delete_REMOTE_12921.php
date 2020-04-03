<?php 
require_once("config.php");
include( ROOT_PATH . "/models/post.php");
require_once( ROOT_PATH . "/includes/head_section.php");
$posts = new Post($db);
$posts->deletePostBySlug($_GET['slug']);
header("Location:result.php");