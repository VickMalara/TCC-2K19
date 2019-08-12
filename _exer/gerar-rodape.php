<style>
	<?php
	
		include "../funcoes.php";
	
		$corFundo = gerar_corFundo();
		$posicao = gerar_posicao();
		
		echo'footer {';
			echo 'background-color:'.$corFundo.';';
			echo 'text-align:'.$posicao.';';
		echo"}";
		
		$corLetra = gerar_corLetra($corFundo);
		
		echo'footer p{';
			echo 'color:'.$corLetra.';';
		echo'}';
	?>
</style>



<footer>
	<p id = "nomeAutor">Rodapé</p>
	<p id = "copy"> &copy;</p>
	<p id = "ano">2019</p>
</footer>