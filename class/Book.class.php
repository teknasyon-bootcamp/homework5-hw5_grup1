<?php

class Book{
	public $db;
	public function __construct(){
	$this->db = new database\Database();
	}
    //index.php - Kitap listesi ve her kitap için yazar isimleri yer alıyor mu?
     public function  bookList(){
		$this->db->create("book",array("name"=>"sam","summary"=>"faasd","author"=>"asdasd","page_count"=>22,"image_url"=>"asdasd"));
		print_r($this->db->all("book"));
		/* 
        $statement = $this->db->prepare("select * from book");
        $statement->execute();
        $row = $statement->fetchAll(); // Use fetchAll() if you w
        return $row;
		*/
	
	}
    //kitap silme fonksiyonu
    public function deleteBook($id)
    {
        $sql = "DELETE FROM book WHERE id=" . $id;

        $this->PDO->exec($sql);

    }
    
    // kitap editleme fonksiyonu
    public function editBook($id)
    {
        $statement = $this->PDO->prepare("select * from book where=".$id);
        $statement->execute();
        $row = $statement->fetchAll(); // Use fetchAll() if you w
        return $row;
    } 

    //kitap güncelleme fonksiyonu 
    public function updateBook(array $field, $id) // field bir array  içinde book sütünları var
    {
        $field = ['name' => 'test book name', // formdan gelen veriyi sahte olarak oluşturdum
            'summary' => 'test özet',
            'page_count' => 'test count',
            'image_url' => 'test img',
            'author_name' => 'test t',
            'section' => 'test section name',
            'created_at' => 'test created at',
            'update_at' => 'test update at',
             
    ];
        $sql = "UPDATE book SET `name`=?,summary=?,page_count=?,image_url=?,author_name=?,section=?,created_at=?,update_at=?  WHERE id=?";
        $stmt= $this->PDO->prepare($sql);
        $stmt->execute([$field['name'],$field['summary'],$field['page_count'],$field['image_url'],$field['author_name'],$field['section'],$field['created_at'],$field['update_at'], $id]);

    }
     
    //kitap ekleme fonksiyonu
    public function addBook(array $field){   // field bir array  içinde book sütünları var
        $field = ['name' => 'test book name', // formdan gelen veriyi sahte olarak oluşturdum
        'summary' => 'test özet',
        'page_count' => 'test count',
        'image_url' => 'test img',
        'author_name' => 'test t',
        'section' => 'test section name',
        'created_at' => 'test created at',
        'update_at' => 'test update at',
         
];

        $sql = "INSERT INTO book (`name`,`summary`,`page_count`,`image_url`,`author_name`,`section`,`created_at`,`update_at`) VALUES (?)";
        $stmt= $this->prepare($sql);
        $stmt->execute([$field['name'],$field['summary'],$field['page_count'],$field['image_url'],$field['author_name'],$field['section'],$field['created_at'],$field['update_at']]);

    }
    // kitaba yeni bölüm ekleme fonksiyonu
    public function sectionAdd(array $field){ // field bir array  içinde sectionun sütünları var

        $field = ['name' => 'test name', // formdan gelen veriyi sahte olarak oluşturdum
        'created_at' => 'test created at',
        'update_at' => 'test update at',
         
];
        $sql = "INSERT INTO section (`book_id`,`name`,) VALUES (?)";
        $stmt= $this->prepare($sql);
        $stmt->execute(['name' => $field]);

    }
    // kitapta bölüm editleme fonksiyonu 
    public function sectionEdit($id)
    {
        $statement = $this->PDO->prepare("select * from section where=".$id);
        $statement->execute();
        $row = $statement->fetchAll(); 
        return $row;
    } 
    // kitapta ki bölümleri güncelleme fonksiyonu 
    public function sectionUpdate(array $field, $id) // field bir array  içinde book sütünları var
    {
        $sql = "UPDATE section SET `name`=?,  WHERE id=?";
        $stmt= $this->PDO->prepare($sql);
        $stmt->execute([$field, $id]);
    }

    //kitaptan bölüm silme fonksiyonu
    public function deleteSection($id)
    {
        $sql = "DELETE FROM section WHERE id=" . $id;
        $this->PDO->exec($sql);

    }

    //kitaptaki bölümü var ise listele 
    public function sectionList()
    {
        $statement = $this->PDO->prepare("select * from book b
        left join section s on s.book_id = b.id
        where section = 0");
        $statement->execute();
        $row = $statement->fetchAll(); // Use fetchAll() if you w
        if($row != '') return $row;
        else return ['msg' => 'kitapin bölümü yok'];
    }

    


}