<link rel="stylesheet" media="screen" href="css/index.css" />

<script src="js/index.js"></script>

 <script src="js/index.js"></script>

<?php
if(file_exists('init.php')):
	require 'init.php';
	require 'class/teste_personagem.class.php';
	$teste_personagem = new Teste_personagem();
else:
	echo 'Arquivo init.php n�o encontrado.';
endif;
?>