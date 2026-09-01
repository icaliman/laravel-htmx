<?php

namespace App\View\Components;

use App\Support\TodoStore;
use Illuminate\Contracts\View\View;
use Xlited\Lamx\Components\HtmxComponent;

/**
 * The page: Route::get('/', Todos::class) renders it inside layouts/app.
 */
class Todos extends HtmxComponent
{
    public function __construct(protected TodoStore $store) {}

    public function render(): View
    {
        return view('components.todos', ['todos' => $this->store->all()]);
    }
}
