<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de <?php echo $_SESSION['nome']; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Azeret+Mono&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5959b8aaa3.js" crossorigin="anonymous"></script>
    <link href="<?php echo INCLUDE_PATH_STATIC ?>estilos/perfil.css" rel="stylesheet">

</head>

<body>
    <section class="perfil_container">
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
        
        <div class="perfil">
            <h2>Edite seu perfil:</h2>
            <br>
            <div class="perfil_edition">
                <?php
                    if(isset($_SESSION["img"]) && $_SESSION["img"] == ""){
                        echo '<img src="'.INCLUDE_PATH_STATIC.'imgs/avatar.jpg" />';
                    }else{
                        echo '<img src="'.INCLUDE_PATH_STATIC .'imgs/'.$_SESSION["img"].'" />';
                    }
                ?>
                <br>
                <form >
                    <input type="text" name="nome" value="<?php echo $_SESSION["nome"] ?>">
                    <input type="password" name="senha" placeholder="Sua nova senha">
                    <input type="password" name="senha" placeholder="Confime a senha">
                    <input type="file" name="file" placeholder="Confime a senha">
                    <input type="submit" name="acao" value="Salvar">
                </form>

            </div><!-- perfil_edition -->
        </div><!-- perfil -->
    </section><!-- perfil_container -->
</body>
    
</html>