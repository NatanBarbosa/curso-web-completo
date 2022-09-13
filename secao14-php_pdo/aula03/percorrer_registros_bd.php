<?php

try{
	#iniciando conexao
	$conec = new PDO('mysql:host=localhost;dbname=bd_php_pdo', 'root', '');

	$query = "SELECT * FROM tb_usuarios";
	$stmt = $conec->query($query);
	$usuarios = $stmt->fetchAll(PDO::FETCH_OBJ);

	foreach($usuarios as $key => $value){
		echo 'Nome: ' . $value->nome . '<br>';
		echo 'Email: ' . $value->email . '<br>';
		echo 'Senha: ' . $value->senha;
		echo '<hr>';
	}

} catch (PDOException $e){
	echo 'Ocorreu um erro na conexão com o servidor <br>
	Código do erro: ' . $e->getCode() . ' <br> 
	Mensagem do erro: ' . $e->getMessage();
}
	