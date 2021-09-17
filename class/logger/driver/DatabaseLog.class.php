<?php
namespace logger\driver;

use database\Database;
use database\engine\DriverI;

class DatabaseLog implements LogDriverI
{
    private Database $db;

    public function __construct(
        private DriverI $driver
    )
    {
        $this->setUp();
    }

    public function setDriver(Driver $driver): void
    {
        $this->driver = $driver;
    }

    public function setUp(): void
    {
        $this->db = new \database\Database();
    }

    public function log(string $message, int $level): void
    {
        $created_at = date("Y-m-d H:i:s");

        $this->db->create("logs",[
            "message" => ($message),
            "level" => ($level),
            "created_at" => ($created_at)
            ]);


    }

    public function tearDown(): void
    {
        $this->db = null;
    }
}

