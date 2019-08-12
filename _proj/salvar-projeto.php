<?php
	session_start();
	include "../conexao.php";

	$conteudo = $_POST["html"];
	echo $conteudo;
	$nome_arq ="projetos/". $_SESSION["usuario"] ."-". $_SESSION["apelido"] ."-". $_SESSION["projeto"].".html";
	$acc_arq = "../".$nome_arq;

	$arquivo = fopen($acc_arq,'w');
	fwrite($arquivo,$conteudo);
	fclose($arquivo);

	$sql = "UPDATE projeto SET arquivo = '".$nome_arq."' WHERE proj_ident = ".$_SESSION["projeto"];
	mysqli_query($conexao,$sql);
?>