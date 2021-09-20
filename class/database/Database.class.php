<?php  
namespace database; // database namespace tanımlaması
use database\engine\DriverI; // database\engine\DriverI 'ı kullan
use database\engine\mysql; // database\engine\mysql 'i kullan

class Database implements DriverI // Database sınıfı oluştur ve DriverI'ı implement'e et
{
    public $config; // config bilgilerini tutmak için config property'sini tanımla
    public $db; // db işlemlerini yapabilmek ve db nesneleri tutmak için db property'sini tanımla
    public $engine; // db işlemleri için kullanılacak engine/driver tutulacağı property'i tanımla
	
    public function __construct(
    ){
		// Config
		$configdir = (__DIR__)."/../../config.php"; // config bilgilerinin bulunduğu dosyayı configdir'e ata
		if (file_exists($configdir)) // configdir içerisinde tanımlı dosya mevcutsa
		{
		    $this->config = require $configdir; // configdir içerisindeki dosyada verilen değerleri config property'sine ata
		    $this->engine= $this->config["engine"]; //config engine değerini engine property'sine ata
		} 
        if ($this->engine == "mysql" ) // engine property'sinin değeri mysql ise
        {
	     
			$db =new engine\mysql( // mysql nesnesini oluştur ve db property'sine ata
			$this->config["host"], // config'deki host değeri
			$this->config["user"], // config'deki user değeri
			$this->config["password"] // config'deki password değeri
			);
        }
        elseif ($this->engine == "mongodb") // engine property'sinin değeri mongodb ise
        {
			$db = new engine\mongodb( // mongodb nesnesini oluştur ve db property'sine ata
			$this->config["host"], // config'deki host değeri
			$this->config["user"], // config'deki user değeri
			$this->config["password"] // config'deki password değeri
			);

			}

		$this->setDriver($db); // setDriver ile db property'sine db nesnesini ata

	}
	public function setDriver(DriverI $db): void // setDriver olarak DriverI tipinde db'yi alacağını ve void olarak dönüş yapacağını belirt
	 {
		  
           $this->db= $db; // db property'sine alınan db değerini ata
		 

	}
	public function all(String $table): array // all olarak string tipinde table değerini alacağını ve array olarak dönüş yapacağını belirt
	{
		return $this->db->all($table); // db nesnesindeki all fonksiyonuna table değerini verip sonucunu return et
	}
    public function find(String $table, mixed $id): mixed // find olarak table, id değerlerini alacağını ve mixed olarak dönüş yapacağını belirt
	{
		return $this->db->find($table, $id); // db nesnesindeki find fonksiyonuna table, id değerlerini verip sonucunu return et
	}
	public function findAll(string $table, array $values): mixed // findAll olarak table, values değerlerini alacağını ve mixed olarak dönüş yapacağını belirt
    {
        return $this->db->findAll($table, $values); // db nesnesindeki findAll fonksiyonuna table, values değerlerini verip sonucunu return et
    }
    public function create(String $table, array $values): bool // create olarak table, values değerlerini alacağını ve boolean olarak dönüş yapacağını belirt
	{
		return $this->db->create($table, $values); // db nesnesindeki create fonksiyonuna table, values değerlerini verip sonucunu return et
	}
    public function update(String $table, mixed $id, array $values): bool // update olarak table, id, values değerlerini alacağını ve boolean olarak dönüş yapacağını belirt
    {
		return $this->db->update($table, $id, $values); // db nesnesindeki update fonksiyonuna table, id, values değerlerini verip sonucunu return et
	}
    public function delete(String $table, mixed $id): bool // delete olarak table, id değerlerini alacağını ve boolean olarak dönüş yapacağını belirt
    {
		return $this->db->delete($table, $id); // db nesnesindeki delete fonksiyonuna table, id değerlerini verip sonucunu return et
	}
}