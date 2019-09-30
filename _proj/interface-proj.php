<?php session_start() ?>
<div id="bloco-proj" class="d-flex m-0 w-100 h-100">
	<div id="bloco-itens"class="h-100 d-flex flex-column justify-content-center">
		<button class="bt-morph" onclick="openList()">O</button>
	</div>
	<div id="arq-proj" class="h-100 bg-light d-flex flex-column" style="width:75%;transition:width 0.3s;">
<style>
</style>
<div id="body-proj" class="d-flex flex-column h-100">
</div>
	</div>
	<div id="bloco-atr" class="h-100 d-flex flex-column justify-content-center">
		<div id="atr-list" class="mx-auto block-list bg-light">
			<?php 
				include "subblocos/atr-header.html";
				include "subblocos/atr-footer.html";
				include "subblocos/atr-txt.html";
			?>
		</div>
	</div>
</div>

<div id="exerResult" class="modal fade bd-example-modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div id="arq-proj" style="transform:scale(0.9);height: 800px;background:#efefef">
      	</div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
	var inTime = 500;
	var turnPage;

// Funções de inicialização da interface de projetos
	
	setTimeout(function(){
		carregarCab();
		carregarRdp();
	},500);

	$(".bt-txt").click(function(){
		$(this).toggleClass("bt-txt");
		$(this).toggleClass("active-bt-txt");
	});


	$(".picker").colorPick({
		'allowRecent': true, 
		'recentMax': 4,
		'palette': [ "#fefefe","#dddddd","#ababab","#333333","#cce6ff","#80bfff","#1a8cff","#0059b3","#99ffbb","#4dff88","#00ff55","#009933","#ffff99","#ffff4d","#e6e600","#999900","#ffd9b3","#ffa64d","#e67300","#b35900","#ffb3b3","#ff6666","#ff3333","#cc0000","#ecc6d9","#d98cb3","#c6538c","#993366","#d9b3ff","#b366ff","#8000ff","#4d0099"]
	});

// Funções de funcionamento do sistema de inserção de templates

	function openList(){
		turnPage = $("#bloco-itens").html();
		var rodape = 0;
		var cabecalho = 0;
		var divs = 0;
		const ps = document.getElementsByClassName('div-proj');

		if($("#arq-proj header").length){
			cabecalho = 1;
		}
		if($("#arq-proj footer").length){
			rodape = 1;
		}

		if(ps.length != 0){
			divs = ps.length;
		}

		$("#bloco-itens").css("width","40%");
		$("#arq-proj").css("width","60%");
		$.ajax({
			url: "_proj/subblocos/lista-blocos.php?r=" + rodape + "&c=" + cabecalho + "&d=" + divs,
			type: 'get'
		}).done(function(msg){
			$("#bloco-itens").html(msg);
			$("#lista-itens").css("width","95%");
			$("#lista-itens").css("height","95%");
		});
	};

	function openExerc(){
		turnPage = $("#bloco-itens").html();

		$("#bloco-itens").css("width","40%");
		$("#arq-proj").css("width","60%");
		$.ajax({
			url: "_proj/subblocos/lista-exerc.php",
			type: 'get'
		}).done(function(msg){
			$("#bloco-itens").html(msg);
			$("#lista-exerc").css("width","95%");
			$("#lista-exerc").css("height","95%");
		});
	};

	function turnBack(){
		$("#lista-itens").css("width","0%");
		$("#lista-exerc").css("width","0%");
		$("#lista-itens").css("height","0%");
		$("#lista-exerc").css("height","0%");
		$("#bloco-itens").css("width","25%");
		$("#arq-proj").css("width","75%");
		setTimeout(function(){
			$("#bloco-itens").html(turnPage);
		},200);
	}

	function inRodape(){
		$.ajax({
			url:"templates/rodape.html",
			type: "get"
		}).done(function(msg){
			var corpo = $("#body-proj").html();
			corpo += msg;
			$("#body-proj").html(corpo);
			turnBack();
			setTimeout(function(){
				carregarRdp();
				confAtributos('footer');
			},inTime);
		});

		$.ajax({
			url:"templates/base-rodape2.css",
			type: "get"
		}).done(function(msg){
			var corpo = $("#arq-proj style").html();
			corpo += msg;
			$("#arq-proj style").html(corpo);
		});
	}

	function inCabecalho(){
		$.ajax({
			url:"templates/cabecalho.html",
			type: "get"
		}).done(function(msg){
			var corpo = $("#body-proj").html();
			corpo += msg;
			$("#body-proj").html(corpo);
			turnBack();
			setTimeout(function(){
				carregarCab();
				confAtributos('header');
			},inTime);
		});

		$.ajax({
			url:"templates/base-cabecalho2.css",
			type: "get"
		}).done(function(msg){
			var corpo = $("#arq-proj style").html();
			corpo += msg;
			$("#arq-proj style").html(corpo);
		});
	}

	function inTxt(id){
		if(id == 0){
			var corpo = $("#body-proj").html();
			corpo += "<div id='proj-content' class='d-flex justify-content-center h-100 w-100 p-2' style='order:2;'></div>";
			$("#body-proj").html(corpo);

			$.ajax({
			url:"templates/texto.php?id=" + id,
			type: "get"
			}).done(function(msg){
				corpo = $("#proj-content").html();
				corpo += msg;
				$("#proj-content").html(corpo);
				turnBack();
				setTimeout(function(){
					carregarTxt(id);
					confAtributos(id);
				},inTime);
			});

			$.ajax({
				url:"templates/base-texto2.css",
				type: "get"
			}).done(function(msg){
				// alert(msg);
				var corpo = $("#arq-proj style").html();
				corpo += msg;
				$("#arq-proj style").html(corpo);
			});
		}else if(id<4){
			$.ajax({
			url:"templates/texto.php?id=" + id,
			type: "get"
		}).done(function(msg){
			var corpo = $("#proj-content").html();
			corpo += msg;
			$("#proj-content").html(corpo);
			turnBack();
			setTimeout(function(){
				carregarTxt(id);
				confAtributos(id);
			},inTime);
		});
		}
	}
	 function checkExer(){
	 	var pont=0, max=0;
	 	var notify = '';
	 	var text = '<p>Corrigindo sua resposta</p>';
	 	text += '<div class="progress">';
	 	text +='<div id="progress" class="progress-bar" style="width:0%;background-color:#f5dd3d"></div>';
	 	text +='</div>';
	 	text +='<div id="arq-resp" class="d-none"></div>';
	 	$('#exerResult .modal-body').html(text);
	 	$.ajax({
	 		url:'_exer/corretor.php',
	 		type:'get'
	 	}).done(function(msg){
	 		$("#arq-resp").html(msg);
	 		const divs = document.getElementsByClassName('div-proj');
	 		const divsResp = document.getElementsByClassName('div-proj-resp');
	 		max = 10 + (divsResp.length * 5);
	 		if($("#arq-proj header").length){
	 			if($("#arq-proj header").css('background-color') == $("#arq-resp header").css('background-color')){
	 				pont += 1;
	 			}else{
	 				notify += '<div class="alert alert-danger" role="alert">A cor de fundo do cabeçalho está errada.</div>';
	 			}

	 			if($("#arq-proj header h1").css('color') == $("#arq-resp header h1").css('color')){
	 				pont += 1;
	 			}else{
	 				notify += '<div class="alert alert-danger" role="alert">A cor da letra do cabeçalho está errada.</div>';
	 			}

	 			if($("#arq-proj header h1").css('font-size') == $("#arq-resp header").css('font-size')){
	 				pont += 1;
	 			}else{
	 				notify += '<div class="alert alert-danger" role="alert">O tamalho da letra do cabeçalho está errado.</div>';
	 			}

	 			if($("#arq-proj header h1").css('text-align') == $("#arq-resp header").css('text-align')){
	 				pont += 1;
	 			}else{
	 				notify += '<div class="alert alert-danger" role="alert">O alinhamento da letra do cabeçalho está errado.</div>';
	 			}

	 			if($("#arq-proj header").css('padding') == $("#arq-resp header").css('padding')){
	 				pont += 1;
	 			}else{
	 				notify += '<div class="alert alert-danger" role="alert">O espaçamento interno do cabeçalho está errado.</div>';
	 			}
	 		}else{
	 			notify += '<div class="alert alert-danger" role="alert">Você não colocou um cabeçalho.</div>';
	 		}

	 		if(divs.length == divsResp.length){
	 			var i;
	 			for(i=0;i<divsResp.length;i++){
	 				if($("#"+ i).css('background-color') == $("#div-resp-"+ i).css('background-color')){
	 					pont += 1;
	 				}else{
	 					notify += '<div class="alert alert-danger" role="alert">O bloco '+ (i+1) +' está com a cor de fundo errada.</div>';
	 				}

	 				if($("#"+ i +" h1").css('color') == $("#div-resp-"+ i +" h1").css('color')){
	 					pont += 1;
	 				}else{
	 					notify += '<div class="alert alert-danger" role="alert">O bloco '+ (i+1) +' está com a cor do título errada.</div>';
	 				}

	 				if($("#"+ i +" .text").css('color') == $("#div-resp-"+ i +" .text").css('color')){
	 					pont += 1;
	 				}else{
	 					notify += '<div class="alert alert-danger" role="alert">O bloco '+ (i+1) +' está com a cor do texto errada.</div>';
	 				}

	 				if($("#"+ i +' .text').css('text-align') == $("#div-resp-"+ i).css('text-align')){
	 					pont += 1;
	 				}else{
	 					notify += '<div class="alert alert-danger" role="alert">O bloco '+ (i+1) +' está com o alinhamento do texto errado.</div>';
	 				}

	 				if($("#"+ i).css('padding') == $("#div-resp-"+ i).css('padding')){
	 					pont += 1;
	 				}else{
	 					notify += '<div class="alert alert-danger" role="alert">O bloco '+ (i+1) +' está com o espaçamento interno errado.</div>';
	 				}
	 			}
	 		}else{
	 			notify += '<div class="alert alert-danger" role="alert">Você precisa criar mais '+ (divsResp.length-divs.length) +' bloco(s).</div>';

	 			if(divs.length < divsResp.length){
	 				var i;
		 			for(i=0;i<divs.length;i++){
		 				if($("#"+ i).css('background-color') == $("#div-resp-"+ i).css('background-color')){
		 					pont += 1;
		 				}else{
		 					notify += '<div class="alert alert-danger" role="alert">O bloco '+ (i+1) +' está com a cor de fundo errada.</div>';
		 				}

		 				if($("#"+ i +" h1").css('color') == $("#div-resp-"+ i +" h1").css('color')){
		 					pont += 1;
		 				}else{
		 					notify += '<div class="alert alert-danger" role="alert">O bloco '+ (i+1) +' está com a cor do título errada.</div>';
		 				}

		 				if($("#"+ i +" .text").css('color') == $("#div-resp-"+ i +" .text").css('color')){
		 					pont += 1;
		 				}else{
		 					notify += '<div class="alert alert-danger" role="alert">O bloco '+ (i+1) +' está com a cor do texto errada.</div>';
		 				}

		 				if($("#"+ i +" .text").css('text-align') == $("#div-resp-"+ i).css('text-align')){
		 					pont += 1;
		 				}else{
		 					notify += '<div class="alert alert-danger" role="alert">O bloco '+ (i+1) +' está com o alinhamento do texto errado.</div>';
		 				}

		 				if($("#"+ i).css('padding') == $("#div-resp-"+ i).css('padding')){
		 					pont += 1;
		 				}else{
		 					notify += '<div class="alert alert-danger" role="alert">O bloco '+ (i+1) +' está com o espaçamento interno errado.</div>';
		 				}
		 			}
 				}
	 		}

	 		if($("#arq-proj footer").length){
	 			if($("#arq-proj footer").css('background-color') == $("#arq-resp footer").css('background-color')){
	 				pont += 1;
	 			}else{
	 				notify += '<div class="alert alert-danger" role="alert">A cor de fundo do rodapé está errada.</div>';
	 			}

	 			if($("#arq-proj footer span").css('color') == $("#arq-resp footer span").css('color')){
	 				pont += 1;
	 			}else{
	 				notify += '<div class="alert alert-danger" role="alert">A cor da letra do rodapé está errada.</div>';
	 			}

	 			if($("#arq-proj footer span").css('font-size') == $("#arq-resp footer").css('font-size')){
	 				pont += 1;
	 			}else{
	 				notify += '<div class="alert alert-danger" role="alert">O tamalho da letra do rodapé está errado.</div>';
	 			}

	 			if($("#arq-proj footer span").css('text-align') == $("#arq-resp footer").css('text-align')){
	 				pont += 1;
	 			}else{
	 				notify += '<div class="alert alert-danger" role="alert">O alinhamento da letra do rodapé está errado.</div>';
	 			}

	 			if($("#arq-proj footer").css('padding') == $("#arq-resp footer").css('padding')){
	 				pont += 1;
	 			}else{
	 				notify += '<div class="alert alert-danger" role="alert">O espaçamento interno do rodapé está errado.</div>';
	 			}
	 		}else{
	 			notify += '<div class="alert alert-danger" role="alert">Você não colocou um rodapé.</div>';
	 		}

	 		if(pont == max){
	 			notify += '<div class="alert alert-success" role="alert">Parabéns! Você acertou!</li>';
	 		}
	 		setTimeout(function(){
	 			$('#progress').css('width','100%');
	 			setTimeout(function(){
	 				 text = $('#exerResult .modal-body').html();
	 				 text += "<div class=\"mt-3\">";
	 				 text += notify;
	 				 text += "</div>";
	 				 $('#exerResult .modal-body').html(text);
	 			},500);
	 		},500);
	 	});
	 }
// Funções de personalização do cabeçalho

	$("#bolder-cab-bt").click(function(){
		if(!$(this).hasClass('active-bt-txt')){
			$("#arq-proj header h1").css("font-weight","300");
		}else{
			$("#arq-proj header h1").css("font-weight","700");
		}
	});

	$("#italic-cab-bt").click(function(){
		if(!$(this).hasClass('active-bt-txt')){
			$("#arq-proj header h1").css("font-style","normal");
		}else{
			$("#arq-proj header h1").css("font-style","italic");
		}
	});

	$("#underline-cab-bt").click(function(){
		var underline;
		if(!$(this).hasClass('active-bt-txt')){
			underline = "none solid " + $("#arq-proj header").css("color");
			$("#arq-proj header h1").css("text-decoration",underline);
		}else{
			underline = "underline solid " + $("#arq-proj header").css("color");
			$("#arq-proj header h1").css("text-decoration",underline);
		}
	});

	$("#cab-txt").keyup(function(){
		$("#arq-proj header h1").html($("#cab-txt").val());
	});

// Funções de personalização do rodapé

	$("#rdp-autor-txt").keyup(function(){
		$("#arq-proj footer #nomeAutor").html($(this).val());
	})

	$("#rdp-ano-txt").change(function(){
		$("#arq-proj footer #ano").html($(this).val());
	})

	$("#bolder-rdp-bt").click(function(){
		if(!$(this).hasClass('active-bt-txt')){
			$("#arq-proj footer span").css("font-weight","300");
		}else{
			$("#arq-proj footer span").css("font-weight","700");
		}
	});

	$("#italic-rdp-bt").click(function(){
		if(!$(this).hasClass('active-bt-txt')){
			$("#arq-proj footer span").css("font-style","normal");
		}else{
			$("#arq-proj footer span").css("font-style","italic");
		}
	});

	$("#underline-rdp-bt").click(function(){
		var underline;
		if(!$(this).hasClass('active-bt-txt')){
			underline = "none solid " + $("#arq-proj footer").css("color");
			$("#arq-proj footer span").css("text-decoration",underline);
		}else{
			underline = "underline solid " + $("#arq-proj footer").css("color");
			$("#arq-proj footer span").css("text-decoration",underline);
		}
	});
// Editores de texto
	$("#div-txt-h1").keyup(function(){
		$("#arq-proj #" + $("#edited-block").val() + " h1").html($(this).val());
	});

	$("#div-txt").keyup(function(){
		$("#arq-proj #" + $("#edited-block").val() + " .text").html($(this).val());
	});
	$("#pos-div-txt").change(function(){
		$("#arq-proj #" + $("#edited-block").val() + " .text").css("text-align",$(this).val());
	});

	$(".bt-pronto").click(function(){
		$("#bloco-atr").css("width","0%");
		setTimeout(function(){
			$("#bloco-atr").css("display","none");
			$("#atr-header").css("display","none");
		},300);

		$("#bloco-itens").css("width","25%");
		$("#arq-proj").css("width","75%");
	});
</script>