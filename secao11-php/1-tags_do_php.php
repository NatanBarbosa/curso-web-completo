<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Curso PHP</title>
	</head>
	<body>
		<!--O php pode em qlqr lugar do nosso codigo. Basta o arquivo ser um .php, pois assim o código php será interpretado antes do html-->

		<!-- Tag padrão do php -->
		<?php
			echo 'ultilizando a tag padrão';
		?>

		<br>

		<!-- tag de impressão -->
		<?=
			 'ultilizando a tag de impressão';
		?>

		<br>

		<!-- Tags curtas -->
		<!-- 
			Se não for habilitado ele não vai ser interpretado pelo php
			no arquivo php.ini(localizado nas configs do apache no xampp) procure a instrução short_open_tag=Off
			dps modifique essa instrução para short_open_tag=On
			daí reinicia o apache
		-->
		<?
			echo 'ultilizando a tag curta';
		?>

	</body>
</html>