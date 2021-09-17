<?php
namespace database\engine;
class mysql extends \PDO implements DriverI
{
    private \PDO $PDO;

    public function __construct(
        private string  $host ="localhost",
        private string  $user="root",
        private string  $pass="",
        private string  $dbname="test"
    ){

        $this->PDO = new \PDO("mysql:host=$this->host;dbname=$this->dbname",$this->user,$this->pass);

    }

    public function all(string $table): array
    {
        $query = "SELECT * FROM $table";

        $statement = $this->PDO->prepare($query);

        $statement->execute();

        $result = $statement->fetchAll();

        return $result;
    }

    public function find(string $table, mixed $id): mixed
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

    public function create(string $table, array $values): bool
    {
        $columnSerialize = $this->serialize($values,'column');
        $valuesSerialize = $this->serialize($values,'value');

        $query = "INSERT INTO $table($columnSerialize) values($valuesSerialize)";

        $statement = $this->PDO->prepare($query);

        foreach ($values as $param => $value) {
            $statement->bindValue(":$param", $value);
        }

        $result = $statement->execute();

        return $result;
    }

    public function update(string $table, mixed $id, array $values): bool
    {
        $setSerialize = $this->serialize($values,'set');

        $query = "UPDATE $table SET $setSerialize WHERE id:id";

        $statement = $this->PDO->prepare($query);

        foreach ($values as $param => $value) {
            $statement->bindValue(":$param", $value);
        }

        $result = $statement->execute();

        return $result;
    }

    public function delete(string $table, mixed $id): bool
    {
        $query = "DELETE FROM $table WHERE id=:id";

        $statement = $this->PDO->prepare($query);

        $result = $statement->execute([
            'id' => $id
        ]);

        return $result;
    }

    public function serialize(array $values, string $type): mixed
    {

        $propertiesCounter = 1;
        $result = '';

        foreach ($values as $column => $value )
        {
            if ($propertiesCounter > 1)
            {
                $result .= ",";
            }

            if ($type == 'value')
            {
                $result .= ":$column";
            }
            elseif ($type == 'column')
            {
                $result .= $column;
            }
            elseif ($type == 'set')
            {
                $result .= "$column=:$column";
            }

            $propertiesCounter++;



        }

        return $result;
    }




}
