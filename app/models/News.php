<?php

class News
{
    public function get_news(){
        $db = Db::getInstance();
        $db->query("SELECT * FROM posts");
        $news = $db->fetch_all();
        return $news;
    }
    public function get_post($post_alias){
        $db = Db::getInstance();
        $db->query("SELECT * FROM posts WHERE `alias` = '$post_alias'");
        $post = $db->fetch_all();
        return $post;
    }
    public function set_post($post_title, $post_alias, $post_content){
        if($post_title != "" || $post_title != null || $post_alias !="" || $post_alias != null){
            $db = Db::getInstance();
            $db->query("SELECT * FROM posts WHERE `alias` = '$post_alias'");
            $post = $db->fetch_all();
            if(count($post) != 0){
                $db->query("SELECT * FROM posts");
                $post = $db->fetch_all();
                $next_id = $post[count($post)-1]["id"] + 1;
                $post_alias = $post_alias . "_" . $next_id;
            }
            $db->query("INSERT INTO `posts` (`title`, `alias`, `content`) VALUES ('$post_title', '$post_alias', '$post_content');");
        }
        return $post_alias;
    }
    public function update_post($post_id, $post_title, $post_alias, $post_content){
        if($post_title != "" || $post_title != null || $post_alias !="" || $post_alias != null){
            $db = Db::getInstance();
            $db->query("SELECT * FROM posts WHERE `alias` = '$post_alias'");
            $post = $db->fetch_all();
            if($post[0]["id"] != $post_id && count($post) != 0){
                $db->query("SELECT * FROM posts");
                $post = $db->fetch_all();
                $next_id = $post[count($post)-1]["id"] + 1;
                $post_alias = $post_alias . "_" . $next_id;
            }
            $db->query("UPDATE `posts` SET `title` = '$post_title', `alias` = '$post_alias', `content` = '$post_content' WHERE `id` = $post_id;");
            return $post_alias;
        }
    }
    public function delete_post($delete_id){
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
        $db->query("DELETE FROM `posts` WHERE $result");
    }
}