<?php

namespace App\View\Components;

use Illuminate\Support\Collection;
use Xlited\Lamx\Components\HtmxComponent;

class TodoList extends HtmxComponent
{
    // The list has no actions of its own, so it does not need to carry its state.
    protected bool $stateless = true;

    public function __construct(public array|Collection $todos = []) {}
}
