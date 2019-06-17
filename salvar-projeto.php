<?php
	session_start();
	include "conexao.php";
	$conteudo = $_POST["html"];
	$nome_arq ="projetos/". $_SESSION["usuario"] ."-". $_SESSION["apelido"] ."-". $_SESSION["projeto"].".html";
	echo $conteudo;
	$arq = fopen($nome_arq,'w');
	fwrite($arq,$conteudo);
	fclose($arq);

	$sql = "UPDATE projeto SET arquivo = '".$nome_arq."' WHERE ident = ".$_SESSION["projeto"];
	mysqli_query($conexao,$sql);
?>