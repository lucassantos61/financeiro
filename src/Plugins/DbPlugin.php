<?php
declare(strict_types=1);
namespace Financas\Plugins;

use Financas\Plugins\PluginInterface;
use Illuminate\Database\Capsule\Manager as Capsule;
use Financas\ServiceContainerInterface;
use Financas\Repository\RepositoryFactory;
use Interop\Container\ContainerInterface;
use Financas\Models\CategoryCost;
use Financas\Models\User;

class DbPlugin implements PluginInterface
{
    public function register(ServiceContainerInterface $container)
    {
        $capsule = new Capsule();
        $config = include __DIR__."/../../config/db.php";
        $capsule->addConnection($config['development']);
        $capsule->bootEloquent();

        $container->add("repository.factory",new RepositoryFactory);
        $container->addLazy('category-cost.repository', function (ContainerInterface $container) {
            return $container->get('repository.factory')->factory(CategoryCost::class);
        });
        $container->addLazy('user.repository', function (ContainerInterface $container) {
            return $container->get('repository.factory')->factory(User::class);
        });

    }
}