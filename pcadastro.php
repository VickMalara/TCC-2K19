<?php

	$nome = $_POST['nome'];
	$apelido = $_POST['apelido'];
	$email = $_POST['email'];
	$dataNasc = $_POST['dataNasc'];
	$genero = $_POST['genero'];
	$senha = md5($_POST['senha']);
	$confSenha = md5($_POST['confSenha']);
	
	include "conexao.php";
	
	if($senha == $confSenha){
		$sql = "SELECT * FROM usuario WHERE email = '". $email ."' OR apelido = '". $apelido ."' ";
		$resultado = mysqli_query($conexao, $sql);
		$busca = false;
		
		if($resultado != NULL){
			while($linha = mysqli_fetch_assoc($resultado)){
				if($email == $linha["email"] || $apelido == $linha["apelido"]){
					$busca = true;
				}
			}
		}
		
		if($busca){
			echo '1';
		}
		else{
	 
			$consulta = "INSERT INTO usuario(nome, apelido, email, senha, sexo, dataNasc) 
						 VALUES ('$nome', '$apelido', '$email', '$senha', '$genero', '$dataNasc')";
			if(mysqli_query($conexao, $consulta)){
				echo '0';
			}else{
				echo '2';
			}
		}
	}else{
		echo '3';
	}
	
?>