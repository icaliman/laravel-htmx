<?php

namespace App\View\Components;

use App\Support\TodoStore;
use Illuminate\Contracts\View\View;
use Xlited\Lamx\Components\HtmxComponent;

class TodoCounter extends HtmxComponent
{
    public function __construct(protected TodoStore $store) {}

    public function render(): View
    {
        return view('components.todo-counter', [
            'count' => $this->store->count(),
            'done' => $this->store->doneCount(),
        ]);
    }
}
