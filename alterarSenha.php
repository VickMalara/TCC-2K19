<!DOCTYPE html>
<html>
<head>
	<title>PINEAPPLE | Recuperar Senha</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="_css/interface.css">
	<link rel="stylesheet" id="nav" type="text/css" href="_css/nav-offline.css">
	<script type="text/javascript" src="_js/jquery.min.js"></script>
</head>
<body>
	<div class="form-div" style="margin:auto;">
		<?php
			$time = $_GET["t"];
			$chave = $_GET["k"];

			include "conexao.php";

			date_default_timezone_set('America/Sao_Paulo');
			$date = date('Y-m-d');
			$hr = date('H');
			$min = date('i');
			$seg = date('s');
			$date = strtotime($date) + 60*60*$hr + 60*$min + $seg;

			$sql = "SELECT * FROM recsenha WHERE chave='".$chave."'";
			$result = mysqli_query($conexao,$sql);

			if($date-$time < 300 && mysqli_num_rows($result) == 1){
			echo'<form>
				<h1>Redefinir Senha</h1>
				<p>
					<label for="nvsenha">Nova Senha</label>
					<input type="password" name="nvsenha" id="nvsenha">
				</p>
				<p>
					<label for="nvsenha">Corfime a Senha</label>
					<input type="password" name="nvsenha-ver" id="versenha">
				</p>
					<input type="hidden" id="ident" value="'.$_GET["u"].'" >
				<p class="botoes">
					<button type="button" id="bt-senha">Salvar Senha</button>
				</p>
				<p id="msg-senha"></p>
			</form>';
			}else{
				$sql = "DELETE * FROM recsenha WHERE usuario = ".$ident;
				mysqli_query($conexao,$sql);
				echo"<h1>Esse link não funciona mais, por favor peça outro e-mail</h1>";
			}
		?>
	</div>
	<script type="text/javascript">
		$("#bt-senha").click(function(){
			$.ajax({
				url:"red-senha.php",
				type: 'post',
				data : {
					'nvsenha' : $('#nvsenha').val(),
					'versenha' : $('#versenha').val(),
					'ident' : $('#ident').val()
				},
				beforeSend : function(){
					$("#msg-senha").html('Salvando...');
				}
			}).done(function(msg){
				if(msg == 0){
					$("#msg-senha").html('Nova senha salva com sucesso! Estamos te redirecionando para a página inicial do site.');
					setTimeout(function(){
						location.href="index.php";
					},500);
				}else{
					$("#msg-senha").html('As senhas estão diferentes.');
				}
				});
			});
	</script>
</body>
</html>