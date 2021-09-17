<?php
use database\Database;

class Transfer
{
    public $db;
    public $tables = array(
        'book',
        'section',
        'post'
    );

    public function __construct()
    {
        $this->db = new Database();
    }
    public function export()
    {
        $file = "export.json";

        $data = array();

        foreach ($this->tables as $table_name) {
            $tableAllData = $this->db->all($table_name);

            $data[$table_name] = $tableAllData;
        }

        file_put_contents("export.json",  json_encode($data));

        header('Content-type: application/json');
        header('Content-Disposition: attachment; filename="'. $file .'"');
        echo implode(file($file));
        exit();
    }

    public function import($file)
    {
        if (empty($file))
        {
            echo "Dosya seçilmedi!";
        }
        else
        {
            $target = "../transfer/".date('d_m_Y_H.i.s')."_".$file["name"];
            if (move_uploaded_file($file["tmp_name"], $target))
            {
                $json_file  = file_get_contents($target);
                $data = json_decode($json_file,true);

                var_dump($data['book']);

                echo "<br><br>";

                foreach ($this->tables as $table_name) {
                    echo "$table_name<br>";
                    $result = $this->db->create($table_name,$data[$table_name]);
                }

                return $result;
            }

            return "İşlem Yapılamadı!";

        }
    }
}
