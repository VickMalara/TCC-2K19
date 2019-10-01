<div id="bloco-aprender" class="h-100 w-100" style="background:#000b">
	<div class="bloco-aprender-txt bg-light h-100 p-5" style="overflow-y: scroll;">
		<div>
			<h1>O que é HTML?</h1>
			<p>
				HTML é a sigla em inglês para <span>Linguagem de Marcação de Hipertexto</span>. É com ela que são feitos os sites que acessamos na internet.
			</p>
			<p>
				Usamos a linguagem HTML para criar um arquivo que irá ser lido pelo navegador. Para fazer isso, usamos as <span>tags</span>.
			</p>
		</div>
		<div>
			<h1>O que é uma TAG?</h1>
			<p>
				As tags são marcações usadas para dizer ao navegador como ele deve carregar alguma coisa. Elas sempre aparecem escritas entre <span>&lt; e &gt;</span>. Vamos dar um exemplo:
			</p>
			<p>
				Digamos que você gostaria de colocar um botão no seu site escrito "BEM-VINDO!".Para criar o botão, devemos utilizar a tag <span>&lt;button&gt;</span> e <span>&lt;/button&gt;</span> e, entre elas, colocar a frase que gostariamos que estivesse dentro do botão, como mostram as fotos:
			</p>
			<div class="img-div">
					<img src="_learn/_img/tag-1.png" class="img-fluid">
			</div>
			<div class="img-div">
				<img src="_learn/_img/tag-2.png"  class="img-fluid">
			</div>
		</div>
		<div>
			<h1>Criando um HTML</h1>
			<p>Para começar a criar o seu site, é necessário, primeiro, que você tenha um ambiente adequado para trabalhar. Exitem diversos editores de textos, como o <a href="#">Notepad++</a>, o <a href="#">Sublime Text</a> e o <a href="#">Visual Studio</a>, por exemplo.</p>
			<p>O primeiro passo para criar um HTML é identificar que o seu arquivo é um HTML. Para isso, a primeira coisa que deve digitar em seu arquivo é <span>&lt;!DOCTYPE html&gt;</span>.
			<div class="img-div">
				<img src="_learn/_img/criar-1.png" class="img-fluid">
			</div>
			<p>Após isso, salve seu arquivo no formato <span>.html</span>. Para isso, na hora de salvar o seu arquivo <span>mude o tipo do arquivo para HTML</span>:</p>
			<div class="img-div">
				<img src="_learn/_img/criar-2.png" class="img-fluid">
			</div>
			<p>Depois de salvar seu arquivo é só continuar colocando as tags mais importantes para continuar seu HTML. Veja quais são essas tags a seguir:</p>

			<p>A primeira é a tag <span>&lt;html&gt;</span> <span>&lt;/html&gt;</span></p>

			<div class="img-div">
				<img src="_learn/_img/html.png" class="img-fluid">
			</div>

			<p>Dentro dessa tag é preciso colocar outras duas tags importantes. São elas:</p>

			<p>1. <span>&lt;head&gt;</span> <span>&lt;/head&gt;</span></p>

			<div class="img-div">
				<img src="_learn/_img/cabecalho.png" class="img-fluid">
			</div>
			
			<p>2. <span>&lt;body&gt;</span> <span>&lt;/body&gt;</span></p>

			<div class="img-div">
				<img src="_learn/_img/corpo.png" class="img-fluid">
			</div>
			
			<p>No cabeçalho do HTML (<span>&lt;head&gt;</span> <span>&lt;/head&gt;</span>) é possível configurar o título e os caracteres que vão aparecer na sua página.</p>

			<div class="img-div">
				<img src="_learn/_img/cabecalho-1.png" class="img-fluid">
			</div>

			<div class="img-div">
				<img src="_learn/_img/cabecalho-2.png" class="img-fluid">
			</div>

			<p>O corpo do HTML (<span>&lt;body&gt;</span> <span>&lt;/body&gt;</span>) é o mais importante, pois é nessa parte do HTML que você vai colocar as tags que deseja, para que tudo o que estiver escrito dentro delas apareça na tela.</p>
			
			<p>A primera tag que vamos apresentar é utilizada para definir o que será cabeçalho dentro do corpo do HTML: <span>&lt;header&gt;</span> <span>&lt;/header&gt;</span></p>

			<div class="img-div">
				<img src="_learn/_img/header-1.png" class="img-fluid">
			</div>

			<div class="img-div">
				<img src="_learn/_img/header-2.png" class="img-fluid">
			</div>

			<p>Dentro dela você pode utilizar outras tags, como a tag exemplo na imagem: <span>&lt;h1&gt;</span> <span>&lt;/h1&gt;</span>, usada para destacar um título. O número que acompanha o <span>h</span> pode variar de <span>1</span> a <span>6</span>.</p>

			<p>A segunda é a tag <span>&lt;footer&gt;</span> <span>&lt;/footer&gt;</span>, ela define o rodapé do corpo do HTML.</p>

			<div class="img-div">
				<img src="_learn/_img/footer-1.png" class="img-fluid">
			</div>

			<div class="img-div">
				<img src="_learn/_img/footer-2.png" class="img-fluid">
			</div>

			<p>Outra tag que vamos apresentar é utilizada para definir um parágrafo dentro do corpo do HTML: <span>&lt;p&gt;</span> <span>&lt;/p&gt;</span></p>

			<div class="img-div">
				<img src="_learn/_img/paragrafo-1.png" class="img-fluid">
			</div>

			<div class="img-div">
				<img src="_learn/_img/paragrafo-2.png" class="img-fluid">
			</div>

			<p>Dentro dessa tag você pode escrever o que quiser. Nela também é possível colocar atributos, observe a imagem a seguir:</p>

			<div class="img-div">
				<img src="_learn/_img/paragrafo-3.png" class="img-fluid">
			</div>

			<p>O atributo <span>class</span> serve para auxiliar na hora de colocar CSS em sua página HTML e você pode dar o nome que quiser para ele, no caso da imagem o nome é <span>paragrafo</span> (tente sempre dar nomes sem utilizar acento).

			<p>ATENÇÃO: Esse atributo pode ser utilizado em qualquer tag.</p>
			
			<p>É possível também colocar comentários dentro do HTML, para que você lembre do que fez naquele lugar e só você pode ver! Utilize <span>&lt;!--</span> <span>--&gt;</span></p>
		
			<div class="img-div">
				<img src="_learn/_img/comentario-1.png" class="img-fluid">
			</div>

			<p>Outras tags utilizadas:</p>
			
			<ul>
				<li>
					<p><span>&lt;ol&gt;</span> <span>&lt;/ol&gt;</span>: para criar uma lista ordenada.</p>
					<div class="img-div">
						<img src="_learn/_img/lista-1.png" class="img-fluid">
					</div>
					<div class="img-div">
						<img src="_learn/_img/lista-2.png" class="img-fluid">
					</div>
					<p>Para separar os itens é necessário utilizar a tag <span>&lt;li&gt;</span> <span>&lt;/li&gt;</span>.</p>
				</li>
				<li>
					<p><span>&lt;ul&gt;</span> <span>&lt;/ul&gt;</span>: para criar uma lista não ordenada.</p>
					<div class="img-div">
						<img src="_learn/_img/lista-3.png" class="img-fluid">
					</div>
					<div class="img-div">
						<img src="_learn/_img/lista-4.png" class="img-fluid">
					</div>
					<p>Para separar os itens é necessário utilizar a tag <span>&lt;li&gt;</span> <span>&lt;/li&gt;</span>.</p>
				</li>
				<li>
					<p><span>&lt;a&gt;</span> <span>&lt;/a&gt;</span>: para criar um link.</p>
					<div class="img-div">
						<img src="_learn/_img/link-1.png" class="img-fluid">
					</div>
					<div class="img-div">
						<img src="_learn/_img/link-2.png" class="img-fluid">
					</div>
					<p>Nessa tag é preciso usar o atributo <span>href</span> para colocar a URL do link que desejar.</p>
				</li>
				<li>
					<p><span>&lt;table&gt;</span> <span>&lt;/table&gt;</span>: para criar uma tabela.</p>
					<div class="img-div">
						<img src="_learn/_img/tabela-1.png" class="img-fluid">
					</div>
					<div class="img-div">
						<img src="_learn/_img/tabela-2.png" class="img-fluid">
					</div>
					<p>Na tabela é importante usar outras duas tags. A primeira é a <span>&lt;tr&gt;</span> <span>&lt;/tr&gt;</span>, que indica a quantidade de linhas que sua tabela vai ter. Dentro dela é colocada a tag <span>&lt;td&gt;</span> <span>&lt;/td&gt;</span> que vai definir em quantas células cada linha será dividida.</p>
				</li>
			</ul>

		</div>
	</div>

</div>