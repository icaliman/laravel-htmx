<?php

namespace App\View\Components;

use App\View\Components\Support\Contracts\HtmxComponent;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;

class TodoList extends HtmxComponent
{
    public string $view = 'components.todo-list';

    /**
     * Create a new component instance.
     */
    public function __construct(public array|Collection $todos = [])
    {
    }
}
