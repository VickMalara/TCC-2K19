<div id="amb-proj" class="w-100 h-100 m-0 p-0 bg-dark">
	<div id="seletor-proj" class="d-flex h-100 justify-content-center flex-column">
		<button id="bt-novo-proj" class="bt-default display-3" style="height:30%;font-size:5rem;">Começar novo Projeto</button>
		<button id="bt-carregar-proj" class="bt-default display-3" style="height:30%;font-size:5rem;">Carregar projeto</button>
	</div>
</div>

<script type="text/javascript">
	$("#bt-novo-proj").click(function(){
		$.ajax({
			url:"_proj/criar-projeto.php",
			method: "get"
		}).done(function(msg){
			$("#amb-proj").fadeOut();
			setTimeout(function(){
				$("#amb-proj").html(msg);
				$("#amb-proj").fadeIn();
			},500);
		});
	});
	$("#bt-carregar-proj").click(function(){
		$.ajax({
			url:"_proj/carregar-projeto.php",
			method: "get"
		}).done(function(msg){
			$("#amb-proj").fadeOut();
			setTimeout(function(){
				$("#amb-proj").html(msg);
				$("#amb-proj").fadeIn();
			},500);
		});
	})
</script>