<? session_start();
if(!isset($_SESSION["usuario"])){
	header("Location:index.php");
}

?>

<div class="row h-100 m-0">
	<div class="form-div h-100 col-12 col-lg-8 p-3">
		<h1 class="w-100 display-1">Crie sua conta!</h1>
		<form name="cadastro" action="pcadastro.php" class="container" method="post">
			<div id="msg"></div>
			<div class="w-100">
				<label>Nome:</label>
				<input type="text" id="nome" required />
			</div>
		
			<div class="w-100">
				<label class="w-100">Apelido:</label>
				<input type="text" id="apelido" class="w-100" required />
			</div>

			<div class="w-100">
				<label class="w-100">Email:</label>
				<input type="email" id="email" class="w-100" required />
			</div>

			<div class="w-100">
				<label class="w-100">Data de Nascimento:</label>
				<input type="date" id="dataNasc" class="w-100" required />
			</div>
			<div class="w-100">
				<label class="w-100">Gênero:</label>
				<div class="d-flex radio">
					<input id="feminino" type="radio" name="genero" value="feminino" class="d-none" checked>
					<label for="feminino">Feminino</label>
					<input id="masculino" type="radio" name="genero" value="masculino" class="d-none" >
					<label for="masculino">Masculino</label>
					<input id="nao-binario" type="radio" name="genero" value="não binário" class="d-none">
					<label for="nao-binario">Não Binário</label>
				</div>
			</div>
			
			<div class="w-100">
				<label>Senha:</label>
				<input type="password" id="senha" required />
			</div>
			<div class="w-100">
				<label>Confirmar senha:</label>
				<input type="password" id="conf-senha"  required />
			</div>
			
			<div class="row d-flex bt-form justify-content-center">
				<button type="button" id="bt-pcadastro"  class="w-100 bt-default">Criar sua Conta!</button>
				<button type="button" id="bt-limpa-modal" class="w-100 bt-cancel bt-default">Cancelar</button>
			</div>
		</form>
	</div>
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
				$("#msg").css("background","#7d7c");
				$("#msg").css("opacity","1");
				setTimeout(function(){
					$("#msg").html('Cadatro feito! Abrindo a página de login...');
				},200);
				setTimeout(function(){
					$("#modal-dinamico").css("width",'0%');
					setTimeout(function(){
						$("#modal-dinamico").html('');
					},200);
				},500);	
				setTimeout(function(){
						$("#modal-dinamico").css("width",'100%');
						$.ajax({
							url : 'login.php',
							type : 'get'
						}).done(function(msg){
							$('#modal-dinamico').html(msg);
						});
				},500);
			}else if(msg == 1){
				$("#msg").css("display","block");
				$("#msg").css("width","100%");
				$("#msg").css("background","#d77c");
				$("#msg").css("opacity","1");
				setTimeout(function(){
					$("#msg").html('Esse e-mail ou apelido já está em uso.');
				},200);
			}else if(msg == 2){
				$("#msg").css("display","block");
				$("#msg").css("width","100%");
				$("#msg").css("background","#d77c");
				$("#msg").css("opacity","1");
				setTimeout(function(){
					$("#msg").html('Algo deu errado, tente novamente mais tarde.');
				},200);
			}else{
				$("#msg").css("display","block");
				$("#msg").css("width","100%");
				$("#msg").css("background","#d77c");
				$("#msg").css("opacity","1");
				setTimeout(function(){
					$("#msg").html('As senhas não estão iguais.');
				},200);
			}
		});
	});

	$("#conf-senha").keyup(function(){
		var senha1 = $("#conf-senha").val();
		var senha2 = $("#senha").val();
		if(senha1 == senha2){
			$("#conf-senha").css("background-color","#7d7c");
			$("#senha").css("background-color","#7d7c");
		}else{
			$("#conf-senha").css("background-color","#d77c");
			$("#senha").css("background-color","#d77c");
		}
	
	});
	$('#bt-limpa-modal').click(function(){
		$("#modal-dinamico").css("width",'0%');
		setTimeout(function(){
			$("#modal-dinamico").html('');
		},200);
	});
</script>