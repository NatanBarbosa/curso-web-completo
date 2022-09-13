<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<?php

	#arrays sequenciais numéricos
	//$lista_frutas = array('Banana','Maçã','Morango','Uva', 'Abacate');
	$lista_frutas = ['Banana','Maçã','Morango','Uva', 'Abacate'];

	//inclusão de novos itens no array
	$lista_frutas[] = 'Abacaxi';

	//funções para debug -> mostra detalhes do array no documento
	echo '<pre>';
		var_dump($lista_frutas);
	echo '</pre>';
		echo '<br>';
	echo '<pre>';
		print_r($lista_frutas);
	echo '</pre>';

	//tag pre -> formata exibição dos arrays

	//recuperar um item específico do array
	echo $lista_frutas[4] . '<hr>';



	#arrays associativos
	/*$lista_pessoas = array(
		'a' => 'Jorge', 
		'animal' => 'Cavalo', 
		'muié' => 'Roberta', 
		'777' => 'Jonas sexto'
	);*/
	$lista_pessoas = [
		'a' => 'Jorge', 
		'animal' => 'Cavalo', 
		'muié' => 'Roberta', 
		'777' => 'Jonas sexto'
	];



	//inclusão de novo item
	$lista_pessoas['membro ovo'] = 'Carlos';

	//array('indice' => 'valor', ...)
	echo '<pre>';
		echo print_r($lista_pessoas);
	echo '</pre>';

	echo '<br>' . $lista_pessoas['777'];

	?>
	

</body>
</html>