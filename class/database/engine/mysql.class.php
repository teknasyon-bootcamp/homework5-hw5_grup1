<?php
namespace database\engine;

// require_once '../../../autoloader.php'; // kodlanırken kontrol etmek için

class mysql implements DriverI
{
    public static function connect(
        string  $host ="localhost",
        string  $user="root",
        string  $pass="",
        string  $dbname="test"
    ){

        return new \PDO("mysql:host=$host;dbname=$dbname",$user,$pass);

    }

    public static function all(string $table): array
    {
        $query = "SELECT * FROM $table";

        $statement = self::connect()->prepare($query);

        $statement->execute();

        $result = $statement->fetchAll();

        return $result;
    }

    public static function find(string $table, mixed $id): mixed
    {
        $idValue = (is_numeric($id) || is_string($id)) ? $id : $id['id'];

        $query = "SELECT * FROM $table WHERE id=:id";

        $statement = self::connect()->prepare($query);

        $statement->execute([
            'id' => $idValue
        ]);

        $result = $statement->fetch();

        return $result;
    }

    public static function create(string $table, array $values): bool
    {
        $columnSerialize = self::serialize($values,'column');
        $valuesSerialize = self::serialize($values,'value');

        $query = "INSERT INTO $table($columnSerialize) values($valuesSerialize)";

        $statement = self::connect()->prepare($query);

        foreach ($values as $param => $value) {
            $statement->bindValue(":$param", $value);
        }

        $result = $statement->execute($values);

        return $result;
    }

    public static function update(string $table, mixed $id, array $values): bool
    {
        $setSerialize = self::serialize($values,'set');

        $query = "UPDATE $table SET $setSerialize WHERE id:id";

        $statement = self::connect()->prepare($query);

        foreach ($values as $param => $value) {
            $statement->bindValue(":$param", $value);
        }

        $result = $statement->execute($values);

        return $result;
    }

    public static function delete(string $table, mixed $id): bool
    {
        $query = "DELETE FROM $table WHERE id=:id";

        $statement = self::connect()->prepare($query);

        $result = $statement->execute([
            'id' => $id
        ]);

        return $result;
    }

    public static function serialize(array $values, string $type): mixed
    {

        $properties = get_object_vars($values);
        $propertiesTotal = count($properties);
        $propertiesCounter = 0;
        $result = '';

        foreach ($properties as $column => $value )
        {

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

            if ($propertiesCounter < $propertiesTotal)
            {
                $result .= ",";
            }

        }

        return $result;
    }




}

/*
 *
 * Kullanım denemeleri;
 *
mysql::create("book",[
    "name"=> ("Intibah"),
    "summary" => ("Ozet"),
    "page_count" => (250)
]);

var_dump(mysql::all("book"));

*/