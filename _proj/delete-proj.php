<?php
	include "../conexao.php";
	$proj = $_GET["proj"];
	$sql = "DELETE FROM projeto WHERE proj_ident = ". $proj;
	mysqli_query($conexao,$sql);
?>