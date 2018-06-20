<?php
declare(strict_types=1);
namespace Financas\Plugins;

use Financas\ServiceContainerInterface;
use Aura\Router\RouterContainer;
use Psr\Http\Message\RequestInterface;
use Zend\Diactoros\ServerRequestFactory;
use Interop\Container\ContainerInterface;



class RoutePlugin implements PluginInterface
{
    public function register(ServiceContainerInterface $container)
    {
        $routeContainer = new RouterContainer();
        //Registra Rotas da palicação
        $map = $routeContainer->getMap();
        //Tem função de indentificar a rota que está sendo acessada
        $matcher = $routeContainer->getMatcher();
        //Tem função de gerar links  com base nas rotas registradas
        $generator  = $routeContainer->getGenerator();
        $request  = $this->getRequest();
        $container->add('routing',$map);
        $container->add('routing.matcher',$matcher);
        $container->add('routing.generator',$generator);
        $container->add(RequestInterface::class,$request);
        $container->addLazy('route',function(ContainerInterface $container){
           $matcher =  $container->get('routing.matcher');
           $request = $container->get(RequestInterface::class);
          return $matcher->match($request);
        });
    }

    protected function getRequest(): RequestInterface
    {
        return ServerRequestFactory::fromGlobals($_SERVER,$_GET,$_POST,$_COOKIE,$_FILES);
    }
}