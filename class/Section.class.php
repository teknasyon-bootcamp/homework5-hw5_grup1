<?php

class Section
{
    public $db;
    public function __construct()
    {
        $this->db = new database\Database();
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
        return  $this->db->update("section", $id, array($data));
    }

    public function addSection(array $data)
    {
        return  $this->db->create("section", array($data));
    }
}
