<?php
class Model_Articles {
    private $db;
    function __construct() {
        $host="localhost";
        $db = "news";
        $user="root";
        $pass="rootrootroot!";
        $this->db = new MySQLi($host, $user, $pass, $db);
        $this->db->set_charset('utf8mb4');
    }

    //Передача данных для блока с 4 новостями
    public function getPageData($page){
        $result = [];

        $responce = $this->db->query("
        SELECT `id`, `date`, `title`, `announce`, `image`
        FROM news 
        ORDER BY `date` DESC
        LIMIT 1;
        ");
        array_push($result ,$responce->fetch_assoc());

        $start_id = ($page-1)*4;
        $responce = $this->db->query("
        SELECT `id`, `date`, `title`, `announce`
        FROM news 
        ORDER BY `date` DESC
        LIMIT $start_id, 5;
        ");
        while ($row = $responce->fetch_assoc()) {
            array_push($result ,$row);
        }
        if(count($result) === 6){
            array_pop($result);
            array_push($result, false);
        } else {
            array_push($result, true);
        }

        return $result;
    }

    //Передача данных для блока с одной новостью
    public function getArticleData($id){
        $result = $this->db->query("SELECT * FROM `news` WHERE id = '$id'");
        return $result->fetch_assoc();
    }
}