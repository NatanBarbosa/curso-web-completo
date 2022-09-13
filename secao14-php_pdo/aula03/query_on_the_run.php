<?php

try{
	#iniciando conexao
	$conec = new PDO('mysql:host=localhost;dbname=bd_php_pdo', 'root', '');

	$query = "SELECT * FROM tb_usuarios";

	//ja listar os registros no momento de execução da query
	foreach($conec->query($query) as $i => $valor){
		echo 'Nome: ' . $valor[1] . '<br>';
		echo 'Email: ' . $valor['email'] . '<br>';
		echo 'Senha: ' . $valor[3] . '<hr>';
	}

} catch (PDOException $e){
	echo 'Ocorreu um erro na conexão com o servidor <br>
	Código do erro: ' . $e->getCode() . ' <br> 
	Mensagem do erro: ' . $e->getMessage();
}
	