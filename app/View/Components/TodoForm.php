<?php

namespace App\View\Components;

use Illuminate\Support\MessageBag;
use Xlited\Lamx\Components\HtmxComponent;

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
