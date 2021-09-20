<?php
namespace database\engine; // database\engine namespace tanımlaması

class mysql extends \PDO implements DriverI // mysql sınıfı oluştur, PDO sınıfını extends et ve DriverI'ı implement'e et
{
    private \PDO $PDO; // özel olarak PDO tipinde $PDO property'sini tanımla

    public function __construct(
        private string  $host ="localhost", // özel olarak string tipinde varsayılan değerli olarak host property'sini tanımla
        private string  $user="root", // özel olarak string tipinde varsayılan değerli olarak user property'sini tanımla
        private string  $pass="", // özel olarak string tipinde varsayılan değerli olarak pass property'sini tanımla
        private string  $dbname="test" // özel olarak string tipinde varsayılan değerli olarak dbname property'sini tanımla
    ){

        $this->PDO = new \PDO("mysql:host=$this->host;dbname=$this->dbname",$this->user,$this->pass); // host, dbname, user, pass property'leriyle pdo nesnesi oluşturup PDO property'sine ata

    }

    public function all(string $table): array // all olarak table değerini alacağını ve array olarak dönüş yapacağını belirt
    {
        $query = "SELECT * FROM $table"; // alınan table değeriyle sorgu satırını hazırlayıp query'e ata

        $statement = $this->PDO->prepare($query); // pdo nesnesindeki prepare fonksiyonunda query'i kullanarak alınan dönüş değerini statement'a ata

        $statement->execute(); // statement içerisindeki execute fonksiyonunu çalıştır

        $result = $statement->fetchAll(self::FETCH_ASSOC); // statement içerisindeki fetchAll fonksiyonunda self::FETCH_ASSOC değerini kullanarak alınan dönüş değerini result'a ata

        return $result; // result değerini return ile döndür
    }

    public function find(string $table, mixed $id): mixed // find olarak table, id değerlerini alacağını ve mixed olarak dönüş yapacağını belirt
    {
        $idValue = (is_numeric($id) || is_string($id)) ? $id : $id['id']; // id değeri numeric, string tiplerinde ise olduğu gibi değilse id array'i içerisindeki id değerini idValue'ya ata

        $query = "SELECT * FROM $table WHERE id=:id"; // alınan table, id değerleriyle sorgu satırını hazırlayıp query'e ata

        $statement = $this->PDO->prepare($query); // pdo nesnesindeki prepare fonksiyonunda query'i kullanarak alınan dönüş değerini statement'a ata

        $statement->execute([
            'id' => $idValue
        ]); // statement içerisindeki execute fonksiyonunu idValue değeriyle çalıştır

        $result = $statement->fetch(); // statement içerisindeki fetch fonksiyonunu çalıştırıp dönüş değerini result'a ata

        return $result; // result değerini return ile döndür
    }

    public function findAll(string $table, array $values): mixed
    {
        $whereSerialize = $this->serialize($values,'where'); // alınan values array'ini serialize fonksiyonu ile where tipinde işleme koyup dönüş değerini whereSerialize'a ata

        $query = "SELECT * FROM $table WHERE $whereSerialize"; // alınan table ve oluşturulan whereSerialize değerleriyle sorgu satırını hazırlayıp query'e ata

        $statement = $this->PDO->prepare($query); // pdo nesnesindeki prepare fonksiyonunda query'i kullanarak alınan dönüş değerini statement'a ata

        foreach ($values as $param => $value) { // alınan values array'indeki değerleri param, value ikilisiyle kullan
            $statement->bindValue(":$param", $value); //statement içerisindeki bindValue fonksiyonunda :$param , value değerlerini kullan
        }

        $statement->execute(); // statement içerisindeki execute fonksiyonunu çalıştır

        $result = $statement->fetchAll(self::FETCH_ASSOC); // statement içerisindeki fetchAll fonksiyonunda self::FETCH_ASSOC değerini kullanarak alınan dönüş değerini result'a ata

        return $result; // result değerini return ile döndür
    }

    public function create(string $table, array $values): bool // create olarak table, values değerlerini alacağını ve boolean olarak dönüş yapacağını belirt
    {
        $columnSerialize = $this->serialize($values,'column'); // alınan values array'ini serialize fonksiyonu ile column tipinde işleme koyup dönüş değerini columnSerialize'a ata
        $valuesSerialize = $this->serialize($values,'value'); // alınan values array'ini serialize fonksiyonu ile value tipinde işleme koyup dönüş değerini valuesSerialize'a ata

        $query = "INSERT INTO $table($columnSerialize) values($valuesSerialize)"; // alınan table ve oluşturulan columnSerialize, valuesSerialize değerleriyle sorgu satırını hazırlayıp query'e ata

        $statement = $this->PDO->prepare($query); // pdo nesnesindeki prepare fonksiyonunda query'i kullanarak alınan dönüş değerini statement'a ata

        foreach ($values as $param => $value) { // alınan values array'indeki değerleri param, value ikilisiyle kullan
            $statement->bindValue(":$param", $value); //statement içerisindeki bindValue fonksiyonunda :$param , value değerlerini kullan
        }

        $result = $statement->execute(); // statement içerisindeki execute fonksiyonunu çalıştırıp dönüş değerini result'a ata

        return $result; // result değerini return ile döndür
    }

    public function update(string $table, mixed $id, array $values): bool // update olarak table, id, values değerlerini alacağını ve boolean olarak dönüş yapacağını belirt
    {
        $setSerialize = $this->serialize($values,'set'); // alınan values array'ini serialize fonksiyonu ile set tipinde işleme koyup dönüş değerini setSerialize'a ata

        $query = "UPDATE $table SET $setSerialize WHERE id=:id"; // alınan table,id ve oluşturulan setSerialize değerleriyle sorgu satırını hazırlayıp query'e ata

        $statement = $this->PDO->prepare($query); // pdo nesnesindeki prepare fonksiyonunda query'i kullanarak alınan dönüş değerini statement'a ata

        foreach ($values as $param => $value) { // alınan values array'indeki değerleri param, value ikilisiyle kullan
            $statement->bindValue(":$param", $value); //statement içerisindeki bindValue fonksiyonunda :$param , value değerlerini kullan
        }
        $statement->bindValue(":id", $id); //statement içerisindeki bindValue fonksiyonunda id değerini kullan

        $result = $statement->execute(); // statement içerisindeki execute fonksiyonunu çalıştırıp dönüş değerini result'a ata

        return $result; // result değerini return ile döndür
    }

    public function delete(string $table, mixed $id): bool // delete olarak table, id değerlerini alacağını ve boolean olarak dönüş yapacağını belirt
    {
        $query = "DELETE FROM $table WHERE id=:id"; // alınan table, id değerleriyle sorgu satırını hazırlayıp query'e ata

        $statement = $this->PDO->prepare($query); // pdo nesnesindeki prepare fonksiyonunda query'i kullanarak alınan dönüş değerini statement'a ata

        $result = $statement->execute([
            'id' => $id
        ]); // statement içerisindeki execute fonksiyonunu id değeriyle çalıştır

        return $result; // result değerini return ile döndür
    }

    public function serialize(array $values, string $type): mixed // serialize olarak values, type değerlerini alacağını ve mixed olarak dönüş yapacağını belirt
    {

        $propertiesCounter = 1; // alınan array değerleri için propertiesCounter değişkenini 1 değeriyle oluştur
        $result = ''; // herhangi bir scope'a girmeme durumunda hata almamak için boş result değişkeni oluştur

        foreach ($values as $column => $value ) // alınan values'i column, value olarak kullan
        {
            if ($propertiesCounter > 1) // propertiesCounter 1den büyükse
            {
                if ($type == 'where') // type where ise
                {
                    $result .= " and "; // result'ın şuanki sonuna " and " string'ini ekle
                }
                else // 1den küçükse
                {
                    $result .= ","; // result'ın şuanki sonuna "," string'ini ekle
                }
            }

            if ($type == 'value') // type value ise
            {
                $result .= ":$column"; // result'ın şuanki sonuna column değeriyle ":$column" string'ini ekle
            }
            elseif ($type == 'column') // type column ise
            {
                $result .= $column; // result'ın şuanki sonuna column değerini ekle
            }
            elseif ($type == 'set' || $type == 'where') // type set veya where ise
            {
                $result .= "$column=:$column"; // result'ın şuanki sonuna column değeriyle "$column=:$column" string'ini ekle
            }

            $propertiesCounter++; // propertiesCounter'ı 1 arttır



        }

        return $result; // result değerini return ile döndür
    }




}
