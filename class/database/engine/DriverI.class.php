<?php 
namespace database\engine; 
interface DriverI
{
    public static function all(String $table):array;
    public static function find(String $table,mixed $id):mixed;
    public static function create(String $table,array $values):bool;
    public static function update(String $table,mixed $id,array $values):bool;
    public static function delete(String $table,mixed $id):bool;
}