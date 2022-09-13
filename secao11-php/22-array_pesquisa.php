<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<?php
		$lista_frutas = ['Banana','Maçã','Morango','Uva'];
		echo '<pre>';
			print_r($lista_frutas);
		echo '</pre>';

		#in_array() -> verificar se algo existe dentro do array -> true ou false

		$existe = in_array('Uva', $lista_frutas); //procupar maçã no array lista_frutas

		if($existe){ //true ou false
			echo 'A fruta procurada existe';
		} else{
			echo 'A fruta procurada não existe';
		}

		echo '<hr>';

		#array_search() -> retorna o índice do valor pesquisado caso ele exista
		$encontrou = array_search('Uva', $lista_frutas);
		//retorna null caso não encontre nada
		if($encontrou != null){
			echo 'encontrei a fruta ' . $lista_frutas[$encontrou] . ' na posição ' . $encontrou;
		} else {
			echo 'Não encontrei nenhuma fruta';
		}

		echo '<hr>';

		#array_search() e in_array() em arrays multidimensionais
		$lista_coisas = [
			'frutas' => $lista_frutas, //atrubuir um array ja pronto
			'pessoas' => ['João', 'Maria']
		];

		echo '<pre>';
			print_r($lista_coisas);
		echo '</pre>';

		echo in_array('Uva', $lista_coisas['frutas']);
	?>
	

</body>
</html>