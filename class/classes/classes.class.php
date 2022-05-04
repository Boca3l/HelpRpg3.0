<?php
/*
 * Class Classes
 * CLasse respons�vel por definira a classe do personagem 
 * e as caracter�sticas que esta classe possui
 * @author Mackon Rangel
 * @date 12/07/2015
 */

 require "interface/iclasses.php";

abstract class Classes implements IClasses{
	
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

