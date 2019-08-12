<nav class="navbar navbar-expand-lg navbar-dark p-2" style="height:15%;">
  <span class="navbar-text navbar-logo mb-0">Pineapple</span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	</button>

  <div class="collapse navbar-collapse" id="navbarNav">
  	<ul class="navbar-nav w-100 ml-0 ml-lg-3">
	  	<li class="nav-item mx-1"><button id="bt-inicio" class="nav-bt bt-default atual">Início</button></li>
	  	<li class="nav-item mx-1"><button class="nav-bt bt-default">Aprender</button></li>
		<li class="nav-item mx-1"><button id="bt-criar" class="nav-bt bt-default">Criar</button></li>
		<li class="nav-item mx-1"><button class="nav-bt bt-default">Galeria</button></li>
		<li class="nav-item mx-1 dropdown "><button id="bt-perfil" class=" nav-link bt-default dropdown-toggle" style="color:#333;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["apelido"] ?></button>
			<div  class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				<button id="bt-editar-perfil" class="dropdown-item">Editar Perfil</button>
				<button id="bt-logout" class="dropdown-item">Sair</button>
			</div>
		</li>
  	</ul>
  </div>
</nav>

<script type="text/javascript">
	$(".nav-bt").click(function(){
		$('.atual').removeClass('atual');
		$(this).addClass('atual');
		if($(this).attr('id') != "bt-criar"){
			$("#bloco-conteudo").css("height",'100%');
			$("nav").css('height','15%');
			$('.atual').removeClass('atual');
			$(this).addClass('atual');
		}else{
			$("#bloco-conteudo").css("height",'90%');
			$("nav").css('height','10%');
		}
	})

	$("#bt-inicio").click(function(){
		$("#bloco-conteudo").fadeOut();
		setTimeout(function(){
			$.ajax({
				url : "inicio.php",
				type : "get"
			}).done(function(msg){
				$("#bloco-conteudo").html(msg);
			});
		},500);
		$("#bloco-conteudo").fadeIn();
		desativarAutoSave();
	})
	$('#bt-criar').click(function(){
		$("#bloco-conteudo").fadeOut();
		setTimeout(function(){
			$.ajax({
				url : "_proj/inicial-proj.php",
				type : "get"
			}).done(function(msg){
				$("#bloco-conteudo").html(msg);
				$("#bloco-conteudo").fadeIn();
			});
		}, 500);
		desativarAutoSave();
	});

	$('#bt-perfil').click(function(){
		$('#editor-perfil').css("display","block");
		$('#editor-perfil').css("opacity","1");
	});

	$('#editor-perfil').mouseleave(function(){
		$('#editor-perfil').css("opacity","0");
		setTimeout(function(){
			$('#editor-perfil').css("display","block");
		},300);
	});


	$('#bt-editar-perfil').on("click",function(){
		$("#modal-dinamico").css("width",'100%');
		$.ajax({
			url : 'editar-perfil.php',
			type : 'get'
		}).done(function(msg){
			$('#modal-dinamico').html(msg);
		})
	});

	$('#bt-logout').on("click",function(){
		$.ajax({
			url : 'logout.php',
			type : 'get'
		}).done(function(msg){
			 window.location.reload();
		});
	});
</script>