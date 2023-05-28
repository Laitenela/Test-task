<?php
class Controller_ListNews extends Controller{
    function __construct(){
        $this->model = new Model_Articles();
        $this->view = new View();
    }

    function info($page){
        $data = $this->model->getPageData($page);
        $this->view->generate('listNews.php', 'template.php', $data, $page);
    }
}