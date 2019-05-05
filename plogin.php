<?php

	session_start();

	$apelido = $_POST["apelido"];
	$senha = md5($_POST["senha"]);
	$achou = false;
	
	include "conexao.php";
	
	$sql = "SELECT * FROM usuario WHERE apelido = '". $apelido ."'";

	$resultado = mysqli_query($conexao, $sql);
	
	$linha = mysqli_fetch_assoc($resultado);
	
		if($senha == $linha["senha"]){
			$_SESSION["usuario"] = $linha["ident"]; 
			$_SESSION["apelido"] = $linha["apelido"];
			$_SESSION["validacao"] = $linha["validada"];
			$achou = true;
		}
	
	if($achou){
		if($linha['validada'] == 0){
				echo '3';
		}
		else{
			echo '0';
		}
	}else if(mysqli_num_rows($resultado) == 0){
		echo '1';
	}else{
		echo '2';
	}
	
?>