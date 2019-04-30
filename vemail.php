<?php
	session_start();
	include "conexao.php";
	
	$sql = "UPDATE usuario SET validada = 1 WHERE ident = ". $_SESSION["usuario"];
	
	mysqli_query($conexao, $sql);

?>

	<p> E-mail validado com sucesso! <a href = "index.php">Clique aqui</a> para voltar á página principal! </p>