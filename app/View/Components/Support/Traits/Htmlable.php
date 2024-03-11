<?php

namespace App\View\Components\Support\Traits;

trait Htmlable
{
    public function toHtml(): string
    {
        return $this->render()->render();
    }
}
