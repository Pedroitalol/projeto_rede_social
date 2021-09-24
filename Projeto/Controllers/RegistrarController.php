<?php
    namespace Projeto\Controllers;

    class RegistrarController
    {
        public function index(){
            if(isset($_POST["registrar"])){
                $email = $_POST["email"];
                $nome = $_POST["nome"];
                $senha = $_POST["senha"];
                $confirmar_senha = $_POST["confirmar_senha"];

                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    \Projeto\Utilidades::alerta("E-mail invalido!");
                    \Projeto\Utilidades::redirect(INCLUDE_PATH."registrar");
                       
                }else if(strlen($senha) < 8){
                    \Projeto\Utilidades::alerta("A senha precisa ter pelo menos 8 caracteres!");
                    \Projeto\Utilidades::redirect(INCLUDE_PATH."registrar");

                }else if(strcasecmp($senha, $confirmar_senha)){
                    \Projeto\Utilidades::alerta("A confirmação da senha está errada!");
                    \Projeto\Utilidades::redirect(INCLUDE_PATH."registrar");

                }else if(\Projeto\Models\UsuariosModel::emailExists($email)){
                    \Projeto\Utilidades::alerta("Email já utilizado!");
                    \Projeto\Utilidades::redirect(INCLUDE_PATH."registrar");

                }else{
                    $senha = \Projeto\Bcrypt::hash($senha);
                    $registro = \Projeto\MySql::connect()->prepare("INSERT INTO usuarios VALUES (null, ?, ?, ?, ?, ?)");
                    $registro->execute(array($nome, $email, $senha, "", ""));

                    \Projeto\Utilidades::alerta("Registrado com sucesso!");
                    \Projeto\Utilidades::redirect(INCLUDE_PATH);
                }

            }
            \Projeto\Views\MainView::render("registrar");
            
        }
    }
    
?>