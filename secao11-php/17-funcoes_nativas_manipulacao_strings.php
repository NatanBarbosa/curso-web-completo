<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body> 
		
	<?php

	$texto = 'curso Completo de PHP';

	echo "<h3>string to lower → strtolower('string')</h3>";
	echo $texto . '<br>';
	echo strtolower($texto);

	echo '<hr>';

	echo "<h3>string to upper → strtoupper('string')</h3>";
	echo $texto . '<br>';
	echo strtoupper($texto);

	echo '<hr>';

	echo "<h3>Uppercase first → ucfirst('string')</h3>";
	echo $texto . '<br>';
	echo ucfirst($texto);

	echo '<hr>';

	echo "<h3>string length(contar caracteres) → strlen('string')</h3>";
	echo $texto . '<br>';
	echo strlen($texto);

	echo '<hr>';

	echo "<h3>string replace(contar caracteres) → str_replace(cadeia de caracteres que vai ser substituida, por que ela vai ser substituida, 'string')</h3>";
	echo $texto . '<br>';
	echo str_replace('PHP','JavaScript',$texto);

	echo '<hr>';

	echo "<h3>Copiar uma determinada parte de um string</h3>";
	echo '<h4> substr(string, posição inicial, quantidade de caracteres que queremos contar apartir da posição inicial) </h4>';
	echo $texto . '<br>';
	//'curso Completo de PHP' -> posição se inicia do 0. ex: c=0 u=1 r=2 ... P=20
	echo substr($texto,1,4); //u=1 - urso = 4 caracteres

	?>

	<a href="https://www.w3schools.com/PHP/php_ref_string.asp">Mais funções para manipular strings</a>

</body>
</html>