<?php

namespace App\View\Components;

use App\Support\TodoStore;
use Xlited\Lamx\Components\HtmxComponent;

class TodoForm extends HtmxComponent
{
    protected function rules(): array
    {
        return ['title' => 'required|string|max:255'];
    }

    /**
     * Validation failures re-render the form with $errors and old('title').
     * On success: a fresh form and the counter (swapped out-of-band) plus the
     * new todo, which the form's hx-target prepends to the list.
     */
    public function save(TodoStore $store): array
    {
        $todo = $store->add($this->validate()['title']);

        return [static::make(), TodoCounter::make(), Todo::make($todo)];
    }
}
