<?php

require 'vendor/autoload.php';

use Phinx\Config\Config;

$config = new Config([
    'paths' => [
        'migrations' => 'database/migrations',
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'development',
        'development' => [
            'adapter' => 'mysql',
            'host' => getenv('DATABASE_HOST'),
            'name' => getenv('DATABASE_NAME'),
            'user' => getenv('DATABASE_USER'),
            'pass' => getenv('DATABASE_PASSWORD'),
            'port' => 3306,
            'charset' => 'utf8',
        ],
    ],
]);

return $config;