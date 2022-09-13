<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Curso PHP</title>
	</head>
	<body> 
		
		<?php
			$idade = 18;
			$peso = 60;

			$result = ($idade >= 16 && $idade <= 69) && $peso >= 50 ? 'Atende aos requisitos' : 'Não atende aos requisitos';

			echo $result;
		?>

	</body>
</html>