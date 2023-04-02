<?php

use App\Connection\DatabasesConnection;

include_once '../vendor/autoload.php';
include '../config/database.php';


// $rotas = require '../config/routes.php';
include dirname(__DIR__) . ('../config/routes.php');

$url = $_SERVER['REQUEST_URI'];
$rota = explode('?',$url)[0];

if(false === isset($rotas[$rota])){
    echo "Erro 404";
    exit;
}

$controller = $rotas[$rota]['controller'];
$method = $rotas[$rota]['method'];

(new $controller)-> $method();
;