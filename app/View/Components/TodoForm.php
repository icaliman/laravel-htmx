<?php

namespace App\View\Components;

use App\View\Components\Support\Contracts\HtmxComponent;
use Illuminate\Support\MessageBag;

class TodoForm extends HtmxComponent
{
    public string $view = 'components.todo-form';

    /**
     * Create a new component instance.
     */
    public function __construct(public string $title = '', public ?MessageBag $errors = null)
    {
        if (!$this->errors) {
            $this->errors = new MessageBag();
        }
    }
}
