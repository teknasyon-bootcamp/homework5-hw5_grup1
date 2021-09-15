<?php

namespace App\DB\Engine;

class MongoDB implements DriverInterface
{
    protected MongoDB\Client $client; 

    public function __construct(string $protocol, string $host, string $user, string $pass, string $dbname, array $options)
    {
    }

    public function all(string $table): array
    {
        // TODO: Implement all() method.
    }

    public function find(string $table, mixed $id): mixed
    {
        // TODO: Implement find() method.
    }

    public function create(string $table, array $values): bool
    {
        // TODO: Implement create() method.
    }

    public function update(string $table, mixed $id, array $values): bool
    {
        // TODO: Implement update() method.
    }

    public function delete(string $table, mixed $id): bool
    {
        // TODO: Implement delete() method.
    }
}
