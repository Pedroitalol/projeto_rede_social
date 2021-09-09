<?php
    namespace Projeto\Views;

    Class MainView{
        public static function render($fileName){
            include('pages/'.$fileName.'.php');
        }
    }
?>