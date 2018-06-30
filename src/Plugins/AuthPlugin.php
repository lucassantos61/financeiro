<?php
declare(strict_types=1);
namespace Financas\Plugins;

use Interop\Container\ContainerInterface;
use Financas\ServiceContainerInterface;
use Financas\Auth\Auth;

class AuthPlugin implements PluginInterface
{
    public function register(ServiceContainerInterface $container)
    {
        $container->addLazy('auth',function(ContainerInterface $container){
            return new Auth();
        });

    }
}