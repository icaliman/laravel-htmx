<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Xlited\Lamx\Components\HtmxComponent;

class Todos extends HtmxComponent
{
    public string $view = 'components.todos';

    public array|Collection $todos = [];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->todos = request()->session()->get('todos-list', []);
    }
}
