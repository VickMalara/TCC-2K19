<?php

	session_start();
	
	$user = $_POST["email"];
	date_default_timezone_set('America/Sao_Paulo');
	include "conexao.php";
	
	$passe = mysqli_query($conexao,"SELECT ident as id FROM usuario WHERE email = '". $user ."'");
	
	if(mysqli_num_rows($passe) == 1 ){
		$ident = mysqli_fetch_assoc($passe);
		$chave = md5(date('YmdHis'));
		$sql = "INSERT INTO recsenha(usuario, chave) VALUES (".$ident["id"].", '$chave' )";

		if(mysqli_query($conexao,$sql)){

			$date = date('Y-m-d');
			$hr = date('H');
			$min = date('i');
			$seg = date('s');
			$date = strtotime($date) + 60*60*$hr + 60*$min + $seg;
		 
			$link = "http://localhost/pineapple/alterarSenha.php?u=".$ident["id"]."&k=$chave&t=$date";

			$sql = 'SELECT * FROM usuario WHERE ident = '. $ident["id"];
			$result = mysqli_fetch_assoc(mysqli_query($conexao,$sql));

			include "email.php";

			$body = "<html>
				<body>
					<h1>RECUPERE SUA SENHA</h1>
					<h2>Você requisitou que enviassemos esse e-mail para alterar sua senha no PINEAPPLE</h2>
					<h3>Acesse o link abaixo e preencha os campos para alterar sua senha.</h3>
					<h3>Esse link é valido somente por 5 minutos após enviado.</h3>
					<h3>Apelido da sua conta: ".$result["apelido"]."</h3>
					<p>Link de alteração da senha:<a href=\"$link\">Recuperar Senha PINEAPPLE</a></p>
				</body>
			</html>";	

			$mail->setFrom('learningpineapple@gmail.com', 'Pineapple');
			$mail->addAddress($result["email"], $result["apelido"]);
			$mail->Subject  = 'PINEAPPLE | Recuperar senha';
			$mail->msgHTML($body);
			$mail->send();
		
			echo 'Enviamos um link no seu e-mail para que possa recuperar sua senha!';
		}else {
			echo 'Não foi possível enviar o e-mail de recuperação, tente de novo.';
		}
	}else {
		echo 'Não encontramos nenhuma conta cadastrada com esse e-mail.';
	}
   
?>
