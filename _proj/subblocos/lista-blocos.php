<div id="lista-itens" onmouseleave="turnBack()" class="block-list bg-light p-3 mx-auto">

	<?php if($_GET["c"] == 0){ ?>
	<button onclick="inCabecalho();" class="bt-default bt-in w-100 display-4 display-lg-4">Colocar Cabeçalho</button>
	<?php } ?>

	<?php if($_GET["d"] < 3){ ?>
		<button onclick="inTxt(<?= $_GET["d"] ?>);" class="bt-default bt-in w-100 display-4 display-lg-4">Colocar Bloco de Texto</button>
	<?php } ?>

	<?php if($_GET["r"] == 0){ ?>
	<button onclick="inRodape();" class="bt-default bt-in w-100 display-4 display-lg-4">Colocar Rodapé</button>
	<?php } ?>

	<?php if($_GET["c"] != 0 && $_GET["d"] >= 4 && $_GET["r"] != 0){
		echo'<h1>Não há mais blocos para colocar no seu projeto</h1>';
	}?>
</div>