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
<ul>
	<li><h4>Classe - Atributos</h4></li>
	<p>
		No RPG de D&D todo o personagem possui 6 habilidades base. Para saber o valor inicial destas habilidades se faz necess�rio a rolagem de 4 dados de 6 faces descartando o menor n�mero.
	</p>
	<p>
		Desta forma se faz necess�rio um algoritimo que simule a rolagem deste 6 dados descartando o menor n�mero entre eles.
	</p>
	<p>
		A classe atributos cont�m apenas um �nico atributo de classe [$atributos], este ser� um array que manter� um refer�ncia para cada uma das 6 habilidades base.
	</p>
	<p>
		<ul>
			<li>function __set($propriedade, $valor)</li>
			<p>
			Esta classe possui o metodo m�gico __set($propiedade, $valor) que vai interceptar uma atribui��o a uma propieade inexistente da classe Atributos. Ao identificar que o atributo n�o existe, ele vai pegar este nome. Ex: $objeto->for�a como a propiedade forca n�o existe, ela ser� adicionada no array $atrubutos na posi��o indexada chamada $valor.
			</p>
			
			<li>function __get($propriedade)</li>
			<p>Quando voc� acessar uma propriedade que n�o existe no objeto, ela ser� interceptada pelo m�todo __get() que far� uma busca no array propiedades e retornar� o suposto atributo caso ele exista na lista.</p>
		
			<li>function dgd_habilidades()</li>	
			<p>Este m�todo � respons�vel por gerar as rolagens de dado. Ele simula a rolagem de 6 dados de 6 faces, esta rolagem vai se repetir caso o resultado seja menor do que 8.</p>
			<p>Ap�s armazenar 4 valores aleatorios entre 1 a 6 am cada vari�vel, haver� um identifica��o para saber qual dos quatros valores � o menor. Uma vez que tenha identificado o menor valor, o mesmo ser� subtraido do valor total dos n�meros sorteados.</p>

			<li>function dgd_modificador($attr)</li>
			<p>Esta fun��o vai gerar um modificador de habilidade. No RPG de D&D toda habilidade possui um modificador e um modificador � um valor equivalente a ($att-10)/2 arredondado para cima.</p>

			<li>function dgd_bonus_adicional($nivel)</li>
			<p>Este m�todo vai gerar um ponto de habilidade para somar aos atributos a cada 4 $niveis.</p>
		</ul>	
	</p>
	<li><h4>Classe - Per�cias</h4></li>	
	<li><h4>Classe - Testes de Resistencia</h4></li>
	<p>
		Esta classe vai representar os testes de resist�ncia de um personagem de D&D. O valor base de um teste de resist�ncia vai depender do n�vel do personagem. Existem dois tipos de testes que s�o os ruins e os bons. Abaixo a explica��o da implementa��o de cada um.

		<ul>
			<li>function dg_teste_bom($nivel)</li>
			<p>Este teste � simples por ele ser� 2 no n�vel 1 e a cada dois n�veis de personagem ele aumenta 2.</p>

			<li>function dg_teste_ruim($nivel)</li>
			<p>Este teste � mais complicado um pouquinho. At� o segundo n�vel de personagem o seu b�nus est� em zero. Depois disso pelos pr�ximos 3 n�veis ele vai aumentando de um em um. Ex: Lv 3,4,5 ser� +1, Lv 6,7,8 ser� +2 e assim por diante.</p>
			<p>Seu algoritmo primeiro identifica se o n�vel � menor do que 2, se for o seu b�nus ser� 0. Do contr�rio verifica se o n�vel � menor do que 0 pois ser for nada dever� ser feito. Entretanto se n�o for menor do que 0, percorreremos o n�vel do personagem partindo do 0 e verificamos quando o �ndice for 2 (no caso 2 � como se fosse 3 por come�ar em 0).
			</p> 
			<p>se for 2 incrementaremos uma vari�vel que representa a resist�ncia ruin em 1, esta variavel come�a em zero e vai aumentando. Ap�s isso zeramos o �ndice para come�ar a percorre-la novamente e diminuimos o n�vel em 3. Por conta disso o loop ser� menor a cada vez que a vari�vel de resist�ncia ruim for incrementada. Quando o �ndice n�o conseguir mais ser iguel a 2 o loop terminar� e teremos armazenado na vari�vel $resistencia_ruin o valor total de um teste de resist�ncia conforme o n�vel informado.</p>
		</ul>
	</p>

	<li><h4>Classe - Per�cias</h4></li>	
	<li><h4>Classe - Testes de Resistencia</h4></li>
</ul>
	
<p></p>

<h2><a name="basic-class">Classe Classes B�sicas de D&D</a></h2>
<ul>
	<li><h4>Classe - classes</h4></li>
	<p>
		A classe Classes representa todas as classe b�sicas do jogo de RPG D&D. Ela prover todos os m�todos base que uma classe deve ter. Por conta disso ela n�o � uma classe concreta e n�o pode ser instanciada, por isso ela � declarada como abstrata. Al�m disso ela implementa a interface IClasses, esta interface estabelece todos os m�todos comuns que as classes b�sicas devem ter inplementado.

		<ul>
			<li>function __construct()</li>
			<p>O m�todo construtor vai chamar todos os outros m�todos estabelecidos na interface de sua classe pai.</p>

			<li>function dgd_pts_pericias()</li>
			<p>No RPG D&D cada classe possui um dado de vida em espec�fico, o DV do b�rbaro � 12. Este m�todo apenas inicializa o atributo de dados de vida em 12.</p>

			<li>function dgd_talentos()</li>
			<p>Cada classe possui a sua lista de talentos. este m�todo apenas inicializa uma lista (array) com os talentos previsto na classe de B�baro.</p>

			<li>function dgd_kit()</li>
			<p>Este m�todo visa inicializa uma lista contento todos os itens que um barbaro carrega consigo.</p>

			<li>function dgd_pericias()</li>
			<p>Aqui ser� preenchido uma lista (array) com refer�ncia a todas as per�cias que um barbaro pode ter.</p>
			<p>E tamb�m uma outra lista de per�cias que n�o fazer parte da lista do barbaro mas que mesmo assim ele poder� ter com penalidades.</p>

			<li>function dgd_armas()</li>
			<p>Este m�todo ser� respons�vel por inicializar as poss�veis armas que um b�rbaro vai estar usando.</p>

			<li>function dgd_armaduras()</li>
			<p>Este m�todo ser� respons�vel por inicializar as poss�veis armaduras que um b�rbaro vai estar usando.</p>

			<li>function dgd_testes_de_resistencia($nivel)</li>
			<p>Este m�todo vai inicializar os tr�s atributos que resprentam os testes de risist�ncia de um personagem de D&D. Para isso ele vai precisar instanciar um objeto Testes_de_resistencia();. Essa instancia��o j� foi feita no m�todo construtor e sua refer�ncia armazenada no atributo teste_de_resistencia. Como temos um objeto em teste_de_resistencia, basta fazer a chamada de cada m�todo da classe Testes_de_resistencia() atrav�s dos comando:
			<br>
			$this->fortitude = $this->teste_de_resistencia->dg_teste_bom($nivel);
			O c�digo acima inicializa a atributo fortitude chamando um teste de resist�ncia bom. 
			$this->reflexos  = $this->teste_de_resistencia->dg_teste_ruim($nivel);
			O c�digo acima faz a mesma coisa do anterior, por�m ele armazena no atributo reflexos e al�m disso est� chamando o m�todo de teste de resist�ncia ruin.
			</p>	
		</ul>
	</p>	
	<p>
		Esta classe possui as m�todos m�gicos descrito em outras classes acima. A ideia � a mesma, intercepetar atribui��o e retorno de atributos inexistentes para coloca-lo no array $atributos que � a �nica propiedade da classe.
	</p>
	<li><h4>Classe - Barbaro</h4></li>	
	<p>
		Estas classes mais espec�ficas v�o implementar os m�todos estabelecidos na interface de sua classe abstrata pai (Classes). Aqui casa classe vai definir como funcionar� o comportamento de seus m�todos. Embora as classes sejam diferentes, elas implementam os mesmos m�todos, por�m de maneiras distintas (viva o polimosfismo! rsrs)
	</p>

	<li><h4>Classe - Barbaro</h4></li>	
	<li><h4>Classe - Druida</h4></li>
	<li><h4>Classe - Ranger</h4></li>	
	<li><h4>Classe - Monge</h4></li>
	<li><h4>Classe - Cl�rigo</h4></li>	
	<li><h4>Classe - Paladino</h4></li>
	<li><h4>Classe - Mago</h4></li>	
	<li><h4>Classe - Feiticeiro</h4></li>
	<li><h4>Classe - Ladino</h4></li>	
	<li><h4>Classe - Bardo</h4></li>
</ul>
<p></p>

<h2><a name="character">Classe Personagens</a></h2>

<p>
	Esta classe vai estabelecer todas as caracter�sticas a forma do personagem e aparencia e o seu n�vel de personagem.
</p>

<p>
	Esta classe possui as m�todos m�gicos descrito em outras classes acima. A ideia � a mesma, intercepetar atribui��o e retorno de atributos inexistentes para coloca-lo no array $atributos que � a �nica propiedade da classe.
</p>

<p>
	<ul>
		<li>public function dgd_nivel($nivel = null)</li>
		<p>Gera um n�mero aleat�rio entre 1 a 99, se o parametro for informado, o n�vel m�ximo do personagem ser� o valor do par�metro.</p>

		<li>public function dgd_nome()</li>
		<p>Gera um nome para o personagem. Este m�todo retorna um elemento de um array de forma sorteada. Esta array cont�m todoas os nomes dispon�veis.</p>

		<li>public function dgd_sexo()</li>
		<p>Sorteia entre duas op��es (masculino e feminino) o sexo do personagem.</p>

		<h4>Todos os m�toso abaixo visam inicializar um atributo da classe Personagem. Este atributo ser� o retorno do sorteio, ou seja o intem escolhido aleat�riamnete atrav�s da lista oferecida pelo m�todo.</h4>
		<li>public function dgd_cor_do_cabelo()</li>
		<p>Sorteia uma cor de cabelo para o personagem atrav�s de um array.</p>

		<li>public function dgd_estilo_do_cabelo($sexo)</li>
		<p>Define qual ser� o estilo de cabelo do personagem, Ex: ra�a fare, com granja, emo etc. Existem estilos femininos e masculinos e por isso se faz necess�rio o uso do parametro para a tomada de decis�o. Conforme os m�todos anteriores a escolha de forma aleat�ria � operada sobre um array com todas as op��es dispon�veis.</p>

		<li>public function dgd_estilo_do_cabelo_masculino()</li>
		<p>Este m�todo armazena a lista de lista de estilos de cabelo masculinos.</p>

		<li>public function dgd_estilo_do_cabelo_feminino()</li>
		<p>Este m�todo armazena a lista de lista de estilos de cabelo femininos.</p>

		<li>public function dgd_cor_dos_olhos()</li>
		<p>Escolhe de forma aleat�ria sobre uma lista de tipos de olhos para o seu personagem.</p>

		<li>public function dgd_cor_da_pele()</li>
		<p>Vai operar tamb�m sobre uma lista de nomes com cores de pelo e retornar� um item da lista de forma aleat�ria.</p>

		<li>public function dgd_estilo_do_nariz()</li>
		<p>Escolhe de forma aleat�ria sobre uma lista de tipos nariz para o seu personagem.</p>

		<li>public function dgd_estilo_da_boca()</li>
		<p>Escolhe de forma aleat�ria sobre uma lista de tipos bocas para o seu personagem.</p>

		<li>public function dgd_estilo_da_sobrancelha()</li>
		<p>Escolhe de forma aleat�ria sobre uma lista de tipos sobrancelhas para o seu personagem.</p>

		<li>public function dgd_estilo_do_rosto()</li>
		<p>Vai retornar de forma aleat�ria um estilo de rosto conforme o array rosto oferece.</p>

		<li>public function dgd_estilo_de_olho()</li>
		<p>Este m�todo armazena a lista de lista de estilos de olhos e retorna um elemento da lista de forma aleat�ria.</p>

		<li>public function dgd_estilo_de_queixo()</li>
		<p>Vai retornar dentro de umarray com o nome de v�rios tipos de quixo, apenas um elemento do array.</p>

		<li>public function dgd_estilo_de_testa()</li>
		<p>Retorna um estilo de testa sorteado na lista de testas dispon�veis no m�todo.</p>

	</ul>	

</p>

<p></p>


<h2><a name="races">Classe Ra�as</a></h2>
<ul>
	<li><h4>Classe - Humano</h4></li>
	<li><h4>Classe - Orc</h4></li>	
	<li><h4>Classe - An�o</h4></li>
	<li><h4>Classe - Elfo</h4></li>	
	<li><h4>Classe - Meio-Elfo</h4></li>
	<li><h4>Classe - Halfing</h4></li>	
</ul>
	
<p></p>

<h2><a name="test">Classe de Teste</a></h2>
<ul>
	<li><h4>Classe - Test</h4></li>
	<li><h4>Classe - Teste Barbaro</h4></li>	
	<li><h4>Classe - Teste Personagem</h4></li>
	<li><h4>Classe - Teste Ra�as</h4></li>	
</ul>
<p></p>

