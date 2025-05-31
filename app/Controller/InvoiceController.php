<?php

declare(strict_types=1);

namespace App\Controller;

use App\View;
use Carbon\Carbon;
use Slim\Views\Twig;
use App\Attribute\Get;
use App\Models\TestInvoice;
use App\Enums\InvoiceStatus;
use App\Models\TestInvoices;
use App\Services\InvoiceService;
use Doctrine\ORM\EntityManager;
use Illuminate\Container\Container;
use Symfony\Component\Console\Helper\Dumper;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class InvoiceController
{

    public function __construct(private readonly Twig $twig, private InvoiceService $invoiceService) {}

    public function index(Request $request, Response $response, $args): Response
    {
        return $this->twig->render(
            $response,
            'invoice/index.twig',
            ['testInvoices' => $this->invoiceService->getPaidInvoices()]
        );
    }

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
