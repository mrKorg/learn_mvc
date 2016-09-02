<?php // Класс представления

class View
{
    // Шаблон по умолчанию
    public $template = "index";

    // Метод рендера страниц
    public function render($view, $data=[]){

        if(is_array($data)){
            extract($data); // Импортирует переменные из массива в текущую таблицу символов
        }

        $viewPath = "app/views/";
        if(is_null($this->template)){
            if(file_exists($viewPath . $this->template . ".php")){
                include_once $viewPath . $this->template . ".php";
            } else {
                echo "Файл шаблона не найден 1";
            }
        } else {
            if(file_exists($viewPath . $view . ".php")){
                include_once $viewPath . $view . ".php";
            } else {
                echo "Файл представления не найден 2";
            }
        }
    }
}