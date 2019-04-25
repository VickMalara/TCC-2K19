<?php
	session_start();
	include "conexao.php";
	$senha = md5($_POST["senha"]);
	$nvsenha = md5($_POST["nvsenha"]);
	$versenha = md5($_POST["versenha"]);

	$sql = "SELECT senha FROM usuario WHERE ident='".$_SESSION["usuario"]."'";

	$result = mysqli_query($conexao,$sql);

	while($r = mysqli_fetch_assoc($result)){
		if($r["senha"] == $senha){
			$mudar = true;
		}else{
			$mudar = false;
		}
	}
	if($mudar){
		if($nvsenha == $versenha){
			$sql = "UPDATE usuario SET senha='".$nvsenha."' WHERE ident ='".$_SESSION["usuario"]."'";
			mysqli_query($conexao,$sql);
			echo "0";
		}else{
			echo "1";
		}
	}else{
		echo"2";
	}
?>