<?php

return
  [
    'paths' => [
      'migrations' => 'database/migrations',
      'seeds' => 'database/seeds'
    ],
    'environments' => [
      'default_migration_table' => 'migrations',
      'default_environment' => 'development',
      'development' => [
        'adapter' => 'mysql',
        'host' => '0.0.0.0',
        'name' => 'webjump-test',
        'user' => 'root',
        'pass' => 'toor',
        'port' => '3307',
        'charset' => 'utf8'
      ],
      'production' => [
        'adapter' => 'mysql',
        'host' => 'localhost',
        'name' => 'production_db',
        'user' => 'root',
        'pass' => '',
        'port' => '3306',
        'charset' => 'utf8'
      ],
      'testing' => [
        'adapter' => 'mysql',
        'host' => 'localhost',
        'name' => 'testing_db',
        'user' => 'root',
        'pass' => '',
        'port' => '3306',
        'charset' => 'utf8'
      ]
    ],
    'version_order' => 'creation'
  ];
