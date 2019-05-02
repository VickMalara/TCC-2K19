<script type="text/javascript" src="_js/jquery.min.js"></script>
<div class="form-div">
	<h1>Crie sua conta!</h1>
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
		
		<p class="botoes">
			<button type="button" id="bt-pcadastro">Criar sua Conta!</button>
			<button type="button" id="bt-limpa-modal">Cancelar</button>
		</p>
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
			if(msg == 0){
				$("#msg").css("display","block");
				$("#msg").css("width","100%");
				$("#msg").css("height","30px");
				$("#msg").css("border","1px solid #0b5b3e");
				$("#msg").css("color","#0b5b3e");
				$("#msg").css("border-radius","5px");
				$("#msg").css("opacity","1");
				setTimeout(function(){
					$("#msg").html('Usuário cadastrado com sucesso');
				},200);
				setTimeout(function(){
					$("#modal-dinamico").css("width","0%");
					$("#modal-dinamico").html('');
					setTimeout(function(){
						$("#modal-dinamico").css("width",'100%');
						$.ajax({
							url : 'login.php',
							type : 'get'
						}).done(function(msg){
							$('#modal-dinamico').html(msg);
						});
					},500);
				},800);
			}else if(msg == 1){
				$("#msg").css("display","block");
				$("#msg").css("width","100%");
				$("#msg").css("height","30px");
				$("#msg").css("border","1px solid #900");
				$("#msg").css("color","#900");
				$("#msg").css("border-radius","5px");
				$("#msg").css("opacity","1");
				setTimeout(function(){
					$("#msg").html('Esse e-mail ou apelido já está em uso.');
				},200);
			}else if(msg == 2){
				$("#msg").css("display","block");
				$("#msg").css("width","100%");
				$("#msg").css("height","30px");
				$("#msg").css("border","1px solid #900");
				$("#msg").css("color","#900");
				$("#msg").css("border-radius","5px");
				$("#msg").css("opacity","1");
				setTimeout(function(){
					$("#msg").html('Algo deu errado, tente novamente mais tarde.');
				},200);
			}else{
				$("#msg").css("display","block");
				$("#msg").css("width","100%");
				$("#msg").css("height","30px");
				$("#msg").css("border","1px solid #900");
				$("#msg").css("color","#900");
				$("#msg").css("border-radius","5px");
				$("#msg").css("opacity","1");
				setTimeout(function(){
					$("#msg").html('As senhas não estão iguais.');
				},200);
			}
		});
	});
	$('#bt-limpa-modal').click(function(){
		$("#modal-dinamico").css("width","0%");
		$("#modal-dinamico").html('');
	});
</script>