<?php
namespace logger\driver; // logger\driver namespace tanımlaması
interface LogDriverI
{
    public function setUp(): void; // setUp fonksiyonunu değer almayacağını ve dönüş değerinin void olarak tanımlanması
    public function log(string $message, int $level): void; // log fonksiyonunu message ve level değerlerini alacağını ve dönüş değerinin void olarak tanımlanması
    public function tearDown(): void; // tearDown fonksiyonunu değer almayacağını ve dönüş değerinin void olarak tanımlanması
}
