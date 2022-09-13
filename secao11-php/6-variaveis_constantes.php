<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Curso PHP</title>
	</head>
	<body>
		<!-- Fora do html ele fica com seus comentários -->
		
		<?php
			
			#Declarando variáveis constantes
			//define('NOME DA VAR', 'valor da var')
			define('BD_URL', 'endereco_bd_dev');
			define('BD_USUARIO', 'usuario_dev');
			define('BD_SENHA', 'senha_dev');

			#tentando mudar valor da constante
			// ...lógica
			//define('BD_URL', 'endereco_bd_prod');

			#Recuperando variaveis constantes
			//não usa $
			echo BD_URL . '<br>';
			echo BD_USUARIO . '<br>';
			echo BD_SENHA . '<br>';
		?>

	</body>
</html>