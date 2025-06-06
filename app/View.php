<?php

declare(strict_types=1);

namespace App;

use App\Exception\ViewNotFoundException;

class View
{
    public function __construct(protected string $view, protected array $load = []) {}


    public static function make(string $view, array $load = []): static
    {
        return new static($view, $load);
    }


    public function render(): string
    {
        $viewPath = VIEW_PATH . '/' . $this->view . '.php';

        if (!file_exists($viewPath)) {

            throw new ViewNotFoundException();
        }

        extract($this->load);

        ob_start();
        include $viewPath;
        return (string) ob_get_clean();
    }


    public function __toString(): string
    {
        return $this->render();
    }
}
