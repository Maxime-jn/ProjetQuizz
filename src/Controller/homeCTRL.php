<?php
namespace Timoleonhd\Projetquizz\controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

use Timoleonhd\Projetquizz\controller\baseCTRL;

class homeCTRL extends baseCTRL
{
 
    function showAccueil(Request $request, Response $response)
    {
        $dataLayout = [
            "title" => "Accueil",
            "description" => "Page d'accueil",
            // "base_url" => $request->getUri()->getBaseUrl()
        ];
        $namePage = "Accueil.php";

        return baseCTRL::phpView($dataLayout, $response, $namePage);
    }



}