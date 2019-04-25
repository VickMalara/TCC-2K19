<?php

	if(!empty($_GET)){
		echo "<p>Usuário ou senha não encontrado</p>";
	}

?>

<form action = "plogin.php" method = "POST">
	<p>
		<label for = "login"> Apelido: </label>
		<input type = "text" name = "apelido" />
	</p>
			
	<p>
		<label for = "senha"> Senha: </label>
		<input type = "password" name = "senha" />
	</p>
	
	<p>
		<input type = "submit" value = "Entrar" />
		<a href = "*">Recuperar senha</a>
	</p>
			
</form>
