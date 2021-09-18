<?php

namespace logger; // logger namespace tanımlaması

interface loggableI
{
    public static function log(string $message, int $level): void; // static işlem yapacağını, "message, level" değerlerini alacağını ve void değeri ile dönüş yapacağını belirt

}