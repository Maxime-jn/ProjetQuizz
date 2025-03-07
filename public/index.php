<?php

use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require '../vendor/autoload.php';

$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);

session_start();

if (!isset($_SESSION['isConnected'])) {
   $_SESSION['isConnected'] = false;
   $_SESSION['name'] = false;
}

require '../config/config.php';

require '../src/route.php';



$app->run();