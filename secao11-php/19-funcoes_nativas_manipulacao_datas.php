<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<?php

	#recuperação da data atual
	echo date('d').'<br>';

	//recuperar vários valores de datas
	echo date('d/m/Y H:i').'<br>'; //aqui pode ser usado qualquer sequência e sepaaração que quiser
	echo date('D/M → G:i:s').'<br>';
	echo '<a href="https://www.php.net/manual/pt_BR/function.date">Mais sobre a função date</a>';

	echo '<hr>';

	#recuperar timezone
	echo 'Timezone antes: ' . date_default_timezone_get() . '<br>'; //pode acontecer de aparecer o timezone errado

	#modificar timezone
	date_default_timezone_set('Europe/Berlin') . '<br>';
	echo 'data atual com timezone modificado <br>' . date('d/m/Y H:i').'<br> No timezone de '. date_default_timezone_get() . '<br>' ;

	echo '<a href="https://www.php.net/manual/en/timezones.php">Timezones suportadas para date_default_timezone_set</a>';

	echo '<hr><br>';

	#calculo de datas
	$data_inicial = '2018-04-24';//para manipular datas elas tem q estar no padrão americano ano/mes/dia
	$data_final = '2018-05-15';

	//qnts dias existem entre essas datas?

	//converter para timestamp
	//01/01/1970 -> base para calcular a quantidade de segundos entre essa data e $data_inicial

	$time_inicial = strtotime($data_inicial);
	$time_final = strtotime($data_final); 
	echo $data_inicial . ' → ' . $time_inicial . '<br>'; //segundos entre 01/01/1970 e 2018-04-24
	echo $data_final . ' → ' . $time_final; //segundos entre 01/01/1970 e 2018-05-15

	$diferenca_times = $time_final - $time_inicial; //time final = data mais distante do timestamp menos a data menos distante do timestamp
	echo '<br> diferença de segundos entre datas: ' . $diferenca_times . '<br>';

	$segundos_em_um_dia = 24 * 60 * 60; //um dia tem 24horas que tem 60 minutos que tem 60 segundos
	echo "em um dia tem $segundos_em_um_dia segundos";

	$diferenca_dias = $diferenca_times / $segundos_em_um_dia;
	echo "<br>Entre $data_inicial e $data_final há $diferenca_dias dias";


	?>
	

</body>
</html>