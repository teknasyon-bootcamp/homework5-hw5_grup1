<?php
interface Driver
{
    public function all(String $table):array;
    public function find(String $table,mixed $id):mixed;
    public function create(String $table,array $values):bool;
    public function update(String $table,mixed $id,array $values):bool;
    public function delete(String $table,mixed $id):bool;
}