<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;
use App\Enums\InvoiceStatus;


class TestInvoices extends Model
{

    public function all(InvoiceStatus $status): array
    {
        return $this->db->createQueryBuilder()->select('id', 'invoice_number', 'amount', 'status')->from('test_invoices')
            ->where('status =?')
            ->setParameter(0, $status->value)
            ->fetchAllAssociative();
    }
}
