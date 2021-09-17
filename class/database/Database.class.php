<?php  
namespace database;
use database\engine\DriverI;
use database\engine\mysql;

class Database implements DriverI
{
	public $config;
	public $db;
	public $engine;
	public function __construct(){
		// Config
		$configdir = (__DIR__)."/../../config.php";
		if(file_exists($configdir)){
		$this->config = require $configdir; 
		$this->engine= $this->config["engine"];
      
		} 
        if($this->engine == "mysql" ){ 
	     
			$db =new engine\mysql(
			$this->config["host"],
			$this->config["user"],
			$this->config["password"]
			);
			}elseif($this->engine == "mongodb"){
			$db = new engine\mongodb();

			}

		$this->setDriver($db);


	}
	public function setDriver(DriverI $db): void 
	 {
		  
           $this->db= $db;
		 

	}
	public function all(String $table): array
	{
		return $this->db->all($table);
	}
    public function find(String $table, mixed $id): mixed
	{
		return $this->db->find($table, $id);
	}
    public function create(String $table, array $values): bool
	{
		return $this->db->create($table, $values);
	}
    public function update(String $table, mixed $id, array $values): bool
    {
		return $this->db->update($table, $id, $values);
	}
    public function delete(String $table, mixed $id): bool
    {
		return $this->db->delete($table, $id);
	}
}