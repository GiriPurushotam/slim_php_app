<?php

declare(strict_types=1);

date_default_timezone_set('Asia/Kathmandu');

require_once __DIR__ . '/../vendor/autoload.php';

use App\Entity\InvoiceItems;
use App\Entity\TestInvoice;
use App\Enums\InvoiceStatus;
use Dotenv\Dotenv;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\ORMSetup;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


$connectionParams = [
    'dbname' => $_ENV['DB_NAME'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'host' => $_ENV['DB_HOST'],
    'driver' => $_ENV['DB_DRIVER'] ?? 'pdo_mysql',
];

$entityManger = new EntityManager(DriverManager::getConnection($connectionParams), ORMSetup::createAttributeMetadataConfiguration([__DIR__ . '/Entity']));

$items = [['item 1', 1, 15], ['item 2', 2, 7.5], ['item 3', 4, 3.75]];

$testInvoice = (new TestInvoice())->setInvoiceNumber('1')->setAmount(50)->setStatus(InvoiceStatus::PENDING);

foreach ($items as [$description, $quantity, $unitPrice]) {
    $item = (new InvoiceItems())->setDescription($description)->setQuantity($quantity)->setUnitPrice($unitPrice);
    $testInvoice->addItem($item);
}

$entityManger->persist($testInvoice);

$entityManger->flush();
