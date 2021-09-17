<?php

namespace App\Logger;

use logger\loggableI;

class logger implements loggableI
{
    protected DriverI $logdriver;

    public function __construct(DriverI $logdriver)
    {
        $this->logdriver = $logdriver;
    }

    protected function setDriver(DriverI $logdriver):void
    {
        $this->logdriver = $logdriver;
    }

    public function log(string $message, int $level):void
    {

    }
}
