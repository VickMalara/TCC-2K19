<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<script type="text/javascript" src="_js/jquery.min.js"></script>
		<script type="text/javascript" src="_js/bootstrap.min.js"></script>
		<script type="text/javascript" src="_js/colorPick.min.js"></script>
		<script type="text/javascript" src="_js/dytemp.js"></script>
		<link rel="stylesheet" type="text/css" href="_css/interface.css"/>
		<link rel="stylesheet" type="text/css" href="_css/bootstrap.min.css">
		<link rel="stylesheet" href="_css/colorPick.min.css">
		<link rel="stylesheet" type="text/css" href="_css/projeto.css"/>
		<title>Pineapple Kids Devel</title>
	</head>
	<body class="w-100 h-100">
		<div class="page h-100">
			<div class="row m-0 h-100">
			<?php
				if(!isset($_SESSION["usuario"])){
					include "pagina-login.php";
				}else{
					include "pagina-inicial.php";
				}
			 ?>
			</div>
		</div>
		<div id="modal-dinamico" class="h-100">
		</div>
	</body>

	<script type="text/javascript">
		$(function(){
			$('#bt-login').on("click",function(){
				$("#modal-dinamico").css('width','100%');
				$.ajax({
					url : 'login.php',
					type : 'get'
				}).done(function(msg){
					$('#modal-dinamico').html(msg);
				});
			});

			$('#bt-cadastro').on("click",function(){
				$("#modal-dinamico").css('width','100%');
				$.ajax({
					url : 'cadastro.php',
					type : 'get'
				}).done(function(msg){
					$('#modal-dinamico').html(msg);
				});
			});
		});
	</script>
</html>