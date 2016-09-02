<?php

class CatalogController extends Controller
{
    public function indexAction(){
        $categories = new Categories();
        $data = $categories->get_categories();
        $this->view->render("catalog/index", ["categories"=>$data]);
    }
    public function categoryAction($alias){
        $categories = new Categories();
        $data = $categories->get_category($alias);
        $data2 = $categories->get_products($alias);
        $data3 = $categories->get_categories();
        $this->view->render("catalog/category", ["category"=>$data, "products"=>$data2,"categories"=>$data3]);
    }
    public function productAction($alias){
        $product = new Products();
        $data = $product->get_product($alias);
        $categories = new Categories();
        $data2 = $categories->get_categories();
        $this->view->render("catalog/product", ["product"=>$data,"categories"=>$data2]);
    }
}