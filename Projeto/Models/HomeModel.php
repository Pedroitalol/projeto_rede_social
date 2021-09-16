<?php
    namespace Projeto\Models;

    class HomeModel{
        public static function postFeed($post){
            $pdo = \Projeto\MySql::connect();
            
            $post = strip_tags($post);

            $postFeed = $pdo->prepare("INSERT INTO posts VALUES (null, ?, ?, ?)");
            $postFeed->execute(array($_SESSION["id"], $post, date("Y-m-d H:i:s", time())));

            $ultimoPost = $pdo->prepare("UPDATE usuarios SET ultimo_post = ? WHERE id = ?");
            $ultimoPost->execute(array(date("Y-m-d H:i:s", time()), $_SESSION["id"]));
        }

    }
?>