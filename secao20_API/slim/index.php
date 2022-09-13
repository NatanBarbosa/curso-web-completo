<?php

//Interface para definir o tipo da requisição e resposta lá no parâmetro
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Capsule\Manager as Capsule;

//autoload do composer
require 'vendor/autoload.php';

//objeto de configuração de rotas
$app = new \Slim\App([
	'settings' => [
		'displayErrorDetails' => true
	]
]);
//display error details para mostrar os erros da API qnd vc estiver debugando



// ----------- Illuminate: gerenciador de BD ------------
//instalação: php composer.phar require illuminate/database
$container = $app->getContainer();
$container['db'] = function(){
	$capsule = new Capsule;

	$capsule->addConnection([
	    'driver' => 'mysql',
	    'host' => 'localhost',
	    'database' => 'slim',
	    'username' => 'root',
	    'password' => '',
	    'charset' => 'utf8',
	    'collation' => 'utf8_unicode_ci',
	    'prefix' => '',
	]);

	$capsule->setAsGlobal();

	$capsule->bootEloquent();

	return $capsule;
};

$app->get('/usuarios', function(Request $request, Response $response){
	$db = $this->get('db');

	/*
	$db->schema()->dropIfExists('usuarios');

	//criar tabela: $table: parâmetro para usar a tabela criada
	$db->schema()->create('usuarios', function($table){
		//criar um campo autoincrement int
		$table->increments('id');

		//criar campos varchar
		$table->string('nome');
		$table->string('email');

		//criar campo de data
		$table->timestamps();
	});
	*/

	//inserir registros
	$db->table('usuarios')->insert([
		'nome' => 'Mohamed Salah',
		'email' => 'mohamed@teste.com'
	]); 

	//atualizar registros
	/*$db->table('usuarios')
		->where('id', 1)
		->update([
			'nome' => 'Nate Rock'
		]); */

	//deletar dados
	/* $db->table('usuarios')
	->where('id', 1)
	->delete(); */

	//listar registros
	$usuarios = $db->table('usuarios')->get();

	return $response->withJson($usuarios);

});


//executar o objeto
$app->run();








/*
//Tipos de respostas -> cabeçalho, texto, Json, XML
//Mudar cabeçalho = mudar inspecionar -> network -> response headers
//------------ response cabeçalho -----------------------
$app->get('/header', function(Request $request, Response $response){
	$response->write('Esse é um retorno header');
	return $response->withHeader('allow', 'PUT') //permitir PUT tbm
			->withAddedHeader('Content-Length', 30); //limitar retorno em no máx 30 caracteres

	//->withHeader->withAddedHeader->withAddedHeader->withAddedHeader
});

//------------ response json -----------------------
$app->get('/json', function(Request $request, Response $response){
	return $response->withJson([
		"nome" => "Natan",
		"endereco" => "Rua das manteigas",
		"email" => "natan@teste.com"
	]); //converter arrays para Json na resposta
});

//------------ response xml -----------------------
$app->get('/xml', function(Request $request, Response $response){
	$xml = file_get_contents('arquivo'); //ler arquivo e armazenar na variável
	$response->write($xml);
	return $response->withHeader('Content-Type', 'application/xml');
});





//------------ middleware -----------------------
//camadas de execução: https://www.slimframework.com/docs/v3/concepts/middleware.html

//middleware camada 1 (2º executado)
$app->add(function($request, $response, $next){
	//Midleware para fazer autenticação...
	$response->write('Inicio camada 1 + '); //para não executar as rotas, dar return nessa linha

	//autenticado, passar para a próxima ação
	$response = $next($request, $response);

	//usuário saindo do middleware (4º executado)
	$response->write(' + fim camada 1');
	return $response;
});

//middleware camada 2 (primeiro executado)
$app->add(function($request, $response, $next){
	//Midleware para fazer alguma validação...
	$response->write('Inicio camada 2 + '); 

	//validade, passar para a próxima ação
	return $next($request, $response);
});

//execução (3º executado)

$app->get('/usuarios', function(Request $request, Response $response){
	//resposta para o usuário
	return $response->write('Ação principal usuários');
});

$app->get('/postagens', function(Request $request, Response $response){
	return $response->write('Ação principal postagens');
});




*/







/*

//container dependecy injection (Usar classe externa dentro do servico)

//Criando classe externa
class Servico{

}

//Container Pimple (instalado com o slim)
$container = $app->getContainer();
$container['Servico'] = function(){
	//esse container vai instanciar a classe serviço criada lá em cima
	return new Servico;
};

$app->get('/servico', function(Request $request, Response $response) {

	//solicitar a classe instanciada
	$servico = $this->get('servico');
	var_dump($servico);
});



$container = $app->getContainer();
$container['View'] = function(){
	//esse container vai instanciar a classe view, criada em outro arquivo
	return new MyApp\View;
};


//Contrololers como função
//usar classe direto do 2º parâmetro ('clase:metodo');
//O slim instancia a classe Home e acessa o método index automaticamente, passando o request e response como parâmetro
$app->get('/usuario', '\MyApp\controllers\Home:index');


//Eu mesmo quero instanciar minha classe, em vez do slim
$container = $app->getContainer();
$container['Teste'] = function(){
	return new MyApp\controllers\Teste(new MyApp\View);
};

$app->get('/teste', 'Teste:index');





*/








/*

//padrão psr-7
$app->get('/postagens', function(Request $request, Response $response){
	
	//escrever no corpo da resposta usando o padrão psr-7
	$response->getBody()->write("Listagem de postagens");
	return $response;
});

//Rota usando o verbo POST
$app->post('/usuarios/adiciona', function(Request $request, Response $response){
	//recuperar as infos enviadas do formulário ($_POST)
	$post = $request->getParsedBody();
	$nome = $post['nome'];
	$email = $post['email'];

	//salvar no banco de dados com insert...

	return $response->getBody()->write('sucesso ao inserir');
});

//Rota usando o verbo Put
$app->put('/usuarios/atualiza', function(Request $request, Response $response){
	//recuperar as infos enviadas do formulário ($_POST)
	$post = $request->getParsedBody();
	$id = $post['id'];
	$nome = $post['nome'];
	$email = $post['email'];

	//atualizar dados com update...

	return $response->getBody()->write('sucesso ao atualizar o usuário ' . $id);
});

//Rota usando o verbo Delete (qnd se remove algo do banco, é mais fácil passar apenas o id na url)
$app->delete('/usuarios/remove/{id}', function(Request $request, Response $response){
	//recuperar as infos enviadas do formulário ($_POST)
	
	$id = $request->getAttribute('id');

	//remover dados com delete...

	return $response->getBody()->write('sucesso ao deletar o usuário ' . $id);
});

*/





/*

//definir rota da API (recuperar dados do servidor | url q o user vai acessar), 
$app->get('/postagens2', function(){
	//o q a rota vai fazer?
	echo 'Listagem de postagens';
});

//rota com placeholder {id} para recuperar parâmetros.
$app->get('/usuarios/{id}', function($request, $response){
	//deixar parâmetro sendo opcional: '/usuarios[/{id}]'

	$id = $request->getAttribute('id'); //pegar parâmetro da url
	echo 'Dados do usuário ' . $id;
});

//dois attr opcionais
$app->get('/postagens[/{ano}[/{mes}]]', function($request, $response){
	$ano = $request->getAttribute('ano');
	$mes = $request->getAttribute('mes');
	echo "Postagens de $mes/$ano";
});

//permitir o usuário digitar qlqr valor após a barra
$app->get('/lista/{itens:.*}', function($request, $response){
	$itens = $request->getAttribute('itens');

	var_dump(explode("/", $itens));
});

//nomear rotas
$app->get('/blog/postagens/{id}', function($request, $response){
	echo "Listar postagem para um id";
})->setName('blog');


$app->get('/meusite', function($request, $response){
	//acessar a rota nomeada
	//$this = $app
	$retorno = $this->get('router')->pathFor('blog', ["id" => "10"]);

	echo $retorno;
});

//agrupar rotas (útil para trabalhar com versões de api)
$app->group('/v5', function(){

	$this->get('/usuarios', function($request, $response){
	echo "listagem de usuarios";
	});

	$this->get('/postagens', function($request, $response){
		echo "listagem de postagens";
	});

});

*/

//.htaccess: confurações para que o apache automaticamente leia o index.php qnd a url for apenas /