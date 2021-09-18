<?php

class Section
{
    public $db;
    public function __construct()
    {
        $this->db = new database\Database();
    }
    public function FindAll(array $data)
    {
        //return $this->db->find("book",$id);
        return $this->db->findAll("section",$data);
    }
    public function  SectionFind(int $id)
    {
        return $this->db->find("section",$id);
    }
    public function  sectionList()
    {
        return $this->db->all("section");
    }

    public function deleteSection(int $id)
    {
        return $this->db->delete("section", $id);
    }

    public function updateSection(int $id, array $data)
    {
        return  $this->db->update("section", $id, $data);
    }

    public function addSection(array $data)
    {
        return  $this->db->create("section", $data);
    }
}