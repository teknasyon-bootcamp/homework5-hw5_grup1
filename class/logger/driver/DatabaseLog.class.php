<?php
namespace logger\driver; // logger\driver namespace tanımlanması

use database\Database; // database\Database olarak kullan
use database\engine\DriverI; // database\engine\DriverI olarak kullan

class DatabaseLog implements LogDriverI // DatabaseLog class ını oluştur ve LogDriverI interface'ini implement'e et
{
    private Database $db; // database nesnesi için özel db property'si

    public function __construct(
        private DriverI $driver // database işlemleri için özel driver properpty'si
    )
    {
        $this->setUp(); // yapıcı fonksiyon içerisinde setUp fonksiyonunu çalıştır
    }

    public function setDriver(Driver $driver): void // setDriver olarak driver değerini alacağını ve void değeri ile dönüş yapacağını belirt
    {
        $this->driver = $driver; // driver değerini driver property'sine atayarak driver'ı düzenle
    }

    public function setUp(): void // setUp olarak hiç değer almacağını ve void değeri ile dönüş yapacağını belirt
    {
        $this->db = new \database\Database(); // database nesnesi oluşturup db property'sine tanımla
    }

    public function log(string $message, int $level): void // log olarak message, level değerlerini alacağını ve void değeri ile dönüş yapacağını belirt
    {
        $created_at = date("Y-m-d H:i:s"); // 0000-00-00 00:00:00 formatında date değerini oluşturup created_at'e ata

        $this->db->create("logs",[
            "message" => ($message),
            "level" => ($level),
            "created_at" => ($created_at)
            ]); // logs tablosuna log değerlerini ekle

        $this->tearDown(); // işlem sonunda tearDown ile işlemi bitir
    }

    public function tearDown(): void // tearDown olarak değer almayacağını ve void değeri ile dönüş yapacağını belirt
    {
        $this->db = null; // db property'sini null yaparak boşalt
    }
}

