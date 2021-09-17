<?php
namespace App\Logger;

use logger\driver\{
    DatabaseLog,
    FileLog,
    LogDriverI
};
use logger\loggableI;

class logger implements loggableI
{
    protected LogDriverI $logdriver;

    public function __construct()
    {
        // Config
        $configdir = (__DIR__)."/../../config.php";
        if(file_exists($configdir)){
            $this->config = require $configdir;
            $this->logging= $this->config["logging"];
        }

        if($this->logging == "database" ){
            $this->logdriver = new DatabaseLog();
        }elseif($this->logging == "file"){
            $this->logdriver = new FileLog();
        }

        $this->setDriver($this->logdriver);
    }

    protected function setDriver(LogDriverI $logdriver):void
    {
        $this->logdriver = $logdriver;
    }

    public static function log(string $message, int $level):void
    {
        $log = new static();
        $log->logdriver->log($message, $level);
    }
}
