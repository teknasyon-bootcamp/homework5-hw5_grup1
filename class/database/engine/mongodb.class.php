<?php
namespace database\engine;
class MongoDB implements DriverI
{
    protected $db;
    public function __construct(
        private string $host = "mariadb",
        private string $user = "root",
        private string $pass = "root",
        private string $dbname = "default"
    ) {
        $db = new \MongoDB\Driver\Manager("mongodb://mongo");
        $this->db = $db;
        $this->dbname = $dbname;
    }
    public function all(string $table): array
    {
        $selectTable = $this->dbname . "." . $table;
        $query = new \MongoDB\Driver\Query([]);
        $result = $this->db->executeQuery($selectTable, $query);
		$result->setTypeMap(['root' => 'array', 'document' => 'array', 'array' => 'array']);
		$result = $result->toArray();
		foreach($result as $key => $val){
		$result[$key]["id"] = $val["_id"];
		}
		return $result;
    }
    public function find(string $table, mixed $id): mixed
    {
        $selectTable = $this->dbname . "." . $table;
        $query = new \MongoDB\Driver\Query(
            ["_id" => new \MongoDB\BSON\ObjectId($id)],
            []
        );
        $result = $this->db->executeQuery($selectTable, $query);
		$result->setTypeMap(['root' => 'array', 'document' => 'array', 'array' => 'array']);
		$result = $result->toArray();
		if(!empty($result[0])){
		$result = $result[0];
        $result["id"] = new \MongoDB\BSON\ObjectId($id);
		return [0=>$result];
		}else{
		return [];
		}
    }
	public function findAll(string $table, array $values): mixed
    {
		$selectTable = $this->dbname . "." . $table;
		$multiqueries = [];
		foreach($values["id"] as $key => $val){
		if($key=="id"){
		$multiqueries["_id"] = new \MongoDB\BSON\ObjectId($val);
		}else{
		$multiqueries[$key] = $val;
		}
		}
        $query = new \MongoDB\Driver\Query(
            $multiqueries,
            []
        );
        $result = $this->db->executeQuery($selectTable, $query);
		$result->setTypeMap(['root' => 'array', 'document' => 'array', 'array' => 'array']);
		$result = $result->toArray();
		if(!empty($result[0])){
		$result = $result[0];
        $result["id"] = new \MongoDB\BSON\ObjectId($result["_id"]);
		return [0=>$result];
		}else{
		return [];
		}
    }
    public function create(string $table, array $values): bool
    {			
        $selectTable = $this->dbname . "." . $table;
        $write = new \MongoDB\Driver\BulkWrite(); 
        $write->insert($values);
        $result = $this->db->executeBulkWrite($selectTable, $write);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }
    public function update(string $table, mixed $id, array $values): bool
    {
        $selectTable = $this->dbname . "." . $table;
        $write = new \MongoDB\Driver\BulkWrite();
        $write->update(
            ["_id" => new \MongoDB\BSON\ObjectId($id)],
            ['$set' => $values]
        );
        $result = $this->db->executeBulkWrite($selectTable, $veri);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }
    public function delete(string $table, mixed $id): bool
    {
        $selectTable = $this->dbname . "." . $table;
        $veri = new \MongoDB\Driver\BulkWrite();
        $veri->delete(["_id" => new \MongoDB\BSON\ObjectId($id)]);
        $result = $this->db->executeBulkWrite($selectTable, $veri);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }
}