<?php
    namespace Projeto\Controllers;

    class HomeController
    {
        public function index(){

            if(isset($_SESSION['login'])){
                \Projeto\Views\MainView::render("home");
            }else{
                \Projeto\Views\MainView::render("login");
            }
        }
    }
    
?>