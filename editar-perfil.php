<?php
	session_start();
	include "conexao.php";

	$sql = "SELECT * FROM usuario WHERE ident = '".$_SESSION["usuario"]."'";

	$result = mysqli_query($conexao,$sql);

	while($r = mysqli_fetch_assoc($result)){
		$apelido = $r["apelido"];
		$nome = $r["nome"];
	}

?>
<script type="text/javascript">
	$(function(){
		var apelido = $('#apelido').val();
		var nome = $('#nome').val();
		$("#bt-salv-senha").click(function(){
			$.ajax({
				url:"alt-senha.php",
				type: 'post',
				data : {
					'senha' : $('#senha').val(),
					'nvsenha' : $('#nvsenha').val(),
					'versenha' : $('#versenha').val()
				},
				beforeSend : function(){
					$("#msg-senha").html('Salvando...');
				}
			}).done(function(msg){
				if(msg == 0){
					$("#msg-senha").html('Salvo!');
				}else if(msg == 1){
					$("#msg-senha").html('As senhas estão diferentes');
				}else{
					$("#msg-senha").html('Erro na senha!');
				}

				$('#senha').val('');
				$('#nvsenha').val('');
				$('#versenha').val('');
			});
		});
		$("#bt-salv-mud").click(function(){
			$.ajax({
				url:"alt-dados.php",
				type: 'post',
				data : {
					'apelido' : $('#apelido').val(),
					'nome' : $('#nome').val()
				},
				beforeSend : function(){
					$("#msg-dados").html('Salvando...');
				}
			}).done(function(msg){
				if(msg == 0){
					$("#bt-perfil").html($("#apelido").val());
					$("#msg-dados").css("display","block");
					$("#msg-dados").css("width","100%");
					$("#msg-dados").css("height","30px");
					$("#msg-dados").css("border","1px solid #0b5b3e");
					$("#msg-dados").css("color","#0b5b3e");
					$("#msg-dados").css("border-radius","5px");
					$("#msg-dados").css("opacity","1");
					setTimeout(function(){
						$("#msg-dados").html('Salvo!');
					},200);
				}else{
					$("#msg-dados").css("display","block");
					$("#msg-dados").css("width","100%");
					$("#msg-dados").css("height","30px");
					$("#msg-dados").css("border","1px solid #900");
					$("#msg-dados").css("color","#900");
					$("#msg-dados").css("border-radius","5px");
					$("#msg-dados").css("opacity","1");
					setTimeout(function(){
						$("#msg-dados").html('Esse apelido ja está em uso.');
					},200);
					$('#apelido').val(apelido);
					$('#nome').val(nome);
				}
			});
		})
	});
</script>
<div class="row h-100 m-0">
	<div class="form-div col-12 col-lg-8 p-3 w-50 h-100">
		<h1 class="w-100 display-1">Edite o seu perfil</h1>
		<form class="container">
			<div id="msg-dados"></div>
			<div class="w-100">
				<label for="apelido" class="w-100">Apelido:</label>
				<input type="text" name="apelido" id="apelido"   class="w-100"<?php echo 'value="'.$apelido.'"'?> maxlength="10">
			</div>
			<div class="w-100">
				<label for="nome" class="w-100">Nome:</label>
				<input type="text" name="nome" id="nome"  class="w-100"<?php echo 'value="'.$nome.'"'?> >
			</div>
			<div class="row d-flex bt-form justify-content-center">
				<button type="button" id="bt-salv-mud"  class="w-100 bt-default">Salvar Mudanças</button>
			</div>

			<div id="msg-senha"></div>
			<div class="w-100">
				<label for="senha" class="w-100">Senha Atual:</label>
				<input type="password" name="senha" id="senha" class="w-100">
			</div>
			<div class="w-100">
				<label for="nvsenha" class="w-100">Nova Senha:</label>
				<input type="password" name="nvsenha" id="nvsenha" class="w-100">
			</div>
			<div class="w-100">
				<label for="nvsenha" class="w-100">Confirme a Senha:</label>
				<input type="password" name="nvsenha-ver" id="versenha" class="w-100">
			</div>
			<div class="row d-flex bt-form justify-content-center">
				<button type="button" id="bt-salv-senha" class="w-100 bt-default">Salvar Senha</button>
				<button type="button" id="bt-limpa-modal" class="w-100 bt-default bt-cancel">Cancelar</button>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	$("#versenha").keyup(function(){
		var senha1 = $("#versenha").val();
		var senha2 = $("#nvsenha").val();
		if(senha1 == senha2){
			$("#versenha").css("box-shadow","0px 0px 8px #090");
			$("#nvsenha").css("box-shadow","0px 0px 8px #090");
		}else{
			$("#versenha").css("box-shadow","0px 0px 8px #900");
			$("#nvsenha").css("box-shadow","0px 0px 8px #900");
		}
	});

	$('#bt-limpa-modal').click(function(){
		$("#modal-dinamico").css("width",'0%');
		setTimeout(function(){
			$("#modal-dinamico").html('');
		},200);
	});
</script>


