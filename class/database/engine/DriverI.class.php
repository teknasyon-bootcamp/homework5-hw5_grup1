<?php 
namespace database\engine; // database\engine namespace tanımlaması
interface DriverI
{
    public function all(String $table): array; // all olarak table değerini alacağını ve array olarak dönüş yapacağını belirt
    public function find(String $table, mixed $id): mixed; // find olarak table, id değerlerini alacağını ve mixed olarak dönüş yapacağını belirt
    public function create(String $table, array $values): bool; // create olarak table, values değerlerini alacağını ve boolean olarak dönüş yapacağını belirt
    public function update(String $table, mixed $id,array $values): bool; // update olarak table, id, values değerlerini alacağını ve boolean olarak dönüş yapacağını belirt
    public function delete(String $table, mixed $id): bool; // delete olarak table, id değerlerini alacağını ve boolean olarak dönüş yapacağını belirt
}