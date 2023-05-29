<?php

class Route
{
    static function start()
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        empty($routes[1]) && Route::redirect();

        include "app/models/articles.php";

        $controllerName = explode('?', $routes[1])[0];
        $controllerFile = strtolower($controllerName) . '.php';
        $controllerPath = "app/controllers/" . $controllerFile;
        $query = $_SERVER['QUERY_STRING'];

        //Обязательно должны быть id, либо page
        if (preg_match('/(id|page)=\d*/', $query) && file_exists($controllerPath)) {
            $id = (int)explode('=', $query)[1];
            include "app/controllers/" . $controllerFile;
        } else {
            Route::redirect();
        }

        $controllerName = 'Controller' . ucfirst($controllerName);
        $controller = new $controllerName($id);
        $controller->info();
    }

    static function redirect()
    {
        $host = 'http://' . $_SERVER['SERVER_NAME'] . ':8000/listNews?page=1';
        header("Location: " . $host);
        exit();
    }
}
