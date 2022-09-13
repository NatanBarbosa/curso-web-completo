<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Curso PHP</title>
	</head>
	<body>
		<!-- Fora do html ele fica com seus comentários -->
		
		<?php
			#Regras de definição
			/*inicia pelo sinal de sifrão 
			tem aquelas regras pra nome de sempre
			pode ou não atribuir um valor*/

			#String
			$nome = 'Nate Rock';

			#int
			$idade = 19;

			#float
			$peso = 82.5;

			#boolean
			$fumante_sn = true; //true retorna 1 na impressão | false não retorna nada na impressão

			//...lógicaa

			$idade = '30'; //sobrepor informações de qualquer tipo

		?>

		<h1>Ficha cadastral</h1>
		<br>
		<!-- Tag de impressão no meio da página. Serve excluisvamente pra imprimir valores, então não precisa do echo/print -->
		<p>Nome: <?= $nome; ?> </p> 
		<p>Idade: <?= $idade; ?> </p> 
		<p>Peso: <?= $peso; ?> </p> 
		<p>Fumando?: <?= $fumante_sn; ?> </p> 
	</body>
</html>