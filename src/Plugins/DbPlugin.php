<?php
declare(strict_types=1);
namespace Financas\Plugins;

use Financas\Plugins\PluginInterface;
use Illuminate\Database\Capsule\Manager as Capsule;
use Financas\ServiceContainerInterface;

class DbPlugin implements PluginInterface
{
    public function register(ServiceContainerInterface $container)
    {
        $capsule = new Capsule();
        $config = include __DIR__."/../../config/db.php";
        $capsule->addConnection($config['development']);
        $capsule->bootEloquent();
    }
}