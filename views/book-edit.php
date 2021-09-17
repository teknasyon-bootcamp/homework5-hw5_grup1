<?php

if(isset($_GET['id']))
{
    echo "kitap editleme ve guncelleme formu";
    $deneme =new Book;
    $edit-> editBook($_GET['id']);
    $update->updateBook($_GET['id'],$field);
 
}


//editBook id ile gidicek update ile edit aynı şey return true sa kitap guncellendi & editlendşi ?