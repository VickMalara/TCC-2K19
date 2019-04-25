<?php session_start() ?>
<!DOCTYPE html>
<html>
	<head>
		<title>PINEAPPLE</title>
		<meta charset="utf-8">
	</head>
		<body>

		<?php if(isset($_SESSION["usuario"])){?>
			<nav>
				<a href="editar-perfil.php">Editar Perfil</a>
				<a href="logout.php">Logout</a>
			</nav>
		<?php }else{ ?>
			<nav>
				<a href="login.php">Entrar</a>
				<a href="cadastro.php">Criar conta</a>
			</nav>
		<?php } ?>
		</body>
</html>