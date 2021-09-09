<?php
    namespace Projeto;

    
    class MySql{

        private static $pdo;

        public static function connect(){
            if(self::$pdo == NULL){
                try{
                    self::$pdo = new \PDO("mysql:host=localhost; dbname=projeto_rede_social", "root", 
                    '', array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                    
                    // Testando a criação da tabela de forma altomatica:
                    
                    // $verTable = self::$pdo->prepare("show tables");
                    // $qntd = $verTable->execute();
                    // echo "aaaa".$qntd."<br>";
                    // if($qntd == 1){
                    //     // Criar tabela:
                    //     echo "teste<br>";
                    //     $temp = self::$pdo->prepare("CREATE TABLE `projeto_rede_social`.`usuarios` ( `id` 
                    //     INT NOT NULL AUTO_INCREMENT , `nome` VARCHAR(255) NOT NULL , `email` VARCHAR(255) 
                    //     NOT NULL , `senha` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;");
                    //     $temp->execute();
                    // }
                    
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