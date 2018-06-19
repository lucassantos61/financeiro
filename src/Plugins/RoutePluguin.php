<?php

namespace Financas\Plugins;

use Financas\ServiceContainerInterface;
use Aura\Router\RouterContainer;



class RoutePluggin implements PluginInterface
{
    public function register(ServiceContainerInterface $container)
    {
        $routeContainer = new RouterContainer();
        //Registra Rotas da palicação
        $map = $routeContainer->getMap();
        //Tem funcção de indentificar a rota que está sendo acessada
        $matcher = $routeContainer->getMatcher();
        //Tem funçãoi de gerar links  com base nas rotas registradas
        $generator  = $routeContainer->getGenerator();
        $container->add('routing',$map);
        $container->add('routing.matcher',$matcher);
        $container->add('routing.generator',$generator);
    }
}