<?php

/************************************** 
 ** МОДЕЛЬ, ОТВЕЧАЮЩАЯ ЗА ВЫВОД НОВОСТЕЙ
 ** Используется для вывода на страницу
 ** ленты по номеру страницы, и новости
 ** по id новости, конвертирует даты 
 **************************************/
class Model_Articles extends Db_model
{
    /*************************************ДАННЫЕ ДЛЯ ВЫВОДА НОВОСТНОЙ ЛЕНТЫ*/
    public function get_feed(int $page,int $quantity)
    {
        $result = [];
        $result['page']        = $page;
        $result['article_lst'] = $this->request_newest_article();
        $result['articles']    = $this->get_articles($page, $quantity);
        $result['is_last_pg']  = $this->is_exist_page($page + 1, $quantity);
        $result['navbar']      = $this->get_navbar($page, !$result['is_last_pg']);

        return $result;
    }

    /**********************************************ДАННЫЕ ДЛЯ ОДНОЙ НОВОСТИ*/
    public function get_article(int $id)
    {
        $data_article          = $this->request_article($id);
        $data_article          = $this->datas_convert(array($data_article))[0];

        return $data_article;
    }

    /*************************************ЗАПРОС ПОЛНОЙ НОВОСТИ ДЛЯ СТРАНИЦЫ*/
    private function request_article(int $id)
    {
        $data_request          = "SELECT * FROM `news` WHERE id = '$id'";
        $data_responce         = mysqli_query($this->news, $data_request);
        $data_article          = mysqli_fetch_assoc($data_responce);

        return $data_article;
    }

    /**************************ОБРАБОТКА ОТВЕТА ДЛЯ НОВОСТИ С ИЗМЕНЕНИЕМ ДАТЫ*/
    private function get_articles(int $page,int $quantity)
    {
        $data_articles         = $this->request_page($page, $quantity);
        $date_changed_articles = $this->datas_convert($data_articles);

        return $date_changed_articles;
    }

    /***************************СУЩЕСТВУЕТ ЛИ СТРАНИЦА ДЛЯ ОТОБРАЖЕНИЯ НАВБАР*/
    private function is_exist_page(int $page,int $quantity)
    {
        $response              = $this->request_page($page, $quantity);
        $result                = (bool)count($response);

        return $result;
    }

    /**************************КОНВЕРТАЦИЯ В КОРРЕКТНУЮ ДАТУ ДЛЯ ОТОБРАЖЕНИЯ*/
    private function datas_convert(array $articles)
    {
        $date_convert = fn ($date) => date('d.m.Y', strtotime($date));

        for ($i = 0; $i < count($articles); $i++)
            $articles[$i]['date'] = $date_convert($articles[$i]['date']);

        return $articles;
    }

    /************************************ЗАПРОС ПОСЛЕДНЕЙ НОВОСТИ ДЛЯ БАННЕРА*/
    private function request_newest_article()
    {
        $query  = "SELECT `id`, `title`, `announce`, `image`"
        . " FROM news"
        . " ORDER BY `date`"
        . " DESC"
        . " LIMIT 1;";

        $result = mysqli_query($this->news, $query);

        return mysqli_fetch_assoc($result);
    }

    /*************************************ЗАПРОС НОВОСТЕЙ ДЛЯ ОСНОВНОГО БЛОКА*/
    private function request_page(int $page,int $quantity)
    {
        $data_articles    = [];
        $start_data_id    = ($page - 1) * $quantity;
        $article_request  = "SELECT `id`, `date`"
            . ", `title`, `announce`"
            . " FROM news"
            . " ORDER BY `date` DESC"
            . " LIMIT $start_data_id, $quantity;";

        $article_responce = mysqli_query($this->news, $article_request);
        while ($row       = mysqli_fetch_assoc($article_responce))
            array_push($data_articles, $row);

        return $data_articles;
    }

    /**************************ИНТЕРФЕЙС ДЛЯ ОТОБРАЖЕНИЯ НАВИГАЦИОННОЙ ПАНЕЛИ*/
    private function get_navbar(int $page,bool $isLastPage)
    {
        $nav_first        = [[$page + 2, true], [$page + 1, true], [$page, false]];
        $nav_default      = [[$page + 1, true], [$page, false], [$page - 1, true]];
        $nav_last         = [[$page, false], [$page - 1, true], [$page - 2, true]];

        if ($page === 1) return $nav_first;
        return ($isLastPage) ? $nav_last : $nav_default;
    }
}
