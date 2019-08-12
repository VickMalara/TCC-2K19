<?php
	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	include "../conexao.php";

	$nome = $_POST["nome-proj"];
	$usuario = $_SESSION["usuario"];
	$data = date('Y-m-d');
	if(!isset($_POST["exercicio"])){
		$sql = "INSERT INTO projeto(nome,usuario,data_criacao) VALUES ('".$nome."',".$usuario.",'".$data."')";
	}else{
		$sql = "INSERT INTO projeto(nome,usuario,data_criacao,exercicio) VALUES ('".$nome."',".$usuario.",'".$data."',".$_POST["exercicio"].")";
		$_SESSION["exerc"] = $_POST["exercicio"];
	}
	mysqli_query($conexao,$sql);

	$sql = "SELECT * FROM projeto WHERE usuario = $usuario AND data_criacao = '$data' ORDER BY proj_ident desc";
	$r = mysqli_query($conexao,$sql);

	if($r){
		
		while($ra = mysqli_fetch_assoc($r)){
			$_SESSION["projeto"] = $ra["proj_ident"];
			$nome_arq ="projetos/". $_SESSION["usuario"] ."-". $_SESSION["apelido"] ."-". $_SESSION["projeto"].".html";
			$acc_arq = "../".$nome_arq;
			$handle = fopen($acc_arq,"w");
			fclose($handle);
			$sql = "UPDATE projeto SET arquivo = '".$nome_arq."' WHERE proj_ident = ".$_SESSION["projeto"];
			mysqli_query($conexao,$sql);
			break;
		}
		echo $_SESSION["projeto"];
	}else{
		echo '-1';
	}
?>