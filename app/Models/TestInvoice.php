<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\InvoiceStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TestInvoice extends Model
{
    const UPDATED_AT = null;

    protected $casts = [
        'created_at' => 'datetime',
        'due_date'  => 'datetime',
        'status' => InvoiceStatus::class,
    ];

    protected static function booted()
    {
        static::creating(function (TestInvoice $testInvoice) {
            if ($testInvoice->isClean('due_date')) {
                $testInvoice->due_date = (new Carbon())->addDays(10);
            }
        });
    }

    public function items(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
