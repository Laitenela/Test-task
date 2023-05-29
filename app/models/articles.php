<?php
class ModelArticles
{
    private $db;
    private $id;
    private $isLastPage;
    private $articles;
    private $lastArticle;
    private $soloArticle;
    private $whatIs;

    function __construct($whatIs, $queryNum = null)
    {
        ['host' => $host, 'user' => $user, 'pass' => $pass, 'database' => $db ] = parse_ini_file('core/app.ini');
        $this->db = new MySQLi($host, $user, $pass, $db);
        $this->db->set_charset('utf8mb4');
        $this->id = $queryNum;

        $this->whatIs = strtolower($whatIs);
        switch ($this->whatIs) {
            case 'listnews':
                $this->setNewsBlockData($queryNum);
                break;
            case 'article':
                $this->setSoloArticlePage($queryNum);
                break;
        }
    }

    private function setNewsBlockData($page)
    {
        $this->setLastArticle();
        $this->setArticlesLast($page, 4);
    }
    
    private function setSoloArticlePage($id)
    {
        $responce = $this->db->query("SELECT * FROM `news` WHERE id = '$id'");
        $result = $responce->fetch_assoc();
        $result['date'] = date('d.m.Y', strtotime($result['date']));
        $this->soloArticle = $result;
    }

    private function setLastArticle()
    {
        $responce = $this->db->query("SELECT `id`, `date`, `title`, `announce`, `image` FROM news ORDER BY `date` DESC LIMIT 1;");
        $this->lastArticle = $responce->fetch_assoc();
    }

    private function setArticlesLast($page, $quantity)
    {
        $result = [];

        $start_id = ($page - 1) * $quantity;
        $responce = $this->db->query("SELECT `id`, `date`, `title`, `announce` FROM news ORDER BY `date` DESC LIMIT $start_id, 5;");

        while ($row = $responce->fetch_assoc()) array_push($result, $row);
        $this->isLastPage = (count($result) === 5);
        $this->isLastPage && array_pop($result);
        for ($i = 0; $i < count($result); $i++) {
            $date = $result[$i]['date'];
            $result[$i]['date'] = date('d.m.Y', strtotime($date));
        }
        $this->articles = $result;
    }

    public function getDatas(){
        switch ($this->whatIs) {
            case 'listnews':
                return [$this->id, $this->lastArticle, $this->isLastPage, $this->articles];
            case 'article':
                return $this->soloArticle;
        }
    }
}
