<?php
class ControllerArticles
{
    private $soloArticle;
    function __construct($id)
    {
        $this->soloArticle = new ModelArticles('article', $id);
    }

    function info()
    {
        [
            'title' => $title,
            'date' => $date,
            'image' => $image,
            'announce' => $announce,
            'content' => $content
        ] = $this->soloArticle->getDatas();
        
        $content_view = 'articles.php';
        include 'app/views/template.php';
    }
}
