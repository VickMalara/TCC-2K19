<?php
	$senha = $_POST["nvsenha"];
	$vsenha = $_POST["versenha"];
	$ident = $_POST["ident"];

	if($senha == $vsenha){
		include "conexao.php";
		$sql = "UPDATE usuario SET senha = '". md5($senha)."' WHERE ident = ". $ident;
		if(mysqli_query($conexao,$sql)){
			$sql = "DELETE FROM recsenha WHERE usuario = ". $ident;
			mysqli_query($conexao,$sql);
			echo "0";
		}
	}else{
		echo "1";
	}
?>