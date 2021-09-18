<?php
require "../autoloader.php";
require "../class/Post.class.php";
$post=new Post;

if (isset($_GET["post"])){
    $post_id=(int) $_GET["post"];
    $post=$post->deletePost($post_id);
    header("Location: index.php");
}
else{
    die("Veri gönderimi zorunludur!");
}