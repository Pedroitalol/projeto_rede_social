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
                    <a href="home"><i class="fas fa-pager"></i> Página inicial</a>
                    <a href="#"><i class="far fa-address-card"></i> Perfil</a>
                    <a href="comunidade"> <i class="fas fa-user-friends"></i> Amigos</a>

                    <a href="<?php echo INCLUDE_PATH ?>?loggout"> <i class="fas fa-sign-out-alt"></i> Sair da conta</a>
                </nav>
            </div><!-- sidebar_menu -->
        </div><!-- sidebar -->
        
        <div class="feed">
            <div class="feed_posts">
                <div class="feed_one_post">
                    <div class="feed_one_post_author">
                        <div class="img_author">
                            <img src="<?php echo INCLUDE_PATH_STATIC ?>imgs/foto_perfil_principal.jpeg" alt="Foto de perfil" >
                        </div><!-- img_authot -->
                        
                        <div class="info_authot">
                            <h3>Joãozinho Pegador</h3>
                            <p>4:20 10/12/2019</p>
                        </div><!-- info_authot -->
                        
                    </div><!-- feed_one_post_author -->

                    <div class="feed_one_post_content">
                        <p>Obrigado Deus por mais um ano de vida! Que venha mais cachaça, que eu aguento!</p>
                        
                    </div><!-- feed_one_post_author -->
                </div><!-- feed_one_post -->
                <div class="feed_one_post">
                    <div class="feed_one_post_author">
                        <div class="img_author">
                            <img src="<?php echo INCLUDE_PATH_STATIC ?>imgs/foto_perfil_principal.jpeg" alt="Foto de perfil" >
                        </div><!-- img_authot -->
                        <div class="info_authot">
                            <h3>Juliana bomde</h3>
                            <p>2:01 12/12/2019</p>
                        </div>
                        
                    </div><!-- feed_one_post_author -->

                    <div class="feed_one_post_content">
                        <p>Cortei o cabelo, gostaram?</p>
                        <img src="<?php echo INCLUDE_PATH_STATIC ?>imgs/feed.jpg" alt="Foto do feed">
                    </div>
                </div><!-- feed_one_post -->
                
            </div><!-- feed_posts -->
            
            
            <div class="friends_feed">
                <h3>Solicitações de amizade:</h3>
                
                <div class="friends_one_request">
                    <img src="<?php echo INCLUDE_PATH_STATIC ?>imgs/foto_perfil.jpg" alt="Foto de perfil" >
                    <div class="friends_one_request_info">
                        <h4>Julio, o Grande</h4>
                        <p> <a href="#">Aceitar</a>|<a href="#">Recusar</a></p>
                    </div><!-- friends_one_request_info -->
                </div><!-- friends_one_request -->

                <div class="friends_one_request">
                    <img src="<?php echo INCLUDE_PATH_STATIC ?>imgs/foto_perfil1.jpg" alt="Foto de perfil" >
                    <div class="friends_one_request_info">
                        <h4>Valentina do Diabo</h4>
                        <p> <a href="#">Aceitar</a>|<a href="#">Recusar</a></p>
                    </div><!-- friends_one_request_info -->
                </div><!-- friends_one_request -->

                <div class="friends_one_request">
                    <img src="<?php echo INCLUDE_PATH_STATIC ?>imgs/foto_perfil2.jpg" alt="Foto de perfil" >
                    <div class="friends_one_request_info">
                        <h4>Jeremias, na gloria do senhor</h4>
                        <p> <a href="#">Aceitar</a>|<a href="#">Recusar</a></p>
                    </div><!-- friends_one_request_info -->
                </div><!-- friends_one_request -->
            </div><!-- friends_feed -->
        </div><!-- feed -->
    </section><!-- feed_container -->
</body>
    
</html>