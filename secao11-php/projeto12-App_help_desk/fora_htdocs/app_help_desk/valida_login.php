<?php
	session_start(); 
	//iniciando sessão(tem q estar antes de qualquer saída de dados) - geralmente é colocada em primeiro
	//O session se comunica apartir de instancias do navegador, de uma página pra outra. Se outro navegador requisitar a página, terá uma sessão diferente
	//cookies são transitados pela navegação e apartir desse cookie podemos ultilizar uma sessão específica
	//Uma sessão dura 3 horas

	#tipos de usuário
	$perfis = array(1 => 'Administrativo', 2 => 'Usuário');

	#usuarios do sistema -> pessoas que se cadastraram no app vao ser adicionadas nesse array
	$usuarios_app = array(
		array('id' => 1 , 'email' => 'adm@teste.com.br', 'senha' => '1234', 'perfil_id' => 1), //adm
		array('id' => 2 , 'email' => 'user@teste.com.br', 'senha' => '1234', 'perfil_id' => 1), //adm
		array('id' => 3 , 'email' => 'jose@teste.com.br', 'senha' => '1234', 'perfil_id' => 2), //user
		array('id' => 4 , 'email' => 'maria@teste.com.br', 'senha' => '1234', 'perfil_id' => 2) //user
	);

	#pegando dados do formulário
	$usuario = $_POST['email'];
	$senha = $_POST['senha'];

	#variaveis para controle de login de usuário
	$usuario_autenticado = false;
	$usuario_id = null;
	$usuario_perfil_id = null;

	#percorrendo array de cadastro
	foreach($usuarios_app as $user){
		
		#comparando form com array de cadastro
		if($usuario == $user['email'] && $senha == $user['senha']){
			$usuario_autenticado = true;
			$usuario_id = $user['id'];
			$usuario_perfil_id = $user['perfil_id']; //vai retornar 1 ou 2 (adm ou user)
			//armazenando o id de quem entrou um uma variável
		}
	}

	if($usuario_autenticado){ //verifica a variavel para autenticar
		$_SESSION['autenticado'] = 'SIM';
		$_SESSION['id'] = $usuario_id; //Agora o id está disponivel na instancia do navegador
		$_SESSION['perfil_id'] = $usuario_perfil_id; //agora se ele é adm ou não(1 ou 2) está disponivel na instancia do navegador
		header('Location: home.php');
	} else{
		header('Location: index.php?login=erro');
		//redireciona para uma página(no caso a do formulário) | à direita do ? está o parâmetro da url q nesse caso indica um erro. Nesse caso a variável $_GET[] = login(índice) 'erro'(valor do indice)
		$_SESSION['autenticado'] = 'NAO';
	}

	//Variáveis de sessão são criadas no serivdor que ficam disponiveis para browsers clientes em uma instância
    

    
?>