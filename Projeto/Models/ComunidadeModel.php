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
    }

?>