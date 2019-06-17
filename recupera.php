<div class="form-div">
	<h1>Recuperação de Senha</h1>
	<p id="msg"></p>
	<form action = "precupera.php" method = "POST">
	
		<p>
			<label for = "email">Coloque seu e-mail</label>
			<input type = "email" id = "email" />
		</p>
				
			
		<p class="botoes">
			<button type="button" id="bt-precupera">Continuar</button>
			<button type="button" id="bt-limpa-modal">Cancelar</button>
		</p>

	</form>
</div>

<script type="text/javascript">
	$('#bt-precupera').click(function(){
		$.ajax({
			url: "precupera.php",
			type: "post",
			data:{
				"email" : $("#email").val()
			},
			beforeSend : function(){
				$("#msg").css("display","block");
				$("#msg").css("width","100%");
				$("#msg").css("height","auto");
				$("#msg").css("border","1px solid #900");
				$("#msg").css("color","#900");
				$("#msg").css("border-radius","5px");
				$("#msg").css("opacity","1");
				$("#msg").css("font-size","1em");
				$('#msg').html("Enviando um e-mail de recuperação...");
			}
		}).done(function(msg){
			$('#msg').html(msg);
		});
	});
	$('#bt-limpa-modal').click(function(){
		$("#modal-dinamico").css("width",'0%');
		$("#modal-dinamico").html('');
	});
</script>