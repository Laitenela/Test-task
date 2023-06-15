<?php
class Controller_Articles extends Controller
{
    function touch($query)
    {
        $this->middleware_check_query($query, 'id');
        $id           = (int)explode('=', $query)[1];

        include "app/models/articles.php";
        $news_feed    = new Model_Articles();
        $data         = $news_feed->get_article($id);

        $this->middleware_check_exist($data['id']);

        $data['view'] = 'articles.php';
        $this->presentation($data);
    }
}