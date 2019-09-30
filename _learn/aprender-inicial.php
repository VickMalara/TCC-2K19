<div id="bloco-aprender" class="h-100 w-100 p-2 d-flex flex-column">
	<div class="w-100 h-50 px-2 pt-2 d-flex">
		<div id="aprender-site" class="apr-bt w-100 h-100 d-flex flex-column justify-content-center pd-5 text-center">
			<h1>APRENDA A USAR O SITE</h1>
		</div>
	</div>
	<div class="d-flex h-50 p-2 justify-content-between">
		<div id="aprender-html" class="apr-bt w-75 mr-2 display-2 pd-5 text-center d-flex flex-column justify-content-center">
			<h1 class="display-1">COMEÇANDO O SEU <b>&lt; HMTL /&gt;</b></h1>
		</div>
		<div id="aprender-css" class="apr-bt w-25 display-2 pd-5 text-center d-flex flex-column justify-content-center">
			<h1 class="display-1"> CSS</h1>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#aprender-html').click(function(){
		$("#bloco-conteudo").fadeOut();
			setTimeout(function(){
				$.ajax({
					url : "_learn/aprender-html.php",
					type : "get"
				}).done(function(msg){
					$("#bloco-conteudo").css("height",'85%');
					$("nav").css('height','15%');
					$("#bloco-conteudo").html(msg);
					$("#bloco-conteudo").fadeIn();
				});
		}, 500);
	});
</script>