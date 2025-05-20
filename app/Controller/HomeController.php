<?php

declare(strict_types=1);

namespace App\Controller;

use App\Attribute\Get;
use App\View;

class HomeController
{
    #[Get('/')]
    public function index(): string
    {
        return "Hello from Index";
    }
}
