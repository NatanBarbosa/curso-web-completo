<?php
	session_start();
	if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] == 'NAO'){
		//se o valor da session(definida no valida_login.php) não existir ou for diferente de 'SIM' o usuário será redirecionado para página de login
		header('Location: index.php?login=negado');
	}
?>