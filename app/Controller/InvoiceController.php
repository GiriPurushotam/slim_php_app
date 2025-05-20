<?php

declare(strict_types=1);

namespace App\Controller;

use App\Attribute\Get;
use App\Enums\InvoiceStatus;
use App\Models\TestInvoice;
use App\View;

class InvoiceController
{
    #[Get('/invoices')]
    public function index(): View
    {
        $invoices = (new TestInvoice())->all(InvoiceStatus::PAID);
        return View::make('invoice/index', ['invoices' => $invoices]);
    }
}
