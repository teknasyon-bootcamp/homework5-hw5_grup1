<?php
namespace export;
require_once '../autoloader.php';

if(isset($_GET['op'])){
    if ($_GET['op'] == "book")
    {
        $books = new \Book();
        echo json_encode($books->bookList());
    }
    elseif ($_GET['op'] == "section")
    {
        $sections = new \Section();
        echo json_encode($sections->sectionList());
    }
    elseif ($_GET['op'] == "post")
    {
        $posts = new \Post();
        echo json_encode($posts->postList());
    }
}
