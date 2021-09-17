<?php

namespace logger;

interface loggableI
{
    public function log(string $message, int $level): void;

}