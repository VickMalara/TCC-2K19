<?php

/*
PRETO "#fefefe,"#333333"
AZUL "#cce6ff","#0059b3"
VERDE "#99ffbb","#009933"
ALMARELO "#ffff99","#999900"
LARANJA "#ffd9b3","#b35900"
VERMEI "#ffb3b3","#cc0000"
ROZA "#ecc6d9","#993366"
ROXO "#d9b3ff","#4d0099"
*/

function gerar_posicao(){
	
	$posicao = ["left", "center", "right"];
	$nome = ["alinhado a esquerda","centralizado","alinhado a direita"];
	$pos = rand(0,2);
	return [$posicao[$pos],$nome[$pos]];
}

function gerar_padding(){
	$pd = ["5px","10px","15px","20px"];
	$nome =["Pequeno","Médio","Grande","Enorme"];
	$pos = rand(0,3);
	return [$pd[$pos],$nome[$pos]];
}	

function gerar_fontSize(){
	$fs = ["32px","42px","48px","56px","64px"];
	$nome =["Minúscula","Pequena","Média","Grande","Enorme"];
	$pos = rand(0,4);
	return [$fs[$pos],$nome[$pos]];
}	

function gerar_corFundo(){
	
	$cor = ["#fefefe", "#333333", "#cce6ff", "#0059b3", "#99ffbb", "#009933", "#ffff99","#999900", "#ffd9b3","#b35900", "#ffb3b3","#cc0000","#ecc6d9","#993366" ,"#d9b3ff","#4d0099"];
	$nome = ["branco","preto","azul mais claro","azul mais escuro", "verde mais claro","verde mais escuro","amarelo mais claro","amarelo mais escuro","laranja mais claro","laranja mais escuro","vermelho mais claro","vermelho mais escuro","rosa mais claro","rosa mais escuro","roxo mais claro","roxo mais escuro"];
	$pos = rand(0,15);
	return [$cor[$pos],$nome[$pos]];
}
 
	
function gerar_letraClara(){
	 
	 $cor = ["#fefefe", "#cce6ff", "#99ffbb", "#ffff99", "#ffd9b3", "#ffb3b3", "#ecc6d9" ,"#d9b3ff"];
	 $nome = ["branco","azul mais claro", "verde mais claro","amarelo mais claro","laranja mais claro","vermelho mais claro","rosa mais claro","roxo mais claro"];
	 $pos = rand(0,7);

	 return [$cor[$pos],$nome[$pos]];
}
 
function gerar_letraEscura(){
	
	$cor = ["#333333", "#0059b3", "#009933","#999900","#b35900","#cc0000","#993366","#4d0099"];
	$nome = ["preto","azul mais escuro", "verde mais escuro","amarelo mais escuro","laranja mais escuro","vermelho mais escuro","rosa mais escuro","roxo mais escuro"];
	$pos = rand(0,7);

	return [$cor[$pos],$nome[$pos]];
	
}
	
function gerar_corLetra($corFundo){
	if($corFundo == "#333333" || $corFundo == "#0059b3" || $corFundo == "#009933" || $corFundo == "#999900" || $corFundo == "#b35900" || $corFundo == "#cc0000" || $corFundo == "#4d0099" || $corFundo == "#993366" ){
		$corLetra = gerar_letraClara();
	}else{
		$corLetra = gerar_letraEscura();
	}
	
	return $corLetra;
}


function gerar_div(){
	
	$qntDivs = rand(1,3);
	$corpo = "";
	
	for($i=0;$i<$qntDivs;$i++){
		$corpo .= "<div id=\"div-resp-". $i ."\" class=\"div-proj-resp\">
			<h1>DIV DE TEXTO</h1>
			<div class=\"text\">exemplo de texto</div>
		</div>";
	}
	return [$corpo,$qntDivs];
}
?>