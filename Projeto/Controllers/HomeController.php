<?php
    namespace Projeto\Controllers;

    class HomeController
    {
        public function index(){

            if(isset($_GET["loggout"])){
                session_unset();
                session_destroy();
                \Projeto\Utilidades::redirect(INCLUDE_PATH);
            }

            if(isset($_SESSION["login"])){
                // Mostrar página do usuário
                \Projeto\Views\MainView::render("home");
            }else{
                // Mostrar página de login
                if(isset($_POST["login"])){
                    $email = $_POST["email"];
                    $senha = $_POST["senha"];
                    
                    $verifica = \Projeto\MySql::connect()->prepare("SELECT * FROM usuarios WHERE email = ?");
                    $verifica->execute(array($email));
                    
                    if($verifica->rowCount() == 0){
                        // Não existe o email no BD
                        \Projeto\Utilidades::alerta("Email não consta no Banco de Dados!");
                        \Projeto\Utilidades::redirect(INCLUDE_PATH);
                    }else{
                        $dados = $verifica->fetch();
                        $senhaBanco = $dados["senha"];
                        if(\Projeto\Bcrypt::check($senha, $senhaBanco)){
                            // Vai para a página do usuário
                            $_SESSION["login"] = $dados["email"];
                            $_SESSION["id"] = $dados["id"];
                            $_SESSION["nome"] = explode(" ", $dados["nome"])[0];
                            \Projeto\Utilidades::redirect(INCLUDE_PATH);
                        }else{
                            \Projeto\Utilidades::alerta("Senha incorreta");
                            \Projeto\Utilidades::redirect(INCLUDE_PATH);
                        }
                    }
                }
                \Projeto\Views\MainView::render("login");
            }
        }
    }
    
?>