<?php

declare(strict_types=1);

namespace App\Exception;

class ViewNotFoundException extends \Exception
{

    protected $message = '404 View Not Found';
}
