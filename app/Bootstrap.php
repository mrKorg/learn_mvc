<?php

class Bootstrap
{
    // Autoload
    public function __initAutoload(){
        spl_autoload_register(function($class){
            if(file_exists("vendors/engine/".$class.".php")){
                include_once "vendors/engine/".$class.".php";
            }
        });
    }
}