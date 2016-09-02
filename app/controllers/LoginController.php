<?php

class LoginController extends Controller
{
    public function indexAction(){
        $this->view->render("login/index");
    }
}
