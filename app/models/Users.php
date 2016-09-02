<?php

class Users
{
    public function get_user($login, $password){

        // Проверка логина
        if(is_string($login) && $login != "" && preg_match("#^[aA-zZ0-9\-_]+$#",$login)){
            $login = strip_tags($login);
        } else {
            exit();
        }
        // Проверка пароля
        if(!is_string($password) || $password == ""){
            exit();
        }

        $db = Db::getInstance();
        $db->query("SELECT * FROM users WHERE `login` = '$login'");
        $users = $db->fetch_all();
        $user_password = $users[0]["password"];
        if(password_verify($password, $user_password)){
            $_SESSION['id'] = $login; // Создание сессии
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
}