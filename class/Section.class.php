<?php

class Section
{
    public $db;
    public function __construct()
    {
        $this->db = new database\Database();
    }
    //tabloda sütun adına göre sorgu yapılabilecek method
    public function FindAll(array $data)
    {
        return $this->db->findAll("section",$data);
    }
    //tablodaki tüm sectionları getiren method
    public function  sectionList()
    {
        return $this->db->all("section");
    }
    //id ye göre section tablosundan ilgili section silen method
    public function deleteSection(int $id)
    {
        return $this->db->delete("section", $id);
    }
    //id ve array data ya göre section tablosundan ilgili sectiona güncelleme işlemi yapan method
    public function updateSection(int $id, array $data)
    {
        return  $this->db->update("section", $id, $data);
    }
    //gelen data verilerine göre tabloya section ekleyen method
    public function addSection(array $data)
    {
        return  $this->db->create("section", $data);
    }
}