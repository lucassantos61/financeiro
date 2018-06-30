<?php

use Financas\ServiceContainer;
use Financas\Application;
use Financas\Plugins\RoutePlugin;
use Financas\Plugins\ViewPlugin;
use Zend\Diactoros\Response;
use Psr\Http\Message\RequestInterface;
use Financas\Plugins\DbPlugin;
use Financas\Plugins\AuthPlugin;


require_once __DIR__.'/../vendor/autoload.php';

$serviceContaner = new ServiceContainer();
$app = new Application($serviceContaner);

$app->plugin(new RoutePlugin());
$app->plugin(new ViewPlugin());
$app->plugin(new DbPlugin());
$app->plugin(new AuthPlugin());

require_once __DIR__ . '/../src/controllers/category-costs.php';
require_once __DIR__ . '/../src/controllers/user.php';
require_once __DIR__ . '/../src/controllers/auth.php';

$app->start();