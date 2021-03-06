<?php
    namespace Projeto\Models;

    class ComunidadeModel{

        public static function listarComunidade(){
            $pdo = \Projeto\MySql::connect();

            $comunidade = $pdo->prepare("SELECT * FROM usuarios");
            $comunidade->execute();

            return $comunidade->fetchAll();

        }

        public static function solicitarAmizade($idPara){
            $pdo = \Projeto\MySql::connect();

            $verificaAmizade = $pdo->prepare("SELECT * FROM amizades WHERE (enviou = ? AND recebeu = ?) 
                OR (enviou = ? AND recebeu = ?)");
            $verificaAmizade->execute(array($_SESSION["id"], $idPara, $idPara, $_SESSION["id"]));

            if($verificaAmizade->rowCount() == 1){
                return false;
            }else{
                $addAmizade = $pdo->prepare("INSERT INTO amizades VALUES (null, ?, ?, ?)");
                if($addAmizade->execute(array($_SESSION["id"], $idPara, 0))){
                    return true;
                }
                return false;
            }
        }

        public static function verificarAmizade($idPara){
            $pdo = \Projeto\MySql::connect();
            $verificaAmizade = $pdo->prepare("SELECT * FROM amizades WHERE (enviou = ? AND recebeu = ? AND 
                status = ?) OR (enviou = ? AND recebeu = ? AND status = ?)");
            $verificaAmizade->execute(array($_SESSION["id"], $idPara, 0, $idPara, $_SESSION["id"], 0));
            if($verificaAmizade->rowCount() == 1){
                return true;
            }else{
                return false;
            }
        }

        public static function verificarAmizadeConfirmada($idPara){
            $pdo = \Projeto\MySql::connect();
            $verificaAmizade = $pdo->prepare("SELECT * FROM amizades WHERE (enviou = ? AND recebeu = ? AND 
                status = ?) OR (enviou = ? AND recebeu = ? AND status = ?)");
            $verificaAmizade->execute(array($_SESSION["id"], $idPara, 1, $idPara, $_SESSION["id"], 1));
            if($verificaAmizade->rowCount() == 1){
                return true;
            }else{
                return false;
            }

        }

        public static function listarAmigos(){
            $pdo = \Projeto\MySql::connect();

            $amizades = $pdo->prepare("SELECT * FROM amizades WHERE (enviou = ? OR recebeu = ?) AND status = ?");
            $amizades->execute(array($_SESSION["id"], $_SESSION["id"], 1));

            $amizades = $amizades->fetchAll();
            $amigosConfirmados = array();
            foreach ($amizades as $key => $value) {
                if($value["enviou"] == $_SESSION["id"]){
                    $amigosConfirmados[] = $value["recebeu"];
                }else{
                    $amigosConfirmados[] = $value["enviou"];
                }
            }

            $listaAmigos = array();

            foreach ($amigosConfirmados as $key => $value) {
                $listaAmigos[] = \Projeto\Models\UsuariosModel::getUsuarioById($value); 
            }
            return $listaAmigos;
        }
    }

?>