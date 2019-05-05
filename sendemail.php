<?php
	session_start();
	include "conexao.php";
	include "email.php";

	date_default_timezone_set('America/Sao_Paulo');
	$date = date('Y-m-d');
	$hr = date('H');
	$min = date('i');
	$seg = date('s');
	$date = strtotime($date) + 60*60*$hr + 60*$min + $seg;
	$link = "http://localhost/pineapple/vemail.php?c=".$_SESSION["usuario"]."&d=".$date;

	$sql = "SELECT email FROM usuario WHERE ident = ". $_SESSION["usuario"];
	$result = mysqli_fetch_assoc(mysqli_query($conexao,$sql));

	$body = "<html>
				<body>
					<h1>VALIDE SEU E-MAIL E CONCLUA SUA CONTA NO PINEAPPLE</h1>
					<h2>Este é um E-mail automático que enviamos aos nossos novos usuários do PINEAPPLE para confirmarmos se o e-mail usado no cadastro realmente o pertence.</h2>
					<h3>Para validar seu e-mail, clique no link de confirmação.</h3>
					<h3>Se não tiver criado uma conta em nosso site, ignore e exclua esse e-mail.</h3>
					<p>Link de confirmação:<a href=\"$link\">$link</a></p>
				</body>
			</html>";	

	$mail->setFrom('deh.pbrasil@gmail.com', 'Gabriel');
	$mail->addAddress($result["email"], $_SESSION["apelido"]);
	$mail->Subject  = 'PINEAPPLE | Confirme seu E-mail';
	$mail->msgHTML($body);
	$mail->send();
?>