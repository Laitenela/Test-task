<?php
class ControllerListNews
{
    private $newsModel;
    function __construct($page)
    {
        $this->newsModel = new ModelArticles('listNews', $page);
    }

    function info()
    {
        [$page, $lastArticle, $isLast, $articles] = $this->newsModel->getDatas();
        $navbar = ($page === 1) ? [[3, true], [2, true], [1, false]] : (!$isLast ?
            [[$page, false], [$page - 1, true], [$page - 2, true]] :
            [[$page + 1, true], [$page, false], [$page - 1, true]]);

        $content_view = 'listNews.php';
        include 'app/views/template.php';
    }
}
