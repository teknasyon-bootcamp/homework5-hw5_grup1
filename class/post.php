<?php
require_once "database\Database();";

class Post extends DB
{
    public int $post_id;
    public int $book_id;
    public string $title = '';
    public string $content = '';

    public function __construct()
    {
    }
}
