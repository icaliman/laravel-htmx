<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Xlited\Lamx\Components\HtmxComponent;

class Todo extends HtmxComponent
{
    public string $view = 'components.todo';

    /**
     * Create a new component instance.
     */
    public function __construct(public int $id, public string $title, public bool $done = false, public bool $deleted = false)
    {
    }
}
