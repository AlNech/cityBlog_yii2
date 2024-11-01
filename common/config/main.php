<?php

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'dadata' => function() {
            return new Dadata\DadataClient(env('DADATA_TOKEN'), env('DADATA_SECRET'));
        },
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
        'db' => [
            'class' => \yii\db\Connection::class,
            'dsn' => env('DB_MAIN_DSN'),
            'username' => env('DB_MAIN_USERNAME'),
            'password' => env('DB_MAIN_PASSWORD'),
            'charset' => 'utf8',
        ],
    ],
];
