<?php

require_once  __DIR__.'/vendor/autoload.php';

$db = include __DIR__.'/config/db.php';
list(
    'driver' => $adapter,
    'host' => $host,
    'database' => $name,
    'username' => $user,
    'password'=>$pass,
    'charset' => $char,
    'collation' => $collation
    ) = $db['development'];
    
return [
    'paths' => [
        'migrations' => [
            __DIR__.'/db/migrations'
        ],
        'seeds' => [
            __DIR__.'db/seeds'
        ]
    ],
    'enviroments' => [
        'default_migration_table' => 'migrations',
        'default_database' => 'development',
        'development' => [
            'adapter' => $adapter,
            'host' => $host,
            'name' => $name,
            'user' => $user,
            'pass' => $pass,
            'charset' => $char,
            'collation' => $collation
        ]
    ]
];