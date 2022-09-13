<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Curso PHP</title>
	</head>
	<body>
		<!-- Fora do html ele fica com seus comentários -->
		
		<?php
			#Operadores condicionais/de comparação
			//== -> 2==2
	        //=== -> são iguais e do mesmo tipo?
	        //!= ou <> -> 'x' != 'y' ou 5 <> 6 (5 é diferente de 6?)
	        //!== -> são diferentes e de tipos diferentes?
	        // < -> 2 < 18  2 é menor que 18?

			#Operadores lógicos
	        /*
			&& -> verdadeiro se todos resultados das expressões forem verdadeiros
			|| -> verdadeiro se ao menos um dos resultados das expressões forem verdadeiros
			XOR -> verdadeiro se uma das expressões forem verdadeira e a outra falsa
			! -> inverte o resultado retornado pela expressão (true = false e false = true)

			() -> estabelecer precedência
	        */
			if((22 == 22 && 3==3) || 5 != 5){
				echo 'true';
			}else{
				echo 'false';
			}
		?>

	</body>
</html>