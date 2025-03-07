<?php
use Timoleonhd\Projetquizz\controller\baseCTRL;
use Timoleonhd\Projetquizz\Controller\homeCTRL;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;



$app->get('/', [homeCTRL::class, 'showAccueil']);
