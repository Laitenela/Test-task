<?php
class Controller_Articles extends Controller{
    function __construct(){
        $this->model = new Model_Articles();
        $this->view = new View();
    }

    function info($id){
        $data = $this->model->getArticleData($id);
        $this->view->generate('articles.php', 'template.php', $data);
    }
}