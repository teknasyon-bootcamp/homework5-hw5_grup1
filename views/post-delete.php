<?php
require "../autoloader.php";
require "../class/Post.class.php";
$post=new Post;

if (isset($_GET["post"])){
    $post_id=(int) $_GET["post"];
    $book_id=(int) $_GET["book"];
    $post=$post->deletePost($post_id);
    header("Location: book.php?id=$book_id");
}
else{
    die("Veri gönderimi zorunludur!");
}