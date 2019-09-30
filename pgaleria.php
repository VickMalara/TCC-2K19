<?php
	session_start();
	include "conexao.php";
	$busca = $_GET["s"];

	$sql = "SELECT * FROM projeto WHERE nome LIKE '%".$busca."%' ORDER BY proj_ident desc";
	$result = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));

	while($arquivo = mysqli_fetch_assoc($result)){
		echo "<div class=\"card m-1 p-0\" style=\"min-height:500px;width:24%\">";
			echo "<img class=\"card-img-top w-100\" src=\"_img/card-proj.png\" alt=\"Card image cap\" style=\"background-color:#b3e5b3\">";
			echo "<div class=\"card-body\">";
				echo "<h5 class=\"card-title\">".$arquivo["nome"]."</h5>";
				echo "<h6 class=\"card-subtitle mb-2 text-muted\">".$arquivo["data_criacao"]."</h6>";
				if($arquivo["exercicio"] == NULL){
					echo"<p class=\"card-text\">Este projeto foi criado no Modo Livre.</p>";
				}else{
					echo"<p class=\"card-text\">Este projeto foi criado com um exercício.</p>";
				}
				echo"<button id=\"".$arquivo["proj_ident"]."\" data-toggle=\"modal\" data-target=\"#exerResult\" class=\"bt-in bt-default w-100 d-block float-bottom\" onclick=\"verProj(".$arquivo["proj_ident"].");\" value=\"".$arquivo["arquivo"]."\">Ver este projeto</button>";
			echo "</div>";
		echo "</div>";
	}
?>