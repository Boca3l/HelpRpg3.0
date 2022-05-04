<?php
/*
 *Classe Barbaro
* Define os aspectos da classe babrbaro 
* conforme o livro de D&D. 
* @author Mackon Rangel
* @date 26/07/2015
*/
require "classes.class.php";
require "class/algoritmos/testes_de_resistencia.class.php";

class Barbaro extends Classes{
	
	function __construct(){
		$this->teste_de_resistencia = new Testes_de_resistencia();
	}
	
	
	/*
	 * dgd__pts_pericias()
	* Armazena no atributo dv o valor
	* que representa as dados de vida
	* da classe barbaro.
	*/
	
	function dgd_pts_pericias(){
		$this->dv = 4;
	}
	
	/*
	 * dgd_dv()
	 * Armazena no atributo dv o valor
	 * que representa as dados de vida 
	 * da classe barbaro.
	 */
	
	function dgd_dv(){
		$this->dv = 12;
	}
	
	/*
	 * dgd_talento()
	* Armazena no atributo talento a
	* lista completa de todos os talentos 
	* da classe barbaro.
	*/
	function dgd_talentos(){
		$this->talentos = array(	
							  "Movimento R�pido, analfabetismo, f�ria 1/dia",
							  "Esquiva sobrenatural",
							  "Sentir armadilhas +1",
				 			  "F�ria 2/dia",
							  "Esquiva sobrenatural aprimorada",
							  "Sentir armadilhas +2",
				 			  "Redu��o de dano 1/-",
							  "F�ria 3/dia",
							  "Sentir armadilhas +3",
							  "Redu��o de dano 2/-",
							  "F�ria maior",
							  "F�ria 4/dia, sentir armadilhas +4",
				 			  "Redu��o de dano 3/-",
							  "Vontade inabal�vel",
							  "Sentir armadilhas +5",
							  "Redu��o de dano 4/-, f�ria 5/dia",
				 			  "F�ria incans�vel",
							  "Sentir armadilhas +6",
							  "Redu��o de dano 5/-",
							  "F�ria poderosa, f�ria 6/dia"
						);
	}
	
	/*
	 *dgd_kit()
	* Armazena no atributo kit a lista 
	* de todos os objetos iniciais que 
	* um barbaro cerra consigo.
	*/
	function dgd_kit(){
	
	}
	
	function dgd_pericias(){
		$this->pericias_brb = 
				array(
						"Saltar (For)", 
						"Escalar (For)", 
						"Intimida��o (Car)",
						"Sobreviv�ncia (Sab)",
						"Nata��o (For)", 
						"Of�cios (Int)", 
						"Ouvir (Sab)", 
						"Cavalgar (Des)",
						"Adestrar Animais (Car)"
					);
		
		$this->pericias_nbrb = 
				array(
						"Observar (Sab)",
						"Profiss�o (Sab)",
						"Esconder-se (Des)",
						"Furtividade (Des)",
						"Abrir Fechaduras (Des)", 
						"Acrobacia (Des)", 
						"Arte da Fuga (Des)", 
						"Atua��o (Car)",
						"Avalia��o (Int)" ,
						"Blefar (Car)", 
						"Conhecimento (local) (Int)", 
						"Decifrar Escrita (Int)", 
						"Diplomacia (Car)",
						"Disfarces (Car)", 
						"Equil�brio (Des)",
						"Esconder-se (Des)", 
						"Falsifica��o (Int)", 
						"Furtividade (Des)",
						"Intimida��o (Car)", 
						"Observar (Sab)", 
						"Obter Informa��o (Car)", 
						"Operar Mecanismo (Int)", 
						"Prestidigita��o (Des)",
						"Procurar (Int)",  
						"Sentir Motiva��o (Sab)", 
						"Usar Cordas (Des)", 
						"Usar Instrumento M�gico (Car)"
					);
		
	}
	
	function dgd_armas(){
	
	}
	
	function dgd_armaduras(){
	
	}
	
	function dgd_testes_de_resistencia($nivel){
		$this->fortitude	= $this->teste_de_resistencia->dg_teste_bom($nivel);
		$this->reflexos 	= $this->teste_de_resistencia->dg_teste_ruim($nivel);
		$this->vontade 		= $this->teste_de_resistencia->dg_teste_ruim($nivel);
	}
}