<?php

class NewsController extends Controller
{
    public function indexAction(){
        $news = new News();
        $data = $news->get_news();
        $this->view->render("news/index", ["news"=>$data]);
    }
    public function articleAction($alias){
        $news = new News();
        $data = $news->get_post($alias);
        $this->view->render("news/article", ["post"=>$data]);
    }
}
