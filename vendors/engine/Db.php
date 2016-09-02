<?php

// Single Tone
class Db
{
    private $db; // Коннектор
    private $result;
    private static $instance = null; // Для хранения объекта подключения
    
    private function __construct() // Функция конструктор, магическая функция
    {
        $config = parse_ini_file("app/configs/db.ini"); // Возвращает массив
        if( !empty($config) ){ // Проверка на пустоту
            $this->db = mysqli_connect($config['host'],$config['user'],$config['password'],$config['bd']); // Создаём объект подключения
            if( mysqli_connect_errno() ){ // Проверка подключения
                echo mysqli_connect_error(); // Вывод ошибки
                exit();
            }
        }
    }
    
    public function query($sql) // Берёт созданный объект и делает запрос
    {
        $this->result = mysqli_query( $this->db, $sql ); // Объект результата
    }

    public function fetch_all()
    {
        $dbresult = [];
        while( $row = mysqli_fetch_assoc( $this->result )) {
            $dbresult[] = $row; // Аналогия fetch_all (записываем все массивы записей в массив)
        }
        return $dbresult; // Возвращаем массив
    }
    
    public static function getInstance()
    {
        if( is_null(self::$instance) ){
            self::$instance = new self(); // Создание объекта этого же класса, если такого нет
        }
        return self::$instance; // Возвращаем объект
    }
    
    private function __clone() // Функция клонирования, магическая функция
    {
        
    }
    
    
}