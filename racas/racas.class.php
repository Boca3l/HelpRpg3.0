<?php
/*
 * Class Racas
 * CLasse respons�vel por definira a ra�a do personagem 
 * e as caracter�sticas que esta ra�a possui
 * @author Mackon Rangel
 * @date 09/05/2015
 */

class Racas implements IRacas{

	public $atributos;

	function __construct(){

	}

	function __set($propriedade, $valor){
		if($propriedade):
			$this->atributos[$propriedade] = $valor;
		else:
			echo 'Parametro n�o Informado.';
		endif;
	}

	function __get($propriedade){
		if($propriedade):
			return $this->atributos[$propriedade];
		else:
			echo 'Parametro n�o Informado.';
		endif;
	}
}
?>