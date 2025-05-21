<?php

declare(strict_types=1);

use App\Enums\InvoiceStatus;
use App\Models\InvoiceItem;
use App\Models\TestInvoice;
use Illuminate\Database\Capsule\Manager as Capsule;

require_once __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../eloquent.php';

// insert data
// Capsule::connection()->transaction(function () {
//     $testInvoice = new TestInvoice();


//     $testInvoice->amount = 100;
//     $testInvoice->invoice_number = '5';
//     $testInvoice->status = InvoiceStatus::PENDING;
//     $testInvoice->due_date = (new \Carbon\Carbon())->addDays(5);

//     $testInvoice->save();

//     $items = [['item 1', 1, 15], ['item 2', 2, 7.5], ['item 3', 4, 3.75]];

//     foreach ($items as [$description, $quantity, $unitPrice]) {
//         $item = new InvoiceItem();

//         $item->description = $description;
//         $item->quantity = $quantity;
//         $item->unit_price = $unitPrice;

//         $item->invoice()->associate($testInvoice);

//         $item->save();
//     }
// });

// update data 

$invoiceId = 5;

TestInvoice::query()->where('id', $invoiceId)->update(['status' => InvoiceStatus::PAID]);
