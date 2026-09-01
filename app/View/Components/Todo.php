<?php

namespace App\View\Components;

use App\Support\TodoStore;
use Xlited\Lamx\Components\HtmxComponent;

class Todo extends HtmxComponent
{
    public function __construct(public int $id, public string $title, public bool $done = false) {}

    /**
     * Re-renders this todo (the hx-target) and the counter (out-of-band).
     */
    public function toggle(TodoStore $store): array
    {
        $this->done = ! $this->done;

        $store->setDone($this->id, $this->done);

        return [$this, TodoCounter::make()];
    }

    /**
     * The element removes itself (hx-swap="delete"); only the counter is returned.
     */
    public function remove(TodoStore $store): TodoCounter
    {
        $store->remove($this->id);

        return TodoCounter::make();
    }
}
