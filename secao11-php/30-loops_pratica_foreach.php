<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body style="width: 80%; margin: 20px auto;">
	<?php

		$funcionarios = [
			array('nome' => 'João', 'salario' => 2500, 'data_nascimento' => '06/03/1970'),
			array('nome' => 'Maria', 'salario' => 3000, 'data_nascimento' => '12/09/1988'),
			array('nome' => 'Júlia', 'salario' => 2200, 'data_nascimento' => '31/01/1998'),
		];
		echo '<pre>';
			print_r($funcionarios);
		echo '</pre>';

		foreach ($funcionarios as $i => $funcionario) {
			//cada funcionário é um array com nome e salário
			foreach ($funcionario as $x => $valor) {
				//cada valor de cada funcionario
				echo "$x - $valor <br>";
			}
			echo '<hr>';

		}
	?>
	

</body>
</html>