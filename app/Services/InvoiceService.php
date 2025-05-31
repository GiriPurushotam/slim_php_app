<?php

namespace App\Services;

use App\Entity\TestInvoice;
use App\Enums\InvoiceStatus;
use Doctrine\ORM\EntityManager;

class InvoiceService
{
    public function __construct(private EntityManager $em) {}

    public function getPaidInvoices(): array
    {
        return $this->em->createQueryBuilder()
            ->select('i')
            ->from(TestInvoice::class, 'i')
            ->where('i.status = :status')
            ->setParameter('status', InvoiceStatus::PAID)
            ->getQuery()
            ->getArrayResult();
    }
}
