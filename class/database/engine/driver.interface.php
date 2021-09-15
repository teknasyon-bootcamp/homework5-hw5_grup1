<?php
interface Driver
{
    public function all(String $table):array;
    public function find(String $table,$id):mixed;
    public function create(String $table,$values):bool;
    public function update(String $table,$id,$values):bool;
    public function delete(String $table,$id):bool;
}