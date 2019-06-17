<link rel="stylesheet" id="nav" type="text/css" href="_css/projeto.css">
<link rel="stylesheet" href="_css/colorPick.min.css">
<script src="_js/dytemp.js"></script>

<div id="amb-proj">
	<div id="aba-criacao">
		<div>
			<button id="bt-abrir-criacao" onclick="abrirCriacao();">WIP</button>
		</div>
	</div>
	
	<div id="projeto">
		<button id="bt-novo-proj">Começar novo Projeto</button>
		<button id="bt-carregar">Carregar projeto</button>
	</div>
	<div id="aba-atributos">
		<div>
		</div>
	</div>
</div>

<script type="text/javascript" src="_js/dytemp.js"></script>
<script type="text/javascript">

	var cabecalho = 0;
	var rodape = 0;
	var menu = 0;

	$("#bt-novo-proj").click(function(){
		var corpo = '<div id="create-mode"><p><label for="nome-proj">Nome do projeto</label><input type="text" id="nome-proj"></p> <p><button onclick="modoLivre();">Modo Livre</button><button>Criar um exercício</button></p></div>';
		$("#projeto").html(corpo);
	});

	$("#bt-carregar").click(function(){
		var corpo = '<div id="card-mode">';
		$.ajax({
			url : 'buscar-projetos.php',
			type : 'get'
		}).done(function(msg){
			corpo += msg;
			corpo += '</div>';
			$("#projeto").html(corpo);
		});
		
	})

	function ativarAutoSave(){
		interval = setInterval(function(){
			$.ajax({
				url : "salvar-projeto.php",
				type : 'post',
				data : {
					html : $("#projeto").html()
				}
			})
		},1000);
	}

	function modoLivre(){
		$.ajax({
			url : "criar-projeto.php",
			type : "post",
			data : {
				"nome-proj" : $("#nome-proj").val()
			}
		}).done(function(msg){
			$("#projeto").html('<style></style>');
			$("#projeto").css('width',"40%");
			$("#projeto").css('position',"relative");
			$("#projeto").css("background","white");
			$("#projeto").css("padding","0");
			$("#conteudo").css("height","90%");
			$("nav").css("height","10%");
			$("#aba-criacao").css("opacity","1");
			$("#aba-atributos").css("opacity","1");
			ativarAutoSave();
		});	
	}

	function carregarArquivo(url,id){
		$.ajax({
			url : 'trocarproj.php?i=' + id,
			type: 'get'
		}).done(function(){
			if(url== null || url==0 || url == '' || url==""){
				$("#projeto").html('');
				$("#projeto").css('width',"40%");
				$("#projeto").css('position',"relative");
				$("#projeto").css("background","white");
				$("#projeto").css("padding","0");
				$("#conteudo").css("height","90%");
				$("nav").css("height","10%");
				$("#aba-criacao").css("opacity","1");
				$("#aba-atributos").css("opacity","1");
				ativarAutoSave();
			}else{
				$.ajax({
					url: url,
					type: 'get'
				}).done(function(msg){
					$("#projeto").html(msg);
					$("#projeto").css('width',"40%");
					$("#projeto").css('position',"relative");
					$("#projeto").css("background","white");
					$("#projeto").css("padding","0");
					$("#conteudo").css("height","90%");
					$("nav").css("height","10%");
					$("#aba-criacao").css("opacity","1");
					$("#aba-atributos").css("opacity","1");
					ativarAutoSave();
				});
			}
		});
	}

	function turnBack(){
		$("#aba-criacao div").css("width","120px");
			$("#aba-criacao div").css("height","120px");
			$("#aba-criacao div").css("background","#09f");
			$("#aba-criacao div").css("border-radius","50%");
			$("#aba-criacao div").html('<button id="bt-abrir-criacao" onclick="abrirCriacao();">WIP</button>');
	}

	function turnBack2(){
	// 	$("#aba-atributos div").html('');
	// 	$("#aba-atributos div").css("width","0");
	// 	$("#aba-atributos div").css("height","0");
	// 	$("#aba-atributos div").css("background","none");
	// 	$("#aba-atributos div").css("border-radius","none");
			
	}

	function abrirCriacao(){
		var abas = '';
		var str = $("#projeto").html();

		if(str.indexOf('<header') == -1){
			abas += '<button onclick="fazerCabecalho()">Criar Cabecalho</button>';
		}
		if(str.indexOf('<nav') == -1){
			abas += '<button onclick="fazerMenu()">Criar Menu</button>';
		}

		abas+= '<button onclick="fazerTexto()">Criar Texto</button>';

		if(str.indexOf('<footer') == -1){
			abas += '<button onclick="fazerRodape()">Criar Rodapé</button>';
		}
		
		$("#aba-criacao div").css("width","100%");
		$("#aba-criacao div").css("height","90%");
		$("#aba-criacao div").css("background","white");
		$("#aba-criacao div").css("box-shadow","none");
		$("#aba-criacao div").css("border-radius","30px");
		$("#aba-criacao div").css("transform","scale(1)");
		$("#aba-criacao div").html(abas);
		$("#aba-criacao div").mouseleave(function(){turnBack()});
	}

	function fazerCabecalho(){
		$.ajax({
			url : "templates/base-cabecalho.css",
			type : 'get'
		}).done(function(msg){
			var extra = $("#projeto style").html();
			extra += msg;
			$("#projeto style").html(extra);
		});

		$.ajax({
			url : "templates/cabecalho.html",
			type : 'get'
		}).done(function(msg){
			var extra = $("#projeto").html();
			extra += msg;
			$("#projeto").html(extra); 
			confAtributos('header');
			turnBack();
		});
	}

	function fazerTexto(){
		$.ajax({
			url : "templates/texto.html",
			type : 'get'
		}).done(function(msg){
			var extra = $("#projeto").html();
			extra += msg;
			$("#projeto").html(extra);
			confAtributos('texto');
			turnBack();
		});
	}

	function fazerRodape(){
		$.ajax({
			url : "templates/base-rodape.css",
			type : 'get'
		}).done(function(msg){
			var extra = $("#projeto style").html();
			extra += msg;
			$("#projeto style").html(extra);
		});

		$.ajax({
			url : "templates/rodape.html",
			type : 'get'
		}).done(function(msg){
			var extra = $("#projeto").html();
			extra += msg;
			$("#projeto").html(extra);
			confAtributos('footer');
			turnBack();
		});

		
	}
</script>