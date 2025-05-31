<?php

declare(strict_types=1);

use App\Controller\HomeController;
use App\Controller\InvoiceController;
use Slim\App;

return function (App $app) {
    $app->get('/', [HomeController::class, 'index']);
    $app->get('/invoices', [InvoiceController::class, 'index']);
};
