<?php
	if(!empty($_POST['user']) && !empty($_POST['senha'])){
		try{
		$conec = new PDO('mysql:host=localhost;dbname=bd_php_pdo', 'root', '');

		$query = "SELECT * FROM tb_usuarios where email = :usuario AND senha = :senha";

		$stmt = $conec->prepare($query);
		//Esse método retorna um PDO Statement, mas ele não execulta a query até uma ordem de execução ($stmt->execute()), o contrário do método "query"

		$stmt->bindValue(':usuario', $_POST['user']);
		$stmt->bindValue(':senha', $_POST['senha']);
		/*
		bindvalue:
		é retornado pelo método prepare() e ele trata as sql injections
		- primeiro parâmetro: variavel de ligação pra usar lá na query
		- segundo parâmetro: o valor dessa variável em si (no caso é o nosso POST)
		- terceiro parâmetro: opcional, https://www.php.net/manual/en/pdostatement.bindvalue
		Com isso você substitui o valor do POST direto de lá e coloca apenas a variável de ligação
		*/

		$stmt->execute();
		$user = $stmt->fetchAll(PDO::FETCH_OBJ);

		echo '<pre>';
		print_r($user);
		echo '</pre>';

		} catch(PDOException $e){
			echo 'Ocorreu um erro na conexão com o servidor <br>
			Código do erro: ' . $e->getCode() . ' <br> 
			Mensagem do erro: ' . $e->getMessage();
		}
	}

	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="prepare_statement.php">
		<input type="text" name="user" placeholder="Usuário"> <br>
		<input type="password" name="senha" placeholder="Senha"> <hr>

		<button type="submit">Entrar</button>
	</form>
</body>
</html>