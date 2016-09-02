<?php // Родитель всех контроллеров

class Controller
{
    public $view; // Базовое свойство
    public function __construct()
    {
        $this->view = new View(); // Свойство, которое равно объект представления
    }
}