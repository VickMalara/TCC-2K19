<?php
	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	include "conexao.php";

	$nome = $_POST["nome-proj"];
	$usuario = $_SESSION["usuario"];
	$data = date('Y-m-d');

	$sql = "INSERT INTO projeto(nome,usuario,data_criacao) VALUES ('".$nome."',".$usuario.",'".$data."')";

	mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
	$sql = "SELECT * FROM projeto WHERE usuario  = $usuario AND data_criacao = '$data' ORDER BY ident desc";
	$r = mysqli_query($conexao,$sql)or die(mysqli_error($conexao));

	while($ra = mysqli_fetch_assoc($r)){
		$_SESSION["projeto"] = $ra["ident"];
		break;
	}
?>