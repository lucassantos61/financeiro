<?php

use Psr\Http\Message\ServerRequestInterface;
use Financas\Models\CategoryCost;
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