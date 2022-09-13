<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Curso PHP</title>
	</head>
	<body> 
		
		<?php
			
			$opcao = 4;
			$personagem;

			echo 'choose your character';
			switch($opcao){
				case 1: $personagem = 'Pelé negro';
					break;
				case 2: $personagem = 'Neymar';
					break;
				case 3: $personagem = 'Lionel messenger';
					break;
				case 4: $personagem = 'Cristano ronardo';
					break;
				default: $personagem = 'personagem inexistente';
			}

			echo '<br>'. $personagem;

		?>

	</body>
</html>