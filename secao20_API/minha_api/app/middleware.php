<?php
declare(strict_types=1);

use App\Application\Middleware\SessionMiddleware;
use App\Application\Middleware\CorsMiddleware;
use App\Application\Middleware\AutenticationMiddleware;
use Slim\App;

//Validar o Token
$app->add(new Tuupola\Middleware\JwtAuthentication([
    "header" => "Authorization",
    "regexp" => "/(.*)/",
    "path" => "/api",
    "ignore" => ["/api/token"],
    "algorithm" => ["HS256"],
    "secret" => $container->get('secretKey')
]));

//O usuário, na hora da requisição, no header, tem que passar um parâmetro Authorization: (chave de acesso)

$app->add(CorsMiddleware::class);
$app->add(SessionMiddleware::class);
