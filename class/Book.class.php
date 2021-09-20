<?php


class Book
{
    public $db;

    public function __construct()
    {
        $this->db = new database\Database();
    }
    //tabloda sütun adına göre sorgu yapılabilecek method
    public function FindAll(array $data){
        return $this->db->findAll( "book", $data);
    }
    //tablodaki tüm kitapları getiren method
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
        return  $this->db->update("book", $id, $data);
    }

    //kitap ekleme fonksiyonu
    public function addBook(array $data)
    {  
        return  $this->db->create("book", $data);
    }
}
