<?php

class Route // Для разбора одрессной строки
{
    // Стартовая функция
    public static function start(){

        // Autoload models
        spl_autoload_register(function($models){
            if(file_exists("app/models/".$models.".php")){
                include_once "app/models/".$models.".php";
            }
        });

        $baseController = "Index"; // Дефолтный controller
        $baseAction = "index"; // Дефолтный action
        $baseAlias = NULL; // Дефолтный алиас
        $routs = explode("/", $_SERVER["REQUEST_URI"]); // Принимаем url и разбиваем его по слешам

        // Проверка части url после первого слеша (отвечающего за controller)
        if(!empty($routs[1])){
            $baseController = $routs[1]; // Переопределение controller
        }

        // Преобразование строки в нижний регистр + Преобразование первого символа строки в верхний регистр + "Controller"
        $baseController = str_replace("-", "_", $baseController);
        $baseController = ucfirst(strtolower($baseController)) . "Controller";
        $controllerPath = "app/controllers/" . $baseController . ".php"; // Полный путь к controller

        // Проверка части url после второго слеша (отвечающего за action)
        if(!empty($routs[2])){
            $baseAction = $routs[2]; // Переопределение action
        }

        // Преобразование строки в нижний регистр
        $baseAction = str_replace("-", "_", $baseAction);
        $baseAction = strtolower($baseAction) . "Action";

        // Проверка наличия файла
        if(file_exists($controllerPath)){
            include_once $controllerPath;
        } else {
            self::error404();
        }

        // Проверка части url после третьего слеша (отвечающего за alias)
        if(!empty($routs[3])){
            $baseAlias = $routs[3]; // Переопределение алиаса
        }

        // Создание объекта controller
        $controller = new $baseController;

        // Проверка существования метода
        if(method_exists($controller, $baseAction)){
            $controller->$baseAction($baseAlias);
        } else {
            self::error404();
        }

    }

    public static function error404(){
        $host = "http://" . $_SERVER["HTTP_HOST"] . "/"; // Адрес сайта
        header("HTTP/1.1 404 Not Found"); // Заголовок
        header("Status 404 Not Found"); // Статус
        header("Location: " . $host . "error404"); // Редирект
    }
}