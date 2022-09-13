<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<?php

	$num = 4.5;

	echo '<h3>ceil → arredonda um valor para cima</h3>';
	echo ceil($num).'<br>';

	echo '<h3>floor → arredondamento para baixo</h3>';
	echo floor($num).'<br>';

	echo '<h3>round → arredondamento matemáticamente correto</h3>';
	echo round($num).'<br>';

	echo '<h3>rand → gera um número aleatório entre num1 e num2(esse são parâmetros)</h3>';
	echo rand(10,20).'<br>';
	echo getrandmax(); //valor aleatório máximo (caso não seja passado parâmetro)

	echo '<h3>sqrt → retorna a raíz quadrada de um número</h3>';
	echo sqrt(145).'<br>';

	?>

	<hr>
	<a href="https://www.w3schools.com/PHP/php_ref_math.asp">Mais funções matemáticas</a>

</body>
</html>