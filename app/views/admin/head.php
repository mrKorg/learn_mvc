<?php
session_start();
if(!isset($_SESSION["id"])){
    header('Location: /admin/login/');
}
if(isset($_POST["logout"])){
    session_destroy();
    header('Location: /admin/login/');
}