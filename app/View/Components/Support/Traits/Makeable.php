<?php

namespace App\View\Components\Support\Traits;

trait Makeable
{
    public static function make($data = []): self
    {
        return self::resolve($data);
    }
}
