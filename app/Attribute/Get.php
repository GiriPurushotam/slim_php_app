<?php

declare(strict_types=1);

namespace App\Attribute;

use App\Enums\HttpMethod;
use Attribute;

#[Attribute(Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
class Get extends Route
{
    public function __construct(string $routePath)
    {
        Parent::__construct($routePath, HttpMethod::Get);
    }
}
