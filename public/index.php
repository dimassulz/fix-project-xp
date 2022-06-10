<?php

require '../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Provider\RoutesProvider;

Dotenv::createImmutable("../")
  ->load();

if ($_ENV['ENVIRONMENT'] == 'development') {
  ini_set('error_reporting', E_ALL);
  ini_set('display_errors', true);
}

$routes = new RoutesProvider($_ENV['SYSTEM_URL']);

$routes->dispatch();