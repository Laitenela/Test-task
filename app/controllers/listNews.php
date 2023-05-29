<?php
class Controller_ListNews extends Controller
{
    function __construct()
    {
        $this->model = new Model_Articles();
        $this->view = new View();
    }

    function info($page)
    {
        $data = $this->model->getPageData($page);
        $data = [
            'page' => $page,
            'lastArticle' => array_shift($data),
            'isLast' => array_pop($data),
            'articles' => $data,
            'nav' => []
        ];
        $data['nav'] = ($data['page'] === 1) ? [[3, true], [2, true], [1, false]] : ($data['isLast'] ?
            [[$page, false], [$page - 1, true], [$page - 2, true]] :
            [[$page + 1, true], [$page, false], [$page - 1, true]]
        );

        $data['lastArticle']['date'] = date('d.m.Y', strtotime($data['lastArticle']['date']));
        for($i = 0; $i < count($data['articles']); $i++){
            $date = $data['articles'][$i]['date'];
            $data['articles'][$i]['date'] = date('d.m.Y', strtotime($date));
        }

        $this->view->generate('template.php', 'listNews.php', $data);
    }
}
