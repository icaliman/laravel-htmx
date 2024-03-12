<?php

namespace App\View\Components;

use App\View\Components\Support\Contracts\HtmxComponent;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class TodoCounter extends HtmxComponent
{
    public string $view = 'components.todo-counter';

    public int $count = 0;
    public int $done = 0;

    /**
     * Create a new component instance.
     */
    public function __construct(public array|Collection $todos = [])
    {
        $this->count = count($this->todos);
        $this->done = collect($this->todos)->where('done', true)->count();
    }
}
