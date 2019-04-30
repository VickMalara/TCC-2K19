<?php
	session_start();
	include "conexao.php";
	
	$sql = "UPDATE usuario SET validada = 1 WHERE ident = ". $_SESSION["usuario"];
	
	mysqli_query($conexao, $sql);
		
	header("Location:index.php");

?>