<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Azeret+Mono&display=swap" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH_STATIC ?>estilos/style.css" rel="stylesheet">

</head>
<body>
    
    <div class="sidebar">
        
    </div> <!--sidebar-->
    
    <div class="form_login_container">
        <div class="logo_login">
            <img src="<?php echo INCLUDE_PATH_STATIC ?>imgs/logo1.png" alt="Logo da rede social" width="30%" height="20%">
            <p>A melhor rede social feita na minha casa! :)</p>
        </div><!--logo_login-->

        <div class="form_login">
            <form method="post">
                <p>E-mail:</p>
                <input type="text" name="email" placeholder="E-mail...">
                <p>Senha:</p>
                <input type="password" name="senha" placeholder="Senha...">
                <input type="submit" name="acao" value="Entrar!">
                <input type="hidden" name="login" value="login">
            </form>
            <p><a href="<?php echo INCLUDE_PATH ?>registrar">Criar conta?</a></p>
        </div><!--form_login-->

    </div> <!--form_login_container-->
</body>
</html>