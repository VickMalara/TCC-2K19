<?php
	if(isset($_SESSION["validacao"]) && $_SESSION["validacao"] == 0){
		echo'<div id="validacao">
			<button type="button" class="bt-close close h-100 m-0" aria-label="Close" style="width:40px">
			  <span aria-hidden="true">&times;</span>
			</button>
			<p class="d-block m-0">Seu e-mail ainda precisa ser validado. <button id="bt-send-email">Clique aqui</button> e será enviado ao seu e-mail um link de verificação. Acesse esse link e seu e-mail será validado.</p>
		</div>';
	}
?>
<div id="txt-central" class="mx-auto w-50 display-3" style="margin-top:10%;box-shadow: 0px 0px 5px #555e;background:#fffa;border-radius:10px;height:300px;line-height:300px;text-align:center;vertical-align:middle">
	BEM-VINDO AO PINEAPPLE
</div>

<script type="text/javascript">
	$('.bt-close').click(function(){
		$(this).parent().fadeOut();
	});
</script>