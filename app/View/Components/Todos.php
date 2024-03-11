<?php

namespace App\View\Components;

use App\View\Components\Support\Contracts\HtmxComponent;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;

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
