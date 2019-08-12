<?php
	include "../conexao.php";

	$exe = $_GET["id"];

	$sql = "SELECT arquivo_resp FROM exercicio WHERE ident = ". $exe;
	$r = mysqli_fetch_assoc(mysqli_query($conexao,$sql));
	
	fopen($r["arquivo_resp"],'r');
?>