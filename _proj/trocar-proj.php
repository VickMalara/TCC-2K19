<?php
	session_start();
	include "../conexao.php";
	$_SESSION["projeto"] = $_GET["i"];
	$sql = "SELECT arquivo,exercicio FROM projeto WHERE proj_ident = ". $_GET["i"];
	$result = mysqli_query($conexao,$sql);

	$aux = mysqli_fetch_assoc($result);

	$acc_arq = '../'.$aux["arquivo"]; 
	$handle = fopen($acc_arq,"r");
	while (!feof($handle)) {
   		echo fgets($handle);
	}
	fclose($handle);

?>