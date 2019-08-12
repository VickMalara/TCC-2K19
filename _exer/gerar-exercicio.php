<?php

session_start();

setlocale(LC_ALL, 'pt_BR','pt_BR.iso-8859-1','pt_BR.utf-8','portuguese');

include "funcoes.php";
include "../conexao.php";

$exerc = '<style>';

	$corFundoCRv = gerar_corFundo();
	$corFundoDv = gerar_corFundo();
	$corFundoCR = $corFundoCRv[0];
	$corFundoD = $corFundoDv[0];

	$posicaoCRv = gerar_posicao();
	$corLetraCRv = gerar_corLetra($corFundoCR);
	$paddingCRv = gerar_padding();
	$fontSizeCRv = gerar_fontSize();
	$posicaoCR = $posicaoCRv[0];
	$corLetraCR = $corLetraCRv[0];
	$paddingCR = $paddingCRv[0];
	$fontSizeCR = $fontSizeCRv[0];

	$corLetraDtitlev = gerar_corLetra($corFundoD);
	$corLetraDtxtv = gerar_corLetra($corFundoD);
	$posicaoDv = gerar_posicao();
	$paddingDv = gerar_padding();
	$fontSizeDv = gerar_fontSize();
	$corLetraDtxt = $corLetraDtxtv[0];
	$corLetraDtitle = $corLetraDtitlev[0];
	$posicaoD = $posicaoDv[0];
	$paddingD = $paddingDv[0];
	$fontSizeD = $fontSizeDv[0];

	$divs = gerar_div();
	
	
	$exerc .='#arq-resp header{
				background-color:'.$corFundoCR.';
				text-align:'.$posicaoCR.'; 
				font-size: '.$fontSizeCR.';
				padding: '.$paddingCR.'; 
			}';
	
	$exerc .='#arq-resp header h1{
			color:'.$corLetraCR.';
			}';
	
	$exerc .='#arq-resp div.div-proj-resp {
				background-color:'.$corFundoD.';
				text-align:'.$posicaoD.';
				font-size: '.$fontSizeD.';
				padding: '.$paddingD.'; 
			}';
	
	
	$exerc .='#arq-resp div.div-proj-resp h1{
				color:'.$corLetraDtitle.';
			}';
	$exerc .='div.div-proj-resp div.text{
				color:'.$corLetraDtxt.';
			}';		
	
	$exerc .='#arq-resp footer {
				background-color:'.$corFundoCR.';
				text-align:'.$posicaoCR.'; 
				font-size: '.$fontSizeCR.';
				padding: '.$paddingCR.'; 
			}';
	
	
	$exerc .='#arq-resp footer span{
			color:'.$corLetraCR.';
			}';

$exerc .='</style>
		<div id="body-proj" class="d-flex flex-column h-100">
			<header>
				<h1 id = "header">CABEÇALHO</h1>
			</header>';

	$exerc .= $divs[0];

$exerc .='<footer>
			<span id = "nomeAutor">Rodapé</span>
			<span id = "copy"> &copy;</span>
			<span id = "ano">2019</span>
		</footer>
	</div>';

// echo $exerc;

$texto = '<ol>
			<li>Crie um cabeçalho com o fundo da cor <b>'.$corFundoCRv[1].'</b> e as letras da cor <b>'.$corLetraCRv[1].'</b>. A letra deve ser <b>'.$fontSizeCRv[1].'</b> e estar <b>'.$posicaoCRv[1].'</b>. O espaço interno <b>'.$paddingCRv[1].'</b>. Pode escrever o que quiser!</li>
			<li>Crie <b>'.$divs[1].'</b> bloco(s) de texto com o fundo da cor <b>'.$corFundoDv[1].'</b>. Os títulos devem ser da cor <b>'.$corLetraDtitlev[1].'</b>.Os textos devem ser da cor <b>'.$corLetraDtxtv[1].'</b>. Posicione o texto <b>'.$posicaoDv[1].'</b> e coloque um espaçamento interno <b>'.$paddingDv[1].'</b>. Escreva o que quiser neles!</li>
			<li>Crie um rodapé com o fundo da cor <b>'.$corFundoCRv[1].'</b> e as letras da cor <b>'.$corLetraCRv[1].'</b>. A letra deve ser <b>'.$fontSizeCRv[1].'</b> e estar <b>'.$posicaoCRv[1].'</b>. O espaço interno <b>'.$paddingCRv[1].'</b>. Pode escrever o que quiser!</li>
		</ol>';

// echo $texto;

// date_default_timezone_set('America/Sao_Paulo');

$data = date('Ymdhis');
$nomearq = '../exercicios/'.$_SESSION["usuario"].'_'.$data.'.html';

$arquivo = fopen($nomearq,'w');
fwrite($arquivo,$exerc);
fclose($arquivo);

$sql = "INSERT INTO exercicio (arquivo_resp,descricao) VALUES ('".$nomearq."','".$texto."')";
mysqli_query($conexao,$sql);

$sql = "SELECT ident FROM exercicio WHERE arquivo_resp = '".$nomearq."'";
$result = mysqli_fetch_assoc(mysqli_query($conexao,$sql));
echo $result["ident"];
?>