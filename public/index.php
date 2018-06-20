<?php

use Financas\ServiceContainer;
use Financas\Application;
use Financas\Plugins\RoutePlugin;;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response;

require_once __DIR__.'/../vendor/autoload.php';

$serviceContaner = new ServiceContainer();
$app = new Application($serviceContaner);

$app->plugin(new RoutePlugin());

$app->get('/home/{name}/{id}',function(ServerRequestInterface $request){
    $response = new Response();
    $response->getBody()->write('Response com diactoros');
    return $response;
});

$app->start();