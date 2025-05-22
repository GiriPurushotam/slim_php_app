<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';


use App\Controller\HomeController;
use App\Load;
use App\Routing;
use App\Config;
use App\Controller\InvoiceController;
use App\DB;
use Illuminate\Container\Container;

define('VIEW_PATH', __DIR__ . '/../views');
define('STORAGE_PATH', __DIR__ . '/../storge');


$container = new Container();
$routing = new Routing($container);

$routing->registerRoutesFromControllerAttributes([
    HomeController::class,
    InvoiceController::class,
]);
(new Load(
    $routing,
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']],
    $container
))->boot()->run();
