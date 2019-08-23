<?php

class Route
{
    static function start()
    {
        // Контроллер и действие по умолчанию
        $controller_name = 'Main';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // Получение имени контроллера
        if(!empty($routes[1]))
        {
            $controller_name = $routes[1];
        }

        // Получение имени экшена
        if(!empty($routes[2]))
        {
            $action_name = $routes[2];
        }

        // Добавление префиксов
        $model_name = 'Model_'.$controller_name;
        $controller_name = 'Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;

        // Подключение файла с классом модели
        $model_file = strtolower($model_name).'.php';
        $model_path = 'application/models/'.$model_file;
        if(file_exists($model_path))
        {
            include 'application/models/'.$model_file;
        }

        // Подключение файла с классом контроллера
        $controller_file = strtolower($controller_name).'.php';
        $controller_path = 'application/controllers/'.$controller_file;
        if(file_exists($controller_path))
        {
            include 'application/controllers/'.$controller_file;
        }
        else
        {
            // Редирект на страницу 404
            Route::ErrorPage404();
        }

        // Создание контроллера
        $controller = new $controller_name;
        $action = $action_name;

        if(method_exists($controller, $action))
        {
            // Вызов действия контроллера
            $controller->$action();
        }
        else
        {
            // 404, но лучше кинуть исключение
            Route::ErrorPage404();
        }
    }

    function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
        header('Location: '.$host.'404');
    }
}
