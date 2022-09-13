<?php
declare(strict_types=1);

use App\Application\Settings\SettingsInterface;
use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Illuminate\Database\Capsule\Manager as Capsule; //importar o illuminate

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        //dependência do logger
        LoggerInterface::class => function (ContainerInterface $c) {
            $settings = $c->get(SettingsInterface::class);

            $loggerSettings = $settings->get('logger');
            $logger = new Logger($loggerSettings['name']);

            $processor = new UidProcessor();
            $logger->pushProcessor($processor);

            $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
            $logger->pushHandler($handler);

            return $logger;
        },

        //dependência do illuminate
        'db' => function (ContainerInterface $c) {
            $capsule = new Capsule;

            //usar as settings definidas em settings.php a partir do container
            $settings = $c->get(SettingsInterface::class);
            $dbSettings = $settings->get('db');

            $capsule->addConnection($dbSettings);

            $capsule->setAsGlobal();

            $capsule->bootEloquent();

            return $capsule;
        },

        //Gerador de chave API
        'secretKey' => function (ContainerInterface $c) {
            return $c->get(SettingsInterface::class)->get('secretKey');
        }
    ]);
};
