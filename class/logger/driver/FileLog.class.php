<?php
namespace logger\driver; // logger\driver namespace tanımlanması

class FileLog implements LogDriverI // FileLog class ını oluştur ve LogDriverI interface'ini implement'e et
{
    public function __construct(
        private string $logFile = "file.log" // özel property olarak logFile al. değer yoksa varsayılan değeri kullan
    )
    {
        $this->setUp(); // yapıcı fonksiyon içerisinde setUp fonksiyonunu çalıştır
    }

    public function setLogFile(string $logFile): void // setLogFile olarak logFile dosyasını alacağını ve void değeri ile dönüş yapacağını belirt
    {
        $this->logFile = $logFile; // alınan logFile değerini logFile property'sine ata
    }

    public function setUp(): void // setUp olarak hiç değer almacağını ve void değeri ile dönüş yapacağını belirt
    {
        if(!file_exists($this->logFile)) { // logFile property'sindeki dosya mevcutsa
            file_put_contents($this->logFile, " ------ Log File Created ------ ".PHP_EOL, FILE_APPEND); // logFile dosyası yoksa içerisine oluşturuldu mesajını yazıp dosyayı oluştur
        }
    }

    public function log(string $message, int $level): void // log olarak message, level değerlerini alacağını ve void değeri ile dönüş yapacağını belirt
    {
        $created_at = date("Y-m-d H:i:s"); // 0000-00-00 00:00:00 formatında date değerini oluşturup created_at'e ata

        $logText = $level." ".$created_at." ".$message.PHP_EOL; // log yazısına sırasıyla level, created_at, message değerlerini yan yana yazıp logText'e ata

        file_put_contents($this->logFile,$logText,FILE_APPEND); // logFile varsa logText'i sona ekleyerek yaz . yoksa oluşturup yaz

        $this->tearDown(); // işlem sonunda tearDown ile işlemi bitir
    }

    public function tearDown(): void // tearDown olarak değer almayacağını ve void değeri ile dönüş yapacağını belirt
    {
        $this->logFile = null; // logFile property'sini null yaparak boşalt
    }
}

