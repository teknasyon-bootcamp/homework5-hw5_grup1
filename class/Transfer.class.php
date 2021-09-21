<?php
use database\Database; // database içerisindeki Database'i kullan
use logger\logger;

class Transfer // Transfer class başlangıcı
{
    public $db; // db property
    public $tables = array(
        'book',
        'section',
        'post'
    ); // belli tablolarda işlem yapabilmek adına $tables property'si

    public function __construct()
    {
        $this->db = new Database(); // Database class ile nesne oluşturup $this->db'ye ata
    }
    public function export()
    {
        $file = "export.json"; // dışa aktarmak için varsayılan dosya adı için $file'a export.json'ı ata

        $data = array(); // verilerin toplanması için boş array oluşturup $data'ya ata

        foreach ($this->tables as $table_name) // $tables property'sindeki tabloları foreach ile table_name değişkeniyle kullan
        {
            $tableAllData = $this->db->all($table_name); //$this->db nesnesiyle table_name'e göre tablodaki tüm verileri getir ve tableAllData'ya ata

            $data[$table_name] = $tableAllData; // $tableAllData'yı data array'ine table_name key'iyle ekle
        }

        file_put_contents("export.json",  json_encode($data)); // data array'ini json'a çevir ve export.json dosyasına yaz. eğer export.json yoksa oluştur

        header('Content-type: application/json'); // içinde bulunduğu sayfanın header content-type'ını application/json olarak ayarla
        header('Content-Disposition: attachment; filename="'. $file .'"'); // içinde bulunduğu sayfanın header content-desposition'ını ayarla
        echo implode(file($file)); // oluşturulan dosya içerisindekileri burada ekrana yazdır
        // ekrana yazdırmayla beraber oluşan dosya cihaza indirilecektir.
        exit(); // çıkış yap
    }

    public function import($file) // import işlemi için file değişkeni zorunludur
    {
        if (empty($file)) // file boşsa
        {
            $result = "Dosya seçilmedi!";
            echo $result;
            logger::log("Import sırasında : $result",0); // hatayı logla
        }
        else // değilse
        {
            $target = "../transfer/".date('d_m_Y_H.i.s')."_".$file["name"]; // dosya yüklemek için dosya hedefini tarih ve file ismiyle beraber birleştirip target a ata
            if (move_uploaded_file($file["tmp_name"], $target)) // hedeflenen dosya yüklendiyse
            {
                $json_file  = file_get_contents($target); //dosya içerisindeki içerikleri getir ve json_file'a string olarak ata
                $data = json_decode($json_file,true,flags: JSON_BIGINT_AS_STRING); // dosya içeriklerinin json olduğunu kabul ederek array'e çevir ve data'ya ata

                foreach ($this->tables as $table_name) // tables property'sindeki table değerlerini table_name olarak tek tek kullan
                {
                    foreach ($data[$table_name] as $key => $value) //data içerisinde table_name key'iyle gelen array değerini key => value ikilisi olarak kullan
                    {
                        if (!$this->db->find($table_name, $value['id'])) // table_name ve value['id'] değerlerini db nesnesindeki find fonksiyonuna gönder "böyle bir veri mevcut mu diye" ve sonuç yoksa
                        {
                            $result = $this->db->create($table_name, $value); // db nesnesindeki create fonksiyonuna table_name, value değerlerini gönder ilgili veri dbye eklensin ve sonucunu result'a ata

                            echo $table_name." : Verileri aktarıldı.<br>"; // ekrana table_name ve veri aktarıldığını yazdır
                        }
                        else
                        {
                            $result = $table_name." : Veriler aktarılmadı<br>"; // table_name ve veri aktarılmadığını result'a ata
                            echo $result; // result değerini ekrana yazdır
                            logger::log("Import sırasında : $result",0); // hatayı logla
                        }
                    }
                }

            }

        }
    }
}
