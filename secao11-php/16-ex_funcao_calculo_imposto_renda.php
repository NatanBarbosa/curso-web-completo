<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body> 
	<h1>Calculo de imposto de renda</h1>
	<?php

	function calculoImpostoRenda($salario){
		if($salario <= 1903.98){
			$aliquota = 0;
			$representacao_aliquota = '0';
		} else if($salario <= 2826.65) {
			$aliquota = 0.075;
			$representacao_aliquota = '7.5%';
		} else if($salario <= 3751.05){
			$aliquota = 0.15;
			$representacao_aliquota = '15%';
		} else if($salario <= 4664.68){
			$aliquota = 0.225;
			$representacao_aliquota = '22.5%';
		} else{
			$aliquota = 0.275;
			$representacao_aliquota = '27.5%';
		}	
		
		$desconto_imposto = $salario * $aliquota;
		$salario_final = $salario - $desconto_imposto;
		
		echo "Sua aliquota será de $representacao_aliquota <br> O total descontado pelo imposto de renda foi de $desconto_imposto <br> Seu salário final é de R$ $salario_final";
	}

	calculoImpostoRenda(10000)

	

	?>

</body>
</html>