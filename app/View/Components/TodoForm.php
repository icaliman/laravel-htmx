<?php

namespace App\View\Components;

use App\Support\TodoStore;
use Xlited\Lamx\Attributes\Bindable;
use Xlited\Lamx\Components\HtmxComponent;

class TodoForm extends HtmxComponent
{
    /**
     * Shared with Alpine: the input is x-model="title", so the page reacts as
     * you type (character count) and the server receives the value with the
     * request. After a validation error the re-rendered form still holds it.
     */
    #[Bindable]
    public string $title = '';

    protected function rules(): array
    {
        return ['title' => 'required|string|max:255'];
    }

    /**
     * Validation failures re-render the form with $errors and the bound title.
     * On success: a fresh form and the counter (swapped out-of-band) plus the
     * new todo, which the form's hx-target prepends to the list.
     */
    public function save(TodoStore $store): array
    {
        $todo = $store->add($this->validate()['title']);

        return [static::make(), TodoCounter::make(), Todo::make($todo)];
    }
}
