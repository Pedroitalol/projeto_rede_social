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

        public static function listarAmizadesPendentes(){
            $pdo = \Projeto\MySql::connect();

            $listarAmizadesPendentes = $pdo->prepare("SELECT * FROM amizades WHERE recebeu = 
                ? AND status = ?");
            $listarAmizadesPendentes->execute(array($_SESSION["id"], 0));
            return $listarAmizadesPendentes->fetchAll();
        }

        public static function getUsuarioById($id){
            $pdo = \Projeto\MySql::connect();

            $usuario = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
            $usuario->execute(array($id));
            return $usuario->fetch();
        }

        public static function atualizarPedidoAmizade($idAmigo, $status){
            $pdo = \Projeto\MySql::connect();

            if($status == 0){
                // Recusar o pedido, deletando da tabela:
                $del = $pdo->prepare("DELETE FROM amizades WHERE enviou = ? AND recebeu = ? AND status = ?");
                $del->execute(array($idAmigo, $_SESSION["id"], 0));
            }else if($status == 1){
                // Aceitar pedido:
                $aceitar = $pdo->prepare("UPDATE amizades SET status = ? WHERE enviou = ? AND recebeu = ?");
                $aceitar->execute(array(1, $idAmigo, $_SESSION["id"]));

                if($aceitar->rowCount() == 1){
                    return true;
                }else{
                    return false;
                }
            }
        }
    }
    
?>