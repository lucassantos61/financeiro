<?php

use Psr\Http\Message\ServerRequestInterface;


$app
    ->get('/login',function () use ($app){
        $view = $app->service('view.renderer');
        return $view->render('auth/login.html.twig');
    },'auth.show_login_form')
    ->post('/login',function () use($app){

    },'auth.login');