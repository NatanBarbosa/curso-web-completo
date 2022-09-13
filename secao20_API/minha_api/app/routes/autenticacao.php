<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy as Group;
use App\Application\Models\Produto;
use App\Application\Models\Usuario;
use Firebase\JWT\JWT;

//rotas para geração de token de acesso
//antes do user usar a API, ele precisa usar essa rota e gerar o seu token
$app->post('/api/token', function (Request $request, Response $response, array $args) {
    $dados = $request->getParsedBody();

    $email = $dados['email'] ?? null;
    $senha = $dados['senha'] ?? null;

    $usuario = Usuario::where('email', $email)->first();

    if (!is_null($usuario) && (md5($senha)) == $usuario->senha) {
        //usuário logado. Gerar token de acesso
        $secretkey = $this->get('secretKey');

        //O jwt gera uma string grandora baseada nos dados de login do usuário
        $chaveAcesso = JWT::encode((array) $usuario, $secretkey, 'HS256');

        $response->getBody()->write(json_encode(['chave' => $chaveAcesso]));
        return $response->withHeader('Content-type', 'application/json');
    } else {
        $response->getBody()->write(json_encode(['status' => 'erro']));
        return $response->withHeader('Content-type', 'application/json');
    }
});
