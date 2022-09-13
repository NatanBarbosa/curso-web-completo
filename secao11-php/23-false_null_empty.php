<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<?php
		
		#false -> variavel boobleana

		#null e empty -> valores especiais

		$funcionario1 = null;
		$funcionario2 = '';
		$funcionario3 = false;

		//valores null
		//is_null($var) -> retorna true ou false caso a variavel seja nula
		if(is_null($funcionario3)){
			echo "A variavel é null <br>";
		} else {
			echo "a variavel não é null <br>";
		}
		//um valor vazio ou false não pode ser considerado null

		//valores vazios
		if(empty($funcionario3)){
			echo "A variavel esta vazia <br>";
		} else {
			echo "a variavel não esta vazia <br>";
		}
		//um valor null e um valor false podem ser considerado vazio(empty)

	?>
	

</body>
</html>