<?php

namespace Financas;

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

    public function addService(string $name, $service)
    {
        if(is_callable($service)){
            $this->serviceContainer->addLazy($name,$service);
            return;
        }
            $this->serviceContainer->add($name,$service);
            return;
    }
}