<?php
require_once '../autoloader.php';
require_once('../class/Book.class.php');
if($_GET['id'])
{
    $book = new Book;
    $book->deleteBook((int)$_GET['id']);
 
    Header('Location: book-store.php');
}
echo "delete işlemi yapıldığı fonksıyon";


// deleteBook fonksıyonuna id ile gidip silme işlemi yapılıyor return == true ise evet silindi.