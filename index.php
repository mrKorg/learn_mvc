<?php // Front controller

include_once "app/Bootstrap.php";
$bootstrap = new Bootstrap();
$bootstrap->__initAutoload();
Route::start();