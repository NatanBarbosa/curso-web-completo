<?php
	//O 'usuário' do lado do front end insere valores perigosos que serão tratados no backend.
	//Esse valores perigosos nada mais são que qeurys sql em campos de email ou senha
	//ex.: 123'; delete from tb_usuarios where 'a' = 'a -> as aberturar e fechamentos da virgula se completam e essa é um quey valida que deleta tudo ;-; 

	if(!empty($_POST['user']) && !empty($_POST['senha'])){
		try{
		$conec = new PDO('mysql:host=localhost;dbname=bd_php_pdo', 'root', '');

		$query = "SELECT * FROM tb_usuarios WHERE email = '{$_POST['user']}' AND senha = '{$_POST['senha']}'";
		echo $query;

		$stmt = $conec->query($query);
		$usuario = $stmt->fetch(PDO::FETCH_OBJ);

		/*echo '<hr>';
		echo '<pre>';
		print_r($usuario);
		echo '</pre>';*/

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
	<form method="POST" action="sql_injection.php">
		<input type="text" name="user" placeholder="Usuário"> <br>
		<input type="password" name="senha" placeholder="Senha"> <hr>

		<button type="submit">Entrar</button>
	</form>
</body>
</html>