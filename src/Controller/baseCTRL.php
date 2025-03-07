<?php
namespace Timoleonhd\Projetquizz\controller;

use Slim\Views\PhpRenderer;


class baseCTRL
{


    static function phpView($dataLayout, $response, $namePage)
    {
        $phpView = new PhpRenderer(__DIR__ . '/../../views', $dataLayout);
        $phpView->setLayout("layout.php");
        return $phpView->render($response, $namePage);
    }
}