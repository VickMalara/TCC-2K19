<!DOCTYPE html>
<html>
	<head>
		<title>PINEAPPLE</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="_css/interface.css">
		<link rel="stylesheet" id="nav" type="text/css" href="_css/nav-offline.css">
		<link rel="stylesheet" type="text/css" href="_css/validacao.css">
		<script type="text/javascript" src="_js/jquery.min.js"></script>
	</head>

	<body>
		<?php 
			session_start();
			include "nav.php"; 
		?>
		<div id="conteudo">
			<div id="bloco-conteudo">
				<div id="txt-central">
				<?php 
					include "conexao.php";

					$ident = $_GET["c"];
					$time = $_GET["d"];

					date_default_timezone_set('America/Sao_Paulo');
					$date = date('Y-m-d');
					$hr = date('H');
					$min = date('i');
					$seg = date('s');
					$date = strtotime($date) + 60*60*$hr + 60*$min + $seg;

					if($date-$time< 600){
						$sql = "UPDATE usuario SET validada = 1 WHERE ident = ". $ident;		
						if(mysqli_query($conexao, $sql)){
							$_SESSION['validacao'] = 1;
							echo'<h1>E-mail validado com sucesso! <a href = "index.php">Clique aqui</a> ou utilize o menu para voltar a navegar.</h1>';
						}else{
							echo'<h1>Algo deu errado no nosso sitema. Tente novamente mais tarde.</h1>';
						}
					}else{
						echo'<h1>O prazo desse link expirou. <button id="bt-send-email">Clique aqui</button> Para reenviarmos o email com um novo link para validação</h1>';
					}
				?>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$('#bt-send-email').click(function(){
				$.ajax({
					url : "sendemail.php",
					type : "get",
					beforeSend : function(){
						$("h1").html('Enviando E-mail...');
					}
				}).done(function(msg){
					$("h1").html('E-mail enviado com sucesso!');
					setTimeout(function(){
						location.href ="index.php";
					},500);
				});
			});
		</script>
	</body>
</html>