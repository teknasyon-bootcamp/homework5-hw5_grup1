<?php  
namespace database;
class Database{
	public $config;
	public $db;
	public function __construct(){
		// Config
		$configdir = (__DIR__)."/../../config.php";
		if(file_exists($configdir)){
		$this->config = require $configdir; 
		} 
		if($this->config["engine"]=="mysql"){ 
		$this->db = new engine\mysql(
		$this->config["host"],
		$this->config["user"],
		$this->config["password"]
		);
		}elseif($this->config["engine"]=="mongodb"){
		$this->db = new engine\mongodb();
		}
	}
	public function all(String $table):array
	{
		return $this->db->all($table);
	}
    public function find(String $table,mixed $id):mixed
	{
		return $this->db->find($table,$id);
	}
    public function create(String $table,array $values):bool
	{
		return $this->db->create($table,$values);
	}
    public function update(String $table,mixed $id,array $values):bool{
		return $this->db->update($table,$values);
	}
    public function delete(String $table,mixed $id):bool{
		return $this->db->delete($table,$values);
	}
}