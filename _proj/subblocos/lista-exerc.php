<div id="lista-exerc" onmouseleave="turnBack()" class="block-list bg-light p-3 mx-auto">
	<?php
		session_start();
		echo $_SESSION["exerc_desc"];
	?>
	<p>Quando cumprir todas as tarefas, clique no botão abaixo para confirir sua resposta.</p>
	<button onclick="checkExer()" data-toggle="modal" data-target="#exerResult" class="bt-default bt-in w-100 display-4 display-lg-4">CORRIGIR</button>
</div>