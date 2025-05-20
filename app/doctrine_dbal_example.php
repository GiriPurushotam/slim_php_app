<?php

declare(strict_types=1);

use Dba\Connection;
use Doctrine\DBAL\ArrayParameterType;
use Dotenv\Dotenv;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\ParameterType;

require_once __DIR__ . '/../vendor/autoload.php';


$dotEnv = Dotenv::createImmutable(dirname(__DIR__));
$dotEnv->load();


$connectionParams = [
    'dbname' => $_ENV['DB_NAME'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'host' => $_ENV['DB_HOST'],
    'driver' => $_ENV['DB_DRIVER'] ?? 'pdo_mysql',
];
$conn = DriverManager::getConnection($connectionParams);


$ids = [2, 1];
$result = $conn->fetchAllAssociative('SELECT id, created_at FROM test_invoices WHERE id IN (?)', [$ids], [ArrayParameterType::INTEGER]);
// $stmt->bindValue(':invoice_id', 1);
// $result = $stmt->executeQuery();
var_dump($result);
