<?php

class Post
{
    public $db;
    public function __construct()
    {
        $this->db = new database\Database();
    }
    //tabloda sütun adına göre sorgu yapılabilecek method
    public function FindAll(array $data)
    {
        return $this->db->findAll("post",$data);
    }
    //tablodaki tüm postları getiren method
    public function  postList()
    {
        return $this->db->all("post");
    }
    //id ye göre post tablosundan ilgili postu silen method
    public function deletePost(mixed $id)
    {
        return $this->db->delete("post", $id);
    }
    //id ve array data ya göre post tablosundan ilgili posta güncelleme işlemi yapan method
    public function updatePost(mixed $id,$data)
    {
        return  $this->db->update("post", $id, $data);
    }
    //gelen data verilerine göre tabloya post ekleyen method
    public function addPost(array $data)
    {
        return  $this->db->create("post", $data);
    }
}
