<!DOCTYPE html>
<html lang="pt-br">
<link rel="stylesheet" media="screen" href="css/index.css" />
<meta charset="utf-8">

<script src="js/index.js"></script>

 <script src="js/index.js"></script>

<?php
header('Content-Type: text/html; charset=utf-8');

if(file_exists('init.php')):
	require 'init.php';
	require 'class/teste_personagem.class.php';
	$teste_personagem = new Teste_personagem();
else:
	echo 'Arquivo init.php n�o encontrado.';
endif;
?>