<?php

session_start();
include "../conexao.php";
$sql = "SELECT arquivo_resp FROM exercicio WHERE ident = ". $_SESSION["exerc"];
$aux = mysqli_fetch_assoc(mysqli_query($conexao,$sql));
$acc_arq = $aux["arquivo_resp"];

$handle = fopen($acc_arq,"r");
while (!feof($handle)) {
	echo fgets($handle);
}
fclose($handle);

?>