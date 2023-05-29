<?php

class Route
{
    static function start()
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if (empty($routes[1]))
            Route::redirect();

        include "app/models/articles.php";


        //Обязательно должны быть id, либо page
        $controller_name = explode('?', $routes[1])[0];
        $query = $_SERVER['QUERY_STRING'];

        $id = preg_match('/(id|page)=\d*/', $query) ?
            (int)explode('=', $query)[1] :
            Route::redirect();

        $controller_file = strtolower($controller_name) . '.php';
        $controller_path = "app/controllers/" . $controller_file;

        file_exists($controller_path) ?
            include "app/controllers/" . $controller_file :
            Route::redirect();

        $controller_name = 'Controller_' . ucfirst($controller_name);


        $controller = new $controller_name;
        $controller->info($id);
    }

    static function redirect()
    {
        $host = 'http://' . $_SERVER['SERVER_NAME'] . ':8000/listNews?page=1';
        header("Location: " . $host);
        exit();
    }
}
