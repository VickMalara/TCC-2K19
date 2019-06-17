<div class="form-div">
	<h1>Entre na conta</h1>
	<p id="msg"></p>
	<form action = "plogin.php" method = "POST">
		<p>
			<label for = "login">Apelido</label>
			<input type = "text" id = "apelido" />
		</p>
				
		<p>
			<label for = "senha">Senha</label>
			<input type = "password" id = "senha" />
		</p>
		
		<p class="botoes">
			<button type="button" id="bt-plogin">Entrar</button>
			<button type="button" id="bt-limpa-modal">Cancelar</button>
		</p>
		<p class="sub-campo"> Não lembra a senha?
			<button type="button" id="bt-rec-senha">Recuperar senha</button>
		</p>
		<p class="sub-campo">	Não tem conta?
			<button type="button" id = "bt-nv-conta">Criar nova conta</button>
		</p>

	</form>
</div>

<script type="text/javascript">
	$("#bt-plogin").click(function(){
		$.ajax({
			url : 'plogin.php',
			type: 'post',
			data : {
				'apelido': $("#apelido").val(),
				'senha' : $("#senha").val()
			}
		}).done(function(msg){
			// $("#msg").css("display","block");
			// $("#msg").css("width","100%");
			// $("#msg").css("height","30px");
			// $("#msg").css("border","1px solid #900");
			// $("#msg").css("color","#900");
			// $("#msg").css("border-radius","5px");
			// $("#msg").css("opacity","1");
			// $("#msg").html(msg);
			if(msg == '0'){
				$("#msg").html('Login bem sucedido');
				$("#modal-dinamico").css("width",'0%');
				$("#modal-dinamico").html('');
				setTimeout(function(){
					window.location.reload();
				},500);
			}else if(msg == '1'){
				$("#msg").css("display","block");
				$("#msg").css("width","100%");
				$("#msg").css("height","30px");
				$("#msg").css("border","1px solid #900");
				$("#msg").css("color","#900");
				$("#msg").css("border-radius","5px");
				$("#msg").css("opacity","1");
				setTimeout(function(){
					$("#msg").html('Usuário não existe');
				},200);
			}else if(msg == '2'){
				$("#msg").css("display","block");
				$("#msg").css("width","100%");
				$("#msg").css("height","30px");
				$("#msg").css("border","1px solid #900");
				$("#msg").css("color","#900");
				$("#msg").css("border-radius","5px");
				$("#msg").css("opacity","1");
				setTimeout(function(){
					$("#msg").html('Senha incorreta');
				},200);
			}else{
				$("#msg").html('E-mail não validado.');
				$("#modal-dinamico").css("width",'0%');
				$("#modal-dinamico").html('');
				setTimeout(function(){
					window.location.reload();
				},500);
			}
		});
	});

	$('#bt-limpa-modal').click(function(){
		$("#modal-dinamico").css("width",'0%');
		$("#modal-dinamico").html('');
	});
	
	$("#bt-nv-conta").click(function(){
		$("#modal-dinamico").css("width",'0%');
		$("#modal-dinamico").html('');
		setTimeout(function(){
			$("#modal-dinamico").css("width",'100%');
			$.ajax({
				url : 'cadastro.php',
				type : 'get'
			}).done(function(msg){
				$('#modal-dinamico').html(msg);
			})
		}, 400);
	});

	$("#bt-rec-senha").click(function(){
		$("#modal-dinamico").css("width",'0%');
		$("#modal-dinamico").html('');
		setTimeout(function(){
			$("#modal-dinamico").css("width",'100%');
			$.ajax({
				url : 'recupera.php',
				type : 'get'
			}).done(function(msg){
				$('#modal-dinamico').html(msg);
			})
		}, 400);
	})
</script>
