<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo <?php echo $_SESSION['nome']; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Azeret+Mono&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5959b8aaa3.js" crossorigin="anonymous"></script>
    <link href="<?php echo INCLUDE_PATH_STATIC ?>estilos/home.css" rel="stylesheet">

</head>

<body>
    <section class="feed_container">
        <div class="sidebar">
            <div class="sidebar_logo">
                <img src="<?php echo INCLUDE_PATH_STATIC ?>imgs/logo1.png" alt="Logo da rede social" >
            </div><!-- sidebar_logo -->

            <div class="sidebar_menu">
                <h3>Menu</h3>
                <nav>
                    <a href="<?php echo INCLUDE_PATH ?>"><i class="fas fa-pager"></i> Página inicial</a>
                    <a href="<?php echo INCLUDE_PATH ?>perfil"><i class="far fa-address-card"></i> Perfil</a>
                    <a href="<?php echo INCLUDE_PATH ?>comunidade"> <i class="fas fa-user-friends"></i> Amigos</a>
                    <a href="<?php echo INCLUDE_PATH ?>?loggout"> <i class="fas fa-sign-out-alt"></i> Sair da conta</a>
                </nav>
            </div><!-- sidebar_menu -->
        </div><!-- sidebar -->
        
        <div class="feed">
            <div class="feed_posts">
                <div class="feed_forms">
                    <h3>O que você está pensando?</h3>
                    <form method="post">
                        <textarea required="" name="post_content" placeholder="Digita aí..."></textarea>
                        <input type="hidden" name="post_feed">
                        <input type="submit" name="acao" value="Postar.">
                    </form>
                </div><!-- feed_forms -->

                <?php
                    $posts = \Projeto\Models\HomeModel::retrieveFriendsPosts();
                    foreach ($posts as $key => $value) {
                    
                ?>
                <div class="feed_one_post">
                    <div class="feed_one_post_author">
                        <div class="img_author">
                            <?php
                                if(!isset($value["me"]) && $value["img"] == ""){
                            ?>
                            <img src="<?php echo INCLUDE_PATH_STATIC ?>imgs/avatar.jpg" alt="Foto de perfil" >
                            <?php }else if(!isset($value["me"])){ ?>
                            <img src="<?php echo INCLUDE_PATH ?>uploads/<?php echo $value['img'] ?>" alt="Foto de perfil" >
                            <?php } ?>

                            <?php
                                if(isset($value["me"]) && $_SESSION["img"] == ""){
                            ?>
                            <img src="<?php echo INCLUDE_PATH_STATIC ?>imgs/avatar.jpg" alt="Foto de perfil" >
                            <?php }else if(isset($value["me"])){ ?>
                            <img src="<?php echo INCLUDE_PATH ?>uploads/<?php echo $_SESSION['img'] ?>" alt="Foto de perfil" >
                            <?php } ?>

                        </div><!-- img_author -->
                        <div class="info_author">
                            <?php 
                                if(isset($value["me"])){
                            ?>
                                <h3><?php echo $_SESSION["nome"]; ?></h3>
                            <?php 
                                }else{
                            ?>
                                <h3><?php echo $value["usuario"]; ?></h3>
                            <?php 
                                }
                            ?>
                            <p><?php echo date("d/m/Y H:i:s", strtotime($value["data"])) ?></p>
                        </div><!-- info_author -->
                    </div><!-- feed_one_post_author -->
                    <div class="feed_one_post_content">
                        <?php echo $value["conteudo"] ?>
                    </div>
                </div><!-- feed_one_post -->
                <?php
                    }
                ?>

            </div><!-- feed_posts -->
            
            
            <div class="friends_feed">
                <h3>Solicitações de amizade:</h3>

                <?php 
                    $listaAmizades = \Projeto\Models\UsuariosModel::listarAmizadesPendentes();
                    foreach ($listaAmizades as $key => $value) {
                        # code...
                        $usuarioInfo = \Projeto\Models\UsuariosModel::getUsuarioById($value["enviou"]);
                ?>
                
                <div class="friends_one_request">
                    <?php
                        if(!isset($value["me"]) && $usuarioInfo["img"] == ""){
                    ?>
                    <img src="<?php echo INCLUDE_PATH_STATIC ?>imgs/avatar.jpg" alt="Foto de perfil" >
                    <?php }else if(!isset($value["me"])){ ?>
                    <img src="<?php echo INCLUDE_PATH ?>uploads/<?php echo $usuarioInfo['img'] ?>" alt="Foto de perfil" >
                    <?php } ?>

                    <?php
                        if(isset($value["me"]) && $_SESSION["img"] == ""){
                    ?>
                    <img src="<?php echo INCLUDE_PATH_STATIC ?>imgs/avatar.jpg" alt="Foto de perfil" >
                    <?php }else if(isset($value["me"])){ ?>
                    <img src="<?php echo INCLUDE_PATH ?>uploads/<?php echo $_SESSION['img'] ?>" alt="Foto de perfil" >
                    <?php } ?>
                    <div class="friends_one_request_info">
                        <h4><?php echo $usuarioInfo["nome"] ?></h4>
                        <p> <a href="<?php echo INCLUDE_PATH ?>?aceitarAmizade=<?php
                            echo $usuarioInfo["id"] ?>">Aceitar</a>|<a href="<?php echo INCLUDE_PATH
                            ?>?recusarAmizade=<?php echo $usuarioInfo["id"] ?>">Recusar</a></p>
                    </div><!-- friends_one_request_info -->
                </div><!-- friends_one_request -->

                <?php } ?>
            </div><!-- friends_feed -->
        </div><!-- feed -->
    </section><!-- feed_container -->
</body>
    
</html>