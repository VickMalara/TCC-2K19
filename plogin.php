<?php

	session_start();

	$apelido = $_POST["apelido"];
	$senha = md5($_POST["senha"]);
	$achou = false;
	
	include "conexao.php";
	
	$sql = "SELECT * FROM usuario WHERE apelido = '". $apelido ."'";

	$resultado = mysqli_query($conexao, $sql);
	
	while($linha = mysqli_fetch_assoc($resultado)){
		if($senha == $linha["senha"]){
			$_SESSION["usuario"] = $linha["ident"]; 
			$achou = true;
		}
	}
	
	if($achou){
		header("Location:index.php"); //direciona o usuário para a pargina inicial após o login ser bem sucedido.
	}else{
		header("Location:login.php?falhou=1"); //retorna o usuário ao formulário de login, enviando por GET uma variavel falhou com valor 1.
	}
	
?>