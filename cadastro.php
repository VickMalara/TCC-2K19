<?php

	if(!empty($_GET)){
		echo "<p>E-mail ou apelido já cadastrado</p>";
	}	

?>

<!DOCTYPE html>
<html>
	<head>
		<title>PINEAPPLE - cadastro de usuário</title>
		<meta charset="utf-8">
	</head>

	<body>	
			<form name="cadastro" action="pcadastro.php" method="post">
			
				<p>
					<label>Nome</label>
					<input type="text" name="nome" required />
				</p>
			
				<p>
					<label>Apelido</label>
					<input type="text" name="apelido" required />
				</p>

				<p>
					<label>Email</label>
					<input type="email" name="email" required />
				</p>

				<p>
					<label>Data de Nascimento</label>
					<input type="date" name="data_nasc" required />
				</p>
			
				<p>
					<label>Gênero</label>

					<input id="feminino" type="radio" name="genero" value="feminino" checked>			
					<label>Feminino</label>
					<input id="masculino" type="radio" name="genero" value="masculino">
					<label>Masculino</label>
					<input id="não binário" type="radio" name="genero" value="não binário">
					<label>Não Binário</label>
				</p>
				
				<p>
					<label>Senha</label>
					<input type="password" name="senha" required />
				</p>
				
				<input type="submit" value="Cadastrar" id= "cadastrar" />
			
			</form>
	</body>
</html>	
