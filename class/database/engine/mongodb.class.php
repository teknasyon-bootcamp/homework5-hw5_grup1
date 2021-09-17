<?php
class MongoDB implements DriverI
{
    public $db;
	private $dbname;
	private $tablename;
    public function __construct(String $dbname,String $tablename)
	{
		$db = new MongoDB\Driver\Manager('mongodb://mongo');
		$this->db = $db;
		$this->dbname = $dbname;
		$this->tablename = $tablename;
    }
	public function select(String $dbname,String $tablename):void
	{
		$this->dbname = $dbname;
		$this->tablename = $tablename;
    } 
    public function all():array
    {
		$table = $this->dbname.".".$this->tablename;
		$sorgu = new MongoDB\Driver\Query([]);
		$sonuc = $this->db->executeQuery($table, $sorgu)->toArray();
        return $sonuc;
    }
    public function find(Array $select,Array $options):mixed
    {
		$table = $this->dbname.".".$this->tablename;
		$query = new MongoDB\Driver\Query($select,$options);
		$sonuc = $this->db->executeQuery($table, $query)->toArray();
        return $sonuc; 
	}
    public function create(Array $data):void
    {
		$table = $this->dbname.".".$this->tablename;  
		$write = new MongoDB\Driver\BulkWrite();
		$write->insert($data);
		$this->db->executeBulkWrite($table,$write);
    }
	public function update(Array $select,Array $newData):bool
    {
		$table = $this->dbname.".".$this->tablename; 
		$veri = new MongoDB\Driver\BulkWrite();
		$veri->update($select, ['$set' => $newData]);
		$sonuc = $this->db->executeBulkWrite($table, $veri);
		return $sonuc->getModifiedCount();
    }
	public function delete(Array $select):bool
    {
		$table = $this->dbname.".".$this->tablename; 
		$veri = new MongoDB\Driver\BulkWrite();
		$veri->delete($select);
		$sonuc = $this->db->executeBulkWrite($table, $veri);
		return $sonuc->getDeletedCount();
    }
}
/* 
Örnekler 
// Bağlantı Kurma
$Mongo = new MongoDB("default","book");
// Veri Ekleme
$Mongo->create(array(
"id"=>$Mongo->db->counters,
"name"=>"İğrenç bir hayat",
"summary"=>"Gerçekten",
"image_url"=>"./image.png",
"created_at"=>time(),
"update_at"=>time()
)); 
// Veri Gösterme
$Result = $Mongo->all();
print_r($Result);
// Veri Bulma İşlemi
$Result = $Mongo->find(["created_at"=>1631741737],[]);
print_r($Result); 
// Güncelleme İşlemi
$Result = $Mongo->update(["created_at"=>1631741737],["name"=>"Güzel bir Hayat"]);
print_r($Result); 
// Silme İşlemi
$Result = $Mongo->delete(["created_at"=>1631741737]);
print_r($Result); 
*/