<?php

class mysql extends PDO
{
    private PDO $PDO;
    public function __construct(
        String $host,
        String $user,
        String $pass,
        String $dbname
    ){

        $this->PDO = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);

    }

    public function all(String $table):array
    {
        $query = "SELECT * FROM $table";

        $statement = $this->PDO->prepare($query);

        $statement->execute();

        $result = $statement->fetchAll();

        return $result;
    }

    public function find(String $table,mixed $id):mixed
    {
        $idValue = (is_numeric($id) || is_string($id)) ? $id : $id['id'];

        $query = "SELECT * FROM $table WHERE id=:id";

        $statement = $this->PDO->prepare($query);

        $statement->execute([
            'id' => $idValue
        ]);

        $result = $statement->fetch();

        return $result;
    }

    public function create(String $table,array $values):bool
    {
        $query = "INSERT INTO $table() values()";

        $statement = $this->PDO->prepare($query);

        $result = $statement->execute($valueArray);

        return $result;
    }
}