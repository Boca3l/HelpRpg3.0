<?php
/*
 * Class Teste_personagem
 * CLasse de teste para cria��o de um personagem
 * @author Mackon Rangel
 * @date 09/05/2015
*/

class Teste_personagem{
	
	function __construct(){
		$this->main();
	}
	
	/*
	 * 	Metodo main()
	 * 	Metodo principal da classe Teste_personagem
	 * 	Testa a cria��o de um personagem
	 */
	
	public function main(){
		
		$tag = new Tags();
		
		$tag->div('id="contrainer"');
			$personagem = new Personagem();
			$personagem->dgd_nivel(20);
			$personagem->dgd_nome();
			
			echo 'Lv ' .$personagem->nivel;
			echo '<br />';
			echo 'Nome ' .$personagem->nome;
			
			$attr = new Atributos();
			$attr->forca = $attr->dgd_habilidades($personagem->nivel);
			$attr->destr = $attr->dgd_habilidades($personagem->nivel);
			$attr->const = $attr->dgd_habilidades($personagem->nivel);
			$attr->sabed = $attr->dgd_habilidades($personagem->nivel);
			$attr->caris = $attr->dgd_habilidades($personagem->nivel);
			$attr->intel = $attr->dgd_habilidades($personagem->nivel);
			
			echo '<br />';
			echo 'For�a: ' .$attr->forca.' '.$attr->dgd_modificador($attr->forca);
			echo '<br />';
			echo 'Destreza: ' .$attr->destr.' '.$attr->dgd_modificador($attr->destr);
			echo '<br />';
			echo 'Constituicao: ' .$attr->const.' '.$attr->dgd_modificador($attr->const);
			echo '<br />';
			echo 'Intelig�ncia: ' .$attr->intel.' '.$attr->dgd_modificador($attr->intel);
			echo '<br />';
			echo 'Sabedoria: ' .$attr->sabed.' '.$attr->dgd_modificador($attr->sabed);
			echo '<br />';
			echo 'Carisma: ' .$attr->caris.' '.$attr->dgd_modificador($attr->caris);
			echo '<br />';
			
		$tag->div;
	}
}
?>