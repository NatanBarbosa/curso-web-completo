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
		$query = 'SELECT * FROM tb_usuarios';

		$stmt = $conexao->query($query);
		//retorn um PDOStatment -> essa variavel vira um objeto com métodos úteis
		$lista = $stmt->fetchAll(PDO::FETCH_OBJ); 
		//retorna todos os registros de uma consulta (select) em forma de array
		/*
		Parâmetros desse método:
		- PDO::FETCH_ASSOC -> traz só os indices associativos -> echo $lista[0]['email']
		- PDO::FETCH_NUM -> traz só os índices numéricos
		- PDO::FETCH_BOTH -> traz os dois tipos de índices
		- PDO::FETCH_OBJ -> Retorna um array de objetos -> echo $lista[0]->email;
		*/
		echo '<pre>';
		print_r($lista);
		echo '</pre>';

	} catch(PDOException $e){
		echo 'Erro: ' . $e->getCode() . '<br> Mensagem: ' . $e->getMessage();
	}