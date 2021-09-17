<?php

namespace logger;

interface loggableI
{
    public static function log(string $message, int $level): void;

}