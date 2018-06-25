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
    },'category-costs.list')

    ->get('/category-costs/new', function() use($app){
        $view = $app->service('view.renderer');
        $myModel = new CategoryCost();
        $categories = $myModel->all();
        return $view->render('category-costs/create.html.twig');
    },'category-costs.new')
    ->post('/category-costs/store', function(ServerRequestInterface $request) use ($app){
        $data = $request->getParsedBody();
        
        CategoryCost::create($data);
        return $app->route('category-costs.list');
    },'category-costs.store')
    ->get('/category-costs/edit/{id}', function(ServerRequestInterface $request) use($app){
        $view = $app->service('view.renderer');
        $id = $request->getAttribute('id');
        $category = CategoryCost::findOrFail($id);
        return $view->render('category-costs/edit.html.twig',['category' => $category]);
    },'category-costs.edit')
    ->post('/category-costs/update/{id}', function(ServerRequestInterface $request) use($app){
        $id = $request->getAttribute('id');
        $category = CategoryCost::find($id);
        $data = $request->getParsedBody();
        $category->fill($data);
        $category->save();
        return $app->route('category-costs.list');    
    },'category-costs.update')
    ->get('/category-costs/show/{id}', function(ServerRequestInterface $request) use($app){
        $view = $app->service('view.renderer');
        $id = $request->getAttribute('id');
        $category = CategoryCost::findOrFail($id);
        return $view->render('category-costs/show.html.twig',['category' => $category]);
    },'category-costs.show')
    ->get('/category-costs/delete/{id}', function(ServerRequestInterface $request) use($app){
        $id = $request->getAttribute('id');
        $category = CategoryCost::findOrFail($id);
        $category->delete($id);
        return $app->route('category-costs.list');  
    },'category-costs.delete');

$app->start();