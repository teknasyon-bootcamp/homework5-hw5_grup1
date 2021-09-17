<?php

class Post
{
    public $db;
    public function __construct()
    {
        $this->db = new database\Database();
    }

    public function  postList()
    {
        return $this->db->all("post");
    }

    public function deletePost(int $id)
    {
        return $this->db->delete("post", $id);
    }

    public function updatePost(int $id, array $data)
    {
        return  $this->db->update("post", $id, array($data));
    }

    public function addPost(array $data)
    {
        return  $this->db->create("post", array($data));
    }
}