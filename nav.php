<nav>
	<?php if(isset($_SESSION["usuario"])){
			echo'
			<ul>
				<li><button id="bt-inicio">Início</button></li>
				<li><button>Aprender</button></li>
				<li><button id="bt-criar">Criar</button></li>
				<li><button>Galeria</button></li>
				<li><button id="bt-perfil">'.$_SESSION["apelido"].'</button>
					<ul id="editor-perfil" class="sub-item">
						<li><button id="bt-editar-perfil">Editar Perfil</button</li>
						<li><button id="bt-logout">Sair</button></li>
					</ul>
				</li>
			</ul>';
			echo"<script>
				$('#nav').attr('href','_css/nav-online.css');
			</script>";
	}else{
		echo'<button id="bt-login" type="button">Entrar</button>
			<button id="bt-cadastro" type="button">Criar conta</button>';
	} ?>
</nav>
<script type="text/javascript">
	$("#bt-inicio").click(function(){
		$.ajax({
			url : "inicio.php",
			type : "get"
		}).done(function(msg){
			$("#bloco-conteudo").html(msg);
		});
		clearInterval(interval);
	})
	$('#bt-criar').click(function(){
		$("#bloco-conteudo").fadeOut();
		setTimeout(function(){
			$.ajax({
				url : "amb-projeto.php",
				type : "get"
			}).done(function(msg){
				$("#bloco-conteudo").html(msg);
				$("#bloco-conteudo").fadeIn();
			});
		}, 500);
		clearInterval(interval);
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
		clearInterval(interval);
		$.ajax({
			url : 'logout.php',
			type : 'get'
		}).done(function(msg){
			 window.location.reload();
		});
	});
</script>