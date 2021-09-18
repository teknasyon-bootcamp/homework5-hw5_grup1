<?php


class Book
{
    public $db;

    public function __construct()
    {
        $this->db = new database\Database();
    }
    //index.php - Kitap listesi ve her kitap için yazar isimleri yer alıyor mu?
    public function  bookList()
    {
        return $this->db->all("book");
    }
    //kitap silme fonksiyonu
    public function deleteBook(int $id)
    {
        return $this->db->delete("book", $id);
    }

    //kitap güncelleme fonksiyonu 
    public function updateBook(int $id, array $data) 
    {
        return  $this->db->update("book", $id, array($data));
    }

    //kitap ekleme fonksiyonu
    public function addBook(array $data)
    {  
        return  $this->db->create("book", $data);
    }
}
