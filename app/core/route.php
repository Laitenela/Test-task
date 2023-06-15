<?php
/************************************** 
 ** ЛОГИКА РОУТИНГА ТЕСТОВОГО ВЕБ-САЙТА
 ** Отвечает за редирект при неверном 
 ** запросе. Редиректит на первую
 ** страницу c последними новостями. 
 **************************************/
class Route
{
    static function start()
    {
        /********************************РАЗБИРАЕМ ЗАПРОС ПОЛЬЗОВАТЕЛЯ*/
        $redirect         = false;
        $routes           = explode('/', $_SERVER['REQUEST_URI']);
        $query            = $_SERVER['QUERY_STRING'];
        $controller_name  = explode('?', $routes[1])[0];
        $controller_file  = strtolower($controller_name) . '.php';
        $controller_path  = "app/controllers/" . $controller_file;

        /********************************ПРОВЕРКА КОРРЕКТНОСТИ ЗАПРОСА*/
        $redirect        |= empty($routes[1]);
        $redirect        |= (!file_exists($controller_path));
        $redirect        && Route::redirect();

        /**************************************ПОДКЛЮЧЕНИЕ КОНТРОЛЛЕРА*/
        include "app/controllers/" . $controller_file;
        $controller_name  = 'Controller_' . ucfirst($controller_name);
        $controller       = new $controller_name();

        $controller->touch($query);
    }

    static function redirect()
    {
        $host = 'http://' . $_SERVER['SERVER_NAME'] . ':8000/listNews?page=1';
        header("Location: " . $host);
        exit();
    }
}
