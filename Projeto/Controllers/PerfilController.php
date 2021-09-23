<?php

    namespace Projeto\Controllers;

    class PerfilController{
        public function index(){
            if(isset($_SESSION["login"])){
                \Projeto\Views\MainView::render("perfil");
            }else{
                \Projeto\Utilidades::redirect(INCLUDE_PATH);
            }
            
        }
    }
?>