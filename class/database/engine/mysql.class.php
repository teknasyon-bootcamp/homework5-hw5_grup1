<?php

class mysql extends PDO
{
    private PDO $PDO;
      
    public function __construct(
        public String  $host ="localhost",
        public String   $user="root",
        public String     $pass="",
        public String     $dbname="hafta"
        
    ){

        $this->PDO = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->user,$this->pass);
        

    }
    public function connect()
    {
            try {
                $this->PDO = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->user,$this->pass);

                return $this->PDO;
    
            
            } catch (Exception $e) {
                echo "Veritabanı hatası {$e->getMessage()}";
                exit(1);
            }
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

        $result = $statement->execute($values);

        return $result;
    }



   

}