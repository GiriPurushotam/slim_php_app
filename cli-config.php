<?php

require 'vendor/autoload.php';

use Dotenv\Dotenv;
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\Configuration\Connection\ExistingConnection;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
$config = new PhpFile('migrations.php'); // Or use one of the

$connectionParams = [
    'dbname' => $_ENV['DB_NAME'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'host' => $_ENV['DB_HOST'],
    'driver' => $_ENV['DB_DRIVER'] ?? 'pdo_mysql',
];

$entityManger = new EntityManager(DriverManager::getConnection($connectionParams), ORMSetup::createAttributeMetadataConfiguration([__DIR__ . 'app/Entity']));

return DependencyFactory::fromConnection($config, new ExistingConnection($conn));
