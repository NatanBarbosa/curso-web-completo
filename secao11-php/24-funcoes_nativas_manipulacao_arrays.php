<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<?php
		
		#is_array($var) -> true ou false
		$array = array();
		$retorno = is_array($array);

		if($retorno){
			echo 'Sim, é um array';
		} else {
			echo 'Não, não é um array';
		}

		echo '<hr>';



		#array_keys($var) -> retorna um novo array com as chaves do array encaminhado por parâmetro
		$array2 = [1 => 'a', 7 => 'b', 18 => 'c'];

		echo '<pre>';
			print_r($array2);
		echo '</pre>';

		$chaves_array = array_keys($array2);
		echo '<pre>';
			print_r($chaves_array);
		echo '</pre>';

		echo '<hr>';



		#sort($var) -> ordena o array em sequência alfabética e rearranja os índices
		$array3 = array('Mouse', 'Fonte ATX', 'Zambonikkkk',  'Notebook', 'Teclado');
		echo '<pre> elementos não ordenados -> ';
			print_r($array3);
		echo '</pre>';

		sort($array3); //ordena o array e retorna true(caso ele tenha ordenado) ou false(caso tenha dado algum erro)

		echo '<pre> elementos ordenados -> ';
			print_r($array3);
		echo '</pre>';

		echo '<hr>';



		#asort($var) -> tbm ordena o array mas preserva os índices
		$array4 = array('Mouse', 'Fonte ATX', 'Zambonikkkk',  'Notebook', 'Teclado');
		echo '<pre> elementos não ordenados -> ';
			print_r($array4);
		echo '</pre>';

		asort($array4); //ordena o array e retorna true(caso ele tenha ordenado) ou false(caso tenha dado algum erro)

		echo '<pre> elementos ordenados -> ';
			print_r($array4);
		echo '</pre>';

		echo '<hr>';



		#count($var) -> conta a quantidade de elementos em um array
		$array5 = array('Mouse', 'Fonte ATX', 'Zambonikkkk',  'Notebook', 'Teclado');
		echo '<pre> ';
			print_r($array5);
			echo count($array5);
		echo '</pre>';

		echo '<hr>';



		#array_merge($var) -> funde vários arrays em 1 só
		$vetor1 = ['osx', 'windows'];
		$vetor2 = array('Ubuntu', 'Mint', 'Debian');
		$vetor3 = ['MacOs', 'Solaris'];

		$vetor_supremo = array_merge($vetor1, $vetor2, $vetor3);

		echo '<pre> ';
			print_r($vetor_supremo);
		echo '</pre>';

		echo '<hr>';



		#explode(delimitador, $string) -> divide uma string em um array
		$string = '26/04/2018'; //dividir esses três blocos de informação delimitados pela barra
		$array6 = explode('/', $string);

		echo '<pre> ';
			echo $string . '<br>';
			print_r($array6);
			echo "$array6[2] - $array6[1] - $array6[0]";
		echo '</pre>';

		echo '<hr>';



		#implode(delimitador, $array) -> junta os elementos de um Array em uma string
		$array7 = ['a', 'b' ,'x' , 'y']; //transformar esses valores em uma string separador por ,
		$string2 = implode(', ', $array7);

		echo $string2;









	?>
	

</body>
</html>