<?php session_start() ?>
<!DOCTYPE html>
<html>
	<head>
		<title>PINEAPPLE</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="_css/interface.css">
		<script type="text/javascript" src="_js/jquery.min.js"></script>
	</head>
	<body>
		<nav>
			<?php if(isset($_SESSION["usuario"])){
					echo'<button id="bt-editar-perfil">Editar Perfil</button>
					<button id="bt-logout">Logout</button>';
			}else{
				echo'<button id="bt-login" type="button">Entrar</button>
					<button id="bt-cadastro" type="button">Criar conta</button>';
			} ?>
		</nav>
		<div id="conteudo">
			<div id="bloco-conteudo">
				<div id="txt-central">
					<h1>Aqui você aprende a criar sites brincando! Para começar a usar, crie ou acesse sua conta.</h1>
				</div>
				
			</div>
			<div id="modal-dinamico">
			</div>
		</div>
		<script type="text/javascript">

			$(function(){
				$('#bt-login').on("click",function(){
					$("#modal-dinamico").css("width",'100%');
					$.ajax({
						url : 'login.php',
						type : 'get'
					}).done(function(msg){
						$('#modal-dinamico').html(msg);
					})
				});

				$('#bt-cadastro').on("click",function(){
					$("#modal-dinamico").css("width",'100%');
					$.ajax({
						url : 'cadastro.php',
						type : 'get'
					}).done(function(msg){
						$('#modal-dinamico').html(msg);
					})
				});

				$('#bt-editar-perfil').on("click",function(){
					$("#modal-dinamico").css("width",'100%');
					$.ajax({
						url : 'editar-perfil.php',
						type : 'get'
					}).done(function(msg){
						$('#modal-dinamico').html(msg);
					})
				});

				$('#bt-logout').on("click",function(){
					$.ajax({
						url : 'logout.php',
						type : 'get'
					}).done(function(msg){
						 window.location.reload();
					});
				});
			});
		</script>
	</body>
</html>