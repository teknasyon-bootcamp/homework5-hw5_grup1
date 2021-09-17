<?php
namespace logger\driver;

use database\Database;
use database\engine\DriverI;

class FileLog implements LogDriverI
{
    public function __construct(
        private string $logFile = "file.log"
    )
    {
        $this->setUp();
    }

    public function setLogFile(string $logFile): void
    {
        $this->logFile = $logFile;
    }

    public function setUp(): void
    {
        if(!file_exists($this->logFile)) {
            file_put_contents($this->logFile, " ------ Log File Created ------ ".PHP_EOL, FILE_APPEND);
        }
    }

    public function log(string $message, int $level): void
    {
        $created_at = date("Y-m-d H:i:s");

        $logText = $level." ".$created_at." ".$message.PHP_EOL;

        file_put_contents($this->logFile,$logText,FILE_APPEND);
    }

    public function tearDown(): void
    {
        $this->logFile = null;
    }
}

