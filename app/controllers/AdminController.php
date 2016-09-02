<?php

class AdminController extends Controller
{
    public function indexAction(){
        $this->view->render("admin/index");
    }

    public function loginAction(){
        $this->view->render("admin/login");
    }
    
    // News
    public function newsAction(){
        $news = new News();
        $data = $news->get_news();
        $this->view->render("admin/news", ["news"=>$data]);
    }
    public function add_newsAction(){
        $this->view->render("admin/add-news");
    }
    public function edit_newsAction($alias){
        $news = new News();
        $data = $news->get_post($alias);
        $this->view->render("admin/edit-news", ["post"=>$data]);
    }
    
    // Products
    public function productsAction(){
        $product = new Products();
        $data = $product->get_products();
        $this->view->render("admin/products", ["products"=>$data]);
    }
    public function add_productAction(){
        $categories = new Categories();
        $data = $categories->get_categories();
        $this->view->render("admin/add-product", ["categories"=>$data]);
    }
    public function edit_productAction($alias){
        $product = new Products();
        $data = $product->get_product($alias);
        $categories = new Categories();
        $categories = $categories->get_categories();
        $this->view->render("admin/edit-product", ["product"=>$data, "categories"=>$categories]);
    }
    
    // Categories
    public function categoriesAction(){
        $categories = new Categories();
        $data = $categories->get_categories();
        $this->view->render("admin/categories", ["categories"=>$data]);
    }
    public function add_categoryAction(){
        $this->view->render("admin/add-category");
    }
    public function edit_categoryAction($alias){
        $categories = new Categories();
        $data = $categories->get_category($alias);
        $this->view->render("admin/edit-category", ["category"=>$data]);
    }
}
