<?php
	session_start();
	include "conexao.php";

	$sql = "SELECT * FROM projeto WHERE usuario  = '".$_SESSION['usuario']."' ORDER BY data_criacao asc";
	$result = mysqli_query($conexao,$sql);

	while($arquivo = mysqli_fetch_assoc($result)){
		echo "<div class=\"card\" onclick=\"carregarArquivo('".$arquivo["arquivo"]."',".$arquivo["ident"].")\">";
			echo"<div class=\"card-top\"></div>";
			echo"<div class=\"card-bottom\">";
				echo"<h2 style=\"text-transform:uppercase;text-align:center;font-size:1em\">".$arquivo["nome"]."</h2>";

				if(empty($arquivo["exercicio"])){
					echo"<p style=\"margin:5px 0px\" >Criado no modo livre.</p>";
				}else{
					echo"<p style=\"margin:5px 0px\">".$arquivo["exercicio"]."</p>";
				}

				echo"<p style=\"position:absolute;bottom:5px;\">".$arquivo["data_criacao"]."</p>";
			echo "</div>";
		echo "</div>";
	}
?>