<?php 
    // Testando o git 
    session_start();
    require("vendor/autoload.php");

    define("INCLUDE_PATH_STATIC", "http://localhost/projeto_rede_social/Projeto/Views/pages/");
    define("INCLUDE_PATH", "http://localhost/projeto_rede_social/");

    $app = new Projeto\Aplication();

    $app->run();
?>