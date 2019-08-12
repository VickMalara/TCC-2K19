<?php
	session_start();
	include "../conexao.php";
	$proj = $_GET["i"];

	$sql = "SELECT * FROM projeto JOIN exercicio ON exercicio.ident = projeto.exercicio WHERE proj_ident = ". $proj;
	$result = mysqli_fetch_assoc(mysqli_query($conexao,$sql));
	if($result){
		$_SESSION["exerc"] = $result["ident"];
		$_SESSION["exerc_desc"] = $result["descricao"];
		echo'<button class="bt-morph bt-pink" onclick="openExerc()">Z</button>';
	}
?>