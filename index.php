<?php session_start() ?>
<!DOCTYPE html>
<html>
	<head>
		<title>PINEAPPLE</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="_css/interface.css">
		<link rel="stylesheet" id="nav" type="text/css" href="_css/nav-offline.css">
		<link rel="stylesheet" id="nav" type="text/css" href="_css/projeto.css">
		<link rel="stylesheet" id="nav" type="text/css" href="_css/card.css">
		<script type="text/javascript" src="_js/jquery.min.js"></script>
	</head>
	<body>
		<?php include "nav.php"; ?>
		<div id="conteudo">
			<div id="bloco-conteudo">
				<?php
					if(isset($_SESSION["validacao"]) && $_SESSION["validacao"] == 0){
						echo'<div id="validacao">
							<button class="bt-close">&times;</button>
							<p>Seu e-mail ainda precisa ser validado. <button id="bt-send-email">Clique aqui</button> e será enviado ao seu e-mail um link de verificação. Acesse esse link e seu e-mail será validado.</p>
						</div>';
					}
				?>
				<div id="txt-central">
					<h1>,Aqui você aprende a criar sites brincando! Para começar a usar, crie ou acesse sua conta.</h1>
				</div>
				
			</div>
			<div id="modal-dinamico">
			</div>
		</div>
		<script type="text/javascript">
			var interval;

			$(function(){
				$('#bt-login').on("click",function(){
					$("#modal-dinamico").css("width",'100%');
					$.ajax({
						url : 'login.php',
						type : 'get'
					}).done(function(msg){
						$('#modal-dinamico').html(msg);
					});
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

				$('#bt-send-email').click(function(){
					$.ajax({
						url : "sendemail.php",
						type : "get",
						beforeSend : function(){
							$("#validacao").css('background','rgba(237, 198, 83,0.5)');
							$("#validacao p").html('Enviando E-mail...');
						}
					}).done(function(msg){
						$("#validacao").css('background','rgba(22, 182, 123,0.5)');
						$("#validacao p").html('E-mail enviado com sucesso!');
						setTimeout(function(){
							$("#validacao").fadeOut();
						},500);
					});
				});
			});
		</script>
	</body>
</html>