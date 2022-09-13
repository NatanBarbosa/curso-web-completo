<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body style="width: 80%; margin: 20px auto;">
	<section class="card">
		<h2 class="card-header">Exercício</h2>
		<div class="card-body">
			<?php

				$numeros_sorteados = array();
				$num_aleatorio = 0;

				for($i = 0; $i < 6; $i++){
					#pegando um numero aleatório
					$num_aleatorio = rand(1, 6);

					while(in_array($num_aleatorio, $numeros_sorteados)){
						#substituir valor que será adicionado no array caaso ele já exista no mesmo
						$num_aleatorio = rand(1, 6);
					}
					

					#adicionando o número aleatório no array
					$numeros_sorteados[] = $num_aleatorio;
				}

				foreach ($numeros_sorteados as $numeros) {
					echo "Número → <strong>$numeros</strong> <br>";
				}
			?>
			<small>Eles nunca sairão repetidos</small>
			<br>
			<button class="btn btn-primary btn-large" onclick="reload()"> Novos números</button>
		</div>
		
	</section>	
	
	<script>
		function reload(){
			location.reload();
		}
	</script>

</body>
</html>