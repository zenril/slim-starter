<?php

use Monolog\Logger;
# Doctrine
# DOCTRINE_DRIVER = pdo_mysql
# DOCTRINE_DB_NAME = localhost
# DOCTRINE_DB_USER = root
# DOCTRINE_DB_PASSWORD =
return [
    'settings' => [

        'doctrine' => [
            'meta' => [
                'entity_path' => [
                    'app/Entity'
                ],
                'auto_generate_proxies' => true,
                'proxy_dir' =>  __DIR__.'/../cache/proxies',
                'cache' => null,
            ],
            'connection' => [
                'driver'   => \env('DOCTRINE_DRIVER', "pdo_mysql"),
                'host'     => \env('DOCTRINE_HOST', "localhost"),
                'dbname'   => \env('DOCTRINE_DB_NAME', "slim"),
                'user'     => \env('DOCTRINE_DB_USER', ""),
                'password' => \env('DOCTRINE_DB_PASSWORD', ""),
            ]
        ],
        // IC Settings
        'determineRouteBeforeAppMiddleware' => \env('APP_DETERMINE_ROUTE_BEFORE_MIDDLEWARE', true),
        'routerCacheFile' => \env('APP_ROUTER_CACHE_FILE', false),

        // Debugging
        'addContentLengthHeader' => \env('DEBUG_ADD_CONTENT_LENGTH_HEADER', false),
        'debug' => \env('DEBUG_DISPLAY_ERRORS', true),
        'displayErrorDetails' => \env('DEBUG_DISPLAY_ERROR_DETAILS', false),

        // Renderer settings
        'view' => [
            'view_path' => __DIR__ . '/../resources/views/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'logger',
            'path' => __DIR__ . '/../storage/logs/app.log',
            'level' => Logger::DEBUG,
        ],

        'commands' => [
                new \Doctrine\DBAL\Tools\Console\Command\RunSqlCommand(),
                new \Doctrine\DBAL\Tools\Console\Command\ImportCommand(),

                // ORM Commands
                // new \Doctrine\ORM\Tools\Console\Command\ClearCache\MetadataCommand(),
                new \Doctrine\ORM\Tools\Console\Command\ClearCache\ResultCommand(),
                new \Doctrine\ORM\Tools\Console\Command\ClearCache\QueryCommand(),
                new \Doctrine\ORM\Tools\Console\Command\SchemaTool\CreateCommand(),
                new \Doctrine\ORM\Tools\Console\Command\SchemaTool\UpdateCommand(),
                new \Doctrine\ORM\Tools\Console\Command\SchemaTool\DropCommand(),
                // new \Doctrine\ORM\Tools\Console\Command\EnsureProductionSettingsCommand(),
                // new \Doctrine\ORM\Tools\Console\Command\ConvertDoctrine1SchemaCommand(),
                // new \Doctrine\ORM\Tools\Console\Command\GenerateRepositoriesCommand(),
                // new \Doctrine\ORM\Tools\Console\Command\GenerateEntitiesCommand(),
                // new \Doctrine\ORM\Tools\Console\Command\GenerateProxiesCommand(),
                // new \Doctrine\ORM\Tools\Console\Command\ConvertMappingCommand(),
                // new \Doctrine\ORM\Tools\Console\Command\RunDqlCommand(),
                // new \Doctrine\ORM\Tools\Console\Command\ValidateSchemaCommand(),
                // new \Doctrine\ORM\Tools\Console\Command\InfoCommand(),
                // new \Doctrine\ORM\Tools\Console\Command\MappingDescribeCommand()
        ]
    ],
];
