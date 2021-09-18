<?php
namespace logger;

use database\Database;
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

        if ($this->logging == "database")
        {
            $this->logdriver = new DatabaseLog(new Database());
        }
        elseif ($this->logging == "file")
        {
            $this->logdriver = new FileLog();
        }
        elseif ($this->logging == "null")
        {
            return;
        }

        $this->setDriver($this->logdriver);
    }

    public function setDriver(LogDriverI $logdriver):void
    {
        $this->logdriver = $logdriver;
    }

    public static function log(string $message, int $level):void
    {
        $log = new static();

        if (isset($log->logdriver))
        {
            $log->logdriver->log($message, $level);
        }
    }
}
