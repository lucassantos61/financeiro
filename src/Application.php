<?php
declare(strict_types=1);

namespace Financas;

use Financas\Plugins\PluginInterface;


class Application
{
    private $serviceContainer;

    public function __construct(ServiceContainerInterface $serviceContainer)
    {
        $this->serviceContainer = $serviceContainer;
    }

    public function service($name)
    {
        return $this->serviceContainer->get($name);
    }

    public function addService(string $name, $service): void
    {
        if(is_callable($service)){
            $this->serviceContainer->addLazy($name,$service);
            return;
        }
            $this->serviceContainer->add($name,$service);
            return;
    }

    public function plugin (PluginInterface $plugin): void
    {
        $plugin->register($this->serviceContainer);
    }
}