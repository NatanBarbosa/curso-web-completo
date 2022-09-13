<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Curso PHP</title>
	</head>
	<body> 
		
	<?php
			

		$valor = 15.95; //interget

		#casting de valores -> (int/interger || float/double/real || string) $variavel;
		//$valor2 = (float) $valor;
		//$valor2 = (string) $valor; 
		//$valor2 = (int) $valor; //float -> int (perde sua fração)
		$valor2 = (string) $valor;



		#função gettype($variavel) -> retorna seu tipo
		echo $valor . ' é do tipo: ' . gettype($valor);
		echo '<br>';
		echo $valor2 . ' é do tipo: ' . gettype($valor2);
		echo '<hr>';


		$value = false;

		//$value2 = (boolean) $value; //um var boolean retorna true(1) ou false(  ). ao converter uma string, se ela for válida será retornado true
		$value2 = (int) $value; //true -> int = 1 || false -> int = 0

		echo $value . ' é do tipo: ' . gettype($value);
		echo '<br>';
		echo $value2 . ' é do tipo: ' . gettype($value2);




	?>

	</body>
</html>