<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy as Group;
use App\Application\Models\Produto;

//ORM => mapeador de objeto relacional
//ORM elloquent ->

$app->group('/api/v1/produtos', function (Group $group) {
    //get: listar produtos
    $group->get('/lista', function (Request $request, Response $response, array $args) {
        $produtos = Produto::get();

        $produtos = json_encode($produtos);

        $response->getBody()->write($produtos);

        return $response->withHeader('Content-Type', 'application/json');
    });

    //post: adicionar um produto no banco
    $group->post('/adiciona', function (Request $request, Response $response, array $args) {
        $dados = $request->getParsedBody();

        //validar..

        $produto = Produto::create($dados);

        $response->getBody()->write(json_encode($produto));
        return $response->withHeader('Content-Type', 'application/json');
    });

    //Recuperar um produto específico
    $group->get('/lista/{id}', function (Request $request, Response $response, array $args) {
        $produto = Produto::findOrFail($args['id']);

        $response->getBody()->write(json_encode($produto));
        return $response->withHeader('Content-type', 'application/json');
    });

    //Atualizar um produto específico
    $group->put('/atualiza/{id}', function (Request $request, Response $response, array $args) {
        $dados = $request->getParsedBody();

        //produto que será atualizado
        $produto = Produto::findOrFail($args['id']);

        //atualizar objeto instanciado
        $produto->update($dados);

        $response->getBody()->write(json_encode($produto));
        return $response->withHeader('Content-type', 'application/json');
    });

    //remover um produto específico
    $group->delete('/remove/{id}', function (Request $request, Response $response, array $args) {
        //produto que será atualizado
        $produto = Produto::findOrFail($args['id']);

        //remover
        $produto->delete();

        $response->getBody()->write(json_encode($produto));
        return $response->withHeader('Content-type', 'application/json');
    });
});
