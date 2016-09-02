<?php

class IndexController extends Controller
{
    public function indexAction(){
        $news = new News();
        $data = $news->get_news();
        $products = new Products();
        $data2 = $products->get_products();
        $categories = new Categories();
        $data3 = $categories->get_categories();
        $this->view->render("index", ["news"=>$data, "products"=>$data2, "categories"=>$data3]);
    }
}