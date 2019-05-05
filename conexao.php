<?php

	$conexao = mysqli_connect('localhost', 'pineappleadm', 'pineappleehtop','pineappleDB');
	
	if(!$conexao){
		echo "Conexão com o banco falha.";
	}
	
	

?>