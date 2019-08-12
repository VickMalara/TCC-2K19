<div class="d-flex flex-wrap justify-content-center w-100 h-100 p-3" style="align-items: flex-start;overflow-y: scroll;">
<?php
	session_start();
	include "../conexao.php";

	$sql = "SELECT * FROM projeto WHERE usuario = ".$_SESSION['usuario']." ORDER BY proj_ident desc";
	$result = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));

	while($arquivo = mysqli_fetch_assoc($result)){
		echo "<div class=\"card m-1 p-0\" style=\"min-height:500px;width:24%\">";
			echo "<img class=\"card-img-top w-100\" src=\"_img/card-proj.png\" alt=\"Card image cap\" style=\"background-color:#b3e5b3\">";
			echo "<div class=\"card-body\">";
				echo "<h5 class=\"card-title\">".$arquivo["nome"]."</h5>";
				echo "<h6 class=\"card-subtitle mb-2 text-muted\">".$arquivo["data_criacao"]."</h6>";
				if($arquivo["exercicio"] == NULL){
					echo"<p class=\"card-text\">Este projeto foi criado no Modo Livre.</p>";
				}else{
					echo"<p class=\"card-text\">Este projeto foi criado com um exercício.</p>";
				}
				echo"<button id=\"".$arquivo["proj_ident"]."\" class=\"bt-load bt-default w-100 d-block float-bottom\" value=\"".$arquivo["arquivo"]."\">Carregar este projeto</button>";
			echo "</div>";
		echo "</div>";
	}
?>
</div>

<script type="text/javascript">
	$(".bt-load").click(function(){
		var content;
		var link;
		var id = $(this).attr('id');

		$.ajax({
			url:"_proj/interface-proj.php",
			type: "get"
		}).done(function(msg){
			$("#amb-proj").fadeOut();
			setTimeout(function(){
				$.ajax({
					url : "_proj/trocar-proj.php?i=" + id,
					type : 'get'
				}).done(function(msg){
						if(msg != ''){
							$("#arq-proj").html(msg);
						}
						ativarAutoSave();
				});
				$.ajax({
					url : "_exer/ident-exer.php?i="+ id,
					type : 'get'
				}).done(function(msg){
					var aux = $("#bloco-itens").html();
					aux += msg;
					$("#bloco-itens").html(aux);
				});
				$("#amb-proj").html(msg);
				$("#amb-proj").fadeIn();
			},500);
		});
	});
</script>