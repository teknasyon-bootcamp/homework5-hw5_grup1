<?php 
namespace database\engine; 
interface DriverI
{
    public function all(String $table):array;
    public function find(String $table,mixed $id):mixed;
    public function create(String $table,array $values):bool;
    public function update(String $table,mixed $id,array $values):bool;
    public function delete(String $table,mixed $id):bool;
   // public function sectionList();
}