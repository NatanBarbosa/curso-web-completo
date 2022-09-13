<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body style="width: 80%; margin: 20px auto;">
	<?php

		$itens = array('sofa', 'mesa', 'cadeira', 'fogão', 'geladeira');

		echo '<pre>';
			print_r($itens);
		echo '</pre>';

		/*foreach($array as $indice => $variavel que vai receber o valor contido em cada um dos indices do nosso array){
			...
		}*/

		foreach ($itens as $i => $valor) {
			//$valor == $itens[i](em um laço)
			//tem a inteligência para percorrer todos os indices do array.
			echo $valor . ' na posição ' . $i ;

			if($valor == 'mesa'){
				echo ' <strong>COMPRE A MESA PORA</strong>';
			}

			echo "<br>";
		}

	?>
	

</body>
</html>