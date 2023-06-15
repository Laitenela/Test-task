<?php
class Controller_ListNews extends Controller
{
    function touch($query)
    {
        $this->middleware_check_query($query, 'page');
        $page         = (int)explode('=', $query)[1];

        include "app/models/articles.php";
        $news_feed    = new Model_Articles();
        $data         = $news_feed->get_feed($page, 4);

        $this->middleware_check_exist($data['articles']);

        $data['view'] = 'listnews.php';
        $this->presentation($data);
    }
}