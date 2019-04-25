<?php

	if(!empty($_GET)){
		echo "<p>E-mail ou apelido já cadastrado</p>";
	}	

?>		
		<form name="cadastro" action="pcadastro.php" method="post">
		
			<label>Nome</label><br/>
			<input type="text" name="nome" required />
			<br/><br/>
		
			<label>Apelido</label><br/>
			<input type="text" name="apelido" required />
			<br/><br/>

			<label>Email</label><br/>
			<input type="email" name="email" required />
			<br/><br/>			
		
			<label>Data de Nascimento</label><br/>
			<input type="data" name="data_nasc" required />
			<br/><br/>
		
			<label>Gênero</label><br/>
			
			<input id="feminino" type="radio" name="genero" value="feminino" checked>			
			<label>Feminino</label>
						
			<input id="masculino" type="radio" name="genero" value="masculino">
			<label>Masculino</label>
						
			<input id="não binário" type="radio" name="genero" value="não binário">
			<label>Não Binário</label>
			<br/><br/>
			
			<label>Senha</label><br/>
			<input type="password" name="senha" required />
			<br/><br/>
			
			
			<input type="submit" value="Cadastrar" id= "cadastrar" />
			<input type = "reset" value = "Limpar" id = "limpar" /><br/>
		
		</form>
