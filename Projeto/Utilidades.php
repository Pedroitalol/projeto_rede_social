<?php
    namespace Projeto;

    class Utilidades{
        public static function redirect($url){
            echo '<script>window.location.href="'.$url.'"</script>'; 
            die();
        }

        public static function alerta($msg){
            echo '<script>alert("'.$msg.'")</script>'; 
        }
    }
    

?>