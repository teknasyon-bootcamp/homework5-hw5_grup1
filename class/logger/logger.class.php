<?php
namespace logger; // logger namespace tanımlaması

use database\Database; // database\Database 'ı kullan
use logger\driver\{
    DatabaseLog,  // logger\driver\DatabaseLog 'u kullan
    FileLog, // logger\driver\FileLog 'u kullan
    LogDriverI // logger\driver\LogDriverI 'ı kullan
};
use logger\loggableI; // logger\loggableI 'ı kullan

class logger implements loggableI // logger sınıfı oluştur ve loggableI'ı implement'e et
{
    protected LogDriverI $logdriver; // protected olarak LogDriverI tipinde logdriver property'sini tanımla

    public function __construct()
    {
        $logging = "null"; // null değerini logging'e ata
        // Config
        $configdir = (__DIR__)."/../../config.php"; // config bilgilerinin bulunduğu dosyayı configdir'e ata
        if (file_exists($configdir)) // configdir içerisinde tanımlı dosya mevcutsa
        {
            $this->config = require $configdir; // configdir içerisindeki dosyada verilen değerleri config property'sine ata
            $logging= $this->config["logging"]; //config logging değerini engine property'sine ata
        }

        if ($logging == "database") // logging değeri database ise
        {
            $this->logdriver = new DatabaseLog(new Database()); // yeni database nesnesi ile DatabaseLog nesnesini oluşturup logdriver property'sine ata
        }
        elseif ($logging == "file") // logging değeri file ise
        {
            $this->logdriver = new FileLog(); // FileLog nesnesi oluşturup logdriver property'sine ata
        }
        elseif ($logging == "null") // logging değeri null ise
        {
            return; // varsayılan değer döndür
        }

        $this->setDriver($this->logdriver); // güncel logdriver property değerini setDriver fonksiyonunda kullan
    }

    public function setDriver(LogDriverI $logdriver):void // setDriver olarak logdriver değerini alacağını ve void değeri ile dönüş yapacağını belirt
    {
        $this->logdriver = $logdriver; // alınan logdriver değerini logdriver property'sine ata
    }

    public static function log(string $message, int $level):void // static log olarak message, level değerlerini alacağını ve void ile dönüş yapacağını belirt
    {
        $log = new static(); // logger class tipinde nesneyi oluşturup log'a ata

        if (isset($log->logdriver)) // log nesnesinin içinde logdriver varsa
        {
            $log->logdriver->log($message, $level); // log nesnesindeki ilgili driverdaki log fonksiyonunu message, level değerleriyle çalıştır
        }
    }
}
