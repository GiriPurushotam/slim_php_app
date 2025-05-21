<?php

// declare(strict_type=1);

namespace App\Entity;

use App\Enums\InvoiceStatus;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\EnumType;
use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\PrePersist;
use Doctrine\ORM\Mapping\Table;
use Doctrine\Persistence\Event\LifecycleEventArgs;

#[Entity]
#[Table('test_invoices')]
#[HasLifecycleCallbacks]
class TestInvoice
{
    #[Id]
    #[Column, GeneratedValue]
    private int $id;

    #[Column(name: 'invoice_number')]
    private string $invoiceNumber;

    #[Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private float $amount;

    #[Column(enumType: InvoiceStatus::class)]
    private InvoiceStatus $status;

    #[Column(name: 'created_at')]
    private DateTime $createdAt;

    #[Column(name: 'due_date')]
    private DateTime $dueDate;

    #[OneToMany(targetEntity: InvoiceItems::class, mappedBy: 'testInvoice', cascade: ['persist', 'remove'])]
    private Collection $items;

    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    #[PrePersist]
    public function onPrePersist(LifecycleEventArgs $args)
    {
        $this->createdAt = new \DateTime();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getInvoiceNumber(): string
    {
        return $this->invoiceNumber;
    }

    public function setInvoiceNumber(string $invoiceNumber): TestInvoice
    {
        $this->invoiceNumber = $invoiceNumber;
        return $this;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): TestInvoice
    {
        $this->amount = $amount;
        return $this;
    }

    public function getStatus(): InvoiceStatus
    {
        return $this->status;
    }

    public function setStatus(InvoiceStatus $status): TestInvoice
    {
        $this->status = $status;
        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }


    public function getItem(): Collection
    {
        return $this->items;
    }

    public function addItem(InvoiceItems $item): TestInvoice
    {
        $item->setTestInvoice($this);
        $this->items->add($item);
        return $this;
    }
}
