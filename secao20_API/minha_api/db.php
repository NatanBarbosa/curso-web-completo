<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

// Instantiate PHP-DI ContainerBuilder
$containerBuilder = new ContainerBuilder();

if (false) { // Should be set to true in production
    $containerBuilder->enableCompilation(__DIR__ . '/../var/cache');
}

// Set up settings
$settings = require __DIR__ . '/app/settings.php';
$settings($containerBuilder);

// Set up dependencies
$dependencies = require __DIR__ . '/app/dependencies.php';
$dependencies($containerBuilder);

// Build PHP-DI Container instance
$container = $containerBuilder->build();

// Instantiate the app
AppFactory::setContainer($container);
$app = AppFactory::create();
$callableResolver = $app->getCallableResolver();

$db = $container->get('db');

$schema = $db->schema();
$tabela = 'produtos';

$schema->dropIfExists($tabela);

$schema->create($tabela, function($table){
    $table->increments('id');
    $table->string('titulo', 100);
    $table->text('descricao');
    $table->decimal('preco', 11, 2);
    $table->string('fabricante', 60);
    $table->timestamps();
});

$db->table($tabela)->insert([
    'titulo' => 'Smartphone Motorola -Moto -G6 -32GB-Dual-Chip',
    'descricao' => 'Android -Oreo---8.0-Tela:5.7" Octa-Core- 1.8-GHz-4G-Câmera-12:+-:5MP- (Dual Traseira) - Índigo',
    'preco' => 899.00,
    'fabricante' => 'Motorola',
    'created_at' => '2022-08-19',
    'updated_at' => '2022-08-19',
]);

$db->table($tabela)->insert([
    'titulo' => 'iPhone X Cinza Espacial 64GB',
    'descricao' => 'Tela 5.8" IOS 12 4G Wi-Fi Câmera 12MP - Apple',
    'preco' => 4999.00,
    'fabricante' => 'Apple',
    'created_at' => '2021-03-13',
    'updated_at' => '2022-08-19',
]);