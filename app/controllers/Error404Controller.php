<?php

class Error404Controller extends Controller
{
    public function indexAction(){
        $this->view->render("error404/index");
    }
}