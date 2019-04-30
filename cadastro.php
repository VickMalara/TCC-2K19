<script type="text/javascript" src="_js/jquery.min.js"></script>
<div class="form-div">
	<h1>Crie sua conta grátis!</h1>
	<p id="msg"></p>
	<form name="cadastro" action="pcadastro.php" method="post">
		<p><label>Nome</label>
			<input type="text" id="nome" required /></p>
	
		<p><label>Apelido</label>
			<input type="text" id="apelido" required /></p>

		<p><label>Email</label>
			<input type="email" id="email" required /></p>

		<p><label>Data de Nascimento</label>
			<input type="date" id="dataNasc" required /></p>

		<p>Gênero</p>
		<p class="radio">
			<input id="feminino" type="radio" name="genero" value="feminino" checked>			
			<label for="feminino">Feminino</label>
			<input id="masculino" type="radio" name="genero" value="masculino">
			<label for="masculino">Masculino</label>
			<input id="nao-binario" type="radio" name="genero" value="não binário">
			<label for="nao-binario">Não Binário</label>
		</p>
		
		<p><label>Senha</label>
			<input type="password" id="senha" required /></p>
		<p><label>Confirmar senha</label>
			<input type="password" id="conf-senha" required /></p>
		
		<button type="button" id="bt-pcadastro">Criar sua Conta!</button>
		<button type="button" id="bt-limpa-modal">Cancelar</button>
	</form>
</div>

<script type="text/javascript">
	$("#bt-pcadastro").click(function(){
		$.ajax({
			url : "pcadastro.php",
			type : "post",
			data : {
				"nome" : $("#nome").val(),
				"apelido" : $("#apelido").val(),
				"email" : $("#email").val(),
				"dataNasc" : $("#dataNasc").val(),
				"genero" : $('[name="genero"]:checked').val(),
				"senha" : $("#senha").val(),
				"confSenha" : $("#conf-senha").val()
			}
		}).done(function(msg){
			$("#msg").html(msg);
			// if(msg == 0){
			// 	$("#msg").html('Cadastro bem sucedido!');
			// }else if(msg == 1){
			// 	$("#msg").html('E-mail ou apelido já cadastrado.');
			// }else if(msg == 2){
			// 	$("#msg").html('Algo deu errado :( Tente novamente mais tarde.');
			// }else{
			// 	$("#msg").html('As senhas não estão iguais.');
			// }
		});
	});
	$('#bt-limpa-modal').click(function(){
		$("#modal-dinamico").css("width","0%");
		$("#modal-dinamico").html('');
	});
</script>