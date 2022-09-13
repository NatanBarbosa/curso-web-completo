<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body> 
	<h3>Pós incremento</h3>
	<?php
			
		$a = 7;

		echo "O valor contido em a é $a <br>";
		echo 'O valor contido em a após o incremento é ' . $a++ . '<br>'; // $a++ -> só validao incremento na próxima linha
		echo 'O valor atualizado é ' . $a . '<br>';

	?>

	<h3>Pré incremento</h3>
	<?php
			
		$a = 7;

		echo "O valor contido em a é $a <br>";
		echo 'O valor contido em a após o incremento é ' . ++$a . '<br>'; // ++$a -> O incremento é validade antes da validação dessa linha

	?>

	<hr>

	<h3>Pós decremento</h3>
	<?php
			
		$a = 7;

		echo "O valor contido em a é $a <br>";
		echo 'O valor contido em a após o decremento é ' . $a-- . '<br>'; // $a++ -> só validao incremento na próxima linha
		echo 'O valor atualizado é ' . $a . '<br>';

	?>

	<h3>Pré decremento</h3>
	<?php
			
		$a = 7;

		echo "O valor contido em a é $a <br>";
		echo 'O valor contido em a após o decremento é ' . --$a . '<br>';

	?>

</body>
</html>