<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Curso PHP</title>
	</head>
	<body> 
		
	<?php
			
		$num1 = 25;
		$num2 = 5;
		$operador = 'incremento';

		switch($operador){
			case 'soma':
				echo "A $operador entre $num1 e $num2 é ".($num1+$num2);
				break;
			case 'subtração':
				echo "A $operador entre $num1 e $num2 é ".($num1-$num2);
				break;
			case 'multiplicação':
				echo "A $operador entre $num1 e $num2 é ".($num1*$num2);
				break;
			case 'divisão':
				echo "A $operador entre $num1 e $num2 é ".($num1/$num2);
				break;
			case 'resto da divisão':
				echo "O $operador entre $num1 e $num2 é ".($num1%$num2);
				break;
			default:
				echo 'Operação inexistente';
		}

	?>

	</body>
</html>