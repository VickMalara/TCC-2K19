<?php
	session_start();
	include "conexao.php";
	$apelido = $_POST["apelido"];
	$nome = $_POST["nome"];
	$perm = true;

	$_SESSION["apelido"] = $apelido;
	
	$sql = "SELECT * FROM usuario WHERE apelido ='".$apelido."' AND ident != ".$_SESSION["usuario"];
	$result = mysqli_query($conexao,$sql);

	while($r = mysqli_fetch_assoc($result)){
		$perm = false;
		break;
	}

	if($perm){
		$sql = "UPDATE usuario SET apelido='".$apelido."', nome='".$nome."' WHERE ident ='".$_SESSION["usuario"]."'";
		mysqli_query($conexao,$sql);
		echo "0";
	}else{
		echo "1";
	}
?>