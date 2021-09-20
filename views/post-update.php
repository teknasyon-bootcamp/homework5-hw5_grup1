<?php
require_once '../autoloader.php';
$post = new Post;

if(isset($_POST['content'])) {
    $post_id=$_GET['post'];
    $author=(string) $_POST['author'];
    $content=(string) $_POST['content'];
    $post=$post->FindAll(["id"=>$post_id]);

    if ($post[0]["book_id"]==0){
        //kitabın postu değil section postu, sectiondan book_id yi alıyoruz
        $section=$section->FindAll(["id"=>$post[0]["section_id"]]);
        $book_id=$section[0]["book_id"];
    }
    else{
        //postun book_id si dolu ise book_id direk o
        $book_id=$post[0]["book_id"];
    }

    $fields = [
        'author' => $author,
        'content' => $content,
    ];
    $post=new Post;
    $post->updatePost($post_id,$fields);
    return header("Location: book.php?id=$book_id");
}
else{
    die("Post veri gönderim işlemi gereklidir.");
}