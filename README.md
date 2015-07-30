<h1>Gerador de personagens de D&D</h1>

<p>
Este c�digo permite criar uma ficha de RPG do sistema D20 de forma aleat�ria.
Baseado no n�vel do personagem, seus poderes s�o definidos. Isso ajuda aos jogadores a 
agilizarem no processo de cria��o de fichas.
</p>

<h2>Instala��o no windows</h2>
<p>
Fa�a o download do <a href="https://www.apachefriends.org/xampp-files/5.5.24/xampp-win32-5.5.24-0-VC11-installer.exe"> XAMP </a>. Feito o download, fa�a a instala��o na sua m�quina. 
</p>

<p>Uma vez instalado, voc� precisa acessar uma pasta chamada <em>xamp</em> que normalmente fica em <em> C:\xamp </em>. L� voc� vai entrar na pasta <em> htdocs </em>. Nesta pasta � onde vai ficar qualquer projeto que voc� venha a desenvolver com PHP.</p>

<p>
Fa�a o download deste projeto no bot�o <em> Download ZIP</em> do lado direito desta p�gina. Descompacte o arquivo e coloque o dentro da pasta 
<em> htdocs </em>.
</p>

<p>
Para acessar o projeto em funcionamento basta voc� acessar no seu navegador o endere�o <a href="http://127.0.0.1/"> http://127.0.0.1/ + o nome do projeto (pasta descompactada)</a>. Dessa forma voc� poder� ver o sistema rodando.
</p>


<h2>Documenta��o</h2>
<p>
Sempre na medida do poss�vel eu tentarei manter atualizado a documenta��o do c�digo que estou escrevendo.
</p>

<ul>
	<li><a href="#into">Introduc�o</a></li>
	<li><a href="#autoload">Classe Autoload</a></li>
	<li><a href="#tags">Classe Tags</a></li>
	<li><a href="#algoritm">Classe Algoritmons</a></li>
	<li><a href="#basic-class">Classe Classes B�sicas D&D</a></li>
	<li><a href="#character">Classe Personagem</a></li>	
	<li><a href="#races">Classe Ra�as</a></li>
	<li><a href="#test">Classe Testes</a></li>
</ul>


<h2><a name="into">Introdu��o</a></h2>
<p>
	A p�gina principal verifica se existe o arquivo de inicializacao chamado init.php. Se existir carrega por require e logo em seguida instancia um objeto de teste para se criar um peronagem, do contr�rio exibe uma mensagem de erro.
<h6>Arquivo Init.php</h6>
	Este arquivo verifica se existe a classe Autoload.class.php no diret�rio /class, se existir ser� instanciado um objeto autoload new Autoload(), do contr�rio ser� exibido uma mensagem de erro.
</p>


<h2><a name="autoload">Classe Autoload</a></h2>
<p>
	Esta classe possui em seu m�todo contrutor uma chamada ao m�todo m�gico _autoload($classname). Este m�todo intercepta qualquer instancia��o feita caso a classe n�o exista (nao tenha um caminho v�lido por require ainda). Dessa forma o m�todo _autoload($classname) vai aceitar por parametro o nome da classe que vem automaticamente. Com este nome o metodo vai fazer o seu devido tratamento. 
</p>

<p>
	Ele vai verificar se existe um arquivo de classe dentro da pasta /class, se houver este arquivo ele ser� requisitado no momenta de sua instancia��o. Com isso podemos dizer que toda vez que eu criar um objeto, Ex: $teste = new Teste(), automaticamente estar� sendo verificado se existe a classe Teste da pasta /class, se houver este arquivo ser� carregado atrav�s do reuire e a instancia��o ser� v�lida.
</p>

<h2><a name="tags">Classe Tags</a></h2>
<p>
	Esta classe prov� de m�todos magicos que permitem produzir uma tag HTML atrav�s de c�digo PHP. Al�m disso atrav�s dos metodos loadJs($js_path) e 
LoadCss(css_path), podemos carregar todos os arquivos que estiverem dentro da pasta especificada como par�metro destes metodos.
<h3>Seus metodos</h3>
<ul>
	<li>function __call($tag, $propiedades)</li>
	<p>
		Este metodo vai interceptar qualquer chamada de metodo que nao pertenca a esta classe. Ex: Ao chamar este metodo $tag->html(); o metodo __call()
		vai interceptar esta chamada e baseado no nome do metodo chamado, ele vai formar a tag de abertura. Sua sa�da ser� assim: <html>. Caso algum parametro
		seja passado como por exemplo $tag->html(class="teste" id="teste"); isso vai produzir a sa�da <html class="teste" id="teste"> assumindo que o seu �nico 
		parametro � apenas uma string.	
	</p>
	<li>function __get($tag)</li>
	<p>
		Este metodo � semelhante ao _call, por�m ele intercepta chamada de propriedades inexistentes ao objeto corrente. Ex: $tag->html; este codigo vai 
		produzia a sa�da </html> e com isso teremos a tag de fechamento. 
	</p>
	<li>function imprime($string, $modo=null)</li>
		<p>
			Este metodo serve para imprimir um valor qualquer na tela. Al�m da estring passada ele aceita um modo que nada mais � do que uma escolha entre 
			o termo <e>encode</e> ou <e>decode</e>.
		</p>
	<li>function loadCss($css_path,$import=false)</li>
		<p>
			Este metodo aceita por parametro um caminho v�lido onde ele possa encontrar todos os arquivos .css da pasta e possa carrega-lo via HTML conforme 
			um arquivo css externo � carregado. O import como true vai permitir adicionar o termo impot na tag respons�vel por chamar o arquivo css.
		</p>
		
	<li>function loadClass($class_path)</li>
		<p>
			Este metodo carrega todos os arquivos javascript via HTML desde que seja passado um caminho v�lido por paremetro.
		</p>
</ul>

</p>

<h2><a name="algoritm">Classe Algoritmos</a></h2>
<p></p>

<h2><a name="basic-class">Classe Classes B�sicas de D&D</a></h2>
<p></p>

<h2><a name="character">Classe Personagens</a></h2>
<p></p>

<h2><a name="races">Classe Ra�as</a></h2>
<p></p>

<h2><a name="test">Classe de Teste</a></h2>
<p></p>

