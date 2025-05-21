<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table('invoice_items')]

class InvoiceItems
{
    #[Id]
    #[Column, GeneratedValue]
    private int $id;

    #[Column(name: 'invoice_id')]
    private int $invoiceId;

    #[Column(name: 'description')]
    private string $description;

    #[Column(name: 'quantity')]
    private int $quantity;

    #[Column(name: 'unit_price', type: Types::DECIMAL, precision: 10, scale: 2)]
    private float $unitPrice;

    #[ManyToOne(inversedBy: 'items')]
    #[JoinColumn(name: 'invoice_id', referencedColumnName: 'id')]
    private TestInvoice $testInvoice;

    public function getId(): int
    {
        return $this->id;
    }

    public function getInvoiceId(): int
    {
        return $this->invoiceId;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): InvoiceItems
    {
        $this->description = $description;
        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): InvoiceItems
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(float $unitPrice): InvoiceItems
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }


    public function getTestInvoice()
    {
        return $this->testInvoice;
    }

    public function setTestInvoice(TestInvoice $testInvoice): self
    {
        $this->testInvoice = $testInvoice;
        return $this;
    }
}
