<?php
    namespace Projeto;

    
    class MySql{

        private static $pdo;

        public static function connect(){
            if(self::$pdo == NULL){
                try{
                    self::$pdo = new \PDO("mysql:host=localhost; dbname=projeto_rede_social", "root", 
                    '', array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                    // self::$pdo->setAttribut(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                }catch(Excepion $e){
                    echo "Erro ao conectar no servidor";
                    error_log($e->getMensage());
                }
            }

            return self::$pdo;
        }
    }
    
?>