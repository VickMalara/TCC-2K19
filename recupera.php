<? session_start();
if(!isset($_SESSION["usuario"])){
	header("Location:index.php");
}
?>
<div class="row h-100 m-0">
	<div class="form-div col-12 col-lg-8 p-3 w-60">
		<h1 class="w-100 display-1">Recuperação de Senha</h1>
		<p id="msg"></p>
		<form action = "precupera.php" class="container" method = "POST" style="overflow-y: visible;">
		
			<div class="w-100">
				<label for = "email" class="w-100">Coloque seu e-mail</label>
				<input type = "email" id = "email" class="w-100"/>
			</div>
					
				
			<div class="row d-flex bt-form justify-content-center">
				<button type="button" id="bt-precupera" class="w-100 bt-default">Continuar</button>
				<button type="button" id="bt-limpa-modal" class="w-100 bt-cancel bt-default">Cancelar</button>
			</p>

		</form>
	</div>
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
		setTimeout(function(){
			$("#modal-dinamico").html('');
		},200);
	});
</script>