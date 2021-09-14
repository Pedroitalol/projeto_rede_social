<?php

    namespace Projeto\Controllers;

    class ComunidadeController{
        public function index(){
            if(isset($_SESSION["login"])){
                if(isset($_GET["solicitarAmizade"])){
                    $idPara = (int) $_GET["solicitarAmizade"];
                    if(\Projeto\Models\ComunidadeModel::solicitarAmizade($idPara)){
                        \Projeto\Utilidades::alerta("Deu bom");
                    }else{
                        \Projeto\Utilidades::alerta("Ocorreu um erro ao solicitar a amizade!");
                    }
                }
                \Projeto\Views\MainView::render("comunidade");
            }else{
                \Projeto\Utilidades::redirect(INCLUDE_PATH);
            }
            
        }
    }
?>