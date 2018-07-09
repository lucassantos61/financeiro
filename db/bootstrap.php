<?php
use Financas\Plugins\DbPlugin;
use Financas\Plugins\AuthPlugin;
use Financas\ServiceContainer;
use Financas\Application;

$serviceContaner = new ServiceContainer();
$app = new Application($serviceContaner);


$app->plugin(new DbPlugin());
$app->plugin(new AuthPlugin());

return $app;