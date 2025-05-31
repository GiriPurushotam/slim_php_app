<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/path_constants.php';


use App\DB;
use App\Load;
use App\Config;
use App\Routing;
use DI\Container;
use Dotenv\Dotenv;
use Slim\Views\Twig;
use Doctrine\ORM\ORMSetup;
use Slim\Factory\AppFactory;
use Slim\Views\TwigMiddleware;
use Doctrine\ORM\EntityManager;
use App\Controller\HomeController;
use Twig\Extra\Intl\IntlExtension;
use App\Controller\InvoiceController;
use DI\ContainerBuilder;
use Doctrine\DBAL\DriverManager;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

// $container = new Container();
// $routing = new Routing($container);

// $routing->registerRoutesFromControllerAttributes([
//     HomeController::class,
//     InvoiceController::class,
// ]);
// (new Load(
//     $routing,
//     ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']],
//     $container
// ))->boot()->run();

$container = require CONFIG_PATH . '/container.php';
$router = require CONFIG_PATH . '/routes.php';
AppFactory::setContainer($container);

$app = AppFactory::create();
$router($app);

$app->add(TwigMiddleware::create($app, $container->get(Twig::class)));

$app->run();
