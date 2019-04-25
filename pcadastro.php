<?php

	$nome = $_POST['nome'];
	$apelido = $_POST['apelido'];
	$email = $_POST['email'];
	$data_nasc = $_POST['data_nasc'];
	$genero = $_POST['genero'];
	$senha = md5($_POST['senha']);
	
	include "conexao.php";
	
	$sql = "SELECT * FROM usuario WHERE email = '". $email ."' OR apelido = '". $apelido ."' ";
	$resultado = mysqli_query($conexao, $sql);
	
	if($resultado != NULL){
		while($linha = mysqli_fetch_assoc($resultado)){
			if($email == $linha["email"] || $apelido == $linha["apelido"]){
				$busca = true;
			}
		}
	}
	
	if($busca){
		header("Location:cadastro.php?falhou=1");
	}
	else{
 
		$consulta = "INSERT INTO usuario(nome, apelido, email, senha, sexo) 
					 VALUES ('$nome', '$apelido', '$email', '$senha', '$genero')";
		echo $consulta;
		if(mysqli_query($conexao, $consulta)){
			
		}else{
			echo mysqli_error($conexao);
		}
		
		header("Location:login.php");
	
	}
	
?>