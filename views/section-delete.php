<?php
require_once '../autoloader.php';
require_once('../class/Section.class.php');
$section = new Section;

if(isset($_GET['section'])) {
    $section_id=(int) $_GET['section'];
    $book=$section->SectionFind($section_id);
    if($book!=false){
    $book=$book["book_id"];
    $section->deleteSection($section_id);
    return header("Location: book.php?id=$book_id");
    }
    else{
        echo "<div class='alert alert-danger' role='alert'><h4 class='alert-heading'>Error</h4>Section id not found!</div>";
        return header("Location: index.php");
    }
}
else{
    die("Veri gönderim işlemi gereklidir.");
}