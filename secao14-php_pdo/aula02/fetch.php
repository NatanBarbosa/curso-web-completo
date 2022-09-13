<?php
	#preparando os parâmetros
	$dsn = 'mysql:host=localhost;dbname=bd_php_pdo';
	$user = 'root';
	$senha = '';

	#tratando exceções do PDO
	try{
		#iniciando conexão
		$conexao = new PDO($dsn, $user, $senha);

		#instrução MySql
		$query = 'SELECT * FROM tb_usuarios WHERE id=19';

		$stmt = $conexao->query($query);
		//retorn um PDOStatment -> essa variavel vira um objeto com métodos úteis
		$usuario = $stmt->fetch(PDO::FETCH_OBJ); 
		//retorna apenas um registro de uma consulta (select) em forma de objeto ou array

		echo '<pre>';
		print_r($usuario);
		echo '</pre>';

		echo $usuario->email;

	} catch(PDOException $e){
		echo 'Erro: ' . $e->getCode() . '<br> Mensagem: ' . $e->getMessage();
	}