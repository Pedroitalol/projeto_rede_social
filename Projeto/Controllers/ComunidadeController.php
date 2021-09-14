<?php

    namespace Projeto\Controllers;

    class ComunidadeController{
        public function index(){
            if(isset($_SESSION["login"])){
                \Projeto\Views\MainView::render("comunidade");
            }else{
                \Projeto\Utilidades::redirect(INCLUDE_PATH);
            }
            
        }
    }
?>