<div id="bloco-aprender" class="h-100 w-100" style="background:#000b">
	<div class="bloco-aprender-txt bg-light h-100 p-5" style="overflow-y: scroll;">
        <div>
            <h1>O QUE É CSS?</h1>
            <p>CSS é a sigla para Cascading Style Sheets. É a forma que usamos para deixar nosso código HMTL do jeito que a gente achar melhor, mudando as cores, os tamanhos das letras, o formato da letra, entre muitas outras coisas.</p>
        </div>

        <div>
            <h1>Começando o seu CSS</h1>
            <p>Antes de começar, é importante que você já saiba mexer com HTML. Temos uma página em nosso site para te ensinar, que você pode acessar clicando <a href="#" class="html-direct">aqui</a>.</p>
            <p>Existem 3 formas usar o CSS: dentro da tag, dentro do HTML ou em um arquivo separado.</p>
            <ul>
                <li>
                    <p>Para usar dentro da própria tag, basta você acrescentar <span>style=""</span> dentro da própria tag e colocar o seu código CSS dentro das aspas, como no exemplo abaixo:</p>
                    <div class="img-div">
                        <img src="_learn/_img/css-1.png" class="img-fuild">
                    </div>
                </li>
                <li>
                    <p>Para usar dentro do HTML como um todo, basta você acrescentar a tag <span>&lt;style&gt;&lt;/style&gt;</span> entre as tags <span>&lt;head&gt;&lt;/head&gt;</span> e colocar seu código CSS entre as tags, como no exemplo abaixo:</p>
                    <div class="img-div">
                        <img src="_learn/_img/css-2.png" class="img-fuild">
                    </div>
                </li>
                <li>
                    <p>Para usar o CSS em um arquivo separado, que é a melhor forma, é preciso uns passinhos a mais. Primeiro, você cria um arquivo <span>na mesma pasta que o seu HMTL</span> com a extensão <span>.css</span>. Dessa forma:</p>
                    <div class="img-div">
                        <img src="_learn/_img/css-3.png" class="img-fuild">
                    </div>
                    <p>Segundo, é necessário colocar entre as tags <span>&lt;head&gt;&lt;/head&gt;</span> a tag <span>&lt;link rel="stylesheet" href="" /&gt;</span>e entre o href, colocar o nome do seu arquivo css. É importante que o seu HTML e seu CSS estejam na mesma pasta do computador.</p>
                    <div class="img-div">
                        <img src="_learn/_img/css-4.png" class="img-fuild">
                    </div>
                </li>
            </ul>
            <p>Depois de escolher um dos 3 jeitos, é só começar a digitar!</p>
        </div>
        <div>
            <h1>Como escrever em CSS?</h1>
            <p></p>
        </div>
    </div>
</div>

<script>
    $('.html-direct').click(function(){
        $("#bloco-conteudo").fadeOut();
			setTimeout(function(){
				$.ajax({
					url : "_learn/aprender-html.php",
					type : "get"
				}).done(function(msg){
					$("#bloco-conteudo").css("height",'85%');
					$("nav").css('height','15%');
					$("#bloco-conteudo").html(msg);
					$("#bloco-conteudo").fadeIn();
				});
		}, 500);
    });
</script>