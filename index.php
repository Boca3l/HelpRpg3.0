<link rel="stylesheet" media="screen" href="css/index.css" />
<?php
if(file_exists('init.php')):
	require 'init.php';
else:
	echo 'Arquivo init.php n�o encontrado.';
endif;

$teste_personagem = new Teste_personagem();
?>