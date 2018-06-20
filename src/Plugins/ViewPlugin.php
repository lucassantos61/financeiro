<?php

use Financas\Plugins\PluginInterface;
use Financas\ServiceContainerInterface;
use Interop\Container\ContainerInterface;

class ViewPlugin implements PluginInterface
{
    public function register(ServiceContainerInterface $container)
    {
        $container->addLazy('twig',function(ContainerInterface $container){
            $loader = new Twig_Loader_Filesystem(__DIR__.'/../../templates');
            $twig = new Twig_Environment($loader);
            return $twig;
        });
    }
}