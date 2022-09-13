<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<?php
	$num = 0;
		//oepradores comparação / lógicos
	echo '--Inicio do loop-- <br>';
		while($num < 50){ 
			$num += 5;
			if($num == 30){
				//pula para proxima interação do laço
				continue; //nesse caso nõ exibe o número
			}

			if($num == 40){
				break; //interrompe o laço
			}

			echo $num . '<br>';	
		}
	echo '--Fim do loop--';

	?>
	

</body>
</html>