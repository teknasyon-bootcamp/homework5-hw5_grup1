<?php
namespace database\engine; 
class mysql implements DriverI
{
    public $PDO;
    public function __construct(
        public String  $host ="mariadb",
        public String  $user="root",
        public String  $pass="root",
        public String  $dbname="default"
    ){
        $this->PDO = new \PDO("mysql:host=$this->host;dbname=$this->dbname",$this->user,$this->pass);
		return $this->PDO;
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
	
	public function  update(String $table,mixed $id,array $values):bool
    {
		
    }
	
	public function delete(String $table,mixed $id):bool
    {
		
    }



   

}