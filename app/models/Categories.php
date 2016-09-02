<?php

class Categories
{
    public function get_categories(){
        // Подключение к БД
        $db = Db::getInstance();
        $db->query("SELECT * FROM categories");
        $categories = $db->fetch_all();
        return $categories;
    }
    public function get_category($alias){
        $db = Db::getInstance();
        $db->query("SELECT * FROM categories WHERE `cat_alias` = '$alias'");
        $category = $db->fetch_all();
        return $category;
    }
    public function set_category($category_title, $category_alias, $category_description){
        if($category_title != "" || $category_title != null || $category_alias !="" || $category_alias != null){
            $db = Db::getInstance();
            $db->query("SELECT * FROM categories WHERE `cat_alias` = '$category_alias'");
            $post = $db->fetch_all();
            if(count($post) != 0){
                $db->query("SELECT * FROM categories");
                $post = $db->fetch_all();
                $next_id = $post[count($post)-1]["cat_id"] + 1;
                $category_alias = $category_alias . "_" . $next_id;
            }
            $db->query("INSERT INTO `categories` (`cat_title`, `cat_alias`, `cat_description`) 
                        VALUES ('$category_title', '$category_alias', '$category_description');");
            return $category_alias;
        }
    }
    public function update_category($category_id, $category_title, $category_alias, $category_description){
        if($category_title != "" || $category_title != null || $category_alias != "" || $category_alias != null){
            $db = Db::getInstance();
            $db->query("SELECT * FROM categories WHERE `cat_alias` = '$category_alias'");
            $post = $db->fetch_all();
            if($post[0]["cat_id"] != $category_id && count($post) != 0){
                $db->query("SELECT * FROM categories");
                $post = $db->fetch_all();
                $next_id = $post[count($post)-1]["cat_id"] + 1;
                $category_alias = $category_alias . "_" . $next_id;
            }
            $db->query("UPDATE `categories` 
                        SET `cat_title` = '$category_title', `cat_alias` = '$category_alias', `cat_description` = '$category_description' 
                        WHERE `cat_id` = $category_id;");
            return $category_alias;
        }
    }
    public function delete_category($delete_id){
        $result = '';
        $count = 0;
        foreach ($delete_id as $item) {
            if($count == 0){
                $or = "";
            } else {
                $or = " OR ";
            }
            $result = $result . $or . "`cat_id` = " . $item;
            $count++;
        }
        $db = Db::getInstance();
        $db->query("DELETE FROM `categories` WHERE $result");
    }
    public function get_products($alias){
        $db = Db::getInstance();
        $db->query("SELECT p.*, c.cat_title, c.cat_alias 
                    FROM products as p 
                    JOIN categories as c 
                    ON p.cat_id = c.cat_id
                    WHERE c.cat_alias = '$alias'");
        $products = $db->fetch_all();
        return $products;
    }
}