<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<?php

		$lista_coisas = array();
		$lista_coisas['frutas'] = array(1 => 'banana', 2 => 'maçã', 3=> 'morango', 4 => 'uva'); //atribui array para o índice de um array
		$lista_coisas['pessoas'] = [1 => 'José', 2 => 'João', 3 => 'Maria'];

		echo '<pre>';
			echo print_r($lista_coisas);
		echo '</pre>';
		echo $lista_coisas['frutas'][3] . '<br>' . $lista_coisas['pessoas'][1]; //passando a cordenada(combinação de chaves)


	?>
	

</body>
</html>