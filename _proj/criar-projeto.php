<div class="form-div col-12 col-lg-8 p-3 w-60 mx-auto h-100 overflow-hidden">
	<h1 class="w-100 display-3">Dê um nome ao seu projeto</h1>
	<form action = "plogin.php" method = "POST" class="container"  style="overflow-y: visible;">
		<div id="msg"></div>
		<div class="w-100">
			<label for = "login" class="w-100">Nome do projeto:</label>
			<input type = "text" id="nome-proj" class="w-100" />
		</div>
		<div class="row d-flex bt-form justify-content-center">
			<button type="button" id="bt-modo-livre" class="w-100 bt-default">Criar no Modo Livre</button>
			<button type="button" id="bt-exercicio" class="w-100 bt-default">Criar com exercício</button>
			<button type="button" id="bt-voltar" class="w-100 bt-cancel bt-default">Voltar</button>
		</div>
	</form>
</div>

<script type="text/javascript">
	$("#bt-modo-livre").click(function(){
		$.ajax({
			url : "_proj/pcriar-projeto.php",
			type : "post",
			data : {
				"nome-proj" : $("#nome-proj").val()
			}
		}).done(function(msg){
			if(msg == '-1'){
				alert("Alguma coisa deu errado :( Tente de novo, por favor!");
			}else{
				var id = msg;
				$.ajax({
					url:"_proj/interface-proj.php",
					type: "get"
				}).done(function(msg){
					$("#amb-proj").fadeOut();
					setTimeout(function(){
						$("#amb-proj").html(msg);
						$("#amb-proj").fadeIn();
						ativarAutoSave();
					},500);
				});
			}
		});
	});

	$("#bt-exercicio").click(function(){
		$.ajax({
			url : '_exer/gerar-exercicio.php',
			type : 'get'
		}).done(function(msg){
			exerc = msg;
			$.ajax({
				url : "_proj/pcriar-projeto.php",
				type : "post",
				data : {
					"nome-proj" : $("#nome-proj").val(),
					"exercicio" : exerc
					}
				}).done(function(msg){
					if(msg != -1){
						var id = msg;
						$.ajax({
							url:"_proj/interface-proj.php",
							type: "get"
						}).done(function(msg){
							$("#amb-proj").fadeOut();
							setTimeout(function(){
								$("#amb-proj").html(msg);
								$.ajax({
									url : "_exer/ident-exer.php?i="+ id,
									type : 'get'
								}).done(function(msg){
									var aux = $("#bloco-itens").html();
									aux += msg;
									$("#bloco-itens").html(aux);
								});
								$("#amb-proj").fadeIn();
								ativarAutoSave();
							},500);
						});
					}
				});
			});
	});

	$("#bt-voltar").click(function(){
		$.ajax({
			url:"_proj/inicial-proj.php",
			type: "get"
		}).done(function(msg){
			$("#amb-proj").fadeOut();
			setTimeout(function(){
				$("#amb-proj").html(msg);
				$("#amb-proj").fadeIn();
			},500);
		});
	});
</script>