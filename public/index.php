<?php

use Financas\ServiceContainer;
use Financas\Application;
use Financas\Plugins\RoutePlugin;
use Financas\Plugins\ViewPlugin;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response;
use Psr\Http\Message\RequestInterface;
use Financas\Plugins\DbPlugin;
use Financas\Models\CategoryCost;
use Zend\Diactoros\Response\RedirectResponse;

require_once __DIR__.'/../vendor/autoload.php';

$serviceContaner = new ServiceContainer();
$app = new Application($serviceContaner);

$app->plugin(new RoutePlugin());
$app->plugin(new ViewPlugin());
$app->plugin(new DbPlugin());
$app
    ->get('/category-costs', function() use($app){
        $view = $app->service('view.renderer');
        $myModel = new CategoryCost();
        $categories = $myModel->all();
        return $view->render('category-costs/list.html.twig',['categories'=>$categories]);
    })

    ->get('/category-costs/new', function() use($app){
    $view = $app->service('view.renderer');
    $myModel = new CategoryCost();
    $categories = $myModel->all();
    return $view->render('category-costs/create.html.twig');
    })
    ->post('/category-costs/store', function(ServerRequestInterface $request){
        $data = $request->getParsedBody();
        
        CategoryCost::create($data);
        return new RedirectResponse('/category-costs');
    });
$app->start();