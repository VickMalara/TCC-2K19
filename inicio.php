<?php
	if(isset($_SESSION["validacao"]) && $_SESSION["validacao"] == 0){
		echo'<div id="validacao">
			<button class="bt-close">&times;</button>
			<p>Seu e-mail ainda precisa ser validado. <button id="bt-send-email">Clique aqui</button> e será enviado ao seu e-mail um link de verificação. Acesse esse link e seu e-mail será validado.</p>
		</div>';
	}
?>
<div id="txt-central">
	<h1>Aqui você aprende a criar sites brincando! Para começar a usar, crie ou acesse sua conta.</h1>
</div>