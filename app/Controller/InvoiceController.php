<?php

declare(strict_types=1);

namespace App\Controller;

use App\Attribute\Get;
use App\Enums\InvoiceStatus;
use App\Models\TestInvoice;
use App\Models\TestInvoices;
use App\View;
use Carbon\Carbon;
use Illuminate\Container\Container;
use Symfony\Component\Console\Helper\Dumper;
use Twig\Environment as Twig;

class InvoiceController
{

    public function __construct(private Twig $twig) {}

    #[Get('/invoices')]
    public function index(): string
    {
        $testInvoices = TestInvoice::query()->where('status', InvoiceStatus::PAID)->get()->map(
            fn(TestInvoice $testInvoice) => [
                'invoice_number' => $testInvoice->invoice_number,
                'amount' => $testInvoice->amount,
                'status' => $testInvoice->status->toString(),
                'dueDate' => $testInvoice->due_date->toDateTimeString(),
            ]
        )->toArray();

        return $this->twig->render('invoice/index.twig', ['testInvoices' => $testInvoices,]);
    }

    #[Get('/invoices/new')]
    public function create()
    {
        $testInvoice = new TestInvoice();


        $testInvoice->invoice_number = 5;
        $testInvoice->amount = 20;
        $testInvoice->status = InvoiceStatus::PENDING;
        $testInvoice->due_date = (new Carbon())->addDay();

        $testInvoice->save();

        echo  $testInvoice->id . ', ' . $testInvoice->due_date->format('m/d/Y');
    }
}
