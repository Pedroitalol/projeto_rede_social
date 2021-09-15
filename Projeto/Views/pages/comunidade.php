<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['nome']; ?>, veja seus amigos!</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Azeret+Mono&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5959b8aaa3.js" crossorigin="anonymous"></script>
	<link href="<?php echo INCLUDE_PATH_STATIC ?>estilos/home.css" rel="stylesheet">
	<link href="<?php echo INCLUDE_PATH_STATIC ?>estilos/comunidade.css" rel="stylesheet">


</head>

<body>
	<section class="comunidade_container">
		<div class="sidebar">
            <div class="sidebar_logo">
                <img src="<?php echo INCLUDE_PATH_STATIC ?>imgs/logo1.png" alt="Logo da rede social" >
            </div><!-- sidebar_logo -->

            <div class="sidebar_menu">
                <h3>Menu</h3>
                <nav>
                    <a href="<?php echo INCLUDE_PATH ?>"><i class="fas fa-pager"></i> Página inicial</a>
                    <a href="#"><i class="far fa-address-card"></i> Perfil</a>
                    <a href="<?php echo INCLUDE_PATH ?>comunidade"> <i class="fas fa-user-friends"></i> Amigos</a>

                    <a href="<?php echo INCLUDE_PATH ?>?loggout"> <i class="fas fa-sign-out-alt"></i> Sair da conta</a>
                </nav>
            </div><!-- sidebar_menu -->
        </div><!-- sidebar -->

		<div class="feed_comunidade">
			<div class="comunidade">
				<div class="container_comunidade">
					<h4>Amigos</h4>
					
					<div class="container_comunidade_wraper">
						<?php
							$listaAmigos = \Projeto\Models\ComunidadeModel::listarAmigos();

							foreach ($listaAmigos as $key => $value) {
								
						?>
						<div class="container_comunidade_single">
							<div class="img_comunidade_user_single">
								<img src="<?php echo INCLUDE_PATH_STATIC ?>imgs/avatar.jpg" />
							</div><!-- img_comunidade_user_single -->
							<div class="info_comunidade_user_single">
								<h2><?php echo $value["nome"]; ?></h2>
								<p><?php echo $value["email"]; ?></p>
							</div><!-- info_comunidade_user_single -->

						</div><!-- container_comunidade_single -->
						<?php } ?>
					</div><!-- container_comunidade_wraper -->
				</div><!-- container_comunidade -->
				<br/>

				<div class="container_comunidade">
					<h4>Comunidade</h4>
					<div class="container_comunidade_wraper">
						<?php 
							$comunidade = \Projeto\Models\ComunidadeModel::listarComunidade();
							$i = 0;
							foreach($comunidade as $key => $value){
								// Caso o usuário for o mesmo logado ou se for amigo desse
								if($value["id"] == $_SESSION["id"] || \Projeto\Models\ComunidadeModel::verificarAmizadeConfirmada($value["id"])){
									continue;
								}
						?>
						<div class="container_comunidade_single">
							<div class="img_comunidade_user_single">
								<img src="<?php echo INCLUDE_PATH_STATIC ?>imgs/avatar.jpg" />
							</div><!-- img_comunidade_user_single -->
							
							<div class="info_comunidade_user_single">
								<h2><?php echo $value["nome"]; ?></h2>
								<p><?php echo $value["email"]; ?></p>
								<div class="btn_solicitar_amizade">
									<?php 
										if(!(\Projeto\Models\ComunidadeModel::verificarAmizade($value["id"]))){
									?>
									<a href="<?php echo INCLUDE_PATH ?>comunidade?solicitarAmizade=<?php echo $value["id"]; ?>">
									Solicitar Amizade</a>
									<?php }else{ ?>
										<a href="javascript:void(0)">Pedido pendente</a>
									<?php } ?>
								</div><!-- btn_solicitar_amizade -->
							</div><!-- info_comunidade_user_single -->
						</div><!-- container_comunidade_single -->	
						<?php } ?>
						
					</div><!-- container_comunidade_wraper -->
				</div><!-- container_comunidade -->
			</div><!-- comunidade -->
		</div><!-- feed_comunidade -->
	</section><!-- comunidade_container -->
</body>

</html>