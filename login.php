<? session_start();
if(!isset($_SESSION["usuario"])){
	header("Location:index.php");
}
?>

<div class="row h-100 m-0">
	<div class="form-div col-12 col-lg-8 p-3 w-60">
		<h1 class="w-100 display-1">Entre na conta</h1>
		<form action = "plogin.php" method = "POST" class="container" style="overflow-y: visible;">
			<div id="msg"></div>
			<div class="w-100">
				<label for = "login" class="w-100">Apelido:</label>
				<input type = "text" id="apelido" class="w-100" />
			</div>
					
			<div class="w-100">
				<label for = "senha" class="w-100">Senha:</label>
				<input type = "password" id = "senha" class="w-100"/>
			</div>
			
			<div class="row d-flex bt-form justify-content-center">
				<button type="button" id="bt-plogin" class="w-100 bt-default">Entrar</button>
				<button type="button" id="bt-limpa-modal" class="w-100 bt-cancel bt-default">Cancelar</button>
			</div>
			<div class="w-100 form-link"> Não lembra a senha?
				<button type="button" id="bt-rec-senha">Recuperar senha</button>
			</div>
			<div class="w-100 form-link">	Não tem conta?
				<button type="button" id="bt-nv-conta">Criar nova conta</button>
			<div>

		</form>
	</div>
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
			if(msg == '0'){
				$("#msg").css("display","block");
				$("#msg").css("width","100%");
				$("#msg").css("background","#7d7c");
				$("#msg").css("opacity","1");
				setTimeout(function(){
					$("#msg").html('Login Feito! Entrando...');
				},200);
				setTimeout(function(){
					$("#modal-dinamico").css("width",'0%');
					setTimeout(function(){
						$("#modal-dinamico").html('');
						setTimeout(function(){
							window.location.reload();
						},300);
					},200);
				},500);	
				
			}else if(msg == '1'){
				$("#msg").css("display","block");
				$("#msg").css("width","100%");
				$("#msg").css("background","#d77c");
				$("#msg").css("opacity","1");
				setTimeout(function(){
					$("#msg").html('Usuário não existe');
				},200);
			}else if(msg == '2'){
				$("#msg").css("display","block");
				$("#msg").css("width","100%");
				$("#msg").css("background","#d77c");
				$("#msg").css("opacity","1");
				setTimeout(function(){
					$("#msg").html('Senha incorreta');
				},200);
			}else{
				$("#msg").css("display","block");
				$("#msg").css("width","100%");
				$("#msg").css("background","#7d7c");
				$("#msg").css("opacity","1");
				setTimeout(function(){
					$("#msg").html('Login Feito! Entrando');
				},200);
				setTimeout(function(){
					$("#modal-dinamico").css("width",'0%');
					setTimeout(function(){
						$("#modal-dinamico").html('');
						setTimeout(function(){
							window.location.reload();
						},300);
					},200);
				},500);	
			}
		});
	});

	$('#bt-limpa-modal').click(function(){
		$("#modal-dinamico").css("width",'0%');
		setTimeout(function(){
			$("#modal-dinamico").html('');
		},200);
	});
	
	$("#bt-nv-conta").click(function(){
		$("#modal-dinamico").css("width",'0%');
		setTimeout(function(){
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
		},200);
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
