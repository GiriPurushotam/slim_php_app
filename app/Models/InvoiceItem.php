<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceItem extends Model
{
    public $timestamps = false;

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(TestInvoice::class);
    }
}
