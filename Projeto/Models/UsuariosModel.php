<?php
    namespace Projeto\Models;

    class UsuariosModel{
        public static function emailExists($email){
            $pdo = \Projeto\MySql::connect();
            $verifica = $pdo->prepare("SELECT email FROM usuarios WHERE email = ?");
            $verifica->execute(array($email));

            if($verifica->rowCount() == 1)
                return true;
            else
                return false;
        }
    }
    
?>