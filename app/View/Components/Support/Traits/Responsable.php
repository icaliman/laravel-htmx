<?php

namespace App\View\Components\Support\Traits;

trait Responsable
{
    public function toResponse($request)
    {
        return $this->render();
    }
}
