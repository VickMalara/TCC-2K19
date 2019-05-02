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
					$("#msg-senha").html('n ta igual');
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
<div class="form-div">
	<form>
		<p id="msg-dados"></p>
		<p>
			<label for="apelido">Apelido</label>
			<input type="text" name="apelido" id="apelido" <?php echo 'value="'.$apelido.'"'?> >
		</p>
		<p>
			<label for="nome">Nome</label>
			<input type="text" name="nome" id="nome" <?php echo 'value="'.$nome.'"'?> >
		</p>
		<p class="botoes">
			<button type="button" id="bt-salv-mud">Salvar Mudanças</button>
		</p>
	</form>
	<form>
		<p id="msg-senha"></p>
		<p>
			<label for="senha">Senha Antiga</label>
			<input type="password" name="senha" id="senha">
		</p>
		<p>
			<label for="nvsenha">Nova Senha</label>
			<input type="password" name="nvsenha" id="nvsenha">
		</p>
		<p>
			<label for="nvsenha">Corfime a Senha</label>
			<input type="password" name="nvsenha-ver" id="versenha">
		</p>
		<p class="botoes">
			<button type="button" id="bt-salv-senha">Salvar Senha</button>
			<button type="button" id="bt-limpa-modal">Cancelar</button>
		</p>
	</form>
</div>
<script type="text/javascript">
	$('#bt-limpa-modal').click(function(){
		$("#modal-dinamico").css("width",'0%');
		$("#modal-dinamico").html('');
	});
</script>


