<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Curso PHP</title>
	</head>
	<body>
		<!-- Fora do html ele fica com seus comentários -->
		
		<?php
			
			$nome = 'Maria';
			$cor = 'azul';
			$idade = 50;
			$gosto = 'andar de cavalo';

			//Operador .
			echo 'Ola '. $nome .' , vi que sua preferida é '  .$cor. ', estou vendoo também que você possui ' .$idade. ' anos, e que gosta de '.$gosto;

			echo '<br>';

			//aspas duplas(como se fosse o template string do javascript)
			echo "Olá $nome, vi que sua preferida é $cor, estou vendo também que você possui $idade anos, e que gosta de $gosto";

			/*
			Aspas simples: Usada apenas para strings
			Aspas duplas: usada para strings que concatenam variaveis
			*/
		?>

	</body>
</html>