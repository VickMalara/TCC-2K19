<?php 
	session_start();
	echo $_SESSION["exerc"];
	unset($_SESSION["exerc"]);
	unset($_SESSION["projeto"]);

?>