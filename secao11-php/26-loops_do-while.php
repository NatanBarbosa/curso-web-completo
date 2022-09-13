<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<?php

		$x = 10;
	
		do{
			echo 'entrou';

			//continue;
			//break;
		} while($x < 9);
		//condição é validada apenas depois da exercução do bloco

		echo "<hr>";

		do{

			echo $x . '<br>';
			$x += 10;
		} while($x < 50);

	?>
	

</body>
</html>