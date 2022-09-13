<?php
	//O PDO é uma padronização que se comunica com vários SGBD

	/*
		Parâmetros:
		- DSN: 
			- nome do SGBD (o MySql vem habilitado por padrão. Os ouytros vc precisa habilitar no arquivo de php.ini)
			- :host=...: o ip da máquina que estará rodando o arquivo(nesse caso localhost) 
			- ;dbname=...: nome do banco de dados
		- Usuário: geralmente é root (a não ser que vc crie outra instância)
		- Senha: geralmente é nada

	*/

	#preparando os parâmetros
	$dsn = 'mysql:host=localhost;dbname=bd_php_pdo';
	$user = 'root';
	$senha = '';

	#tratando exceções do PDO
	//Erros: host errado, bd inexistente, usuário inexistente, senha errada
	//erros -> PDOException

	try{
		#iniciando conexão
		$conexao = new PDO($dsn, $user, $senha); //apartir dai cria-se um objeto pdo com métodos prontos

		#instrução MySql
		$query = '
			create table tb_usuarios(
				id int not null primary key auto_increment,
				nome varchar(50) not null,
				email varchar(100) not null,
				senha varchar(32) not null
			);
		';

		$retorno = $conexao->exec($query);
		/*
			retorna 0 para instruções ddl (crete, alter, drop)
			retorna o número de linhas afetadas para instruções dml (select, insert, update, delete)
		*/
		echo $retorno; 
		// se aa tabela ja estiver criada ele só ignora

		$query = 'INSERT INTO tb_usuarios(nome,email,senha) VALUES("Natan Barbosa", "nate.rock@email.com", "123")';
		$retorno = $conexao->exec($query);
		echo $retorno;

		/*$query = 'DELETE FROM tb_usuarios;';
		$retorno = $conexao->exec($query);
		echo $retorno;*/




	} catch(PDOException $e){
		echo 'Erro: ' . $e->getCode() . '<br> Mensagem: ' . $e->getMessage();
		//O objeto de exception ($e) traz várias informações dentro do objeto, mas as importantes são o código e a msg de erro (esses atributos são protegidos, então é necessário pegar eles com o getCode() e o getMessage())

		#registrar erro
		#tratar mensagem amigavelmente e redirecionar usuário
	}