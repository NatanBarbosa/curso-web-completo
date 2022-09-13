<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body style="width: 80%; margin: 20px auto;">
	<?php

		$registros = array(
			//conteudo de cada noticia armazenada em um array cada uma com seu indice
			array('titulo' => 'Titulo noticia 1', 'conteudo' => 'Conteudo da notícia 1', 'link' => 'https://www.google.com'),
			array('titulo' => 'Titulo noticia 2', 'conteudo' => 'Conteudo da notícia 2', 'link' => 'https://www.youtube.com'),
			array('titulo' => 'Titulo noticia 3', 'conteudo' => 'Conteudo da notícia 3', 'link' => 'https://www.gmail.com'),
			array('titulo' => 'Titulo noticia 4', 'conteudo' => 'Conteudo da notícia 4', 'link' => 'https://www.bootstrap.com')
		);

		
		for($i = 0; $i < count($registros); $i++){ 
			//count -> funcao para ver quantos elementos tem(quantas noticias)
			//assim elas serão exibidas de acordo com seu índice
			echo '<section class="card">';
				echo '<h3 class="card-header" style="text-align:center;">' . $registros[$i]['titulo'] . '</h3>';

				echo '<div class="card-body">';
					echo '<p class="card-text">' . $registros[$i]['conteudo'] . '</p>';

					echo '<a class="btn btn-info" href="' . $registros[$i]['link'] . '"> Leia mais... </a>';
				echo '</div>';
			echo '</section>';
			echo '<hr>';
		}

	?>
	

</body>
</html>