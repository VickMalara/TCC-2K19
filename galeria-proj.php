<div class="w-100 p-5 bg-dark" style="height: 20%">
  <div class="p-2 bg-light rounded rounded-pill shadow-sm mb-4">
    <div class="input-group">
      <input id="busca" type="search" placeholder="Digite o nome do projeto que quer buscar..." class="form-control border-0" style="background:transparent;box-shadow:none;" >
      <div class="input-group-append">
        <button id="button-addon1" type="submit" class="btn btn-link text-success"><i class="fa fa-search">Buscar</i></button>
      </div>
    </div>
  </div>
</div>

<div id="galeria" class="d-flex flex-wrap justify-content-center w-100 p-3 bg-dark" style="height:80%;align-items: flex-start;overflow-y: scroll;">
	<?php
		session_start();
		include "conexao.php";

		$sql = "SELECT * FROM projeto ORDER BY proj_ident desc";
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
					echo"<button id=\"".$arquivo["proj_ident"]."\" data-toggle=\"modal\" data-target=\"#exerResult\" class=\"bt-in bt-default w-100 d-block float-bottom\" onclick=\"verProj(".$arquivo["proj_ident"].");\" value=\"".$arquivo["arquivo"]."\">Ver este projeto</button>";
				echo "</div>";
			echo "</div>";
		}
	?>
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
		$("#busca").keyup(function(){
			$.ajax({
				url : "pgaleria.php?s=" + $(this).val(),
				type : "get"
			}).done(function(msg){
				$("#galeria").html(msg);
			})
		});

		function verProj(id){
			$(".modal-title").html($("#" + id).siblings('.card-title').html());
			$.ajax({
				url : "galeria-verproj.php?i=" + id,
				type : 'get'
			}).done(function(msg){
				$("#arq-proj").html(msg);
			});
		}
</script>

<!--  -->