<?php

declare(strict_types=1);

namespace App\Attribute;

use Attribute;
use App\Enums\HttpMethod;
use App\Contracts\RouteInterface;

#[Attribute]
class Route implements RouteInterface
{
    public function __construct(public string $routePath, public HttpMethod $method = HttpMethod::Get) {}
}
