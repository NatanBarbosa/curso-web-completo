<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body> 
		
	<?php

	#Função void
	function exibirBoasVindas(){
		echo 'Bem vindo ao curso de php! <br>';
	}

	exibirBoasVindas();
	exibirBoasVindas();
	exibirBoasVindas();


	#Função com retorno
	function calcularAreaTerreno($largura, $comprimento){
		$area = $largura * $comprimento;

		return $area;
	}

	$result = calcularAreaTerreno(5,25); //atribui retorno à variável
	echo $result;
	
	echo '<br>';

	echo calcularAreaTerreno(15,55);
	echo '<br>';
	echo calcularAreaTerreno(50,120);
	echo '<br>';

	?>

</body>
</html>