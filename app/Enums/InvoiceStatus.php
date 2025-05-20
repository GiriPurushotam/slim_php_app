<?php

declare(strict_types=1);

namespace App\Enums;

use App\Contracts\SomeInterface;

enum InvoiceStatus: int implements SomeInterface
{

    // use InvoiceStatusHelper;
    case PENDING = 0;
    case PAID = 1;
    case VOID = 2;
    case FAILED = 3;

    public function toString(): string
    {
        return match ($this) {
            self::PAID => 'Paid',
            self::FAILED => 'Decline',
            self::VOID => 'Void',
            default => 'Pending',
        };
    }

    public function color(): Color
    {
        return match ($this) {
            self::PAID => Color::Green,
            self::FAILED => Color::Red,
            self::VOID => Color::Green,
            default => Color::Orange,
        };
    }
}
