<?php

class Products
{
    public function get_products(){
        $db = Db::getInstance();
        $db->query("SELECT p.*, c.cat_title, c.cat_alias FROM products as p JOIN categories as c ON p.cat_id = c.cat_id");
        $products = $db->fetch_all();
        return $products;
    }
    public function get_product($product_alias){
        $db = Db::getInstance();
        $db->query("SELECT * FROM products as p JOIN categories as c ON p.cat_id = c.cat_id WHERE `alias` = '$product_alias'");
        $product = $db->fetch_all();
        return $product;
    }
    public function set_product($product_title, $product_alias, $product_cat, $product_price, $product_old_price, $product_sku, $product_info, $product_content){
        if($product_title != "" || $product_title != null || $product_alias != "" || $product_alias != null){
            $db = Db::getInstance();
            $db->query("SELECT * FROM products WHERE `alias` = '$product_alias'");
            $post = $db->fetch_all();
            if(count($post) != 0){
                $db->query("SELECT * FROM products");
                $post = $db->fetch_all();
                $next_id = $post[count($post)-1]["id"] + 1;
                $product_alias = $product_alias . "_" . $next_id;
            }
            $db->query("INSERT INTO `products` (`title`, `alias`, `cat_id`, `price`, `old_price`, `sku`, `info`, `content`) 
                        VALUES ('$product_title', '$product_alias', $product_cat, $product_price, $product_old_price, $product_sku, '$product_info', '$product_content');");
            return $product_alias;
        }
    }
    public function update_product($product_id, $product_title, $product_alias, $product_cat, $product_price, $product_old_price, $product_sku, $product_info, $product_content){
        if($product_title != "" || $product_title != null || $product_alias != "" || $product_alias != null){
            $db = Db::getInstance();
            $db->query("SELECT * FROM products WHERE `alias` = '$product_alias'");
            $post = $db->fetch_all();
            if($post[0]["id"] != $product_id && count($post) != 0){
                $db->query("SELECT * FROM products");
                $post = $db->fetch_all();
                $next_id = $post[count($post)-1]["id"] + 1;
                $product_alias = $product_alias . "_" . $next_id;
            }
            $db->query("UPDATE `products` 
                        SET `title` = '$product_title', `alias` = '$product_alias', 
                            `cat_id` = $product_cat, `price` = $product_price, `old_price` = $product_old_price, `sku` = $product_sku, `info` = '$product_info', `content` = '$product_content' 
                        WHERE `id` = $product_id;");
            return $product_alias;
        }
    }
    public function delete_product($delete_id){
        $result = '';
        $count = 0;
        foreach ($delete_id as $item) {
            if($count == 0){
                $or = "";
            } else {
                $or = " OR ";
            }
            $result = $result . $or . "`id` = " . $item;
            $count++;
        }
        $db = Db::getInstance();
        $db->query("DELETE FROM `products` WHERE $result");
    }
}