<?php

class Book{
	public $db;
	public function __construct(){
	$this->db = new database\Database();
	}
    //index.php - Kitap listesi ve her kitap için yazar isimleri yer alıyor mu?
     public function  bookList(){
		$this->db->create("book",array("name"=>"sam","summary"=>"faasd","author"=>"asdasd","page_count"=>22,"image_url"=>"asdasd"));
		print_r($this->db->all("book"));
	
	}
    //kitap silme fonksiyonu
    public function deleteBook(int $id)
    {
       $this->db->delete("book",$id);

       print_r($this->db->all("book"));

    }
    
    /*// kitap editleme fonksiyonu
    public function edit_Book(int $id)
    {
        $this->db->update("book",$id,array("name"=>"sam","summary"=>"faasd","author"=>"asdasd","page_count"=>22,"image_url"=>"asdasd"));
        print_r($this->db->all("book"));
    } */

    //kitap güncelleme fonksiyonu 
    public function updateBook(int $id) // field bir array  içinde book sütünları var
    {
        $this->db->update("book",$id,array("name"=>"sam","summary"=>"faasd","author"=>"asdasd","page_count"=>22,"image_url"=>"asdasd"));
        print_r($this->db->all("book"));

    }
     
    //kitap ekleme fonksiyonu
    public function addBook(){   // field bir array  içinde book sütünları var
        $this->db->create("book",array("name"=>"deneme","summary"=>"faasd","author"=>"deneme","page_count"=>223,"image_url"=>"deneme"));
        print_r($this->db->all("book"));


    }
    // kitaba yeni bölüm ekleme fonksiyonu
    public function sectionAdd(){ // field bir array  içinde sectionun sütünları var
        $this->db->create("section",array("name"=>"deneme","created_at"=>"faasd","update_at"=>"deneme"));
        print_r($this->db->all("section"));   

    }
    // kitapta bölüm editleme fonksiyonu 
    public function sectionEdit(int $id)
    {
     
        $this->db->update("section",$id,array("name"=>"deneme","created_at"=>"faasd","update_at"=>"deneme"));
        print_r($this->db->all("section"));   

    } 
    // kitapta ki bölümleri güncelleme fonksiyonu 
    public function sectionUpdate(array $field, $id) // field bir array  içinde book sütünları var
    {
        $this->db->update("section",$id,array("name"=>"deneme","created_at"=>"faasd","update_at"=>"deneme"));
        print_r($this->db->all("section"));   
    }

    //kitaptan bölüm silme fonksiyonu
    public function deleteSection(int $id)
    {
      $this->db->delete("section",$id);
      print_r($this->db->all("section"));  
    }

    //kitaptaki bölümü var ise listele 
    public function sectionList()
    {
      $this->db->sectionList();
      print_r($this->db->all("book"));  
    }

}