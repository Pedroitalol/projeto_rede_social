<?php

    namespace Projeto\Controllers;

    class PerfilController{
        public function index(){
            if(isset($_SESSION["login"])){
                if(isset($_POST["atualizar"])){
                    $pdo = \Projeto\MySql::connect();
                    $novoNome = strip_tags($_POST["nome"]);
                    $novaSenha = $_POST["senha"];
                    $novaSenhaConfirmar = $_POST["confirmar_senha"];

                    if($novoNome == ""){
                        \Projeto\Utilidades::alerta("Por favor, coloque o seu nome!");
                        \Projeto\Utilidades::redirect(INCLUDE_PATH."perfil");
                    }

                    if($novaSenha != "" && $novaSenha == $novaSenhaConfirmar && strlen($novaSenha) >= 8){
                        $novaSenha = \Projeto\Bcrypt::hash($novaSenha);
                        $atualizar = $pdo->prepare("UPDATE usuarios SET nome = ?, senha = ? WHERE id = ?");
                        $atualizar->execute(array($novoNome, $novaSenha, $_SESSION["id"]));
                        $_SESSION["nome"] = explode(" ", $novoNome)[0];
                        
                    }else if(strcasecmp($novaSenha, $novaSenhaConfirmar)){
                        \Projeto\Utilidades::alerta("A confirmação da senha está errada!");
                        \Projeto\Utilidades::redirect(INCLUDE_PATH."perfil");
                    }else if($novaSenha != "" && strlen($novaSenha) < 8){
                        \Projeto\Utilidades::alerta("A senha precisa ter pelo menos 8 caracteres!");
                        \Projeto\Utilidades::redirect(INCLUDE_PATH."perfil");
                    }else{
                        $atualizar = $pdo->prepare("UPDATE usuarios SET nome = ? WHERE id = ?");
                        $atualizar->execute(array($novoNome, $_SESSION["id"]));
                        $_SESSION["nome"] = explode(" ", $novoNome)[0];
                    }

                    if($_FILES["file"]["tmp_name"] != ""){
                        $file = $_FILES["file"];
                        $fileExt = explode(".", $file["name"]);
                        $fileExt = $fileExt[count($fileExt) - 1];
                        if($fileExt == "png" || $fileExt == "jpg" || $fileExt == "jpeg"){
                            $size = intval($file["size"] / 1024);
                            if($size <= 300){
                                $atualizar = $pdo->prepare("UPDATE usuarios SET img = ? WHERE id = ?");
                                $idFoto = uniqid().".".$fileExt;
                                $atualizar->execute(array($idFoto, $_SESSION["id"]));
                                move_uploaded_file($file["tmp_name"], "C:xampp\htdocs\projeto_rede_social\uploads/".$idFoto);
                                $_SESSION["img"] = $idFoto;
                                \Projeto\Utilidades::alerta("Alterações feitas com sucesso!");
                                \Projeto\Utilidades::redirect(INCLUDE_PATH."perfil");
                            }else{
                                \Projeto\Utilidades::alerta("Erro ao processar seu arquivo.");
                                \Projeto\Utilidades::redirect(INCLUDE_PATH."perfil");
                            }
                        }else{
                            \Projeto\Utilidades::alerta("Apenas aceitamos .png, .jpg ou .jpeg como arquivos!");
                            \Projeto\Utilidades::redirect(INCLUDE_PATH."perfil");
                        }
                    }

                    
                    \Projeto\Utilidades::alerta("Alterações feitas com sucesso!");
                    \Projeto\Utilidades::redirect(INCLUDE_PATH."perfil");

                }

                \Projeto\Views\MainView::render("perfil");
            }else{
                \Projeto\Utilidades::redirect(INCLUDE_PATH);
            }
            
        }
    }
?>