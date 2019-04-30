<?php session_start() ?>
<!DOCTYPE html>
<html>
	<head>
		<title>PINEAPPLE</title>
		<meta charset="utf-8">
		<script type="text/javascript" src="_js/jquery.min.js"></script>
		<script type="text/javascript">

			$(function(){
				$('#bt-login').click(function(){
					$.ajax({
						url : 'login.php',
						type : 'get'
					}).done(function(msg){
						$('#modal-dinamico').html(msg);
					})
				});

				$('#bt-cadastro').click(function(){
					$.ajax({
						url : 'cadastro.php',
						type : 'get'
					}).done(function(msg){
						$('#modal-dinamico').html(msg);
					})
				});
			});
		</script>
	</head>
	<body>
		<nav>
			<?php if(isset($_SESSION["usuario"])){
					echo'<a href="editar-perfil.php">Editar Perfil</a>
					<a href="logout.php">Logout</a>';
			}else{
				echo'<button id="bt-login" type="button">Entrar</button>
					<button id="bt-cadastro" type="button">Criar conta</button>';
			} ?>
		</nav>
		<div id="conteudo">
			<div id="bloco-conteudo">
				<div class="txt-central">
					<h1>Txt</h1>
				</div>
			</div>
			<div id="modal-dinamico">
			</div>
		</div>
	</body>
</html>